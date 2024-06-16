<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DataController extends Controller{
    public function showDecryptedForm(){
        return view('decrypted_form');
    }
    public function encryptData(Request $req){
        $data = $req->input('data');
        $encrypted = Crypt::encryptString($data);
        return response()->json(['encrypted' => $encrypted]);
    }

    public function decryptData(Request $req){
        $encrypted = $req->input('encrypted_data');
        $decrypted = Crypt::decryptString($encrypted);
        return response()->json(['decrypted' => $decrypted]);

    }

}
