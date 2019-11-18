<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property string $email
 * @property string $name
 * @property string $surname
 * @property string $birth_date
 * @property string $gender
 * @property int $phone_number
 * @property string $password
 * @property int $height
 * @property string $weight
 *
 * @property Adresses[] $adresses
 * @property PurchaseDetails[] $purchaseDetails
 * @property Purchases[] $purchases
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            [['birth_date'], 'safe'],
            [['gender'], 'string'],
            [['phone_number', 'height'], 'integer'],
            [['weight'], 'number'],
            [['email', 'name', 'surname', 'password'], 'string', 'max' => 65],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'email' => 'Email',
            'name' => 'Name',
            'surname' => 'Surname',
            'birth_date' => 'Birth Date',
            'gender' => 'Gender',
            'phone_number' => 'Phone Number',
            'password' => 'Password',
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
