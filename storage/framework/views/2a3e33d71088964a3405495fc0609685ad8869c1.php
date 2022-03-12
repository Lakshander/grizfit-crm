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
                    <li class="active">
                        <a href="javascript:;"> File Upload </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('gym-admin.setting.others')); ?>"> Others </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('gym-admin.setting.footer')); ?>"> Footer </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-9">
                <div class="tab-content">
                    <?php echo Form::open(['route'=>'gym-admin.setting.storeFileUploadCredentials','id'=>'fileUploadCredentialForm','class'=>'ajax-form form-horizontal','method'=>'POST','files' => true]); ?>

                        <div class="col-md-11 col-md-offset-1">
                            <div class="form-group form-md-radios">
                                <label>Storage Type</label>
                                <div class="md-radio-inline">
                                    <div class="md-radio">
                                        <input type="radio" id="local" name="storage" class="md-radiobtn" value="1" checked>
                                        <label for="local">
                                            <span class="inc"></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Local Storage (Default) </label>
                                    </div>
                                    <div class="md-radio">
                                        <input type="radio" id="aws" name="storage" value="0" class="md-radiobtn" <?php if(!is_null($gymSettings->file_storage) && $gymSettings->file_storage != ''): ?> checked <?php endif; ?>>
                                        <label for="aws">
                                            <span class="inc"></span>
                                            <span class="check"></span>
                                            <span class="box"></span> AWS Storage (Amazon Web Services) </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-body col-md-6 col-md-offset-1 aws-form">
                            <div class="form-group form-md-line-input">
                                <label class="control-label" for="form_control_1">AWS Key</label>
                                <div class="input-icon right">
                                    <input type="text" class="form-control" placeholder="AWS Key" id="aws_key" name="aws_key" value="<?php if($merchantSetting !=''): ?> <?php echo e($merchantSetting->aws_key); ?> <?php endif; ?>">
                                    <div class="form-control-focus"> </div>
                                    <span class="help-block">Enter AWS Key</span>
                                </div>
                            </div>
                            <div class="form-group form-md-line-input">
                                <label class="control-label" for="form_control_1">AWS Secret</label>
                                <div class="input-icon right">
                                    <input type="text" class="form-control" placeholder="AWS Secret" id="aws_secret" name="aws_secret" value="<?php if($merchantSetting !=''): ?> <?php echo e($merchantSetting->aws_secret); ?> <?php endif; ?>">
                                    <div class="form-control-focus"> </div>
                                    <span class="help-block">Enter AWS Secret</span>
                                </div>
                            </div>
                            <div class="form-group form-md-line-input">
                                <label class="control-label" for="form_control_1">AWS Region</label>
                                <div class="input-icon right">
                                    <input type="text" class="form-control" placeholder="AWS Region" id="aws_region" name="aws_region" value="<?php if($merchantSetting !=''): ?> <?php echo e($merchantSetting->aws_region); ?> <?php endif; ?>">
                                    <div class="form-control-focus"> </div>
                                    <span class="help-block">Enter AWS Region</span>
                                </div>
                            </div>
                            <div class="form-group form-md-line-input">
                                <label class="control-label" for="form_control_1">AWS Bucket</label>
                                <div class="input-icon right">
                                    <input type="text" class="form-control" placeholder="AWS Bucket" id="aws_bucket" name="aws_bucket" value="<?php if($merchantSetting !=''): ?> <?php echo e($merchantSetting->aws_bucket); ?> <?php endif; ?>">
                                    <div class="form-control-focus"> </div>
                                    <span class="help-block">Enter AWS Bucket</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions aws-form">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <a href="javascript:;" class="btn green" id="fileUploadCredentialSettingUpdate">Submit</a>
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

<?php $__env->startPush('file-upload-scripts'); ?>
    <script>
        $('#fileUploadCredentialSettingUpdate').click(function() {
            $.easyAjax({
                url: '<?php echo e(route('gym-admin.setting.storeFileUploadCredentials')); ?>',
                container: '#fileUploadCredentialForm',
                type: "POST",
                data: $('#fileUploadCredentialForm').serialize()
            });
        });

        $(function () {
            var type = $("input[name='storage']:checked").val();
            if (type == '0') {
                $('.aws-form').css('display', 'block');
            } else {
                $('.aws-form').css('display', 'none');
            }
        });

        $("input[name='storage']").change(function () {
            var type = $("input[name='storage']:checked").val();
            if (type == '0') {
                $('.aws-form').css('display', 'block');
            } else {
                $('.aws-form').css('display', 'none');
                $.easyAjax({
                    url: '<?php echo e(route('gym-admin.setting.storeFileUploadCredentials')); ?>',
                    container: '#fileUploadCredentialForm',
                    type: "POST",
                    data: $('#fileUploadCredentialForm').serialize()
                });
            }
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('gym-admin.setting.master-setting', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>