<?php $__env->startSection('content'); ?>

<div id="app_header_shadowing"></div>
<div id="app_content">
    <div id="content_header">
        <h3 class="user"> <?php echo e(helper::titleActionForm()); ?></h3>
    </div>
        <div id="content_body">
            
            <div class = 'row'>

                <div class = 'col-md-6'>
                    <?php echo $__env->make('backend.common.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('backend.common.sweet_flashes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                     <?php echo Form::model($model); ?> 
                        
                      <div class="form-group">
                        <label>Username</label>
                        <?php echo Form::text('username' , null ,['class' => 'form-control']); ?>

                      </div>

                      <div class="form-group">
                        <label>Name</label>
                        <?php echo Form::text('name' , null ,['class' => 'form-control']); ?>

                      </div>

                      <div class="form-group">
                        <label>Email</label>
                        <?php echo Form::text('email' , null ,['class' => 'form-control']); ?>

                      </div>

                      <div class="form-group">
                        <label>Gender</label>
                        <?php echo Form::select('gender' , ['pria' => 'Pria','wanita'=>'Wanita'] , null ,['class' => 'form-control']); ?>

                      </div>

                      <div class="form-group">
                        <label>Address</label>
                        <?php echo Form::textarea('address' , null ,['class' => 'form-control']); ?>

                      </div>

                      <div class="form-group">
                        <label>Phone</label>
                        <?php echo Form::text('phone' , null ,['class' => 'form-control']); ?>

                      </div>

                      <div class="form-group">
                        <label>Password</label>
                        <?php echo Form::password('password',['class' => 'form-control']); ?>

                      </div>

                      <div class="form-group">
                        <label>Verify Password</label>
                        <?php echo Form::password('verify_password',['class' => 'form-control']); ?>

                      </div>
                      
                      <button type="submit" class="btn btn-primary"><?php echo e(!empty($model->id) ? 'Update' : 'Save'); ?></button>
                    
                    <?php echo Form::close(); ?>


                </div>

            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>