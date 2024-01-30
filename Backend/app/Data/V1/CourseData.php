<?php

namespace App\Data\V1;

use App\Data\ApiData;

class CourseData extends ApiData
{
    protected $safePrams = [
        'id' => ['eq'],
        'name' => ['eq'],
    ];
}
