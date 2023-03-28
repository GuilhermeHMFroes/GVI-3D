<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material".
 *
 * @property int $id
 * @property string $tipo
 * @property float $valor
 * @property string $especificacoes
 * @property string $descricao
 * @property string $imagem
 *
 * @property Produto[] $produtos
 */
class Material extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'material';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo', 'valor', 'especificacoes', 'descricao', 'imagem'], 'required'],
            [['valor'], 'number'],
            [['especificacoes', 'descricao'], 'string'],
            [['tipo', 'imagem'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo' => 'Tipo',
            'valor' => 'Valor',
            'especificacoes' => 'Especificacoes',
            'descricao' => 'Descricao',
            'imagem' => 'Imagem',
        ];
    }

    /**
     * Gets query for [[Produtos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produto::class, ['id_material' => 'id']);
    }
}
