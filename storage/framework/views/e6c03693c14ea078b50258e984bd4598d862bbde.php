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

                    <?php echo helper::buttonCreate(); ?>

                
                
                <p>&nbsp;</p>
                <p>&nbsp;</p>

                <table class = 'table' id = 'table'>
                    <thead>
                        <tr>
                            <th width = ''>Role</th>
                            <th width = ''>Name</th>
                            <th width = ''>Email</th>
                            <th width = ''>Action</th>
                        </tr>
                    </thead>
                    
                </table>

            </div>

        </div>

        


    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    
    <script type="text/javascript">
        
        $(document).ready(function(){
            $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '<?php echo e(urlBackendAction("data")); ?>',
                columns: [
                    { data: 'role', name: 'role' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'action', name: 'action' , searchable: false},
                    
                ]
            });
        });

    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>