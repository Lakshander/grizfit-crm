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
                    <li class="active">
                        <a href="javascript:;"> Others </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('gym-admin.setting.footer')); ?>"> Footer </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-9">
                <div class="tab-content">
                    <?php echo Form::open(['route'=>'gym-admin.setting.storeOtherSettingCredentials','id'=>'otherCredentialForm','class'=>'ajax-form form-horizontal','method'=>'POST','files' => true]); ?>

                        <div class="form-body col-md-6 col-md-offset-1">
                            <div class="form-group form-md-line-input">
                                <label class="control-label" for="form_control_1">Google Maps API Key</label>
                                <div class="input-icon right">
                                    <input type="text" class="form-control" placeholder="Maps API Key" id="maps_api_key" name="maps_api_key" value="<?php if($merchantSetting !=''): ?> <?php echo e($merchantSetting->maps_api_key); ?> <?php endif; ?>">
                                    <div class="form-control-focus"> </div>
                                    <span class="help-block">Enter Maps API Key</span>
                                </div>
                            </div>
                            <div class="form-group form-md-line-input">
                                <label class="control-label" for="form_control_1">Lock Screen Timeout (in sec)</label>
                                <div class="input-icon right">
                                    <input type="text" class="form-control" placeholder="Idle Time" id="idle_time" name="idle_time" value="<?php if($merchantSetting !=''): ?> <?php echo e($merchantSetting->idle_time); ?> <?php endif; ?>">
                                    <div class="form-control-focus"> </div>
                                    <span class="help-block">Enter idle time to lock account</span>
                                </div>
                            </div>
                            <div class="form-group form-md-line-input">
                                <label class="control-label" for="form_control_1">Currency</label>
                                <select class="form-control" name="currency_id">
                                    <option value="" selected disabled> Select Currency </option>
                                    <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php if($merchantSetting !='' && $merchantSetting->currency_id == $currency->id): ?> selected <?php endif; ?> value="<?php echo e($currency->id); ?>"><?php echo e($currency->acronym.' - '.$currency->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <div class="form-control-focus"> </div>
                            </div>
                            <div class="form-group form-md-line-input">
                                <label class="control-label" for="form_control_1">GSTIN</label>
                                <div class="input-icon right">
                                    <input type="text" class="form-control" placeholder="GSTIN" id="gstin" name="gstin" value="<?php if($merchantSetting !=''): ?><?php echo e($merchantSetting->gstin); ?><?php endif; ?>">
                                    <div class="form-control-focus"> </div>
                                    <span class="help-block">Enter GSTIN</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <a href="javascript:;" class="btn green" id="otherSettingUpdate">Submit</a>
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

<?php $__env->startPush('other-scripts'); ?>
    <script>
        $('#otherSettingUpdate').click(function() {
            $.easyAjax({
                url: '<?php echo e(route('gym-admin.setting.storeOtherSettingCredentials')); ?>',
                container: '#otherCredentialForm',
                type: "POST",
                data: $('#otherCredentialForm').serialize()
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('gym-admin.setting.master-setting', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>