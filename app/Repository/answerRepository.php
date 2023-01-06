<?php
namespace App\Repository;

use App\Models\answer;

class answerRepository extends modelRepository{
    public function model()
    {
        return answer::class;
    }
}

?>