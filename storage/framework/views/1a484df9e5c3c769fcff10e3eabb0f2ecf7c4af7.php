<?php $__env->startSection('content'); ?>

<div id="app_header_shadowing"></div>
<div id="app_content">
    <div id="content_header">
        <h3 class="user"><?php echo e(helper::titleActionForm()); ?></h3>
    </div>
    <div id="content_body">

        <?php echo $__env->make('backend.common.flashes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class = 'row'>
           <div class = 'col-md-12'>

               
                <p>&nbsp;</p>
                <p>&nbsp;</p>

                <table class = 'table' id = 'table'>
                    <thead>
                        <tr>
                            <th>Parent</th>
                            <th>Title</th>
                            <th>Controller</th>
                            <th>Order</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($model->whereParentId(null)->orderBy('order','asc')->get() as $row): ?>
                            <tr>
                                <td>This Parent</td>
                                <td><?php echo e($row->title); ?></td>
                                <td><?php echo e($row->controller); ?></td>
                                <td><?php echo e($row->order); ?></td>
                                <td><?php echo helper::buttons($row->id); ?></td>
                            </tr>

                            <?php foreach($row->childs as $child): ?>

                                <tr>
                                    <td style = 'padding-left:40px;'><?php echo e($row->title); ?></td>
                                    <td><?php echo e($child->title); ?></td>
                                    <td><?php echo e($child->controller); ?></td>
                                    <td><?php echo e($child->order); ?></td>
                                    <td><?php echo helper::buttons($child->id); ?></td>
                                </tr>

                            <?php endforeach; ?>

                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>

        </div>

        


    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    
    <script type="text/javascript">
        $(document).ready(function(){
            $("#table").DataTable({
                ordering :false,
            });
        });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>