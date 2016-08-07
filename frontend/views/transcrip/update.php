<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Transcript */

$this->title = 'Update Transcript: ' . ' ' . $model->Transcript_Index;
$this->params['breadcrumbs'][] = ['label' => 'Transcripts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Transcript_Index, 'url' => ['view', 'id' => $model->Transcript_Index]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="transcript-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
