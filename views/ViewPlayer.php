<?php

class ViewPlayer{
    private string $signUpMessage;
    private string $playerList;
    public function displayView():string{
        ob_start();
        ?>
        <p>Working view</p>
        <?php
        return ob_clean();
    }
    public function getSignUpMessage(): string { return $this->signUpMessage; }
    public function setSignUpMessage(string $signUpMessage): self { $this->signUpMessage = $signUpMessage; return $this; }

    public function getPlayerList(): string { return $this->playerList; }
    public function setPlayerList(string $playerList): self { $this->playerList = $playerList; return $this; }
}