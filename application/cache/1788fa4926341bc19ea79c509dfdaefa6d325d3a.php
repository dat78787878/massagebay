<!DOCTYPE html>
<html itemscope="" itemtype="http://schema.org/WebPage" lang="vi">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php echo CMS_TITLE(isset($dataitem)?$dataitem:NULL,isset($masteritem)?$masteritem:NULL,isset($datatable)?$datatable:NULL); ?>
    <?php echo isset($_meta_noindex) ? $_meta_noindex : ''; ?>


    <link rel="stylesheet" href="theme/frontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="theme/frontend/css/swiper-bundle.css">
    <link rel="stylesheet" href="theme/frontend/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="theme/frontend/fonts/fontawesome-free-5.15.3-web/css/all.min.css">

    <?php echo $__env->yieldContent('css'); ?>
    <style>
        .introduce ul>li>a {
            font-weight: bolder;
        }

        .introduce ul ul>li>a {
            font-weight: 400;
        }

        .introduce ul ul>li>a::before {
            padding-right: 6px;
            font-size: 6px;
        }
    </style>
</head>

<body class="scrollstyle1">

    <?php echo $__env->make('header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <script src="theme/frontend/js/jquery-3.5.1.slim.min.js"></script>
    <script src="theme/frontend/js/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="theme/frontend/js/swiper-bundle.js"></script>
    <script src="theme/frontend/js/swiper-bundle.min.js"></script>
    <script src="theme/frontend/js/bootstrap.bundle.min.js"></script>
    <script src="theme/frontend/js/messagebay.js"></script>
    <script src="theme/frontend/js/search.js"></script>
    <?php echo $__env->yieldContent('js'); ?>
</body>

</html>