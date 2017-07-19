<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
///use kartik\datetime\DateTimePicker;
?>

<div class="journal-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textArea(['maxlength' => true, 'rows' => '6']) ?>

    <?= $form->field($model, 'date')->textInput() ?>
    
	
	<?= $form->field($selectAuthors, 'authors[]')->dropDownList(ArrayHelper::map($authors, 'id', 'surname'), ['multiple' => 'true']) ?>
    
    <?if (isset($model->images)) {
             echo Html::img($model->images->getUrl(), ['width' => '200px']);
        } 
    ?>
    
    <?= $form->field($uploadForm, 'imageFile')->fileInput(['accept' => 'image/*']) ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    
    
    <?php ActiveForm::end(); ?>

</div>
