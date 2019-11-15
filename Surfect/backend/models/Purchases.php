<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "purchases".
 *
 * @property int $purchase_id
 * @property string $purchase_date
 * @property int $adress_id
 * @property string $email
 * @property int $payment_id
 *
 * @property PurchaseDetails[] $purchaseDetails
 * @property Adresses $adress
 * @property User $email0
 * @property Payments $payment
 */
class Purchases extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'purchases';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
           [['purchase_date', 'adress_id', 'email', 'payment_id'], 'required'],
            [['purchase_date'], 'safe'],
            [['adress_id', 'payment_id'], 'integer'],
            [['email'], 'string', 'max' => 65],
            [['adress_id'], 'exist', 'skipOnError' => true, 'targetClass' => Adresses::className(), 'targetAttribute' => ['adress_id' => 'adress_id']],
            [['email'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['email' => 'email']],
            [['payment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Payments::className(), 'targetAttribute' => ['payment_id' => 'payment_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'purchase_id' => 'Purchase ID',
            'purchase_date' => 'Purchase Date',
            'adress_id' => 'Adress ID',
            'email' => 'Email',
            'payment_id' => 'Payment ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseDetails()
    {
        return $this->hasMany(PurchaseDetails::className(), ['purchase_id' => 'purchase_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdress()
    {
        return $this->hasOne(Adresses::className(), ['adress_id' => 'adress_id']);
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
    public function getPayment()
    {
        return $this->hasOne(Payments::className(), ['payment_id' => 'payment_id']);
    }
}
