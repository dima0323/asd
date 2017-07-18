<?php
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;

?>
<div class="row">
    <div class="col-xs-4"><h3>Каталог журналов</h3></div>
    <div class="col-xs-8"><h3><?= Html::encode($title) ?></h3></div>
</div>

<div class="row">
    <?Pjax::begin();?>
        <?= ListView::widget([
                'dataProvider' => $journalsDataProvider,
                'itemView' => '_journals',
        ]) ?>  
    <?Pjax::end();?>
</div>

