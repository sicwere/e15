<?php $__env->startSection('title'); ?>
Project Future BMI
<?php $__env->stopSection(); ?>

<?php $__env->startSection('head'); ?>
<style>
h2 {
    font-size: 20px;
    font-weight: normal;
}

button {
    background-color: blue;
}

ul {
    margin: auto;
    list-style: none;
    color: red;
    width: fit-content;
    padding: 10px;
}

span.result {
    text-decoration: underline;
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
Project Future BMI
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h2>Project how much weight you would need to lose each month to reach a target BMI.</h2>
<form method="GET" action="/project">
    <div class="row">
        <label for="height" class="cell">Enter current height (in meters or inches):</label>
        <input type="number" class="cell" id="height" name="height" step="0.01" value="<?php echo e($height); ?>">
    </div>
    <div class="row">
        <label for="weight" class="cell">Enter current weight (in kilograms or pounds):</label>
        <input type="number" class="cell" id="weight" name="weight" step="0.01" value="<?php echo e($weight); ?>">
    </div>
    <div class="row">
        <label for="target" class="cell">Enter target BMI:</label>
        <input type="number" class="cell" id="target" name="target" step="0.01" value="<?php echo e($target); ?>">
    </div>
    <div class="row">
        <label for="months" class="cell">Enter number of months to reach BMI:</label>
        <input type="number" class="cell" id="months" name="months" step="0.01" value="<?php echo e($months); ?>">
    </div>
    <div class="row">
        <label class="cell">
            Standard: <input type="radio" name="units" value="Standard"
                <?php echo e(($units === 'Standard' or is_null($units)) ? 'checked' : ''); ?>></input>
        </label>
        <label class="cell">
            Metric: <input type="radio" name="units" value="Metric" <?php echo e($units == 'Metric' ? 'checked' : ''); ?>></input>
        </label>
    </div>
    <button type=" submit">Calculate</button>
</form>

<div class="results">
    <?php if(isset($noLossMsg)): ?>
    <span><?php echo e($noLossMsg); ?></span>
    <?php elseif(isset($targetWeight)): ?>
    <span>You would need to lose <span class="result"><?php echo e($perMonth); ?> <?php echo e($measure); ?></span> per month, for a total
        weight loss of <span class="result"><?php echo e($targetWeight); ?> <?php echo e($measure); ?></span>.</span>
    <?php endif; ?>
</div>


<?php if(count($errors) > 0): ?>
<ul>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li><?php echo e($error); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/e15/p3/resources/views/predict.blade.php ENDPATH**/ ?>