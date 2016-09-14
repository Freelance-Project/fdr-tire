<?php echo $__env->make('backend.layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('backend.elfinder', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div id="app_navigation">
        <link type="text/css" href="<?php echo e(asset(null)); ?>backend/css/style.css" rel="stylesheet"/>
        <script type="text/javascript" src="<?php echo e(asset(null)); ?>backend/js/script.js"></script>
        <div id="slick-navigation">
            <?php echo $__env->make('backend.layouts.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div style="height: 40px;background-color:#fff;width:100%">&nbsp;</div>
            <?php echo $__env->yieldContent('content'); ?>
            <div id="app_footer">
                <div class="logo_"></div>
                <div class="clear"></div>
            </div>
        </div>
        </body>
<?php if(Session::has('infos')): ?>
<script type="text/javascript">
    swal({
        type: 'warning',
        title : 'Warning',
        text : '<?php echo e(Session::get("infos")); ?>',
    });
</script>

<?php endif; ?>
<?php echo $__env->yieldContent('script'); ?>
</html>
