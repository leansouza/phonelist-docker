<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class LCountries
{
    protected $ci;

    public $contries = [
        237 => ["Cameroon", "#^\((237)\) ?[2368]\d{7,8}$#"], 
        251 => ["Ethiopia", "#^\((251)\) ?[1-59]\d{8}$#"], 
        212 => ["Morocco", "#^\((212)\) ?[5-9]\d{8}$#"], 
        258 => ["Mozambique", "#^\((258)\) ?[28]\d{7,8}$#"], 
        256 => ["Uganda", "#^\((256)\) ?\d{9}$#"]
    ];

    public function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->library('LValidations', null, 'lvalidations');
        $this->ci->load->model('MContacts','mcontacts');
        
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

    function getAll(){
        return $this->contries;
    }

}