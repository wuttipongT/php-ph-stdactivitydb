<?php
/* @var $this yii\web\View */

use kartik\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Scholarship;
use yii\bootstrap\Collapse;
use kartik\grid\GridView;
use kartik\export\ExportMenu;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
$this->title = '';
?>
<div class="site-index">

    <div class="body-content">
<?php Pjax::begin(['id'=>'some_pjax_id','enablePushState'=>FALSE]); ?>
        <?php
        $form = ActiveForm::begin(
                        [
                            'action' => ['index'],
                            'method' => 'get',
                            'options' => [
                                'class' => 'form-inline',
                                'data-pjax' => true,
                                
                            ]
                        ]
        );
        $years = range('2552', '2560'); //range(date("Y"), date("Y", strtotime("now - 100 years")));
        foreach ($years as $id => $year) {

            $list[] = ['id' => $year, 'value' => $year];
        }
        $dataList = ArrayHelper::map($list, 'id', 'value');
        
        $class = substr(date('Y')+543,2,2);
        $classItem = array();
        $bool = true;
         array_push($classItem, ['id' => $class, 'name' => 'ชั้นปีที่ 1']);
        for ($i=1;$i<=5;$i++){
            array_push($classItem, ['id' => $class+$i, 'name' => 'ชั้นปีที่ '.($i+1)]);
        }
        
        //print_r($classItem);

        $nameItem = [
            ['id' => '0', 'name' => 'รหัสนิสิต'],
            ['id' => '1', 'name' => 'ชื่อ'],
            ['id' => '2', 'name' => 'สกุล'],
        ];

        $dataClassItem = ArrayHelper::map($classItem, 'id', 'name');
        $dataNameItem = ArrayHelper::map($nameItem, 'id', 'name');

        $gridColumns = [
           // ['class' => 'yii\grid\SerialColumn'],

//            'Student_Index',
  //          'User_Index',
            'Student_Id',
            'Student_Name',
            'Student_LastName',
            // 'Image_Path:ntext',
            // 'Address1:ntext',
            // 'Address2:ntext',
            // 'Phone1',
            // 'Phone2',
            // 'Name_Father',
            // 'Name_Mother',
            // 'Name_Parent',
            // 'Phone_Parent',
            // 'Work_Address_Parent:ntext',
            // 'Advisors_Id',
            // 'Congenital_Disease',
            // 'Be_Allergic',
            // 'Food_Allergy',
            // 'Buddy',
            // 'Buddy_Phone',
            // 'Hobby',
            // 'Ambition:ntext',
            // 'Sport',
            // 'Genius',
            // 'ROTCS',
            // 'Clement_Military',
            // 'str',

            [
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
          ],
        ];
                      $fullExportMenu = ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                    'Student_Id',
                    'Student_Name',
                    'Student_LastName',
                  //   'Image_Path:ntext',
                     'Address1',
                 //    'Address2',
                     'Phone1',
                   //  'Phone2',
                     'Name_Father',
                     'Name_Mother',
                     'Name_Parent',
                     'Phone_Parent',
                     'Work_Address_Parent',
                     'Advisors_Id',
                     'Congenital_Disease',
                     'Be_Allergic',
                     'Food_Allergy',
                     'Buddy',
                     'Buddy_Phone',
                     'Hobby',
                     'Ambition',
                     'Sport',
                     'Genius',
                     'ROTCS',
                     'Clement_Military',
                     'Position_Name',
                     'Club_Name',
                     'Type_Name',
                     'Scholarship_Id',
                     'Award_Id',
            ],
            'target' => ExportMenu::TARGET_BLANK,
            'fontAwesome' => true,
            'pjaxContainerId' => 'kv-pjax-container',
            'dropdownOptions' => [
                'label' => 'Full',
                'class' => 'btn btn-default',
                'itemsBefore' => [
                    '<li class="dropdown-header">Export All Data</li>',
                ],
            ],
        ]);
                      
                      if (isset($_GET['ViewStudentSearch[rdoClass]'])){
                          switch ($searchModel->rdoClass){
                            case '0': $boolClass = TRUE; break;
                            default : $boolClass = FALSE; break;
                          }
                          
                          
                      }  else {
                          $boolClass = TRUE;
                      }
                ?>
 
        
           <div class="panel panel-default" style="margin-bottom: 5px;">
                      <div class="accordion" id="accordion2">
            <div class="accordion-group">
                <div class="accordion-heading" style="padding: 10px;">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                        &nbsp;&nbsp;Search Option
                    </a>
                </div>
                <div id="collapseOne" class="accordion-body collapse in">
                    <div class="accordion-inner">
                     <div class="row" style="padding:5px;">
                                <div class="col-sm-12">
                                    <?= Html::radio('ViewStudentSearch[rdoClass]',$searchModel->rdoClass == 1 ? TRUE: FALSE ,['id'=>'rdoClass','value'=>'1']); ?>&nbsp;&nbsp;&nbsp;&nbsp<?= Html::label('ชั้นปี', 'rdoClass', ['class' => 'control-label']); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?= Html::dropDownList('ViewStudentSearch[ddlClass]', '', $dataClassItem, ['class' => 'form-control']) ?>
                                    &nbsp;&nbsp;&nbsp;&nbsp<?= Html::radio('ViewStudentSearch[rdoClass]',$searchModel->rdoClass == 2 ? TRUE: FALSE,['id'=>'rdoClass2','value'=>'2']); ?>&nbsp;&nbsp;&nbsp;&nbsp<?= Html::label('ศิษเก่า', 'rdoClass2', ['class' => 'control-label']); ?>&nbsp;&nbsp;&nbsp;&nbsp<?= Html::input('text', 'ViewStudentSearch[txtClass]', $searchModel->txtClass, ['class' => 'form-control']) ?>
                                   &nbsp; *ค้นหาด้วยรหัสสองตัวหน้า หรือรหัสนิสิต เช่น <?=$classItem[0]['id']-1?> xxx...
                                </div>
                            </div>
                            <!--<div class="row" style="padding:5px;">
                                <hr style="margin: 0 0 8px 0;"/>
                                <div class="col-sm-12">
                                    <?= Html::checkbox('chkbName'); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?= Html::dropDownList('ddlt', '', $dataNameItem, ['class' => 'form-control']) ?>&nbsp;&nbsp;&nbsp;&nbsp;<?= Html::input('text', '', '', ['class' => 'form-control']) ?>
                                </div>
                            </div>-->
                            <div class="row" style="padding:5px;">
                                 <hr style="margin: 0 0 8px 0;"/>
                                <div class="col-sm-12">
                                    <?php 
                                    ?>
                                    <?= Html::checkbox('ViewStudentSearch[chkScholarship]',$searchModel->chkScholarship == 1 ? TRUE : FALSE,['id'=>'chkScholarship']); ?>&nbsp;&nbsp;&nbsp;&nbsp<?= Html::label('ทุนที่เคยได้รับ', 'chkScholarship', ['class' => 'control-label']); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= Html::dropDownList('ViewStudentSearch[ddlScholarship]', $searchModel->ddlScholarship, $ScholarshipItem, ['class' => 'form-control']) ?>
                                    &nbsp;&nbsp;&nbsp;&nbsp<?= Html::checkbox('ViewStudentSearch[chkbAwardItem]',$searchModel->chkbAwardItem == 1 ? TRUE : FALSE,['id'=>'chkbAwardItem']); ?>&nbsp;&nbsp;&nbsp;&nbsp<?= Html::label('รางวัลที่เคยได้รับ', 'chkbAwardItem', ['class' => 'control-label']); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?= Html::dropDownList('ViewStudentSearch[ddlAwardItem]', $searchModel->ddlAwardItem, $AwardItem, ['class' => 'form-control']) ?>
                                </div>

                            </div>
                            <div class="row" style="padding:5px;">
                                <div class="col-sm-12">
                                   <?= Html::checkbox('ViewStudentSearch[chkbPositionItem]',$searchModel->chkbPositionItem == 1 ? TRUE : FALSE,['id'=>'chkbPositionItem']); ?>&nbsp;&nbsp;&nbsp;&nbsp<?= Html::label('ตำแหน่งที่เข้าร่วม', 'chkbPositionItem', ['class' => 'control-label']); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?= Html::dropDownList('ViewStudentSearch[ddlPositionItem]', $searchModel->ddlPositionItem, $category, ['class' => 'form-control']) ?>
                                </div>

                            </div>
                            <div class="row" style="padding:5px">
                                <hr style="margin: 0 0 8px 0;"/>
                                <div class="col-sm-12">
                                    <?= Html::checkbox('ViewStudentSearch[chkSport]',$searchModel->chkSport == 1 ? TRUE : FALSE,['id'=>'chkSport']); ?>&nbsp;&nbsp;&nbsp;&nbsp<?= Html::label('กีฬาที่ชอบ', 'chkSport', ['class' => 'control-label']); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?= Html::dropDownList('ViewStudentSearch[ddlSport]', $searchModel->ddlSport, $Sport, ['class' => 'form-control']) ?>
                                    &nbsp;&nbsp;&nbsp;&nbsp<?= Html::checkbox('ViewStudentSearch[chkbGenius]',$searchModel->chkbGenius == 1 ? TRUE : FALSE,['id'=>'chkbGenius']); ?>&nbsp;&nbsp;&nbsp;&nbsp<?= Html::label('ความสามารถ', 'chkbGenius', ['class' => 'control-label']); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?= Html::dropDownList('ViewStudentSearch[ddlGenius]', $searchModel->ddlGenius, $Genius, ['class' => 'form-control']) ?>
                                    &nbsp;&nbsp;&nbsp;&nbsp<?= Html::checkbox('ViewStudentSearch[chkbROTCS]',$searchModel->chkbROTCS == 1 ? TRUE : FALSE,['id'=>'chkbROTCS']); ?>&nbsp;&nbsp;&nbsp;&nbsp<?= Html::label('รด.', 'chkbROTCS', ['class' => 'control-label']); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?= Html::dropDownList('ViewStudentSearch[ddlROTCS]', $searchModel->ddlROTCS, $ROTCS, ['class' => 'form-control']) ?>
                                    &nbsp;&nbsp;&nbsp;&nbsp<?= Html::checkbox('ViewStudentSearch[chkbMilitary]',$searchModel->chkbMilitary == 1 ? TRUE : FALSE,['id'=>'chkbMilitary']); ?>&nbsp;&nbsp;&nbsp;&nbsp<?= Html::label('ผ่อนผันทหาร', 'chkbMilitary', ['class' => 'control-label']); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?= Html::dropDownList('ViewStudentSearch[ddlMilitary]', $searchModel->ddlMilitary, $military, ['class' => 'form-control']) ?>
                                    </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
                            
                                    <div class="row " style="padding:5px">
                                <hr style="margin: 0 0 8px 0;"/>
                                <div class="col-sm-12">
                                    <?= Html::input('text', 'ViewStudentSearch[txtSearch]', $searchModel->txtSearch, ['class' => 'form-control form-inline-block','style'=>'width:80%;','placeholder'=>'Keyword...']) ?>
                                    &nbsp;&nbsp;&nbsp;&nbsp;<?= Html::dropDownList('ViewStudentSearch[ddlTxtSearch]', $searchModel->ddlTxtSearch, ['0'=>'รหัสนิสิต','1'=>'ชื่อ','2'=>'นามสกุล'], ['class' => 'form-control']) ?> 
                                    <button class="btn btn-default" style="float:right;margin-right: 5px;" type="submit"><i class="glyphicon glyphicon-search"></i> ค้นหา</button>
                                   
                                </div>
                            </div> 
                        </div>
