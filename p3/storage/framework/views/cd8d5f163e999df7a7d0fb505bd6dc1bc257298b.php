<?php $__env->startSection('title'); ?>
Login to the BMI Calculator
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
    background-color: purple;
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('greeting'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('heading'); ?>
Login to the BMI Calculator
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<nav>Don’t have an account? <a href='/register'>Register here...</a></nav>

<form method='POST' action='/login'>
    <?php echo e(csrf_field()); ?>

    <div class="row">
        <label for='email' class="cell">E-Mail Address:</label>
        <input id='email' type='email' name='email' value="<?php echo e(old('email')); ?>" autofocus class="cell" size="25">
        <?php if($errors->get('email')): ?>
        <span class="cell error"><?php echo e($errors->first('email')); ?></span>
        <?php endif; ?>
    </div>
    <div class="row">
        <label for='password' class="cell">Password:</label>
        <input id='password' type='password' name='password' class="cell" size="25">
        <?php if($errors->get('email')): ?>
        <span class="cell error"><?php echo e($errors->first('email')); ?></span>
        <?php endif; ?>
    </div>
    <div class="row">
        <label>
            <input type='checkbox' name='remember' <?php echo e(old('remember') ? 'checked' : ''); ?>> Remember Me
        </label>
    </div>
    <button type='submit' class='btn'>Login</button>
    </a>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/e15/p3/resources/views/auth/login.blade.php ENDPATH**/ ?>