<?php

class PlayerController extends AbstractController{
    private ViewPlayer $player;
    public function getPlayer(): ViewPlayer { 
        if (isset($this->player)){
            return $this->player;
        }else{
             $this->setPlayer(new ViewPlayer());
             return $this->player;
        }
    }
    public function setPlayer(ViewPlayer $player): self { $this->player = $player; return $this; }
    public function addPlayers():string{
        if(isset($_POST['submitAddPlayer'])){
            if(empty($_POST['pseudo']) || empty($_POST['email']) || empty($_POST['password'])){
                return "Veuillez remplir les champs nécessaires !";
            }
            if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
                return "Email pas au bon format !";
            }

            $pseudo = sanitize($_POST['pseudo']);
            $email = sanitize($_POST['email']);
            $password = sanitize($_POST['password']);
            empty($_POST['score']) ? $score = 0 : $score = sanitize($_POST['score'] );

            $password = password_hash($password, PASSWORD_BCRYPT);

            if(!empty($this->getModel()->setEmail($email)->getByEmail())){
                return "Cet email est déjà utilisé !";
            }

            $this->getModel()->setPseudo($pseudo)->setScore($score)->setEmail($email)->setPassword($password)->add();
        
            return "Le joueur " . $pseudo . " a été enregistré avec succès !";
        }
        return "";
    }
    public function getAllPlayers():string{
        $playerList = "";

        $data = $this->getModel()->getAll();

        foreach($data as $player){
            $playerList = $playerList."<li><h3>".$player['pseudo'] ." ". $player['email']."</h3>      <strong>".$player['score']."</strong></li>";
        }
        return $playerList;
     }
    public function render():void{
    $signUpMessage = $this->addPlayers();
    $playerList = $this->getAllPlayers();

 
    $this->getHeader()->displayView();
    $this->getPlayer()->setPlayerList($playerList)->setSignUpMessage($signUpMessage)->displayView();
    $this->getFooter()->displayView();
    }
}