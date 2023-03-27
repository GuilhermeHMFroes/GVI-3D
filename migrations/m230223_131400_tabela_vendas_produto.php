<?php

use yii\db\Migration;

/**
 * Class m230223_131400_tabela_vendas_produto
 */
class m230223_131400_tabela_vendas_produto extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('vendas_produto', [

            'id' => $this->primaryKey(),
            'valor' => $this->float()->notNull(),
            'quantidade' => $this->integer()->notNull(),
            
            'id_vendas' => $this->integer()->notNull(),
            'id_produto' =>  $this->integer()->notNull(),

        ]);

        $this->addForeignKey(

            'Fk-vendas_produto-id_vendas', //nome da chave estrangeira
            'vendas_produto', //qual tabela possui a chave estrangeira
            'id_vendas', //qual campo é a chave estrangeira
            'vendas', //tabela que é referenciada
            'id', //campo que é referenciado
            'RESTRICT' //tipo de implicação no update e no delete

        );

        $this->addForeignKey(

            'Fk-vendas_produto-id_produto', //nome da chave estrangeira
            'vendas_produto', //qual tabela possui a chave estrangeira
            'id_produto', //qual campo é a chave estrangeira
            'vendas', //tabela que é referenciada
            'id', //campo que é referenciado
            'RESTRICT' //tipo de implicação no update e no delete

        );

        $this->alterColumn('vendas_produto', 'id', $this->integer()->notNull()->append('AUTO_INCREMENT'));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'Fk-vendas_produto-id_vendas',
            'vendas_produto'
        );

        $this->dropForeignKey(
            'Fk-vendas_produto-id_produto',
            'vendas_produto'
        );

        $this->dropTable('vendas_produto');
    }

}
