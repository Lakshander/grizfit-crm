<?php $__env->startSection('settingBody'); ?>
    <div class="portlet-body">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-3">
                <ul class="nav nav-tabs tabs-left">
                    <li>
                        <a href="<?php echo e(route('gym-admin.setting.index')); ?>"> General </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('gym-admin.setting.mail')); ?>"> Mail </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('gym-admin.setting.fileUpload')); ?>"> File Upload </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('gym-admin.setting.others')); ?>"> Others </a>
                    </li>
                    <li class="active">
                        <a href="javascript:;"> Footer </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-9">
                <div class="tab-content">
                    <?php echo Form::open(['route'=>'gym-admin.setting.storeMailCredentials','id'=>'footerCredentialForm','class'=>'ajax-form form-horizontal','method'=>'POST','files' => true]); ?>

                    <div class="form-body col-md-6 col-md-offset-1">
                        <div class="form-group form-md-line-input">
                            <label class="control-label" for="form_control_1">About</label>
                            <div class="input-icon right">
                                <textarea class="form-control" name="about" id="about"><?php if($merchantSetting != ''): ?><?php echo e($merchantSetting->about); ?><?php endif; ?></textarea>
                                <div class="form-control-focus"> </div>
                                <span class="help-block">Enter about in footer section.</span>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="control-label" for="form_control_1">Facebook URL</label>
                            <div class="input-icon right">
                                <input type="text" class="form-control" placeholder="Facebook URL" id="fb_url" name="fb_url" value="<?php if($merchantSetting !=''): ?> <?php echo e($merchantSetting->fb_url); ?> <?php endif; ?>">
                                <div class="form-control-focus"> </div>
                                <span class="help-block">Enter Facebook URL</span>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="control-label" for="form_control_1">Google Plus URL</label>
                            <div class="input-icon right">
                                <input type="text" class="form-control" placeholder="Google Plus URL" id="google_url" name="google_url" value="<?php if($merchantSetting !=''): ?> <?php echo e($merchantSetting->google_url); ?> <?php endif; ?>">
                                <div class="form-control-focus"> </div>
                                <span class="help-block">Enter Google Plus URL</span>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="control-label" for="form_control_1">Twitter URL</label>
                            <div class="input-icon right">
                                <input type="text" class="form-control" placeholder="Twitter URL" id="twitter_url" name="twitter_url" value="<?php if($merchantSetting !=''): ?> <?php echo e($merchantSetting->twitter_url); ?> <?php endif; ?>">
                                <div class="form-control-focus"> </div>
                                <span class="help-block">Enter Twitter URL</span>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="control-label" for="form_control_1">Youtube URL</label>
                            <div class="input-icon right">
                                <input type="text" class="form-control" placeholder="Youtube URL" id="youtube_url" name="youtube_url" value="<?php if($merchantSetting !=''): ?> <?php echo e($merchantSetting->youtube_url); ?> <?php endif; ?>">
                                <div class="form-control-focus"> </div>
                                <span class="help-block">Enter Youtube URL</span>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="control-label" for="form_control_1">Contact Mail</label>
                            <div class="input-icon right">
                                <input type="text" class="form-control" placeholder="Contact Mail" id="contact_mail" name="contact_mail" value="<?php if($merchantSetting !=''): ?> <?php echo e($merchantSetting->contact_mail); ?> <?php endif; ?>">
                                <div class="form-control-focus"> </div>
                                <span class="help-block">Enter Contact Mail</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <a href="javascript:;" class="btn green" id="footerSettingUpdate">Submit</a>
                                <a href="javascript:;" class="btn default">Cancel</a>
                            </div>
                        </div>
                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-scripts'); ?>
    <script>
        $('#footerSettingUpdate').click(function() {
            $.easyAjax({
                url: '<?php echo e(route('gym-admin.setting.storeFooterSettingCredentials')); ?>',
                container: '#footerCredentialForm',
                type: "POST",
                data: $('#footerCredentialForm').serialize()
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('gym-admin.setting.master-setting', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>