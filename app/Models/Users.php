<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Users extends Model{
    protected $filldataUser = ['name', 'email', 'password'];

    public function setPWattribute($num){
        $this->atrributes['password'] = Crypt::encryptString($num);
    }

    public function getPWattribute($num){
        return Crypt::decryptString($num);
    }
}
