<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\grid\GridView;
use yii\bootstrap\Modal;

        $gridColumns1 = [
           // ['class' => 'yii\grid\SerialColumn'],

//            'Student_Index',
  //          'User_Index',
            'Scholarship_Name',
            'Scholarship_Year',
         

           /* [
            'class' => 'kartik\grid\ActionColumn', 'urlCreator'=>function(){return '#';},
            'buttonOptions'=>['class'=>'btn btn-default'],
            'template'=>'<div class="btn-group btn-group-sm text-center" role="group">{scholarship} {activity} {student} </div>', //{view} {update} {delete}
            'options'=> ['style'=>'width:150px;'],
            'buttons'=>[
              'scholarship' => function($url,$model,$key){
                  return Html::a('<i class="glyphicon glyphicon-new-window"></i>',Yii::$app->urlManager->createUrl(['student/scholarship?ViewScholarshipSearch[Student_Index]='.$model->Student_Index]),[
                      'class'=>'btn btn-default activity-view-link',
                      'title' => Yii::t('yii', 'ข้อมูลทุน'),
                      'data-toggle' => 'modal',
                      'data-target' => '#activity-modal',
                      'data-key' => $key,
                      'data-pjax' => '0',]);
                },
                'activity' => function($url,$model,$key){
                  return Html::a('<i class="glyphicon glyphicon-link" title="ข้อมูลกิจกรรม"></i>',Yii::$app->urlManager->createUrl(['student/award?ViewAwardSearch[Student_Index]='.$model->Student_Index]),[
                      'class'=>'btn btn-default activity-view-link',
                      'title' => Yii::t('yii', 'ข้อมูลกิจกรรม'),
                      'data-toggle' => 'modal',
                      'data-target' => '#activity-modal',
                      'data-key' => $key,
                      'data-pjax' => '0',]);
                },
                'student' => function($url,$model,$key){
                  return Html::a('<i class="glyphicon glyphicon-eye-open" title="ข้อมูลนิสิต"></i>',Yii::$app->urlManager->createUrl(['student/'.$model->Student_Index]),[
                      'class'=>'btn btn-default activity-view-link',
                      'title' => Yii::t('yii', 'ข้อมูลนิสิต'),
                      'data-toggle' => 'modal',
                      'data-target' => '#activity-modal',
                      'data-key' => $key,
                      'data-pjax' => '0',]);
                }
              ]
          ],*/
        ];
        
        $gridColumns2 = [

            'Award_Name',
            'Award_Year',
            
            ];
         $gridColumns3 = [

            'Activity_Name',
            'Type_Name',
            'str1',
            'str2',
            'str3',
            'str4',
            'str5',
            'Activity_Year',
             
            ];
        
        $gridColumns4 = [

            'Club_Name',
            'Description',
            'Position_Year',
            'str1'
            
            ];
        
?>
    <?= GridView::widget([        
    'dataProvider' => $scholarshipDataProvider,
      //  'filterModel' => $searchModel,
    'columns' =>  $gridColumns1 ,
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
<button data-href="<?=Yii::$app->urlManager->createUrl(['/info/create'])?>" id="aAdd-scholarship" type="button" class="btn btn-primary btn-sm activity-view-link" data-ajax="3" data-seq="1" onclick="infoCreate(this)">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เพิ่ม
</button>
<button data-href="<?=Yii::$app->urlManager->createUrl(['/info/update'])?>" id="aRem-scholarship" type="button" class="btn btn-default btn-sm activity-view-link" data-ajax="3" data-seq="1" onclick="infoUpdate(this)">
                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> แก้ไข
</button>
<hr/>
<?= GridView::widget([        
    'dataProvider' => $awardDataProvider,
      //  'filterModel' => $searchModel,
    'columns' =>  $gridColumns2 ,
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
<button id="aAdd-award" type="button" class="btn btn-primary btn-sm" data-href="<?=Yii::$app->urlManager->createUrl(['/info/create'])?>" data-ajax="3" data-seq="2" onclick="infoCreate(this)">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เพิ่ม
            </button>
            <button id="btnRem-award" type="button" class="btn btn-default btn-sm" data-href="<?=Yii::$app->urlManager->createUrl(['/info/update'])?>" data-ajax="3" data-seq="2" onclick="infoUpdate(this)">
                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> แก้ไข
            </button>
<hr/>
<?= GridView::widget([        
    'dataProvider' => $activityDataProvider,
      //  'filterModel' => $searchModel,
    'columns' =>  $gridColumns3 ,
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
 <button id="aAdd-Activ" type="button" class="btn btn-primary btn-sm" data-href="<?=Yii::$app->urlManager->createUrl(['/info/create'])?>" data-ajax="3" data-seq="3" onclick="infoCreate(this)">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เพิ่ม
            </button>
            <button id="btnRem-Activ" type="button" class="btn btn-default btn-sm" data-href="<?=Yii::$app->urlManager->createUrl(['/info/update'])?>" data-ajax="3" data-seq="3" onclick="infoUpdate(this)">
              <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> แก้ไข
            </button>
<hr/>
<?= GridView::widget([        
    'dataProvider' => $positionDataProvider,
      //  'filterModel' => $searchModel,
    'columns' =>  $gridColumns4 ,
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

 <button id="aAdd-posi" type="button" class="btn btn-primary btn-sm" data-href="<?=Yii::$app->urlManager->createUrl(['/info/create'])?>" data-ajax="3" data-seq="4" onclick="infoCreate(this)">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เพิ่ม
            </button>
            <button id="btnRem-posi" type="button" class="btn btn-default btn-sm" data-href="<?=Yii::$app->urlManager->createUrl(['/info/update'])?>" data-ajax="3" data-seq="4" onclick="infoUpdate(this)">
              <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> แก้ไข
            </button>

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

<script>
    function infoCreate(_this){
        var url = $(_this).data("href");
        var isAjax =  $(_this).data("ajax");
        var seq = $(_this).data("seq");
         
        $.post(
                url,
                {
                    isAjax: isAjax,
                    seq: seq
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
        function infoUpdate(_this){
        var url = $(_this).data("href");
        var isAjax =  $(_this).data("ajax");
        var seq = $(_this).data("seq");
         
        $.post(
                url,
                {
                    isAjax: isAjax,
                    seq: seq
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
function init_click_handlers(){
$(document).on('click', '.activity-view-link', function (e) {
 

            //var fID = $(this).closest("tr").data("key");
            //var url = $(this).attr("href");
            $.get(
                url,
                {
                    id: 1
                },
                function (data)
                {
                    //$("#activity-modal").find(".modal-body").html(data);
                    //$(".modal-body").html(data);
                    $("#activity-modal").modal("show");
                }
            );
        });

}
init_click_handlers();
</script>