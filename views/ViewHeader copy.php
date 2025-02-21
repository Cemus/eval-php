<?php

class ViewFooter{
    public function displayView():string{
        ob_start();
        ?>
        <p>Working view</p>
        <?php
        return ob_clean();
    }
}