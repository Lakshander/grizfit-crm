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
                <span>Account Setup 4 of 5</span>
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
                                <span class="caption-subject font-red bold uppercase"> STEP 4 of 5</span>
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

                            <?php echo Form::open(['route'=>'gym-admin.profile.store','id'=>'storePayments','class'=>'ajax-form ','method'=>'POST','files' => true]); ?>

                            <?php if(!is_null($subscription) && isset($subscription->id)): ?>
                                <input type="hidden" name="subscription_id" value="<?php echo e($subscription->id); ?>">
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
                                    <li  >
                                        <a href="<?php echo e(route('gym-admin.account-setup.membership')); ?>"  class="step">
                                            <span class="number"> 2 </span>
                                                                    <span class="desc">
                                                                        <i class="fa fa-check"></i> Add Membership </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('gym-admin.account-setup.client')); ?>" class="step active">
                                            <span class="number"> 3 </span>
                                                                    <span class="desc">
                                                                        <i class="fa fa-check"></i> Add Customer </span>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a href="<?php echo e(route('gym-admin.account-setup.subscription')); ?>" class="step">
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
                                    <select  class="bs-select form-control" data-live-search="true" data-size="8" name="user_id" id="user_id">
                                        <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if(!is_null($subscription) && $subscription->client_id == $client->id): ?> selected <?php endif; ?> value="<?php echo e($client->id); ?>"><?php echo e($client->first_name); ?>&nbsp;<?php echo e($client->last_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <label for="title">Client Name</label>
                                    <span class="help-block"></span>
                                </div>

                                
                                    
                                        
                                        
                                    
                                    
                                    
                                

                                <div class="form-group form-md-line-input" id="mem_select" style="display: none">
                                    <select  class="bs-select form-control" data-live-search="true" data-size="8" name="membership_id" id="membership_id">
                                        <option value="">Select Membership</option>
                                        <?php $__currentLoopData = $memberships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $membership): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <optgroup label="<?php echo e($key); ?>">
                                                <?php $__currentLoopData = $membership; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php if(!is_null($subscription) && $subscription->membership_id == $mem->id): ?> selected <?php endif; ?> value="<?php echo e($mem->id); ?>"><?php echo e($mem->title); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </optgroup>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <label for="title">Membership</label>
                                    <span class="help-block"></span>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input ">
                                            <div class="input-group left-addon right-addon">
                                                <span class="input-group-addon"><i class="fa <?php echo e($gymSettings->currency->symbol); ?>"></i></span>
                                                <input type="number" class="form-control" name="purchase_amount" id="purchase_amount" <?php if(!is_null($subscription) && isset($subscription->purchase_amount)): ?> value="<?php echo e($subscription->purchase_amount); ?>" <?php endif; ?>>
                                                <span class="help-block">Membership Cost</span>
                                                <span class="input-group-addon">.00</span>
                                                <label for="purchase_amount">Cost <span class="required" aria-required="true"> * </span></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input">
                                            <div class="input-group left-addon right-addon">
                                                <span class="input-group-addon"><i class="fa <?php echo e($gymSettings->currency->symbol); ?>"></i></span>
                                                <input type="text" class="form-control" name="amount_to_be_paid" id="amount_to_be_paid" <?php if(!is_null($subscription) && isset($subscription->amount_to_be_paid)): ?> value="<?php echo e($subscription->amount_to_be_paid); ?>" <?php endif; ?>>
                                                <span class="help-block">Amount to be Paid</span>
                                                <span class="input-group-addon">.00</span>
                                                <label for="amount_to_be_paid">Amount <span class="required" aria-required="true"> * </span></label>
                                            </div>
                                            <i class="fa fa-info-circle font-blue" id="amount_to_be_paid_info"  data-container="body" data-toggle="popover" data-placement="top" data-content="Enter same as membership cost if no discount is given."></i>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input form-md-floating-label">
                                            <div class="input-group left-addon right-addon">
                                                <span class="input-group-addon"><i class="fa <?php echo e($gymSettings->currency->symbol); ?>"></i></span>
                                                <input type="text" class="form-control" name="discount" id="discount" <?php if(!is_null($subscription) && isset($subscription->discount)): ?> value="<?php echo e($subscription->discount); ?>" <?php endif; ?>>
                                                <span class="help-block">Discount Amount</span>
                                                <span class="input-group-addon">.00</span>
                                                <label for="discount">Discount</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input ">
                                            <div class="input-icon">
                                                <input type="text" value="<?php if(!is_null($subscription) && isset($subscription->purchase_date)): ?> <?php echo e($subscription->purchase_date->format('m/d/Y')); ?> <?php else: ?> <?php echo e(\Carbon\Carbon::today('Asia/Calcutta')->format('m/d/Y')); ?> <?php endif; ?>" class="form-control date-picker" placeholder="Select Purchase Date" name="purchase_date" readonly id="purchase_date">
                                                <label for="form_control_1">Purchase Date <span class="required" aria-required="true"> * </span></label>
                                                <span class="help-block">Purchase Date</span>
                                                <i class="icon-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <div class="input-icon">
                                                <input type="text" value="<?php if(!is_null($subscription) && isset($subscription->start_date)): ?> <?php echo e($subscription->start_date->format('m/d/Y')); ?> <?php else: ?> <?php echo e(\Carbon\Carbon::today('Asia/Calcutta')->format('m/d/Y')); ?> <?php endif; ?>" class="form-control date-picker" readonly  name="start_date" id="start_date">
                                                <label for="form_control_1">Joining Date <span class="required" aria-required="true"> * </span></label>
                                                <span class="help-block">Date when client is going to come.</span>
                                                <i class="icon-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-md-line-input ">
                                            <div class="input-icon">
                                                <input type="text" class="form-control" placeholder="Remarks" name="remark" id="remark" <?php if(!is_null($subscription) && isset($subscription->remark)): ?> value="<?php echo e($subscription->remark); ?>" <?php endif; ?>>
                                                <label for="form_control_1">Remark</label>
                                                <span class="help-block">Add payment remark</span>
                                                <i class="fa fa-pencil"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <a href="javascript:;" class="btn green" id="save-form">Submit</a>
                                        <a href="javascript:;" class="btn default">Cancel</a>
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
    <?php echo HTML::script('admin/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js'); ?>

    <?php echo HTML::style('admin/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'); ?>

    <?php echo HTML::script('admin/global/plugins/ladda/spin.min.js'); ?>

    <?php echo HTML::script('admin/global/plugins/ladda/ladda.min.js'); ?>

    <?php echo HTML::script('admin/pages/scripts/ui-buttons.min.js'); ?>

    <?php echo HTML::script('admin/global/plugins/bootstrap-select/js/bootstrap-select.min.js'); ?>

    <?php echo HTML::script('admin/pages/scripts/components-bootstrap-select.min.js'); ?>

    <script>

        $('#amount_to_be_paid_info').click(function () {
            $(this).popover('toggle');
        });


        $('.date-picker').datepicker({
            rtl: App.isRTL(),
            orientation: "left",
            autoclose: true
        });


        $(function () {
            $('#mem_select').css('display','block');
        });


    </script>
    <script>
        $('#save-form').click(function(){
            $.easyAjax({
                url:'<?php echo e(route('gym-admin.account-setup.subscriptionStore')); ?>',
                container:'#storePayments',
                type: "POST",
                data:$('#storePayments').serialize(),
                redirect: true
            })
        });

    </script>
    <script>
        $('#membership_id').on('change', function () {
            var membership = $( "#membership_id option:selected" ).val();
            var type = 'membership';
            getAmount(type,membership);
        });
        $('#offer_id').on('change', function () {
            var offer = $( "#offer_id option:selected" ).val();
            var type = 'offer';
            getAmount(type,offer);
        });

        $('#discount').keyup(function () {
            var cost = $('#purchase_amount').val();
            var discount = cost - $(this).val();
            if(discount >= 0) {
                $('#amount_to_be_paid').val(discount);
            } else {
                $('#amount_to_be_paid').val(0);
            }

        });
    </script>
    <script>
        function getAmount(type,id) {

            if(id == "") {
                return false;
            }

            $.easyAjax({
                type:'POST',
                url:'<?php echo e(route('gym-admin.client-purchase.get-amount')); ?>',
                container:"#storePayments",
                data:{'type':type,'id':id,'_token':'<?php echo e(csrf_token()); ?>'},
                success:function (res) {
                    var purchase = $('#purchase_amount');
                    var paid = $('#amount_to_be_paid');
                    var discount =$('#discount');
                    purchase.val(res.amount);
                    purchase.addClass('edited');
                    paid.val(res.paid);
                    paid.addClass('edited');
                    discount.val(res.discount);
                    discount.addClass('edited');
                }
            })
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.gym-merchant.gymbasic', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>