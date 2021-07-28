<h2 class="center">CURRICULUM VITAE </h2>

<table id="customers">
        <tbody>
            <!--<tr>
                <td>
                   <strong style="font-size: x-small;">INFORME DE SUPERVICIÓN DE OBRA N° </strong><br>
                    FECHA DE INSPECCIÓN:
                </td>
                <td>
                </td>
            </tr>-->
            <tr>
                <th>
                    <strong>DATOS PERSONALES DEL/LA POSTULANTE</strong>
                </th>
                <th></th>
            </tr>
            <tr>
                <td>
                    Cédula de Identidad Paraguaya
                </td>
                <td>SI</td>
            </tr>
            <tr>
                <td>N° Documento de Identidad:</td>
                <td>{{number_format($resume->government_id,0,'','.')}}</td>
            </tr>
            <tr>
                <td>Nombres</td>
                <td>{{$resume->names}}</td>
            </tr>
            <tr>
                <td>Apellidos</td>
                <td>{{$resume->last_names}}</td>
            </tr>
            <tr>
                <td>Sexo </td>
                <td>{{$resume->gender}}</td>
            </tr>
            <tr>
                <td>Nacionalidad</td>
                <td>{{$resume->nationality}}</td>
            </tr>
            <tr>
                <td>Direccion </td>
                <td>{{$resume->address}}</td>
            </tr>
            <tr>
                <td>Barrio</td>
                <td>{{$resume->neighborhood}}</td>
            </tr>
            <tr>
                <td>Ciudad</td>
                <td>Asunción </td>
            </tr>
        </tbody>
    </table>
    <br>
