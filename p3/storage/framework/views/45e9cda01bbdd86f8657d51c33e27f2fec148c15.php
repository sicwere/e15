<?php $__env->startSection('title'); ?>
BMI Calculator Home Page
<?php $__env->stopSection(); ?>

<?php $__env->startSection('head'); ?>
<style>
ul {
    margin: auto;
    list-style: none;
    width: fit-content;
    padding: 10px;
}

li {
    display: inline-block;
    margin: 50px;
}

ul a {
    text-decoration: none;
    font-size: 25px;
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
Welcome to the BMI Calculator
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<ul>
    <li><a href="bmi">Calculate BMI</a></li>
    <li><a href="history">View Previous BMIs</a></li>
    <li><a href="predict">Project Future BMI</a></li>
</ul>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/e15/p3/resources/views/welcome.blade.php ENDPATH**/ ?>