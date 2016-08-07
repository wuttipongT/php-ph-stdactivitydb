<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MsAward */

$this->title = $model->Award_Id;
$this->params['breadcrumbs'][] = ['label' => 'Ms Awards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ms-award-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Award_Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Award_Id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Award_Id',
            'Award_Name',
            'Status',
        ],
    ]) ?>

</div>
