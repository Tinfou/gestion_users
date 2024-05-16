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
