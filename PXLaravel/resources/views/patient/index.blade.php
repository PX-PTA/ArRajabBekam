<x-app-layout>
    <x-slot name="slot">
        <div class="breadcrumb">
            <h1>Pasien</h1>
            <ul>
                <li><a href="">Pasien List</a></li>
                <li>Pasien Data</li>
            </ul>
        </div>

        <div class="separator-breadcrumb border-top"></div>
        {{-- end of breadcrumb --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card o-hidden mb-4">
                    <div class="card-header" style="background-color:black;color:white">
                        <h3 style="color:white" class="w-50 float-start card-title m-0">Pasien List</h3>
                        <div class="dropdown dropleft text-end w-50 float-end">
                            <button class="btn bg-gray-700" type="button" id="dropdownMenuButton_table2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="nav-icon i-Gear-2"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_table2">
                                <a class="dropdown-item" href="{{route('patient.create')}}">Tambah Pasien</a>
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
                                        <th scope="col">No Telp.</th>
                                        <th scope="col">Umur</th>
                                        <th scope="col">Pengobatan</th>
                                        <th scope="col">Operasi</th>
                                        <th scope="col">Terakhir periksa</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($patientData as $patients)
                                    <tr>
                                        <th onclick="window.location.href='{{route('patient.show',$patients->id)}}'" scope="row">{{$patients->id}}</th>
                                        <td onclick="window.location.href='{{route('patient.show',$patients->id)}}'">{{$patients->name}}</td>
                                        <td onclick="window.location.href='{{route('patient.show',$patients->id)}}'">
                                            {{$patients->phoneNo}}
                                        </td>
                                        <td onclick="window.location.href='{{route('patient.show',$patients->id)}}'">
                                            {{$patients->age}}</td>
                                        <td onclick="window.location.href='{{route('patient.show',$patients->id)}}'">
                                            @if($patients->is_on_drugs)
                                            <span class="badge text-bg-success">Ya</span>
                                            @else
                                            <span class="badge text-bg-warning">Tidak</span>
                                            @endif
                                        </td>
                                        <td onclick="window.location.href='{{route('patient.show',$patients->id)}}'">
                                            @if($patients->is_already_surgery)
                                            <span class="badge text-bg-success">Ya</span>
                                            @else
                                            <span class="badge text-bg-warning">Tidak</span>
                                            @endif
                                        </td>
                                        <td onclick="window.location.href='{{route('patient.show',$patients->id)}}'">
                                             @if($patients->lastMedicalRecords()->count() > 0) 
                                             {{date('d-M-Y', strtotime($patients->lastMedicalRecords()->first()->date))}}
                                             @else 
                                                belum ada Rekam medis
                                             @endif
                                        </td>
                                        <td>
                                            <a href="{{route('patient.edit',$patients->id)}}" class="text-success me-2">
                                                <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                            </a>
                                            <a href="{{route('patient.destroy',$patients->id)}}" class="text-danger me-2">
                                                <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                            </a>
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
    </x-slot>
    <x-slot name="pagecss">
    </x-slot>
    <x-slot name="bottomjs">
    </x-slot>
</x-app-layout>