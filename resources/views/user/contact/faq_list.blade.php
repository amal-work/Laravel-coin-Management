@extends('user.layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="alert alert-success alert-dismissible text-white" role="alert">
            <h5 class="text-white">Your FAQ Guide to Success</h5>
            <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>  
    </div>
</div>
<div class="row">        
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">{{$title}}</h6>
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
        var table = $('#Table').DataTable({
            processing: false,
            serverSide: true,
            scrollY: "640px",
            pageLength: 10,
            fixedHeader: true,
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
            ajax: {
                url: "{{ route('user.faq') }}"
            },
            columns: [
                {title: "No", data: 'DT_RowIndex', name: 'DT_RowIndex', 'render' : null, orderable  : false, 'searchable' : false},
                {title: "Question", data: 'question', name: 'question', orderable  : false , className:"text-center"},
            ],
            responsive: true, lengthChange: true,
            buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });//.buttons().container().appendTo('#Table_wrapper .col-md-6:eq(0)');
        
        $('body').on('click', '.btnDetail', function () {
            var faqId = $(this).attr('data-id');
            window.open('/faq/' + faqId, 'FAQ', 'scrollbars=1, resizable=1, width=1000, height=620');
            return false;
        });
        
        function refreshTable() {
            $('#Table').DataTable().ajax.reload();
        }
        
    </script>
@endpush