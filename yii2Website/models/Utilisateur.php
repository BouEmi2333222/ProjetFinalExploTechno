<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "utilisateur".
 *
 * @property int $code
 * @property string $nom
 * @property string $prenom
 * @property string $courriel
 * @property string $motDePasse
 * @property string|null $sel
 *
 * @property Role[] $codeRoles
 * @property Roleutilisateur[] $roleutilisateurs
 */
class Utilisateur extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'utilisateur';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nom', 'prenom', 'courriel', 'motDePasse'], 'required'],
            [['nom', 'prenom', 'courriel'], 'string', 'max' => 64],
            [['motDePasse', 'sel'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'code' => 'Code',
            'nom' => 'Nom',
            'prenom' => 'Prenom',
            'courriel' => 'Courriel',
            'motDePasse' => 'Mot De Passe',
            'sel' => 'Sel',
        ];
    }

    /**
     * Gets query for [[CodeRoles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCodeRoles()
    {
        return $this->hasMany(Role::class, ['code' => 'codeRole'])->viaTable('roleutilisateur', ['codeUtilisateur' => 'code']);
    }

    /**
     * Gets query for [[Roleutilisateurs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRoleutilisateurs()
    {
        return $this->hasMany(Roleutilisateur::class, ['codeUtilisateur' => 'code']);
    }

    public function getId(){
        return $this->code;
    }

    public function getAuthKey(){
        throw new \yii\base\NotSupportedException();
    }

    public function validateAuthKey($authKey){
        throw new \yii\base\NotSupportedException();
    }

    public static function findIdentity($id){
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null){
        throw new \yii\base\NotSupportedException();
    }

    public static function findByPrenom($prenom){
        return self::findOne(['prenom'=>$prenom]);
    }

    public static function validatePassword($password){
        return $this->motDePasse === $password;
    }
}