<?php ActiveForm::end(); ?>
        
    <?= GridView::widget([
            'dataProvider' => $dataProvider,
      //  'filterModel' => $searchModel,
     'columns' =>  $gridColumns ,
    'pjax' => true,
    'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
    'panel' => [
        'type' => GridView::TYPE_DEFAULT,
        'heading' => FALSE,//<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> ข้อมูลนิสิต</h3>
    ],
    // set a label for default menu
    'export' => [
        'label' => 'Page',
        'fontAwesome' => true,
    ],
    // your toolbar can include the additional full export menu
    'toolbar' => [
       // '{export}',
        $fullExportMenu,
        ['content'=>
            /*Html::button('<i class="glyphicon glyphicon-plus"></i>', [
                'type'=>'button', 
                'title'=>Yii::t('kvgrid', 'Add Book'), 
                'class'=>'btn btn-success'
            ]) . ' '.*/
            Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], [
                'data-pjax'=>0, 
                'class' => 'btn btn-default', 
                'title'=>Yii::t('kvgrid', 'Reset Grid')
            ])
        ],
    ],
      
    
                            /*'layout' => '
      
      <div class="table-responsive mailbox-messages">
          {items}
      </div>
      <div class="mailbox-controls">
           <div class="pull-right" style="padding-top: 5px;">
              {summary}
              {pager}
          </div>
      </div>
    ',*/
    ]); ?>
        <?php yii\widgets\Pjax::end() ?>
    </div>
</div>
<?php $this->registerJs(
'
function init_click_handlers(){
  $(".activity-view-link").click(function(e) {

            var fID = $(this).closest("tr").data("key");
            var url = $(this).attr("href");
            $.get(
                url,
                {
                    id: fID
                },
                function (data)
                {
                    $("#activity-modal").find(".modal-body").html(data);
                    $(".modal-body").html(data);
                    $("#activity-modal").modal("show");
                }
            );
        });

}

init_click_handlers(); //first run
$("#some_pjax_id").on("pjax:success", function() {
  init_click_handlers(); //reactivate links in grid after pjax update
  
});

');

?>
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
</style>
