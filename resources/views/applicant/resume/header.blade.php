<div class="card">
    <div class="card-header text-center">
         CURRICULO - {{$resume->names}} {{$resume->last_names}}
        <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="{{ url('admin/academic-trainings/edit') }}" role="button"><i class="fa fa-edit"></i>&nbsp; Editar</a>
    </div>
    <!--<h5 class="card-header text-center">Currículo - {{$resume->names}} {{$resume->last_names}}</h5>-->
    <div class="card-body">
      <div class="row">
            <div class="form-group col-sm-4">
                <p class="card-text">Nombres: {{$resume->names}}</p>
            </div>

            <div class="form-group col-sm-4">
                <p class="card-text">Apellidos: {{$resume->last_names}}</p>
            </div>
            <div class="form-group col-sm-4">
                <p class="card-text">Sexo: {{$resume->gender}}</p>
            </div>
    </div>
          <div class="row">
            <div class="form-group col-sm-4">
                <p class="card-text">Ciudad: </p>
            </div>

            <div class="form-group col-sm-4">
                <p class="card-text">Barrio: {{$resume->neighborhood}}</p>
            </div>
            <div class="form-group col-sm-4">
                <p class="card-text">Direccion: {{$resume->address}}</p>
            </div>
    </div>
    <div class="row">
            <div class="form-group col-sm-4">
                <p class="card-text">Nacionalidad: {{$resume->nationality}}</p>
            </div>

            <div class="form-group col-sm-4">
                <p class="card-text">Nacimiento: {{$resume->birthdate}}</p>
            </div>

            <div class="form-group col-sm-4">
                <p class="card-text">Documento: {{number_format($resume->government_id,0,'','.')}}</p>
            </div>
    </div>
    <div class="row">
            <div class="form-group col-sm-4">
                <p class="card-text">Telefono: {{$resume->phone}}</p>
            </div>

            <div class="form-group col-sm-4">
                <p class="card-text">Email: {{$resume->email}}</p>
            </div>
    </div>
    <!--<a href="resume/{{$resume->id}}/edit" class="btn btn-primary">Editar</a>-->
    </div>
  </div>
