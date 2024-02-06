<x-app-layout>
    <x-slot name="slot">
        <div class="breadcrumb">
            <h1>Keuangan</h1>
            <ul>
                <li><a href="">Data Keuangan</a></li>
                <li>Data Keuangan</li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>
        {{-- end of breadcrumb --}}
        <div class="row">
            <div class="col-md-12">
                <section class="ul-widget-stat-s1">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                                <div class="card-body text-center">
                                    <i class="i-Car-Items"></i>
                                    <div class="content">
                                        <p class="text-muted mt-2 mb-0">Pemasukan</p>
                                        <p class="text-primary text-12 line-height-1 mb-2">Rp {{$financeIncome}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                                <div class="card-body text-center">
                                    <i class="i-Data-Upload"></i>
                                    <div class="content">
                                        <p class="text-muted mt-2 mb-0">Pengeluaran</p>
                                        <p class="text-primary text-12 line-height-1 mb-2">Rp {{$financeOutcome}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                                <div class="card-body text-center">
                                    <i class="i-Data-Upload"></i>
                                    <div class="content">
                                        <p class="text-muted mt-2 mb-0">Saldo</p>
                                        <p class="text-primary text-12 line-height-1 mb-2">Rp {{$financeIncome-$financeOutcome}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-12">
                <div class="card o-hidden mb-4">
                    <div class="card-header">
                        <h3 class="w-50 float-start card-title m-0">Data Keuangan</h3>
                        <div class="dropdown dropleft text-end w-50 float-end">
                            <button class="btn bg-gray-700" type="button" id="dropdownMenuButton_table2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="nav-icon i-Gear-2"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_table2">
                                <a class="dropdown-item" href="{{route('finance.create')}}">Tambah Data Keuangan</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="user_table" class=" table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Jenis</th>
                                        <th scope="col">Code</th>
                                        <th scope="col">Rekam Medis Id</th>
                                        <th scope="col">Tipe Pembayaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($financeData as $patients)
                                    <tr>
                                        <th scope="row">{{$patients->id}}</th>
                                        <td >{{$patients->name}}</td>
                                        <td >
                                            {{$patients->description}}
                                        </td>
                                        <td >
                                            Rp {{$patients->amount}}</td>
                                        <td >
                                            @if($patients->type == 1)
                                            <span class="badge text-bg-success">Debit</span>
                                            @else
                                            <span class="badge text-bg-danger">Kredit</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{$patients->finance_code}}
                                        </td>
                                        <td>
                                            {{$patients->medical_record_id}}
                                        </td>
                                        <td >
                                            <span class="badge text-bg-success">{{$patients->payment}}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of col-->
        </div>
    </x-slot>
    <x-slot name="pagejs">
        <script src="{{asset('assets/js/vendor/echarts.min.js')}}"></script>
        <script src="{{asset('assets/js/es5/echart.options.min.js')}}"></script>
        <script src="{{asset('assets/js/vendor/datatables.min.js')}}"></script>
        <script src="{{asset('assets/js/es5/dashboard.v2.script.js')}}"></script>
        <script src="{{asset('assets/js/vendor/apexcharts.min.js')}}"></script>

    </x-slot>
    <x-slot name="pagecss">
    </x-slot>
    <x-slot name="bottomjs">
    </x-slot>
</x-app-layout>