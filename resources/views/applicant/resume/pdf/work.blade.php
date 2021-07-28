<h3 class="center">
    Experiencia Laboral
</h3>

<table id="customers">
    <tr>
        <th >Institución/Empresa</th>
        <th >Puesto</th>
        <th >Principales tareas a cargo</th>
        <th >Fecha de Inicio de la Actividad Laboral</th>
        <th >Fecha de Fin de la Actividad Laboral</th>
        <th >Motivo del cese de la actividad</th>
        <th >Nro. de Contacto para referencia laboral.</th>
    </tr>
  @foreach ($resume->work as $item)
    <tr>
        <td>{{$item->company}}</td>
        <td>{{$item->position}}</td>
        <td>{{$item->tasks}}</td>
        <td>{{$item->start}}</td>
        <td>{{$item->end}}</td>
        <td>{{$item->end_reason->name}}</td>
        <td>{{$item->contact}}</td>
    </tr>
  @endforeach


</table>
