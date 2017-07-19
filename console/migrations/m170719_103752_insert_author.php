<?php

use yii\db\Migration;

class m170719_103752_insert_author extends Migration
{
    public function safeUp()
    {
        $this->insert('author',array(
         'surname'=>'Андреев',
         'name' =>'Александр',
        ));
        $this->insert('author',array(
         'surname'=>'Валинуров',
         'name' =>'Валинуров',
        ));
        $this->insert('author',array(
         'surname'=>'Горинова',
         'name' =>'Юлия',
        ));
        $this->insert('author',array(
         'surname'=>'Иванов',
         'name' =>'Павел',
        ));
        $this->insert('author',array(
         'surname'=>'Ильин',
         'name' =>'Иван',
        ));
        $this->insert('author',array(
         'surname'=>'Капитонов',
         'name' =>'Александр',
        ));
        $this->insert('author',array(
         'surname'=>'Клинова',
         'name' =>'Клинова',
        ));
        $this->insert('author',array(
         'surname'=>'Муравьев',
         'name' =>'Артем',
        ));
        $this->insert('author',array(
         'surname'=>'Шарабин',
         'name' =>'Михаил',
        ));
    }

    public function safeDown()
    {
        echo "m170719_103752_insert_author cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170719_103752_insert_author cannot be reverted.\n";

        return false;
    }
    */
}
