<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MsAward */

$this->title = 'Create Award';
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลรางวัล', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ms-award-create">
    <?= $this->render('_form', [
        'model' => $model,
        'title' => $this->title,
    ]) ?>

</div>
