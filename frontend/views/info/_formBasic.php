<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Info;
use kartik\date\DatePicker;
$form = ActiveForm::begin(
                [
                    //'action' => $model->isNewRecord ? 2 : 4Yii::$app->urlManager->createUrl(['/info/save1']),
                    'options' => [
                        'enctype'=>'multipart/form-data',
                        'class' => 'form-horizontal'
                    ]
                ]
);
?>
<?=
$form->field($model, 'User_Index', 
      ['options' => ['value'=> $user_index] ])->hiddenInput()->label(false);
?>
<div class="row">
    <div class="col-sm-8">
    <?=
    $form->field($model, 'Prename', [
        'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
    ])->dropDownList(Info::itemsAlias('prename'), ['rows' => 6, 'class' => 'form-control', 'prompt' => ' -- คำนำหน้า --','style' => 'width:90%; margin-left: 10.5%;'])->label('คำนำหน้า', ['class' => 'col-sm-2 control-label'])
    ?>
    <?=
    $form->field($model, 'Student_Name', [
        'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
    ])->textInput(['maxlength' => true, 'class' => 'form-control','style' => 'width:90%; margin-left: 10.5%;'])->label('ชื่อ', ['class' => 'col-sm-2 control-label'])
    ?>
    <?=
    $form->field($model, 'Student_LastName', [
        'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
    ])->textInput(['maxlength' => true, 'class' => 'form-control','style' => 'width:90%; margin-left: 10.5%;'])->label('นามสกุล', ['class' => 'col-sm-2 control-label'])
    ?>
    <?=
    $form->field($model, 'Nickname', [
        'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
    ])->textInput(['maxlength' => true, 'class' => 'form-control','style' => 'width:90%; margin-left: 10.5%;'])->label('ชื่อเล่น', ['class' => 'col-sm-2 control-label'])
    ?>
    </div>
    <div class="" style="float: right;margin-right: 3%">
        <span style="top:0;vertical-align: top;">รูปภาพประจำตัว</span>
        <?php
        $path = $model->Image_Path ? \Yii::$app->request->BaseUrl."/frontend/web/uploads/".$model->Image_Path : \Yii::$app->request->BaseUrl.'/frontend/web/images/Avatar.png';
        if ($model->Image_Path) {
            echo '<img id="Avatar" src="'.$path.'" width="150px"/>';
        }
        ?>
        
        <?=
        $form->field($model, 'file', [
            'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}",
            'options'=>['style'=>'display:none;']
        ])->fileInput()->label(FALSE)
        ?>
        <button id="falseinput" type="button" class="btn btn-primary btn-sm" style="display: block;">
            เลือกรูป
        </button>
    </div>
    
</div>
<br/>
<?=
$form->field($model, 'Student_Id', [
    'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
])->textInput(['maxlength' => true, 'class' => 'form-control'])->label('รหัสนิสิต', ['class' => 'col-sm-2 control-label'])
?>
<?=
$form->field($model, 'Address1', [
    'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
])->textarea(['rows' => 6, 'class' => 'form-control'])->label('ที่อยู่ (บ้าน)', ['class' => 'col-sm-2 control-label'])
?>

<?=
$form->field($model, 'Address2', [
    'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
])->textarea(['rows' => 6, 'class' => 'form-control'])->label('ที่อยู่ (หอพัก)', ['class' => 'col-sm-2 control-label'])
?>

<?=
$form->field($model, 'Phone1', [
    'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
])->textInput(['maxlength' => true, 'class' => 'form-control'])->label('เบอร์มือถือ', ['class' => 'col-sm-2 control-label'])
?>

<?=
$form->field($model, 'Phone2', [
    'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
])->textInput(['maxlength' => true, 'class' => 'form-control'])->label('เบอร์บ้าน', ['class' => 'col-sm-2 control-label'])
?>
<?=
$form->field($model, 'Email', [
    'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
])->textInput(['maxlength' => true, 'class' => 'form-control'])->label('Email', ['class' => 'col-sm-2 control-label'])
?>
<?=
$form->field($model, 'Facebook', [
    'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
])->textInput(['maxlength' => true, 'class' => 'form-control'])->label('Facebook', ['class' => 'col-sm-2 control-label'])
?>

<div class="row">
    <div class="col-sm-9">
