{{-- bener --}}

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
						<div class="panel" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
							<div class="panel-heading">
								<h3 class="panel-title">Dashboard Admin</h3>
							</div>
							<div class="pad-all">
								<div class="row">
                                    <div class="col-md-3">
                                        <div class="panel panel-warning panel-colorful media middle pad-all">
                                            <div class="media-left">
                                                <div class="pad-hor">
                                                    <i class="fas fa-money-bill icon-3x"></i>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <p class="text-2x mar-no text-semibold">{{$paket}}</p>
                                                <p class="mar-no">Paket Wisata</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="panel panel-info panel-colorful media middle pad-all">
                                            <div class="media-left">
                                                <div class="pad-hor">
                                                    <i class="fas fa-shopping-bag icon-3x"></i>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <p class="text-2x mar-no text-semibold">{{$pesanan}}</p>
                                                <p class="mar-no">Pesanan</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
							</div>
						</div>
					</div>


                </div>
                <!--===================================================-->
                <!--End page content-->
                @if(session('error'))
					<div class="alert alert-danger">
						{{ session('error') }}
					</div>
				@endif
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




  <!--jQuery [ REQUIRED ]-->
  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
  {{-- <script src="js/jquery.min.js"></script> --}}



