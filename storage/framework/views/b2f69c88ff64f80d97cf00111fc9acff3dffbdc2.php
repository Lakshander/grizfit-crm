

<?php $__env->startSection('CSS'); ?>
    <?php echo HTML::style('admin/global/plugins/morris/morris.css'); ?>

    <style>
        .dashboard-filter {
            padding-right: 15px;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">

        <!-- BEGIN PAGE BREADCRUMBS -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Super Admin</span>
                </li>
            </ul>
            <!-- END PAGE BREADCRUMBS -->
            <?php if($user->can('view_dashboard')): ?>
            <!-- BEGIN PAGE CONTENT INNER -->
                <div class="page-content-inner">
                    <div class="row widget-row">
                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                <h4 class="widget-thumb-heading">Total Earnings</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-red fa <?php echo e($gymSettings->currency->symbol); ?>"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle"><?php echo e($gymSettings->currency->acronym); ?></span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo e($totalEarnings); ?>">0</span>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                <h4 class="widget-thumb-heading">Monthly Income</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-purple fa <?php echo e($gymSettings->currency->symbol); ?>"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle"><?php echo e($gymSettings->currency->acronym); ?></span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo e($currentMonthEarnings); ?>">0</span>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                <h4 class="widget-thumb-heading">Total Due Payment</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-green fa <?php echo e($gymSettings->currency->symbol); ?>"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle"><?php echo e($gymSettings->currency->acronym); ?></span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo e($duePayments); ?>">0</span>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                <h4 class="widget-thumb-heading">Monthly Expense</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-blue fa <?php echo e($gymSettings->currency->symbol); ?>"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle"><?php echo e($gymSettings->currency->acronym); ?></span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo e($currentMonthExpense); ?>">0</span>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="dashboard-stat red-intense">
                                <div class="visual">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="details">
                                    <div class="number" data-counter="counterup" data-value="<?php echo e($branchCount); ?>"> 0 </div>
                                    <div class="desc"> Total Branch </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>

                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="dashboard-stat purple-soft">
                                <div class="visual">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="details">
                                    <div class="number" data-counter="counterup" data-value="<?php echo e($customerCount); ?>"> 0</div>
                                    <div class="desc"> Total Customer </div>
                                </div>

                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>

                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="dashboard-stat grey-mint">
                                <div class="visual">
                                    <i class="icon-earphones-alt"></i>
                                </div>
                                <div class="details">
                                    <div class="number" data-counter="counterup" data-value="<?php echo e($currentMonthEnquiries); ?>"> 0 </div>
                                    <div class="desc"> Monthly Enquiries </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>

                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="dashboard-stat green-soft">
                                <div class="visual">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="details">
                                    <div class="number" data-counter="counterup" data-value="<?php echo e($unpaidMembers); ?>"> 0 </div>
                                    <div class="desc"> Unpaid Members </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="caption ">
                                        <i class="fa fa-bar-chart font-dark"></i>
                                        <span class="caption-subject font-dark bold uppercase">Earning v/s Expense</span>
                                        <span class="caption-helper"></span>
                                        <div class="form-inline margin-top-10">
                                        <span class="dashboard-filter form-group">
                                            <select id="monthEarning" class="form-control">
                                                <option value="" disabled selected>Month</option>
                                                <?php $__currentLoopData = $monthName; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($value); ?>"><?php echo e($month); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </span>
                                            <span class="dashboard-filter form-group">
                                            <select id="yearEarning" class="form-control">
                                                <option value="" disabled selected>Year</option>
                                                <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($year); ?>"><?php echo e($year); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </span>
                                            <span class="dashboard-filter form-group">
                                            <select id="branchEarning" class="form-control">
                                                <option value="" disabled selected>Branch</option>
                                                <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($branch->id); ?>"><?php echo e($branch->title); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </span>
                                            <span class="dashboard-filter">
                                            <button type="button" class="earningExpense btn btn-primary">Submit</button>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="earningExpenseChart" class="CSSAnimationChart"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-bar-chart font-dark"></i>
                                        <span class="caption-subject font-dark bold uppercase">Client Registrations</span>
                                        <span class="caption-helper"></span>
                                        <div class="form-inline margin-top-10">
                                        <span class="dashboard-filter form-group">
                                            <select id="monthClient" class="form-control">
                                                <option value="" disabled selected>Month</option>
                                                <?php $__currentLoopData = $monthName; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($value); ?>"><?php echo e($month); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </span>
                                            <span class="dashboard-filter form-group">
                                            <select id="yearClient" class="form-control">
                                                <option value="" disabled selected>Year</option>
                                                <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($year); ?>"><?php echo e($year); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </span>
                                            <span class="dashboard-filter form-group">
                                            <select id="branchClient" class="form-control">
                                                <option value="" disabled selected>Branch</option>
                                                <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($branch->id); ?>"><?php echo e($branch->title); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </span>
                                            <span class="dashboard-filter">
                                            <button type="button" class="customerRegister btn btn-primary">Submit</button>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="customerRegistrationChart" class="CSSAnimationChart"></div>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-users font-dark"></i>
                                        <span class="caption-subject font-dark bold uppercase">Recent Customers</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-bordered table-striped table-condensed flip-content">
                                        <thead class="flip-content">
                                        <tr class="uppercase">
                                            <th> Name </th>
                                            <th> Email </th>
                                            <th> Branch Name </th>
                                            <th> Gender </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $recentCustomers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recentCustomer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td>
                                                    <?php echo e(ucwords($recentCustomer->first_name.' '.$recentCustomer->last_name)); ?> </td>
                                                <td>
                                                    <?php echo e($recentCustomer->email); ?>

                                                </td>
                                                <td>
                                                    <?php echo e($recentCustomer->title); ?> </td>
                                                <td>
                                                    <?php if($recentCustomer->gender == 'male'): ?>
                                                        <i class="fa fa-male"></i>
                                                        <?php echo e(ucwords($recentCustomer->gender)); ?>

                                                    <?php elseif($recentCustomer->gender == 'female'): ?>
                                                        <i class="fa fa-female"></i>
                                                        <?php echo e(ucwords($recentCustomer->gender)); ?>

                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr>
                                                <td colspan="5">No recent customer.</td>
                                            </tr>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <!-- BEGIN PORTLET-->
                            <div class="portlet light ">
                                <div class="portlet-title tabbable-line">
                                    <div class="caption">
                                        <i class="fa fa-money font-dark"></i>
                                        <span class="caption-subject font-dark bold uppercase">Recent Payments</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-bordered table-striped table-condensed flip-content">
                                        <thead class="flip-content">
                                        <tr class="uppercase">
                                            <th> Name </th>
                                            <th> Branch Name </th>
                                            <th> Payment Amount </th>
                                            <th> Payment Date </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $recentPayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recentPayment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td>
                                                    <?php echo e(ucwords($recentPayment->client->first_name.' '.$recentPayment->client->last_name)); ?> </td>
                                                <td>
                                                    <?php echo e($recentPayment->businessBranches->title); ?>

                                                </td>
                                                <td>
                                                    <?php echo e($recentPayment->payment_amount); ?> </td>
                                                <td>
                                                    <?php echo e($recentPayment->payment_date->toFormattedDateString()); ?>

                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr>
                                                <td colspan="5">No recent payment.</td>
                                            </tr>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END PORTLET-->
                        </div>


                    </div>



                </div>
                <!-- END PAGE CONTENT INNER -->
            <?php endif; ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <?php echo HTML::script('admin/global/plugins/counterup/jquery.counterup.js'); ?>

    <?php echo HTML::script('admin/global/plugins/counterup/jquery.waypoints.min.js'); ?>

    <?php echo HTML::script('admin/global/plugins/morris/morris.min.js'); ?>

    <?php echo HTML::script('admin/global/plugins/morris/raphael-min.js'); ?>

    <?php echo HTML::script('admin/pages/scripts/dashboard.js'); ?>

    <script>
        var earningExpenseChart, customerRegistrationChart;
        $(function() {
            earningExpenseChart = Morris.Bar({
                element: 'earningExpenseChart',
                data: <?php echo $earningExpenseChart; ?>,
                xkey: 'month',
                ykeys: ['income', 'expense'],
                labels: ['Income', 'Expense']
            });

            customerRegistrationChart = Morris.Bar({
                element: 'customerRegistrationChart',
                data: <?php echo $clientRegisterChart; ?>,
                xkey: 'month',
                ykeys: ['client'],
                labels: ['Customer']
            });
        });

        $('.earningExpense').on('click', function () {
            var month = $('#monthEarning').val();
            var year = $('#yearEarning').val();
            var branch = $('#branchEarning').val();
            $.easyAjax({
                type: "GET",
                url: "<?php echo e(route('gym-admin.superadmin.getEarningChartData')); ?>",
                data: {
                    month: month,
                    year: year,
                    branch: branch
                },
                success: function (response) {
                    earningExpenseChart.setData(JSON.parse(response.information));
                }
            });
        });

        $('.customerRegister').on('click', function () {
            var month = $('#monthClient').val();
            var year = $('#yearClient').val();
            var branch = $('#branchClient').val();
            $.easyAjax({
                type: "GET",
                url: "<?php echo e(route('gym-admin.superadmin.getClientChartData')); ?>",
                data: {
                    month: month,
                    year: year,
                    branch: branch
                },
                success: function (response) {
                    customerRegistrationChart.setData(JSON.parse(response.information));
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.gym-merchant.gymbasic', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>