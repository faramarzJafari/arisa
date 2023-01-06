<?php
namespace App\Repository;

use App\Models\Question;

class questionRepository extends modelRepository{

    public function model()
    {
        return Question::class;
    }
}
?>