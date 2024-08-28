@extends('layoutsAdmin.main')

@section('content')
    <div id="container" class="effect aside-float aside-bright mainnav-lg">
		@if (session('activated'))
            <div class="alert alert-success" role="alert">
                {{ session('activated') }}
            </div>
        @endif

        <div class="boxed">
            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    <div class="pad-all text-center">
                        <h3>Welcome back to the Dashboard.</h3>
                        <p>This is your experience to manage the Resto Application.</p>
                    </div>
                </div>

                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
                    <div class="row">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Tambah Paket Wisata</h3>
                            </div>

                            <!--Horizontal Form-->
                            <!--===================================================-->
                            <form method="POST" action="{{ route('pesanan.store') }}">
                                @csrf
                                <div>
                                    <h4 class="text-center">Pemesanan Paket Wisata</h4>
                                    @if (session('success'))
                                        <div class="alert alert-success alert-custom" role="alert">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                </div>
                                <hr>
                               <div class="panel-body">
                                <div class="mb-3">
                                    <label for="nama_pemesan" class="form-label">Nama Pemesan</label>
                                    <input type="text" class="form-control @error('nama_pemesan') is-invalid @enderror" id="nama_pemesan" name="nama_pemesan" placeholder="Masukkan Nama" required>
                                    @error('nama_pemesan')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">Nomor Tel/HP</label>
                                    <input type="tel" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" placeholder="Masukkan Nomor Telepon" required>
                                    @error('no_hp')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="waktu_pelaksanaan" class="form-label">Durasi Pelaksanaan Perjalanan</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control @error('waktu_pelaksanaan') is-invalid @enderror" id="waktu_pelaksanaan" name="waktu_pelaksanaan" placeholder="Masukkan Durasi" required>
                                        <span class="input-group-text">Hari</span>
                                    </div>
                                    @error('waktu_pelaksanaan')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="jumlah_peserta" class="form-label">Jumlah Peserta</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control @error('jumlah_peserta') is-invalid @enderror" id="jumlah_peserta" name="jumlah_peserta" placeholder="Masukkan Jumlah Peserta" required>
                                        <span class="input-group-text">Orang</span>
                                    </div>
                                    @error('jumlah_peserta')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Pelayanan Paket Perjalanan:</label>
                                    @foreach($paket as $item)
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input service" id="service{{ $item->id }}" name="services[]"
                                                value="{{ $item->id }}" data-price="{{ $item->harga }}">
                                            <label class="form-check-label" for="service{{ $item->id }}">{{ $item->jenis_paket }}</label>
                                        </div>
                                    @endforeach
                                    @error('services')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga Paket Perjalanan</label>
                                    <input type="text" class="form-control" id="harga" name="harga" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="tagihan" class="form-label">Jumlah Tagihan</label>
                                    <input type="text" class="form-control" id="tagihan" name="tagihan" readonly>
                                </div>
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-success">SIMPAN</button>
                                    <a href="{{ route('adminpesanan.index') }}" class="btn btn-secondary" style="margin-left:5px">KEMBALI</a>
                                </div>
                               </div>
                            </form>

                            <!--===================================================-->
                            <!--End Horizontal Form-->
                        </div>
                    </div>
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
                <!--===================================================-->
                <!--End page content-->
            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->

        <!-- SCROLL PAGE BUTTON -->
        <!--===================================================-->
        <button class="scroll-top btn">
            <i class="pci-chevron chevron-up"></i>
        </button>
        <!--===================================================-->
    </div>
    @yield('script')
    <script src="{{ asset('bootstrap/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            function calculateTotal() {
                let basePrice = 0;
                let waktu_pelaksanaan = parseInt($('#waktu_pelaksanaan').val()) || 1;
                let jumlah_peserta = parseInt($('#jumlah_peserta').val()) || 1;

                // Calculate the base price based on selected services
                $('.form-check-input:checked').each(function() { // Ganti selector di sini
                    basePrice += parseInt($(this).data('price'));
                });

                // Display the base price in the Harga Paket Perjalanan field
                $('#harga').val(basePrice);

                // Calculate the total bill by multiplying base price with waktu_pelaksanaan and jumlah_peserta
                let totalBill = basePrice * waktu_pelaksanaan * jumlah_peserta;

                // Display the total bill in the Jumlah Tagihan field
                $('#tagihan').val(totalBill);
            }

            // Trigger calculation when any input changes
            $('.form-check-input, #waktu_pelaksanaan, #jumlah_peserta').on('change', function() { // Ganti selector di sini
                calculateTotal();
            });
        });
    </script>
    <!--===================================================-->
    <!-- END OF CONTAINER -->
@endsection
