<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

namespace App\Controllers;

use App\Models\User_Model;
use CodeIgniter\Controller;

class User extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }
	public function login()
    {
    	//TO DO 
    }
    public function register()
    {
        $this->user_model->register();
        echo "success!";
    }
}