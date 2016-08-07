<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MsAdvisors */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ms-advisors-form panel panel-default">
<div class="panel-heading"><?=$title?></div>
    <div class="panel-body">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Advisors_Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Status')->dropDownList([ '0'=>'ใช้งาน', '1'=>'ไม่ใช้งาน', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
</div>
