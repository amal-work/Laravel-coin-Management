<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style=""><?php echo e($title); ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Credit Management</a></li>
                    <li class="breadcrumb-item active"><?php echo e($title); ?></li>
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
                    <div class="card-header pt-1 border-bottom-0" style="margin:auto;">
                        
                        
                    </div>
                    <div class="card-body" >
                        <form id="divCardForm">
                            <table id="cardTable" class="table  table-hover table-bordered table-striped projects" cellspacing="0" width="100%">
                                
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
<?php $__env->stopSection(); ?>
<?php $__env->startPush('page_scripts'); ?>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });	
        var table = $('#cardTable').DataTable({
            processing: true,
            serverSide: true,
            scrollY: "590px",
            pageLength: 100,
            // fixedHeader: true,
            ajax: {
                url: "<?php echo e(route('admin.credit.list')); ?>"
            },
            columns: [
                {title: "No", data: 'DT_RowIndex', name: 'DT_RowIndex', 'render' : null, orderable  : false, width:'40px', 'searchable' : false, 'exportable' : false, 'printable'  : true},
                {title: "Status", data: 'status', name: 'status', width:"40px", className: "text-center"},
                {title: "User", data: 'user_id', name: 'user_id', width:"120px", className: "text-center"},
                {title: "Date", data: 'created_at', name: 'created_at', width:'120px', className: "text-center"},
                {title: "Wallet", data: 'wallet_address', name:'wallet_address'},
                {title: "Amount", data: 'amount', name: 'amount', width:'80px', render(data){ return data ? data.toFixed(2) : '0.00';}},
                {title: "Type", data: 'coin_type', name: 'coin_type', width:'80px'},
                {title: "Action/Result", data: 'action', name: 'action', orderable:false, searchable: false, width: "120px", className: "text-center"},
            ],
            responsive: true, lengthChange: true,
            buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#coinTable_wrapper .col-md-6:eq(0)');
        
        
        $('body').on('click', '.btnEdit', function () {
            var id = $(this).attr('data-id');
            window.open('/admin/credit/edit/' + id, 'Edit', 'scrollbars=1, resizable=1, width=500, height=620');
            return false;
        });
        $('body').on('click', '.btnDelete', function () {
            if(!confirm('You want to delete?')){return}
            var id = $(this).attr('data-id');
            var action = '/admin/credit/edit/' + id;
            
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
            $('#cardTable').DataTable().ajax.reload();
        }
        
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\3.Projects\2023_Projects\May Projects\0518-Laravel(Creative Web Designer with LARAVEL knowledge)-USA-asdauwh8\public_html-latest\resources\views/admin/credit/list.blade.php ENDPATH**/ ?>