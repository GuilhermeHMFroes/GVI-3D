<?php

use yii\db\Migration;

/**
 * Class m230216_174024_tabela_vendas_produto
 */
class m230216_174024_tabela_vendas_produto extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('vendas_produto', [

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

    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {

        $this->dropForeignKey(
            'fk-post-id_vendas',
            'vendas_produto'
        );

        $this->dropForeignKey(
            'fk-post-id_produto',
            'vendas_produto'
        );

        $this->dropTable('vendas_produto');
        
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230216_174024_tabela_vendas_produto cannot be reverted.\n";

        return false;
    }
    */
}
