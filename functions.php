<?php

declare(strict_types=1);

function get_status($status): void
{
    if ($status) {
        echo "actif";
    } else {
        echo "inactif";
    }
}
//Entre 3 et 20 caractères/Peut contenir des lettres majuscules et minuscules/Peut contenir des chiffres/Peut contenir des caractères spéciaux limités, souvent '_' et '-'
function is_username_valid($username) : bool{
    if(preg_match('/^[A-Za-z0-9_-]{3,20}$/',$username)){
        return true;
    }else{
        return false;
    }
}
