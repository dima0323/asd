<?php

use yii\db\Migration;

class m170719_172738_insert_journal_author extends Migration
{
    public function safeUp()
    {
        $this->insert('journal_author',array(
         'author_id'=>'1',
         'journal_id'=>'1',
        ));
        
        $this->insert('journal_author',array(
         'author_id'=>'4',
         'journal_id'=>'1',
        ));
        
        $this->insert('journal_author',array(
         'author_id'=>'2',
         'journal_id'=>'2',
        ));
        
        $this->insert('journal_author',array(
         'author_id'=>'3',
         'journal_id'=>'2',
        ));
        
        $this->insert('journal_author',array(
         'author_id'=>'6',
         'journal_id'=>'2',
        ));
        
         $this->insert('journal_author',array(
         'author_id'=>'1',
         'journal_id'=>'3',
        ));
        
         $this->insert('journal_author',array(
         'author_id'=>'3',
         'journal_id'=>'3',
        ));
        
         $this->insert('journal_author',array(
         'author_id'=>'7',
         'journal_id'=>'4',
        ));
        
        $this->insert('journal_author',array(
         'author_id'=>'8',
         'journal_id'=>'4',
        ));
        
        $this->insert('journal_author',array(
         'author_id'=>'1',
         'journal_id'=>'5',
        ));
        
        $this->insert('journal_author',array(
         'author_id'=>'3',
         'journal_id'=>'5',
        ));
    }

    public function safeDown()
    {
        echo "m170719_172738_insert_journal_author cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170719_172738_insert_journal_author cannot be reverted.\n";

        return false;
    }
    */
}
