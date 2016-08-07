<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ActivitySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="activity-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Activity_Id') ?>

    <?= $form->field($model, 'Student_Index') ?>

    <?= $form->field($model, 'Type_Id') ?>

    <?= $form->field($model, 'Position_Id') ?>

    <?= $form->field($model, 'Activity_Name') ?>

    <?php // echo $form->field($model, 'Activity_Time') ?>

    <?php // echo $form->field($model, 'Activity_Year') ?>

    <?php // echo $form->field($model, 'str1') ?>

    <?php // echo $form->field($model, 'str2') ?>

    <?php // echo $form->field($model, 'str3') ?>

    <?php // echo $form->field($model, 'str4') ?>

    <?php // echo $form->field($model, 'str5') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
