<?php if(@$errors->any()): ?>
		<div class = 'alert alert-danger'>
		    <ul>
		    	<?php foreach(@$errors->all() as $error): ?>
		    		<li><?php echo e($error); ?></li>
		    	<?php endforeach; ?>
		    </ul>
		</div>
<?php endif; ?>