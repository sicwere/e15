<?php $__env->startSection('title'); ?>
BMI History
<?php $__env->stopSection(); ?>

<?php $__env->startSection('head'); ?>
<style>
table,
th,
td {
    border: 1px solid;
}

table {
    width: 70%;
    margin-left: 15%;
    margin-right: 15%;
    border-collapse: collapse;
}

td {
    text-align: center;
}
</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('greeting'); ?>
<span class="greeting">
    Hello, <?php echo e(Auth::user()->name); ?>!
</span>
<form method='POST' id='logout' class="logout" action='/logout'>
    <?php echo e(csrf_field()); ?>

    <a href='#' onClick='document.getElementById("logout").submit();'>Logout</a>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('heading'); ?>
BMI History
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php if(isset($flashAlert)): ?>
<div><?php echo e($flashAlert); ?></div>
<?php endif; ?>

<?php if(isset($bmis)): ?>
<?php echo $chart->container(); ?>

<table>
    <th>Date</th>
    <th>BMI</th>
    <th>Weight</th>
    <th>Height</th>
    <th>Delete?</th>
    <?php $__currentLoopData = $bmis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bmi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($bmi->created_at->toDayDateTimeString()); ?></td>
        <td><?php echo e($bmi->bmi); ?></td>
        <td><?php echo e($bmi->weight); ?> <?php echo e($bmi->units === 'Standard' ? 'lbs' : 'kgs'); ?></td>
        <td><?php echo e($bmi->height); ?> <?php echo e($bmi->units === 'Standard' ? 'in' : 'm'); ?></td>
        </td>
        <td><a href="/delete?bmi_id=<?php echo e($bmi->id); ?>">X</a></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
<?php endif; ?>


<?php if(count($errors) > 0): ?>
<ul>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li><?php echo e($error); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php endif; ?>

<script src="<?php echo e($chart->cdn()); ?>"></script>
<?php echo e($chart->script()); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/e15/p3/resources/views/history.blade.php ENDPATH**/ ?>