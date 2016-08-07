<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
///frontend/web/images/phoca_thumb_l_img_5568.jpg
$this->title = Yii::$app->name;
?>

<div class="site-index">
    <div class="body-content">

        <div class="row">
            <div class="col-lg-8">
                <img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl() ?>/frontend/web/images/TH-COLOR-TPtankhun.png" alt="" style="width: 200px;margin-left: 100px;"/>
                <h1 style="color:#fff; " class="otto">ระบบฐานข้อมูลกิจกรรมนิสิต</h1>
                <h3 style="color:#fff; " class="otto">คณะเภสัชศาสตร์ มหาวิทยาลัยมหาสารคาม</h3>
            </div>

            <div class="col-lg-4">
                <?php if (Yii::$app->user->isGuest): ?>
                <div class="site-login">
                    <br/>
                    <div class="col-lg-10 panel panel-default panel-body">

                        

                            <?php
                            $form = ActiveForm::begin([
                                        'id' => 'login-widget-form',
                                        'fieldConfig' => [
                                            'template' => "{input}\n{error}",
                                        ],
                                        'action' => $action,
                                    ])
                            ?>

                            <?= $form->field($model, 'login')->textInput(['placeholder' => 'Login']) ?>

                            <?= $form->field($model, 'password', ['inputOptions' => ['class' => 'form-control', 'tabindex' => '2']])->passwordInput()->label(Yii::t('user', 'Password')) ?>

                            <?= $form->field($model, 'rememberMe')->checkbox() ?>
<?=Html::a(Yii::t('user', 'ลืมรหัสผ่าน?'), ['/user/recovery/request'], ['tabindex' => '5'])?>
                            <?= Html::submitButton(Yii::t('user', 'Sign in'), ['class' => 'btn btn-primary btn-block']) ?>

                            <?php ActiveForm::end(); ?>

                     

                            <?php // Html::a(Yii::t('user', 'Logout'), ['/user/security/logout'], ['class' => 'btn btn-danger btn-block', 'data-method' => 'post']) ?>

                        
                    </div>

                </div>
<?php endif ?>
            </div>
        </div>

    </div>
</div>
<?php
Modal::begin(['id' => 'modal',
    //'header' => '<h4>สมัครสมาชิก</h4>'
    ]
    );
?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode('สมัครสมาชิก') ?></h3>
            </div>
            <div class="panel-body">
                <?php $form = ActiveForm::begin([
                    'id'                     => 'registration-form',
                    'enableAjaxValidation'   => true,
                    'enableClientValidation' => false,
                    'action' => Yii::$app->urlManager->createUrl(['/user/registration/register']),
                ]); ?>

                <?= $form->field($model2, 'email') ?>

                <?= $form->field($model2, 'username') ?>

                <?php //if ($module->enableGeneratingPassword == false): ?>
                    <?= $form->field($model2, 'password')->passwordInput() ?>
                <?php //endif ?>

                <?= Html::submitButton(Yii::t('user', 'Sign up'), ['class' => 'btn btn-success btn-block']) ?>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
 
<?php
Modal::end();
?>

<style>
    .otto {
        text-shadow: 0 1px 0 #ccc,
            0 2px 0 #c9c9c9,
            0 3px 0 #bbb,
            0 4px 0 #b9b9b9,
            0 5px 0 #aaa,
            0 6px 1px rgba(0,0,0,.1),
            0 0 5px rgba(0,0,0,.1),
            0 1px 3px rgba(0,0,0,.3),
            0 3px 5px rgba(0,0,0,.2),
            0 5px 10px rgba(0,0,0,.25),
            0 10px 10px rgba(0,0,0,.2),
            0 20px 20px rgba(0,0,0,.15);
    }
</style>
