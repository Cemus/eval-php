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
            <title>Supergame</title>
        </head>
        <style>
            :root{
                --main:var(blue);
                --background:var(#222)
            }
            body{
                display: grid;
                grid-template-columns: 1fr;
                grid-template-rows: auto 1fr auto;
                min-height: 100vh;
                margin: 0;
                text-align: center;
                background-color: #222;
                color: white;
            }
            header {
                background-color: blue;
                padding: .5rem;
                text-align: left;
            }
            h2{
                background-color: blue;
                padding: .5rem;
                border-radius: .2rem;
            }
            main {
                display:flex;
                justify-content:space-around;
                align-items: center;
            }
            form {
                display: flex;
                flex-direction: column;
            }
        </style>
        <body>
            <header>
                <h1>Supergame</h1>
            </header>
        <?php
        return ob_get_contents();
    }
}