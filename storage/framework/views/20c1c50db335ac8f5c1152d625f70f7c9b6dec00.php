<?php $__env->startSection('CSS'); ?>
    <?php echo HTML::style('admin/global/plugins/bootstrap-select/css/bootstrap-select.min.css'); ?>

    <?php echo HTML::style('admin/global/plugins/dropzone/dropzone.min.css'); ?>

    <?php echo HTML::style('admin/global/plugins/dropzone/basic.min.css'); ?>

    <?php echo HTML::style('admin/global/plugins/bootstrap-datepicker/css/datepicker.css'); ?>

    <?php echo HTML::style('admin/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css'); ?>

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
                <span>My Gym</span>
            </li>
        </ul>
        <!-- END PAGE BREADCRUMBS -->
        <!-- BEGIN PAGE CONTENT INNER -->
        <div class="page-content-inner">

            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-bubble font-green-sharp"></i>
                                <span class="caption-subject font-green-sharp bold uppercase">My Gym</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <ul class="nav nav-pills">
                                <?php if($common_details->huntplex_listing == 'yes'): ?>
                                    <li class="active">
                                        <a href="#tab_2_1" data-toggle="tab"> Details </a>
                                    </li>


                                    <li>
                                        <a href="#tab_2_2" data-toggle="tab"> Services </a>
                                    </li>
                                    <li>
                                        <a href="#tab_2_3" data-toggle="tab"> Images </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="tab_2_1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="portlet light ">
                                                <div class="portlet-title">
                                                    <div class="caption font-dark">
                                                        <i class="icon-badge font-red"></i>
                                                        <span class="caption-subject font-red bold uppercase"> Details</span>
                                                    </div>
                                                </div>
                                                <div class="portlet-body">
                                                    <div class="row">
                                                        <?php echo Form::open(['id'=>'myGymDetails','method'=>'post','class' => 'ajax_form']); ?>

                                                        <div class="col-md-6">
                                                            <div class="form-body">
                                                                <div class="form-group form-md-line-input">
                                                                    <input type="text" class="form-control" id="title" name="title" value="<?php echo e($common_details->title); ?>" >
                                                                    <label for="form_control_1">Gym Title</label>
                                                                    <span class="help-block">Please enter gym title.</span>
                                                                </div>

                                                                <?php if(!is_null($common_details->city_id)): ?>
                                                                    <div class="form-group form-md-line-input ">
                                                                        <label for="form_control_1">City - </label>
                                                                        <?php echo e(ucfirst($common_details->city->name)); ?>

                                                                    </div>
                                                                <?php endif; ?>

                                                                <?php if(!is_null($common_details->area_id)): ?>
                                                                <div class="form-group form-md-line-input ">
                                                                    <select  class="bs-select form-control" data-live-search="true" data-size="8" name="area" id="area">
                                                                        <?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($area->id); ?>" <?php if($area->id == $common_details->area_id): ?> selected <?php endif; ?>><?php echo e(ucfirst($area->name)); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                    <label for="title">Area</label>
                                                                    <span class="help-block"></span>
                                                                </div>
                                                                <?php endif; ?>

                                                                <div class="form-group form-md-line-input ">
                                                                    <input type="text" class="form-control" id="email" name="email" value="<?php echo e($common_details->email); ?>"  >
                                                                    <label for="form_control_1">Email</label>
                                                                    <span class="help-block">Please enter your email.</span>
                                                                </div>

                                                                <div class="form-group form-md-line-input ">
                                                                    <input type="text" class="form-control" id="owner_incharge_name" name="owner_incharge_name" value="<?php echo e($common_details->owner_incharge_name); ?>" >
                                                                    <label for="form_control_1">Owner/In-Charge</label>
                                                                    <span class="help-block">Please enter owner/In-charge.</span>
                                                                </div>

                                                                <div class="form-group form-md-line-input">
                                                                    <input type="text" class="form-control" id="owner_incharge_name2" name="owner_incharge_name2" value="<?php echo e($common_details->owner_incharge_name2); ?>" >
                                                                    <label for="form_control_1">Owner/In-Charge#2</label>
                                                                    <span class="help-block">Please enter other owner/In-charge.</span>
                                                                </div>


                                                                <div class="form-group form-md-line-input ">
                                                                    <textarea class="form-control" rows="3" name="address" id="address"><?php echo e($common_details->address); ?></textarea>
                                                                    <label for="form_control_1">Address</label>
                                                                </div>




                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-body">
                                                                <input type="text" class="form-control"  id="gmap_geocoding_address" placeholder="address...">


                                                                <div class="portlet light">
                                                                    <div class="portlet-body">

                                                                        <div id="gmap_geocoding" class="gmaps"></div>

                                                                    </div>
                                                                </div>

                                                                <div class="hide form-group form-md-line-input form-md-floating-label">
                                                                    <input type="text" class="form-control edited" id="longitude" name="longitude"  >
                                                                    <label for="form_control_1">Longitude</label>
                                                                    <span class="help-block"></span>
                                                                </div>

                                                                <div class="hide form-group form-md-line-input form-md-floating-label">
                                                                    <input type="text" class="form-control edited" id="latitude" name="latitude"  >
                                                                    <label for="form_control_1">Latitude</label>
                                                                    <span class="help-block"></span>
                                                                </div>

                                                                <div class=" form-group form-md-line-input ">
                                                                    <input type="text" class="form-control" id="website" name="website" value="<?php echo e($common_details->website); ?>">
                                                                    <label for="form_control_1">Website</label>
                                                                    <span class="help-block">Please enter website.</span>
                                                                </div>

                                                                <div class="form-group form-md-line-input ">
                                                                    <input type="tel" class="form-control" id="phone" name="phone"  value="<?php echo e($common_details->phone); ?>">
                                                                    <label for="form_control_1">Phone</label>
                                                                    <span class="help-block">Please enter phone number.</span>
                                                                </div>

                                                                <div class="form-group form-md-line-input ">
                                                                    <input type="tel" class="form-control" id="phone2" name="phone2" value="<?php echo e($common_details->phone2); ?>" >
                                                                    <label for="form_control_1">Phone #2</label>
                                                                    <span class="help-block">Please enter phone number.</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php echo Form::hidden('updateType','details'); ?>

                                                        <?php echo Form::close(); ?>

                                                    </div>
                                                    <div class="row">
                                                        <div class=" col-md-offset-5 col-md-2">
                                                            <button type="button" class="btn btn-primary" id="updateDetails">Update</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php if($common_details->huntplex_listing == 'yes'): ?>
                                    <div class="tab-pane fade" id="tab_2_2">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="portlet light ">
                                                    <div class="portlet-title">
                                                        <div class="caption font-dark">
                                                            <i class="icon-badge font-red"></i>
                                                            <span class="caption-subject font-red bold uppercase"> Services</span>
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <?php echo Form::open(['id'=>'myGymServices','method'=>'post','class' => 'ajax_form']); ?>

                                                        <div class="row">
                                                            <div class="form-body col-md-4">
                                                                <div class="form-group">
                                                                    <?php echo Form::hidden("spa_hot_tub","0"); ?>

                                                                    <div class="col-sm-12">
                                                                        <div class="md-checkbox">
                                                                            <input type="checkbox" name="spa_hot_tub" value="1" id="spa_hot_tub" <?php if($gym->spa_hot_tub == 1): ?> checked <?php endif; ?>  class="md-check">
                                                                            <label for="spa_hot_tub">
                                                                                <span></span>
                                                                                <span class="check"></span>
                                                                                <span class="box"></span> Spa/Hot Tub </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <?php echo Form::hidden("shower","0"); ?>

                                                                    <div class="col-sm-12">
                                                                        <div class="md-checkbox">
                                                                            <input type="checkbox" name="shower" value="1" id="shower" <?php if($gym->shower == 1): ?> checked <?php endif; ?>  class="md-check">
                                                                            <label for="shower">
                                                                                <span></span>
                                                                                <span class="check"></span>
                                                                                <span class="box"></span> Shower </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <?php echo Form::hidden("sauna_steam_bath","0"); ?>

                                                                    <div class="col-sm-12">
                                                                        <div class="md-checkbox">
                                                                            <input type="checkbox" name="sauna_steam_bath" value="1" id="sauna_steam_bath" <?php if($gym->sauna_steam_bath == 1): ?> checked <?php endif; ?>  class="md-check">
                                                                            <label for="sauna_steam_bath">
                                                                                <span></span>
                                                                                <span class="check"></span>
                                                                                <span class="box"></span> Sauna/Steam Bath </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <?php echo Form::hidden("massage","0"); ?>

                                                                    <div class="col-sm-12">
                                                                        <div class="md-checkbox">
                                                                            <input type="checkbox" name="massage" value="1" id="massage" <?php if($gym->massage == 1): ?> checked <?php endif; ?>  class="md-check">
                                                                            <label for="massage">
                                                                                <span></span>
                                                                                <span class="check"></span>
                                                                                <span class="box"></span> Massage </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <?php echo Form::hidden("therapies","0"); ?>

                                                                    <div class="col-sm-12">
                                                                        <div class="md-checkbox">
                                                                            <input type="checkbox" name="therapies" value="1" id="therapies" <?php if($gym->therapies == 1): ?> checked <?php endif; ?>  class="md-check">
                                                                            <label for="therapies">
                                                                                <span></span>
                                                                                <span class="check"></span>
                                                                                <span class="box"></span> Therapies </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <?php echo Form::hidden("cardio","0"); ?>

                                                                    <div class="col-sm-12">
                                                                        <div class="md-checkbox">
                                                                            <input type="checkbox" name="cardio" value="1" id="cardio" <?php if($gym->cardio == 1): ?> checked <?php endif; ?>  class="md-check">
                                                                            <label for="cardio">
                                                                                <span></span>
                                                                                <span class="check"></span>
                                                                                <span class="box"></span> Cardio </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <?php echo Form::hidden("aerobics","0"); ?>

                                                                    <div class="col-sm-12">
                                                                        <div class="md-checkbox">
                                                                            <input type="checkbox" name="aerobics" value="1" id="aerobics" <?php if($gym->aerobics == 1): ?> checked <?php endif; ?>  class="md-check">
                                                                            <label for="aerobics">
                                                                                <span></span>
                                                                                <span class="check"></span>
                                                                                <span class="box"></span> Aerobics </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <?php echo Form::hidden("yoga","0"); ?>

                                                                    <div class="col-sm-12">
                                                                        <div class="md-checkbox">
                                                                            <input type="checkbox" name="yoga" value="1" id="yoga" <?php if($gym->yoga == 1): ?> checked <?php endif; ?>  class="md-check">
                                                                            <label for="yoga">
                                                                                <span></span>
                                                                                <span class="check"></span>
                                                                                <span class="box"></span> Yoga </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <?php echo Form::hidden("air_conditioned","0"); ?>

                                                                    <div class="col-sm-12">
                                                                        <div class="md-checkbox">
                                                                            <input type="checkbox" name="air_conditioned" value="1" id="air_conditioned" <?php if($gym->air_conditioned == 1): ?> checked <?php endif; ?>  class="md-check">
                                                                            <label for="air_conditioned">
                                                                                <span></span>
                                                                                <span class="check"></span>
                                                                                <span class="box"></span> Air Conditioned </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <?php echo Form::hidden("towel_service","0"); ?>

                                                                    <div class="col-sm-12">
                                                                        <div class="md-checkbox">
                                                                            <input type="checkbox" name="towel_service" value="1" id="towel_service" <?php if($gym->towel_service == 1): ?> checked <?php endif; ?>  class="md-check">
                                                                            <label for="towel_service">
                                                                                <span></span>
                                                                                <span class="check"></span>
                                                                                <span class="box"></span> Towel Service </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <?php echo Form::hidden("special_ladies_batch","0"); ?>

                                                                    <div class="col-sm-12">
                                                                        <div class="md-checkbox">
                                                                            <input type="checkbox" name="special_ladies_batch" value="1" id="special_ladies_batch" <?php if($gym->special_ladies_batch == 1): ?> checked <?php endif; ?>  class="md-check">
                                                                            <label for="special_ladies_batch">
                                                                                <span></span>
                                                                                <span class="check"></span>
                                                                                <span class="box"></span> Special Ladies Batch </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <?php echo Form::hidden("exercise_bike","0"); ?>

                                                                    <div class="col-sm-12">
                                                                        <div class="md-checkbox">
                                                                            <input type="checkbox" name="exercise_bike" value="1" id="exercise_bike" <?php if($gym->exercise_bike == 1): ?> checked <?php endif; ?>  class="md-check">
                                                                            <label for="exercise_bike">
                                                                                <span></span>
                                                                                <span class="check"></span>
                                                                                <span class="box"></span> Exercise Bike </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <?php echo Form::hidden("lokers","0"); ?>

                                                                    <div class="col-sm-12">
                                                                        <div class="md-checkbox">
                                                                            <input type="checkbox" name="lokers" value="1" id="lokers" <?php if($gym->lokers == 1): ?> checked <?php endif; ?>  class="md-check">
                                                                            <label for="lokers">
                                                                                <span></span>
                                                                                <span class="check"></span>
                                                                                <span class="box"></span> Lockers </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <?php echo Form::hidden("juice_bar","0"); ?>

                                                                    <div class="col-sm-12">
                                                                        <div class="md-checkbox">
                                                                            <input type="checkbox" name="juice_bar" value="1" id="juice_bar" <?php if($gym->juice_bar == 1): ?> checked <?php endif; ?>  class="md-check">
                                                                            <label for="juice_bar">
                                                                                <span></span>
                                                                                <span class="check"></span>
                                                                                <span class="box"></span> Juice Bar </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <?php echo Form::hidden("dietician_nutrition","0"); ?>

                                                                    <div class="col-sm-12">
                                                                        <div class="md-checkbox">
                                                                            <input type="checkbox" name="dietician_nutrition" value="1" id="dietician_nutrition" <?php if($gym->dietician_nutrition == 1): ?> checked <?php endif; ?>  class="md-check">
                                                                            <label for="dietician_nutrition">
                                                                                <span></span>
                                                                                <span class="check"></span>
                                                                                <span class="box"></span> Dietician Nutrition </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <?php echo Form::hidden("physiotherapist","0"); ?>

                                                                    <div class="col-sm-12">
                                                                        <div class="md-checkbox">
                                                                            <input type="checkbox" name="physiotherapist" value="1" id="physiotherapist" <?php if($gym->physiotherapist == 1): ?> checked <?php endif; ?>  class="md-check">
                                                                            <label for="physiotherapist">
                                                                                <span></span>
                                                                                <span class="check"></span>
                                                                                <span class="box"></span> Physiotherapist </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <?php echo Form::hidden("personal_trainer","0"); ?>

                                                                    <div class="col-sm-12">
                                                                        <div class="md-checkbox">
                                                                            <input type="checkbox" name="personal_trainer" value="1" id="personal_trainer" <?php if($gym->personal_trainer == 1): ?> checked <?php endif; ?>  class="md-check">
                                                                            <label for="personal_trainer">
                                                                                <span></span>
                                                                                <span class="check"></span>
                                                                                <span class="box"></span> Personal Trainer </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <?php echo Form::hidden("trade_mill","0"); ?>

                                                                    <div class="col-sm-12">
                                                                        <div class="md-checkbox">
                                                                            <input type="checkbox" name="trade_mill" value="1" id="trade_mill" <?php if($gym->trade_mill == 1): ?> checked <?php endif; ?>  class="md-check">
                                                                            <label for="trade_mill">
                                                                                <span></span>
                                                                                <span class="check"></span>
                                                                                <span class="box"></span> Trade Mill </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <?php echo Form::hidden("leg_equipment","0"); ?>

                                                                    <div class="col-sm-12">
                                                                        <div class="md-checkbox">
                                                                            <input type="checkbox" name="leg_equipment" value="1" id="leg_equipment" <?php if($gym->leg_equipment == 1): ?> checked <?php endif; ?>  class="md-check">
                                                                            <label for="leg_equipment">
                                                                                <span></span>
                                                                                <span class="check"></span>
                                                                                <span class="box"></span> Leg Equipment </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <?php echo Form::hidden("bisceps_trainer","0"); ?>

                                                                    <div class="col-sm-12">
                                                                        <div class="md-checkbox">
                                                                            <input type="checkbox" name="bisceps_trainer" value="1" id="bisceps_trainer" <?php if($gym->bisceps_trainer == 1): ?> checked <?php endif; ?>  class="md-check">
                                                                            <label for="bisceps_trainer">
                                                                                <span></span>
                                                                                <span class="check"></span>
                                                                                <span class="box"></span> Bisceps & Triceps </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <?php echo Form::hidden("wrist_forearms","0"); ?>

                                                                    <div class="col-sm-12">
                                                                        <div class="md-checkbox">
                                                                            <input type="checkbox" name="wrist_forearms" value="1" id="wrist_forearms" <?php if($gym->wrist_forearms == 1): ?> checked <?php endif; ?>  class="md-check">
                                                                            <label for="wrist_forearms">
                                                                                <span></span>
                                                                                <span class="check"></span>
                                                                                <span class="box"></span> Wrist/Forearms </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <?php echo Form::hidden("back_shoulder","0"); ?>

                                                                    <div class="col-sm-12">
                                                                        <div class="md-checkbox">
                                                                            <input type="checkbox" name="back_shoulder" value="1" id="back_shoulder" <?php if($gym->back_shoulder == 1): ?> checked <?php endif; ?>  class="md-check">
                                                                            <label for="back_shoulder">
                                                                                <span></span>
                                                                                <span class="check"></span>
                                                                                <span class="box"></span> Back & Shoulder </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <?php echo Form::hidden("abdomen_abs","0"); ?>

                                                                    <div class="col-sm-12">
                                                                        <div class="md-checkbox">
                                                                            <input type="checkbox" name="abdomen_abs" value="1" id="abdomen_abs" <?php if($gym->abdomen_abs == 1): ?> checked <?php endif; ?>  class="md-check">
                                                                            <label for="abdomen_abs">
                                                                                <span></span>
                                                                                <span class="check"></span>
                                                                                <span class="box"></span> Abdomen & abs </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <?php echo Form::hidden("thigh_equipment","0"); ?>

                                                                    <div class="col-sm-12">
                                                                        <div class="md-checkbox">
                                                                            <input type="checkbox" name="thigh_equipment" value="1" id="thigh_equipment" <?php if($gym->thigh_equipment == 1): ?> checked <?php endif; ?>  class="md-check">
                                                                            <label for="thigh_equipment">
                                                                                <span></span>
                                                                                <span class="check"></span>
                                                                                <span class="box"></span> Thigh Equipment </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <?php echo Form::hidden("free_trial","0"); ?>

                                                                    <div class="col-sm-12">
                                                                        <div class="md-checkbox">
                                                                            <input type="checkbox" name="free_trial" value="1" id="free_trial" <?php if($gym->free_trial == 1): ?> checked <?php endif; ?>  class="md-check">
                                                                            <label for="free_trial">
                                                                                <span></span>
                                                                                <span class="check"></span>
                                                                                <span class="box"></span> Free Trial </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            <div class="form-group">
                                                                <?php echo Form::hidden("cash","0"); ?>

                                                                <div class="col-sm-12">
                                                                    <div class="md-checkbox">
                                                                        <input type="checkbox" name="cash" value="1" id="cash" <?php if($gym->cash == 1): ?> checked <?php endif; ?>  class="md-check">
                                                                        <label for="cash">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span> Cash </label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <?php echo Form::hidden("credit_card","0"); ?>

                                                                <div class="col-sm-12">
                                                                    <div class="md-checkbox">
                                                                        <input type="checkbox" name="credit_card" value="1" id="credit_card" <?php if($gym->credit_card == 1): ?> checked <?php endif; ?>  class="md-check">
                                                                        <label for="credit_card">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span> Credit Card </label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <?php echo Form::hidden("debit_card","0"); ?>

                                                                <div class="col-sm-12">
                                                                    <div class="md-checkbox">
                                                                        <input type="checkbox" name="debit_card" value="1" id="debit_card" <?php if($gym->debit_card == 1): ?> checked <?php endif; ?>  class="md-check">
                                                                        <label for="debit_card">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span> Debit Card </label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            </div>
                                                            <div class="form-body col-md-4">

                                                                <div class="form-group form-md-line-input ">
                                                                    <select  class="bs-select form-control" data-live-search="true" data-size="8" name="gender" id="gender">
                                                                        <option value="male" <?php if($gym->gender == 'male'): ?> selected <?php endif; ?>>Male</option>
                                                                        <option value="female" <?php if($gym->gender == 'female'): ?> selected <?php endif; ?>>Female</option>
                                                                        <option value="both" <?php if($gym->gender == 'both'): ?> selected <?php endif; ?>>Both</option>
                                                                    </select>
                                                                    <label for="title">Gender</label>
                                                                    <span class="help-block"></span>
                                                                </div>


                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <input type="number" min="0" class="form-control edited" id="free_trial_days" name="free_trial_days" value="<?php echo e($gym->free_trial_days); ?>"  >
                                                                    <label for="form_control_1">Free Trial Days</label>
                                                                    <span class="help-block"></span>
                                                                </div>



                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <input type="number" min="0" class="form-control edited" id="fitness_monthly_price" name="fitness_monthly_price" value="<?php echo e($gym->fitness_monthly_price); ?>"  >
                                                                    <label for="form_control_1">Fitness Monthly Price</label>
                                                                    <span class="help-block"></span>
                                                                </div>

                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <input type="number" min="0" class="form-control edited" id="fitness_quarterly_price" name="fitness_quarterly_price" value="<?php echo e($gym->fitness_quarterly_price); ?>"  >
                                                                    <label for="form_control_1">Fitness Quarterly Price</label>
                                                                    <span class="help-block"></span>
                                                                </div>

                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <input type="number" min="0" class="form-control edited" id="fitness_halfyearly_price" name="fitness_halfyearly_price" value="<?php echo e($gym->fitness_halfyearly_price); ?>"  >
                                                                    <label for="form_control_1">Fitness Halfyearly Price</label>
                                                                    <span class="help-block"></span>
                                                                </div>

                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <input type="number" min="0" class="form-control edited" id="fitness_yearly_price" name="fitness_yearly_price" value="<?php echo e($gym->fitness_yearly_price); ?>"  >
                                                                    <label for="form_control_1">Fitness Yearly Price</label>
                                                                    <span class="help-block"></span>
                                                                </div>

                                                            </div>
                                                            <div class="form-body col-md-4">

                                                                <div class="form-group form-md-line-input ">
                                                                    <select  class="bs-select form-control" data-live-search="true" data-size="8" name="type" id="type">
                                                                        <option value="gym" <?php if($gym->type == 'gym'): ?> selected <?php endif; ?>>Gym</option>
                                                                        <option value="fitness" <?php if($gym->type == 'fitness'): ?> selected <?php endif; ?>>Fitness</option>
                                                                        <option value="both" <?php if($gym->type == 'both'): ?> selected <?php endif; ?>>Both</option>
                                                                    </select>
                                                                    <label for="title">Type</label>
                                                                    <span class="help-block"></span>
                                                                </div>

                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <input type="number" min="0" class="form-control edited" id="gym_monthly_price" name="gym_monthly_price" value="<?php echo e($gym->gym_monthly_price); ?>"  >
                                                                    <label for="form_control_1">Gym Monthly Price</label>
                                                                    <span class="help-block"></span>
                                                                </div>

                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <input type="number" min="0" class="form-control edited" id="gym_quarterly_price" name="gym_quarterly_price" value="<?php echo e($gym->gym_quarterly_price); ?>"  >
                                                                    <label for="form_control_1">Gym Quarterly Price</label>
                                                                    <span class="help-block"></span>
                                                                </div>

                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <input type="number" min="0" class="form-control edited" id="gym_halfyearly_price" name="gym_halfyearly_price" value="<?php echo e($gym->gym_halfyearly_price); ?>"  >
                                                                    <label for="form_control_1">Gym Halfyearly Price</label>
                                                                    <span class="help-block"></span>
                                                                </div>

                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <input type="number" min="0" class="form-control edited" id="gym_yearly_price" name="gym_yearly_price" value="<?php echo e($gym->gym_yearly_price); ?>"  >
                                                                    <label for="form_control_1">Gym Yearly Price</label>
                                                                    <span class="help-block"></span>
                                                                </div>





                                                            </div>

                                                            <div class="form-body col-md-12">
                                                                <hr>
                                                                <div class="caption">
                                                                    <i class="fa fa-clock-o"></i><strong>Timings</strong>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="col-sm-12 text-center">
                                                                           <h5> Morning</h5>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group form-md-line-input form-md-floating-label">
                                                                            <input type="text" class="form-control timepicker timepicker-no-seconds" id="morning_open_time" name="morning_open_time" value="<?php echo e($gym->morning_open_time); ?>"  >
                                                                            <label for="form_control_1">Open Time</label>
                                                                            <span class="help-block"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group form-md-line-input form-md-floating-label">
                                                                            <input type="text" class="form-control timepicker timepicker-no-seconds" id="morning_close_time" name="morning_close_time" value="<?php echo e($gym->morning_close_time); ?>"  >
                                                                            <label for="form_control_1">Close Time</label>
                                                                            <span class="help-block">Leave blank if full day</span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <div class="col-sm-12 text-center">
                                                                        <h5>Evening</h5>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group form-md-line-input form-md-floating-label">
                                                                            <input type="text" class="form-control timepicker timepicker-no-seconds" id="evening_open_time" name="evening_open_time" value="<?php echo e($gym->evening_open_time); ?>"  >
                                                                            <label for="form_control_1">Open Time</label>
                                                                            <span class="help-block">Leave blank if full day</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group form-md-line-input form-md-floating-label">
                                                                            <input type="text" class="form-control timepicker timepicker-no-seconds" id="evening_close_time" name="evening_close_time" value="<?php echo e($gym->evening_close_time); ?>"  >
                                                                            <label for="form_control_1">Close Time</label>
                                                                            <span class="help-block"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <div class="col-sm-12">&nbsp;</div>
                                                                    <?php echo Form::hidden("sat_closed","0"); ?>

                                                                    <div class="col-sm-6">
                                                                        <div class="md-checkbox">
                                                                            <input type="checkbox" name="sat_closed" value="1" id="sat_closed" <?php if($gym->sat_closed == 1): ?> checked <?php endif; ?>  class="md-check">
                                                                            <label for="sat_closed">
                                                                                <span></span>
                                                                                <span class="check"></span>
                                                                                <span class="box"></span> Sat Closed </label>
                                                                        </div>
                                                                    </div>
                                                                    <?php echo Form::hidden("sun_closed","0"); ?>

                                                                    <div class="col-sm-6">
                                                                        <div class="md-checkbox">
                                                                            <input type="checkbox" name="sun_closed" value="1" id="sun_closed" <?php if($gym->sun_closed == 1): ?> checked <?php endif; ?>  class="md-check">
                                                                            <label for="sun_closed">
                                                                                <span></span>
                                                                                <span class="check"></span>
                                                                                <span class="box"></span> Sun Closed </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <?php echo Form::hidden('updateType','services'); ?>

                                                        <?php echo Form::close(); ?>

                                                        <div class="row">
                                                            <div class=" col-md-offset-5 col-md-2">
                                                                <button type="button" class="btn btn-primary" id="updateServices">Update</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab_2_3">
                                        <?php if(count($pics)>0): ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="portlet light ">
                                                    <div class="portlet-title">
                                                        <div class="caption font-dark">
                                                            <i class="icon-badge font-red"></i>
                                                            <span class="caption-subject font-red bold uppercase"> Uploaded Images</span>
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <?php $__currentLoopData = $pics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <div class="col-md-3 margin-top-5 pic-<?php echo e($pic->id); ?>">
                                                                            <div class="row">
                                                                                <div class="col-xs-12">
                                                                                    <a href="#" class="thumbnail">
                                                                                        <?php echo HTML::image($gymSearch.$pic->image,'',array('style' => 'height: 180px; width: 100%; display: block;')); ?>

                                                                                    </a>
                                                                                </div>
                                                                                <div class="col-xs-6">
                                                                                    <div class="md-radio">
                                                                                        <input type="radio" value="<?php echo e($pic->id); ?>" id="yes-<?php echo e($pic->id); ?>" <?php if($pic->main_image == 'true'): ?> checked <?php endif; ?> name="main_image" class="md-radiobtn setMainPic">
                                                                                        <label for="yes-<?php echo e($pic->id); ?>">
                                                                                            <span></span>
                                                                                            <span class="check"></span>
                                                                                            <span class="box"></span> Main </label>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-xs-6 text-center">
                                                                                    <a href="javascript:;" rel="<?php echo e($pic->id); ?>" class="btn red btn-xs deletePic" >Delete</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="portlet light ">
                                                    <div class="portlet-title">
                                                        <div class="caption font-dark">
                                                            <i class="icon-badge font-red"></i>
                                                            <span class="caption-subject font-red bold uppercase"> Upload Image</span>
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <p>
                                                                    <span class="label label-danger">
                                                                    NOTE: </span>
                                                                    &nbsp; Last image you upload will set as main image.
                                                                </p>
                                                                <?php echo Form::open(array('route' => ['gym-admin.my-gym.store'], 'method' => 'POST', "id" => "my-dropzone", "class" => 'dropzone dropzone-file-area','enctype' => "multipart/form-data")); ?>

                                                                <p class="sbold">Drop files here or click to upload</p>
                                                                <?php echo Form::hidden("detail_id",$common_details->id); ?>

                                                                <?php echo Form::hidden("category_id",$common_details->category_id); ?>

                                                                <?php echo Form::hidden("updateType",'file'); ?>


                                                                <?php echo Form::close(); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    <?php echo HTML::script('admin/global/plugins/bootstrap-select/js/bootstrap-select.min.js'); ?>

    <?php echo HTML::script('admin/pages/scripts/components-bootstrap-select.min.js'); ?>

    <script src="https://maps.googleapis.com/maps/api/js?key=<?php if(!is_null($gymSettings->maps_api_key) && $gymSettings->maps_api_key != ''): ?> <?php echo e($gymSettings->maps_api_key); ?> <?php endif; ?>&libraries=places"></script>
    
    <?php echo HTML::script('admin/global/plugins/dropzone/dropzone.min.js'); ?>

    <?php echo HTML::script('admin/pages/scripts/form-dropzone.min.js'); ?>

    <?php echo HTML::script('admin/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js'); ?>

    <script>
        //Get Latitude And Longitude
        var geocoder = new google.maps.Geocoder();

        function geocodePosition(pos)
        {
            geocoder.geocode(
                    {
                        latLng: pos
                    }, function(responses)
                    {
                        if (responses && responses.length > 0) {
                            updateMarkerAddress(responses[0].formatted_address);
                        } else {
                            updateMarkerAddress('Cannot determine address at this location.');
                        }
                    });
        }

        function updateMarkerStatus(str)
        {
            //document.getElementById('markerStatus').innerHTML = str;
        }

        function updateMarkerPosition(latLng)
        {
            $('#latitude').val(latLng.lat());
            $('#longitude').val(latLng.lng());
        }

        function updateMarkerAddress(str)
        {

            //  $('#currentlocation').val(str);

        }

        function initialize()
        {
            //Latitude longitude of default

            var clat = "<?php echo e($common_details->latitude); ?>";
            var clong = "<?php echo e($common_details->longitude); ?>";

            clat = parseFloat(clat);
            clong = parseFloat(clong);

            var latLng = new google.maps.LatLng(clat,clong);

            var mapOptions = {
                center: latLng,
                zoom: 16,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            map = new google.maps.Map(document.getElementById('gmap_geocoding'),
                    mapOptions);

            var input = document.getElementById('gmap_geocoding_address');

            var autocomplete = new google.maps.places.Autocomplete(input);

            //autocomplete.bindTo('bounds', map);

            var infowindow = new google.maps.InfoWindow();
            marker = new google.maps.Marker({
                map: map,
                position: latLng,
                title: 'ReferSell',
                draggable: true
            });
            updateMarkerPosition(latLng);
            geocodePosition(latLng);

            // Add dragging event listeners.
            google.maps.event.addListener(marker, 'dragstart', function() {
                updateMarkerAddress('Dragging...');
            });

            google.maps.event.addListener(marker, 'drag', function() {
                updateMarkerStatus('Dragging...');
                updateMarkerPosition(marker.getPosition());
            });

            google.maps.event.addListener(marker, 'dragend', function() {

                updateMarkerStatus('Drag ended');
                geocodePosition(marker.getPosition());
            });
            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                infowindow.close();
                var place = autocomplete.getPlace();

                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(10);  // Why 17? Because it looks good.
                }

                /* var image = new google.maps.MarkerImage(
                 place.icon,
                 new google.maps.Size(71, 71),
                 new google.maps.Point(0, 0),
                 new google.maps.Point(17, 34),
                 new google.maps.Size(35, 35));
                 marker.setIcon(image);*/
                marker.setPosition(place.geometry.location);
                updateMarkerPosition(place.geometry.location);

                var address = '';

            });

            // Sets a listener on a radio button to change the filter type on Places
            // Autocomplete.
            function setupClickListener(id, types) {
                var radioButton = document.getElementById(id);
                google.maps.event.addDomListener(radioButton, 'click', function() {
                    autocomplete.setTypes(types);
                });
            }

        }

    </script>
    <script>


        $('.timepicker-no-seconds').timepicker({
            autoclose: true,
            minuteStep: 5
        });
        $('#updateDetails').click(function(){
            $.easyAjax({
                url:'<?php echo e(route('gym-admin.my-gym.store')); ?>',
                type:"Post",
                container:'#myGymDetails',
                data:$('#myGymDetails').serialize()
            })
        });

        $('#updateServices').click(function(){
            $.easyAjax({
                url:'<?php echo e(route('gym-admin.my-gym.store')); ?>',
                type:"Post",
                container:'#myGymServices',
                data:$('#myGymServices').serialize()
            })
        });
    </script>
    <script>
        $( ".deletePic" ).click(function() {
            var id = $( this ).attr("rel");
            var url = "<?php echo e(route('gym-admin.my-admin.remove.image',['#id'])); ?>";
            url = url.replace('#id',id);
            $.easyAjax({
                url:url,
                success:function (res) {
                    if(res.status == 'success'){
                        $('.pic-'+id).remove();
                    }
                }
            })
        });

        $( ".setMainPic" ).click(function() {
            var id = $( this ).val();
            var url = "<?php echo e(route('gym-admin.my-admin.set-main.image',['#id'])); ?>";
            url = url.replace('#id',id);
            $.easyAjax({
                url:url,
                success:function(){

                }
            })
        });
    </script>
    <script>
        $(document).ready(function(){
            initialize();
        });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.gym-merchant.gymbasic', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>