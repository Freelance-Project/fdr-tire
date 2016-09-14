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
					
					<div class="form-group col-md-12">
						<label>Judul</label>
                        <?php echo Form::text('judul' , $model->judul ,['class' => 'form-control']); ?>

					</div>
                    
					<div class="form-group col-md-6">
						<label>Tahun</label>
                        <?php echo Form::text('tahun' , $model->tahun ,['class' => 'form-control']); ?>

					</div>
			
					<div class="form-group col-md-6">
						<label>Bentuk File</label><br>
                        <?php echo Form::select('bentuk_file',['soft'=>'Softcopy','hard'=>'Hardcopy'], null, ['class'=>'form-control']); ?>

					</div>
					<div class="form-group col-md-12">
						<label>File</label>
						<div>
							<a class="Wbutton" onclick = "return browseElfinder('filename'  , 'file_tempel' , 'elfinder_browse1' , 'cancelBrowse')" >Browse</a>
							Suggestion PDF Size (726,449)
						</div>
						<input type = 'hidden' name = 'filename' id = 'filename' />
					</div>
					
										
					<div class="form-group col-md-12">
						<button type="submit" class="btn btn-primary"><?php echo e(!empty($model->id) ? 'Update' : 'Save'); ?></button>
                    </div>
					
					
                    <?php echo Form::close(); ?>


                </div>

            </div>

        </div>
    </div>
	<?php echo $__env->make('backend.popElfinder', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
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