<?php $__env->startSection('content'); ?>

<div id="app_header_shadowing"></div>
<div id="app_content">
    <div id="content_header">
        <h3 class="user"> Menu</h3>
    </div>
        <div id="content_body">
            
            <div class = 'row'>

                <div class = 'col-md-8'>

                    <?php echo $__env->make('backend.common.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                     <?php echo Form::model($model,['files' => true]); ?> 

                      <div class="form-group">
                        <label>Title</label>
                        <?php echo Form::text('title' , null ,['class' => 'form-control']); ?>

                      </div>
                      
                      <div class="form-group">
                        <label>Description</label>
                        <?php echo Form::textarea('description' , null ,['class' => 'form-control','id'=>'description']); ?>

                      </div>

                      <div class="form-group">
                        <label>File</label>
                        <?php echo Form::file('image' , null ,['class' => 'form-control']); ?>

                      </div>

                      <?php if(!empty($model->image)): ?>

                        <div class="form-group">
                          <label>Old Image</label><br/>
                          <img src = '<?php echo e(asset("contents/".$model->image)); ?>' width = '200' height = '100'/>
                        </div>

                      <?php endif; ?>

                      <div class="form-group">
                        <label>Status</label>
                        <?php echo Form::select('status' , ['y' => 'Publish' , 'n' => 'Un Publish'] , null ,['class' => 'form-control']); ?>

                      </div>

                      <button type="submit" class="btn btn-primary"><?php echo e(!empty($model->id) ? 'Update' : 'Save'); ?></button>
                    
                    <?php echo Form::close(); ?>


                </div>

            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">
  
  window.onload = function()
  {
      CKEDITOR.replace( 'description',{
      filebrowserBrowseUrl: '<?php echo e(urlBackend("image/lib")); ?>'});
  }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>