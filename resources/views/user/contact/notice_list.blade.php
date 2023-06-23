@extends('user.layouts.app')
@section('third_party_responsive_script')
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('user_assets/js/owl.carousel.min.js')}}"></script>
@endsection
@section('third_party_stylesheets')
<link rel="stylesheet" href="{{asset('user_assets/css/owl.carousel.min.css')}}"> 
<link rel="stylesheet" href="{{asset('user_assets/css/owl.theme.min.css')}}"> 
<link rel="stylesheet" href="{{asset('user_assets/css/fontawesome-all.min.css')}}"> 
<link rel="stylesheet" href="{{asset('user_assets/css/testimonial.css')}}"> 
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="alert alert-success alert-dismissible text-white bussiness_bar" role="alert">
            <h5 class="text-white">Welcome to The World's Most Profitable Business</h5>
            <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2 info-border">
                <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
                </div>
                <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Users</p>
                <h4 class="mb-0">{{$ntotalsUsers}}</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2 info-border">
                <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                     <i class="material-icons opacity-10">person</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Active Users</p>
                    <h4 class="mb-0">{{$activeUsers}}</h4>
                </div>
            </div>           
        </div>
    </div>
    <!-- <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2 info-border">
                <div class="icon icon-lg icon-shape bg-gradient-darken-green shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">account_balance_wallet</i>
                </div>
                <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Cards Sold</p>
                <h4 class="mb-0">{{$nCardsSold}}</h4>
                </div>
            </div>
        </div>
    </div> -->
    <div class="col-xl-4 col-sm-6">
        <div class="card">
            <div class="card-header p-3 pt-2 info-border">
                <div class="icon icon-lg icon-shape bg-gradient-success shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">payment</i>
                </div>
                <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">R.O.I.</p>
                <h4 class="mb-0">50x ~ 2000x</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div id="testimonial-slider" class="owl-carousel">
            @foreach($all_testmonial as $reviewItem)
                <div class="testimonial">                               
                    <div class="testimonial-content">                   
                        <div class="content">
                            <h4 class="name">{{$reviewItem->name}}</h4>                        
                            <ul class="rating">
                                <li class="fa fa-star"></li>
                                <li class="fa fa-star"></li>
                                <li class="fa fa-star"></li>
                                <li class="fa fa-star"></li>
                                <li class="fa fa-star"></li>
                            </ul>
                            <span class="post">{{$reviewItem->tagline}}</span>
                        </div>
                    </div>                
                    <p class="description">                        
                        {{Str::of($reviewItem->content)->limit(120)}}
                    </p>
                </div>
            @endforeach                        
        </div>
    </div>
</div>
<div class="row mt-0">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-uppercase text-center ps-3">{{$title}}</h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <table id="Table" class="table align-items-center mb-0" cellspacing="0" width="100%">

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('page_scripts')
    <script>
        $(document).ready(function () {
            
            $("#testimonial-slider").owlCarousel({
                items:2,
                itemsDesktop:[1000,2],
                itemsDesktopSmall:[979,1],
                itemsTablet:[768,1],
                pagination:true,
                navigation:false,
                navigationText:["",""],
                slideSpeed:1000,
                autoPlay:true
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
        if($('#Table').length){
            var table = $('#Table').DataTable({
                processing: false,
                serverSide: true,
                scrollY: "640px",
                pageLength: 10,
                autoWidth: false,
                responsive: {
                    details: {
                        display: $.fn.dataTable.Responsive.display.childRowImmediate,
                        type: "none",
                        target: ""
                    }
                },
                language: {
                    paginate: {
                    next: '&#8594;', // or '→'
                    previous: '&#8592;' // or '←' 
                    }
                },
                // fixedHeader: true,
                ajax: {
                    url: "{{ route('user.notice') }}"
                },
                columns: [
                    {title: "Date", data: 'created_at', name: 'created_at', orderable  : false, className:"text-center", width:"120px"},
                    {title: "Info", data: 'subject', name: 'subject', orderable  : false , className:"text-center"},
                ],
                responsive: true, lengthChange: true,
                buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
            });//.buttons().container().appendTo('#Table_wrapper .col-md-6:eq(0)');

            function refreshTable() {
                $('#Table').DataTable().ajax.reload();
            }
        }

    </script>
@endpush
