<?php

use yii\helpers\Html;

use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $model app\models\Info */

$this->title = 'ฟอร์มข้อมูลนิสิต'; //. ' ' . $tb_student->Student_Index;
//$this->params['breadcrumbs'][] = ['label' => 'Infomation', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $tb_student->Student_Index, 'url' => ['view', 'id' => $tb_student->Student_Index]];
$this->params['breadcrumbs'][] = 'ฟอร์มข้อมูลนิสิต';
$this->params['breadcrumbs'][] = 'ข้อมูล';
?>
<div class="info-update">
    <?php /* ?>
      <?= $this->render('_formBasic', [
      'tb_student' => $tb_student,
      ]) ?>
     *  <h1><?= Html::encode($this->title) ?></h1>
     * 
     */ ?>
    <div class="info-form">

            <div class="col-lg-2" >
                <div class="affix" style ="width: 220px !important;height: 80%;background-color: #FFF; padding: 4px;padding-top: 10px;margin-top: -9px; margin-left: -30px; z-index: 1;">
                        <ul class="nav nav-pills nav-stacked mn-left">
                            <li class="active">
                                <a href="<?= Yii::$app->student->getId() == null ? Yii::$app->urlManager->createUrl(['/info/create']) : Yii::$app->urlManager->createUrl(['/info/update']) ?>" data-ajax="1">
                                   <span class="glyphicon glyphicon-file"></span>  ข้อมูลพื้นฐาน
                                </a>
                            </li>
                            <li> 
                                <a href="<?= Yii::$app->urlManager->createUrl(['/info/activity']);?>" data-ajax="3">
                                   <span class="glyphicon glyphicon-file"></span> ข้อมูลกิจกรรม
                                </a>
                            </li>
                            <li> 
                                <a href="<?= Yii::$app->urlManager->createUrl(['/info/create']) ?>" data-ajax="5">
                                   <span class="glyphicon glyphicon-file"></span> ผลการศึกษา
                                </a>
                            </li>
                        </ul>

                    </div>
            </div>
            <div class="col-lg-10" style="padding-left: 10px;">
                <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
                <div class="panel panel-default" style="margin-top: -17px;">
                    <div class="panel-heading"><span class="glyphicon glyphicon-file"></span> ฟอร์มข้อมูลนิสิต</div>
                    <div class="panel-body">
                        <div id="_form_content" class="_form-content">&nbsp;</div>
                    </div>
                </div>
            </div>
        
    </div>
</div>
<?php 

$this->registerJs("
    $(function(){
        $.ajax({
            type: 'POST',
            url: 'update',
            data: JSON.parse(JSON.stringify({'isAjax':'1'})),
            dataType: 'html',
            success: function(res){
               $('#_form_content').append(res);
               //console.log(res);
            },
            error: function(xhr, status){
                console.log(xhr);
            },
        });
   
      /*  $('#_form_content').load('update',JSON.parse(JSON.stringify({'isAjax':'1'})),function(){
            
        });*/
        
        $('.mn-left li a').on('click', function (e) {
            e.preventDefault();
            $(this).parents('.mn-left').find('.active').removeClass('active').end().end().parents('li').addClass('active');
        
            $.ajax({
                 url: $(this).attr('href'),
                 type: 'POST',
                 data: JSON.parse(JSON.stringify({'isAjax': $(this).data('ajax')})),
                 dataType: 'html',
                 success: function (data) {
                     // process data
                     $('._form-content').html(data);

                     //console.log(data);

                 },
                 error: function (xhr, status) {
                     console.log(xhr);
                 }
             });
        });
    
        $('#nav-stacked').affix({
          offset: {
                top: function () { return $(window).width() <= 980 ? 0 : 100 }
          }
        });
    });
    
    
    ",  \yii\web\View::POS_END);

?>
 <style>
 #nav-stacked.affix {
    //width: auto;
//	top: 55px;
}
 </style>  
<?php //echo Yii::$app->request->baseUrl;?>