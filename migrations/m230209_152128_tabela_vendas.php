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

        $this->addForeignKey(

            'Fk-vendas-id_cliente',
            'vendas',
            'id_cliente',
            'cliente',
            'id',
            'RESTRICT'

        );

        $this->addForeignKey(

            'Fk-vendas-id_produto',
            'vendas',
            'id_produto',
            'produtos',
            'id',
            'RESTRICT'

        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropForeignKey(
            'fk-post-id_produto',
            'vendas'
        );

        $this->dropForeignKey(
            'fk-post-id_cliente',
            'vendas'
        );

        $this->dropTable('vendas');

    }
    
}
