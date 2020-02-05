<?php
namespace frontend\models;

use common\widgets\Alert;
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
    public $phone;
    public $birth_date;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['gender', 'string'],
            ['gender', 'required','message' => 'Preenchimento obrigatório.'],
            ['name', 'trim'],
            ['name', 'required','message' => 'Preenchimento obrigatório.'],
            ['name', 'string', 'min' => 2, 'max' => 255],
            ['surname', 'trim'],
            ['surname', 'required','message' => 'Preenchimento obrigatório.'],
            ['surname', 'string', 'min'=>2,'max'=> 255],
            ['phone', 'trim'],
            ['phone', 'required','message' => 'Preenchimento obrigatório.'],
            ['phone', 'string', 'min'=>11,'max'=>11],
            ['email', 'trim'],
            ['email', 'required','message' => 'Preenchimento obrigatório.'],
            ['email', 'email', 'message' => 'É obrigatório preencher um email válido.'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Email já está registado.'],
            ['password', 'trim'],
            ['password','required','message' => 'Preenchimento obrigatório.'],
            ['password', 'string', 'min' => 6,'message' => 'Preenchimento obrigatório.'],
            ['birth_date','trim'],
            ['birth_date', 'string','min'=>10,'max'=>10,'message' => 'Preenchimento obrigatório.'],
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

        $user->birth_date=$this->birth_date;
        $user->name = $this->name;
        $user->surname = $this->surname;
        $user->email = $this->email;
        $user->gender=$this->gender;
        $user->phone_number=$this->phone;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        return $user->save() ;//&& $this->sendEmail($user);

    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
   /* protected function sendEmail($user)
    {
        return Yii::$app
           // ->mailer
            ->compose(
               // ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
           // ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }*/
}
