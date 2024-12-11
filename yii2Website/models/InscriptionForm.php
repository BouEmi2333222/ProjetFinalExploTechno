<?php

namespace app\models;

use Yii;
use yii\base\Model;

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
            return Yii::$app->user->login(Utilisateur::findByCourriel($this->courriel));
        }
        return false;
    }

    public function insert(){

        Yii::$app->db->createCommand()
        ->insert('Utilisateur', [
        'prenom' => $this->prenom,
        'nom' => $this->nom,
        'courriel' => $this->courriel,
        'motDePasse' => $this->password,
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