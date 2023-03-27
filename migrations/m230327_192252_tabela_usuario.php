<?php

use yii\db\Migration;

/**
 * Class m230327_192252_tabela_usuario
 */
class m230327_192252_tabela_usuario extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('usuario', [
            'id' => $this->primaryKey(),
            'nome' => $this->string()->notNull(),
            'endereco' => $this->text()->notNull(),
            'email' => $this->string(),
            'senha' => $this->string(),
            'telefone' => $this->string()->notNull(),
        ]);

        $this->alterColumn('usuario', 'id', $this->integer()->notNull()->append('AUTO_INCREMENT'));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('cliente');
    }
}
