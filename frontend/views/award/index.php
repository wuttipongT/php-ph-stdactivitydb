<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AwardSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Awards';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="award-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Award', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Award_Index',
            'Award_Id',
            'Student_Index',
            'Award_Year',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
