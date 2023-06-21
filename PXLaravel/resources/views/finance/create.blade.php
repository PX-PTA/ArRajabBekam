<x-app-layout>
    <x-slot name="pagecss">
        <link rel="stylesheet" href="{{ asset('assets/styles/vendor/pickadate/classic.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/styles/vendor/pickadate/classic.date.css') }}">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    </x-slot>
    <x-slot name="slot">
        <div class="breadcrumb">
            <h1>Data Keuangan</h1>
            <ul>
                <li><a href="">Buat data Keuangan</a></li>
                <li>Data Keuangan</li>
            </ul>
        </div>

        <div class="separator-breadcrumb border-top"></div>
        {{-- end of breadcrumb --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card o-hidden mb-4">
                    <div class="card-header">
                        <h3 class="w-50 float-start card-title m-0">Buat Data Keuangan Baru</h3>
                    </div>
                    <div class="card-body">
                        <!-- begin::main-row -->
                        <div class="row">
                            <!-- start Hirozontal Form Layout -->
                            <div class="col-lg-12 mb-3">
                                <!--begin::form 2-->
                                @if ($curentMedical != null)
                                    <form method="post" action="{{ route('finance.store',$curentMedical->id) }}">
                                @else
                                    <form method="post" action="{{ route('finance.store') }}">
                                @endif
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="row">
                                            @if ($curentMedical != null)
                                                <div class="col-md-12 form-group mb-3">
                                                    <label for="firstName1">No Rekam Medis</label>

                                                    <input type="number" min="0" class="form-control"
                                                        id="no" name="medical_id" placeholder="Input Nomor"
                                                        required="required" value="{{ $curentMedical->id }}" readonly>
                                                </div>
                                            @endif

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="picker">Tanggal Transaksi</label>
                                                <div class="input-group">
                                                    <input value="{{ now()->toDateString() }}" type="date"
                                                        id="picker" class="form-control"
                                                        placeholder="Tanggal Transaksi" name="finance_date">
                                                </div>
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="picker1">Pilih Jenis transaksi</label>
                                                <select class="form-control" name="type">
                                                    <option value="1">Debit</option>
                                                    <option value="2">Kredit</option>
                                                </select>
                                            </div>

                                            <div class="col-md-12 form-group mb-3">
                                                <label for="firstName1">Nama Transaksi</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Input Nama Transaksi" required="required">
                                            </div>

                                            <div class="col-md-12 form-group mb-3">
                                                <label for="exampleInputEmail1">Deskripsi Transaksi</label>
                                                <textarea class="form-control" id="diagnosis" name="description" rows="4" placeholder="Input Diagnosa Lengkap"></textarea>
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="picker1">Pilih Kode transaksi</label>
                                                <select class="form-control" name="finance_code">
                                                    <option value="C01">Pemasukan</option>
                                                    <option value="C02">Pemasukan Klinik</option>
                                                    <option value="D01">Biaya Terapis</option>
                                                    <option value="D02">Biaya Klinik</option>
                                                    <option value="E01">Lain-Lain</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="firstName1">Jumlah Transaksi</label>
                                                <input type="number" min="0" class="form-control" id="no"
                                                    name="amount" placeholder="Input Jumlah Transaksi"
                                                    required="required">
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
    </x-slot>
</x-app-layout>
