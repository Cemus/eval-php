<?php

function sanitize(string $data){
    return htmlentities(strip_tags(stripslashes(trim($data))));
}