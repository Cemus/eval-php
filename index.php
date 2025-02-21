
<?php

include "./interfaces/InterfaceModel.php";

include "./abstracts/AbstractController.php";
include "./controllers/PlayerController.php";

include "./views/ViewFooter.php";
include "./views/ViewHeader.php";
include "./views/ViewPlayer.php";

include "./models/ModelPlayer.php";

include "./env.php";
include "./utils/utils.php";
include "./utils/Database.php";

$bdd = (new Database())->connexion();

$views = [
    "header"=> new ViewHeader(),
    "footer"=>new ViewFooter(),
    "player"=>new ViewPlayer(),

];

$playerController = new PlayerController($views["header"], $views["footer"],new ModelPlayer($bdd));

$playerController->render();