<?=
$form->field($model, 'Name_Father', [
    'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
])->textInput(['maxlength' => true, 'class' => 'form-control','style' => 'width:90%; margin-left: 7%;'])->label('ชื่อ-สกุลบิดา', ['class' => 'col-sm-2 control-label'])
?>
    </div>
    <div style="float: right;width: 200px;">
        <?=
        $form->field($model, 'Life_Father', [
			'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
		])->radioList(Info::itemsAlias('life'),['onchange'=>'js:fnc_ClementMilitary(this);'])->label(FALSE);
        ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-9">
<?=
$form->field($model, 'Name_Mother', [
    'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
])->textInput(['maxlength' => true, 'class' => 'form-control', 'style' => 'width:90%; margin-left: 7%;'])->label('ชื่อ-สกุลมารดา', ['class' => 'col-sm-2 control-label'])
?>
    </div>
    <div style="float: right;width: 200px;">
        <?=
        $form->field($model, 'Life_Mother', [
			'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
		])->radioList(Info::itemsAlias('life'),['onchange'=>'js:fnc_ClementMilitary(this);'])->label(FALSE);
        ?>
    </div>
</div>
<?=
$form->field($model, 'LifeStatus', [
			'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
		])->radioList(Info::itemsAlias('status'),['onchange'=>'js:fnc_ClementMilitary(this);'])->label('สถานะภาพ บิดา-มารดา', ['class' => 'col-sm-2 control-label']);
        ?>
                
<?=
$form->field($model, 'Name_Parent', [
    'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
])->textInput(['maxlength' => true, 'class' => 'form-control'])->label('ชื่อ-สกุลผู้ปกครอง', ['class' => 'col-sm-2 control-label'])
?>

<?=
$form->field($model, 'Phone_Parent', [
    'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
])->textInput(['maxlength' => true, 'class' => 'form-control'])->label('เบอร์มือถือ-ผู้ปกครอง', ['class' => 'col-sm-2 control-label'])
?>

<?=
$form->field($model, 'Work_Address_Parent', [
    'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
])->textarea(['rows' => 6, 'class' => 'form-control'])->label('ที่อยู่ที่ทำงานผู้ปกครอง', ['class' => 'col-sm-2 control-label'])
?>
<?php
?>

<?=
$form->field($model, 'Advisors_Id', [
    'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
])->dropDownList(Info::itemsAdvisors(), ['rows' => 6, 'class' => 'form-control', 'prompt' => ' -- อาจารย์ --'])->label('ชื่ออาจารย์ที่ปรึกษา', ['class' => 'col-sm-2 control-label'])
?>
  <?=
  $form->field($model, 'Congenital_Disease', [
  'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
  ])->textInput(['maxlength' => true, 'class' => 'form-control'])->label('โรคประจำตัว', ['class' => 'col-sm-2 control-label'])
  ?>

  <?=
  $form->field($model, 'Be_Allergic', [
  'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
  ])->textInput(['maxlength' => true, 'class' => 'form-control'])->label('แพ้ยา', ['class' => 'col-sm-2 control-label'])
  ?>

  <?=
  $form->field($model, 'Food_Allergy', [
  'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
  ])->textArea(['rows' => 6, 'class' => 'form-control'])->label('แพ้อาหาร', ['class' => 'col-sm-2 control-label'])
  ?>

  <?=
  $form->field($model, 'Buddy', [
  'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
  ])->textInput(['maxlength' => true, 'class' => 'form-control'])->label('ชื่อเพื่อนสนิทในคณะ', ['class' => 'col-sm-2 control-label'])
  ?>
<?=
$form->field($model, 'Buddy_Phone', [
    'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
])->textInput(['maxlength' => true, 'class' => 'form-control'])->label('เบอร์มือถือเพื่อนสนิทในคณะ', ['class' => 'col-sm-2 control-label'])
?>

<?=
$form->field($model, 'Hobby', [
    'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
])->textInput(['maxlength' => true, 'class' => 'form-control'])->label('งานอดิเรก', ['class' => 'col-sm-2 control-label'])
?>

