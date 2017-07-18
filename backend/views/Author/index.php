<?php

use yii\helpers\Html;
use yii\grid\GridView;


$this->title = 'Authors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="author-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить автора', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'surname',
            'name',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
