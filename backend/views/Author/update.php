<?php

use yii\helpers\Html;

$this->title = 'Редактирование автора: ' . $model->name;

?>
<div class="author-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
