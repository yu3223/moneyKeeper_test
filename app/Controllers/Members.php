<?php

namespace App\Controllers;

use App\Models\MembersModel;
use CodeIgniter\Controller;


class Members extends Controller
{
    //protected MembersModel $model;
    
    public function index()
    {
        echo view('members/login');
    }

    public function login()
    {
        echo view('members/login');
    }

    public function register()
    {
        $model = model(MembersModel::class);
        //$model = new MembersModel();

        helper('form');

        // Checks whether the form is submitted.
        if (! $this->request->is('post')) {
            // The form is not submitted, so returns the form.
            return view('members/register');
        }

        date_default_timezone_set('Asia/Taipei');
        $date = date('Y-m-d H:i:s');

        $data = $this->request->getPost();

        $post = $this->request->getPost(['firstName', 'lastName', 'email', 'password', 'rePassword']);
  
        //Confirm that the two passwords are the same
        $password   = $_REQUEST['password'];
        $rePassword = $_REQUEST['rePassword'];
        if($password != $rePassword){
            return view('members/register');
        }

        // Checks whether the submitted data passed the validation rules.
        if (! $this->validateData($post, [
            'firstName' => 'required|max_length[100]',
            'lastName'  => 'required|max_length[100]',
            'email'     => 'required|max_length[100]|min_length[3]',
            'password'  => 'required|max_length[100]|min_length[3]',

        ])) {
            // The validation fails, so returns the form.
            return view('members/register');
        }

        $model->save([
            'm_firstName' => $post['firstName'],
            'm_lastName'  => $post['lastName'],
            'm_email'     => $post['email'],
            'm_password'  => $post['password'],
            'create_at'   => $date,
        ]);

        return view('members/login');
    }
}
