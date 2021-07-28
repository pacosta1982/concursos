@extends('brackets/admin-ui::admin.layout.usersys')

@section('title', trans('admin.applicant.actions.trakings'))

@section('body')

<call-listing
        :data="{{ $data->toJson() }}"
        :url="'{{ url('calls') }}'"
        status="{{ session('status') }}"
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ trans('admin.call.actions.index') }}
                    </div>
                    <div class="card-body" v-cloak>
                        <div class="card-block">
                            <form @submit.prevent="">
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
                            </form>

                            <table class="table table-hover table-listing">
                                <thead>
                                    <tr>

                                        <th is='sortable' :column="'id'">{{ trans('admin.call.columns.id') }}</th>
                                        <th is='sortable' :column="'description'">{{ trans('admin.call.columns.description') }}</th>
                                        <th is='sortable' :column="'call_type_id'">{{ trans('admin.call.columns.call_type_id') }}</th>
                                        <th is='sortable' :column="'position_id'">{{ trans('admin.call.columns.position_id') }}</th>
                                        <th is='sortable' :column="'company_id'">{{ trans('admin.call.columns.company_id') }}</th>
                                        <th is='sortable' :column="'start'">{{ trans('admin.call.columns.start') }}</th>
                                        <th is='sortable' :column="'end'">{{ trans('admin.call.columns.end') }}</th>

                                        <th></th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in collection" :key="item.id" :class="bulkItems[item.id] ? 'bg-bulk' : ''">
                                        <td>@{{ item.id }}</td>
                                        <td>@{{ item.description }}</td>
                                        <td>@{{ item.call_type.name }}</td>
                                        <td>@{{ item.position.name }}</td>
                                        <td>@{{ item.company.acronym }}</td>
                                        <td>@{{ item.start | datetime }}</td>
                                        <td>@{{ item.end | datetime }}</td>
                                        <td>
                                            <div class="row no-gutters">
                                                <!--<div class="col-auto">
                                                    <a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + '/edit'" title="{{ trans('brackets/admin-ui::admin.btn.edit') }}" role="button"><i class="fa fa-edit"></i></a>
                                                </div>-->
                                                <div class="col-auto">
                                                    <a class="btn btn-sm btn-spinner btn-success" :href="item.is_admin + '/application'" title="{{ trans('brackets/admin-ui::admin.btn.show') }}" role="button"><i class="fa fa-check-square"></i></a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="row" v-if="pagination.state.total > 0">
                                <div class="col-sm">
                                    <span class="pagination-caption">{{ trans('brackets/admin-ui::admin.pagination.overview') }}</span>
                                </div>
                                <div class="col-sm-auto">
                                    <pagination></pagination>
                                </div>
                            </div>

                            <div class="no-items-found" v-if="!collection.length > 0">
                                <i class="icon-magnifier"></i>
                                <h3>{{ trans('brackets/admin-ui::admin.index.no_items') }}</h3>
                                <p>{{ trans('brackets/admin-ui::admin.index.try_changing_items') }}</p>
                                <a class="btn btn-primary btn-spinner" href="{{ url('admin/calls/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.call.actions.create') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </call-listing>

@endsection
