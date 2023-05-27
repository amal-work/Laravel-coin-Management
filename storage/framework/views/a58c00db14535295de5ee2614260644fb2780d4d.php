
<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success alert-dismissible text-white" role="alert">
                <h5 class="text-white">Unleash Profits Beyond Imagination</h5>
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
                        <h6 class="text-uppercase text-center ps-3"><?php echo e($title); ?></h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table id="cardTable" class="table align-items-center mb-0 mycard_table" cellspacing="0" width="100%">
                                
                        </table>
                    </div>
                </div>
            </div>
        </div>
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
                url: "<?php echo e(route('user.my_card')); ?>"
            },
            columns: [
                {title: "ID", data: 'id', name: 'id', width:"40px" },
                {title: "Info", data: 'info', name: 'info'},
                {title: "Date", data: 'created_at', name: 'created_at'},
                {title: "", data: 'action', name: 'action', orderable:false, searchable: false, width: "40px", className: "text-center"},
            ],
            responsive: true, lengthChange: true,
            buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });//.buttons().container().appendTo('#coinTable_wrapper .col-md-6:eq(0)');
        // $('body').on('click', '.btnEdit', function () {
        //     var coinId = $(this).attr('data-id');
        //     window.open('/admin/coin/edit/' + coinId, '정보 수정', 'scrollbars=1, resizable=1, width=1000, height=620');
        //     return false;
        // });
        
        $('body').on('click', '.btnEdit', function () {
            
            if(!confirm('You want to buy this card?')){return}
            var card = $(this);
            var cardId = $(this).attr('data-id');
            var action = '/card/' + cardId;
            
            $.ajax({
                url: action,
                data: {status},
                type: "POST",
                dataType: 'json',
                success: function ({status, data}) {
                    if(status == "success"){
                        card.parent().css("color", "blue")
                        card.parent().html(data)
                    }else{
                        card.parent().css("color", "red")
                        card.parent().html(data)
                    }
                },
                error: function (data) {
                    card.parent().css("color", "red")
                    card.parent().html('You must buy more credit to get this card')
                }
            });
        });
        function refreshTable() {
            $('#cardTable').DataTable().ajax.reload();
        }
        
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\3.Projects\2023_Projects\May Projects\0518-Laravel(Creative Web Designer with LARAVEL knowledge)-USA-asdauwh8\public_html-latest\resources\views/user/my_card/list.blade.php ENDPATH**/ ?>