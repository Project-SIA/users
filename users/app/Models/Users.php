<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Users extends Model{
protected $table = 'users';
// column sa table
protected $primaryKey = 'user_id';
public $timestamps = false;
protected $fillable = [
'lastname', 'firstname', 'middlename', 'email', 'phone_num', 'address',
];
}