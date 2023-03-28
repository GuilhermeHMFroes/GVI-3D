<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produto".
 *
 * @property int $id
 * @property string $nome
 * @property float $tamanho
 * @property float $peso
 * @property string $descricao
 * @property float $valor
 * @property string $imagem
 * @property string $linkShopee
 * @property string $linkAmazon
 * @property string $linkMercadoLivre
 * @property int $id_material
 *
 * @property Material $material
 */
class Produto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'tamanho', 'peso', 'descricao', 'valor', 'imagem', 'linkShopee', 'linkAmazon', 'linkMercadoLivre', 'id_material'], 'required'],
            [['tamanho', 'peso', 'valor'], 'number'],
            [['descricao'], 'string'],
            [['id_material'], 'integer'],
            [['nome', 'imagem', 'linkShopee', 'linkAmazon', 'linkMercadoLivre'], 'string', 'max' => 255],
            [['id_material'], 'exist', 'skipOnError' => true, 'targetClass' => Material::class, 'targetAttribute' => ['id_material' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'tamanho' => 'Tamanho',
            'peso' => 'Peso',
            'descricao' => 'Descricao',
            'valor' => 'Valor',
            'imagem' => 'Imagem',
            'linkShopee' => 'Link Shopee',
            'linkAmazon' => 'Link Amazon',
            'linkMercadoLivre' => 'Link Mercado Livre',
            'id_material' => 'Id Material',
        ];
    }

    /**
     * Gets query for [[Material]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMaterial()
    {
        return $this->hasOne(Material::class, ['id' => 'id_material']);
    }
}
