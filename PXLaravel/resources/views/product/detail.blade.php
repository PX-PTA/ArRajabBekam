<x-app-layout>
    <x-slot name="pagecss">
        <link rel="stylesheet" href="{{ asset('assets/styles/vendor/pickadate/classic.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/styles/vendor/pickadate/classic.date.css') }}">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    </x-slot>
    <x-slot name="slot">
        <div class="row">
            <div class="col-lg-4 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="ul-contact-detail__info">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <div class="ul-contact-detail__info-1">
                                        <h5>Nama Produk</h5>
                                        <span>{{ $product->name }}</span>
                                    </div>
                                </div>
                                <div class="col-6 text-center">
                                    <div class="ul-contact-detail__info-1">
                                        <h5>Harga Beli</h5>
                                        <span>{{ $product->buy_price }}</span>
                                    </div>
                                </div>
                                <div class="col-6 text-center">
                                    <div class="ul-contact-detail__info-1">
                                        <h5>Harga Jual</h5>
                                        <span>{{ $product->sell_price }}</span>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <div class="ul-contact-detail__info-1">
                                        <h5>Stok Barang</h5>
                                        <span>{{ $product->inventory }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xl-8">
                <!-- begin::basic-tab -->
                <div class="card mb-4 mt-4">
                    <div class="card-header" style="background-color:black">
                        <h3 class="w-50 float-start card-title m-0" style="color:white;padding-top:7px">Riwayat Stok dan Penjualan Barang</h3>
                        <div class="dropdown dropleft text-end w-50 float-end">
                            <button class="btn bg-gray-700" type="button" id="dropdownMenuButton_table2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="nav-icon i-Gear-2"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_table2">
                                <a class="dropdown-item"
                                    href="{{ route('sale.create') }}">Tambah Penjualan</a>
                                <a class="dropdown-item" href="{{ route('product.edit', $product->id) }}">Edit
                                    Produk</a>
                                <a class="dropdown-item" href="{{ route('product.edit', $product->id) }}">Edit
                                    Stok</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active show" id="nav-sale-tab" data-toggle="tab"
                                    href="#nav-sale" role="tab" aria-controls="nav-sale"
                                    aria-selected="true">Riwayat Stok</a>
                                <a class="nav-item nav-link" id="nav-stok-tab" data-toggle="tab"
                                    href="#nav-stok" role="tab" aria-controls="nav-stok"
                                    aria-selected="true">Penjualan</a>
                            </div>
                        </nav>
                        <div class="tab-content ul-tab__content" id="nav-tabContent">
                            <div class="tab-pane fade active show" id="nav-sale" role="tabpanel"
                                aria-labelledby="nav-home-tab" >
                                <div class="ul-contact-detail__timeline">
                                    <div class="row">
                                        <div class="col-lg-12 col-xl-12">
                                            @if ($product->Inventory()->count() > 0)
                                                @foreach ($product->Inventory()->get() as $Inventory)
                                                    <div class="ul-contact-detail__timeline-row">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="ul-contact-detail__right-timeline">
                                                                    <a class="ul-widget4__title d-block">Tanggal Pembaruan : {{ $Inventory->created_at }} </a>
                                                                    <p>Deskripsi : {{ $Inventory->description }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="ul-contact-detail__timeline-row">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="ul-contact-detail__right-timeline">
                                                                <a class="ul-widget4__title d-block">Belum Ada Penjualan</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-stok" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <div class="ul-contact-detail__timeline">
                                    <div class="row">
                                        <div class="col-lg-12 col-xl-12">
                                            @if ($product->salesDetail()->count() > 0)
                                                @foreach ($product->salesDetail()->get() as $salesDetail)
                                                    <div class="ul-contact-detail__timeline-row" >
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="ul-contact-detail__right-timeline">
                                                                    <a class="ul-widget4__title d-block">Tanggal Penjualan
                                                                        : {{ $salesDetail->created_at }} </a>
                                                                    <a class="ul-widget4__title d-block">Keuntungan
                                                                        : Rp {{ ($salesDetail->sell_price - $salesDetail->buy_price)*$salesDetail->quantity  }} </a>
                                                                    <small
                                                                        class="text-mute"></small>
                                                                    <p>Jumlah Terjual : {{ $salesDetail->quantity }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="ul-contact-detail__timeline-row">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="ul-contact-detail__right-timeline">
                                                                <a class="ul-widget4__title d-block">Belum Pembaruan Stok</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end::basic-tab -->
            </div>
        </div>
    </x-slot>
    <x-slot name="pagejs">
    </x-slot>
    <x-slot name="bottomjs">
    </x-slot>
</x-app-layout>
