<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\JournalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Journals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journal-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Journal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<?php Pjax::begin(); ?>    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
    
            'id',
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
<?php Pjax::end(); ?></div>
