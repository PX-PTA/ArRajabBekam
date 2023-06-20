<x-app-layout>
    <x-slot name="slot">
        <div class="breadcrumb">
            <h1>Pasien</h1>
            <ul>
                <li><a href="">Edit Data Pasien</a></li>
                <li>Patient Data</li>
            </ul>
        </div>

        <div class="separator-breadcrumb border-top"></div>
        {{-- end of breadcrumb --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card o-hidden mb-4">
                    <div class="card-header">
                        <h3 class="w-50 float-start card-title m-0">Edit Data Pasiens</h3>
                    </div>
                    <div class="card-body">
                        <!-- begin::main-row -->
                        <div class="row">
                            <!-- start Hirozontal Form Layout -->
                            <div class="col-lg-12 mb-3">
                                <!--begin::form 2-->
                                <form method="post" action="{{route('patient.update', $patient->id)}}">
                                    <input type="hidden" name="id" value="{{$patient->id}}">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="row">
                                                <div class="col-md-6 form-group mb-3">
                                                    <label for="firstName1">Nama Lengkap</label>
                                                    <input value="{{$patient->name}}" type="text" class="form-control" id="name" name="name" placeholder="Input Nama" required="required">
                                                </div>

                                                <div class="col-md-6 form-group mb-3">
                                                    <label for="phone">No Telp. / Wa</label>
                                                    <input value="{{$patient->phoneNo}}" type="tel"  class="form-control" id="phoneNo" name="phoneNo" 
                                                        placeholder="Input No Telp">
                                                </div>

                                                <div class="col-md-12 form-group mb-3">
                                                    <label for="exampleInputEmail1">Alamat</label>
                                                    <textarea class="form-control" id="address" name="address"
                                                        placeholder="Input Alamat Lengkap">{{$patient->address}}</textarea>
                                                </div>

                                                <div class="col-md-4 form-group mb-3">
                                                    <label for="credit1">Agama</label>
                                                    <input value="{{$patient->religion}}" class="form-control" id="religion" name="religion" placeholder="Input Agama">
                                                </div>

                                                <div class="col-md-4 form-group mb-3">
                                                    <label for="website">Pekerjaan</label>
                                                    <input value="{{$patient->job}}" class="form-control" id="job" name="job" placeholder="Input Pekerjaan">
                                                </div>

                                                <div class="col-md-4 form-group mb-3">
                                                    <label for="website">Usia</label>
                                                    <input value="{{$patient->age}}" class="form-control" id="age" name="age" type="number"
                                                        placeholder="Input Usia" min="0" max="100">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-4">
                                            <label for="staticEmail"
                                                class="action-bar-horizontal-label col-lg-4 col-form-label">Riwayat
                                                Penyakit:</label>
                                            <div class="col-lg-6 d-inline-flex align-self-center">
                                                <label class="checkbox checkbox-primary me-2">
                                                    <input @if($patient->is_already_surgery) checked="" @endif type="checkbox" name="is_already_surgery">
                                                    <span>Riwayat Operasi</span>
                                                    <span  class="checkmark"></span>
                                                </label>
                                                <label class="checkbox checkbox-primary me-2">
                                                    <input @if($patient->is_on_drugs) checked="" @endif type="checkbox" name="is_on_drugs">
                                                    <span>Sedang konsumsi Obat</span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="row">
                                                <div class="col-md-12 form-group mb-3">
                                                    <label for="exampleInputEmail1">Detail Riwayat Operasi</label>
                                                    <textarea class="form-control" id="surgery_details" name="surgery_details"
                                                        placeholder="Input Detail Riwayat Operasi">{{$patient->surgery_details}}</textarea>
                                                </div>
                                                <div class="col-md-12 form-group mb-3">
                                                    <label for="exampleInputEmail1">Detail konsumsi Obat</label>
                                                    <textarea class="form-control" id="drug_details" name="drug_details"
                                                        placeholder="Input Detail konsumsi Obat">{{$patient->drug_details}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="mc-footer">
                                            <div class="row text-end">
                                                <div class="col-lg-4"></div>
                                                <div class="col-lg-6 text-start">
                                                    <button type="submit" class="btn btn-primary m-1">Save</button>
                                                    <button onclick="window.location.href='{{route('patient.index')}}'" type="button" class="btn btn-outline-secondary m-1">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- end::form 2-->
                            </div>
                            <!-- end Hirozontal Form Layout -->
                        </div>
                        <!-- end::main-row -->
                    </div>
                    </section>
                    <!-- end::basic action bar -->
                </div>
                <!-- end of col-->
            </div>
    </x-slot>
    <x-slot name="pagejs">
        <script src="{{asset('assets/js/vendor/datatables.min.js')}}"></script>
        <script src="{{asset('assets/js/es5/dashboard.v2.script.js')}}"></script>
    </x-slot>
    <x-slot name="pagecss">
    </x-slot>
    <x-slot name="bottomjs">
    </x-slot>
</x-app-layout>