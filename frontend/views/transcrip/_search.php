<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TranscriptSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transcript-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Transcript_Index') ?>

    <?= $form->field($model, 'Student_Index') ?>

    <?= $form->field($model, 'Grade') ?>

    <?= $form->field($model, 'GPA') ?>

    <?= $form->field($model, 'Academic_Year') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
