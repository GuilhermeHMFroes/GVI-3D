<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $id
 * @property string $nome
 * @property string $endereco
 * @property string|null $email
 * @property string $senha
 * @property string $telefone
 *
 * @property Vendas[] $vendas
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'endereco', 'senha', 'telefone'], 'required'],
            [['endereco'], 'string'],
            [['nome', 'email', 'senha', 'telefone'], 'string', 'max' => 255],
            [['email'], 'unique'],
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
            'endereco' => 'Endereco',
            'email' => 'Email',
            'senha' => 'Senha',
            'telefone' => 'Telefone',
        ];
    }

    /**
     * Gets query for [[Vendas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVendas()
    {
        return $this->hasMany(Vendas::class, ['id_usuario' => 'id']);
    }
}
