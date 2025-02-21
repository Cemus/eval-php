<?php

class ModelPlayer implements InterfaceModel{
    private int $id;
    private string $pseudo;
    private string $email;
    private int $score;
    private string $password;
    private PDO $bdd;
    public function __construct(PDO $bdd) {
        $this->bdd = $bdd;
    }
    public function getId(): int { return $this->id; }
    public function setId(int $id): self { $this->id = $id; return $this; }

    public function getPseudo(): string { return $this->pseudo; }
    public function setPseudo(string $pseudo): self { $this->pseudo = $pseudo; return $this; }

    public function getEmail(): string { return $this->email; }
    public function setEmail(string $email): self { $this->email = $email; return $this; }

    public function getScore(): int { return $this->score; }
    public function setScore(int $score): self { $this->score = $score; return $this; }

    public function getPassword(): string { return $this->password; }
    public function setPassword(string $password): self { $this->password = $password; return $this; }

    public function getBdd(): PDO { return $this->bdd; }
    public function setBdd(PDO $bdd): self { $this->bdd = $bdd; return $this; }
    public function add():string{
        try{
            $requete = "INSERT INTO players(pseudo, email, score, psswrd)
            VALUE(?,?,?,?)";
            $req = $this->bdd->prepare($requete);
            $req->bindParam(1,$this->pseudo, PDO::PARAM_STR);
            $req->bindParam(2,$this->email, PDO::PARAM_STR);
            $req->bindParam(3,$this->score, PDO::PARAM_INT);
            $req->bindParam( 4,$this->password, PDO::PARAM_STR);
            $req->execute();
            return $this->pseudo . " a été ajouté avec succès !";
        }
        catch(Exception $e) {
            echo "Erreur : " . $e->getMessage();
            return "Erreur lors de l'ajout du joueur";
        }
    }
    public function getAll():array|null{
        try {
            $requete = "SELECT id, pseudo, email, score FROM players";
            $req = $this->bdd->prepare($requete);
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
            return null;
        }
    }
    public function getByEmail():array|null{
        try {
            $requete = "SELECT id, pseudo, email, score, psswrd FROM players
            WHERE email = ?";
            $req = $this->bdd->prepare($requete);
            $req->bindParam(1,$this->email, PDO::PARAM_STR);
            $req->execute();
            $data = $req->fetch(PDO::FETCH_ASSOC);
            return $data ? $data : [];
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
            return null;
        }
    }
}