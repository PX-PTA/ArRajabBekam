<x-app-layout>
    <x-slot name="slot">
        <div class="row">
            <div class="col-md-12">
                <div class="card o-hidden mb-4">
                    <div class="card-header">
                        <h3 class="w-50 float-start card-title m-0">Penjualan Baru</h3>
                    </div>
                    <div class="card-body">
                        <section class="chekout-page">
                            <form method="post" action="{{ route('sale.store') }}">
                                @csrf    
                                <div class="row">
                                    <div class="col-lg-5 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title">List Produk</div>

                                                <div class="table-responsive">
                                                    <table class="table" id="sales-data">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Produk</th>
                                                                <th scope="col">Harga</th>
                                                                <th scope="col">Jumlah</th>
                                                                <th scope="col">Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr id="emptyRow">
                                                                <td scope="row" colspan="5">
                                                                    <h6 class="heading">Belum Ada Barang</h6>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-12 mt-5">
                                                        <div class="ul-product-cart__invoice">
                                                            <div class="card-title">
                                                                <h4 class="heading text-primary">Total Pembayaran</h4>
                                                            </div>
                                                            <table class="table">
                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row" class="text-primary text-16">
                                                                            Total:
                                                                        </th>
                                                                        <input type="hidden" id="totalPriceSale" value=0>
                                                                        <td id="totalPriceSaleText"
                                                                            class="font-weight-700 text-16">Rp 0</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="card">
                                            <div class="card-body">

                                                <input type="hidden" name="productId" id="productId">
                                                <input type="hidden" name="price" id="price">
                                                <input type="hidden" name="qtyProduct" id="qtyProduct" value=0>
                                                <div class="card-body">
                                                    <div class="card-title">Tambah Produk</div>

                                                    <div class="row">
                                                        <div class="col-md-12 form-group mb-3">
                                                            <label for="firstName1">Nama Produk</label>
                                                            <input type="text" class="form-control" id="name"
                                                                name="name" placeholder="Input Nama">
                                                        </div>
                                                    </div>

                                                    <div class="custom-separator"></div>

                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputtext14"
                                                                class="ul-form__label">Jumlah:</label>
                                                            <input value=0 type="number" class="form-control" id="qty" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="row text-end">
                                                    <div class="col-lg-12 ">
                                                        <button id="addProduct" type="button" class="btn btn-info m-1">
                                                            Tambah Produk
                                                        </button>
                                                        <button type="submit" class="btn btn-danger m-1">
                                                            Simpan Penjualan
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </section>
                    </div>
                    </section>
                    <!-- end::basic action bar -->
                </div>
                <!-- end of col-->
            </div>
        </div>
    </x-slot>
    <x-slot name="pagejs">
        <script src="{{asset('assets/js/vendor/pickadate/picker.js')}}"></script>
        <script src="{{asset('assets/js/vendor/pickadate/picker.date.js')}}"></script>
    </x-slot>
    <x-slot name="pagecss">
        <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.css')}}">
        <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.date.css')}}">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    </x-slot>
    <x-slot name="bottomjs">
        <script src="{{asset('assets/js/form.basic.script.js')}}"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <script>
        $(function() {
            var availableTags = [
                @foreach($products as $index => $product) {
                    id: "{{$product->id}}",
                    value: "{{$product->name}}",
                    sell: "{{$product->sell_price}}",
                    buy: "{{$product->buy_price}}"
                }
                @if($index < $products->count() - 1),
                @endif
                @endforeach
            ];
            $("#name")
                .autocomplete({
                    minLength: 0,
                    source: availableTags,
                    select: function(event, ui) {
                        $("#name").val(ui.item.value);
                        $("#productId").val(ui.item.id);
                        $("#price").val(ui.item.sell);
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
            
                $("#addProduct").click(function() {
                var qtyProduct = +$("#qtyProduct").val();
                if (qtyProduct < 1) {
                    $('#emptyRow').remove();
                }
                var totalPrice = +$("#totalPriceSale").val();
                var allProductPrice = totalPrice + ($("#price").val() * $("#qty").val());
                
                $('#sales-data > tbody:last-child').append(`<tr class="">
                                                            <td scope="row">
                                                                <div
                                                                    class="ul-product-cart__detail d-inline-block align-middle ">
                                                                    <a href="">
                                                                        <h6 class="heading">` + $("#name").val() + `</h6>
                                                                    </a>
                                                                    <span class="text-mute"></span>
                                                                </div>
                                                            </td>
                                                            <td>Rp ` + $("#price").val() + `</td>
                                                            <td>` + $("#qty").val() + `</td>
                                                            <td>Rp ` + ($("#price").val() * $("#qty").val()) + `</td>
                                                            <td>
                                                            </td>
                                                        </tr>`);


                $('<input>').attr({
                    type: 'hidden',
                    id: 'products['+qtyProduct+']',
                    name: 'products['+qtyProduct+']',
                    value: $("#productId").val()
                }).appendTo('form');
                
                $('<input>').attr({
                    type: 'hidden',
                    id: 'qtys['+qtyProduct+']',
                    name: 'qtys['+qtyProduct+']',
                    value: $("#qty").val()
                }).appendTo('form');

                $("#qtyProduct").val(qtyProduct + 1);

                $("#totalPriceSaleText").text("Rp " + allProductPrice);
                $("#totalPriceSale").val(allProductPrice);


                $("#name").val("");
                $("#qty").val(0);

            });
        });
        </script>
    </x-slot>
</x-app-layout>