<?php
use yii\helpers\Html;
?>
<h1><?= Html::encode($model->title) ?></h1>

<div class="row">
    <div class="col-xs-3">
        <div class="row">
            <div class="img">
              <?php
                    $images = $model->images;
                    if (isset($images[0])) {
                        echo Html::img($images[0]->getUrl(), ['width' => '200px']);
                    }
                    ?>
            </div>
        </div>
        <div class="row">
            <strong>Дата выпуска:</strong>  <?= $model->date ?>
        </div>
        <div class="row">
            <strong>Авторы:</strong> <?=$model->listAuthors()?>
        </div>
    </div>
    <div class="col-xs-9">
        <?= $model->description ?>
    </div>
</div>


