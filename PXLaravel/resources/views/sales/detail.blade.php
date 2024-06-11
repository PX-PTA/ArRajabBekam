<x-app-layout>
    <x-slot name="pagecss">
        <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.css')}}">
        <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.date.css')}}">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    </x-slot>
    <x-slot name="slot">
        <div class="breadcrumb">
            <h1>Penjualan</h1>
            <ul>
                <li><a href="">Detail Penjualan</a></li>
                <li>No : {{$sale->id}}</li>
            </ul>
        </div>

        <div class="separator-breadcrumb border-top"></div>
        {{-- end of breadcrumb --}}

        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs justify-content-end mb-4" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="invoice-tab" data-toggle="tab" href="#invoice" role="tab"
                            aria-controls="invoice" aria-selected="true">Detail Penjualan</a>
                    </li>

                </ul>
                <div class="card">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="invoice" role="tabpanel"
                            aria-labelledby="invoice-tab">
                            <!---===== Print Area =======-->
                            <div id="print-area">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="font-weight-bold">Informasi Penjualan</h4>
                                        <p>#{{$sale->id}}</p>
                                    </div>
                                    <div class="col-md-6 text-sm-end">
                                        <p><strong>Tanggal Penjualan: </strong> {{date('d M Y', strtotime($sale->created_at))}}</p>
                                    </div>
                                </div>
                                <div class="mt-3 mb-4 border-top"></div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="font-weight-bold">Detail Product Penjualan</h4>
                                        <table class=" table table-bordered text-center">
                                            <thead class="bg-gray-300">
                                                <tr>
                                                    <th scope="col">Nama Product</th>
                                                    <th scope="col">Jumlah</th>
                                                    <th scope="col">Total Harga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($sale->SalesDetail()->get() as $saleDetail)
                                                <tr>
                                                    <td>{{$saleDetail->product()->first()->name}}</td>
                                                    <td>{{$saleDetail->quantity}}</td>
                                                    <td>Rp {{$saleDetail->sell_price*$saleDetail->quantity}}</td>
                                                    
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <td></td>
                                                    <td>{{$sale->total_quantity}}</td>
                                                    <td>Rp {{$sale->total_price}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>            
                            </div>
                            <!--==== / Print Area =====-->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </x-slot>
    <x-slot name="pagejs">
    </x-slot>
    <x-slot name="bottomjs">
    </x-slot>
</x-app-layout>