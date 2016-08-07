<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ScholarshipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Scholarships';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scholarship-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Scholarship', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Scholarship_Id',
            'Student_Index',
            'Scholarship_DESC',
            'Scholarship_Year',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
