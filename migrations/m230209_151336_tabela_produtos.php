<?php

use yii\db\Migration;

/**
 * Class m230209_151336_tabela_produtos
 */
class m230209_151336_tabela_produtos extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('produtos', [

            'id' => $this->primaryKey(),
            'nome' => $this->string()->notNull(),
            'tamanho' => $this->float()->notNull(),
            'peso' => $this->float()->notNull(),
            'descricao' => $this->text()->notNull(),
            'material' => $this->string()->notNull(),
            'acabamento' => $this->boolean()->notNull(),
            'valor' => $this->float()->notNull(),

        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        /*$this->dropForeignKey(
            'fk-produtos-author_id',
            'post'
        );*/
        $this->dropTable('produtos');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230209_151336_tabela_produtos cannot be reverted.\n";

        return false;
    }
    */
}
