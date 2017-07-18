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
            'id' => 'Id',
            'author_id' => 'Author Id',
            'journal_id' => 'Journal Id',
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
    
    public function saveA(SelectAuthors $selectAuthors)
    {
        foreach ($selectAuthors->$authors as $author) {
				$journalAuthor = new JournalAuthor();
				$journalAuthor->author_id = $author;
				$journalAuthor->journal_id =  $model->id;	
				$journalAuthor->save();
			}
    }
}