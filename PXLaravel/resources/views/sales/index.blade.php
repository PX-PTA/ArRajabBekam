<x-app-layout>
    <x-slot name="slot">
        <div class="breadcrumb">
            <h1>Penjualan</h1>
            <ul>
                <li><a href="">Penjualan List</a></li>
                <li>Penjualan Data</li>
            </ul>
        </div>

        <div class="separator-breadcrumb border-top"></div>
        {{-- end of breadcrumb --}}
        <div class="row">
            <div class="col-md-12">
                <section class="ul-widget-stat-s1">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6" >
                            <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4" style="background-color:#9beffa;color:white">
                                <div class="card-body text-center">
                                    <i class="i-Car-Items"></i>
                                    <div class="content">
                                        <p class="text-muted mt-2 mb-0">Penjualan</p>
                                        <p class="text-primary text-12 line-height-1 mb-2">Rp {{$totalSalePrice}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4" style="background-color:#9beffa;color:white">
                                <div class="card-body text-center">
                                    <i class="i-Data-Upload"></i>
                                    <div class="content">
                                        <p class="text-muted mt-2 mb-0">Terjual</p>
                                        <p class="text-primary text-12 line-height-1 mb-2">{{$totalSaleQuantity}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-12">
                <div class="card o-hidden mb-4">
                    <div class="card-header" style="background-color:black;color:white">
                        <h3 style="color:white;padding-top:7px" class="w-50 float-start card-title m-0">List Penjualan</h3>
                        <div class="dropdown dropleft text-end w-50 float-end">
                            <button class="btn bg-gray-700" type="button" id="dropdownMenuButton_table2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="nav-icon i-Gear-2"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_table2">
                                <a class="dropdown-item" href="{{route('sale.create')}}">Tambah Penjualan</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="user_table" class="table table-bordered text-centethead-light">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Total Barang</th>
                                        <th scope="col">Total Harga</th>
                                        <th scope="col">Tanggal Penjualan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($productData as $sale)
                                    <tr>
                                        <td onclick="window.location.href='{{route('sale.show',$sale->id)}}'">{{$sale->id}}</td>
                                        <td onclick="window.location.href='{{route('sale.show',$sale->id)}}'">
                                            {{$sale->description}}
                                        </td>
                                        <td onclick="window.location.href='{{route('sale.show',$sale->id)}}'">
                                            {{$sale->total_quantiy}}</td>
                                        <td onclick="window.location.href='{{route('sale.show',$sale->id)}}'">                                
                                            Rp <span class="badge text-bg-success">{{$sale->total_price}}</span> 
                                        </td>
                                        <td onclick="window.location.href='{{route('sale.show',$sale->id)}}'">
                                            {{$sale->created_at}}</td>
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