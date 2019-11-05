<?php

namespace App\Models;

use Core\Libraries\Database;

class userModel extends Database
{
    public function fetchData()
    {
        return $this->get("users")->all();
    }
}
