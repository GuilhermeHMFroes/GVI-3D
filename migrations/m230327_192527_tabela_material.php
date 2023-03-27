<?php

use yii\db\Migration;

/**
 * Class m230327_192527_tabela_material
 */
class m230327_192527_tabela_material extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('material', [
            'id' => $this->primaryKey(),
            'tipo' => $this->string()->notNull(),
            'valor' => $this->float()->notNull(),
            'especificacoes' => $this->text()->notNull(),
        ]);

        $this->alterColumn('material', 'id', $this->integer()->notNull()->append('AUTO_INCREMENT'));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('material');
        
    }
}
