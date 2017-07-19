<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Журналы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journal-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Добавить Журнал', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<?php Pjax::begin(); ?>    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
    
            'title',
            'description',
            'date',
    
            [
                'attribute' => 'authors',
                'value' => function($model) {
                    return $model->listAuthors();
                    
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>
