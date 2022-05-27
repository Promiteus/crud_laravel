<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Person
 * @package App\Crud
 */
class Person extends Model
{
    public const FIRST_NAME = 'firstName';
    public const LAST_NAME = 'lastName';
    public const EMAIL = 'email';
    public const AGE = 'age';
    public const USER_ID = 'user_id';


    protected array $fillable = [
       self::FIRST_NAME,
       self::LAST_NAME,
       self::EMAIL,
       self::AGE,
       self::USER_ID
    ];

    protected $table = "people";
}