<?=
$form->field($model, 'Ambition', [
    'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
])->textArea(['rows' => 6, 'class' => 'form-control'])->label('ความใฝ่ฝัน', ['class' => 'col-sm-2 control-label'])
?>
<?php if ($model->isNewRecord) :?>
<?=
$form->field($model, 'Sport', [
    'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
])->checkboxList(Info::itemsAlias('sport'),['onClick'=>'js:fnc_Sport(this);','style'=>'display: inline;'])->label('กีฬาที่ชอบ', ['class' => 'col-sm-2 control-label'])
?>
<?php else :?>
<?php
foreach ($model->Sport as $key => $sportName){
    $input = "";
        if($sportName == "อื่นๆ"){
            
            $input = "&nbsp;<label id=\"cc\"><input id=\"gg\" name=\"Info[Str]\" type=\"text\" value=\"".$model->str."\" style=\"font-size: 14px;color: #555; background-color: #FFF; background-image: none;border: 1px solid #CCC; border-radius: 4px;box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset;transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;height: 30px;\"/></label>";
        
            break;
        }
    }
    echo $form->field($model, 'Sport', [
                    'template' => "{label}\n<div class='col-sm-10'>\n{input}".$input."\n</div>\n{hint}\n{error}"
                ])->checkboxList(Info::itemsAlias('sport'),['onClick'=>'js:fnc_Sport(this);','style'=>'display: inline;','data-value'=>$model->str])->label('กีฬาที่ชอบ', ['class' => 'col-sm-2 control-label']);

/*$list = [
    ['id' => 'ดนตรี', 'name' => 'ดนตรี'],
    ['id' => 'กีฬา', 'name' => 'กีฬา'],
    ['id' => 'ภาษา', 'name' => 'ภาษา'],
    ['id' => 'คอมพิวเตอร์', 'name' => 'คอมพิวเตอร์'],
];

$optionsList = \yii\helpers\ArrayHelper::map($list, 'id', 'name');*/
?>
<?php endif;?>
<?=
$form->field($model, 'Genius', [
    'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
])->checkboxList(Info::itemsAlias('genius'))->label('ความสามารถพิเศษ', ['class' => 'col-sm-2 control-label'])
?>

<?=
$form->field($model, 'ROTCS', [
    'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
])->dropDownList(Info::itemsAlias('ROTCS'), ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - '])->label('ผ่านการเรียนรด.แล้ว (สำหรับผู้ชาย)', ['class' => 'col-sm-2 control-label'])
?>

<?php 
	if(!$model->isNewRecord){
		if ($model->Clement_Military !== 0){
			
			$val_Clement_Military = $model->Clement_Military;
			$model->Clement_Military = 1;
			echo $form->field($model, 'Clement_Military', [
				'template' => "{label}\n<div class='col-sm-10'>\n{input}\n<div id=\"xx\" class=\"form-group field-info-Clement-Military required\"><label class=\"col-sm-2 control-label\">เมื่อวันที่</label><div class=\"col-sm-10\">".DatePicker::widget(['name' => 'Info[txtClement_Military]','id'=>'w0d','type' => DatePicker::TYPE_INPUT,'value' => $val_Clement_Military,'pluginOptions' => ['autoclose'=>true,'format' => 'dd-M-yyyy']])."</div></div></div>\n{hint}\n{error}"
			])->radioList(Info::itemsAlias('military'),['onchange'=>'js:fnc_ClementMilitary(this);','data-value'=>$val_Clement_Military])->label('ผ่อนผันทหาร', ['class' => 'col-sm-2 control-label']);
		}else{
			echo $form->field($model, 'Clement_Military', [
				'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
			])->radioList(Info::itemsAlias('military'),['onchange'=>'js:fnc_ClementMilitary(this);'])->label('ผ่อนผันทหาร', ['class' => 'col-sm-2 control-label']);
		}
		
	}else{
		echo $form->field($model, 'Clement_Military', [
			'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
		])->radioList(Info::itemsAlias('military'),['onchange'=>'js:fnc_ClementMilitary(this);'])->label('ผ่อนผันทหาร', ['class' => 'col-sm-2 control-label']);
	}
        
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
    <div class="col-sm-9 col-sm-offset-2">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'บันทึกข้อมูล' : 'ปรับปรุงข้อมูล', ['class' => $model->isNewRecord ? 'btn btn-block btn-success' : 'btn btn-block btn-primary','name'=>'create-std','data-action'=>Yii::$app->urlManager->createUrl(['/info/update']),'data-record'=>  strval($model->isNewRecord)]) ?>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
