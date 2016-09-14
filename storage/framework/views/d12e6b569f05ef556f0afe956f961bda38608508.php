<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<meta name="keywords" content="WCMS Version 1.0.0"/>
<meta name="description" content="WCMS Version 1.0.0 Laravel 5.2"/>
<meta name="_token" id = 'csrf-token' content="<?php echo e(csrf_token()); ?>"/>
<link type="text/css" href="<?php echo e(asset(null)); ?>backend/css/reset.css" rel="stylesheet" media="screen,projection"/>

<link type="text/css" href="<?php echo e(asset(null)); ?>backend/css/function.css" rel="stylesheet" media="screen,projection"/>
<link type="text/css" href="<?php echo e(asset(null)); ?>backend/css/login/style.css" rel="stylesheet"/>

<link rel="stylesheet" type="text/css" href="<?php echo e(asset(null)); ?>backend/sweetalert/dist/sweetalert.css">
<script type="text/javascript" src="<?php echo e(asset(null)); ?>backend/js/1.8.0.js"></script>
<script src="<?php echo e(asset(null)); ?>backend/sweetalert/dist/sweetalert.min.js"></script>


<title><?php echo e($title); ?></title>
</head>
<body>
<div id="body-wrapper">
    <div id="wrapper-content">
        <div id="wg-user-admin-webarq-login" class="normal" style="margin-top:10%;">
            <div class="wg-header header-left">
                <div class="wg-header header-right">
                    <div class="wg-header header-center">
                        <div id="inner-header-right">
                            <div class="logo-client">
                                &nbsp;
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $__env->yieldContent('content'); ?>
            <div class="wg-footer">
                <div class="wording">Content Management System</div>
            </div>
            <div class="break10"></div>
            
        </div>
    </div>
</div>
</div>
</body>
<?php echo $__env->yieldContent('script'); ?>
</html>