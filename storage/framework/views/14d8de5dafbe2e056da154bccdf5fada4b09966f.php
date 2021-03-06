<?php $__env->startSection('CSS'); ?>

    <?php echo HTML::style('admin/global/plugins/ladda/ladda-themeless.min.css'); ?>

    <?php echo HTML::style('admin/global/plugins/bootstrap-select/css/bootstrap-select.min.css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid"  >
        <!-- BEGIN PAGE BREADCRUMBS -->
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="<?php echo e(route('gym-admin.dashboard.index')); ?>">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="<?php echo e(route('gym-admin.membership.index')); ?>">Membership</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Add Membership</span>
            </li>
        </ul>
        <!-- END PAGE BREADCRUMBS -->
        <!-- BEGIN PAGE CONTENT INNER -->
        <div class="page-content-inner">

            <?php if($completedItems  < $completedItemsRequired): ?>
                

                <div class="row">

                    <div class="col-md-12">
                        <div class="portlet box dark">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-speedometer font-white"></i>
								<span class="caption-subject font-white ">
								Account Setup Progress </span>
                                    <span class="caption-helper"><?php echo e(round($completedItems*(100/$completedItemsRequired),1)); ?>% COMPLETE</span>
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

                                <?php if(trim($user->first_name) == "" || trim($user->last_name) == ""): ?>
                                    <div class="col-md-12">
                                        <strong>Next Step:</strong>
                                        <a href="<?php echo e(route('gym-admin.profile.index')); ?>">
                                            Update your first & last name


                                            <i class="fa fa-arrow-right"></i>
                                        </a>

                                    </div>

                                <?php elseif(trim($user->mobile) == ""): ?>
                                    <div class="col-md-12">
                                        <strong>Next Step:</strong>
                                        <a href="<?php echo e(route('gym-admin.profile.index')); ?>">
                                            Update your mobile number

                                            <i class="fa fa-arrow-right"></i>
                                        </a>

                                    </div>

                                <?php elseif(count($memberships) == 0): ?>
                                    <div class="col-md-12">
                                        <strong>Next Step:</strong>
                                        <a href="<?php echo e(URL::route('gym-admin.membership.create')); ?>">
                                            Add Membership

                                            <i class="fa fa-arrow-right"></i>
                                        </a>

                                    </div>

                                <?php elseif(count($clients) == 0): ?>
                                    <div class="col-md-12">
                                        <strong>Next Step:</strong>
                                        <a href="<?php echo e(route('gym-admin.client.create')); ?>">
                                            Add First Client

                                            <i class="fa fa-arrow-right"></i>
                                        </a>

                                    </div>



                                <?php elseif(count($subscriptions) == 0): ?>
                                    <div class="col-md-12">
                                        <strong>Next Step:</strong>
                                        <a href="<?php echo e(route('gym-admin.client-purchase.create')); ?>">
                                            Add Subscription

                                            <i class="fa fa-arrow-right"></i>
                                        </a>

                                    </div>

                                <?php elseif(count($payments) == 0): ?>
                                    <div class="col-md-12">
                                        <strong>Next Step:</strong>
                                        <a href="<?php echo e(route('gym-admin.membership-payment.create')); ?>">
                                            Add Payment

                                            <i class="fa fa-arrow-right"></i>
                                        </a>

                                    </div>

                                <?php endif; ?>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                </div>
                
            <?php endif; ?>

            <div class="row">
                <div class="col-md-7 col-xs-12">

                    <div class="portlet light portlet-fit">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-plus font-red"></i><span class="caption-subject font-red bold uppercase">Create Membership Plan</span></div>


                        </div>
                        <div class="portlet-body">
                            <!-- BEGIN FORM-->
                                <?php echo Form::open(['id'=>'form_sample_3','class'=>'ajax-form','method'=>'POST']); ?>

                                <div class="form-body">


                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <input type="text" class="form-control" name="title" id="title">
                                        <label for="title">Membership Name <span class="required" aria-required="true"> * </span></label>
                                    </div>

                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <div class="input-group left-addon right-addon">
                                            <span class="input-group-addon"><i class="fa <?php echo e($gymSettings->currency->symbol); ?>"></i></span>
                                            <input type="number" class="form-control" min="0" name="price" id="price">
                                            <span class="help-block" id="membership_error">Enter membership valid price.</span>
                                            <span class="input-group-addon">.00</span>
                                            <label for="price">Membership Price <span class="required" aria-required="true"> * </span></label>
                                        </div>
                                    </div>

                                    
                                        
                                            
                                            
                                                
                                                    
                                                    
                                                        
                                                        
                                                        
                                                
                                                
                                                    
                                                    
                                                        
                                                        
                                                        
                                                
                                            
                                        
                                        
                                    

                                    
                                        
                                            
                                            
                                            
                                        
                                    

                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <div class="input-group left-addon right-addon">
                                            <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                            <select class="form-control" name="duration" id="duration">
                                                <option value=""></option>
                                                <option value="7">1 Week</option>
                                                <option value="1">1 Month</option>
                                                <option value="3">3 Months</option>
                                                <option value="6">6 Months</option>
                                                <option value="12">12 Months</option>
                                            </select>
                                            <label for="duration">Select Membership Duration <span class="required" aria-required="true"> * </span></label>
                                        </div>

                                    </div>

                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <textarea class="form-control" name="details" rows="3"></textarea>
                                        <label for="form_control_1">Membership Details (optional)</label>
                                    </div>


                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn dark mt-ladda-btn ladda-button" data-style="zoom-in" id="save-form">
                                            <span class="ladda-label">
                                                <i class="fa fa-save"></i> SAVE</span>
                                                <span class="ladda-spinner"></span>
                                                <div class="ladda-progress" style="width: 0px;"></div>
                                            </button>
                                            <button type="reset" class="btn default">Reset</button>
                                        </div>
                                    </div>
                                </div>
                                <?php echo Form::close(); ?>

                            <!-- END FORM-->
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
                            url: '<?php echo e(route('gym-admin.membership.store')); ?>',
                            container:'#form_sample_3',
                            type: "POST",
                            formReset: true,
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