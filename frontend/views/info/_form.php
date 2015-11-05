<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Info */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="info-form">

    <div class="row">
        <div class="col-lg-2">
            <div class="mn-left">
                <ul>
                    <li><a href="#">ข้อมูลพื้นฐาน</a></li>
                    <li><a href="">ข้อมูลกิจกรรม</a></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-10">
            <?php
            $form = ActiveForm::begin(
                            [
                                //'action' => '/login',
                                'options' => [
                                    'class' => 'form-horizontal'
                                ]
                            ]
            );
            ?>
           
            <?=
            $form->field($model, 'Student_Name', [
                'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
            ])->textInput(['maxlength' => true, 'id' => 'txtName', 'class' => 'form-control'])->label('ชื่อ', ['class' => 'col-sm-2 control-label'])
            ?>

            <?=
            $form->field($model, 'Student_LastName', [
                'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
            ])->textInput(['maxlength' => true, 'id' => 'txtLastname', 'class' => 'form-control'])->label('นามสกุล', ['class' => 'col-sm-2 control-label'])
            ?>

            <?=
            $form->field($model, 'Student_Id', [
                'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
            ])->textInput(['maxlength' => true, 'id' => 'txtId', 'class' => 'form-control'])->label('รหัสนิสิต', ['class' => 'col-sm-2 control-label'])
            ?>

            <?=
            $form->field($model, 'Address1', [
                'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
            ])->textarea(['rows' => 6, 'id' => 'txtAddress1', 'class' => 'form-control'])->label('ที่อยู่ (บ้าน)', ['class' => 'col-sm-2 control-label'])
            ?>
            
            <?=
            $form->field($model, 'Address2', [
                'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
            ])->textarea(['rows' => 6, 'id' => 'txtAddress1', 'class' => 'form-control'])->label('ที่อยู่ (หอพัก)', ['class' => 'col-sm-2 control-label'])
            ?>
            
            
            
            
            
            <!--
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember me
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Sign in</button>
                    </div>
                </div>
            </form>
            For example we have 3 models:

    common\models\User
    backend\models\User - extended from common\models\User
    frontend\models\User - extended from common\models\User
            -->
            
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>


    <!--
    <?php /*?>
    <?= $form->field($model, 'Image_Path')->textarea(['rows' => 6]) ?>

    

    <?= $form->field($model, 'Address2')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Phone1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Phone2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Name_Father')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Name_Mother')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Name_Parent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Phone_Parent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Work_Address_Parent')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Advisors_Id')->textInput() ?>

    <?= $form->field($model, 'Buddy_Phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Hobby')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Ambition')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Favorite_Sport')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Genius')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ROTCS')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'Clement_Military')->textInput() ?>

    <?= $form->field($model, 'Award')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    