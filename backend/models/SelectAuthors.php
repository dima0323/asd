<?php

namespace backend\models;

use yii\base\Model;

class SelectAuthors extends Model{

    public $authors;   
    
    public function rules()
    {
        return [
            [['authors'], 'required'],
            [['authors'], 'integer'],
        ];
    }
}