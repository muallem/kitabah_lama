<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use App\Models\Employee;
use Illuminate\Support\Facades\Crypt;

class Encoder
{	
	public static function encode($data, $secret_key)
	{
        $encoded = base64_encode($data);

        // 
        $ciphering = "aes-256-ctr";
        
        $options = 0;
        
        $encryption_iv = '1234567891011121';
        
        $encryption_key = $secret_key;
        
        $encrypted = openssl_encrypt($encoded, $ciphering,
                    $encryption_key, $options, $encryption_iv);

		return $encrypted;
	}
    public static function decode($data, $secret_key)
	{
        // 
		$ciphering = "aes-256-ctr";

		$decryption_iv = '1234567891011121';
		 
		$decryption_key = $secret_key;

		$options = 0;
		 
		$decrypted = openssl_decrypt ($data, $ciphering,
				$decryption_key, $options, $decryption_iv);

        $decoded = base64_decode($decrypted);
		return $decoded;
	}

}
