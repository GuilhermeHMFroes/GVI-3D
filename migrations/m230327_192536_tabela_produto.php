<?php

use yii\db\Migration;

/**
 * Class m230327_192536_tabela_produto
 */
class m230327_192536_tabela_produto extends Migration
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
            'imagem' => $this->string()->notNull(),
            'linkShopee' => $this->string()->notNull(),
            'linkAmazon' => $this->string()->notNull(),
            'linkMercadoLivre' => $this->string()->notNull(),

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

        $this->alterColumn('produto', 'id', $this->integer()->notNull()->append('AUTO_INCREMENT'));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'Fk-produto-id_material',
            'produto'
        );

        if ($this->db->schema->getTableSchema('produto')->getColumn('imagem')) {
            $this->dropColumn('produto', 'imagem');
        }

        $this->dropTable('produto');
    }
}
