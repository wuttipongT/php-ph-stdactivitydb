<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MsScholarshipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ข้อมูลทุนการศึกษา';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ms-scholarship-index">

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'panel' => [
            'type' => GridView::TYPE_DEFAULT,
            'heading' => FALSE, //<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> ข้อมูลนิสิต</h3>
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'Scholarship_Id',
            'Scholarship_Name',
            [
                'attribute' => 'StatusName',
                //'value' => 'attribute_value',
                'filter' => Html::activeDropDownList($searchModel, 'StatusName', ['0' => 'ใช้งาน', '1' => 'ไม่ใช้าน'], ['class' => 'form-control', 'prompt' => 'Select Status']),
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'buttonOptions' => ['class' => 'btn btn-default'],
                'template' => '<div class="btn-group btn-group-sm text-center" role="group"> {update} </div>', //{view} {update} {delete}
            ],
        ],
        'toolbar' => [
            // '{export}',
            // $fullExportMenu,
            ['content' =>
                Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], [
                    'type' => 'button',
                    // 'title'=>Yii::t('kvgrid', 'Add Book'), 
                    'class' => 'btn btn-success'
                ]) . ' ' .
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], [
                    'data-pjax' => 0,
                    'class' => 'btn btn-default',
                        //  'title'=>Yii::t('kvgrid', 'Reset Grid')
                ])
            ],
        ],
    ]);
    ?>

</div>
