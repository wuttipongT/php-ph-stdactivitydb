<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

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
])->textInput(['maxlength' => true, 'id' => 'txtStudent-Name', 'class' => 'form-control'])->label('ชื่อ', ['class' => 'col-sm-2 control-label'])
?>

<?=
$form->field($model, 'Student_LastName', [
    'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
])->textInput(['maxlength' => true, 'id' => 'txtStudent-Lastname', 'class' => 'form-control'])->label('นามสกุล', ['class' => 'col-sm-2 control-label'])
?>

<?=
$form->field($model, 'Student_Id', [
    'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
])->textInput(['maxlength' => true, 'id' => 'txtStudent-Id', 'class' => 'form-control'])->label('รหัสนิสิต', ['class' => 'col-sm-2 control-label'])
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

<?=
$form->field($model, 'Phone1', [
    'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
])->textInput(['maxlength' => true, 'id' => 'txtPhone1', 'class' => 'form-control'])->label('เบอร์มือถือ', ['class' => 'col-sm-2 control-label'])
?>

<?=
$form->field($model, 'Phone2', [
    'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
])->textInput(['maxlength' => true, 'id' => 'txtPhone2', 'class' => 'form-control'])->label('เบอร์บ้าน', ['class' => 'col-sm-2 control-label'])
?>

<?=
$form->field($model, 'Name_Father', [
    'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
])->textInput(['maxlength' => true, 'id' => 'txtName-Father', 'class' => 'form-control'])->label('ชื่อ-สกุลบิดา', ['class' => 'col-sm-2 control-label'])
?>

<?=
$form->field($model, 'Name_Mother', [
    'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
])->textInput(['maxlength' => true, 'id' => 'txtName-Mother', 'class' => 'form-control'])->label('ชื่อ-สกุลมารดา', ['class' => 'col-sm-2 control-label'])
?>

<?=
$form->field($model, 'Name_Parent', [
    'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
])->textInput(['maxlength' => true, 'id' => 'txtName-Parent', 'class' => 'form-control'])->label('ชื่อ-สกุลผู้ปกครอง', ['class' => 'col-sm-2 control-label'])
?>

<?=
$form->field($model, 'Phone_Parent', [
    'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
])->textInput(['maxlength' => true, 'id' => 'txtPhone-Parent', 'class' => 'form-control'])->label('เบอร์มือถือ-ผู้ปกครอง', ['class' => 'col-sm-2 control-label'])
?>

<?=
$form->field($model, 'Work_Address_Parent', [
    'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
])->textarea(['rows' => 6, 'id' => 'txtWork-Address-Parent', 'class' => 'form-control'])->label('ที่อยู่ที่ทำงานผู้ปกครอง', ['class' => 'col-sm-2 control-label'])
?>
<?php
?>
<?php $dataList = ArrayHelper::map($advisors::find(['Status' => '0'])->all(), 'Advisors_Id', 'Advisors_Name'); ?>
<?=
$form->field($model, 'Advisors_Id', [
    'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
])->dropDownList($dataList, ['rows' => 6, 'id' => 'txtAdvisors-Id', 'class' => 'form-control'])->label('ชื่ออาจารย์ที่ปรึกษา', ['class' => 'col-sm-2 control-label'])
?>

  <?=
  $form->field($model, 'Congenital_Disease', [
  'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
  ])->textInput(['maxlength' => true, 'id' => 'txtCongenital-Disease', 'class' => 'form-control'])->label('โรคประจำตัว', ['class' => 'col-sm-2 control-label'])
  ?>

  <?=
  $form->field($model, 'Be_Allergic', [
  'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
  ])->textInput(['maxlength' => true, 'id' => 'txtBe-Allergic', 'class' => 'form-control'])->label('แพ้ยา', ['class' => 'col-sm-2 control-label'])
  ?>

  <?=
  $form->field($model, 'Food_Allergy', [
  'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
  ])->textArea(['rows' => 6, 'id' => 'txtFood-Allergy', 'class' => 'form-control'])->label('แพ้อาหาร', ['class' => 'col-sm-2 control-label'])
  ?>

  <?=
  $form->field($model, 'Buddy', [
  'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
  ])->textInput(['maxlength' => true, 'id' => 'txtBuddy', 'class' => 'form-control'])->label('ชื่อเพื่อนสนิทในคณะ', ['class' => 'col-sm-2 control-label'])
  ?>
<?=
$form->field($model, 'Buddy_Phone', [
    'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
])->textInput(['maxlength' => true, 'id' => 'txtBuddy-Phone', 'class' => 'form-control'])->label('เบอร์มือถือเพื่อนสนิทในคณะ', ['class' => 'col-sm-2 control-label'])
?>

<?=
$form->field($model, 'Hobby', [
    'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
])->textInput(['maxlength' => true, 'id' => 'txtHobby', 'class' => 'form-control'])->label('งานอดิเรก', ['class' => 'col-sm-2 control-label'])
?>

<?=
$form->field($model, 'Ambition', [
    'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
])->textArea(['rows' => 6, 'id' => 'txtAmbition', 'class' => 'form-control'])->label('ความใฝ่ฝัน', ['class' => 'col-sm-2 control-label'])
?>

<?php
$list = [
    ['id' => '0', 'name' => 'ฟุตบอล'],
    ['id' => '1', 'name' => 'บาสเก็ตบอล'],
    ['id' => '2', 'name' => 'วอลเล่ย์บอล'],
    ['id' => '3', 'name' => 'แบดมินตัน'],
    ['id' => '4', 'name' => 'อื่นๆ'],
];

$optionsList = ArrayHelper::map($list, 'id', 'name');
?>
<?=
$form->field($model, 'Favorite_Sport', [
    'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
])->checkboxList($optionsList)->label('กีฬาที่ชอบ', ['class' => 'col-sm-2 control-label'])
?>

<?php
$list = [
    ['id' => '0', 'name' => 'ดนตรี'],
    ['id' => '1', 'name' => 'กีฬา'],
    ['id' => '2', 'name' => 'ภาษา'],
    ['id' => '3', 'name' => 'คอมพิวเตอร์'],
];

$optionsList = \yii\helpers\ArrayHelper::map($list, 'id', 'name');
?>
<?=
$form->field($model, 'Genius', [
    'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
])->checkboxList($optionsList)->label('ความสามารถพิเศษ', ['class' => 'col-sm-2 control-label'])
?>
<?php
$list = [
    ['id' => '0', 'name' => 'เรียน'],
    ['id' => '1', 'name' => 'ยังไม่เรียน'],
];

$optionsList = \yii\helpers\ArrayHelper::map($list, 'id', 'name');
?>

<?=
$form->field($model, 'ROTCS', [
    'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
])->dropDownList($optionsList, ['rows' => 6, 'id' => 'txtROTCS', 'class' => 'form-control'])->label('ผ่านการเรียนรด.แล้ว (สำหรับผู้ชาย)', ['class' => 'col-sm-2 control-label'])
?>

<?=
$form->field($model, 'Clement_Military', [
    'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
])->textInput(['maxlength' => true, 'id' => 'txtClement-Military', 'class' => 'form-control'])->label('ผ่านการเรียนรด. แล้ว (สำหรับผู้ชาย)', ['class' => 'col-sm-2 control-label'])
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
<div class="row">
    <div class="col-sm-12" style="text-align: right;">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary','name'=>'create-std','onclick'=>'return fnc_create(event);']) ?>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>