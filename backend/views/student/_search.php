<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblStudentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-student-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Student_Index') ?>

    <?= $form->field($model, 'User_Index') ?>

    <?= $form->field($model, 'Student_Id') ?>

    <?= $form->field($model, 'Student_Name') ?>

    <?= $form->field($model, 'Student_LastName') ?>

    <?php // echo $form->field($model, 'Image_Path') ?>

    <?php // echo $form->field($model, 'Address1') ?>

    <?php // echo $form->field($model, 'Address2') ?>

    <?php // echo $form->field($model, 'Phone1') ?>

    <?php // echo $form->field($model, 'Phone2') ?>

    <?php // echo $form->field($model, 'Name_Father') ?>

    <?php // echo $form->field($model, 'Name_Mother') ?>

    <?php // echo $form->field($model, 'Name_Parent') ?>

    <?php // echo $form->field($model, 'Phone_Parent') ?>

    <?php // echo $form->field($model, 'Work_Address_Parent') ?>

    <?php // echo $form->field($model, 'Advisors_Id') ?>

    <?php // echo $form->field($model, 'Congenital_Disease') ?>

    <?php // echo $form->field($model, 'Be_Allergic') ?>

    <?php // echo $form->field($model, 'Food_Allergy') ?>

    <?php // echo $form->field($model, 'Buddy') ?>

    <?php // echo $form->field($model, 'Buddy_Phone') ?>

    <?php // echo $form->field($model, 'Hobby') ?>

    <?php // echo $form->field($model, 'Ambition') ?>

    <?php // echo $form->field($model, 'Sport') ?>

    <?php // echo $form->field($model, 'Genius') ?>

    <?php // echo $form->field($model, 'ROTCS') ?>

    <?php // echo $form->field($model, 'Clement_Military') ?>

    <?php // echo $form->field($model, 'str') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
