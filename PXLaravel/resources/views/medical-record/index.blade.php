<x-app-layout>
    <x-slot name="slot">
        <div class="breadcrumb">
            <h1>Medical Records</h1>
            <ul>
                <li><a href="">Medical-Checkup</a></li>
                <li>Medical-Checkup Data</li>
            </ul>
        </div>

        <div class="separator-breadcrumb border-top"></div>
        {{-- end of breadcrumb --}}
        
        <div class="row">
            <div class="col-md-12">
                <div class="card o-hidden mb-4">
                    <div class="card-header">
                        <h3 class="w-50 float-start card-title m-0">Medical Checkup Records</h3>
                        <div class="dropdown dropleft text-end w-50 float-end">
                            <button class="btn bg-gray-700" type="button" id="dropdownMenuButton_table2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="nav-icon i-Gear-2"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_table2">
                                <a class="dropdown-item" href="{{route('medical-record.create')}}">Add new Medical Checkup</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="user_table" class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">No</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Patient</th>
                                        <th scope="col">Terapis</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($medicalRecordData as $medicalRecord)
                                    <tr>
                                        <th onclick="window.location.href='{{route('medical-record.show',$medicalRecord->id)}}'" scope="row">{{$medicalRecord->id}}</th>
                                        <td onclick="window.location.href='{{route('medical-record.show',$medicalRecord->id)}}'">{{$medicalRecord->no}}</td>
                                        <td onclick="window.location.href='{{route('medical-record.show',$medicalRecord->id)}}'">{{$medicalRecord->date}}</td>
                                        <td onclick="window.location.href='{{route('medical-record.show',$medicalRecord->id)}}'">{{$medicalRecord->patient->name}}</td>
                                        <td onclick="window.location.href='{{route('medical-record.show',$medicalRecord->id)}}'">{{$medicalRecord->terapis}}</td>
                                        <td>
                                            <a href="{{route('medical-record.edit',$medicalRecord->id)}}" class="text-success me-2">
                                                <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                            </a>
                                            <a href="{{route('medical-record.destroy',$medicalRecord->id)}}" class="text-danger me-2">
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