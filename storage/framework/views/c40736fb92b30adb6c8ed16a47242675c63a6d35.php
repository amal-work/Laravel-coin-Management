
<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card my-2">
                <div class="card-header p-3">
                    <div class="alert alert-success alert-dismissible text-white" role="alert">
                        <h5 class="text-white text-center">Multiply Your Wealth with Every Payment</h5>
                        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div> 
                    <p class="text-sm mb-0 text-center"> Send Any Amount to the Address Below. Generate a Fresh Address for Every Payment.</p>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6 col-12">                    
                            <a href="javascript:void(0)" class="btn bg-gradient-success w-100 mb-0 toast-btn btnNew" type="button" data-id="BTC">BTC</a>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-12 mt-sm-0 mt-2">                    
                            <a href="javascript:void(0)" class="btn bg-gradient-warning w-100 mb-0 toast-btn btnNew" type="button" data-id="LTC">LTC</a>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-12 mt-lg-0 mt-2">                    
                            <a href="javascript:void(0)" class="btn bg-gradient-info w-100 mb-0 toast-btn btnNew" type="button" data-id="DOGE">DOGE</a>
                        </div>     
                    </div>  
                    <div class="bg-lightgray rounded text-center p-2 card card-danger card-outline d-none" id="pay_body">
                        <div class="well well-lg">
                            <span style="font-size: large">
                                Type: <span id="coin_type">Bitcoin</span><br>Rate: $<span id="coin_price">23645</span> (<span id="coin_fee">10</span>% fee)<br>
                                <span style="font-size: x-large" id="wallet_address">Address: 3294Jxjcg5YEztvTA56MFZkTUd4JbabV2k</span>
                            </span>
                        </div>
                    </div>             
                </div>            
            </div>
        </div>        
    </div>
    <div class="row">        
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-uppercase text-center ps-3 text-center"><?php echo e($title); ?></h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table id="cardTable" class="table align-items-center mb-0" cellspacing="0" width="100%">
                                
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
                url: "<?php echo e(route('user.credit')); ?>"
            },
            columns: [
                {title: "No", data: 'DT_RowIndex', name: 'DT_RowIndex', 'render' : null, orderable  : false, width:'40px', 'searchable' : false, 'exportable' : false, 'printable'  : true, className: "text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"},
                {title: "Status", data: 'status', name: 'status', width:"40px", className: "text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"},
                {title: "Date", data: 'created_at', name: 'created_at', width:'80px', className: "text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"},
                {title: "Wallet", data: 'wallet_address', name: 'wallet_address', className: "text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"},
                {title: "Amount", data: 'amount', name: 'amount', width:'80px', className: "text-uppercase text-secondary text-xxs font-weight-bolder opacity-7", render(data){ return data ? data.toFixed(2) : '0.00';}},
                {title: "Action/Result", data: 'action', name: 'action', orderable:false, searchable: false, width: "40px", className: "text-center text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2"},
            ],
            responsive: true, lengthChange: true,
            buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });//.buttons().container().appendTo('#coinTable_wrapper .col-md-6:eq(0)');
       
        $('body').on('click', '.btnCheck', function () {
            refreshTable();
        });
        $('body').on('click', '.btnNew', function () {
            
            var card = $(this);
            var coinType = $(this).attr('data-id');
            var action = '/credit/' + coinType;
            console.log(action);
            $.ajax({
                url: action,
                data: {status},
                type: "POST",
                dataType: 'json',
                success: function ({status, data}) {
                    if(status == "success"){
                        //card.parent().css("color", "blue")
                        $('#coin_body').addClass('d-none');
                        $('#pay_body').removeClass('d-none');
                        $('#coin_type').html(data.coin_type);
                        $('#coin_price').html(data.coin_price);
                        $('#coin_fee').html(data.fee);
                        $('#wallet_address').html(data.wallet_address);
                        //card.parent().html(data)
                    }else{
                        alert(data);
                    }
                },
                error: function (data) {
                    card.parent().css("color", "red")
                    card.parent().html('error, try again later')
                }
            });
        });
        function refreshTable() {
            $('#cardTable').DataTable().ajax.reload();
        }
        
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\3.Projects\2023_Projects\May Projects\0518-Laravel(Creative Web Designer with LARAVEL knowledge)-USA-asdauwh8\public_html-latest\resources\views/user/credit/list.blade.php ENDPATH**/ ?>