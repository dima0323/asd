<?php

use yii\db\Migration;

class m170718_173535_create_author extends Migration
{
    public function safeUp()
    {
		$this->createTable('author', [
            'id' => $this->primaryKey(),
            'surname' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('author');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170718_173535_create_author cannot be reverted.\n";

        return false;
    }
    */
}
