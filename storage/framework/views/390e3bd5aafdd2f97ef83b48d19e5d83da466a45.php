<?php $__env->startSection('CSS'); ?>

    <?php echo HTML::style('admin/global/plugins/ladda/ladda-themeless.min.css'); ?>

    <?php echo HTML::style('admin/global/plugins/bootstrap-select/css/bootstrap-select.min.css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid"      >

        <!-- BEGIN PAGE BREADCRUMBS -->
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="<?php echo e(route('gym-admin.dashboard.index')); ?>">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Account Setup 2 of 5</span>
            </li>
        </ul>
        <!-- END PAGE BREADCRUMBS -->
        <!-- BEGIN PAGE CONTENT INNER -->
        <div class="page-content-inner">


            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="icon-layers font-red"></i>
                                <span class="caption-subject font-red bold uppercase"> Account setup wizard</span>
                            </div>
                            <div class="actions">
                                <span class="caption-subject font-red bold uppercase"> STEP 2 of 5</span>
                            </div>
                        </div>
                        <div class="portlet-body">

                            <div class="col-md-12">
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-success" role="progressbar"
                                         aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                         style="width: <?php echo e(($completedItems*(100/$completedItemsRequired))); ?>%">
									<span class="sr-only">
									<?php echo e(($completedItems*(100/$completedItemsRequired))); ?>% Complete </span>
                                    </div>
                                </div>
                            </div>

                            <?php echo Form::open(['route'=>'gym-admin.profile.store','id'=>'form_sample_3','class'=>'ajax-form form-horizontal','method'=>'POST','files' => true]); ?>

                            <?php if(!is_null($memberships) && isset($memberships->id)): ?>
                                <input type="hidden" name="membership_id" value="<?php echo e($memberships->id); ?>">
                            <?php endif; ?>
                            <div class="form-wizard">
                            <div class="form-body">
                                <ul class="nav nav-pills nav-justified steps">
                                    <li >
                                        <a href="<?php echo e(route('gym-admin.account-setup.profile')); ?>" class="step">
                                            <span class="number"> 1 </span>
                                                                    <span class="desc">
                                                                        <i class="fa fa-check"></i> Profile Setup </span>
                                        </a>
                                    </li>
                                    <li  class="active">
                                        <a href="javascript:;"  class="step">
                                            <span class="number"> 2 </span>
                                                                    <span class="desc">
                                                                        <i class="fa fa-check"></i> Add Membership </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" class="step active">
                                            <span class="number"> 3 </span>
                                                                    <span class="desc">
                                                                        <i class="fa fa-check"></i> Add Customer </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" class="step">
                                            <span class="number"> 4 </span>
                                                                    <span class="desc">
                                                                        <i class="fa fa-check"></i> Add Subscription </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" class="step">
                                            <span class="number"> 5 </span>
                                                                    <span class="desc">
                                                                        <i class="fa fa-check"></i> Add Payment </span>
                                        </a>
                                    </li>
                                </ul>

                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="title">Membership Name <span class="required" aria-required="true"> * </span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="title" id="title" <?php if(!is_null($memberships) && isset($memberships->title)): ?> value="<?php echo e($memberships->title); ?>" <?php endif; ?>>
                                        <span class="help-block">Enter membership name.</span>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="title">Membership Price <span class="required" aria-required="true"> * </span></label>
                                    <div class="col-md-6">
                                        <div class="input-group left-addon right-addon">
                                            <span class="input-group-addon"><i class="fa <?php echo e($gymSettings->currency->symbol); ?>"></i></span>
                                            <input type="number" class="form-control" name="price" id="price"  <?php if(!is_null($memberships) && isset($memberships->price)): ?> value="<?php echo e($memberships->price); ?>" <?php endif; ?>>
                                            <span class="help-block" id="membership_error">Enter membership price.</span>
                                            <span class="input-group-addon">.00</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="duration">Membership Duration <span class="required" aria-required="true"> * </span></label>
                                    <div class="col-md-6">
                                        <select class="bs-select form-control" data-live-search="true" data-size="8"  name="duration" id="duration">
                                            <option disabled selected value="">Select Membership Duration</option>
                                            <option <?php if(!is_null($memberships) && $memberships->duration == "7"): ?> selected <?php endif; ?> value="7">1 Week</option>
                                            <option <?php if(!is_null($memberships) && $memberships->duration == "1"): ?> selected <?php endif; ?> value="1">1 Month</option>
                                            <option <?php if(!is_null($memberships) && $memberships->duration == "3"): ?> selected <?php endif; ?> value="3">3 Months</option>
                                            <option <?php if(!is_null($memberships) && $memberships->duration == "6"): ?> selected <?php endif; ?> value="6">6 Months</option>
                                            <option <?php if(!is_null($memberships) && $memberships->duration == "12"): ?> selected <?php endif; ?> value="12">12 Months</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="details">Membership Details</label>
                                    <div class="col-md-6">
                                        <textarea class="form-control" name="details" id="details" rows="3"><?php if(!is_null($memberships) && isset($memberships->details)): ?> <?php echo e($memberships->details); ?>  <?php endif; ?></textarea>
                                        <span class="help-block">Describe the benefits of this membership.</span>
                                    </div>
                                </div>

                                <hr>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green mt-ladda-btn ladda-button" data-style="zoom-in" id="save-form">
                                            <span class="ladda-label">
                                                submit</span>
                                            <span class="ladda-spinner"></span>
                                            <div class="ladda-progress" style="width: 0px;"></div>
                                        </button>
                                        <button type="reset" class="btn default">Reset</button>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <?php echo Form::close(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT INNER -->

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <?php echo HTML::script('admin/global/plugins/ladda/spin.min.js'); ?>

    <?php echo HTML::script('admin/global/plugins/ladda/ladda.min.js'); ?>

    <?php echo HTML::script('admin/pages/scripts/ui-buttons.min.js'); ?>


    <?php echo HTML::script('admin/global/plugins/jquery-validation/js/jquery.validate.min.js'); ?>

    <?php echo HTML::script('admin/global/plugins/jquery-validation/js/additional-methods.min.js'); ?>


    <?php echo HTML::script('admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js'); ?>

    <?php echo HTML::script('admin/global/plugins/bootstrap-select/js/bootstrap-select.min.js'); ?>

    <?php echo HTML::script('admin/pages/scripts/components-bootstrap-select.min.js'); ?>


    <script>
        var FormValidationMd = function() {

            var handleValidation3 = function() {
                // for more info visit the official plugin documentation:
                // http://docs.jquery.com/Plugins/Validation
                var form1 = $('#form_sample_3');
                var error1 = $('.alert-danger', form1);
                var success1 = $('.alert-success', form1);

                form1.validate({
                    errorElement: 'span', //default input error message container
                    errorClass: 'help-block help-block-error', // default input error message class
                    focusInvalid: false, // do not focus the last invalid input
                    ignore: "", // validate all fields including form hidden input
                    rules: {
                        title: {
                            required: true
                        },
                        sub_category_id: {
                            required: true
                        },
                        price: {
                            required: true,
                            number: true
                        },
                        duration: {
                            required: true
                        }
                    },

                    invalidHandler: function(event, validator) { //display error alert on form submit
                        success1.hide();
                        error1.show();
                        App.scrollTo(error1, -200);
                    },

                    errorPlacement: function(error, element) {
                        if (element.is(':checkbox')) {
                            error.insertAfter(element.closest(".md-checkbox-list, .md-checkbox-inline, .checkbox-list, .checkbox-inline"));
                        } else if (element.is(':radio')) {
                            error.insertAfter(element.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline"));
                        } else {
                            error.insertAfter(element); // for other inputs, just perform default behavior
                        }
                    },

                    highlight: function(element) { // hightlight error inputs
                        $(element)
                                .closest('.form-group').addClass('has-error'); // set error class to the control group
                    },

                    unhighlight: function(element) { // revert the change done by hightlight
                        $(element)
                                .closest('.form-group').removeClass('has-error'); // set error class to the control group
                    },

                    success: function(label) {
                        label
                                .closest('.form-group').removeClass('has-error'); // set success class to the control group
                    },

                    submitHandler: function(form) {
                        success1.show();
                        error1.hide();


                        $.easyAjax({
                            url: '<?php echo e(route('gym-admin.account-setup.membershipStore')); ?>',
                            container:'#form_sample_3',
                            type: "POST",
                            redirect: true,
                            data: $('#form_sample_3').serialize(),
                            success:function (res) {
                                if(res.status == 'fail')
                                {

                                }
                            }
                        });
                        // $( '#save-form' ).ladda();
                        return false;
                    }
                });
            }

            return {
                //main function to initiate the module
                init: function() {
                    handleValidation3();
                }
            };
        }();

        jQuery(document).ready(function() {
            FormValidationMd.init();
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.gym-merchant.gymbasic', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>