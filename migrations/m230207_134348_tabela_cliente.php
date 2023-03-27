<?php

use yii\db\Migration;

/**
 * Class m230207_134348_tabela_cliente
 */
class m230207_134348_tabela_cliente extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('cliente', [
            'id' => $this->primaryKey(),
            'nome' => $this->string()->notNull(),
            'endereco' => $this->text()->notNull(),
            'email' => $this->string(),
            'telefone' => $this->string()->notNull(),
        ]);

    }

    $this->alterColumn('cliente', 'id', 'AUTO_INCREMENT');

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('cliente');

    }

}
