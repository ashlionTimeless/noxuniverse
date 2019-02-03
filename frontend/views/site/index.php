<?php

/* @var $this yii\web\View */

$this->title = 'Nox Universe';
?>
<div class="big">
    <header class="header">
        <div class="stars1 rellax parallax" data-rellax-speed="-7"></div>
        <div class="stars2"></div>
        <div class="header-top"></div>
        <div class="header-bot"></div>
        <div class="container">
            <div class="hero">
                <a href="/" class="hero__logo">
                    <img src="img/header/logo.png" alt="Nox Universe, Ukraine">
                </a>
                <nav class="hero-nav header-nav_scroll">
                    <a href="" class="hero-nav__a" data-id="s2"><?=Yii::t('app','About')?></a>
                    <a href="/blog" class="hero-nav__a" data-id="s4"><?=Yii::t('app','Last News')?></a>
                    <a href="" class="hero-nav__a" data-id="s5"><?=Yii::t('app','Events')?></a>
                    <a href="" class="hero-nav__a" data-id="s6"><?=Yii::t('app','Our Team')?></a>
                    <a href="" class="hero-nav__a" data-id='s8'><?=Yii::t('app','Our Friends And Partners')?></a>

                    <a href="" class="hero-nav__a" data-id="s7"><?=Yii::t('app','Join The Team')?></a>
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
                            <a href='/site/change-lang?lang=en-EN' class="hero-nav-lang__option">
                                <img src="img/header/eng.png" alt="Nox Universe, Ukraine" class="hero-nav-lang__icon">
                                <span style="color:gray" class="hero-nav-lang__text">English</span>
                            </a>
                            <a href='/site/change-lang?lang=ua-UA' class="hero-nav-lang__option">
                                <img src="img/header/urk.png" alt="Nox Universe, Ukraine" class="hero-nav-lang__icon">
                                <span class="hero-nav-lang__text">Українська</span>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
<!--    <div class="header-scroll-down">-->
<!--        <img class="header-scroll-icon" src="img/gear.png">-->
<!--        <span class="header-scroll-text">scroll down</span>-->
<!--    </div>-->
    <section class="s2" id="s2">
        <h2 class="s2__h2 h2"><?=Yii::t('app','What is Nox?')?></h2>
        <p class="s2__p">
            <?=Yii::t('app','What is Nox Desc')?>
        </p>
<!--    </section>-->
<!--    <section class="s3" id="s3">-->
        <img class="space-dust rellax parallax" src="img/space-dust.png" data-rellax-speed="-7">
<!--        <h2 class="h2 s3__h2">--><?//=Yii::t('app','What are we doing?');?><!--</h2>-->
        <div class="s3__wrap">
            <div class="s3__item">
                <div class="s3__icon">
                    <img src="img/s3/1.png" alt="nox universe">
                </div>
                <h3 class="s3__h3 h3">
                    <?=Yii::t('app','Rocket Science')?>
                </h3>
                <img src="img/gear.png" alt="nox universe" class="s3__gear">
                <p class="s3__p">
                    <?=Yii::t('app','Rocket Science Description')?>
                </p>
            </div>
            <div class="s3__item">
                <div class="s3__icon">
                    <img src="img/s3/2.png" alt="nox universe">
                </div>
                <h3 class="s3__h3 h3">
                    <?=Yii::t('app','Networking')?>
                </h3>
                <img src="img/gear.png" alt="nox universe" class="s3__gear">
                <p class="s3__p">
                    <?=Yii::t('app','Networking Description')?>
                </p>
            </div>
            <div class="s3__item">
                <div class="s3__icon">
                    <img src="img/s3/3.png" alt="nox universe">
                </div>
                <h3 class="s3__h3 h3">
                    <?=Yii::t('app','Annual camp')?>
                </h3>
                <img src="img/gear.png" alt="nox universe" class="s3__gear">
                <p class="s3__p">
                    <?=Yii::t('app','Annual camp Description')?>
                </p>
            </div>
            <div class="s3__item">
                <div class="s3__icon">
                    <img src="img/s3/4.png" alt="nox universe">
                </div>
                <h3 class="s3__h3 h3">
                    <?=Yii::t('app','Research and Knowledge')?>
                </h3>
                <img src="img/gear.png" alt="nox universe" class="s3__gear">
                <p class="s3__p">
                    <?=Yii::t('app','Research and Knowledge Description')?>
                </p>
            </div>
        </div>
        <div class="s3__wrap">
            <div class="s3__item">
                <div class="s3__icon">
                    <img src="img/s3/5.png" alt="nox universe">
                </div>
                <h3 class="s3__h3 h3">
                    <?=Yii::t('app','International connections')?>
                </h3>
                <img src="img/gear.png" alt="nox universe" class="s3__gear">
                <p class="s3__p">
                    <?=Yii::t('app','International connections Description')?>
                </p>
            </div>
            <div class="s3__item">
                <div class="s3__icon">
                    <img src="img/s3/6.png" alt="nox universe">
                </div>
                <h3 class="s3__h3 h3">
                    <?=Yii::t('app','Creative atmosphere')?>
                </h3>
                <img src="img/gear.png" alt="nox universe" class="s3__gear">
                <p class="s3__p">
                    <?=Yii::t('app','Creative atmosphere Description')?>
                </p>
            </div>
            <div class="s3__item">
                <div class="s3__icon">
                    <img src="img/s3/7.png" alt="nox universe">
                </div>
                <h3 class="s3__h3 h3">
                    <?=Yii::t('app','Astronomical club')?>
                </h3>
                <img src="img/gear.png" alt="nox universe" class="s3__gear">
                <p class="s3__p">
                    <?=Yii::t('app','Astronomical club Description')?>
                </p>
            </div>
