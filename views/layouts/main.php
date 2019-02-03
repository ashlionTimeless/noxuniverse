<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

//AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Для копирования в соц. сети-->
    <link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon">
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#000">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#000">
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="libs/owl-carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="libs/owl-carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-media.css">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

        <?= $content ?>
<footer class="footer">
    <div class="footer__container">
        <a href="" class="footer__logo">
            <img src="img/footer/logo.png" alt="">
        </a>
        <nav class="hero-nav hero-nav_footer header-nav_scroll">
            <a href="" class="hero-nav__a" data-id='s3'>About</a>
            <a href="/blog" class="hero-nav__a" data-id='s4'>Last News</a>
            <a href="" class="hero-nav__a" data-id='s5'>Events</a>
            <a href="" class="hero-nav__a" data-id='s6'>Our Team</a>
            <a href="" class="hero-nav__a" data-id='s7'>Join the team</a>
        </nav>
        <a href="mailto:example-mail@nox.com" class="footer__email">example-mail@nox.com</a>
        <a href="/" class="footer__social footer__social_first">
            <img src="img/footer/facebook.png" alt="nox universe facebook">
        </a>
        <a href="/" class="footer__social">
            <img src="img/footer/telegram.png" alt="nox universe telegram">
        </a>
    </div>
</footer>
<?php $this->endBody() ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- <script src="libs/jquery/jquery-3.2.1.min.js"></script> -->
<script src="libs/rellax-master/rellax.min.js"></script>
<script src="libs/owl-carousel/dist/owl.carousel.js"></script>
<script src="js/common.js"></script>
</body>
</html>
<?php $this->endPage() ?>
