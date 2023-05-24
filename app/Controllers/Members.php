<?php

namespace App\Controllers;

use App\Models\MembersModel;
use CodeIgniter\Controller;
use mysqli;

class Members extends Controller
{
    public function index()
    {
        echo view('members/login');
    }


    public function register()
    {
        $model = model(MembersModel::class);

        helper('form');

        // Checks whether the form is submitted.
        if (! $this->request->is('post')) {
            // The form is not submitted, so returns the form.
            return view('members/register');
        }

        $post = $this->request->getPost(['firstName','lastName','email', 'password', 'rePassword']);
  
        //Confirm that the two passwords are the same
        $password = $_REQUEST['password'];
        $rePassword = $_REQUEST['rePassword'];
        if($password != $rePassword){
            echo "<script>alert('The two passwords entered are not the same');</script>";
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
            'firstName' => $post['firstName'],
            'lastName'  => $post['lastName'],
            'email'     => $post['email'],
            'password'  => $post['password'],
        ]);

        return view('members/login');
    }
}
