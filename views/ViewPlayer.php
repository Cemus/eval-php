<?php

class ViewPlayer{
    private string $signUpMessage;
    private string $playerList;
    public function getSignUpMessage(): string { return $this->signUpMessage; }
    public function setSignUpMessage(string $signUpMessage): self { $this->signUpMessage = $signUpMessage; return $this; }

    public function getPlayerList(): string { return $this->playerList; }
    public function setPlayerList(string $playerList): self { $this->playerList = $playerList; return $this; }
    public function displayView():string{
        ob_start();
        ?>
        <main>
            <section>
            <h2>Ajouter joueur</h2>
            <form action="" method="post">
                <input type="text" name="pseudo" placeholder="Le pseudo">
                <input type="text" name="email" placeholder="L'email">
                <input type="number" name="score" placeholder="Le score">
                <input type="password" name="password" placeholder="Le mot de passe">
                <input type="submit" name="submitAddPlayer">
            </form>
            <p> <?php $this->getSignUpMessage() ?> </p>
            </section>
            
            <section>
            <h2>Liste des joueurs</h2>
            <ul>
                <?php echo $this->getPlayerList() ?>
            </ul>
            </section>

        </main>
        <?php
        return ob_get_contents();
    }
}