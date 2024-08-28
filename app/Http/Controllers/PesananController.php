<?php

namespace App\Http\Controllers;

use App\Models\PaketWisata;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use FPDF;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paket = PaketWisata::all();
        $pesanan = Pesanan::all(); // Fetch all paket wisata records
        return view('jasa.pesanan', compact('pesanan', 'paket'));
    }

    public function admin_index()
    {
        $paket = PaketWisata::all();
        $pesanan = Pesanan::all(); // Mengambil semua data pesanan
        return view('pesanan.index', compact('pesanan', 'paket'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paket = PaketWisata::all();
        return view('pesanan.create', compact('paket'));
    }


    public function store(Request $request)
    {
        // dd($request);
        // Validasi input dari pengguna
            try {
            $validatedData = $request->validate([
                'nama_pemesan' => 'required|string|max:30',
                'no_hp' => 'required|string|max:15',
                'waktu_pelaksanaan' => 'required|numeric',
                'jumlah_peserta' => 'required|numeric',
                'harga' => 'required|numeric',
                'tagihan' => 'required|numeric',
                'services' => 'array',
                'services.*' => 'string'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            dd($e->errors()); // Tampilkan pesan error spesifik
        }



        // Mengambil data dari form
        $nama_pemesan = $validatedData['nama_pemesan'];
        $no_hp = $validatedData['no_hp'];
        $waktu_pelaksanaan = $validatedData['waktu_pelaksanaan'];
        $jumlah_peserta = $validatedData['jumlah_peserta'];

        // Mengambil dan membersihkan format harga dan tagihan
        $harga = $validatedData['harga'];
        $tagihan = $validatedData['tagihan'];

        // Mengambil data layanan yang dipilih
        $services = $validatedData['services'];
        $paket = implode(',', $services); // Menggabungkan layanan menjadi string yang dipisahkan koma

        // Simpan data ke dalam tabel `pesanan`
        $pesanan = Pesanan::create([
            'nama_pemesan' => $nama_pemesan,
            'no_hp' => $no_hp,
            'waktu_pelaksanaan' => $waktu_pelaksanaan,
            'paket' => $paket, // Simpan layanan yang dipilih
            'jumlah_peserta' => $jumlah_peserta,
            'harga' => $harga,
            'tagihan' => $tagihan,
        ]);

        // Redirect atau tampilkan pesan sukses
        // return redirect()->view('jasa.rangkuman_reservasi')->with('success', 'Pesanan berhasil disimpan.');
        // return redirect()->back()->with('success', 'Pesanan berhasil disimpan.');
        return redirect()->route('rangkuman_reservasi', ['id' => $pesanan->id])->with('success', 'Pesanan berhasil disimpan.');
    }
    // public function store(Request $request)
    // {
    //     // Validasi input dari pengguna
    //     try {
    //         $validatedData = $request->validate([
    //             'nama_pemesan' => 'required|string|max:30',
    //             'no_hp' => 'required|string|max:15',
    //             'waktu_pelaksanaan' => 'required|numeric',
    //             'jumlah_peserta' => 'required|numeric',
    //             'harga' => 'required|numeric',
    //             'tagihan' => 'required|numeric',
    //             'services' => 'array',
    //             'services.*' => 'integer',
    //         ]);
    //     } catch (\Illuminate\Validation\ValidationException $e) {
    //         dd($e->errors()); // Tampilkan pesan error spesifik
    //     }

    //     // Mengambil data dari form
    //     $nama_pemesan = $validatedData['nama_pemesan'];
    //     $no_hp = $validatedData['no_hp'];
    //     $waktu_pelaksanaan = $validatedData['waktu_pelaksanaan'];
    //     $jumlah_peserta = $validatedData['jumlah_peserta'];
    //     $harga = $validatedData['harga'];
    //     $tagihan = $validatedData['tagihan'];

    //     // Mengambil data layanan yang dipilih
    //     $serviceIds = $validatedData['services'];

    //     // Mengambil nama paket dari ID yang dipilih
    //     $paketNama = PaketWisata::whereIn('id', $serviceIds)->pluck('jenis_paket')->implode(', ');

    //     // Simpan data ke dalam tabel `pesanan`
    //     $pesanan = Pesanan::create([
    //         'nama_pemesan' => $nama_pemesan,
    //         'no_hp' => $no_hp,
    //         'waktu_pelaksanaan' => $waktu_pelaksanaan,
    //         'paket' => $paketNama, // Simpan nama paket yang dipilih
    //         'jumlah_peserta' => $jumlah_peserta,
    //         'harga' => $harga,
    //         'tagihan' => $tagihan,
    //     ]);

    //     // Redirect atau tampilkan pesan sukses
    //     return redirect()->route('rangkuman_reservasi', ['id' => $pesanan->id])->with('success', 'Pesanan berhasil disimpan.');
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pesanan = Pesanan::findOrFail($id); // Mengambil data berdasarkan id
        // Ambil semua paket dari database
        $paketList = PaketWisata::all();

        // Pisahkan ID yang disimpan di kolom paket
        $paketIds = explode(',', $pesanan->paket);
        return view('pesanan.edit', compact('pesanan','paketList','paketIds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'nama_pemesan' => 'required|string|max:255',
            'no_hp' => 'required|numeric',
            'waktu_pelaksanaan' => 'required|integer|min:1',
            'jumlah_peserta' => 'required|integer|min:1',
            'services' => 'array',
            'services.*' => 'string',
        ]);

        // Find the pesanan by ID
        $pesanan = Pesanan::findOrFail($id);

        // Prices for each service
        $servicePrices = [
            'penginapan' => 1000000,
            'transportasi' => 1200000,
            'makanan' => 500000,
        ];

        // Calculate base price based on selected services
        $basePrice = 0;
        if ($request->has('services')) {
            foreach ($request->services as $service) {
                if (isset($servicePrices[$service])) {
                    $basePrice += $servicePrices[$service];
                }
            }
        }

        // Calculate the total bill
        $waktuPelaksanaan = $request->input('waktu_pelaksanaan', 1);
        $jumlahPeserta = $request->input('jumlah_peserta', 1);
        $totalBill = $basePrice * $waktuPelaksanaan * $jumlahPeserta;

        // Update the pesanan record
        $pesanan->update([
            'nama_pemesan' => $request->input('nama_pemesan'),
            'no_hp' => $request->input('no_hp'),
            'waktu_pelaksanaan' => $waktuPelaksanaan,
            'jumlah_peserta' => $jumlahPeserta,
            'paket' => implode(',', $request->input('services', [])),
            'harga' => $basePrice,
            'tagihan' => $totalBill,
        ]);

        // Redirect to the index page with a success message
        return redirect()->route('adminpesanan.index')->with('success', 'Pemesanan paket wisata berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->delete();
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('adminpesanan.index')->with('success', 'Pesanan berhasil dihapus!');
    }


    public function rangkumanReservasi($id)
    {
        // Ambil data pesanan berdasarkan ID
        $data = Pesanan::findOrFail($id);

        // Ambil semua paket dari database
        $paketList = PaketWisata::all()->keyBy('id'); // Pemetaan ID ke objek PaketWisata

        // Pisahkan ID yang disimpan di kolom paket
        $paketIds = explode(',', $data->paket);

        // Ambil nama paket berdasarkan ID
        $paketNames = $paketList->only($paketIds)->pluck('jenis_paket')->toArray();
        // dd($paketNames);

        // Tampilkan tampilan dengan data
        return view('jasa.rangkuman_reservasi', compact('data', 'paketNames'));
    }

    public function downloadPdf()
    {
        // Mengambil semua data pesanan dari database
        $pesanans = Pesanan::all();

        // Cek jika data ada
        if ($pesanans->isEmpty()) {
            return response()->json(['message' => 'Data kosong'], 404);
        }

        // Inisialisasi FPDF
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 10);

        // Menambahkan judul
        $pdf->Cell(0, 10, 'Daftar Pesanan', 0, 1, 'C'); // Menambahkan judul di tengah
        $pdf->Ln(5); // Menambahkan jarak setelah judul
        // Judul Kolom
        $pdf->Cell(10, 10, 'No', 1);
        $pdf->Cell(60, 10, 'Nama Pemesan', 1);
        $pdf->Cell(35, 10, 'No HP', 1);
        $pdf->Cell(35, 10, 'Durasi', 1);
        $pdf->Cell(35, 10, 'Jumlah', 1);
        $pdf->Ln();

        // Isi tabel
        foreach ($pesanans as $index => $pesan) {
            $pdf->Cell(10, 10, $index + 1, 1);
            $pdf->Cell(60, 10, $pesan->nama_pemesan, 1);
            $pdf->Cell(35, 10, $pesan->no_hp, 1);
            $pdf->Cell(35, 10, $pesan->waktu_pelaksanaan . ' Hari', 1);
            $pdf->Cell(35, 10, $pesan->jumlah_peserta . ' Orang', 1);
            $pdf->Ln();
        }

        // Atur header untuk pengunduhan
        $pdfOutput = $pdf->Output('S'); // Output as a string

        return response($pdfOutput, 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="pesanan.pdf"');
    }


}
