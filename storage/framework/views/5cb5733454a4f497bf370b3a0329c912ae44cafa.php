<?php $__env->startSection('content'); ?>

    <div class="page-lock">
        <div class="page-logo">
            <?php if(is_null($gymSettings)): ?>
                <?php echo HTML::image(asset('/fitsigma/images/').'/'.'fitsigma-logo-full-red.png', 'Fitsigma',['class' => 'img-responsive']); ?>

            <?php else: ?>
                <?php if($gymSettings->image != ''): ?>
                    <?php if($gymSettings->local_storage == '0'): ?>
                        <?php echo HTML::image($gymSettingPath.$gymSettings->image, 'Fitsigma',array('class' => 'img-responsive')); ?>

                    <?php else: ?>
                        <?php echo HTML::image(asset('/uploads/gym_setting/master/').'/'.$gymSettings->image, 'Fitsigma',array('class' => 'img-responsive')); ?>

                    <?php endif; ?>
                <?php else: ?>
                    <?php echo HTML::image(asset('/fitsigma/images/').'/'.'fitsigma-logo-full-red.png', 'Fitsigma',['class' => 'img-responsive']); ?>

                <?php endif; ?>
            <?php endif; ?>
        </div>
        <div class="page-body">
            <?php if($userValue->image == ''): ?>
                <img class="page-lock-img" src="<?php echo e(asset('/fitsigma/images/').'/'.'user.svg'); ?>" alt="">
            <?php elseif($gymSettings->local_storage == '0'): ?>
                <img class="page-lock-img" src="<?php echo e($profileHeaderPath.$userValue->image); ?>" alt="">
            <?php else: ?>
                <img class="page-lock-img" src="<?php echo e(asset('/uploads/profile_pic/master/').'/'.$userValue->image); ?>" alt="">
            <?php endif; ?>
            <div class="page-lock-info">
                <h1><?php echo e($userValue->first_name); ?></h1>
                <span class="email"> <?php echo e($userValue->email); ?> </span>
                <span class="locked"> Locked </span>
                <?php echo Form::open(array('route' => ['merchant.lockLogin'], 'method' => 'POST', "id" => "login-form", "class" => 'form-inline')); ?>

                    <div id="error-message"></div>
                    <div class="input-group input-medium">
                        <input type="password" class="form-control" placeholder="Password" name="password" value="123456">
                        <span class="input-group-btn">
                                <button type="submit" class="btn green icn-only">
                                    <i class="fa fa-arrow-circle-o-right size-icon"></i>
                                </button>
                            </span>
                    </div>
                    <!-- /input-group -->
                    <div class="relogin">
                        <a href="<?php echo e(route('merchant.logout')); ?>"> Not <?php echo e($userValue->first_name); ?> ? </a>
                    </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
        <div class="page-footer-custom"> <?php echo e(\Carbon\Carbon::now('Asia/Calcutta')->year); ?> &copy; Fitsigma </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.merchant.locked', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>