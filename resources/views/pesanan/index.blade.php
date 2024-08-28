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
                        <div class="col-xs-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Pesanan</h3>
                                </div>

                                <!--Data Table-->
                                <!--===================================================-->
                                <div class="panel-body">
                                    <div class="pad-btm form-inline">
                                        <div class="row">
                                            <div class="col-sm-6 table-toolbar-left">
                                                <a href="{{ route('pesanan.create') }}" class="btn btn-purple">
                                                    <i class="demo-pli-add icon-fw"></i>Tambah
                                                </a>
                                                <a href="{{ route('pesanan.download.pdf') }}" class="btn btn-primary">
                                                    <i class="fas fa-file-pdf"></i> Download PDF
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Pemesan</th>
                                                    <th>No HP</th>
                                                    <th>Durasi</th>
                                                    <th>Jumlah Peserta</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pesanan as $index => $pesan)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $pesan->nama_pemesan }}</td>
                                                        <td>{{ $pesan->no_hp }}</td>
                                                        <td>{{ $pesan->waktu_pelaksanaan }} Hari</td>
                                                        <td>{{ $pesan->jumlah_peserta }} Orang</td>
                                                        <td class="table-action" style="justify-content:center; display:flex">
                                                            <a style="margin-right: 10px" href="{{ route('pesanan.edit', $pesan->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                            <form method="POST" action="{{ route('pesanan.destroy', $pesan->id) }}" id="delete-form-{{ $pesan->id }}" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $pesan->id }})">Hapus</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <hr class="new-section-xs">
                                </div>
                                <!--===================================================-->
                                <!--End Data Table-->
                            </div>
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            @if(session('success'))
                                <div class="alert alert-info">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </div>
                    </div>
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
        <!--===================================================-->
        <!-- END OF CONTAINER -->

        <!-- Script for Delete Confirmation -->
        <script>
            function confirmDelete(id) {
                if (confirm('Apakah Anda yakin ingin menghapus pesanan ini?')) {
                    document.getElementById('delete-form-' + id).submit();
                }
            }
        </script>
    @endsection
