<?php

namespace common\models;

use Yii;
//use \yii\db\ActiveRecord;

class Author extends \yii\db\ActiveRecord
{	 
    public static function tableName()
    {
        return 'author';
    }

    public function rules()
    {
        return [
            [['surname', 'name'], 'required'],
            [['surname', 'name'], 'string', 'max' => 32],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'Id',
            'surname' => 'Фамилия',
            'name' => 'Имя',
        ];
    }

   /* public function getJournalAutors()
    {
        return $this->hasMany(JournalAutor::className(), ['autor_id' => 'id']);
    }*/
    
    public function getJournals()
    {
         return $this->hasMany(Journal::className(), ['id' => 'journal_id'])
            ->viaTable('journal_author', ['author_id' => 'id']);
    }
   
}