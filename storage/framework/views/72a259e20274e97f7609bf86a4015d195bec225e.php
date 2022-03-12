<div class="page-header-menu">
    <div class="container-fluid">

        <!-- BEGIN MEGA MENU -->
        <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
        <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
        <div class="hor-menu  ">
            <ul class="nav navbar-nav">
                <?php if($user->is_admin == 1): ?>
                    <li class="menu-dropdown classic-menu-dropdown <?php echo e(isset($superAdminMenu) ? $superAdminMenu : ''); ?>">
                        <a href="<?php echo e(route('gym-admin.superadmin.dashboard')); ?>"><i class="font-green fa fa-dashboard"></i> Super Admin
                        </a>
                    </li>
                <?php endif; ?>
                <?php if($user->can("view_dashboard")): ?>
                    <li class="menu-dropdown classic-menu-dropdown <?php echo e(isset($dashboardMenu) ? $dashboardMenu : ''); ?>">
                        <a href="<?php echo e(route('gym-admin.dashboard.index')); ?>"><i class="font-green fa fa-dashboard"></i> Dashboard
                        </a>
                    </li>
                <?php endif; ?>
                <?php if($user->can("view_customers") || $user->can("add_attendance") || $user->can("my_gym") || $user->can("view_enquiry")
                || $user->can("view_targets") || $user->can("view_subscriptions") || $user->can("view_membership") || $user->can("task")): ?>
                    <li class="menu-dropdown mega-menu-dropdown <?php echo e(isset($manageMenu) ? $manageMenu : ''); ?>">
                        <a href="javascript:;"><i class="font-green fa fa-gear"></i> Manage <i class="fa fa-angle-down hidden-xs hidden-sm"></i>
                            <span class="arrow"></span>
                        </a>
                        <ul class="dropdown-menu" style="min-width: 400px">
                            <li>
                                <div class="mega-menu-content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <ul class="mega-menu-submenu ">
                                                <?php if($user->can("view_customers")): ?>
                                                    <li class="<?php echo e(isset($customerMenu) ? $customerMenu : ''); ?>">
                                                        <a href="<?php echo e(route('gym-admin.client.index')); ?>" class="nav-link  ">
                                                            <i class="icon-users"></i>  Customers
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                                <?php if($user->can("add_attendance")): ?>
                                                    <li class="<?php echo e(isset($attendanceMenu) ? $attendanceMenu : ''); ?> ">
                                                        <a href="<?php echo e(route('gym-admin.attendance.create')); ?>" class="nav-link  ">
                                                            <i class="icon-plus"></i> Mark Attendance
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                                <?php if($user->can("my_gym")): ?>
                                                    <li class="<?php echo e(isset($gymMenu) ? $gymMenu : ''); ?> ">
                                                        <a href="<?php echo e(route('gym-admin.my-gym.index')); ?>" class="nav-link  ">
                                                            <i class="fa fa-heartbeat"></i> My Business
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                                <?php if($user->can("view_enquiry")): ?>
                                                    <li class="<?php echo e(isset($enuriryMenu) ? $enuriryMenu : ''); ?> ">
                                                        <a href="<?php echo e(route('gym-admin.enquiry.index')); ?>" class="nav-link">
                                                            <i class="font-green icon-earphones-alt"></i>  Enquiries
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                                <?php if($user->can("message")): ?>
                                                    <li class="<?php echo e(isset($messageMenu) ? $messageMenu : ''); ?> ">
                                                        <a href="<?php echo e(route('gym-admin.message.index')); ?>" class="nav-link">
                                                            <i class="fa fa-envelope"></i>  Message
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <ul class="mega-menu-submenu">
                                                <?php if($user->can("view_targets")): ?>
                                                    <li class="<?php echo e(isset($targetMenu) ? $targetMenu : ''); ?>">
                                                        <a href="<?php echo e(route('gym-admin.target.index')); ?>" class="nav-link  ">
                                                            <i class="fa fa-bullseye"></i>  Targets
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                                <?php if($user->can("view_subscriptions")): ?>
                                                    <li class="<?php echo e(isset($subscriptionMenu) ? $subscriptionMenu : ''); ?>">
                                                        <a href="<?php echo e(route('gym-admin.client-purchase.index')); ?>" class="nav-link  ">
                                                                <i class="fa <?php echo e($gymSettings->currency->symbol); ?>"></i>  Subscriptions
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                                <?php if($user->can("view_membership")): ?>
                                                    <li class="<?php echo e(isset($membershipMenu) ? $membershipMenu : ''); ?>">
                                                        <a href="<?php echo e(route('gym-admin.membership.index')); ?>" class="nav-link nav-toggle">
                                                            <i class="icon-badge"></i> Memberships
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                                <?php if($user->can("task")): ?>
                                                    <li class="<?php echo e(isset($taskMenu) ? $taskMenu : ''); ?>">
                                                        <a href="<?php echo e(route('gym-admin.task.index')); ?>" class="nav-link nav-toggle">
                                                            <i class="fa fa-tasks"></i> Tasks
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if($user->can("view_payments") || $user->can("view_due_payments") || $user->can("view_due_payments")
                || $user->can("view_invoice") || $user->can("expense")): ?>
                    <li class="menu-dropdown classic-menu-dropdown <?php echo e(isset($paymentMenu) ? $paymentMenu : ''); ?> ">
                        <a href="javascript:;" ><i class="font-green fa <?php echo e($gymSettings->currency->symbol); ?>"></i> Accounts  <i class="fa fa-angle-down hidden-xs hidden-sm"></i>
                            <span class="arrow"></span>
                        </a>
                        <ul class="dropdown-menu pull-left">
                            <li class="dropdown-submenu <?php echo e(isset($account) ? $account : ''); ?>">
                                <a href="<?php echo e(route('gym-admin.membership-payment.index')); ?>" class="nav-link  ">
                                    <i class="fa <?php echo e($gymSettings->currency->symbol); ?>"></i> Payments
                                </a>
                                <ul class="dropdown-menu">
                                    <?php if($user->can("view_payments")): ?>
                                        <li class="<?php echo e(isset($showpaymentMenu) ? $showpaymentMenu : ''); ?>">
                                            <a href="<?php echo e(route('gym-admin.membership-payment.index')); ?>" class="nav-link ">
                                                <i class="fa <?php echo e($gymSettings->currency->symbol); ?>"></i> Payments
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if($user->can("view_due_payments")): ?>
                                        <li class="<?php echo e(isset($paymentreminderMenu) ? $paymentreminderMenu : ''); ?>">
                                            <a href="<?php echo e(route('gym-admin.client-purchase.paymentreminder')); ?>" class="nav-link ">
                                                <i class="fa fa-bullhorn"></i> Due Payments
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if($user->can("view_due_payments")): ?>
                                        <li class="<?php echo e(isset($paymentreminderHistoryMenu) ? $paymentreminderHistoryMenu : ''); ?>">
                                            <a href="<?php echo e(route('gym-admin.client-purchase.reminder-history')); ?>" class="nav-link ">
                                                <i class="fa fa-list"></i> Payment Reminder History
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                            <?php if($user->can("view_invoice")): ?>
                                <li class="<?php echo e(isset($invoiceMenu) ? $invoiceMenu : ''); ?>">
                                    <a href="<?php echo e(route('gym-admin.gym-invoice.index')); ?>" class="nav-link  ">
                                        <i class="fa fa-file"></i> Invoice
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if($user->can("expense")): ?>
                                <li class="<?php echo e(isset($expenseMenu) ? $expenseMenu : ''); ?>">
                                    <a href="<?php echo e(route('gym-admin.expense.index')); ?>" class="nav-link">
                                        <i class="fa fa-money"></i> Expenses
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if($user->can("view_target_report") || $user->can("view_client_report") || $user->can("view_booking_report")
                || $user->can("view_finance_report") || $user->can("view_attendance_report") || $user->can("view_enquiry_report")
                || $user->can("balance_report")): ?>
                    <li class="menu-dropdown mega-menu-dropdown <?php echo e(isset($reportMenu) ? $reportMenu : ''); ?>  ">
                        <a href="javascript:;"><i class="font-green icon-notebook"></i> Reports <i class="fa fa-angle-down hidden-xs hidden-sm"></i>
                            <span class="arrow"></span>
                        </a>
                        <ul class="dropdown-menu pull-left">
                            <?php if($user->can("view_target_report")): ?>
                                <li class="<?php echo e(isset($targetreportMenu) ? $targetreportMenu : ''); ?>">
                                    <a href="<?php echo e(route('gym-admin.target-report.index')); ?>" class="nav-link  ">
                                        <i class="fa fa-bullseye"></i> Target Report
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if($user->can("view_client_report")): ?>
                                <li class="<?php echo e(isset($clientreportMenu) ? $clientreportMenu : ''); ?>">
                                    <a href="<?php echo e(route('gym-admin.client-report.index')); ?>" class="nav-link  ">
                                        <i class="icon-users"></i> Clients Report
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if($user->can("view_booking_report")): ?>
                                <li class="<?php echo e(isset($bookingreportMenu) ? $bookingreportMenu : ''); ?>">
                                    <a href="<?php echo e(route('gym-admin.booking-report.index')); ?>" class="nav-link  ">
                                        <i class="icon-notebook"></i> Subscription Report
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if($user->can("view_finance_report")): ?>
                                <li class="<?php echo e(isset($financialreportMenu) ? $financialreportMenu : ''); ?>">
                                    <a href="<?php echo e(route('gym-admin.finance-report.index')); ?>" class="nav-link  ">
                                        <i class="fa fa-money"></i> Financial Report
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if($user->can("view_attendance_report")): ?>
                                <li class="<?php echo e(isset($attendancereportMenu) ? $attendancereportMenu : ''); ?>">
                                    <a href="<?php echo e(route('gym-admin.attendance-report.index')); ?>" class="nav-link  ">
                                        <i class="fa fa-tasks"></i> Attendance Report
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if($user->can("view_enquiry_report")): ?>
                                <li class="<?php echo e(isset($enquiryreportMenu) ? $enquiryreportMenu : ''); ?>">
                                    <a href="<?php echo e(route('gym-admin.enquiry-report.index')); ?>" class="nav-link  ">
                                        <i class="fa fa-question-circle"></i> Enquiry Report
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if($user->can("balance_report")): ?>
                                <li class="<?php echo e(isset($balancereportMenu) ? $balancereportMenu : ''); ?>">
                                    <a href="<?php echo e(route('gym-admin.balance-report.index')); ?>" class="nav-link  ">
                                        <i class="fa fa-balance-scale"></i> Balance Report
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if($user->can("view_previous_promotions")): ?>
                    <li class="menu-dropdown classic-menu-dropdown  <?php echo e(isset($promotionMenu) ? $promotionMenu : ''); ?> ">
                        <a href="javascript:;"><i class="font-green icon-paper-plane"></i> Promotions <i class="fa fa-angle-down hidden-xs hidden-sm"></i>
                            <span class="arrow"></span>
                        </a>
                        <ul class="dropdown-menu pull-left">
                            
                                
                                    
                                
                            
                            
                                
                                    
                            
                            <?php if($user->can("view_previous_promotions")): ?>
                                <li class="<?php echo e(isset($promotionEmailMenu) ? $promotionEmailMenu : ''); ?>">
                                    <a href="<?php echo e(route('gym-admin.email-promotion.index')); ?>" class="nav-link ">
                                        <i class="icon-paper-plane"></i> Email Promotion </a>
                                </li>
                            <?php endif; ?>
                            <?php if($user->can("view_previous_promotions")): ?>
                                <li class="<?php echo e(isset($promotionDbMenu) ? $promotionDbMenu : ''); ?>">
                                    <a href="<?php echo e(route('gym-admin.promotion-db.index')); ?>" class="nav-link ">
                                        <i class="fa fa-database"></i> Promotional Database </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if($user->can("view_software_updates")): ?>
                    <li class="menu-dropdown mega-menu-dropdown <?php echo e(isset($updatesMenu) ? $updatesMenu : ''); ?>  ">
                        <a href="<?php echo e(route('gym-admin.upcoming.index')); ?>">
                            <?php if(!is_null($gymSwUpdates) &&  (\Carbon\Carbon::now('Asia/Calcutta')->diffInDays($gymSwUpdates->date, false) >= -3)): ?>
                                <i class="font-yellow-crusta fa fa-magic faa-tada animated"></i>
                            <?php else: ?>
                                <i class="font-green fa fa-magic"></i>
                            <?php endif; ?>
                            S/W Updates
                        </a>
                    </li>
                <?php endif; ?>
                <?php if($user->is_admin == 1): ?>
                        <li class="menu-dropdown mega-menu-dropdown <?php echo e(isset($indexSuperAdmin) ? $indexSuperAdmin : ''); ?>  ">
                            <a href="<?php echo e(route('gym-admin.superadmin.index')); ?>">
                                <i class="font-green fa fa-cogs"></i>
                                Manage Branches
                            </a>
                        </li>
                <?php endif; ?>
            </ul>
        </div>
        <!-- END MEGA MENU -->
    </div>
</div>