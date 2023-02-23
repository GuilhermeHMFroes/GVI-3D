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
            'frete' => $this->boolean()->notNull(),
            'descricao' => $this->text()->notNull(),
            'pagamento' => $this->string()->notNull(),

            'id_cliente' =>  $this->integer()->notNull(),

        ]);

        $this->addForeignKey(

            'Fk-vendas-id_cliente', //nome da chave estrangeira
            'vendas', //qual tabela possui a chave estrangeira
            'id_cliente', //qual campo é a chave estrangeira
            'cliente', //tabela que é referenciada
            'id', //campo que é referenciado
            'RESTRICT' //tipo de implicação no update e no delete

        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropForeignKey(
            'fk-post-id_cliente',
            'vendas'
        );

        $this->dropTable('vendas');

    }
    
}
