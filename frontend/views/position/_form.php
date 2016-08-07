<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Position */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="position-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Student_Index')->textInput() ?>

    <?= $form->field($model, 'Club_Id')->textInput() ?>

    <?= $form->field($model, 'Description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Position_Year')->textInput(['maxlength' => true]) ?>

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
