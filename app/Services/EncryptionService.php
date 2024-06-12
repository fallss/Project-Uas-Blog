<?php
namespace App\Services;

use Illuminate\Support\Facades\Crypt;

class EncryptionService
{
    public function encrypt($data)
    {
        return Crypt::encryptString($data);
    }
    public function decrypt($encrypt){
        return Crypt::decryptString($encrypt);
    }
}
