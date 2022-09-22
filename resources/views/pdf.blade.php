<h4></h4>
<h2 style="align-content: center">LISTA DE ADMITIDOS Y NO ADMITIDOS</h2>
<h4>OEE: MINISTERIO DE URBANISMO VIVIENDA Y HABITAT</h4>
<h4>Puesto: {{ $call->Position->name }}</h4>
<br>
<table>
    <thead>
    <tr>
        <th style="background-color: #001C54; color: white;">NRO</th>
        <th style="background-color: #001C54; color: white;">CODIGO</th>
        <th style="background-color: #001C54; color: white;">NOMBRE</th>
        <th style="background-color: #001C54; color: white;">NACIMIENTO</th>
        <th style="background-color: #001C54; color: white;">DOCUMENTO</th>
        <th style="background-color: #001C54; color: white;">EMAIL</th>
        <th style="background-color: #001C54; color: white;">DESCRIPCION</th>
        <th style="background-color: #001C54; color: white;">ESTADO</th>
    </tr>
    </thead>
    <tbody>
        @php
            $aux = 1
        @endphp
    @foreach($invoices as $invoice)
        <tr>
            <td style="width: 25pt; align-content: center; border: 1px solid black ;">{{ $aux }}</td>
            <td style="width: 40pt; border: 1px solid black ;">{{ $invoice->call->Position->acronym }}</td>
            <td style="width: 200pt; border: 1px solid black ;">{{ $invoice->resume->names.' '.$invoice->resume->last_names }}</td>
            <th style="width: 100pt; border: 1px solid black ;">{{ $invoice->resume->birthdate }}</th>
            <th style="width: 70pt; border: 1px solid black ;">{{ $invoice->resume->government_id }}</th>
            <th style="width: 200pt; border: 1px solid black ;">{{ $invoice->resume->email }}</th>
            <th style="width: 80pt; border: 1px solid black ;">{{ $invoice->statuses->description }}</th>
            <th style="border: 1px solid black ; background-color: {{ $invoice->statuses->status->name == "Admitido" ? "#024e16" : "#BA3A3B" }} ; width: 60pt; color: white;">{{ $invoice->statuses->status->name == "Admitido" ? "Cumple" : 'No cumple' }}</th>
        </tr>
        @php
            $aux++
        @endphp
    @endforeach
    </tbody>
</table>



