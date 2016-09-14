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
						<label>Nama</label>
                        <?php echo Form::text('name' , $model->name ,['class' => 'form-control']); ?>

					</div>
					
					<div class="form-group col-md-6">
						<label>Tempat Lahir</label>
                        <?php echo Form::text('tempat_lahir' , $model->tempat_lahir ,['class' => 'form-control']); ?>

					</div>
					
					<div class="form-group col-md-6">
						<label>Tanggal Lahir</label>
						<?php echo Form::text('datebirth', null , ['id' => 'datepicker', 'class'=>'form-control']); ?>

					</div>
					
					<div class="form-group col-md-6">
						<label>Jabatan</label>
						<?php echo Form::select('ref_jabatan_id',[1=>1], null, ['class'=>'form-control']); ?>

					</div>
					
					<div class="form-group col-md-6">
						<label>Golongan</label>
                        <?php echo Form::text('golongan' , $model->golongan ,['class' => 'form-control']); ?>

					</div>
					
					<div class="form-group col-md-12">
						<label>Kelompok Bidang Peneliti</label>
						<?php echo Form::select('ref_kelompok_penelitian_id',[1=>1], null, ['class'=>'form-control']); ?>

					</div>
					
					<div class="form-group col-md-12">
						<label>Alamat</label>
                        <?php echo Form::text('address' , $model->address ,['class' => 'form-control']); ?>

					</div>
					
					<div class="form-group col-md-6">
						<label>No. Handphone</label>
                        <?php echo Form::text('nohp' , $model->nohp ,['class' => 'form-control']); ?>

					</div>
					
					<div class="form-group col-md-6">
						<label>Email</label>
                        <?php echo Form::text('email' , $model->email ,['class' => 'form-control']); ?>

					</div>
					
					<div class="form-group col-md-12">
						<label>Pendidikan (Perguruan Tinggi)</label>
                        <?php echo Form::text('education' , $model->education ,['class' => 'form-control']); ?>

					</div>
					
					<div class="form-group col-md-12">
						<label>Pengalaman Kerja</label>
						<?php echo Form::textarea('experience' , $model->experience ,['class' => 'form-control','id'=>'experience']); ?>

					</div>
					
					<div class="form-group col-md-12">
						<label>Kelompok Kepakaran</label><br>
							<div class="form-group col-md-4">
								<?php echo Form::checkbox('ref_kelompok_kepakaran_id', null , false); ?> Mekanika<br>
								<?php echo Form::checkbox('ref_kelompok_kepakaran_id', null , false); ?> Elektronika<br>
								<?php echo Form::checkbox('ref_kelompok_kepakaran_id', null , false); ?> Pertanian<br>
								<?php echo Form::checkbox('ref_kelompok_kepakaran_id', null , false); ?> Pangan<br>
							</div>
							<div class="form-group col-md-4">
								<?php echo Form::checkbox('ref_kelompok_kepakaran_id', null , false); ?> Kesehatan<br>
								<?php echo Form::checkbox('ref_kelompok_kepakaran_id', null , false); ?> Kimia<br>
								<?php echo Form::checkbox('ref_kelompok_kepakaran_id', null , false); ?> Pertambangan<br>
								<?php echo Form::checkbox('ref_kelompok_kepakaran_id', null , false); ?> Lingkungan<br>
							</div>
							<div class="form-group col-md-4">
								Lainnya <?php echo Form::text('ref_kelompok_kepakaran_id_lain', null); ?>

							</div>
					</div>
					
					
					<div class="form-group col-md-12">
						<label>Nama Diklat/Training</label>
                        <?php echo Form::text('name' , $model->name ,['class' => 'form-control']); ?>

					</div>
					
					<div class="form-group col-md-12">
						<label>Waktu/Tanggal Pelaksanaan</label>
                        <?php echo Form::text('waktu_pelaksanaan', null , ['id' => 'datepicker', 'class'=>'form-control']); ?>

					</div>
					
					<div class="form-group col-md-12">
						<label>Nama Penyelenggara dan Tempat</label>
                        <?php echo Form::text('nameplace' , $model->nameplace ,['class' => 'form-control']); ?>

					</div>
					
					<div class="form-group col-md-12">
						<label>Sertifikat</label><br>
                        <?php echo Form::radio('sertifikat' , null, false); ?> Ya<br>
						<?php echo Form::radio('sertifikat' , null, false); ?> Tidak<br>
					</div>
					
					
					
					<div class="form-group col-md-12">
						<label>Nama Workshop/Seminar</label>
                        <?php echo Form::text('name' , $model->name ,['class' => 'form-control']); ?>

					</div>
					
					<div class="form-group col-md-12">
						<label>Waktu/Tanggal Pelaksanaan</label>
                        <?php echo Form::text('waktu_pelaksanaan', null , ['id' => 'datepicker', 'class'=>'form-control']); ?>

					</div>
					
					<div class="form-group col-md-12">
						<label>Nama Penyelenggara dan Tempat</label>
                        <?php echo Form::text('nameplace' , $model->nameplace ,['class' => 'form-control']); ?>

					</div>
					
					<div class="form-group col-md-12">
						<label>Sertifikat</label><br>
                        <?php echo Form::radio('sertifikat' , null, false); ?> Ya<br>
						<?php echo Form::radio('sertifikat' , null, false); ?> Tidak<br>
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