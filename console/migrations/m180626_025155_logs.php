<?php

use yii\db\Migration;

/**
 * Class m180626_025155_logs
 */
class m180626_025155_logs extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
		$tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
		$this->createTable('{{%logs_acces}}', [
            'id' => $this->primaryKey(),
            'IP' => $this->string(15)->notNull(),
            'datetime' => $this->string(50)->notNull(),
            'type_request' => $this->string(4)->notNull(),
            'log' => $this->string(255)->notNull(),
            'email' => $this->string()->notNull(),
            'status' => $this->integer()->notNull(),
            'countbyte' => $this->integer()->notNull(),
            
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        echo "m180626_025155_logs reverted.\n";
		$this->dropTable('{{%logs_acces}}');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180626_025155_logs cannot be reverted.\n";

        return false;
    }
    */
}
