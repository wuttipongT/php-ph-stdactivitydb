<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView; 
/* @var $this yii\web\View */
/* @var $model backend\models\TblStudent */

//$this->title = $dataProvider->Student_Index;
$this->params['breadcrumbs'][] = ['label' => 'รางวัลที่เคยได้รับ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="view-scholarship-view">

    <?php /*?>
        <?=    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Scholarship_Year',
            'Scholarship_DESC',
            'Student_Index',
            'Scholarship_Id',
            
        ],
    ]) ?><?php */?>
    
    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    //'filterModel' => $searchModel,
    'pjax' => true,
    'panel'=>[
           'type' => GridView::TYPE_INFO,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> รางวัลที่เคยได้รับ </h3>',
    ],
    //.........
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
            'Award_Name',
            'Award_Year',
            //'Scholarship_Id',
        //['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>

</div>

