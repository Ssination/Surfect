<?php
namespace frontend\models;

use kartik\date\DatePicker;
use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $name;
    public $surname;
    public $email;
    public $password;
    public $gender;
    public $male;
    public $female;
    public $phone;
    public $birth_date;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['name', 'trim'],
            ['name', 'required'],
            ['name', 'string', 'min' => 2, 'max' => 255],
            ['surname', 'trim'],
            ['surname', 'required'],
            ['surname', 'string', 'min'=>2,'max'=> 255],
            ['phone', 'trim'],
            ['phone', 'required'],
            ['phone', 'string', 'min'=>11,'max'=>11],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            ['female', 'boolean'],
            ['male', 'boolean'],
            ['password', 'trim'],
            ['password', 'string', 'min' => 6],
            ['birth_date','trim'],
            ['birth_date', 'string','min'=>10,'max'=>10],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {


        if (!$this->validate()) {
            return null;
        }$user = new User();

        if (!$this->male==1&&$this->female==1) {
            $this->gender='F';
        }
        if($this->male==1&&!$this->female==1){
            $this->gender='M';
        }
        if(!$this->male==1&&!$this->female==1){
            $this->gender='M';
        }
        $user->birth_date=$this->birth_date;
        $user->name = $this->name;
        $user->surname = $this->surname;
        $user->email = $this->email;
        $user->gender=$this->gender;
        $user->phone_number=$this->phone;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        return $user->save() && $this->sendEmail($user);

    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
