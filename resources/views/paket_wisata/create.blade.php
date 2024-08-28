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
                            <form method="POST" action="{{ route('paket_wisata.store') }}">
                                @csrf
                                <div class="panel-body">
                                    <div class="form-group row mb-3">
                                        <label for="jenis_paket" class="col-sm-3 col-form-label text-sm-right">Jenis Paket</label>
                                        <div class="col-sm-9">
                                            <input type="text" placeholder="Jenis Paket" name="jenis_paket" id="jenis_paket" class="form-control @error('jenis_paket') is-invalid @enderror" value="{{ old('jenis_paket') }}">
                                            @error('jenis_paket')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="harga" class="col-sm-3 col-form-label text-sm-right">Harga</label>
                                        <div class="col-sm-9">
                                            <input type="text" placeholder="Harga" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}">
                                            @error('harga')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="deskripsi" class="col-sm-3 col-form-label text-sm-right">Deskripsi</label>
                                        <div class="col-sm-9 mt-3 mt-sm-0">
                                            <textarea placeholder="Deskripsi" name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3">{{ old('deskripsi') }}</textarea>
                                            @error('deskripsi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer text-right">
                                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                                    <a href="{{ route('paket_wisata.index') }}" class="btn btn-secondary">KEMBALI</a>
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
    <!--===================================================-->
    <!-- END OF CONTAINER -->
@endsection
