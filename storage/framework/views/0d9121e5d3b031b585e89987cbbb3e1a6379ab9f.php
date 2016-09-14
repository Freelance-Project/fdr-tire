<?php $__env->startSection('content'); ?>

<?php
  $checked = function($id,$roleId){
      $model = injectModel('Right');
      $cek = $model->whereMenuActionId($id)->whereRoleId($roleId)->first();

      if(!empty($cek->id))
      {
        return 'checked';
      }
  };
?>


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
                          <label>Role</label>
                          <?php echo Form::text('role' , null ,['class' => 'form-control','readonly']); ?>

                        </div>
                      
                        <table class = 'table table-bordered'>
                          
                            <?php foreach($menu->whereParentId(null)->orderBy('order','asc')->get() as $parent): ?>
                              <?php if($parent->childs->count() > 0): ?>
                                <thead>
                                  <tr class = 'danger'>
                                    <th ><?php echo e($parent->title); ?></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php foreach($parent->childs as $child): ?>

                                      <?php foreach($child->actions as $action): ?>
                                        
                                          

                                          <tr class = 'success'>
                                          
                                            <td><input <?= @$checked($action->pivot->id,$model->id) ?> name ='menu_action_id[]' value = '<?php echo e($action->pivot->id); ?>' type = 'checkbox'> <?php echo e($action->title); ?> <?php echo e($child->title); ?></td>
                                          
                                          </tr>

                                      <?php endforeach; ?>
                                  
                                  <?php endforeach; ?>
                                </tbody>  
                              <?php endif; ?>
                            <?php endforeach; ?>
                          
                        
                        </table>

                      <button type="submit" class="btn btn-primary"><?php echo e(!empty($model->id) ? 'Update' : 'Save'); ?></button>
                    
                    <?php echo Form::close(); ?>


                </div>

            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>