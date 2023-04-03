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
            'email' => $this->string()->unique(),
            'senha' => $this->string()->notNull(),
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
