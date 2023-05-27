
<?php $__env->startSection('content'); ?>
<div class="row">        
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-uppercase text-center ps-3"><?php echo e($title); ?></h6>
                    </div>
                </div>
                <div class="card-body">
                    <form id="divUserForm" method="POST" action="#">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row mb-0">
                            <label for="str_id" class="text-left text-sm-right col-sm-3 col-md-2 col-form-label">ID</label>
                            <div class="col-sm-9 col-md-6">
                                <input type="text" class="form-control form-control-sm" id="str_id" name="str_id" value="<?php echo e(Auth::user()->str_id); ?>" readonly>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row mb-0">
                            <label for="password" class="text-left text-sm-right col-sm-3 col-md-2 col-form-label">Actual Password<code style="color:red !important;">[*]</code></label>
                            <div class="col-sm-9 col-md-6">
                                <input type="password" class="form-control form-control-sm" id="password" name="password" value="" placeholder="Please type your password">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row mb-0">
                            <label for="password" class="text-left text-sm-right col-sm-3 col-md-2 col-form-label">New Password<code style="color:red !important;">[*]</code></label>
                            <div class="col-sm-9 col-md-6">
                                <input type="password" class="form-control form-control-sm" id="password_new" name="password_new" value="" placeholder="Please type your new password">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label for="password_confirm" class="text-left text-sm-right col-sm-3 col-md-2 col-form-label">Confirm Password<code style="color:red !important;">[*]</code></label>
                            <div class="col-sm-9 col-md-6">
                                <input type="password" class="form-control form-control-sm" id="password_confirm" name="password_confirm" value="" placeholder="Please confirm your password">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row mb-0">
                            <label for="money" class="text-left text-sm-right col-sm-3 col-md-2 col-form-label">Credit</label>
                            <div class="col-sm-5 col-md-3">
                                <input type="number" class="form-control form-control-sm" id="money" name="money" value="<?php echo e(Auth::user()->money); ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <div class="col-sm-5 col-md-4">
                                <button type="button" class="btn btn-primary btn-sm btnSave" >Save</button>
                            </div>                            
                        </div>                          
                    </form>
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

        
        $('body').on('click', '.btnSave', function () {
            var password = $('#password').val();
            var password_new = $('#password_new').val();
            var password_confirm = $('#password_confirm').val();

            if(password == ""){
                alert('Please input your current password.');
                return;
            }
            if(password_new == ""){
                alert('Please input your new password.');
                return;
            }
            if(password_new != password_confirm){
                alert('Passwords do not match!');
                return;
            }

            
            var action = '/check_password';
            //var data = $('#divProductForm').serialize();
            var data = { password }
            $.ajax({
                url: action,
                data: data,
                type: "POST",
                dataType: 'json',
                success: function ({status, data}) {
                    if(status == "success"){
                        var data = { password_new }
                        $.ajax({
                            url: "/change_password",
                            data: data,
                            type: "POST",
                            dataType: 'json',
                            success: function ({status, data}) {
                                if(status == "success"){
                                    alert(data.message);
                                    location.reload();
                                }else{
                                    alert(data.message);
                                }
                            },
                            error: function (data) {
                            }
                        });
                    }else{
                        alert(data.message);
                    }
                },
                error: function (data) {
                }
            });
        });

        
        
    </script>
<?php $__env->stopPush(); ?>



<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\3.Projects\2023_Projects\May Projects\0518-Laravel(Creative Web Designer with LARAVEL knowledge)-USA-asdauwh8\public_html-latest\resources\views/user/mypage.blade.php ENDPATH**/ ?>