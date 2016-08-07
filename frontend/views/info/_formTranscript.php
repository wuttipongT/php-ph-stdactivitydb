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
use kartik\grid\GridView;
use yii\bootstrap\Modal;


 $gridColumns = [
            'Academic_Year',
            'Grade',
            'GPA2',
             [
                'class' => 'kartik\grid\ActionColumn', 'urlCreator'=>function(){return '#';},
                'buttonOptions'=>['class'=>'btn btn-default'],
                'template'=>'<div class="btn-group btn-group-sm text-center" role="group">{edit}</div>', //{view} {update} {delete}
                //'options'=> ['style'=>'width:150px;'],
                'buttons'=>[
                  'edit' => function($url,$model,$key){
                      return Html::button('<i class="glyphicon glyphicon-new-window"></i>',[
                          'class'=>'btn btn-default activity-view-link',
                          'title' => Yii::t('yii', 'แก้ไข'),
                          'onclick' => 'update(this)',
                         // 'data-target' => '#activity-modal',
                          'data-key' => $key,
                          'data-pjax' => '0',]);
                    },
                    
                  ]
              ],
            ];
?>

    <?= GridView::widget([        
    'dataProvider' => $DataProvider,
      //  'filterModel' => $searchModel,
    'columns' =>  $gridColumns ,
    //'pjax' => true,
   // 'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
    'panel' => [
        'type' => GridView::TYPE_DEFAULT,
        'heading' => FALSE,//'<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> ข้อมูลทุนการศึกษา</h3>',
        'footer'=>false
    ],
    
    // set a label for default menu
    'export' => FALSE,
    // your toolbar can include the additional full export menu
    'toolbar' => FALSE,
    'showPageSummary' => FALSE,  
    
    
    ]); ?>

<h6>*หมายเหตุ : เกรดเฉลี่ย = เกรด / จำนวนเทอม</h6>
<hr/>
<?php 
$form = ActiveForm::begin(
                [
                    //'action' => $model->isNewRecord ? 2 : 4Yii::$app->urlManager->createUrl(['/info/save1']),
                    
                    'options' => [
                      //  'enctype'=>'multipart/form-data',
                        'class' => 'form-horizontal',
                        'id' => 'w03'
                    ]
                ]
);
?>
<div class="row">
    <div class="col-sm-12">
        <?php
        $acadYear = [];
        $year = (date('Y')+543);
        $acadYear[] = ['id'=>'1/'.$year,'value'=>'1/'.$year];
        $acadYear[] = ['id'=>'2/'.$year,'value'=>'2/'.$year];
        $acadYear[] = ['id'=>'3/'.$year,'value'=>'3/'.$year];
        for($i=1; $i<=5; $i++){
            for($j=1;$j<=3;$j++){
                 
                   $year = (date('Y')+543)+$i;
                   $acadYear[] = ['id'=>$j.'/'.$year,'value'=>$j.'/'.$year];
                
            }
        }
        /*$acadyear = [
    ['id' => '1/2559', 'value' => 'ชมรม'],
    ['id' => 'ชั้นปี', 'value' => 'ชั้นปี'],
    ['id' => 'คณะ', 'value' => 'คณะ'],
    ['id' => 'มหาวิทยาลัย', 'value' => 'มหาวิทยาลัย'],
    ['id' => 'จังหวัด', 'value' => 'จังหวัด'],
    ['id' => 'ประเทศ', 'value' => 'ประเทศ'],
];*/
$acadyearItem = ArrayHelper::map($acadYear, 'id', 'value');
        ?>
    <?=
    $form->field($model, 'Academic_Year', [
        'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
    ])->dropDownList($acadyearItem, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' -- ปีการศึกษา --','style' => 'width:90%; margin-left: 10.5%;'])->label('ปีการศึกษา', ['class' => 'col-sm-2 control-label'])
    ?>
    <?=
    $form->field($model, 'GPA', [
        'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
    ])->textInput(['maxlength' => true, 'class' => 'form-control','style' => 'width:90%; margin-left: 10.5%;'])->label('เกรด', ['class' => 'col-sm-2 control-label'])
    ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-9 col-sm-offset-1">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'บันทึกข้อมูล' : 'ปรับปรุงข้อมูล', ['class' => $model->isNewRecord ? 'btn btn-block btn-success' : 'btn btn-block btn-primary','name'=>'create-std','data-action'=>Yii::$app->urlManager->createUrl(['/info/update']),'data-record'=>  strval($model->isNewRecord)]) ?>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>

<script>
    function update(_this){
            var fID = $(_this).closest("tr").data("key");
            $.post(
                'update',
                {
                    id: fID,
                    isAjax: 5,
                    
                },
                function (data)
                {
                    //$("#activity-modal").find(".modal-body").html(data);
                    $(".modal-body").html(data);
                    $("#activity-modal").modal("show");
                   
                }
        ); 
        return false;
    }

</script>

 <?php Modal::begin([
        'id' => 'activity-modal',
        //'header' => '<h4 class="modal-title">สมาชิก</h4>',
        'size'=>'modal-lg',
        //'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">ปิด</a>',
        ]);
        Modal::end();
?>
<style>
    .modal-backdrop {
    background-color: #FFF !important;
   
   
}
.form-group{margin-left: -10px !important;margin-right: -10px !important;}
.modal-content{background-color: #FFF !important;border-radius: 0 !important;padding: 8px; overflow:auto;}
</style>