<!--            <div class="s3__item">-->
<!--                <div class="s3__icon">-->
<!--                    <img src="img/s3/8.png" alt="nox universe">-->
<!--                </div>-->
<!--            </div>-->
        </div>
    </section>
    <section class="s4" id="s4">
        <a href="/blog"><h2 class="h2 s4__h2"><?=Yii::t('app','Last News')?></h2></a>
            <div class="s4__wrap">
                <div class="s4__img" style='background-image: url(img/s4/1.png)'>
                    <div class="s4__arrow">
                        <img src="img/chevron.png" alt="">
                    </div>
                </div>
                <div class="s4__info">
                    <a href="/post"><h3 class="h3 s4__h3">Coming soon...</h3></a>
<!--                    <span class="s4__span">Mar 6, 2018</span>-->
<!--                    <p class="s4__p">-->
<!--                        Though it might be tempting to view it as “just an interim technology”, handheld Augmented Reality is actually here to stay. Raphaël de Courville in NEEEU-->
<!--                    </p>-->
                    <!--                <a href="/post" class="s4__a">-->
                    <!--                    Read more <img src="img/chevron.png" alt="">-->
                    <!--                </a>-->
                    <div class="s4__arrow s4__arrow_rotate">
                        <img src="img/chevron.png" alt="">
                    </div>
                </div>
                <div class="s4__img" style='background-image: url(img/s4/2.png)'>
                    <div class="s4__arrow">
                        <img src="img/chevron.png" alt="">
                    </div>
                </div>
            </div>
            <div class="s4__wrap">
                <div class="s4__info">
                    <a href="/post"><h3 class="h3 s4__h3">Coming soon...</h3></a>
<!--                    <span class="s4__span">Mar 6, 2018</span>-->
<!--                    <p class="s4__p">-->
<!--                        Though it might be tempting to view it as “just an interim technology”, handheld Augmented Reality is actually here to stay. Raphaël de Courville in NEEEU-->
<!--                    </p>-->
                    <!--                <a href="/post" class="s4__a">-->
                    <!--                    Read more <img src="img/chevron.png" alt="">-->
                    <!--                </a>-->
                </div>
                <div class="s4__img" style='background-image: url(img/s4/3.png)'>
                </div>
                <div class="s4__info">
                    <a href="/post"><h3 class="h3 s4__h3">Coming soon...</h3></a>
