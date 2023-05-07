<x-app-layout>
    <x-slot name="pagecss">
        <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.css')}}">
        <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.date.css')}}">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    </x-slot>
    <x-slot name="slot">
        <div class="breadcrumb">
            <h1>Patient</h1>
            <ul>
                <li><a href="">Detail Patient</a></li>
                <li>Patient Name : </li>
            </ul>
        </div>

        <div class="separator-breadcrumb border-top"></div>
        {{-- end of breadcrumb --}}
        <div class="row">
            <div class="col-lg-4 col-xl-4">
                <div class="card">
                    <img class="d-block w-100" src="{{ asset('assets/images/products/iphone-1.jpg') }}"
                        alt="First slide">
                    <div class="card-body">
                        <div class="ul-contact-detail__info">
                            <div class="row">
                                <div class="col-6 text-center">
                                    <div class="ul-contact-detail__info-1">
                                        <h5>Nama</h5>
                                        <span>{{$patient->name}}</span>
                                    </div>
                                    <div onclick="window.location='https://api.whatsapp.com/send?phone={{$patient->phoneNo}}'" class="ul-contact-detail__info-1">
                                        <h5>No Telp. / Wa</h5>
                                        <span>{{$patient->phoneNo}}</span>
                                    </div>
                                    <div class="ul-contact-detail__info-1">
                                        <h5>Usia</h5>
                                        <span>{{$patient->age}}</span>
                                    </div>
                                </div>
                                <div class="col-6 text-center">
                                    <div class="ul-contact-detail__info-1">
                                        <h5>Agama</h5>
                                        <span>{{$patient->religion}}</span>
                                    </div>
                                    <div class="ul-contact-detail__info-1">
                                        <h5>Pekerjaan</h5>
                                        <span>{{$patient->job}}</span>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <div class="ul-contact-detail__info-1">
                                        <h5>Alamat</h5>
                                        <span>{{$patient->address}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xl-8">
                <!-- begin::basic-tab -->
                <div class="card mb-4 mt-4">
                    <div class="card-header bg-transparent">      
                        <h3 class="w-50 float-start card-title m-0">Riwayat Medical Checkup</h3>
                        <div class="dropdown dropleft text-end w-50 float-end">
                            <button class="btn bg-gray-700" type="button" id="dropdownMenuButton_table2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="nav-icon i-Gear-2"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_table2">
                                <a class="dropdown-item" href="{{route('medical-record.create',$patient->id)}}">Add new Medical Record</a>
                                <a class="dropdown-item" href="{{route('patient.edit',$patient->id)}}">Edit Patient</a>
                                <a class="dropdown-item" href="{{route('patient.print',$patient->id)}}">Print Medical Checkup</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active show" id="nav-home-tab" data-toggle="tab"
                                    href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
                            </div>
                        </nav>
                        <div class="tab-content ul-tab__content" id="nav-tabContent">
                            <div class="tab-pane fade active show" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <div class="ul-contact-detail__timeline">
                                    <div class="row">
                                        <div class="col-lg-12 col-xl-12">
                                            @if($patient->medicalRecords->count() > 0)
                                            @foreach($patient->medicalRecords as $medicalRecord)
                                            <div class="ul-contact-detail__timeline-row" onclick="window.location.href='{{route("medical-record.show",$medicalRecord->id)}}'">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="ul-contact-detail__right-timeline">
                                                            <a  class="ul-widget4__title d-block">Medical Record No : {{$medicalRecord->no}} </a>
                                                            <small class="text-mute">{{$medicalRecord->date}}</small>
                                                            <p>Keluhan : {{$medicalRecord->complaint}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            @else
                                            <div class="ul-contact-detail__timeline-row">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="ul-contact-detail__right-timeline">
                                                            <a  class="ul-widget4__title d-block">belum ada jejak medical </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end::basic-tab -->
            </div>
        </div>
    </x-slot>
    <x-slot name="pagejs">
    </x-slot>
    <x-slot name="bottomjs">
    </x-slot>
</x-app-layout>