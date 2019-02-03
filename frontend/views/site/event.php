<?php

/* @var $this yii\web\View */

$this->title = $event->getName();
?>
<header class="header header_post">
    <div class="container">
        <div class="hero">
            <a href="/" class="hero__logo">
                <img src="img/header/logo.png" alt="Nox Universe, Ukraine">
            </a>
            <nav class="hero-nav">
                <a href="/#s3" class="hero-nav__a" data-id="s3"><?=Yii::t('app','About')?></a>
                <a href="/blog" class="hero-nav__a" data-id="s4"><?=Yii::t('app','Last News')?></a>
                <a href="/#s5" class="hero-nav__a" data-id="s5"><?=Yii::t('app','Events')?></a>
                <a href="/#s6" class="hero-nav__a" data-id="s6"><?=Yii::t('app','Our Team')?></a>
                <a href="/#s7" class="hero-nav__a" data-id="s7"><?=Yii::t('app','Join The Team')?></a>
                <div class="hero-nav__search">
                    <img src="img/header/search.png" alt="Nox Universe, Ukraine" class="hero-nav__icon_search">
                    <input type="text" class="input hero-nav__input">
                    <img src="img/close.png" alt="" class="hero-nav__close">
                </div>
                <div class="hero-nav-lang">
                    <div class="hero-nav-lang__current">
                        <img src="img/header/urk.png" alt="Nox Universe, Ukraine" class="hero-nav-lang__icon">
                    </div>
                    <div class="hero-nav-lang__select">
                        <a href='/' class="hero-nav-lang__option">
                            <img src="img/header/urk.png" alt="Nox Universe, Ukraine" class="hero-nav-lang__icon">
                            <span class="hero-nav-lang__text">Українська</span>
                        </a>
                        <a href='/' class="hero-nav-lang__option">
                            <img src="img/header/eng.png" alt="Nox Universe, Ukraine" class="hero-nav-lang__icon">
                            <span class="hero-nav-lang__text">English</span>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
<main class="main main__post">
    <img src="img/post-star1.png" alt="" class="main__star1 rellax parallax" data-rellax-speed="-6">
    <img src="img/post-star2.png" alt="" class="main__star2 rellax parallax" data-rellax-speed="-9">
    <div class="post">
        <img src="<?=$event->getMainPhoto()?>" alt="" class="post__img">
        <div class="post__text">
<!--            <div class="s4__arrow">-->
<!--                <img src="img/chevron.png">-->
<!--            </div>-->
            <span class="main__span"><?=$event->getDateSpan()?></span>
            <h3 class="h3 s4__h3"><?=$event->getName()?></h3>
            <img src="img/gear.png" alt="" class="main__img">
            <p class="post__p">
                <?=$event->getDescription()?>
            </p>
            <br>
            <div class="paggination">

                <a <?php if($prev=$event->getPrev()){
                    ?>
                    href="/event?id=<?=$prev->id?>"
                <?php
                }else{ ?>
                    href="/" style="visibility: hidden";
                <?php } ?> class="paggination__a paggination__a_prev">
                    <img src="img/chevron.png" alt="">
                    <?=Yii::t('app','Back')?>

                </a>
                <img src="img/h2-icon.png" alt="" class="paggination__img">
                <a <?php if($next=$event->getNext()){
                    ?>
                    href="/event?id=<?=$next->id?>"
                    <?php
                }else{ ?>
                    href="/" style="visibility: hidden";
                <?php } ?> class="paggination__a paggination__a_next">
                    <?=Yii::t('app','Next')?>
                    <img src="img/chevron.png" alt="">
                </a>
            </div>
        </div>
    </div>
</main>