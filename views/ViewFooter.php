<?php

class ViewFooter{
    public function displayView():string{
        ob_start();
        ?>
            <footer>Super footer</footer>
        </body>
        </html>
        <?php
        return ob_get_contents();
    }
}