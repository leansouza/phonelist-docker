<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MContacts extends CI_Model {
    

    public function getAll(){

        $query = $this->db->get('customer');
        return $query->result_array();
    }

}

