<h3 class="center">
    Informacion Academica
</h3>

<table id="customers">
    <tr>
        <th >Nivel</th>
        <th >Estado</th>
        <th >Título/Carrera</th>
        <th >Institución/Universidad</th>
        <th >Título de Finalización Registrado en el MEC</th>
    </tr>
  @foreach ($resume->academic as $item)
    <tr>
        <td>{{$item->education_level->name}}</td>
        <td>{{$item->academic_state->name}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->institution}}</td>
        <td >{{ $item->registered ? 'SI' : 'NO'}}</td>
    </tr>
  @endforeach


</table>
