<?php

use yii\db\Migration;

/**
 * Class m230216_151210_tabela_material
 */
class m230216_151210_tabela_material extends Migration
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

    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        $this->dropTable('material');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230216_151210_tabela_material cannot be reverted.\n";

        return false;
    }
    */
}
