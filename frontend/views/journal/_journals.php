<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
<div class="row col-md-12 well">
<div class="col-md-12">
    <div class="img">
      <?
            if (isset($model->images)) {
                echo Html::img($model->images->getUrl(), ['width' => '100%']);
            }
            ?>
    </div>       
</div>
        
<div class="row">
    <div class="col-md-12"> <h4> <a href="<?=Url::to(['journal/view', 'id' => $model->id])?>"><?= Html::encode($model->title) ?></a></h4></div>
</div>
        
<div class="row">
    <div class="col-md-8"><?= $model->date ?></div>
    
</div>

</div>
</div>
