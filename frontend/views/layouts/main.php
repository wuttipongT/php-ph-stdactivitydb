<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\ArrayHelper;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" style="height: 100%;">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/favicon.ico" type="image/x-icon" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body style="min-height: 100%;">

<?php $this->beginBody() ?>
   
<div class="wrap">
    <div id="fullPage" class="c"></div>
    <?php
    NavBar::begin([
       
        'brandLabel' => !Yii::$app->user->isGuest ? \kartik\helpers\Html::img(Yii::$app->getUrlManager()->getBaseUrl()."/frontend/web/images/TH-COLOR-TPtankhun.png",['style'=>'width: 60px; display:inline-block;margin-top: -14px; vertical-align: text-top']).' '.Yii::$app->name : '',//'My Company',
        'brandUrl' => !Yii::$app->user->isGuest ? Yii::$app->homeUrl : '',
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',//navbar-inverse
            
        ],
        
    ]);
    $menuItems = [
        //['label' => 'หน้าแรก', 'url' => ['/site/index']],
        //['label' => 'เกี่ยวกับไซต์', 'url' => ['/site/about']],
        //['label' => 'ติดต่อเรา', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        //$menuItems[] = ['label' => 'สมัครสมาชิก', 'url' => ['/site/showmodal']];
        //$menuItems[] = ['label' => 'เข้าสู่ระบบ', 'url' => ['/site/login']];
		$menuItems = [
                        
			//['label' => 'Sign in', 'url' => ['/user/security/login']] ,
                        ['label' => 'หน้าแรก', 'url' => ['/site/index']],
			['label' => 'สมัครสมาชิก', 'url' => ['/site/register']],
                        //['label' => 'สมัครสมาชิก', 'url' => ['/user/registration/register'], 'visible' => Yii::$app->user->isGuest],
                        ['label' => 'สำหรับเจ้าหน้าที่', 'url' => ['/backend'], 'visible' => Yii::$app->user->isGuest]
		];
		
    } else {
        $menuItems[] = [
            'label' => '<span class="glyphicon glyphicon-file"></span> ฟอร์มข้อมูลนิสิต',
            'url' => ['/info/index'],
           // 'linkOptions' => ['data-method' => 'post']
        ];
        $menuItems[] = [
            'label' => '<span class="glyphicon glyphicon-user"></span> บัญชี (' . Yii::$app->user->identity->username . ')', 'items'=>[
				['label' => 'โปรไฟล์', 'url' => ['/user/settings/profile']],
				['label' => 'บัญชี', 'url' => ['/user/settings/account']],
				['label' => 'ออกจากระบบ', 'url' => ['/user/security/logout'],'linkOptions' => ['data-method' => 'post']],
			]
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels' => false,
        'items' => $menuItems,
    ]);
    NavBar::end();
   // $images=['<img src="'.Yii::$app->getUrlManager()->getBaseUrl().'/frontend/web/images/phoca_thumb_l_img_5568.jpg"/>','<img src="'.Yii::$app->getUrlManager()->getBaseUrl().'/frontend/web/images/phoca_thumb_l_img_7670.jpg"/>']; 
    ?>
<?php //echo yii\bootstrap\Carousel::widget(['items'=>$images,'controls'=>FALSE,'showIndicators'=>FALSE,'options'=>['id'=>'slideshow-carousel-1','class'=>'slide carousel-fade','data-ride'=>'carousel','data-interval'=>'9000','style'=>'position:static;' ]]);?>
    <div class="container">
        <?php if(Yii::$app->session->hasFlash('alert')):?>
    <?= \yii\bootstrap\Alert::widget([
    'body'=>ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'body'),
    'options'=>ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'options'),
    ])?>
<?php endif; ?>
        
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Yii::$app->name;?> <?= date('Y') ." คณะเภสัชศาสตร์ มหาวิทยาลัยมหาสารคาม"; ?></p>

        <p class="pull-right"><?php Yii::powered() ?></p>
    </div>
