<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Журнал: '.$model->title;
$this->params['breadcrumbs'][] = ['label' => 'Журналы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'description',
            'date',
            [
                'attribute' => 'authors',
                'value' => function($model) {
                    return $model->listAuthors();   
                }
            ],
            [
                'attribute' => 'img',
                'format' => 'raw',
                'value' => function($model) {
                        if (isset($model->images)) {
                            return Html::img($model->images->getUrl(), ['width' => '200px']);
                        }  
                    }
            ],
        ],
    ]) ?>
</div>
