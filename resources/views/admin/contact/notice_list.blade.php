@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="">{{$title}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Contact</a></li>
                    <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="card card-primary card-outline card-tabs">
                    <div class="card-header p-0 pt-1 border-bottom-0">
                        <ul class="nav float-right">
                            <li class="pull-right float-right pr-2 pt-1" style="">
                                <a href="javascript:void(0)" class="btn btn-success btnAdd" >New</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <form id="divForm">
                            <table id="Table" class="table  table-hover table-bordered table-striped projects text-xs" cellspacing="0" width="100%">
                                
                            </table>
                        </form>
                    </div>
                        
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
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
            processing: true,
            serverSide: true,
            scrollY: "640px",
            pageLength: 100,
            // fixedHeader: true,
            ajax: {
                url: "{{ route('admin.notice.list') }}"
            },
            columns: [
                {title: "No", data: 'DT_RowIndex', name: 'DT_RowIndex', 'render' : null, width:"60px", orderable  : false, 'searchable' : false},
                {title: "Info", data: 'title', name: 'title', orderable  : false , className:"text-center"},
                {title: "Date", data: 'created_at', name: 'created_at', width:"120px", orderable  : false, className:"text-center"},
                {title: "Action", data: 'action', name: 'action', orderable  : false, width:"120px", className:"text-center"},
            ],
            responsive: true, lengthChange: true,
            buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#Table_wrapper .col-md-6:eq(0)');
        $('body').on('click', '.btnEdit', function () {
            var noticeId = $(this).attr('data-id');
            window.open('/admin/contact/notice/' + noticeId, 'Edit', 'scrollbars=1, resizable=1, width=1000, height=620');
            return false;
        });
        $('body').on('click', '.btnDetail', function () {
            var noticeId = $(this).attr('data-id');
            window.open('/admin/contact/notice/' + noticeId, 'Edit', 'scrollbars=1, resizable=1, width=1000, height=620');
            return false;
        });
        $('body').on('click', '.btnAdd', function () {
            //var coinId = $(this).attr('data-id');
            window.open('/admin/contact/notice/0', 'Add', 'scrollbars=1, resizable=1, width=1000, height=620');
            return false;
        });
        $('body').on('click', '.btnDelete', function () {
            if(!confirm('You really want to delete?')){return}
            var noticeId = $(this).attr('data-id');
            var action = '/admin/contact/notice/' + noticeId;
            
            $.ajax({
                url: action,
                data: {status},
                type: "DELETE",
                dataType: 'json',
                success: function ({status, data}) {
                    if(status == "success"){
                        refreshTable();
                        alert('Successfully deleted.');
                        
                    }else{
                        alert('Failed to delete.');
                    }
                },
                error: function (data) {
                }
            });
        });
        
        function refreshTable() {
            $('#Table').DataTable().ajax.reload();
        }
        
    </script>
@endpush