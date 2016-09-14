 <div class="pop_back" style = 'display:none;' >
        <div style = 'margin-top:10px;'>
        	<img onclick = 'return browseElfinderClose();' style = 'width:20px;height:20px;' src="<?php echo e(asset('backend/images')); ?>/close.png">
        </div>
        <div style = 'margin-left:25%;margin-top:10%;' id = 'elfinder_browse'></div>
        
        <?php for($a=0;$a<10;$a++): ?>
        	<div style = 'margin-left:25%;margin-top:10%;' id = 'elfinder_browse<?php echo e($a); ?>'></div>
		<?php endfor; ?>
</div>