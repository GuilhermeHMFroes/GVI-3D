<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vendas".
 *
 * @property int $id
 * @property int $frete
 * @property string $descricao
 * @property string $pagamento
 * @property int $id_cliente
 *
 * @property Cliente $cliente
 * @property VendasProduto[] $vendasProdutos
 * @property VendasProduto[] $vendasProdutos0
 */
class Vendas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vendas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['frete', 'descricao', 'pagamento', 'id_cliente'], 'required'],
            [['frete', 'id_cliente'], 'integer'],
            [['descricao'], 'string'],
            [['pagamento'], 'string', 'max' => 255],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::class, 'targetAttribute' => ['id_cliente' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'frete' => 'Frete',
            'descricao' => 'Descricao',
            'pagamento' => 'Pagamento',
            'id_cliente' => 'Id Cliente',
        ];
    }

    /**
     * Gets query for [[Cliente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::class, ['id' => 'id_cliente']);
    }

    /**
     * Gets query for [[VendasProdutos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVendasProdutos()
    {
        return $this->hasMany(VendasProduto::class, ['id_produto' => 'id']);
    }

    /**
     * Gets query for [[VendasProdutos0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVendasProdutos0()
    {
        return $this->hasMany(VendasProduto::class, ['id_vendas' => 'id']);
    }
}
