<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ActivitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Activities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Activity', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Activity_Id',
            'Student_Index',
            'Type_Id',
            'Position_Id',
            'Activity_Name',
            // 'Activity_Time',
            // 'Activity_Year',
            // 'str1',
            // 'str2',
            // 'str3',
            // 'str4',
            // 'str5',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
