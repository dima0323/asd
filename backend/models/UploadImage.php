<?php

namespace backend\models;

use yii\base\Model;
use yii\web\UploadedFile;
use common\models\Image;

class UploadImage extends Model{

    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file',  'extensions' => 'png, jpg'],
        ];
    }
    
    public function upload(Image $image)
    {
        if ($this->validate()) {
            $this->imageFile->saveAs($image->getPath());
            return true;
        } else {
            return false;
        }
    }

}