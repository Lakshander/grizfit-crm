<?php $__env->startSection('content'); ?>
    <div class="login-content">
        <div class="logo-padding-bottom">
            <?php if(is_null($gymSettings)): ?>
                <?php echo HTML::image(asset('/fitsigma/images/').'/'.'fitsigma-logo-full-red.png', 'Fitsigma',['class' => 'img-responsive inline-block', 'style' => 'height: 60px;']); ?>

            <?php else: ?>
                <?php if($gymSettings->image != ''): ?>
                    <?php if($gymSettings->local_storage == '0'): ?>
                        <?php echo HTML::image($gymSettingPath.$gymSettings->image, 'Fitsigma',array('class' => 'img-responsive inline-block', 'style' => 'height: 60px;')); ?>

                    <?php else: ?>
                        <?php echo HTML::image(asset('/uploads/gym_setting/master/').'/'.$gymSettings->image, 'Fitsigma',array('class' => 'img-responsive inline-block', 'style' => 'height: 60px;')); ?>

                    <?php endif; ?>
                <?php else: ?>
                    <?php echo HTML::image(asset('/fitsigma/images/').'/'.'fitsigma-logo-full-red.png', 'Fitsigma',['class' => 'img-responsive inline-block', 'style' => 'height: 60px;']); ?>

                <?php endif; ?>
            <?php endif; ?>
        </div>
        <h1>Merchant Login</h1>
        <?php echo Form::open(array('route' => ['merchant.login.store'], 'method' => 'POST', "id" => "login-form", "class" => 'login-form')); ?>

            <div class="alert alert-danger display-hide" id="error-msg">
                <button class="close" data-close="alert"></button>
                <span id="error-message">Enter any username and password. </span>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <input class="form-control form-control-solid placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="Username" name="username"/>
                </div>
                <div class="col-xs-6">
                    <input class="form-control form-control-solid placeholder-no-fix form-group" type="password" autocomplete="off" placeholder="Password" name="password"/>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <label class="rememberme mt-checkbox mt-checkbox-outline">
                        <input type="checkbox" name="remember" value="1" /> Remember me
                        <span></span>
                    </label>
                </div>
                <div class="col-sm-8 text-right">
                    <div class="forgot-password">
                        <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
                    </div>
                    <button class="btn blue" type="submit">Sign In</button>
                </div>
            </div>
        <?php echo Form::close(); ?>

        <!-- BEGIN FORGOT PASSWORD FORM -->
        <?php echo Form::open(array('route' => ['merchant.login.send-reset-link'], 'method' => 'POST', "id" => "reset-password-form", "class" => 'forget-form hide-forget-form')); ?>

            <h3>Forgot Password ?</h3>
            <p> Enter your e-mail address below to reset your password. </p>
            <div class="alert alert-danger display-hide-reset" id="error-reset-msg">
                <button class="close" data-close="alert"></button>
                <span id="error-reset-message">Enter any username and password. </span>
            </div>
            <div class="form-group">
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
            <div class="form-actions">
                <button type="button" id="back-btn" class="btn blue btn-outline">Back</button>
                <button type="submit" class="btn blue uppercase pull-right">Submit</button>
            </div>
        <?php echo Form::close(); ?>

        <!-- END FORGOT PASSWORD FORM -->
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.merchant.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>