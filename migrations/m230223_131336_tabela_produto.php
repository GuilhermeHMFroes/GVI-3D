<?php

use yii\db\Migration;

/**
 * Class m230223_131336_tabela_produto
 */
class m230223_131336_tabela_produto extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('produto', [

            'id' => $this->primaryKey(),
            'nome' => $this->string()->notNull(),
            'tamanho' => $this->float()->notNull(),
            'peso' => $this->float()->notNull(),
            'descricao' => $this->text()->notNull(),
            'valor' => $this->float()->notNull(),

            'id_material' => $this->integer()->notNull(),

        ]);

        $this->addForeignKey(

            'Fk-produto-id_material', //nome da chave estrangeira
            'produto', //qual tabela possui a chave estrangeira
            'id_material', //qual campo é a chave estrangeira
            'material', //tabela que é referenciada
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
            'fk-post-idMaterial',
            'produto'
        );

        $this->dropTable('produto');

    }

}
