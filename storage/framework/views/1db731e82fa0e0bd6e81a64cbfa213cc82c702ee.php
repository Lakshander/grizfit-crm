 <?php $__env->startPush('mail-styles'); ?>
<style>
    .mail-credentials-hide {
        display: none;
    }
</style>

<?php $__env->stopPush(); ?> 
<?php $__env->startSection('settingBody'); ?>
<div class="portlet-body">
    <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-3">
            <ul class="nav nav-tabs tabs-left">
                <li>
                    <a href="<?php echo e(route('gym-admin.setting.index')); ?>"> General </a>
                </li>
                <li class="active">
                    <a href="javascript:;"> Mail </a>
                </li>
                <li>
                    <a href="<?php echo e(route('gym-admin.setting.fileUpload')); ?>"> File Upload </a>
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
                <?php echo Form::open(['route'=>'gym-admin.setting.storeMailCredentials','id'=>'mailCredentialForm','class'=>'ajax-form form-horizontal','method'=>'POST','files'
                => true]); ?>

                <div class="form-body col-md-6 col-md-offset-1">
                    <div class="form-group form-md-line-input">
                        <label class="control-label" for="form_control_1">Mail Driver</label>
                        <select class="form-control" name="mail_driver">
                                        <option <?php if($merchantSetting !='' && $merchantSetting->mail_driver == 'smtp'): ?> selected <?php endif; ?> value="smtp">SMTP</option>
                                        <option <?php if($merchantSetting !='' && $merchantSetting->mail_driver == 'mail'): ?> selected <?php endif; ?> value="mail">Mail</option>
                                    </select>
                        <div class="form-control-focus"> </div>
                    </div>
                    <div class="form-group form-md-line-input mail-credentials <?php if($merchantSetting !='' && $merchantSetting->mail_driver == 'mail'): ?> mail-credentials-hide <?php endif; ?>">
                        <label class="control-label" for="form_control_1">Mail Host</label>
                        <div class="input-icon right">
                            <input type="text" class="form-control" placeholder="Mail Host" id="mail_host" name="mail_host" value="<?php if($merchantSetting !=''): ?><?php echo e($merchantSetting->mail_host); ?><?php endif; ?>">
                            <div class="form-control-focus"> </div>
                            <span class="help-block">Enter Mail Host</span>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input mail-credentials <?php if($merchantSetting !='' && $merchantSetting->mail_driver == 'mail'): ?> mail-credentials-hide <?php endif; ?>">
                        <label class="control-label" for="form_control_1">Mail Port</label>
                        <div class="input-icon right">
                            <input type="text" class="form-control" placeholder="Mail Port" id="mail_port" name="mail_port" value="<?php if($merchantSetting !=''): ?><?php echo e($merchantSetting->mail_port); ?><?php endif; ?>">
                            <div class="form-control-focus"> </div>
                            <span class="help-block">Enter Mail Port</span>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input mail-credentials <?php if($merchantSetting !='' && $merchantSetting->mail_driver == 'mail'): ?> mail-credentials-hide <?php endif; ?>">
                        <label class="control-label" for="form_control_1">Mail Username</label>
                        <div class="input-icon right">
                            <input type="text" class="form-control" placeholder="Mail Username" id="mail_username" name="mail_username" value="<?php if($merchantSetting !=''): ?><?php echo e($merchantSetting->mail_username); ?><?php endif; ?>">
                            <div class="form-control-focus"> </div>
                            <span class="help-block">Enter Mail Username</span>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input mail-credentials <?php if($merchantSetting !='' && $merchantSetting->mail_driver == 'mail'): ?> mail-credentials-hide <?php endif; ?>">
                        <label class="control-label" for="form_control_1">Mail Password</label>
                        <div class="input-icon right">
                            <input type="text" class="form-control" placeholder="Mail Password" id="mail_password" name="mail_password" value="<?php if($merchantSetting !=''): ?><?php echo e($merchantSetting->mail_password); ?><?php endif; ?>">
                            <div class="form-control-focus"> </div>
                            <span class="help-block">Enter Mail Password</span>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input mail-credentials <?php if($merchantSetting !='' && $merchantSetting->mail_driver == 'mail'): ?> mail-credentials-hide <?php endif; ?>">
                        <label class="control-label" for="form_control_1">Mail Encryption</label>
                        <select class="form-control" name="mail_encryption">
                                        <option <?php if($merchantSetting !='' && $merchantSetting->mail_encryption == 'tls'): ?> selected <?php endif; ?> value="tls">TLS</option>
                                        <option <?php if($merchantSetting !='' && $merchantSetting->mail_encryption == 'ssl'): ?> selected <?php endif; ?> value="ssl">SSL</option>
                                    </select>
                        <div class="form-control-focus"> </div>
                    </div>
                    <div class="form-group form-md-line-input">
                        <label class="control-label" for="form_control_1">Mail From Name</label>
                        <div class="input-icon right">
                            <input type="text" class="form-control" placeholder="Mail From Name" id="mail_name" name="mail_name" value="<?php if($merchantSetting !=''): ?><?php echo e($merchantSetting->mail_name); ?><?php endif; ?>">
                            <div class="form-control-focus"> </div>
                            <span class="help-block">Enter name of company/person</span>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input">
                        <label class="control-label" for="form_control_1">Mail From Email</label>
                        <div class="input-icon right">
                            <input type="text" class="form-control" placeholder="Mail From Email" id="mail_email" name="mail_email" value="<?php if($merchantSetting !=''): ?><?php echo e($merchantSetting->mail_email); ?><?php endif; ?>">
                            <div class="form-control-focus"> </div>
                            <span class="help-block">Enter email of company/person</span>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <a href="javascript:;" class="btn green" id="mailSettingUpdate">Submit</a>
                            <a href="javascript:;" class="btn default">Cancel</a>
                        </div>
                    </div>
                </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?> <?php $__env->startPush('mail-scripts'); ?>
<script>
    $('#mailSettingUpdate').click(function() {
            $.easyAjax({
                url: '<?php echo e(route('gym-admin.setting.storeMailCredentials')); ?>',
                container: '#mailCredentialForm',
                type: "POST",
                data: $('#mailCredentialForm').serialize()
            });
        });

        $('select[name=mail_driver]').change(function () {
            var driver = $('select[name=mail_driver]').val();
            if(driver == 'mail') {
                $('.mail-credentials-hide').hide();
                $('.mail-credentials').hide();
            } else {
                $('.mail-credentials-hide').show();
                $('.mail-credentials').show();
            }
        });
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('gym-admin.setting.master-setting', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>