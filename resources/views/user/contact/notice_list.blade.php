@extends('user.layouts.app')
@section('content')
<div class="row">        
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });	
        if($('#Table').length){
        var table = $('#Table').DataTable({
            processing: true,
            serverSide: true,
            scrollY: "640px",
            pageLength: 100,
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
        }).buttons().container().appendTo('#Table_wrapper .col-md-6:eq(0)');
        
        function refreshTable() {
            $('#Table').DataTable().ajax.reload();
        }
        }
        
    </script>
@endpush