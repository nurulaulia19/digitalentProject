<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Paket Wisata</title>
    <script src="{{ asset('bootstrap/js/jquery-3.7.1.min.js') }}"></script>
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        .form-container {
            border: 1px solid #EFA784;
            border-radius: 0.375rem;
            padding: 2rem;
            box-shadow: 0 0 0.5rem rgba(0, 0, 0, 0.1);
            max-width: 900px;
            margin: auto;
            margin-bottom: 3rem;
            background-color: #f8f9fa;
            position: relative;
        }

        .form-control {
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
        }

        .form-check-inline {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .form-label {
            font-weight: 500;
            color: #495057;
            margin-right: 15px;
            white-space: nowrap;
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
            background-color: #EFA784;
            padding: 1rem;
            border-radius: 0 0 0.375rem 0.375rem;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
        }


        .btn-group .button {
            display: flex;
            justify-content: flex-end; /* Menempatkan tombol ke kanan */
            gap: 10px; /* Jarak antar tombol */
        }

        .form-container form {
            padding-bottom: 5rem;
        }

        .form-check-label {
        margin-right: 10px; /* Jarak antara checkbox dan label */
        }

    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="form-container">
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
                <div class="mb-3">
                    <label for="nama_pemesan" class="form-label">Nama Pemesan</label>
                    <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan"
                        placeholder="Masukkan Nama" required>
                    @error('nama_pemesan')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="no_hp" class="form-label">Nomor Tel/HP</label>
                    <input type="tel" class="form-control" id="no_hp" name="no_hp"
                        placeholder="Masukkan Nomor Telepon" required>
                    @error('no_hp')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="waktu_pelaksanaan" class="form-label">Durasi Pelaksanaan Perjalanan</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="waktu_pelaksanaan" name="waktu_pelaksanaan"
                            placeholder="Masukkan Durasi" required>
                        <span class="input-group-text">Hari</span>
                    </div>
                    @error('waktu_pelaksanaan')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="jumlah_peserta" class="form-label">Jumlah Peserta</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="jumlah_peserta" name="jumlah_peserta"
                            placeholder="Masukkan Jumlah Peserta" required>
                        <span class="input-group-text">Orang</span>
                    </div>
                    @error('jumlah_peserta')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <div class="form-check-inline">
                        <label class="form-label">Pelayanan Paket Perjalanan:</label>
                        @foreach($paket as $item)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input service" id="service{{ $item->id }}" name="services[]"
                                    value="{{ $item->id }}" data-price="{{ $item->harga }}">
                                <label class="form-check-label" for="service{{ $item->id }}">{{ $item->jenis_paket }}</label>
                            </div>
                        @endforeach
                    </div>
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
                    <div class="button">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button type="button" class="btn btn-danger" onclick="location.href='{{ url('/') }}'">Batalkan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            function calculateTotal() {
                let basePrice = 0;
                let waktu_pelaksanaan = parseInt($('#waktu_pelaksanaan').val()) || 1;
                let jumlah_peserta = parseInt($('#jumlah_peserta').val()) || 1;

                // Calculate the base price based on selected services
                $('.service:checked').each(function() {
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
            $('.service, #waktu_pelaksanaan, #jumlah_peserta').on('change', function() {
                calculateTotal();
            });
        });
    </script>
</body>

</html>


