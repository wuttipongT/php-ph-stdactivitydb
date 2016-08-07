<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Info */

$this->title = 'แบบฟอร์มข้อมูลนิสิต';
$this->params['breadcrumbs'][] = ['label' => 'แบบฟอร์มข้อมูลนิสิต', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-create">
    <?php
    /*
      echo Yii::getAlias('@PATH');
      print realpath(Yii::$app->basePath).'/views/info/_formActive.php';

      $this->render('_form', [
      'model' => $model,
      'advisors' => $advisors,
      ]) */
    ?>

    <div class="info-form">
        <div class="row">
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
                                <a href="<?= Yii::$app->student->isTranscript() ? Yii::$app->urlManager->createUrl(['/info/create']) : Yii::$app->urlManager->createUrl(['/info/update']) ?>" data-ajax="5">
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
                <div class="panel panel-default">
                    <div class="panel-heading"><span class="glyphicon glyphicon-file"></span> แบบฟอร์ม</div>
                    <div class="panel-body">
                        <div id="_form_content" class="_form-content">&nbsp;</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
$url = Yii::$app->urlManager->createUrl(['/info/create']);
$update = Yii::$app->urlManager->createUrl(['/info/update']);
$this->registerJs("
    $(function(){
        $.ajax({
            type: 'POST',
            url: '".$url."',
            data: JSON.parse(JSON.stringify({'isAjax':'1'})),
            dataType: 'html',
            success: function(res){
            $('#_form_content').html(res);

            },
            error: function(xhr, status){
                console.log(xhr);
            },
        });
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
    width: 20%;
	top: 55px;
}
 </style> 
<script>
  /*  var content_div = document.getElementById('_form_content');
    var xmlHttp = new XMLHttpRequest();

    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
        {
            content_div.innerHTML = xmlHttp.responseText;
            //alert(new Date().getTime() - start);
        }
    };

    //start = new Date().getTime();

    xmlHttp.open("GET", '<?= Yii::$app->urlManager->createUrl(['/info/create']); ?>', true); // true for asynchronous
    xmlHttp.send(null);
    */
</script>
