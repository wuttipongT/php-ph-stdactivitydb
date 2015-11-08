<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="body-content">

        <div class="row">
            <div class="col-lg-8">
                <h2>ยินดีต้อนรับ</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p class="text-right" style="padding-right: 10px;"><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>

            </div>
            <div class="col-lg-4 border-left">
                <div class="site-login">
                    <br/>

                    <p>กรุณากรอกข้อมูลต่อไปนี้เพื่อเข้าสู่ระบบ:</p>


                    <div class="col-lg-10">
                        <?php
                        $form = ActiveForm::begin([
                                    'id' => 'login-form',
                                    'action' => Yii::$app->urlManager->createUrl(['/site/login']),
                                    'options' => ['class' => 'edit_form'],
                                    'enableAjaxValidation' => false,
                                    'enableClientValidation' => true,
                        ]);
                        ?>

                        <?= $form->field($model, 'username') ?>

                        <?= $form->field($model, 'password')->passwordInput() ?>

                        <?= $form->field($model, 'rememberMe')->checkbox() ?>

                        <div style="color:#999;margin:1em 0">
                            If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                        </div>

                        <div class="form-group">
                            <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>
<?php
Modal::begin(['id' => 'modal',
    'header' => '<h4>สมัครสมาชิก</h4>']);
?>
<div class="row">
    <div class="col-lg-12">
        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

        <?= $form->field($model2, 'username') ?>

        <?= $form->field($model2, 'email') ?>

        <?= $form->field($model2, 'password')->passwordInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
<?php
Modal::end();
?>
