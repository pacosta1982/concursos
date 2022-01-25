@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.applicant.actions.trakings'))

@section('body')


<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> {{ trans('admin.calls.actions.showadmin') }} Llamado {{ $call->description }}
            </div>
            <div class="card-body" v-cloak>
                <!--<div class="card-block">-->
                    <table class="table table-sm table-hover table-borderless">
                        <thead>
                            <tr>
                            <th class="d-none d-sm-block">#</th>
                            <th class="text-center">CODIGO</th>
                            <th>NOMBRE</th>
                            <th class="text-center">FEC NAC</th>
                            <th class="text-center">DOCUMENTO</th>
                            <th>EMAIL</th>
                            <th class="text-center">ESTADO</th>
                            <th></th>
                            <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($postulantes as $key=>$item)
                            <tr>
                            <th class="d-none d-sm-block" scope="row">{{$key+1}}</th>
                            <td class="text-center">{{ $item->code }}</td>
                            <td>{{ $item->resume->names }} {{ $item->resume->last_names }}</td>
                            <td class="text-center">{{ $item->resume->birthdate }}</td>
                            <td class="text-center">{{ $item->resume->government_id }}</td>
                            <td >{{ $item->resume->email }}</td>
                            <td class="text-center"> <span class="badge"
                                style="{{ $item->statuses->status->name == 'Admitido' ?  "background-color: green; color:white" : ($item->statuses->status->name == 'No Admitido' ? "background-color: red; color:white" : "") }}">
                                {{ $item->statuses->status->name }}
                                </span>
                            </td>
                            <td></td>
                            <td>
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <a class="btn btn-sm btn-spinner btn-success" href="{{ url('admin/calls/'.$call->id.'/showpostulante/'.$item->resume_id) }}" title="{{ trans('brackets/admin-ui::admin.btn.show') }}" role="button"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                            </td>
                            </tr>

                            @endforeach
                        </tbody>
                        </table>

            </div>
        </div>
    </div>
</div>




@endsection
