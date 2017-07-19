<?php

use yii\db\Migration;

class m170719_103848_insert_journal extends Migration
{
    public function safeUp()
    {
        $this->insert('journal',array(
         'title'=>'Aviso',
         'description' =>'Газета "Авизо (Aviso)" в г. Одесса выходит тиражом 20 000 экземпляров еженедельно. Издается с января 1991 года. С июля 1997 года работает служба AVISO Online. Авизо — единственная в Украине газета, которая входит в Международную Ассоциацию рекламных СМИ ICMA, что дает возможность клиентам публиковать информацию в любом из 127 городов 32 стран мира.',
         'date' => '1994-03-12',
        ));
        
        $this->insert('journal',array(
         'title'=>'АвтоГород',
         'description' =>' Журнал "АвтоГород" - издание, которое дает информацию о продаже-покупке автомобилей и всех автотоваров: расходных материалов, комплектующих, запчастей, аксессуаров, услуг и т.д. Это еженедельник для тех, кто продает и покупает, работает в автобизнесе, планирует покупку, интересуется изменением цен на авторынке. ',
         'date' => '1998-05-03',
        ));
        
        $this->insert('journal',array(
         'title'=>'Бульвар искуств',
         'description' =>'Бульвар искусств – ежемесячное издание о культурно-развлекательной жизни. Бульвар искусств отражает разнообразные события культурной жизни города и страны. В каждом номере собрана информация , посвященная деятельности театров, музеев, галерей, киноклубов и других объектов культурной жизни. ',
         'date' => '2002-12-12',
        ));
        
        $this->insert('journal',array(
         'title'=>'Одесская жизнь',
         'description' =>'Одесская жизнь – еженедельная общественная газета об Одессе и одесситах. Издание освещает такие темы: социальные вопросы жизни города и области; обзор наиболее значимых общественных и политических событий в городе и регионе. Анонсы событий, спортивная, театральная и выставочная афиша',
         'date' => '2005-04-11',
        ));
        
         $this->insert('journal',array(
         'title'=>'Business Realty',
         'description' =>'В еженедельнике «Business Realty ua» представлены все аспекты рынка коммерческой недвижимости Украины: офисная, торговая, производственная, складская недвижимость, рестораны, автосервис. Покупка, продажа, аренда . Первичный и вторичный рынки. Инвестиционные проекты, действующий бизнес. Юридические, консалтинговые и риелторские услуги. Экспертная оценка, аудит. ',
         'date' => '2005-02-21',
        ));
    }

    public function safeDown()
    {
        echo "m170719_103848_insert_journal cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170719_103848_insert_journal cannot be reverted.\n";

        return false;
    }
    */
}