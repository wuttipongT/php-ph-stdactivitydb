<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblStudent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-student-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'User_Index')->textInput() ?>

    <?= $form->field($model, 'Student_Id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Student_Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Student_LastName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Image_Path')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Address1')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Address2')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Phone1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Phone2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Name_Father')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Name_Mother')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Name_Parent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Phone_Parent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Work_Address_Parent')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Advisors_Id')->textInput() ?>

    <?= $form->field($model, 'Congenital_Disease')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Be_Allergic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Food_Allergy')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Buddy')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Buddy_Phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Hobby')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Ambition')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Sport')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Genius')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ROTCS')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'Clement_Military')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'str')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
