<?php

namespace App\Crud;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Person
 * @package App\Crud
 */
class Person extends Model
{
    //
    protected $fillable = [
       "firstName",
       "lastName",
       "email",
       "age"
    ];

    protected $table = "people";
}
