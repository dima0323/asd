<?php

use yii\helpers\Html;

$this->title = 'Create Journal';
$this->params['breadcrumbs'][] = ['label' => 'Journals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'uploadForm' => $uploadForm,
		'authors' => $authors,
        'selectAuthors' => $selectAuthors,
    ]) ?>

</div>
