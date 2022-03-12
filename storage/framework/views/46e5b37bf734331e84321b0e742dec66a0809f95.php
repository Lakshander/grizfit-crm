<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.6
Version: 4.5.6
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>Fitsigma | Merchant Login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <?php echo HTML::style('admin/global/plugins/font-awesome/css/font-awesome.min.css'); ?>

    <?php echo HTML::style('admin/global/plugins/simple-line-icons/simple-line-icons.min.css'); ?>

    <?php echo HTML::style('admin/global/plugins/bootstrap/css/bootstrap.min.css'); ?>

    <?php echo HTML::style('admin/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css'); ?>

    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <?php echo HTML::style('admin/global/plugins/select2/css/select2.min.css'); ?>

    <?php echo HTML::style('admin/global/plugins/select2/css/select2-bootstrap.min.css'); ?>

    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <?php echo HTML::style('admin/global/css/components-md.min.css'); ?>

    <?php echo HTML::style('admin/global/css/plugins-md.min.css'); ?>

    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <?php echo HTML::style('admin/pages/css/login-5.min.css'); ?>

    <?php echo HTML::style('admin/global/plugins/froiden-helper/helper.css'); ?>

    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo e(asset('ace/images/favicon/apple-icon-57x57.png')); ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo e(asset('ace/images/favicon/apple-icon-60x60.png')); ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo e(asset('ace/images/favicon/apple-icon-72x72.png')); ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(asset('ace/images/favicon/apple-icon-76x76.png')); ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo e(asset('ace/images/favicon/apple-icon-114x114.png')); ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo e(asset('ace/images/favicon/apple-icon-120x120.png')); ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo e(asset('ace/images/favicon/apple-icon-144x144.png')); ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo e(asset('ace/images/favicon/apple-icon-152x152.png')); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('ace/images/favicon/apple-icon-180x180.png')); ?>">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo e(asset('ace/images/favicon/android-icon-192x192.png')); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('ace/images/favicon/favicon-32x32.png')); ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo e(asset('ace/images/favicon/favicon-96x96.png')); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('ace/images/favicon/favicon-16x16.png')); ?>">
    <link rel="manifest" href="<?php echo e(asset('ace/images/favicon//manifest.json')); ?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo e(asset('ace/images/favicon/ms-icon-144x144.png')); ?>">
    <meta name="theme-color" content="#ffffff">
    <style>
        .display-hide-reset {
            display: none;
        }
        .user-login-5 .alert {
            margin-top: 0;
        }
        .logo-padding-bottom {
            padding-bottom: 35px;
        }
        .hide-forget-form {
            display: none;
        }
    </style>
</head>
<!-- END HEAD -->

<body class=" login">
<!-- BEGIN : LOGIN PAGE 5-2 -->
<div class="user-login-5">
    <div class="row bs-reset">
        <div class="col-md-6 login-container bs-reset">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
        <div class="col-md-6 bs-reset">
            <div class="login-bg"> </div>
        </div>
    </div>
</div>
<!-- END : LOGIN PAGE 5-2 -->
<!--[if lt IE 9]>
<?php echo HTML::script('admin/global/plugins/respond.min.js'); ?>

<?php echo HTML::script('admin/global/plugins/excanvas.min.js'); ?>

<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<?php echo HTML::script('admin/global/plugins/jquery.min.js'); ?>

<?php echo HTML::script('admin/global/plugins/bootstrap/js/bootstrap.min.js'); ?>

<?php echo HTML::script('admin/global/plugins/js.cookie.min.js'); ?>

<?php echo HTML::script('admin/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js'); ?>

<?php echo HTML::script('admin/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js'); ?>

<?php echo HTML::script('admin/global/plugins/jquery.blockui.min.js'); ?>

<?php echo HTML::script('admin/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js'); ?>

<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<?php echo HTML::script('admin/global/plugins/jquery-validation/js/jquery.validate.min.js'); ?>

<?php echo HTML::script('admin/global/plugins/jquery-validation/js/additional-methods.min.js'); ?>

<?php echo HTML::script('admin/global/plugins/select2/js/select2.full.min.js'); ?>

<?php echo HTML::script('admin/global/plugins/backstretch/jquery.backstretch.min.js'); ?>

<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<?php echo HTML::script('admin/global/scripts/app.min.js'); ?>

<?php echo HTML::script("admin/global/plugins/froiden-helper/helper.js"); ?>

<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<!-- END THEME LAYOUT SCRIPTS -->
<script>
        $('#login-form').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url : '<?php echo e(route('merchant.login.store')); ?>',
                type: 'POST',
                data: $('#login-form').serialize(),
                container: '#login-form',
                success: function (response) {
                    if(response.url == "") {
                        $('.display-hide').css('display', 'block');
                        $('#error-message').html(response.message);
                    } else {
                        $('#error-msg').removeClass("alert-danger");
                        $('#error-msg').addClass("alert-success");
                        $('.display-hide').css('display', 'block');
                        $('#error-message').html(response.message);
                        window.location.href = response.url;
                    }
                }
            });
            return false;
        });

        $('#reset-password-form').on('submit', function() {
            event.preventDefault();
            $.ajax({
                url : '<?php echo e(route('merchant.login.send-reset-link')); ?>',
                type: 'POST',
                data: $('#reset-password-form').serialize(),
                container: '#reset-password-form',
                success: function (response) {
                    if(response.success == false) {
                        $('.display-hide-reset').css('display', 'block');
                        $('#error-reset-message').html(response.message);
                    } else {
                        $('#error-reset-msg').removeClass("alert-danger");
                        $('#error-reset-msg').addClass("alert-success");
                        $('.display-hide-reset').css('display', 'block');
                        $('#error-reset-message').html(response.message);
                    }
                }
            });
            return false;
        });

        $('#forget-password').click(function(){
            $('.login-form').hide();
            $('h1').hide();
            $('.hide-forget-form').css('display', 'block');
            $('.forget-form').show();
        });

        $('#back-btn').click(function(){
            $('h1').show();
            $('.login-form').show();
            $('.hide-forget-form').css('display', 'none');
            $('.forget-form').hide();
        });

        var image_1;
        <?php if(isset($gymSettings) && is_null($gymSettings)): ?>
            image_1 = '<?php echo e(asset("admin/pages/img/login/bg1.jpg")); ?>';
        <?php else: ?>
            <?php if($gymSettings->front_image != ''): ?>
                <?php if($gymSettings->local_storage == '0'): ?>
                    image_1 = '<?php echo $gymSettingPath.$gymSettings->front_image; ?>';
                <?php else: ?>
                    image_1 = '<?php echo asset('/uploads/gym_setting/master/').'/'.$gymSettings->front_image; ?>'
                <?php endif; ?>
            <?php else: ?>
                    image_1 = '<?php echo e(asset("admin/pages/img/login/bg1.jpg")); ?>'
            <?php endif; ?>
        <?php endif; ?>

        $('.login-bg').backstretch([
                image_1
            ], {
                fade: 1000,
                duration: 8000
            }
        );

        $('.forget-form').hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
</script>
</body>

</html>