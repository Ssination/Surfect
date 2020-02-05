<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "purchase_details".
 *
 * @property int $purchase_id
 * @property string $email
 * @property int $quantity
 * @property float $price
 * @property float $subtotal
 * @property int $product_id
 * @property string $size
 *
 * @property Purchases $purchase
 * @property User $email0
 * @property Products $product
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
            [['purchase_id', 'email', 'quantity', 'price', 'subtotal', 'product_id', 'size'], 'required'],
            [['purchase_id', 'quantity', 'product_id'], 'integer'],
            [['price', 'subtotal'], 'number'],
            [['email'], 'string', 'max' => 65],
            [['size'], 'string', 'max' => 50],
            [['purchase_id'], 'exist', 'skipOnError' => true, 'targetClass' => Purchases::className(), 'targetAttribute' => ['purchase_id' => 'purchase_id']],
            [['email'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['email' => 'email']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'product_id']],
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
            'product_id' => 'Product ID',
            'size' => 'Size',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['product_id' => 'product_id']);
    }
}
