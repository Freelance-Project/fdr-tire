<?php $__env->startSection('content'); ?>

<div id="app_header_shadowing"></div>
<div id="app_content">
    <div id="content_header">
        <h3 class="user"> <?php echo e(helper::titleActionForm()); ?></h3>
    </div>
        <div id="content_body">
            
            <div class = 'row'>

                <div class = 'col-md-6'>

                    <div id = 'elfinder'>

                    </div>

                </div>

            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
  
  

  <script type="text/javascript" charset="utf-8">
      var validation_upload = "<?php echo sha1(date('Y-m-d').env('APP_SALT'))?>";
      $().ready(function() {
          var urlImage = '<?php echo e(url("/backend/elfinder/php/connector.minimal.php")); ?>';
          var elf = $('#elfinder').elfinder({
              url :  urlImage + '?token='+validation_upload ,
          }).elfinder('instance');             
      });
  </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>