<?php $__env->startSection('CSS'); ?>
    <?php echo HTML::style('admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css'); ?>

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
                <span>New Updates</span>
            </li>
        </ul>
        <!-- END PAGE BREADCRUMBS -->
        <!-- BEGIN PAGE CONTENT INNER -->



        <div class="page-content-inner">
            <div class="row">
                <div class=" col-md-12">
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="fa fa-magic font-red"></i>
                                <span class="caption-subject font-red bold uppercase"> New Updates</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="timeline">
                                <!-- TIMELINE ITEM -->
                                <?php if($UpcomingInfo ==''): ?>
                                    <?php else: ?>
                                <?php $__currentLoopData = $UpcomingInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="timeline-item">
                                    <div class="timeline-badge">
                                        <div class="timeline-icon bg-green sbold bg-font-green border-grey-steel">

                                            <?php echo e($info->date->format('d M')); ?>

                                        </div>
                                    </div>
                                    <div class="timeline-body">
                                        <div class="timeline-body-arrow"> </div>
                                        <div class="timeline-body-head">
                                            <div class="timeline-body-head-caption">
                                                <span class="timeline-body-alerttitle font-black-intense"><?php echo e(ucwords($info->title)); ?></span>
                                                <span class="timeline-body-time font-grey-cascade"><?php echo e($info->date->toFormattedDateString()); ?></span>
                                            </div>
                                        </div>
                                        <div class="timeline-body-content">
                                                            <span class="font-grey-cascade"> <?php echo $info->details; ?>

                                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- END TIMELINE ITEM -->
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT INNER -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <?php echo HTML::script('admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js'); ?>

    <script>

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.gym-merchant.gymbasic', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>