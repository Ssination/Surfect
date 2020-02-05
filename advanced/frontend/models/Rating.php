<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rating".
 *
 * @property int $id_rating
 * @property int $rating
 * @property string $id_user
 * @property int $id_produto
 *
 * @property Products $produto
 * @property User $user
 */
class Rating extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rating';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rating', 'id_user', 'id_produto'], 'required'],
            [['rating', 'id_produto'], 'integer'],
            [['id_user'], 'string', 'max' => 50],
            [['id_produto'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['id_produto' => 'product_id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'email']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_rating' => 'Id Rating',
            'rating' => 'Rating',
            'id_user' => 'Id User',
            'id_produto' => 'Id Produto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduto()
    {
        return $this->hasOne(Products::className(), ['product_id' => 'id_produto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['email' => 'id_user']);
    }
}
