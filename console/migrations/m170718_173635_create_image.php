<?php

use yii\db\Migration;

class m170718_173635_create_image extends Migration
{
    public function safeUp()
    {
		$this->createTable('image', [
            'id' => $this->primaryKey(),
            'journal_id' => $this->integer()->notNull(),
        ]);
        
        $this->createIndex(
            'idx-image-journal_id',
            'image',
            'journal_id'
        );
        
        $this->addForeignKey(
            'fk-image-journal_id',
            'image',
            'journal_id',
            'journal',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
       $this->dropForeignKey(
            'fk-image-journal_id',
            'image'
        );

        $this->dropIndex(
            'idx-image-journal_id',
            'image'
        );
        
        $this->dropTable('image');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170718_173635_create_image cannot be reverted.\n";

        return false;
    }
    */
}