</footer>
<?php 
if (class_exists('yii\debug\Module')) {
    $this->off(\yii\web\View::EVENT_END_BODY, [\yii\debug\Module::getInstance(), 'renderToolbar']);
}
?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>


<style>
    .carousel .item {
        width: 100%; /*slider width*/
        max-height: 600px; /*slider height*/
    }
    .carousel .item img {
        width: 100%; /*img width*/
    }
    /*full width container*/
    @media (max-width: 767px) {
        .block {
            margin-left: -20px;
            margin-right: -20px;
        }
    }
    /*
    inspired from http://codepen.io/Rowno/pen/Afykb 
    http://stackoverflow.com/questions/26770055/bootstrap-carousel-fade-no-longer-working-with-maxcdn-3-3-bootstrap-min-css
    */
    .carousel-fade .carousel-inner .item {
        opacity: 0;
        transition-property: opacity;
        transition-duration: 4s;
        transition-timing-function:linear;
    }

    .carousel-fade .carousel-inner .active {
        opacity: 1;
    }

    .carousel-fade .carousel-inner .active.left,
    .carousel-fade .carousel-inner .active.right {
        left: 0;
        opacity: 0;
        z-index: 1;
    }

    .carousel-fade .carousel-inner .next.left,
    .carousel-fade .carousel-inner .prev.right {
        opacity: 1;
    }

    .carousel-fade .carousel-control {
        z-index: 2;
    }

    /*
    WHAT IS NEW IN 3.3: "Added transforms to improve carousel performance in modern browsers."
    now override the 3.3 new styles for modern browsers & apply opacity
    */
    @media all and (transform-3d), (-webkit-transform-3d) {
        .carousel-fade .carousel-inner > .item.next,
        .carousel-fade .carousel-inner > .item.active.right {
            opacity: 0;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
        .carousel-fade .carousel-inner > .item.prev,
        .carousel-fade .carousel-inner > .item.active.left {
            opacity: 0;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
        .carousel-fade .carousel-inner > .item.next.left,
        .carousel-fade .carousel-inner > .item.prev.right,
        .carousel-fade .carousel-inner > .item.active {
            opacity: 1;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
    }
            body{
   height: 100%;
    width: 100%;
    margin: 0;
    padding: 0;
    position: relative;
    background-image: url(http://www.fleeceitout.com/images/field.2.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: 0 0;
    background-attachment: fixed;
}
#fullPage {
    position: absolute;
    min-width: 100%;
    min-height: 100vh;
    top: 0;
    left: 0;
    z-index: -1;
    height: 100vh;
   
}
.c{
    background-color: rgb(000,000,000) !important;
    transition-property: background-color;
        transition-duration: .5s;
        transition-timing-function:ease, ease-out, linear;
}
.c2{
    background-color:transparent !important;
    transition-property: background-color;
        transition-duration: .5s;
        transition-timing-function:ease, ease-out, linear;
}
</style>
<script>

$(document).ready(function () {
    var img_array = ['phoca_thumb_l_img_5568','phoca_thumb_l_img_7670'],
        newIndex = 0,
        index = 0,
        interval = 9000;
       
                //.css({"background-color":"rgb(255,255,255)"});
    (function changeBg() {

        //  --------------------------
        //  For random image rotation:
        //  --------------------------

            //  newIndex = Math.floor(Math.random() * 10) % img_array.length;
            //  index = (newIndex === index) ? newIndex -1 : newIndex;

        //  ------------------------------
        //  For sequential image rotation:
        //  ------------------------------

            index = (index + 1) % img_array.length;

        $('body').css('backgroundImage', function () {
             $('#fullPage').removeClass('c').addClass('c2');
        setTimeout(function () {
                    $('#fullPage').removeClass('c2').addClass('c');
                }, 8700);
            return 'url(<?php echo Yii::$app->getUrlManager()->getBaseUrl();?>/frontend/web/images/' + img_array[index] + '.jpg)';
        });
        setTimeout(changeBg, interval);
    })();
});
</script>
