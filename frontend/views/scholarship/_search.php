<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ScholarshipSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="scholarship-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Scholarship_Id') ?>

    <?= $form->field($model, 'Student_Index') ?>

    <?= $form->field($model, 'Scholarship_DESC') ?>

    <?= $form->field($model, 'Scholarship_Year') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
