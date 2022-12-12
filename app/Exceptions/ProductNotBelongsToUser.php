<?php

namespace App\Exceptions;

use Exception;

class ProductNotBelongsToUser extends Exception
{
    public function render()
    {
        return ["errors"=>"Product doesn't belong to this user"];
    }
}
