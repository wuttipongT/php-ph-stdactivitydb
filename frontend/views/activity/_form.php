<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="activity-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Student_Index')->textInput() ?>

    <?= $form->field($model, 'Type_Id')->textInput() ?>

    <?= $form->field($model, 'Position_Id')->textInput() ?>

    <?= $form->field($model, 'Activity_Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Activity_Time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Activity_Year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'str1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'str2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'str3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'str4')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'str5')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
