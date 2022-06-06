<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class LCountries
{
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
        
    }

        /**
     * Returns a list of countries
     *
     * @return array 
     */
    public function extract(){
        $phones = $this->ci->mcontacts->getAll();
        foreach($phones as $key => $value){

           $returnValidation = $this->ci->lvalidations->hasValidPhoneNumber($this->contries,$value['phone']);
           
           if($returnValidation)
           {
               $phones[$key]['country'] = $returnValidation[0]; 
               $phones[$key]['status'] =  $returnValidation[1];
           }else{
               return [];
           }
        }
        
        asort($phones);
        return $phones;
    }

}