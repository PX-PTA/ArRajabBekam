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
    .no-border{
        border-left: none !important;
        border-right: none !important;
    }
    </style>
</head>

<body>
    <table width="100%">
        <tr>
            <td rowspan="3" >
                <img src="{{ asset('logo-printer.png') }}"  width="125px" height="100px">
            </td>
            <th>Bekam Sehat Batam</th>
        </tr>
        <tr>
            <td align="center">Ruko Artha Mandiri No.3 kel.Buliang kec.Batu aji Kota Batam Kepulauan Riau</td>
        </tr>
        <tr>
            <td align="center">Hp : +6282172830109; WA : +6282172830109</td>
        </tr>
    </table>
    <hr>
    <br>
    <br>
    <table class="tableRekam" width="100%">
        <tr>
            <td width="10%" style="border-right: none" >Nama</td>
            <td width="1%" class="no-border">:</td>
            <td style="border-left:none">{{$patient->name}}</td>
            <td width="10%" style="border-right: none">Agama</td>
            <td width="1%" class="no-border">:</td>
            <td style="border-left:none">{{$patient->religion}}</td>
        </tr>
        <tr>
            <td width="10%" style="border-right: none">Alamat</td>
            <td width="1%" class="no-border">:</td>
            <td style="border-left:none">{{$patient->address}}</td>
            <td width="10%" style="border-right: none">Pekerjaan</td>
            <td width="1%" class="no-border">:</td>
            <td style="border-left:none">{{$patient->job}}</td>
        </tr>
        <tr>
            <td width="10%" style="border-right: none">No. Hp/WA</td>
            <td width="1%" class="no-border">:</td>
            <td style="border-left:none">{{$patient->phoneNo}}</td>
            <td width="10%" style="border-right: none">Usia</td>
            <td width="1%" class="no-border">:</td>
            <td style="border-left:none">{{$patient->age}}</td>
        </tr>
    </table>

    <h3 width="100%" align="center" >REKAM MEDIK KLIEN BEKAM SEHAT BATAM</h3>
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
        @foreach($patient->medicalRecords as $key => $medicalRecord )
        <tr>
            <td>{{$key+1}}</td>
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