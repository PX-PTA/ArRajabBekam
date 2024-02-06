<x-app-layout>
    <x-slot name="pagecss">
        <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.css')}}">
        <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.date.css')}}">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    </x-slot>
    <x-slot name="slot">
        <div class="breadcrumb">
            <h1>Medical Record</h1>
            <ul>
                <li><a href="">Detail Medical Record</a></li>
                <li>No : {{$medicalRecord->id}}</li>
            </ul>
        </div>

        <div class="separator-breadcrumb border-top"></div>
        {{-- end of breadcrumb --}}

        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs justify-content-end mb-4" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="invoice-tab" data-toggle="tab" href="#invoice" role="tab"
                            aria-controls="invoice" aria-selected="true">Medical Checkup</a>
                    </li>

                </ul>
                <div class="card">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="invoice" role="tabpanel"
                            aria-labelledby="invoice-tab">
                            <div class="d-sm-flex mb-5" data-view="print">
                                <button onclick="window.location.href='{{route('medical-record.index')}}'" class="btn btn-danger mb-sm-0 mb-3 print-invoice"><i class="text-20 i-Left"></i> &nbsp Back</button>
                                &nbsp<button onclick="window.location.href='{{route('medical-record.edit',$medicalRecord->id)}}'" class="btn btn-info mb-sm-0 mb-3 print-invoice"><i class="text-20 i-Left"></i> &nbsp Edit</button>
                                <span class="m-auto"></span>
                                <button class="btn btn-primary mb-sm-0 mb-3 print-invoice">Print Rekam Medis</button>                                
                                &nbsp<button onclick="window.location.href='{{route('finance.create',$medicalRecord->id)}}'" class="btn btn-primary mb-sm-0 mb-3 print-invoice">Tambah Biaya Konsultasi</button>
                            </div>
                            <!---===== Print Area =======-->
                            <div id="print-area">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="font-weight-bold">Informasi Rekam Medis</h4>
                                        <p>#{{$medicalRecord->no}}</p>
                                    </div>
                                    <div class="col-md-6 text-sm-end">
                                        <p><strong>Rekam Medis: </strong> {{date('d M Y', strtotime($medicalRecord->date))}}</p>
                                    </div>
                                </div>
                                <div class="mt-3 mb-4 border-top"></div>
                                <div class="row mb-5">
                                    <div class="col-md-6 mb-3 mb-sm-0">
                                        <a href="{{route('patient.show',$medicalRecord->patient->id)}}" ><h5 class="font-weight-bold">{{$medicalRecord->patient->name}}</h5></a>
                                        <p>Umur : {{$medicalRecord->patient->age}}
                                        <br>
                                        Berat : {{$medicalRecord->weight}}
                                        <br>
                                        Tinggi : {{$medicalRecord->height}}
                                        <br>
                                        Alamat : 
                                        {{$medicalRecord->patient->address}}
                                        </p>
                                    </div>
                                    <div class="col-md-6 text-sm-end">
                                        <h5 class="font-weight-bold">Tekanan Darah</h5>
                                        <p>Dia : {{$medicalRecord->blood_pressure_dia}}</p>
                                        <p>Sys : {{$medicalRecord->blood_pressure_sys}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="font-weight-bold">Detail Konsultasi</h4>
                                        <table class="table table-hover mb-4">
                                            <thead class="bg-gray-300">
                                                <tr>
                                                    <th scope="col">Keluhan</th>
                                                    <th scope="col">Diagnosa</th>
                                                    <th scope="col">Tindakan</th>
                                                    <th scope="col">Hebal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{$medicalRecord->complaint}}</td>
                                                    <td>{{$medicalRecord->diagnosis}}</td>
                                                    <td>{{$medicalRecord->action}}</td>
                                                    <td>{{$medicalRecord->medicine}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="invoice-summary">
                                            <p>Terapis: <span>{{$medicalRecord->terapis}}</span></p>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="mt-3 mb-4 border-top"></div>
                                <h4 class="font-weight-bold">Total biaya konsultasi</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-hover mb-4">
                                            <thead class="bg-gray-300">
                                                <tr>
                                                    <th scope="col">Rincian</th>
                                                    <th scope="col">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Biaya Terapis</td>
                                                    <td>Rp @if($medicalRecord->total_terapist > 0 ){{$medicalRecord->total_terapist}}@else 0 @endif</td>
                                                </tr>
                                                <tr>
                                                    <td>Biaya Klinik</td>
                                                    <td>Rp  @if($medicalRecord->total_clinic > 0){{$medicalRecord->total_clinic}}@else {{$medicalRecord->payment_total}} @endif</td>
                                                </tr>
                                                <tr>
                                                    <td>Biaya Herbal</td>
                                                    <td>Rp  @if($medicalRecord->total_herbal > 0){{$medicalRecord->total_herbal}}@else 0 @endif</td>
                                                </tr>
                                                @php
                                                    $totalTransaksi = $medicalRecord->payment_total;
                                                @endphp
                                                @foreach($medicalRecord->financeData as $financeRecord)   
                                                    @if($financeRecord->finance_code != "A01"
                                                        && $financeRecord->finance_code != "B01"
                                                        && $financeRecord->finance_code != "B02"
                                                        && $financeRecord->finance_code != "A02")                                             
                                                        <tr>
                                                            <td>
                                                                {{$financeRecord->name}} - 
                                                                @if ($financeRecord->type == 1)
                                                                    @php
                                                                        $totalTransaksi = $totalTransaksi+$financeRecord->amount;
                                                                    @endphp
                                                                    Debit
                                                                @else
                                                                    Kredit
                                                                    @php
                                                                        $totalTransaksi = $totalTransaksi-$financeRecord->amount;
                                                                    @endphp
                                                                @endif 
                                                            </td>
                                                            <td>Rp {{$financeRecord->amount}}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <th>
                                                    Total biaya konsultasi
                                                </th>
                                                <th>
                                                    Rp  {{$totalTransaksi}}
                                                </th>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--==== / Print Area =====-->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </x-slot>
    <x-slot name="pagejs">
    </x-slot>
    <x-slot name="bottomjs">
    </x-slot>
</x-app-layout>