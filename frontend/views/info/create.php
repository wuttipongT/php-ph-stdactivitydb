<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Info */

$this->title = 'Create Info';
$this->params['breadcrumbs'][] = ['label' => 'Infos', 'url' => ['index']];
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
            <div class="col-lg-2">

                <div class="list-group mn-left">

                    <a href="<?php echo Yii::$app->request->baseUrl . '/info/frm1'; ?>" class="list-group-item active">ข้อมูลพื้นฐาน</a>
                    <a href="<?php echo Yii::$app->request->baseUrl . '/info/frm2'; ?>" class="list-group-item">ข้อมูลกิจกรรม</a>

                </div>
            </div>
            <div class="col-lg-1">&nbsp;</div>
            <div class="col-lg-9 border-left effect8" style="">

                <div id="_form_content" class="_form-content">

                </div>

            </div>
        </div>
    </div>
</div>

<script>
    var content_div = document.getElementById('_form_content');
    var xmlHttp = new XMLHttpRequest();

    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
        {
            content_div.innerHTML = xmlHttp.responseText;
            //alert(new Date().getTime() - start);
        }
    };

    //start = new Date().getTime();

    xmlHttp.open("GET", '<?php echo Yii::$app->request->baseUrl. '/info/frm1';?>', true); // true for asynchronous
    xmlHttp.send(null);
</script>
