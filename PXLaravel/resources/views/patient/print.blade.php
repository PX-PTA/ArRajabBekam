<!DOCTYPE html>
<html>

<head>
    <style>
    body {
        margin-left: 5%;
        margin-right: 5%;
    }

    p,
    table.tableRekam th,
    table.tableRekam td,
    table.tableRekam    
    {
        border: 1px solid black;
        border-collapse: collapse;
    }
    </style>
</head>

<body>
    <table width="100%">
        <tr>
            <td rowspan="3">
                <img src="{{ asset('logo-printer.jpeg') }}" alt="Girl in a jacket" width="150" height="150">
            </td>
            <th>AR-RAJAB BEKAM</th>
        </tr>
        <tr>
            <td align="center">Ruko Royal Sincom Blok C no 15 Batam Cener, Kepulauan Riau</td>
        </tr>
        <tr>
            <td align="center">Hp : 08212006460; WA : 08212006460</td>
        </tr>
    </table>
    <hr>
    <br>
    <br>
    <table class="tableRekam" width="100%">
        <tr>
            <td width="10%">Nama</td>
            <td width="1%">:</td>
            <td>{{$patient->name}}</td>
            <td width="10%">Agama</td>
            <td width="1%">:</td>
            <td>{{$patient->religion}}</td>
        </tr>
        <tr>
            <td width="10%">Alamat</td>
            <td width="1%">:</td>
            <td>{{$patient->address}}</td>
            <td width="10%">Pekerjaan</td>
            <td width="1%">:</td>
            <td>{{$patient->job}}</td>
        </tr>
        <tr>
            <td width="10%">No. Hp/WA</td>
            <td width="1%">:</td>
            <td>{{$patient->phoneNo}}</td>
            <td width="10%">Usia</td>
            <td width="1%">:</td>
            <td>{{$patient->age}}</td>
        </tr>
    </table>

    <h3 width="100%" align="center" >REKAM MEDIK KLIEN AR-RAJAB BEKAM</h3>
    <p>
        Riwayat Penyakit<br>
        Riwayat Operasi : (@if($patient->is_already_surgery) Ya @else Tidak @endif) Operasi. @if($patient->is_already_surgery) {{$patient->surgery_details}} @endif<br>
        Riwayat Obat :@if($patient->is_on_drugs) Konsumsi Obat @else Tidak Konsumsi Obat. @endif @if($patient->is_on_drugs) {{$patient->drug_details}}. @endif
    </p>
    <table class="tableRekam" width="100%">
        <tr>
            <th rowspan="2">No</th>
            <th rowspan="2">Tgl</th>
            <th rowspan="2">Keluhan</th>
            <th rowspan="2">Diagnosa</th>
            <th rowspan="2">Tindakan</th>
            <th rowspan="2">Herbal</th>
            <th colspan="2">Tegangan Darah</th>
            <th rowspan="2">Terapis</th>
        </tr>
        <tr>
            <th>sys</th>
            <th>dia</th>
        </tr>
        @foreach($patient->medicalRecords as $medicalRecord)
        <tr>
            <td>{{$medicalRecord->no}}</td>
            <td>{{$medicalRecord->date}}</td>
            <td>{{$medicalRecord->complaint}}</td>
            <td>{{$medicalRecord->diagnosis}}</td>
            <td>{{$medicalRecord->action}}</td>
            <td>{{$medicalRecord->medicine}}</td>
            <td>{{$medicalRecord->blood_pressure_sys}}</td>
            <td>{{$medicalRecord->blood_pressure_dia}}</td>
            <td>{{$medicalRecord->terapis}}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>