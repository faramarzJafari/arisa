<?php
namespace App\Repository;

use App\Models\User;

class UserRepository extends modelRepository{


    public function model()
    {
            return User::class;            
    }
}


?>