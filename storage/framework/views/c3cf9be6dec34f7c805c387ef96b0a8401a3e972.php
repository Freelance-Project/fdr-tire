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

                     <?php echo Form::model($model); ?> 

                      <div class="form-group">
                        <label>Title</label>
                        <?php echo Form::text('title' , null ,['class' => 'form-control','readonly'=>true]); ?>

                      </div>
                      
                      <table class = 'table'>
                          <thead>
                            <tr>
                              <th>-</th>
                              <th>Action</th>
                            </tr>
                          </thead>

                          <tbody>
                          
                            <?php foreach($actions as $row): ?>
                              <tr>
                                  <td><input  <?php echo e($cek($row->id)); ?> type = 'checkbox' value = '<?php echo e($row->id); ?>' name = 'action[]' /><?php echo e($cek($row)); ?></td>
                                  <td><?php echo e($row->title); ?></td>
                              </tr>
                            <?php endforeach; ?>
                          
                          </tbody>

                      </table>

                      <button type="submit" class="btn btn-primary"><?php echo e(!empty($model->id) ? 'Update' : 'Save'); ?></button>
                    
                    <?php echo Form::close(); ?>


                </div>

            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>