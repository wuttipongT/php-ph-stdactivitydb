<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Transcript */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transcript-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Student_Index')->textInput() ?>

    <?= $form->field($model, 'Grade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'GPA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Academic_Year')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
