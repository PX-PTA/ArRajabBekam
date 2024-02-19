<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            /* to centre page on screen*/
            margin-left: 10px;
            margin-right: 10px;
        }

        .with-border,
        .with-border td,
        .with-border th {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body width="100%">
    <div style="text-align: center">
        <table width="100%" class="no-border">
            <tr>
                <td rowspan="3">
                    <img src="{{ asset('logo-printer.png') }}" width="125px" height="100px">
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
    </div>
    <hr>
    <div style="text-align: center">
        LAPORAN REKAM MEDIK KLIEN
    </div>
    <table width="100%">
        <tr>
            <td>Nama : {{$medicalRecord->patient->name}}
            </td>
            <td>Agama : {{$medicalRecord->patient->religion}}
            </td>
        </tr>
        <tr>
            <td>
                Alamat : {{$medicalRecord->patient->address}}
            </td>
            <td>
                Pekerjaan : {{$medicalRecord->patient->job}}
            </td>
        </tr>
        <tr>
            <td>

            </td>
            <td>
                Umur : {{$medicalRecord->patient->age}}
            </td>
        </tr>
        <tr>
            <td>
                No HP : {{$medicalRecord->patient->phoneNo}}
            </td>
            <td>
                Berat Badan : {{$medicalRecord->patient->weight}}
            </td>
        </tr>
    </table>
    <br>
    <table width="100%" class="with-border">
        <tr>
            <th rowspan="2">
                No
            </th>
            <th rowspan="2">
                Tgl
            </th>
            <th rowspan="2">
                Keluhan Klien
            </th>
            <th rowspan="2">
                Hasil Diagnosa
            </th>
            <th rowspan="2">
                Tindakan
            </th>
            <th rowspan="2">
                Obat / Herbal
            </th>
            <th colspan="2">
                Tekanan Darah
            </th>
            <th rowspan="2">
                Terapis
            </th>
        </tr>
        <tr>
            <th>
                Sys
            </th>
            <th>
                Dia
            </th>
        </tr>
        <tr>
            <td style="text-align: center">1
            </td>
            <td style="text-align: center">{{$medicalRecord->date}}
            </td>
            <td style="text-align: center" >{{$medicalRecord->complaint}}
            </td>
            <td style="text-align: center">{{$medicalRecord->diagnosis}}
            </td>
            <td style="text-align: center">{{$medicalRecord->action}}
            </td>
            <td style="text-align: center">{{$medicalRecord->medicine}}
            </td>
            <td style="text-align: center">{{$medicalRecord->blood_pressure_sys}}
            </td>
            <td style="text-align: center">{{$medicalRecord->blood_pressure_dia}}
            </td>
            <td style="text-align: center">{{$medicalRecord->terapis}}
            </td>
        </tr>
    </table>
    <br>
    <table width="100%">
        <tr>
            <td height="200px" width="150px">
                <img src="" alt="">
            </td>
            <td height="200px" width="150px">
                <img src="" alt="">
            </td>
            <td>
                Surat Persetujuan / Pertanyaan
                <p>Dengan ini menyatakan dengan sesungguhnya telah memberikan persetujuan unutk dilakukan tindakan bekam
                    sesuai kaidah al-Hijamah/SOP bekam terhadap diri sendiri/saudara/i</p>
                <p>Saya telah diberikan penjelasan oleh penterapis/pembekam mengenai</p>
                <ol type="a">
                    <li>
                        Apa itu bekam
                    </li>
                    <li>
                        Adap berbekam
                    </li>
                    <li>
                        Manfaat / Keguanaan berbekam
                    </li>
                </ol>
                <table width="100%">
                    <tr>
                        <td colspan="2">
                            Tanda Tangan
                        </td>
                    </tr>
                    <td>
                        yang membuat pernyataan<br>
                        Klien/Saudara/i
                        <br>
                        <br>
                        <br>
                        <br>
                        ({{$medicalRecord->patient->name}})
                    </td>
                    <td>
                        Saksi<br>
                        Keuangan/Terapis
                        <br>
                        <br>
                        <br>
                        <br>
                        (_____________________)
                    </td>
                    <tr>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
