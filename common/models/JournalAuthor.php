<?php

namespace common\models;

use Yii;
use \yii\db\ActiveRecord;

class JournalAuthor extends ActiveRecord
{	 
    public static function tableName()
    {
        return 'journal_author';
    }

    public function rules()
    {
        return [
            [['author_id', 'journal_id'], 'required'],
            [['author_id', 'journal_id'], 'integer'],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => Author::className(), 'targetAttribute' => ['author_id' => 'id']],
            [['journal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Journal::className(), 'targetAttribute' => ['journal_id' => 'id']],
        ];
    }

    function attributeLabels()
    {
        return [
            'id' => '№',
            'author_id' => '№автора',
            'journal_id' => '№журнала',
        ];
    }

    public function getAuthor()
    {
        return $this->hasOne(Author::className(), ['id' => 'author_id']);
    }

    public function getJournal()
    {
        return $this->hasOne(Journal::className(), ['id' => 'journal_id']);
    }
    
    public function saveJA($selectAuthors, $model){
        
        $i=0;
        $journalAuthor = $this->findModel($model->id);
        $count = count($journalAuthor);
        foreach ($selectAuthors->authors as $author) {
             if($count>=$i+1){
                $journalAuthor[$i]->author_id = $author;	
                $journalAuthor[$i]->save();
             }
             else
             {
                $journalAuthor = new JournalAuthor();
                $journalAuthor->author_id = $author;
                $journalAuthor->journal_id =  $model->id;	
                $journalAuthor->save();
             }
             $i++;
         } 
        
        $this->deleteJA($journalAuthor, count($selectAuthors));
            
    }
    
    private function deleteJA($journalAuthor, $start){
        for($i=$start; $i<count($journalAuthor); $i++)
            $journalAuthor[$i]->delete();
    }
    
    
    private function findModel($id)
    {
        if (($model = $this::find()->where(['journal_id' => $id])->all()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Не существует');
        }
    }
}