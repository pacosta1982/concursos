@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.applicant.actions.trakings'))

@section('body')

<div class="row">
    <div class="form-group col-sm-6">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Postulaciones
            </div>
            <div class="card-body">
                {{ $chartjs->render() }}
            </div>
        </div>
    </div>
    <div class="form-group col-sm-6">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Resumen
            </div>
            <div class="card-body">
                <table class="table table-sm table-hover table-borderless">
                    <thead>
                        <tr>
                        <th>LLAMADOS</th>
                        <th class="text-center">POSTULANTES</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($estados as $key=>$item)
                        <tr>
                        <td>{{$key}}</td>
                        <td class="text-center">{{$item}}</td>
                        </tr>

                        @endforeach
                    </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>




@endsection
