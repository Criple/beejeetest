<?php

namespace App\Models;

use App\Model as Model;


class Users extends Model
{

    public function getAdmUser()
    {
        $query = "select * from users where id = 1";
        return $this->execute($query);
    }

}