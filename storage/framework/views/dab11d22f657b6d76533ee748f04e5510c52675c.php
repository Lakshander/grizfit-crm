<div class="form-group form-md-line-input ">
    <select  class="form-control" name="purchase_id" id="purchase_id">
        <?php $__empty_1 = true; $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php if(!is_null($purc->membership_id)): ?>
                <option value="<?php echo e($purc->id); ?>"><?php echo e(ucwords($purc->membership->title)); ?> - [Purchased on: <?php echo e($purc->purchase_date->format('d-M')); ?>]</option>
            <?php elseif(!is_null($purc->offer_id)): ?>
                <option value="<?php echo e($purc->id); ?>"><?php echo e(ucwords($purc->offer->title)); ?>&nbsp;<<?php echo e($purc->purchase_date->format('d-M')); ?>></option>
            <?php elseif(!is_null($purc->package_id)): ?>
                <option value="<?php echo e($purc->id); ?>"><?php echo e(ucwords($purc->package->title)); ?>&nbsp;<<?php echo e($purc->purchase_date->format('d-M')); ?>></option>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <option value="">No purchase by this client</option>
        <?php endif; ?>
    </select>
    <label for="title">Payment For</label>
    <span class="help-block"></span>
</div>