<?php
namespace core\entities\User;

use core\entities\User\Wallet;
use core\forms\auth\SignupForm;
use core\forms\User\UserForm;
use core\helpers\DateHelper;
use core\helpers\GoogleAthenticatorHelper;
use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Exception;
use yii\web\IdentityInterface;
use yii\web\UploadedFile;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $fullname
 * @property string $email
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email_confirm_token
 * @property string $phone
 * @property string $avatar_id
 * @property string $wallet
 * @property string $auth_key
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_WAIT = 0;
    const STATUS_ALMOST=5;
    const STATUS_ACTIVE = 10;

public static function requestSignup(SignupForm $form)
{
    $user = new User();
    $user->username = $form->username;
    $user->fullname=$form->fullname;
    $user->email = $form->email;
    $user->phone=$form->phone;
    $user->avatar_id=$form->avatar_id;
    $user->wallet=100;
    $user->setPassword($form->password);
    $user->created_at = (new \DateTime())->getTimestamp();
    $user->status = self::STATUS_WAIT;
    $user->email_confirm_token = Yii::$app->security->generateRandomString();
    $user->generateAuthKey();
    return $user;
}

    public static function create(UserForm $form)
    {
        $user = new User();
        $user->username = $form->username;
        $user->fullname=$form->fullname;
        $user->email = $form->email;
        $user->phone=$form->phone;
        $user->avatar_id=$form->avatar_id;
        $user->wallet=$form->wallet;
        $user->setPassword($form->password);
        $user->created_at = (new \DateTime())->getTimestamp();
        $user->status = self::STATUS_WAIT;
        $user->generateAuthKey();
        return $user;
    }

    public function edit(UserForm $form)
    {
        $this->username = $form->username;
        $this->fullname=$form->fullname;
        $this->email = $form->email;
        $this->phone=$form->phone;
        $this->avatar_id=$form->avatar_id;
        $this->wallet=$form->wallet;
        $this->username=$form->username;
        $form->password===''?:$this->setPassword($form->password);
        $this->updated_at=time();
    }

//    public function getAuthSalt()
//    {
//        if($this->auth_salt)
//        {
//            return true;
//        }
//        return false;
//    }
    public function isWait()
    {
        if($this->status == static::STATUS_WAIT)
        {
            return true;
        }
        return false;
    }
    public function isAlmost()
    {
        if($this->status == static::STATUS_ALMOST)
        {
            return true;
        }
        return false;
    }

    public function isActive()
    {
        if($this->status == static::STATUS_ACTIVE)
        {
            return true;
        }
        return false;
    }


    public function confirmSignup()
    {
        if(!$this->isWait())
        {
            throw new \DomainException('User is already confirmed signup.');
        }
        $this->status=static::STATUS_ALMOST;
        $this->removeEmailConfirmToken();
    }

    public function finishSignup()
    {
        if(!$this->isAlmost() || !$this->getGAAuthToken())
        {
            throw new \DomainException('Signup procedure violation.');
        }
        $this->status=static::STATUS_ACTIVE;
    }


    public function getName()
    {
        return $this->username;
    }

    public function getUsernameAndFullName()
    {
        return $this->username." ({$this->fullname})";
    }

    public function getFullName()
    {
        return $this->fullname;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function getStatus()
    {
        return $this->status;
    }

//    public function getPassword()
//    {
//        return $this->password;
//    }
    public static function tableName()
    {
        return '{{%users}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            [
                'class'=>SaveRelationsBehavior::className(),
                'relations'=>['photos'],
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    public function requestPasswordReset()
    {
        if (!User::isPasswordResetTokenValid($this->password_reset_token)) {
            $this->generatePasswordResetToken();
            if (!$this->save()) {
                return false;
            }
            return true;
        }
    }
    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateGAAuthCode($authCode)
    {
        return GoogleAthenticatorHelper::checkGACode($this->getGAAuthToken(), $authCode);
    }

//    public function getGAAuthToken()
//    {
//        return GoogleAthenticatorHelper::getSecret($this->id);
//    }
    public function getGAAuthToken()
    {
        return $this->ga_key;
    }
    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }


    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }


    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    public function generateEmailConfirmToken()
    {
        $this->email_confirm_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public function removeEmailConfirmToken()
    {
        $this->email_confirm_token = null;
    }


    public function resetPassword($password)
    {
        if(empty($this->password_reset_token))
        {
            throw new \DomainException('Password resetting was not requested.');
        }
//        $this->setPassword($this->password);
        $this->setPassword($password);
        $this->removePasswordResetToken();
        return $this->save(false);
    }


    // USER IMAGES
    public function getPhotos()
    {
        return $this->hasMany(UserPhoto::className(),['user_id'=>'id']);
    }

    public function getAvatar()
    {
        return $this->hasOne(UserPhoto::className(),['id'=>'avatar_id']);
    }

    public function addPhoto(UploadedFile $file)
    {
        $photos = $this->photos;
        $photos[] = UserPhoto::create($file);
        $this->updatePhotos($photos);
    }

    public function removePhoto($id)
    {
        $photos = $this->photos;
        foreach ($photos as $i => $photo) {
            if ($photo->isIdEqualTo($id)) {
                unset($photos[$i]);
                $this->updatePhotos($photos);
                return;
            }
        }
        throw new \DomainException('Photo is not found.');
    }

    public function removePhotos()
    {
        $this->updatePhotos([]);
    }

    private function updatePhotos(array $photos)
    {
        foreach ($photos as $i => $photo) {
            $photo->setSort($i);
        }
        $this->photos = $photos;
        $this->populateRelation('avatar_id', reset($photos));
    }

    // END USER IMAGES

    public function goHome()
    {
        return Yii::$app->response->redirect(['/cabinet']);
    }


    public function goEdit()
    {
        return '/cabinet/edit';
    }


    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            foreach ($this->photos as $photo) {
                $photo->delete();
            }
            return true;
        }
        return false;
    }

    public function afterFind()
    {
//        $this->created_at=DateHelper::convertDate($this->created_at);
        return parent::afterFind();
    }

    public function getWallets()
    {
        return $this->hasMany(Wallet::class, ['user_id'=>'id']);
    }

    public function afterSave($insert, $changedAttributes)
    {
        $related = $this->getRelatedRecords();
        parent::afterSave($insert, $changedAttributes);

        if (array_key_exists('avatar_id', $related)) {
            $this->updateAttributes(['avatar_id' => $related['avatar_id'] ? $related['avatar_id']->id : null]);
        }
    }
}