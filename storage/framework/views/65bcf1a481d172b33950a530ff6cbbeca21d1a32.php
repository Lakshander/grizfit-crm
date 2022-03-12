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
            <?php if($user_id != 0): ?>
            <li>
                <a href="<?php echo e(route('gym-admin.client.index')); ?>">Clients</a>
                <i class="fa fa-circle"></i>
            </li>
            <?php else: ?>
                <li>
                    <a href="<?php echo e(route('gym-admin.client-purchase.index')); ?>">Subscription</a>
                    <i class="fa fa-circle"></i>
                </li>
            <?php endif; ?>
            <li>
                <span>Add</span>
            </li>
        </ul>
        <!-- END PAGE BREADCRUMBS -->
        <!-- BEGIN PAGE CONTENT INNER -->
        <div class="page-content-inner">

            <?php if($completedItems  < $completedItemsRequired): ?>
                

                <div class="row">

                    <div class="col-md-12">
                        <div class="portlet dark box">
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
                                <i class="icon-plus font-red"></i><span class="caption-subject font-red bold uppercase">Add New Subscription</span></div>


                        </div>
                        <div class="portlet-body">
                            <!-- BEGIN FORM-->
                            <?php echo Form::open(['id'=>'storePayments','class'=>'ajax-form','method'=>'POST']); ?>


                            <div class="form-body">
                                <div class="form-group form-md-line-input">
                                    <select  class="bs-select form-control" data-live-search="true" data-size="8" name="user_id" id="user_id">
                                            <option value="">Select Client</option>
                                        <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option
                                                    <?php if($user_id != 0): ?>
                                                        <?php if($user_id == $client->customer_id): ?>
                                                            selected
                                                        <?php endif; ?>
                                                    <?php endif; ?>

                                                    value="<?php echo e($client->customer_id); ?>"><?php echo e($client->first_name); ?>&nbsp;<?php echo e($client->last_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <label for="title">Client</label>
                                    <span class="help-block"></span>
                                </div>
                                
                                    
                                        
                                        
                                    
                                    
                                    
                                

                                <div class="form-group form-md-line-input" id="mem_select">
                                    <select  class="bs-select form-control" data-live-search="true" data-size="8" name="membership_id" id="membership_id">
                                        <option value="">Select Membership</option>
                                        <?php $__currentLoopData = $memberships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $membership): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <optgroup label="<?php echo e($key); ?>">
                                            <?php $__currentLoopData = $membership; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($mem->id); ?>"><?php echo e($mem->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </optgroup>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <label for="title">Membership</label>
                                    <span class="help-block"></span>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input form-md-floating-label">
                                            <div class="input-group left-addon right-addon">
                                                <span class="input-group-addon"><i class="fa <?php echo e($gymSettings->currency->symbol); ?>"></i></span>
                                                <input type="number" class="form-control" min="0" name="purchase_amount" id="purchase_amount">
                                                <span class="help-block">Membership Cost</span>
                                                <span class="input-group-addon">.00</span>
                                                <label for="purchase_amount">Cost</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input form-md-floating-label">
                                            <div class="input-group left-addon right-addon">
                                                <span class="input-group-addon"><i class="fa <?php echo e($gymSettings->currency->symbol); ?>"></i></span>
                                                <input type="number" class="form-control" min="0" name="amount_to_be_paid" id="amount_to_be_paid">
                                                <span class="help-block">Amount to be Paid</span>
                                                <span class="input-group-addon">.00</span>
                                                <label for="amount_to_be_paid">Amount</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input form-md-floating-label">
                                            <div class="input-group left-addon right-addon">
                                                <span class="input-group-addon"><i class="fa <?php echo e($gymSettings->currency->symbol); ?>"></i></span>
                                                <input type="number" class="form-control" min="0" name="discount" id="discount">
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
                                                <input type="text" readonly class="form-control date-picker" placeholder="Select Purchase Date" name="purchase_date" id="purchase_date" value="<?php echo e(\Carbon\Carbon::today()->format('m/d/Y')); ?>">
                                                <label for="form_control_1">Registration Date</label>
                                                <span class="help-block">Enter Registration Date</span>
                                                <i class="icon-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <div class="input-icon">
                                                <input type="text" readonly class="form-control date-picker" placeholder="Select Start Date" name="start_date" id="start_date">
                                                <label for="form_control_1">Customer is going to come from?</label>
                                                <span class="help-block">Date from when customer will be coming from.</span>
                                                <i class="icon-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-md-line-input ">
                                            <div class="input-icon">
                                                <input type="text" class="form-control" placeholder="Remarks" name="remark" id="remark">
                                                <label for="form_control_1">Remark</label>
                                                <span class="help-block">Add payment remark</span>
                                                <i class="fa fa-pencil"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>

                            <div class="form-actions" style="margin-top: 70px">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn dark mt-ladda-btn ladda-button" data-style="zoom-in" id="save-form">
                                            <span class="ladda-label"><i class="fa fa-save"></i> SAVE</span>
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
    <?php echo HTML::script('admin/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js'); ?>

    <?php echo HTML::style('admin/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'); ?>

    <?php echo HTML::script('admin/global/plugins/ladda/spin.min.js'); ?>

    <?php echo HTML::script('admin/global/plugins/ladda/ladda.min.js'); ?>

    <?php echo HTML::script('admin/pages/scripts/ui-buttons.min.js'); ?>

    <?php echo HTML::script('admin/global/plugins/bootstrap-select/js/bootstrap-select.min.js'); ?>

    <?php echo HTML::script('admin/pages/scripts/components-bootstrap-select.min.js'); ?>

    <script>

        $(document).ready(function() {

            $("#purchase_date").datepicker({
                rtl: App.isRTL(),
                orientation: "left",
                autoclose: true,
            }).on('changeDate', function (selected) {
                var minDate = new Date(selected.date.valueOf());
                $('#start_date').datepicker('setStartDate', minDate);
            });

            $("#start_date").datepicker({
                rtl: App.isRTL(),
                orientation: "left",
                autoclose: true,
            }).on('changeDate', function (selected) {
                var maxDate = new Date(selected.date.valueOf());
                $('#purchase_date').datepicker('setEndDate', maxDate);
            });

        });


    </script>
    <script>
        $('#save-form').click(function(){
            $.easyAjax({
                url:'<?php echo e(route('gym-admin.client-purchase.store')); ?>',
                container:'#storePayments',
                type: "POST",
                data:$('#storePayments').serialize(),
                formReset:true,
                success:function(responce){
                    if(responce.status == 'success'){
                        $('#user_id').val('');
                        $('#user_id').selectpicker('refresh');
                        $('#payment_for').val('');
                        $('#payment_for').selectpicker('refresh');
                        $('#membership_id').val('');
                        $('#membership_id').selectpicker('refresh');
                        $('#offer_id').val('');
                        $('#offer_id').selectpicker('refresh');
                    }
                }
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

        $('#amount_to_be_paid').keyup(function () {
            var cost = $('#purchase_amount').val();
            var discount = parseInt(cost)-parseInt($(this).val());
            $('#discount').val(discount);
        });

        $('#discount').keyup(function() {
            var cost =  $('#purchase_amount').val();
            var amount = cost - $(this).val();
            if(amount <= 0) {
                $('#amount_to_be_paid').val(0);
            } else {
                $('#amount_to_be_paid').val(amount);
            }
        });

    </script>
    <script>
        function getAmount(type,id) {
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
                    paid.val(res.amount);
                    paid.addClass('edited');
                    discount.val(res.discount);
                    discount.addClass('edited');
                }
            })
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.gym-merchant.gymbasic', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>