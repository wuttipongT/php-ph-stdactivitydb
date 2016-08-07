<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Scholarship */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="scholarship-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Student_Index')->textInput() ?>

    <?= $form->field($model, 'Scholarship_DESC')->textInput() ?>

    <?= $form->field($model, 'Scholarship_Year')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
