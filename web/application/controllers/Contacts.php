<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('LCountries', null, 'lcountries');
    }

    public function index(){
        $data['contacts'] = $this->lcountries->extract();
        $data['countries'] = $this->lcountries->getAll();
        $this->load->view('includes/header');
        $this->load->view('contacts/view', $data);
        $this->load->view('includes/footer');
    }

}
