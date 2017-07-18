<?php
use yii\widgets\Pjax;
use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\editable\Editable;
use yii\helpers\ArrayHelper;
?>
<h4>Журналы автора</h4>

<div>
    <?=GridView::widget([
    'dataProvider'=> $dataProvider,
    'responsive'=>true,
    'hover'=>true,
    'pjax'=>true,
    'summary' => false,
    'columns' => [
        ['class' => 'kartik\grid\SerialColumn'],
    
        'title',
        'date',
        ],  
]);?>   
</div>