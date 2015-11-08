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

    <h1><?= Html::encode($this->title) ?></h1>


    <?php
    echo Yii::$app->controller->id;
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
                <div class="mn-left">
                    <ul class="mn-left-ul">
                        <li><a href="<?php echo Yii::$app->request->baseUrl. '/info/frm1'; ?>">ข้อมูลพื้นฐาน</a></li>
                        <li><a href="<?php echo Yii::$app->request->baseUrl. '/info/frm2'; ?>">ข้อมูลกิจกรรม</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-10">

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
            alert(new Date().getTime() - start);
        }
    };

    //start = new Date().getTime();

    xmlHttp.open("GET", '<?php echo Yii::$app->request->baseUrl. '/info/frm1';?>', true); // true for asynchronous
    xmlHttp.send(null);
</script>
