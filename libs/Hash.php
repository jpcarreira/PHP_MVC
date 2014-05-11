<?php

/* 
 * Hash lib
 * 
 * Hash model class, increases security in user authentication
 */

class Hash 
{
    
    /**
     * create
     * 
     * encrypts data based on an algorithm and salt
     * 
     * @param string $algo  the algorithm used in encryption
     * @param string $data  data to be encrypted
     * @param string $salt  salt used in enccryption
     * @return string       hashed/salted data
     */
    public static function create($algo, $data, $salt)
    {
        $context = hash_init($algo, HASH_HMAC, $salt);
        hash_update($context, $data);
        
        return hash_final($context);
    }
    
}