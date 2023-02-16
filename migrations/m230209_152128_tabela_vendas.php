<?php

use yii\db\Migration;

/**
 * Class m230209_152128_tabela_vendas
 */
class m230209_152128_tabela_vendas extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('vendas', [

            'id' => $this->primaryKey(),
            'id_cliente' => $this->integer()->notNull(),
            'id_produto' => $this->integer()->notNull(),
            'valor total' => $this->float()->notNull(),
            'frete' => $this->boolean()->notNull(),
            'descricao' => $this->text()->notNull(),

        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {

        $this->dropTable('vendas');

    }
    
}
