<academic-training-listing
        :data="{{ $data->toJson() }}"
        :url="'{{ url('resume/'.$resume->id.'/academic-training/create') }}'"
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ trans('admin.academic-training.actions.index') }}
                        <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="{{ url('resume/'.$resume->id.'/academic-training/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.academic-training.actions.create') }}</a>
                    </div>
                    <div class="card-body" v-cloak>
                        <div class="card-block">
                            <!--<form @submit.prevent="">
                                <div class="row justify-content-md-between">
                                    <div class="col col-lg-7 col-xl-5 form-group">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="{{ trans('brackets/admin-ui::admin.placeholder.search') }}" v-model="search" @keyup.enter="filter('search', $event.target.value)" />
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-primary" @click="filter('search', search)"><i class="fa fa-search"></i>&nbsp; {{ trans('brackets/admin-ui::admin.btn.search') }}</button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-auto form-group ">
                                        <select class="form-control" v-model="pagination.state.per_page">

                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                            </form>-->

                            <table class="table table-hover table-listing">
                                <thead>
                                    <tr>

                                        <th >{{ trans('admin.academic-training.columns.education_level_id') }}</th>
                                        <th >{{ trans('admin.academic-training.columns.academic_state_id') }}</th>
                                        <th >{{ trans('admin.academic-training.columns.name') }}</th>
                                        <th >{{ trans('admin.academic-training.columns.institution') }}</th>
                                        <th class="text-center">{{ trans('admin.academic-training.columns.workload') }}</th>
                                        <th >{{ trans('admin.academic-training.columns.registered') }}</th>

                                        <th></th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in collection" :key="item.id" :class="bulkItems[item.id] ? 'bg-bulk' : ''">

                                        <td>@{{ item.education_level.name }}</td>
                                        <td>@{{ item.academic_state.name }}</td>
                                        <td>@{{ item.name }}</td>
                                        <td>@{{ item.institution }}</td>
                                        <td class="text-center">@{{ item.workload }}</td>
                                        <td>@{{ item.registered }}</td>

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
                                <!--<p>{{ trans('brackets/admin-ui::admin.index.try_changing_items') }}</p>-->
                                <!--<a class="btn btn-primary btn-spinner" href="{{ url('admin/academic-trainings/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.academic-training.actions.create') }}</a>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </academic-training-listing>
