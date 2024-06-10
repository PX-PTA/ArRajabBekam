<x-app-layout>
    <x-slot name="slot">
        <div class="row">
            <div class="col-md-12">
                <div class="card o-hidden mb-4">
                    <div class="card-header">
                        <h3 class="w-50 float-start card-title m-0">Produk Baru</h3>
                    </div>
                    <div class="card-body">
                        <!-- begin::main-row -->
                        <div class="row">
                            <!-- start Hirozontal Form Layout -->
                            <div class="col-lg-12 mb-3">
                                <!--begin::form 2-->
                                <form method="post" action="{{ route('product.store') }}">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="row">
                                                <div class="col-md-12 form-group mb-3">
                                                    <label for="firstName1">Nama Produk</label>
                                                    <input type="text" class="form-control" id="name" name="name"
                                                        placeholder="Input Nama" required="required">
                                                </div>

                                                <div class="col-md-4 form-group mb-3">
                                                    <label for="buy">Harga Beli</label>
                                                    <input type="number" class="form-control" id="buy" name="buy"
                                                        placeholder="Harga Beli">
                                                </div>

                                                <div class="col-md-4 form-group mb-3">
                                                    <label for="sell">Harga Jual</label>
                                                    <input type="number" class="form-control" id="sell" name="sell"
                                                        placeholder="Harga Jual">
                                                </div>

                                                <div class="col-md-4 form-group mb-3">
                                                    <label for="sell">Stok</label>
                                                    <input type="number" class="form-control" id="stok" name="stok"
                                                        placeholder="Stok Barang">
                                                </div>

                                                <div class="col-md-12 form-group mb-3">
                                                    <label for="exampleInputEmail1">Deskripsi</label>
                                                    <textarea class="form-control" id="description" name="description"
                                                        placeholder="Deskripsi Produk"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer">
                                        <div class="mc-footer">
                                            <div class="row text-end">
                                                <div class="col-lg-4"></div>
                                                <div class="col-lg-6 text-start">
                                                    <button type="submit" class="btn btn-primary m-1">Save</button>
                                                    <button
                                                        onclick="window.location.href='{{ route('product.index') }}'"
                                                        type="button"
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
        </div>
    </x-slot>
    <x-slot name="pagejs">
        <script src="{{ asset('assets/js/vendor/datatables.min.js') }}"></script>
        <script src="{{ asset('assets/js/es5/dashboard.v2.script.js') }}"></script>
    </x-slot>
    <x-slot name="pagecss">
    </x-slot>
    <x-slot name="bottomjs">
    </x-slot>
</x-app-layout>