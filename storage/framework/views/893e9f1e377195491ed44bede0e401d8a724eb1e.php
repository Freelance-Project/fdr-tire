<?php $__env->startSection('content'); ?>

<div id="app_header_shadowing"></div>





 <div class = 'row'>

    <div class = 'col-md-8'>
        <div id="app_content">
            <div id="content_header">
                <h3 class="user">Chart</h3>
            </div>
            <div id="content_body">
                <?php echo Chart::display("chart", $charts); ?>

                   
            </div>
        </div>
    </div>

     <div class = 'col-md-4'>
        <div id="app_content">
            <div id="content_header">
                <h3 class="user">Last Activities</h3>
            </div>
            <div id="content_body">

                <table class = 'table table-bordered'>
                    <tbody>
                        <?php foreach($last as $row): ?>
                            
                            <tr class = "<?php echo e($row->id % 2 == 0 ? 'success' : 'danger'); ?>">
                                <td><?php echo e($row->action); ?></td>
                                <td><?php echo e(Carbon\Carbon::parse($row->created_at)->format("d F ,Y H:i:s")); ?></td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
                   
            </div>
        </div>
    </div>

</div>
    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>