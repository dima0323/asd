<?php

use yii\helpers\Html;

$this->title = 'Редактирование Журнала: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Журналы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="journal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'uploadForm' => $uploadForm,
        'authors' => $authors,
        'selectAuthors' => $selectAuthors,
    ]) ?>

</div>
