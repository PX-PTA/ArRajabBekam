<x-app-layout>
    <x-slot name="pagecss">
        <link rel="stylesheet" href="{{ asset('assets/styles/vendor/pickadate/classic.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/styles/vendor/pickadate/classic.date.css') }}">
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
                                <form method="post" action="{{ route('medical-record.update', $medicalRecord->id) }}">
                                    <input id="patient_id" type="hidden" name="patient_id"
                                        @if ($currentPatient != null) value="{{ $currentPatient->id }}" @endif>
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="row">
                                                <div class="col-md-3 form-group mb-3">
                                                    <label for="firstName1">No</label>
                                                    <input type="number" min="0" class="form-control"
                                                        id="no" name="no" placeholder="Input Nomor"
                                                        required="required" value="{{ $medicalRecord->id }}">
                                                </div>

                                                <div class="col-md-9 form-group mb-3">
                                                    <label for="firstName1">Nama Pasien</label>
                                                    <input type="text" class="form-control" id="name"
                                                        name="name" placeholder="Input Nama" required="required"
                                                        @if ($currentPatient != null) value="{{ $currentPatient->name }}" @endif>
                                                </div>

                                                <div class="col-md-4 form-group mb-3">
                                                    <label for="website">Berat Badan (Kg)</label>
                                                    <input value="{{ $medicalRecord->weight }}" class="form-control"
                                                        id="job" name="weight" placeholder="Input Berat Badan">
                                                </div>

                                                <div class="col-md-4 form-group mb-3">
                                                    <label for="website">Tinggi Badan (cm)</label>
                                                    <input value="{{ $medicalRecord->height }}" class="form-control"
                                                        id="job" name="height" placeholder="Input Tinggi Badan">
                                                </div>
                                                <div class="col-md-4 form-group mb-3">
                                                    <label for="picker">Tanggal</label>
                                                    <div class="input-group">
                                                        <input type="date" id="picker" class="form-control"
                                                            placeholder="Tanggal Rekam" name="date"
                                                            value="{{ $medicalRecord->date }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="exampleInputEmail1">Keluhan</label>
                                                <textarea class="form-control" id="complaint" name="complaint" rows="4" placeholder="Input Keluhan Lengkap">{{ $medicalRecord->complaint }}</textarea>
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="exampleInputEmail1">Diagnosa</label>
                                                <textarea class="form-control" id="diagnosis" name="diagnosis" rows="4" placeholder="Input Diagnosa Lengkap">{{ $medicalRecord->diagnosis }}</textarea>
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="exampleInputEmail1">tindakan</label>
                                                <textarea class="form-control" id="action" name="action" rows="4" placeholder="Input Tindakan Lengkap">{{ $medicalRecord->action }}</textarea>
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="exampleInputEmail1">Herbal</label>
                                                <textarea class="form-control" id="medicine" name="medicine" rows="4" placeholder="Input Hebal Lengkap">{{ $medicalRecord->medicine }}</textarea>
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
                                                        <input type="text" class="form-control" id="sys"
                                                            name="sys" placeholder="Input Sys"
                                                            value="{{ $medicalRecord->blood_pressure_sys }}">
                                                    </div>
                                                    <div class="col-md-6 form-group mb-3">
                                                        <label for="firstName1">Dia</label>
                                                        <input type="text" class="form-control" id="dia"
                                                            name="dia" placeholder="Input Dia"
                                                            value="{{ $medicalRecord->blood_pressure_dia }}">
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
                                                            name="terapis" placeholder="Input Terapist"
                                                            value="{{ $medicalRecord->terapis }}">
                                                    </div>
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
                                                    <button type="button"
                                                        onclick="window.location.href='{{ route('medical-record.index') }}'"
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
        <script src="{{ asset('assets/js/vendor/pickadate/picker.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/pickadate/picker.date.js') }}"></script>
    </x-slot>
    <x-slot name="bottomjs">
        <script src="{{ asset('assets/js/form.basic.script.js') }}"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <script>
            $(function() {
                var availableTags = [
                    @foreach ($patients as $index => $patient)
                        {
                            id: "{{ $patient->id }}",
                            value: "{{ $patient->name }}"
                        }
                        @if ($index < $patients->count() - 1)
                            ,
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
                            .append("<div>" + item.value + "</div>")
                            .appendTo(ul);
                    };
            });
        </script>
    </x-slot>
</x-app-layout>