<!--                    <span class="s4__span">Mar 6, 2018</span>-->
<!--                    <p class="s4__p">-->
<!--                        Though it might be tempting to view it as “just an interim technology”, handheld Augmented Reality is actually here to stay. Raphaël de Courville in NEEEU-->
<!--                    </p>-->
                    <!--                <a href="/post" class="s4__a">-->
                    <!--                    Read more <img src="img/chevron.png" alt="">-->
                    <!--                </a>-->
                </div>
            </div>
    </section>
    <section class="s5" id="s5">
        <h2 class="h2 s5__h2"><?=Yii::t('app','Events')?></h2>
        <div class="s5__slider slider owl-carousel owl-theme">
            <?php for($i=0;$i<min([count($events),7]);$i++){?>
                <div class="s5__item slider-item">
                    <span class="slider__span">
                    <?=$events[$i]->getDateSpan('date')?>
                </span>
<!--                    <a href="https://www.facebook.com/NoxUniverse/?ref=aymt_homepage_panel">-->
                        <a href="/event?id=<?=$events[$i]->id?>">
                        <h3 class="slider__descr hero-nav__a">
                            <?=$events[$i]->getName()?>
                        </h3>
                    </a>
                    <img src="<?=$events[$i]->getMainPhoto()?>" alt="" class="slider__icon">
<!--                    <p class="slider__p">-->
<!--                        --><?//=$events[$i]->getShortDescription()?>
<!--                    </p>-->
<!--                    <a href="/event?id=--><?//=$events[$i]->id?><!--" class="slider-a">-->
<!--                        <span>Read more</span>-->
<!--                        <img class='slider-a__chevron' src="img/chevron.png" alt="">-->
<!--                    </a>-->
                </div>
            <?php } ?>
        </div>
    </section>
    <img src="img/s5/dark.png" alt="" class="background__s5-dark">
    <img src="img/s5/nebula.png" alt="" class="background__s5-nebula">
    <img src="img/s5/stars1.png" alt="" class="background__s5-stars1">
    <section class="s6" id="s6">
        <h2 class="h2 s6__h2">
            <?=Yii::t('app','Our Team')?>
        </h2>
        <div class="s6-slider1 owl-carousel owl-theme">
            <?php foreach($team as $teammate){?>
            <div class="s6-slider1__img" style='background-image: url(<?=$teammate->photos[0]->getThumbFileUrl('file', 'thumb');?>)'></div>
            <?php } ?>
        </div>
        <div class="s6-slider2 owl-carousel owl-theme">
            <?php foreach($team as $teammate){?>
                <?php
//                die(Yii::getAlias('@static'));
                //die($teammate->photos[0]->getThumbFileUrl('file', 'thumb'));?>
            <div class="s6-slider2__item">
                <div class="s6-slider2__img" style='background-image: url(<?=$teammate->photos[0]->getThumbFileUrl('file', 'thumb')?>)'>
                </div>
                <div class="s6-slider2__wrap">
                    <h2 class="h2 s6-slider2__h2">
                        <?=$teammate->name_ua?>
                    </h2>
                    <span class="span s6-slider2__span">
                        <?=$teammate->title_ua?>
                    </span>
                    <p class="span s6-slider2__p">
                        <?=$teammate->bio_ua?>
                    </p>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>

    <!-- <img src="img/s5/dark.png" alt="" class="background__s5-dark"> -->
<!--    <img src="img/s5/nebula.png" alt="" class="background__s8-nebula">-->
    <!-- <img src="img/s5/stars1.png" alt="" class="background__s5-stars1">-->
    <section class="s8" id="s8">
        <h2 class="h2 s8__h2"><?=Yii::t('app','Our Friends And Partners')?></h2>
        <div class="s8__wrap">
        <?php
        foreach($partners as $partner)
        {
         ?>
                <div class="s8__item">
                    <a class="partner_link" href="<?=$partner->url?>"><img class="partner_logo" src="<?=$partner->photos[0]->getImageFileUrl('file', 'thumb')?>" alt="<?=$partner->name_en?>"></a>

<!--                    <h3 class="s3__h3 h3">-->
<!--                        --><?php //$partner->name_en?>
<!--                    </h3>-->
                </div>
            <?php
        }
        ?>
        </div>

    </section>

    <section class="s7" id="s7">
        <h2 class="h2 s7__h2">
            <?=Yii::t('app','Join The Team')?>
        </h2>
        <p class="p s7__p">
            <?=Yii::t('app','Join The Team Description')?>

        </p>
        <style>
            .form-group
            {
                width:100%;
            }
            </style>
        <?php $form=\yii\widgets\ActiveForm::begin(['options'=>['class'=>'form']])?>
        <?= $form->field($model, 'name')->textInput(['placeholder'=>Yii::t('app','Your name'),'class'=>'input form__input'])->label(false) ?>
        <?= $form->field($model, 'email')->textInput(['placeholder'=>Yii::t('app','Email address'),'class'=>'input form__input'])->label(false) ?>
        <?= $form->field($model, 'phone')->textInput(['placeholder'=>Yii::t('app','Phone number'),'class'=>'input form__input'])->label(false) ?>
        <?= $form->field($model, 'location')->textInput(['placeholder'=>Yii::t('app','Location'),'class'=>'input form__input'])->label(false) ?>
        <?= $form->field($model, 'social_media')->textInput(['placeholder'=>Yii::t('app','Social media'),'class'=>'input form__input'])->label(false) ?>
        <?= \yii\helpers\Html::submitButton(Yii::t('app','Send'), ['class' => 'button form__button']) ?>

        <?php \yii\widgets\ActiveForm::end(); ?>
    </section>

    <div class="parallax-container">
        <img src="img/s5/stars2.png" class="background__s5-stars2 rellax parallax" data-rellax-speed="-6">
    </div>
</div>
