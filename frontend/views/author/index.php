<?
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

?>
<div class="row">
    <div class="col-xs-4"><h3>Авторы</h3></div>
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
    
    
    
