<work-experience-listing
        :data="{{ $datawork->toJson() }}"
        :url="'{{ url('admin/work-experiences') }}'"
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ trans('admin.work-experience.actions.index') }}
                        <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="{{ url('resume/'.$resume->id.'/work-experiences/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.work-experience.actions.create') }}</a>
                    </div>
                    <div class="card-body" v-cloak>
                        <div class="card-block">


                            <table class="table table-hover table-listing">
                                <thead>
                                    <tr>

                                        <th is='sortable' :column="'company'">{{ trans('admin.work-experience.columns.company') }}</th>
                                        <th is='sortable' :column="'position'">{{ trans('admin.work-experience.columns.position') }}</th>
                                        <th is='sortable' :column="'start'">{{ trans('admin.work-experience.columns.start') }}</th>
                                        <th is='sortable' :column="'end'">{{ trans('admin.work-experience.columns.end') }}</th>
                                        <th is='sortable' :column="'end_reason_id'">{{ trans('admin.work-experience.columns.end_reason_id') }}</th>
                                        <th is='sortable' :column="'end'">{{ trans('admin.work-experience.columns.tasks') }}</th>
                                        <th is='sortable' :column="'end_reason_id'">{{ trans('admin.work-experience.columns.contact') }}</th>

                                        <th></th>
                                    </tr>
                                    <tr v-show="(clickedBulkItemsCount > 0) || isClickedAll">
                                        <td class="bg-bulk-info d-table-cell text-center" colspan="9">
                                            <span class="align-middle font-weight-light text-dark">{{ trans('brackets/admin-ui::admin.listing.selected_items') }} @{{ clickedBulkItemsCount }}.  <a href="#" class="text-primary" @click="onBulkItemsClickedAll('/admin/work-experiences')" v-if="(clickedBulkItemsCount < pagination.state.total)"> <i class="fa" :class="bulkCheckingAllLoader ? 'fa-spinner' : ''"></i> {{ trans('brackets/admin-ui::admin.listing.check_all_items') }} @{{ pagination.state.total }}</a> <span class="text-primary">|</span> <a
                                                        href="#" class="text-primary" @click="onBulkItemsClickedAllUncheck()">{{ trans('brackets/admin-ui::admin.listing.uncheck_all_items') }}</a>  </span>

                                            <span class="pull-right pr-2">
                                                <button class="btn btn-sm btn-danger pr-3 pl-3" @click="bulkDelete('/admin/work-experiences/bulk-destroy')">{{ trans('brackets/admin-ui::admin.btn.delete') }}</button>
                                            </span>

                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in collection" :key="item.id" :class="bulkItems[item.id] ? 'bg-bulk' : ''">

                                        <td>@{{ item.company }}</td>
                                        <td>@{{ item.position }}</td>
                                        <td>@{{ item.start | date }}</td>
                                        <td>@{{ item.end | date }}</td>
                                        <td>@{{ item.end_reason.name }}</td>
                                        <td>@{{ item.tasks }}</td>
                                        <td>@{{ item.contact }}</td>

                                        <td>
                                            <div class="row no-gutters">
                                                <!--<div class="col-auto">
                                                    <a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + '/edit'" title="{{ trans('brackets/admin-ui::admin.btn.edit') }}" role="button"><i class="fa fa-edit"></i></a>
                                                </div>-->
                                                <form class="col" @submit.prevent="deleteItem(item.resource_url)">
                                                    <button type="submit" class="btn btn-sm btn-danger" title="{{ trans('brackets/admin-ui::admin.btn.delete') }}"><i class="fa fa-trash-o"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>



                            <div class="no-items-found" v-if="!collection.length > 0">
                                <!--<i class="icon-magnifier"></i>-->
                                <h3>{{ trans('brackets/admin-ui::admin.index.no_items') }}</h3>
                                <!--<p>{{ trans('brackets/admin-ui::admin.index.try_changing_items') }}</p>
                                <a class="btn btn-primary btn-spinner" href="{{ url('admin/work-experiences/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.work-experience.actions.create') }}</a>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </work-experience-listing>
