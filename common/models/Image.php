<?php

namespace common\models;

use Yii;
use \yii\db\ActiveRecord;

class Image extends ActiveRecord
{	 
    public static function tableName()
    {
        return 'image';
    }

    public function rules()
    {
        return [
            [['journal_id'], 'required'],
            [['journal_id'], 'integer'],
            [['journal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Journal::className(), 'targetAttribute' => ['journal_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => '№',
            'journal_id' => 'Номер журнала',
        ];
    }

    public function getJournal()
    {
        return $this->hasOne(Journal::className(), ['id' => 'journal_id']);
    }
	
    protected function getHash()
    {
        return md5($this->journal_id . '-' . $this->id);
    }

    public function getPath()
    {
        return Yii::getAlias('@frontend/web/images/' . $this->getHash() . '.jpg');
    }

    public function getUrl()
    {
        return Yii::getAlias('@frontendWebroot/images/' . $this->getHash() . '.jpg');
    }

    public function afterDelete()
    {
        unlink($this->getPath());
        parent::afterDelete();
    }
}