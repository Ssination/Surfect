<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string $verification_token
 * @property string $name
 * @property string $surname
 * @property string $birth_date
 * @property string $gender
 * @property string $phone_number
 * @property int $height
 * @property string $weight
 *
 * @property Adresses[] $adresses
 * @property PurchaseDetails[] $purchaseDetails
 * @property Purchases[] $purchases
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['auth_key', 'password_hash', 'email', 'created_at', 'updated_at', 'name', 'surname', 'birth_date', 'gender', 'phone_number'], 'required'],
            [['status', 'created_at', 'updated_at', 'height'], 'integer'],
            [['gender'], 'string'],
            [['weight'], 'number'],
            [['auth_key'], 'string', 'max' => 32],
            [['password_hash', 'password_reset_token', 'verification_token'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 50],
            [['name', 'surname'], 'string', 'max' => 65],
            [['birth_date'], 'string', 'max' => 10],
            [['phone_number'], 'string', 'max' => 11],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'verification_token' => 'Verification Token',
            'name' => 'Name',
            'surname' => 'Surname',
            'birth_date' => 'Birth Date',
            'gender' => 'Gender',
            'phone_number' => 'Phone Number',
            'height' => 'Height',
            'weight' => 'Weight',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdresses()
    {
        return $this->hasMany(Adresses::className(), ['email' => 'email']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseDetails()
    {
        return $this->hasMany(PurchaseDetails::className(), ['email' => 'email']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchases()
    {
        return $this->hasMany(Purchases::className(), ['email' => 'email']);
    }
}
