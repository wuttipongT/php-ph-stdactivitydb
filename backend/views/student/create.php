<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblStudent */

$this->title = 'Create Tbl Student';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-student-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
