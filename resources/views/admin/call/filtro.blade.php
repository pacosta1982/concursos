@extends('brackets/admin-ui::admin.layout.default')

@section('title', $title)

@section('body')

<div class="card">
    <div class="card-header">
        <i class="fa fa-align-justify"></i>  {{$title}} - Llamado {{ $call->description }}
    </div>
    <div class="card-body">
        <div class="row">
            <div class="form-group col">
                <p class="card-text"><a href="{{ url('admitidos/'.$url.'/'.$call->id) }}" class="btn btn-block btn-square btn-lg text-white bg-success"><i class="fa fa-file-excel-o"></i> Exportar Excel</a></p>
            </div>
        </div>
    </div>

</div>


<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> {{ trans('admin.calls.actions.showadmin') }}
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
