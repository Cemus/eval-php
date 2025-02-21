<?php

class ViewHeader{
    public function displayView():string{
        ob_start();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            <header>
                <h1>Supergame</h1>
            </header>
        <?php
        return ob_get_contents();
    }
}