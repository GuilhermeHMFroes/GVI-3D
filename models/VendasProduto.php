<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vendas_produto".
 *
 * @property float $valor
 * @property int $quantidade
 * @property int $id_vendas
 * @property int $id_produto
 *
 * @property Vendas $produto
 * @property Vendas $vendas
 */
class VendasProduto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vendas_produto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['valor', 'quantidade', 'id_vendas', 'id_produto'], 'required'],
            [['valor'], 'number'],
            [['quantidade', 'id_vendas', 'id_produto'], 'integer'],
            [['id_produto'], 'exist', 'skipOnError' => true, 'targetClass' => Vendas::class, 'targetAttribute' => ['id_produto' => 'id']],
            [['id_vendas'], 'exist', 'skipOnError' => true, 'targetClass' => Vendas::class, 'targetAttribute' => ['id_vendas' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'valor' => 'Valor',
            'quantidade' => 'Quantidade',
            'id_vendas' => 'Id Vendas',
            'id_produto' => 'Id Produto',
        ];
    }

    /**
     * Gets query for [[Produto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduto()
    {
        return $this->hasOne(Vendas::class, ['id' => 'id_produto']);
    }

    /**
     * Gets query for [[Vendas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVendas()
    {
        return $this->hasOne(Vendas::class, ['id' => 'id_vendas']);
    }
}
