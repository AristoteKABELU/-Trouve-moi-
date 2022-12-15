<?php

namespace App\otherClass;

class Pagination
{
    const LIMIT = 10;
    
    public static function offset ($page): int
    {
        return self::LIMIT * ($page - 1);
    }

}

