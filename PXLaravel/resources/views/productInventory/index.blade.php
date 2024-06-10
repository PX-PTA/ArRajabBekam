<x-app-layout>
    <x-slot name="slot">
        <div class="breadcrumb">
            <h1>Stok History</h1>
            <ul>
                <li><a href="">Stok History List</a></li>
                <li>Stok History Data</li>
            </ul>
        </div>

        <div class="separator-breadcrumb border-top"></div>
        {{-- end of breadcrumb --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card o-hidden mb-4">
                    <div class="card-header" style="background-color:black;color:white">
                        <h3 style="color:white;padding-top:7px" class="w-50 float-start card-title m-0">Stok History List</h3>
                        <div class="dropdown dropleft text-end w-50 float-end">
                            <button class="btn bg-gray-700" type="button" id="dropdownMenuButton_table2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="nav-icon i-Gear-2"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_table2">
                                <a class="dropdown-item" href="{{route('product.stok')}}">Atur Stok</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="user_table" class=" table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">Descripsi</th>
                                        <th scope="col">Stock</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($productData as $product)
                                    @if($product->product()->first() != null)
                                    <tr>
                                        <th onclick="window.location.href='{{route('product.show',$product->product()->first()->id)}}'" scope="row">{{$product->id}}</th>
                                        <td onclick="window.location.href='{{route('product.show',$product->product()->first()->id)}}'">{{$product->product()->first()->name}}</td>
                                        <td onclick="window.location.href='{{route('product.show',$product->product()->first()->id)}}'">{{$product->description}}</td>
                                        <td onclick="window.location.href='{{route('product.show',$product->product()->first()->id)}}'">{{$product->quantity}}</td>
                                    </tr>
                                    @endif
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