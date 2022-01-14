<language-level-resume-listing
        :data="{{ $datalanguage->toJson() }}"
        :url="'{{ url('admin/language-level-resumes') }}'"
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ trans('admin.language-level-resume.actions.index') }}
                        <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="{{ url('resume/'.$resume->id.'/language-level-resumes/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.language-level-resume.actions.create') }}</a>
                    </div>
                    <div class="card-body" v-cloak>
                        <div class="card-block">


                            <table class="table table-hover table-listing">
                                <thead>
                                    <tr>

                                        <th is='sortable' :column="'language_id'">{{ trans('admin.language-level-resume.columns.language_id') }}</th>
                                        <th is='sortable' :column="'language_level_id'">{{ trans('admin.language-level-resume.columns.language_level_id') }}</th>
                                        <th is='sortable' :column="'certificate'">{{ trans('admin.language-level-resume.columns.certificate') }}</th>

                                        <th></th>
                                    </tr>
                                    <tr v-show="(clickedBulkItemsCount > 0) || isClickedAll">
                                        <td class="bg-bulk-info d-table-cell text-center" colspan="7">
                                            <span class="align-middle font-weight-light text-dark">{{ trans('brackets/admin-ui::admin.listing.selected_items') }} @{{ clickedBulkItemsCount }}.  <a href="#" class="text-primary" @click="onBulkItemsClickedAll('/admin/language-level-resumes')" v-if="(clickedBulkItemsCount < pagination.state.total)"> <i class="fa" :class="bulkCheckingAllLoader ? 'fa-spinner' : ''"></i> {{ trans('brackets/admin-ui::admin.listing.check_all_items') }} @{{ pagination.state.total }}</a> <span class="text-primary">|</span> <a
                                                        href="#" class="text-primary" @click="onBulkItemsClickedAllUncheck()">{{ trans('brackets/admin-ui::admin.listing.uncheck_all_items') }}</a>  </span>

                                            <span class="pull-right pr-2">
                                                <button class="btn btn-sm btn-danger pr-3 pl-3" @click="bulkDelete('/admin/language-level-resumes/bulk-destroy')">{{ trans('brackets/admin-ui::admin.btn.delete') }}</button>
                                            </span>

                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in collection" :key="item.id" :class="bulkItems[item.id] ? 'bg-bulk' : ''">

                                        <td>@{{ item.language.name }}</td>
                                        <td>@{{ item.language_level.name }}</td>
                                        <td>@{{ item.certificate }}</td>

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
                                <a class="btn btn-primary btn-spinner" href="{{ url('admin/language-level-resumes/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.language-level-resume.actions.create') }}</a>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </language-level-resume-listing>
