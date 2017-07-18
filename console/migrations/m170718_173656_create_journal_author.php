<?php

use yii\db\Migration;

class m170718_173656_create_journal_author extends Migration
{
    public function safeUp()
    {
		$this->createTable('journal_author', [
            'id' => $this->primaryKey(),
            'author_id' => $this->integer()->notNull(),
            'journal_id' => $this->integer()->notNull(),
           
        ]);
        
         $this->createIndex(
            'idx-journal_author-author_id',
            'journal_author',
            'author_id'
        );
        
        $this->addForeignKey(
            'fk-journal_author-author_id',
            'journal_author',
            'author_id',
            'author',
            'id',
            'CASCADE'
        );
        
        
        $this->createIndex(
            'idx-journal_author-journal_id',
            'journal_author',
            'journal_id'
        );
        
        $this->addForeignKey(
            'fk-journal_author-journal_id',
            'journal_author',
            'journal_id',
            'journal',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-journal_author-author_id',
            'journal_author'
        );

        $this->dropIndex(
            'idx-journal_author-author_id',
            'journal_author'
        );
        
         $this->dropForeignKey(
            'fk-journal_author-journal_id',
            'journal_author'
        );

        $this->dropIndex(
            'idx-journal_author-journal_id',
            'journal_author'
        );
        
       $this->dropTable('journal');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170718_173656_create_journal_author cannot be reverted.\n";

        return false;
    }
    */
}
