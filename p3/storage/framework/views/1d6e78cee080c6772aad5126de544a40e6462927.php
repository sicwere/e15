<?php $__env->startSection('title'); ?>
BMI Calculator
<?php $__env->stopSection(); ?>

<?php $__env->startSection('head'); ?>
<style>
footer {
    margin-top: 75px;
}

span.result {
    text-decoration: underline;
}

button {
    background-color: #24a0ed;
}

.results button {
    margin-top: 30px;
}

ul {
    margin: auto;
    list-style: none;
    color: red;
    width: fit-content;
    padding: 10px;
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
BMI Calculator
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<form method="GET" action="/search">
    <div class="row">
        <label for="height" class="cell">Enter height (in meters or inches):</label>
        <input type="number" class="cell" id="height" name="height" step="0.01" value="<?php echo e($height); ?>">
    </div>
    <div class="row">
        <label for="weight" class="cell">Enter weight (in kilograms or pounds):</label>
        <input type="number" class="cell" id="weight" name="weight" step="0.01" value="<?php echo e($weight); ?>">
    </div>
    <div class="row">
        <label class="cell">
            Standard: <input type="radio" name="units" value="Standard"
                <?php echo e(($units == 'Standard' or is_null($units)) ? 'checked' : ''); ?>></input>
        </label>
        <label class="cell">
            Metric: <input type="radio" name="units" value="Metric" <?php echo e($units == 'Metric' ? 'checked' : ''); ?>></input>
        </label>
    </div>
    <div class="row">
        <label for="categories" class="cell">Show category:</label>
        <input type="checkbox" name="categories" <?php echo e($categories ? 'checked' : ''); ?>></input>
    </div>
    <button type=" submit">Calculate</button>
</form>

<div class="results">
    <?php if(isset($bmi)): ?>
    <span>Your Body Mass Index is <span class="result"><?php echo e($bmi); ?></span>.</span>
    <?php if(isset($category)): ?>
    <span>This is considered <span class="result"><?php echo e($category); ?></span>.</span>
    <?php endif; ?>
    <form method="GET" action="/save">
        <input type="hidden" name="bmi" value="<?php echo e($bmi); ?>">
        <input type="hidden" name="weight" value="<?php echo e($weight); ?>">;
        <input type="hidden" name="height" value="<?php echo e($height); ?>">
        <input type="hidden" name="units" value="<?php echo e($units); ?>">
        <button type=" submit">Save</button>
    </form>
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
<?php echo $__env->make('layouts/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/e15/p3/resources/views/bmi.blade.php ENDPATH**/ ?>