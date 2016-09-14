<?php $__env->startSection('content'); ?> 
            <div class="wg-content">
                <div class="wording">
                    <?php echo Form::open(); ?>

                        <div class="fl label username"></div>
                        <div class="fl input">
                            <?php echo Form::text('username' , null ,  ['placeholder' => 'Username'] ); ?>

                        </div>
                        <div class="clear break15"></div>
                        <div class="fl label password"></div>
                        <div class="fl input">
                             <?php echo Form::password('password' ,  ['placeholder' => 'Password'] ); ?>

                        </div>
                        <div class="clear break15"></div>
                       
                       <div>
                            <div class="fl">
                                <a class="forgot-password" style="color:#1076bc;font:11px/32px verdana;" href = '<?php echo e(url("login/forgot-password")); ?>'>Forgot password ?</a>
                            </div>
                            <input type="submit" class="submit" value=""/>
                            <div class="clear break1"></div>
                        </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    
    <?php if(@$errors->any() || Session::has('message')): ?>

       <script type="text/javascript">
            swal({
              type : "error",
              title: "Error",
              text: "User not Found!",
              html: true
            });
        </script>

    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>