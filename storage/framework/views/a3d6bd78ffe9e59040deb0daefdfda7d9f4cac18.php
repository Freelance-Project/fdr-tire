<?php $__env->startSection('content'); ?>

<div id="app_header_shadowing"></div>
<div id="app_content">
    <div id="content_header">
        <h3 class="user"> Menu</h3>
    </div>
        <div id="content_body">
            
            <div class = 'row'>

                <div class = 'col-md-6'>

                    <?php echo $__env->make('backend.common.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                     <?php echo Form::model($model); ?> 

                      <div class="form-group">
                        <label>Title</label>
                        <?php echo Form::text('title' , null ,['class' => 'form-control']); ?>

                      </div>
                      <div class="form-group">
                        <label>Slug</label>
                        <?php echo Form::text('slug' , null ,['class' => 'form-control']); ?>

                      </div>

                      <button type="submit" class="btn btn-primary"><?php echo e(!empty($model->id) ? 'Update' : 'Save'); ?></button>
                    
                    <?php echo Form::close(); ?>


                </div>

            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>