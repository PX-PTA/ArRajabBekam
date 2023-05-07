<x-app-layout>
    <x-slot name="slot">
        <div class="breadcrumb">
            <h1>AR Rajab Bekam</h1>
            <ul>
                <li><a href="">Dashboard</a></li>
                <li>Version 1</li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>

        <div class="row">
            <div class="col-lg-5 col-md-12">
                <!-- CARD ICON -->
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="card card-icon mb-4">
                            <div class="card-body text-center">
                                <i class="i-Doctor"></i>
                                <p class="text-muted mt-2 mb-2">Total Patient</p>
                                <p class="text-primary text-24 line-height-1 m-0"> {{$patientData->count()}} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="card card-icon mb-4">
                            <div class="card-body text-center">
                                <i class="i-Files"></i>
                                <p class="text-muted mt-2 mb-2">Total Medical Checkup</p>
                                <p class="text-primary text-24 line-height-1 m-0"> {{ $medicalRecordData->count() }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="card card-icon mb-4">
                            <div class="card-body text-center">
                                <i class="i-Business-ManWoman"></i>                    
                                <p class="text-muted mt-2 mb-2">Today Patient</p>
                                <p class="text-primary text-24 line-height-1 m-0">{{$patientToday}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="card card-icon mb-4">
                            <div class="card-body text-center">
                                <i class="i-File-Cloud"></i>                    
                                <p class="text-muted mt-2 mb-2">Today Medical Checkup</p>
                                <p class="text-primary text-24 line-height-1 m-0">{{$medicalRecordToday}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title">Last Month Summary - {{ Carbon\Carbon::now()->subMonth()->format("M") }}</div>
                        <div class="row">
                            <div class="col-md-5">
                                <table class="table">
                                    <thead class="card-header">
                                        <tr>
                                            <th scope="col">Item</th>
                                            <th scope="col">Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Pasien</td>
                                            <td class="font-weight-bold text-success">{!! $patientMonth !!}</td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Rekam Medis</td>
                                            <td class="font-weight-bold  text-success">{!! $medicalRecordMonth !!}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <div id="echart5" style="height: 200px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- end of row-->
        <div class="row">
            <div class="col-md-6">
                <div class="card o-hidden mb-4">
                    <div class="card-header">
                        <h3 class="w-50 float-start card-title m-0">New Patient</h3>
                        <div class="dropdown dropleft text-end w-50 float-end">
                            <button class="btn bg-gray-700" type="button" id="dropdownMenuButton_table2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="nav-icon i-Gear-2"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_table2">
                                <a class="dropdown-item" href="#">Add new user</a>
                                <a class="dropdown-item" href="#">View All users</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">

                        <div class="table-responsive">

                            <table id="user_table" class=" table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Avatar</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Smith Doe</td>
                                        <td>

                                            <img class="rounded-circle m-0 avatar-sm-table "
                                                src="{{asset('assets/images/faces/1.jpg')}}" alt="">

                                        </td>

                                        <td>Smith@gmail.com</td>
                                        <td><span class="badge text-bg-success">Active</span></td>
                                        <td>
                                            <a href="#" class="text-success me-2">
                                                <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                            </a>
                                            <a href="#" class="text-danger me-2">
                                                <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jhon Doe</td>
                                        <td>

                                            <img class="rounded-circle m-0 avatar-sm-table "
                                                src="{{asset('assets/images/faces/1.jpg')}}" alt="">

                                        </td>

                                        <td>Jhon@gmail.com</td>
                                        <td><span class="badge text-bg-info">Pending</span></td>
                                        <td>
                                            <a href="#" class="text-success me-2">
                                                <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                            </a>
                                            <a href="#" class="text-danger me-2">
                                                <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Alex</td>
                                        <td>

                                            <img class="rounded-circle m-0 avatar-sm-table "
                                                src="{{asset('assets/images/faces/1.jpg')}}" alt="">

                                        </td>

                                        <td>Otto@gmail.com</td>
                                        <td><span class="badge text-bg-warning">Not Active</span></td>
                                        <td>
                                            <a href="#" class="text-success me-2">
                                                <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                            </a>
                                            <a href="#" class="text-danger me-2">
                                                <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of col-->

            <div class="col-md-6">
                <div class="card o-hidden mb-4">
                    <div class="card-header">
                        <h3 class="w-50 float-start card-title m-0">New Medical Record</h3>
                        <div class="dropdown dropleft text-end w-50 float-end">
                            <button class="btn bg-gray-700" type="button" id="dropdownMenuButton_table_1"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="nav-icon i-Gear-2"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_table_1">
                                <a class="dropdown-item" href="#">Add new user</a>
                                <a class="dropdown-item" href="#">View All users</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">

                        <div class="table-responsive">

                            <table id="sales_table" class="table  text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Date</th>

                                        <th scope="col">Price</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Watch</td>
                                        <td>

                                            12-10-2019

                                        </td>

                                        <td>$30</td>
                                        <td><span class="badge text-bg-success">Delivered</span></td>
                                        <td>
                                            <a href="#" class="text-success me-2">
                                                <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                            </a>
                                            <a href="#" class="text-danger me-2">
                                                <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Iphone</td>
                                        <td>

                                            23-10-2019

                                        </td>

                                        <td>$300</td>
                                        <td><span class="badge text-bg-info">Pending</span></td>
                                        <td>
                                            <a href="#" class="text-success me-2">
                                                <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                            </a>
                                            <a href="#" class="text-danger me-2">
                                                <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Watch</td>
                                        <td>

                                            12-10-2019

                                        </td>

                                        <td>$30</td>
                                        <td><span class="badge text-bg-warning">Not Delivered</span></td>
                                        <td>
                                            <a href="#" class="text-success me-2">
                                                <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                            </a>
                                            <a href="#" class="text-danger me-2">
                                                <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                            </a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of col-->
        </div>
        <!-- end of row-->
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