<?php $__env->startSection('CSS'); ?>
    <?php echo HTML::style('admin/global/plugins/ladda/ladda-themeless.min.css'); ?>

    <?php echo HTML::style('admin/global/plugins/bootstrap-select/css/bootstrap-select.min.css'); ?>


    <?php echo HTML::style('admin/pages/css/invoice.min.css'); ?>

    <?php echo HTML::style('admin/global/plugins/ladda/ladda-themeless.min.css'); ?>


    <style type="text/css" media="print">
        .no-print { display: none; }
        .only-print{ display: block;}
    </style>
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
                <a href="<?php echo e(route('gym-admin.gym-invoice.index')); ?>">Invoices</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Generate Invoice</span>
            </li>
        </ul>
        <!-- END PAGE BREADCRUMBS -->
        <!-- BEGIN PAGE CONTENT INNER -->
        <div class="page-content-inner">

            <div class="row">
                <div class="col-xs-12">

                    <div class="portlet light portlet-fit">
                        <div class="portlet-title no-print">
                            <div class="caption">
                                <i class="icon-doc font-red"></i><span class="caption-subject font-red bold uppercase">Generate Invoice</span></div>


                        </div>
                        <div class="portlet-body">
                            <div class="invoice">
                                <div class="row invoice-logo">
                                    <div class="col-xs-6 invoice-logo-space">
                                        <?php if(is_null($settings)): ?>
                                            <img src="<?php echo e($gymSettingPath.'fitsigma-logo-full.png'); ?>" class="img-responsive" alt="" />
                                        <?php elseif($settings->image == ''): ?>
                                            <img src="<?php echo e($gymSettingPath.'fitsigma-logo-full.png'); ?>" class="img-responsive" alt="" />
                                        <?php else: ?>
                                            <img src="<?php echo e($gymSettingPath.$settings->image); ?>" alt="" class="img-responsive" style="max-height: 40px" />
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-xs-6">
                                        <p>Invoice #<?php echo e($invoice->invoice_number); ?>

                                        </p>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row invoice-cust-add">
                                    <div class="col-xs-6 col-md-3">
                                        <h4 class="invoice-title uppercase">Customer</h4>
                                        <p class="invoice-desc">
                                            <?php echo e(ucwords($invoice->client_name)); ?>

                                        </p>
                                    </div>
                                    <div class="col-xs-6 col-md-3">
                                        <h4 class="invoice-title uppercase">Date</h4>
                                        <p class="invoice-desc"><?php echo e($invoice->invoice_date->format('M d, Y')); ?></p>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <h4 class="invoice-title uppercase">Address</h4>
                                        <p class="invoice-desc inv-address"><?php echo e(ucwords($invoice->client_address)); ?></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th> # </th>
                                                <th> Item </th>
                                                <th class="hidden-xs"> Quanity </th>
                                                <th class="hidden-xs"> Cost Per Item </th>
                                                <th> Total </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $invoice->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($item->item_type == 'item'): ?>
                                                    <tr>
                                                        <td> <?php echo e($key); ?> </td>
                                                        <td> <?php echo e(ucfirst($item->item_name)); ?> </td>
                                                        <td class="hidden-xs"> <?php echo e($item->quantity); ?> </td>
                                                        <td class="hidden-xs"> <?php echo e($gymSettings->currency->acronym); ?> <?php echo e($item->cost_per_item); ?> </td>
                                                        <td> <?php echo e($gymSettings->currency->acronym); ?> <?php echo e($item->amount); ?> </td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-4">
                                        <div class="well">
                                            <address>
                                                <strong><?php echo e(ucwords($merchantBusiness->business->title)); ?></strong>
                                                <?php if(!is_null($settings)): ?><br><?php echo e(ucfirst($settings->address)); ?><?php endif; ?>
                                                <?php if(!is_null($settings)): ?><br><abbr title="Phone">P:</abbr> <?php echo e($settings->mobile); ?> <?php endif; ?>
                                            </address>

                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-8 invoice-block">
                                        <ul class="list-unstyled amounts">
                                            <li>
                                                <strong>Sub - Total amount:</strong> <?php echo e($gymSettings->currency->acronym); ?> <?php echo e(round($invoice->sub_total, 2)); ?>

                                            </li>
                                            <?php $__currentLoopData = $invoice->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($item->item_type != 'item'): ?>
                                                    <li>
                                                        <strong><?php if($item->item_type == 'discount'): ?>Discount:<?php else: ?> <?php echo e(strtoupper($item->item_name)); ?>: <?php endif; ?></strong> <?php echo e($gymSettings->currency->acronym); ?> <?php echo e(round($item->amount, 2)); ?>

                                                    </li>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <li>
                                                <strong>Grand Total:</strong> <?php echo e($gymSettings->currency->acronym); ?> <?php echo e(round($invoice->total, 2)); ?>

                                            </li>
                                        </ul>
                                        <br/>
                                        <?php if($isDesktop): ?>
                                            <a href="<?php echo e(route('gym-admin.gym-invoice.download-invoice', $invoice->id)); ?>" class="btn btn-lg green hidden-print margin-bottom-5"> Download
                                                <i class="fa fa-download"></i>
                                            </a>
                                        <?php endif; ?>
                                        <a href="javascript:;"  data-toggle="modal" data-target="#email-invoice-modal" class="btn btn-lg red-flamingo hidden-print margin-bottom-5"> Email
                                            <i class="fa fa-send-o"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <em>Invoice generated by: <?php echo e(ucwords($invoice->generated_by)); ?></em>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- END PAGE CONTENT INNER -->
    </div>


    

    <div class="modal fade bs-modal-md in" id="email-invoice-modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" id="modal-data-application">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <span class="caption-subject font-red-sunglo bold uppercase" id="modelHeading"><i class="fa fa-send"></i> Email Invoice</span>
                </div>
                <div class="modal-body">

                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <div class="input-icon">
                                        <input type="text" class="form-control"  name="client_email" id="client_email" value="<?php echo e($invoice->email); ?>">
                                        <label for="form_control_1">Email</label>
                                        <span class="help-block">Enter client email</span>
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn blue mt-ladda-btn ladda-button" data-style="zoom-in" id="email-invoice">
                        <span class="ladda-label"><i class="fa fa-send"></i> Send Email</span>
                    </button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

    <?php echo HTML::script('admin/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js'); ?>

    <?php echo HTML::style('admin/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'); ?>

    <?php echo HTML::script('admin/global/plugins/ladda/spin.min.js'); ?>

    <?php echo HTML::script('admin/global/plugins/ladda/ladda.min.js'); ?>

    <?php echo HTML::script('admin/pages/scripts/ui-buttons.min.js'); ?>



    <script>

        $("input[name='payment_required']").change(function(){
            var type = $("input[name='payment_required']:checked").val();
            if(type == 'yes')
            {
                $('#next_payment_div').css('display','block');
            }else {
                $('#next_payment_div').css('display','none');
            }
        });

        $('#client').change(function () {
            var clientId = $(this).val();

            if(clientId == "")return false;

            var url = '<?php echo e(route('gym-admin.gympurchase.clientPurchases',[':id'])); ?>';
            url = url.replace(':id',clientId);

            $.easyAjax({
                url: url,
                type: 'GET',
                data: {clientID: clientId },
                success: function(response){
                    $('#payment_for_area').html(response.data);
                }
            })
        });
    </script>
    <script>
        $('#email-invoice').click(function(){

            $.easyAjax({
                url:'<?php echo e(route('gym-admin.gym-invoice.email-invoice')); ?>',
                type: "POST",
                data:{client_email: $('#client_email').val(),invoiceId: '<?php echo e($invoice->id); ?>','_token': '<?php echo e(csrf_token()); ?>'},
                success:function(response){
                    if(response.status != 'fail'){
                        $('#email-invoice-modal').modal('hide');
                    }
                }
            })
        });

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.gym-merchant.gymbasic', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>