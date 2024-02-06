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
                <li><a href="">Create New Medical Record</a></li>
                <li>Medical Record</li>
            </ul>
        </div>

        <div class="separator-breadcrumb border-top"></div>
        {{-- end of breadcrumb --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card o-hidden mb-4">
                    <div class="card-header">
                        <h3 class="w-50 float-start card-title m-0">New Medical Record</h3>
                    </div>
                    <div class="card-body">
                        <!-- begin::main-row -->
                        <div class="row">
                            <!-- start Hirozontal Form Layout -->
                            <div class="col-lg-12 mb-3">
                                <!--begin::form 2-->
                                <form method="post" action="{{route('medical-record.store')}}">
                                    <input id="patient_id" type="hidden" name="patient_id" @if($currentPatient != null) value="{{$currentPatient->id}}" @endif>
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="row">
                                                <div class="col-md-3 form-group mb-3">
                                                    <label for="firstName1">No</label>
                                                    <input type="number" min="0" class="form-control" id="no" name="no"
                                                        placeholder="Input Nomor" required="required" @if($lastMedical != null) value="{{$lastMedical->id+1}}" @else  value="1" @endif>
                                                </div>

                                                <div class="col-md-6 form-group mb-3">
                                                    <label for="firstName1">Nama Pasien</label>
                                                    <input type="text" class="form-control" id="name" name="name"
                                                        placeholder="Input Nama" required="required" @if($currentPatient != null) value="{{$currentPatient->name}}" @endif>
                                                </div>

                                                <div class="col-md-3 form-group mb-3">
                                                    <label for="picker">Tanggal</label>
                                                    <div class="input-group">
                                                        <input value="{{now()->toDateString()}}" type="date" id="picker"
                                                            class="form-control" placeholder="Tanggal Rekam"
                                                            name="date">
                                                    </div>
                                                </div>

                                                <div class="col-md-6 form-group mb-3">
                                                    <label for="exampleInputEmail1">Keluhan</label>
                                                    <textarea class="form-control" id="complaint" name="complaint"
                                                        rows="4" placeholder="Input Keluhan Lengkap"></textarea>
                                                </div>

                                                <div class="col-md-6 form-group mb-3">
                                                    <label for="exampleInputEmail1">Diagnosa</label>
                                                    <textarea class="form-control" id="diagnosis" name="diagnosis"
                                                        rows="4" placeholder="Input Diagnosa Lengkap"></textarea>
                                                </div>

                                                <div class="col-md-6 form-group mb-3">
                                                    <label for="exampleInputEmail1">tindakan</label>
                                                    <textarea class="form-control" id="action" name="action" rows="4"
                                                        placeholder="Input Tindakan Lengkap"></textarea>
                                                </div>

                                                <div class="col-md-6 form-group mb-3">
                                                    <label for="exampleInputEmail1">Herbal</label>
                                                    <textarea class="form-control" id="medicine" name="medicine"
                                                        rows="4" placeholder="Input Hebal Lengkap"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="card col-md-5">
                                                <div class="card-header">
                                                    Tekanan Darah
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group row ">
                                                        <div class="col-md-6 form-group mb-3">
                                                            <label for="firstName1">Sys</label>
                                                            <input type="text" class="form-control" id="sys" name="sys"
                                                                placeholder="Input Sys">
                                                        </div>
                                                        <div class="col-md-6 form-group mb-3">
                                                            <label for="firstName1">Dia</label>
                                                            <input type="text" class="form-control" id="dia" name="dia"
                                                                placeholder="Input Dia">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                            
                                            </div>
                                            <div class="card col-md-5">
                                                <div class="card-header">
                                                    Terapis
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <div class="col-md-12 form-group mb-3">
                                                            <label for="firstName1">Terapis</label>
                                                            <input type="text" class="form-control" id="terapist"
                                                                name="terapis" placeholder="Input Terapist">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="row">
                                                <div class="col-md-12 form-group mb-3">
                                                    <label for="total_payment">Biaya Herbal</label>
                                                    <input type="number" class="form-control" id="total_herbal" name="total_herbal"
                                                        placeholder="Biaya Herbals" value="0" onkeyup="payment()">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 form-group mb-3">
                                                    <label for="total_payment">Biaya Terapis</label>
                                                    <input type="number" class="form-control" id="total_terapist" name="total_terapist"
                                                        placeholder="Biaya Terapis" value="0" onkeyup="payment()">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 form-group mb-3">
                                                    <label for="total_payment">Biaya klinik</label>
                                                    <input type="number" class="form-control" id="total_clinic" name="total_clinic"
                                                        placeholder="Biaya klinik" value="0" onkeyup="payment()">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 form-group mb-3">
                                                    <label for="total_payment">Total Konsultasi</label>
                                                    <input  type="number" class="form-control" id="f_total_payment" name="f_total_payment"
                                                        placeholder="Biaya konsultasi" value="0">
                                                    <input  type="hidden" class="form-control" id="r_total_payment" name="r_total_payment"
                                                            placeholder="Biaya konsultasi" value="0">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="mc-footer">
                                                <div class="row text-end">
                                                    <div class="col-lg-4"></div>
                                                    <div class="col-lg-6 text-start">
                                                        <button type="submit" class="btn btn-primary m-1">Save</button>
                                                        <button type="button"
                                                            onclick="window.location.href='{{route('medical-record.index')}}'"
                                                            class="btn btn-outline-secondary m-1">Cancel</button>
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
        <script src="{{asset('assets/js/vendor/pickadate/picker.js')}}"></script>
        <script src="{{asset('assets/js/vendor/pickadate/picker.date.js')}}"></script>
    </x-slot>
    <x-slot name="bottomjs">
        <script src="{{asset('assets/js/form.basic.script.js')}}"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <script>
            function payment() {
                let w = document.getElementById("total_herbal");
                let x = document.getElementById("total_terapist");
                let y = document.getElementById("total_clinic");
                let z = document.getElementById("r_total_payment");
                let z1 = document.getElementById("f_total_payment");
                let v = 0;
                let w1 = Number(w.value);
                let x1 = Number(x.value);
                let y1 = Number(y.value);
                
                if(w1 > 0 || x1 > 0 || y1 > 0){
                    v = Number(w1+x1+y1);
                    z1.disabled = true;
                }else{
                    v = Number(0);
                    z1.disabled = false;
                }

                z1.value = v;
                z.value = v;
            }
            </script>
        <script>
        $(function() {            
            var availableTags = [
                @foreach($patients as $index => $patient) 
                { 
                    id : "{{$patient->id}}",
                    value : "{{$patient->name}}"
                }
                @if($index < $patients->count() -1),
                @endif
                @endforeach
            ];
            $("#name").autocomplete({
                    minLength: 0,
                    source: availableTags,
                    select: function(event, ui) {
                        $("#name").val(ui.item.value);
                        $("#patient_id").val(ui.item.id);
                        return false;
                    },
                    focus: function(event, ui) {
                        $("#name").val(ui.item.value);
                        return false;
                    },
                })
                .autocomplete("instance")._renderItem = function(ul, item) {
                    return $("<li>")
                        .append("<div>" + item.value +  "</div>")
                        .appendTo(ul);
                };
        });
        </script>
    </x-slot>
</x-app-layout>