<!doctype html>
<html lang='en'>

<head>
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta charset='utf-8'>
    <style>
    body {
        font-size: 20px;
        font-family: Arial, Helvetica, sans-serif;
    }

    h1,
    h2,
    footer,
    .results {
        text-align: center;
    }

    footer {
        margin-top: 75px;
    }

    a {
        text-decoration: none;
    }

    form {
        margin: auto;
        display: table;
        border-collapse: separate;
        border-spacing: 55px;
    }

    input[type=number],
    input[type=text] {
        font-size: 18px;
    }

    .row {
        display: table-row;
    }

    .cell {
        display: table-cell;
        padding: 5px;
    }

    button {
        color: white;
        width: 200px;
        height: 60px;
        font-size: 20px;
    }

    span.error {
        color: red;
    }

    .greeting {
        font-size: 17px;
        font-style: italic;
    }

    .logout {
        display: inline;
        font-size: 17px;
    }
    </style>

    <?php echo $__env->yieldContent('head'); ?>
</head>

<body>

    <header>
        <?php echo $__env->yieldContent('greeting'); ?>
        <h1>
            <?php echo $__env->yieldContent('heading'); ?>
        </h1>
    </header>

    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <footer>
        <div>
            &copy; 2023 Scott Ferguson
        </div>
    </footer>

</body>

</html><?php /**PATH /var/www/e15/p3/resources/views/layouts/main.blade.php ENDPATH**/ ?>