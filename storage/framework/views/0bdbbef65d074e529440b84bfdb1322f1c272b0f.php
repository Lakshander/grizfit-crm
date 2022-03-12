<?php if(count($tasks)>0): ?>

    <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="icon-align" onclick="deleteTask(<?php echo e($task->id); ?>)" id="todo-close-<?php echo e($task->id); ?>"><span class="lnr lnr-cross close-icon"></span></div>
        <div class="<?php if($task->status == 'pending'): ?>
            <?php if($task->priority == 'high'): ?>
                    todo-tasklist-item todo-tasklist-item-border-red high-priority-border
            <?php elseif($task->priority == 'low'): ?>
                    todo-tasklist-item todo-tasklist-item-border-red low-priority-border
            <?php else: ?>
                    todo-tasklist-item todo-tasklist-item-border-red medium-priority-border
            <?php endif; ?>
        <?php elseif($task->status == 'complete'): ?>
            <?php if($task->priority == 'high'): ?>
                todo-tasklist-item todo-tasklist-item-border-green success-card high-priority-border
            <?php elseif($task->priority == 'low'): ?>
                todo-tasklist-item todo-tasklist-item-border-green success-card
            <?php else: ?>
                todo-tasklist-item todo-tasklist-item-border-green success-card medium-priority-border
            <?php endif; ?>
        <?php endif; ?> task-<?php echo e($task->id); ?>" onclick="show(<?php echo e($task->id); ?>)" id="todo-container-<?php echo e($task->id); ?>">
            <?php if($task->merchant->image ==''): ?>
                <img class="todo-userpic pull-left" src="<?php echo e(asset('/fitsigma/images/').'/'.'user.svg'); ?>" width="27px" height="27px">
            <?php else: ?>
                <img class="todo-userpic pull-left" src="<?php echo e($profilePath.$task->merchant->image); ?>" width="27px" height="27px">
            <?php endif; ?>
            <div class="todo-tasklist-item-title success-alert-title"> <?php echo e($task->heading); ?>  </div>
            <div class="todo-tasklist-item-text"> <?php echo e($task->description); ?> </div>
            <div class="todo-tasklist-controls pull-left">
                <?php if(\Carbon\Carbon::createFromFormat('Y-m-d', $task->deadline)->toFormattedDateString() <= \Carbon\Carbon::now()->toFormattedDateString()): ?>
                    <span class="todo-tasklist-date fail-alert-date">
                    <i class="fa fa-calendar fail-alert-date"></i> <?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $task->deadline)->toFormattedDateString()); ?> </span>
                <?php else: ?>
                    <span class="todo-tasklist-date success-alert-date">
                    <i class="fa fa-calendar success-alert-date"></i> <?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $task->deadline)->toFormattedDateString()); ?> </span>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div class="pagination-button-right">
                <?php echo e($tasks->links()); ?>

        </div>

<?php else: ?>
    <div class="row">
        <div class="col-sm-12 review-icon ">
            <h2 class="review-text">Task not assigned</h2>
        </div>
    </div>
<?php endif; ?>
