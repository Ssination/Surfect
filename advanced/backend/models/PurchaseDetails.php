<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "purchase_details".
 *
 * @property int $purchase_id
 * @property string $email
 * @property int $quantity
 * @property string $price
 * @property string $subtotal
 *
 * @property Purchases $purchase
 * @property User $email0
 */
class PurchaseDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'purchase_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['purchase_id', 'email', 'quantity', 'price', 'subtotal'], 'required'],
            [['purchase_id', 'quantity'], 'integer'],
            [['price', 'subtotal'], 'number'],
            [['email'], 'string', 'max' => 65],
            [['purchase_id'], 'exist', 'skipOnError' => true, 'targetClass' => Purchases::className(), 'targetAttribute' => ['purchase_id' => 'purchase_id']],
            [['email'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['email' => 'email']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'purchase_id' => 'Purchase ID',
            'email' => 'Email',
            'quantity' => 'Quantity',
            'price' => 'Price',
            'subtotal' => 'Subtotal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchase()
    {
        return $this->hasOne(Purchases::className(), ['purchase_id' => 'purchase_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmail0()
    {
        return $this->hasOne(User::className(), ['email' => 'email']);
    }
}
