<?php
use yii\helpers\Html;
use yii\helpers\Markdown;
use yii\helpers\Url;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

$title = $category === null ? '' : $category->title;
$this->title = Html::encode($title);
?>
<div class="row">
    <div class="col-xs-4"><h3>Авторы</h3></div>
    <div class="col-xs-8"><h3><?= Html::encode($title) ?></h3></div>
</div>
<div class="row">
    <?=GridView::widget([
    'dataProvider'=> $dataProvider,
    'responsive'=>true,
    'hover'=>true,
    'pjax'=>true,
    'summary' => false,
    'columns' => [
            ['class' => 'kartik\grid\ExpandRowColumn',
                'value' => function ($model) {
                    return GridView::ROW_COLLAPSED;
                },
                'detail' => function ($model) {
                    $provider = new ArrayDataProvider([
                        'allModels' => $model->journals,
                        'pagination' => [
                            'pageSize' => 10,
                        ],
                        'sort' => [
                            'attributes' => ['title', 'date'],
                        ],
                    ]);
        
                    return Yii::$app->controller->renderPartial('_journals', [
                        'dataProvider' => $provider,
                    ]);
                },
            ],
            'surname',
            'name',
        ],  
]);?>
</div>
    
    
    
