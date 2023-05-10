<?php $__env->startSection('title'); ?>
Register for the BMI Calculator
<?php $__env->stopSection(); ?>

<?php $__env->startSection('head'); ?>
<style>
nav {
    text-align: center;
    font-size: 20px;
    font-style: italic;
}

nav a {
    font-style: normal;
    text-decoration: none;
}

button {
    background-color: green;
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('greeting'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('heading'); ?>
Register for the BMI Calculator
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<nav>Already have an account? <a href='/login'>Login here...</a></nav>

<form method='POST' action='/register'>
    <?php echo e(csrf_field()); ?>

    <div class="row">
        <label for='name' class="cell">Name:</label>
        <input id='name' type='text' name='name' value="<?php echo e(old('name')); ?>" autofocus class="cell" size="25">
        <?php if($errors->get('name')): ?>
        <span class="cell error"><?php echo e($errors->first('name')); ?></span>
        <?php endif; ?>
    </div>
    <div class="row">
        <label for='email' class="cell">E-Mail Address:</label>
        <input id='email' type='email' name='email' value="<?php echo e(old('email')); ?>" class="cell" size="25">
        <?php if($errors->get('email')): ?>
        <span class="cell error"><?php echo e($errors->first('email')); ?></span>
        <?php endif; ?>
    </div>
    <div class="row">
        <label for='password' class="cell">Password (min: 8):</label>
        <input id='password' type='password' name='password' class="cell" size="25">
        <?php if($errors->get('password')): ?>
        <span class="cell error"><?php echo e($errors->first('password')); ?></span>
        <?php endif; ?>
    </div>
    <div class="row">
        <label for='password-confirm' class="cell">Confirm Password:</label>
        <input id='password-confirm' type='password' name='password_confirmation' class="cell" size="25">
    </div>
    <button type='submit' class='btn btn-primary'>Register</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/e15/p3/resources/views/auth/register.blade.php ENDPATH**/ ?>