<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rangkuman Reservasi</title>
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        .card {
            max-width: 700px;
            border-radius: 0.375rem;
            box-shadow: 0 0 0.5rem rgba(0, 0, 0, 0.1);
            margin: auto;
        }

        .card-header, .card-body, .card-footer {
            padding: 1.25rem;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #A8CF8C;
        }

        .card-footer p {
            margin: 0;
            font-weight: bold;
            color: #ffffff; /* Text color for better contrast */
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full viewport height */
            padding: 0 1rem;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
        }

        .info-table td {
            padding: 0.5rem;
        }

        .info-table .label {
            text-align: left;
            font-weight: bold;
            padding-right: 1rem;
            white-space: nowrap;
        }

        .info-table .value {
            text-align: left;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card" style="background-color: #e1efd8">
            <div class="card-header" style="background-color: #A8CF8C;">
              <h4 class="text-center">RANGKUMAN OBSERVASI PAKET WISATA</h4>
            </div>
            <div class="card-body">
                <table class="info-table">
                    <tr>
                        <td class="label">Nama</td>
                        <td class="value">: {{ $data->nama_pemesan }}</td>
                    </tr>
                    <tr>
                        <td class="label">Jumlah Peserta</td>
                        <td class="value">: {{ $data->jumlah_peserta }} Orang</td>
                    </tr>
                    <tr>
                        <td class="label">Waktu Perjalanan</td>
                        <td class="value">: {{ $data->waktu_pelaksanaan }} Hari</td>
                    </tr>
                    <tr>
                        <td class="label">Layanan Paket</td>
                        <td class="value">:
                            @if(!empty($paketNames))
                                {{ implode(', ', $paketNames) }}
                            @else
                                Tidak ada data
                            @endif
                        </td>

                    </tr>
                    <tr>
                        <td class="label">Harga Paket</td>
                        <td class="value">: {{ number_format($data->harga, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td class="label">Jumlah Tagihan</td>
                        <td class="value">: {{ number_format($data->tagihan, 0, ',', '.') }}</td>
                    </tr>
                </table>
            </div>
            <div class="card-footer">
                <p style="color: black;">Pesan Lagi?</p>
                <div>
                    <a href="{{ route('pesanan.index') }}" class="btn btn-success">Ya</a>
                    <a href="/" class="btn btn-danger">Tidak</a>
                </div>
            </div>
          </div>
    </div>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
