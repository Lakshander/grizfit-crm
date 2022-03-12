<!DOCTYPE html>
<html lang="en">

<?php echo $__env->make("layouts.gym-merchant.headmaterial", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<body class="page-container-bg-solid  page-md">


<!-- BEGIN HEADER -->
<div class="page-header">
    <!-- BEGIN HEADER TOP -->
    <div class="page-header-top">
        <div class="container-fluid">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="<?php echo e(route('gym-admin.dashboard.index')); ?>">
                    <?php if(is_null($gymSettings)): ?>
                        <?php echo HTML::image(asset('/fitsigma/images/').'/'.'fitsigma-logo-full-red.png', 'Logo',array("class" => "logo-default img-responsive image-change")); ?>

                    <?php else: ?>
                        <?php if($gymSettings->image != ''): ?>
                            <?php if($gymSettings->local_storage == '0'): ?>
                                <?php echo HTML::image($gymSettingPath.$gymSettings->image, 'Logo',array("class" => "logo-default img-responsive image-change", "style" => "height:51px")); ?>

                            <?php else: ?>
                                <?php echo HTML::image(asset('/uploads/gym_setting/master/').'/'.$gymSettings->image, 'Logo',array("class" => "logo-default img-responsive image-change", "style" => "height:51px")); ?>

                            <?php endif; ?>
                        <?php else: ?>
                            <?php echo HTML::image(asset('/fitsigma/images/').'/'.'fitsigma-logo-full-red.png', 'Logo',array("class" => "logo-default img-responsive image-change")); ?>

                        <?php endif; ?>
                    <?php endif; ?>
                </a>
            </div>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler"></a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <?php if($user->is_admin == 1): ?>
                    <div class="btn-group margin-top-5 hidden-sm hidden-xs">
                        <a class="btn green dropdown-toggle" data-toggle="dropdown" href="javascript:;" aria-expanded="true"> <?php echo e($common_details->title); ?>

                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="javascript:;" onclick="changeBranch(<?php echo e($branch->id); ?>);return false;"><?php echo e($branch->title); ?>

                                        <?php if(isset($merchantBusiness->detail_id) && isset($branch->id) && $merchantBusiness->detail_id == $branch->id): ?> <i class="fa fa-check"></i> <?php endif; ?>
                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <div class="btn-group margin-top-5 hidden-sm hidden-xs">
                    <a class="btn red dropdown-toggle" data-toggle="dropdown" href="javascript:;" aria-expanded="true"> Quick Links
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if($user->can("view_enquiry") && $user->can("add_enquiry")): ?>
                            <li>
                                <a href="<?php echo e(route('gym-admin.enquiry.create')); ?>">New Enquiry
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if($user->can("view_payments") && $user->can("add_payment")): ?>
                            <li>
                                <a href="<?php echo e(route('gym-admin.membership-payment.create')); ?>"> Add Payment </a>
                            </li>
                        <?php endif; ?>
                        <?php if($user->can("add_attendance")): ?>
                            <li>
                                <a href="<?php echo e(route('gym-admin.attendance.create')); ?>"> Mark Attendance</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>

                <div class="btn-group margin-top-5 ">
                    <?php if($user->trial_end_date!=''): ?>
                        <?php if(\Carbon\Carbon::now('Asia/Calcutta')->diffInDays(\Carbon\Carbon::createFromFormat('Y-m-d', $user->trial_end_date), false) > 0): ?>
                            <a href="<?php echo e(route('gym-admin.buy-plan.index')); ?>" class="btn yellow-lemon uppercase"><?php echo e(\Carbon\Carbon::now('Asia/Calcutta')->diff(\Carbon\Carbon::createFromFormat('Y-m-d', $user->trial_end_date))->days); ?> Days Trial <span class="hidden-xs hidden-sm">Remaining</span> <i class="icon-clock hidden-xs hidden-sm"></i></a>
                        <?php elseif(\Carbon\Carbon::now('Asia/Calcutta')->diffInDays(\Carbon\Carbon::createFromFormat('Y-m-d', $user->trial_end_date), false) == 0): ?>
                            <a href="<?php echo e(route('gym-admin.buy-plan.index')); ?>" class="btn yellow-lemon uppercase">Trial Ends Tomorrow <i class="icon-clock hidden-xs hidden-sm"></i></a>
                        <?php else: ?>
                            <a href="<?php echo e(route('gym-admin.buy-plan.index')); ?>" class="btn yellow-lemon uppercase">upgrade <i class="icon-energy hidden-xs hidden-sm"></i></a>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if(!is_null($activePlan)): ?>
                            <a href="#" class="btn btn-outline blue ">Your plan expires in <?php echo e(\Carbon\Carbon::now('Asia/Calcutta')->diff($activePlan->plan_expires_on)->days); ?> Days</a>
                    <?php endif; ?>
                </div>

                <ul class="nav navbar-nav pull-right">
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                    <li class="dropdown dropdown-extended dropdown-notification dropdown-dark"
                        id="header_notification_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">
                            <?php if($unreadNotifications > 0): ?>
                                <i class="fa fa-bell-o faa-ring animated"></i>
                                <span class="badge badge-default merchant-notif-count"><?php echo e($unreadNotifications); ?></span>
                            <?php else: ?>
                                <i class="fa fa-bell-o"></i>
                            <?php endif; ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="external">
                                <h3><strong><?php echo e($unreadNotifications); ?> unread</strong> notifications</h3>
                                <a class="mark-read" href="javascript:;">Mark All Read</a>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller  merchant-notifications" style="height: 250px;"
                                    data-handle-color="#637283">

                                    <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notif): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a href="javascript:;">
                                                <?php if($notif->read_status == 'unread'): ?>
                                                    <i class="fa fa-circle font-green-jungle pull-right unread-circle margin-top-5"></i>
                                                <?php endif; ?>
                                                <span class="time"><?php echo e($notif->created_at->diffForHumans(null,true)); ?> </span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-success">
                                                    <i class="fa fa-bullhorn"></i>
                                                    </span>
                                                    <?php echo e($notif->title); ?>

                                                </span>
                                            </a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- END NOTIFICATION DROPDOWN -->
                    <li class="droddown dropdown-separator">
                        <span class="separator"></span>
                    </li>


                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <li class="dropdown dropdown-user dropdown-dark">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <?php if($user->image ==''): ?>
                                <img src="<?php echo e(asset('/fitsigma/images/').'/'.'user.svg'); ?>" class="img-circle img-change" alt="" />
                            <?php else: ?>
                                <?php if($gymSettings->local_storage == '0'): ?>
                                    <img class="img-circle img-change" src="<?php echo e($profilePath.$user->image); ?>" alt="" />
                                <?php else: ?>
                                    <img class="img-circle img-change" src="<?php echo e(asset('/uploads/profile_pic/thumb/').'/'.$user->image); ?>" alt="" />
                                <?php endif; ?>
                            <?php endif; ?>

                            <span class="username username-hide-mobile"><?php echo e(ucwords($user->first_name)); ?></span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <?php if($user->can("update_profile")): ?>
                                <li>
                                    <a href="<?php echo e(route('gym-admin.profile.index')); ?>">
                                        <i class="icon-user"></i> My Profile </a>
                                </li>
                            <?php endif; ?>
                            
                                
                                    
                            
                            <?php if($user->can("update_settings")): ?>
                                <li>
                                    <a href="<?php echo e(route('gym-admin.setting.index')); ?>">
                                        <i class="fa fa-gear faa-spin animated"></i> Settings </a>
                                </li>
                            <?php endif; ?>
                            
                                
                                    
                            
                            <?php if($user->can('manage_permissions')): ?>
                                <li>
                                    <a href="<?php echo e(route('gym-admin.users.index')); ?>">
                                        <i class="fa fa-lock"></i> User Permissions </a>
                                </li>
                            <?php endif; ?>
                            <?php if($user->can('download_backup')): ?>
                                <li>
                                    <a href="<?php echo e(route('gym-admin.backup.index')); ?>">
                                        <i class="fa fa-cloud-download"></i> Take Backup </a>
                                </li>
                                <li class="divider"></li>
                            <?php endif; ?>
                            <li>
                                <a href="<?php echo e(route('merchant.lockscreen')); ?>">
                                    <i class="icon-lock"></i> Lock Screen </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('gym-admin.logout.index')); ?>">
                                    <i class="icon-key"></i> Log Out </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                    <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                    <!-- END QUICK SIDEBAR TOGGLER -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
    </div>
    <!-- END HEADER TOP -->


    <!-- BEGIN HEADER MENU -->
    <?php echo $__env->make('gym-admin.gymmenumaterial', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- END HEADER MENU -->
</div>
<!-- END HEADER -->
<div class="page-container">
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->

        <!-- BEGIN PAGE CONTENT BODY -->
        <div class="page-content">

                 <?php echo $__env->yieldContent('content'); ?>

        </div>
        <!-- END PAGE CONTENT BODY -->
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
</div>

<!-- BEGIN FOOTER -->

<div class="page-prefooter">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12 footer-block">
                <h2>About</h2>
                <p> <?php echo e(($gymSettings != '' && $gymSettings->about != '')? $gymSettings->about: ''); ?> </p>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 footer-block">
                <h2>Video Tutorials</h2>
                <div class="subscribe-form">
                    <a href="<?php echo e(route('gym-admin.tutorial.index')); ?>" class="btn  btn-lg" >Watch Tutorial <i class="fa fa-youtube-play"></i></a>
                </div>
            </div>
            <div class="col-md-2 col-sm-6 col-xs-12 footer-block">
                <h2>Follow Us On</h2>
                <ul class="social-icons">
                    <li>
                        <a href="<?php echo e(($gymSettings != '' && $gymSettings->fb_url != '')? $gymSettings->fb_url: 'javascript:;'); ?>" target="_blank" data-original-title="facebook" class="facebook"></a>
                    </li>
                    <li>
                        <a href="<?php echo e(($gymSettings != '' && $gymSettings->twitter_url != '')? $gymSettings->twitter_url: 'javascript:;'); ?>" target="_blank" data-original-title="twitter" class="twitter"></a>
                    </li>
                    <li>
                        <a href="<?php echo e(($gymSettings != '' && $gymSettings->google_url != '')? $gymSettings->google_url: 'javascript:;'); ?>" target="_blank" data-original-title="googleplus" class="googleplus"></a>
                    </li>
                    <li>
                        <a href="<?php echo e(($gymSettings != '' && $gymSettings->youtube_url != '')? $gymSettings->youtube_url: 'javascript:;'); ?>" target="_blank" data-original-title="youtube" class="youtube"></a>
                    </li>
                </ul>
            </div>
            <!-- <div class="col-md-2">
                <h2>Download App</h2>
                <a href="https://play.google.com/store/apps/details?id=com.huntplex.ace" target="_blank"><img src="<?php echo e(asset('admin/global/img/PlayStoreButton.png')); ?>" class="img-responsive" alt=""></a>
            </div> -->
            <div class="col-md-2 col-sm-6 col-xs-12 footer-block">
                <h2>Contact</h2>
                <address class="margin-bottom-40"> Email:
                    <a href="mailto:<?php echo e(($gymSettings != '' && $gymSettings->contact_mail != '')? $gymSettings->contact_mail: ''); ?>"><?php echo e(($gymSettings != '' && $gymSettings->contact_mail != '')? $gymSettings->contact_mail: ''); ?></a>
                </address>
            </div>
        </div>
    </div>
</div>

<div class="page-footer hidden-xs hidden-sm">
    <div class="container-fluid">

        <div class="col-md-9">
            <?php echo e(($common_details != '' && $common_details->title != '')? $common_details->title : ''); ?>

        </div>

    </div>
</div>
<div class="page-footer mobile-quick-menu visible-xs visible-sm">
    <div class="container-fluid">

        <div class="col-xs-12 text-center">
            <a href="javascript:;" id="quick-menu-link" class="btn btn-circle btn-icon-only green no-print">
                <i class="fa fa-plus"></i>
            </a>
        </div>
    </div>
</div>

<div class="scroll-to-top no-print">
    <i class="icon-arrow-up"></i>
</div>



<!-- END FOOTER -->



<div class="modal fade" id="quick-menu-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-green bg-font-green">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: left"><i class="fa fa-hand-pointer-o"></i> Quick Menu</h4>
            </div>
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="<?php echo e(route('gym-admin.dashboard.index')); ?>"><i class="fa fa-dashboard"></i> Dashboard </a>
                </li>
                <li class="list-group-item">
                    <a href="<?php echo e(route('gym-admin.client.create')); ?>"><i class="icon-users"></i> Add Client </a>
                </li>
                <li class="list-group-item">
                    <a href="<?php echo e(route('gym-admin.client-purchase.index')); ?>"><i class="icon-refresh"></i> Add Subscription </a>
                </li>
                <li class="list-group-item">
                    <a href="<?php echo e(route('gym-admin.attendance.create')); ?>"><i class="icon-check"></i> Mark Attendance</a>
                </li>
                <li class="list-group-item">
                    <a href="<?php echo e(route('gym-admin.membership-payment.create')); ?>"><i class="fa fa-rupee"></i> Add Payment </a>
                </li>
                
                    
                
            </ul>
        </div>
    </div>
</div>



<div class="modal fade bs-modal-md in" id="agree-terms-modal"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" id="modal-data-application">
        <div class="modal-content" >
            <div class="modal-header">
                <span class="caption-subject font-red-sunglo bold uppercase" id="modelHeading">You need to Accept terms &amp; conditions to continue</span>
            </div>
            <div class="modal-body text-center">
                <div class="form-group form-md-checkboxes">
                    <div class="md-checkbox-inline">
                        <div class="md-checkbox">
                            <input type="checkbox" id="accept-terms-check" class="md-check">
                            <label for="accept-terms-check">
                                <span></span>
                                <span class="check"></span>
                                <span class="box"></span> Accept &amp; Continue </label>
                        </div>
                    </div>
                </div>
                <h4>Check to accept <a href="https://huntplex.com/business/agreement" target="_blank">terms & conditions</a></h4>
            </div>
            <div class="modal-footer">
                <a href="<?php echo e(route('gym-admin.logout.index')); ?>" class="font-grey-cascade">Logout</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>





<div class="modal fade" id="tutorial-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" id="modal-data-application">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <span class="caption-subject font-red-sunglo bold uppercase" id="modelHeading"></span>
            </div>
            <div class="modal-body">
                Loading...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn default" data-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
</div>

<?php echo $__env->yieldContent('modal'); ?>
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<?php echo HTML::script("admin/global/plugins/respond.min.js"); ?>

<?php echo HTML::script("admin/global/plugins/excanvas.min.js"); ?>

<![endif]-->
<?php echo HTML::script("admin/global/plugins/jquery.min.js"); ?>

<?php echo HTML::script("admin/global/plugins/jquery-migrate.min.js"); ?>

        <!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<?php echo HTML::script("admin/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js"); ?>

<?php echo HTML::script("admin/global/plugins/bootstrap/js/bootstrap.min.js"); ?>

<?php echo HTML::script("admin/global/plugins/js.cookie.min.js"); ?>




<?php echo HTML::script("admin/global/plugins/jquery.blockui.min.js"); ?>

<?php echo HTML::script("admin/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js"); ?>



<?php echo HTML::script("admin/global/plugins/jquery-idle-timeout/jquery.idletimeout.js"); ?>

<?php echo HTML::script("admin/global/plugins/jquery-idle-timeout/jquery.idletimer.js"); ?>



<?php echo HTML::script("admin/global/plugins/jquery.cokie.min.js"); ?>

<?php echo HTML::script("admin/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js"); ?>

<?php echo HTML::script("admin/global/plugins/select2/select2.min.js"); ?>

        <!-- END CORE PLUGINS -->
<?php echo HTML::script("admin/global/scripts/app.js"); ?>

<?php echo HTML::script('admin/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js'); ?>

<?php echo HTML::script('admin/pages/scripts/components-bootstrap-maxlength.min.js'); ?>


<?php echo HTML::script("admin/global/scripts/metronic.js"); ?>

<?php echo HTML::script("admin/admin/layout3/scripts/layout.min.js"); ?>

<?php echo HTML::script("admin/admin/layout3/scripts/demo.js"); ?>

<?php echo HTML::script("admin/global/plugins/froiden-helper/helper.js?v=1.2"); ?>


<?php echo $__env->yieldContent("footer"); ?>


<script>

    var sameOrigin;
    try
    {
        sameOrigin = window.parent.location.host == window.location.host;
    }
    catch (e)
    {
        sameOrigin = false;
    }


    var UIIdleTimeout = function () {

        return {

            //main function to initiate the module
            init: function () {

                // cache a reference to the countdown element so we don't have to query the DOM for it on each ping.
                var $countdown;

                $('body').append('<div class="modal fade" id="idle-timeout-dialog" data-backdrop="static"><div class="modal-dialog modal-small"><div class="modal-content"><div class="modal-header"><h4 class="modal-title">Your session is about to expire.</h4></div><div class="modal-body"><p><i class="fa fa-warning"></i> You session will be locked in <span id="idle-timeout-counter"></span> seconds.</p><p>Do you want to continue your session?</p></div><div class="modal-footer"><button id="idle-timeout-dialog-logout" type="button" class="btn btn-default">No, Logout</button><button id="idle-timeout-dialog-keepalive" type="button" class="btn btn-primary" data-dismiss="modal">Yes, Keep Working</button></div></div></div></div>');

                // start the idle timer plugin
                $.idleTimeout('#idle-timeout-dialog', '.modal-content button:last', {
                    idleAfter: <?php echo e((!is_null($gymSettings->idle_time))? $gymSettings->idle_time : 600); ?>, // 10 minutes
                    timeout: 60000, //60 seconds to timeout
                    pollingInterval: 5, // 5 seconds
                    keepAliveURL: '<?php echo e(route('merchant.keep-alive')); ?>',
                    serverResponseEquals: 'OK',
                    AJAXTimeout: 10000,
                    onTimeout: function () {
                        window.location = "<?php echo e(url('lock-screen')); ?>";
                    },
                    onIdle: function () {
                        $('#idle-timeout-dialog').modal('show');
                        $countdown = $('#idle-timeout-counter');

                        $('#idle-timeout-dialog-keepalive').on('click', function () {
                            $('#idle-timeout-dialog').modal('hide');
                        });

                        $('#idle-timeout-dialog-logout').on('click', function () {
                            $('#idle-timeout-dialog').modal('hide');
                            $.idleTimeout.options.onTimeout.call(this);
                        });
                    },
                    onCountdown: function (counter) {
                        $countdown.html(counter); // update the counter
                    }
                });

            }

        };

    }();
</script>


<script>
    jQuery(document).ready(function () {

        Metronic.init(); // init metronic core components
//        Layout.init(); // init current layout
        Demo.init(); // init demo features

        <?php if($isDesktop): ?>
            UIIdleTimeout.init();
        <?php endif; ?>

    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    function clear_form_elements(id_name) {
        jQuery("#" + id_name).find(':input').each(function () {
            switch (this.type) {
                case 'password':
                case 'text':
                case 'textarea':
                case 'file':
                case 'select-one':
                case 'select-multiple':
                    jQuery(this).val('');
                    break;
                case 'checkbox':
                case 'radio':
                    this.checked = false;
            }
        });
    }
</script>

<script>
    $('.mark-read').click(function () {
        var url = '<?php echo e(URL::route("gym-admin.dashboard.markRead")); ?>';

        $.easyAjax({
            url: url,
            type: 'POST',
            data: {_token: "<?php echo e(csrf_token()); ?>"},
            success: function (response) {
                $('.merchant-notifications li').each(function () {
                    $(this).find(".unread-circle").remove();
                });
                $('.merchant-notif-count').remove();
            }
        })

    });

    $('#quick-menu-link').click(function () {
       $('#quick-menu-modal').modal('show');
    });


    $('.watch-tutorial').click(function () {
        var id = $(this).data('video-id');
        var show_url = '<?php echo e(route('gym-admin.tutorial.show',['#id'])); ?>';
        var url = show_url.replace('#id', id);
        $('#modelHeading').html('Ace Tutorial');
        $.ajaxModal("#tutorial-modal", url);
    });
    
</script>

<?php if(App::environment('production')): ?>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/562639e46071ea8e77d52b34/1ap5mmp7i';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->
<?php endif; ?>
<script>
    function changeBranch(id) {
        $.easyAjax({
            type: 'POST',
            url: '<?php echo e(route('gym-admin.superadmin.setBusinessId')); ?>',
            data: { 'businessId': id },
            success: function (response) {
                if(response.success == true) {
                    window.location.reload();
                }
            }
        });
    }
</script>
</body>
</html>