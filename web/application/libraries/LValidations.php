<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class LValidations
{
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
    }

        /**
     * Validates a phone number 
     *
     * @param string $phone
     * @return array
     */
    public function hasValidPhoneNumber($countries,$phone): array
    {
        preg_match('/\(([0-9].*?)\)/', $phone, $matches);
        if($matches){
           $countries = $countries[$matches[1]];
            if(preg_match($countries[1], $phone, $phonevalid)){
                return [$countries[0],1];
            }
            return [$countries[0],0];
        }
        return [];
        
    }

    

}
