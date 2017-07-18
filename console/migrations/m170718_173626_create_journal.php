<?php

use yii\db\Migration;

class m170718_173626_create_journal extends Migration
{
    public function safeUp()
    {
		$this->createTable('journal', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
            'date' => $this->date()->notNull(),
        ]);
    }

    public function safeDown()
    {
       $this->dropTable('journal');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170718_173626_create_journal cannot be reverted.\n";

        return false;
    }
    */
}
