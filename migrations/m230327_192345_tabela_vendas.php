<?php

use yii\db\Migration;

/**
 * Class m230327_192345_tabela_vendas
 */
class m230327_192345_tabela_vendas extends Migration
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

            'id_usuario' =>  $this->integer()->notNull(),

        ]);

        $this->alterColumn('vendas', 'id', $this->integer()->notNull()->append('AUTO_INCREMENT'));

        $this->addForeignKey(

            'Fk-vendas-id_usuario', //nome da chave estrangeira
            'vendas', //qual tabela possui a chave estrangeira
            'id_usuario', //qual campo é a chave estrangeira
            'usuario', //tabela que é referenciada
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
            'Fk-vendas-id_cliente',
            'vendas'
        );

        $this->dropTable('vendas');

    }
}
