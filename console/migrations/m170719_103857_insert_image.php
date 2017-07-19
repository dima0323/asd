<?php

use yii\db\Migration;

class m170719_103857_insert_image extends Migration
{
    public function safeUp()
    {
        $this->insert('image',array(
         'journal_id'=>'1',
        ));
        
        $this->insert('image',array(
         'journal_id'=>'2',
        ));
        
        $this->insert('image',array(
         'journal_id'=>'3',
        ));
        
        $this->insert('image',array(
         'journal_id'=>'4',
        ));
        
        $this->insert('image',array(
         'journal_id'=>'5',
        ));
    }

    public function safeDown()
    {
        echo "m170719_103857_insert_image cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170719_103857_insert_image cannot be reverted.\n";

        return false;
    }
    */
}
