<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\framework\utils\CPasswordHelper;

class InscriptionForm extends Model
{
    public $prenom;
    public $nom;
    public $courriel;
    public $password;

    public function rules(){
        return [
            // username and password are both required
            [['prenom','nom','courriel', 'password'], 'required'],
        ];
    }

    public function inscription()
    {
        if ($this->verifierCourriel()){
            $this->insert();
            $user = Utilisateur::findByCourriel($this->courriel);
            return Yii::$app->user->login($user);
        }
        return false;
    }

    public function insert(){

        Yii::$app->db->createCommand()
        ->insert('utilisateur', [
        'prenom' => $this->prenom,
        'nom' => $this->nom,
        'courriel' => $this->courriel,
        'motDePasse' => $this->password,
        'sel' => 'epicsel123',
        ])->execute();
    }

    public function verifierCourriel(){
        $falseUser = Utilisateur::findByCourriel($this->courriel);
        if ($falseUser != NULL){
            return false;
        }
        else{
            return true;
        }
    }
}