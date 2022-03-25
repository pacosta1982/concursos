<h3 class="center">
    MANEJO DE IDIOMAS
</h3>

<table id="customers">
    <tr>
        <th >Idioma</th>
        <th >Nivel</th>
        <th >Certificado</th>

    </tr>
  @foreach ($resume->languages as $item)
    <tr>
        <td>{{$item->language->name}}</td>
        <td>{{$item->language_level->name }}</td>
        <td>{{$item->certificate == true ? 'SI' : 'NO'  }}</td>
    </tr>
  @endforeach


</table>
