<?php

namespace App\Controllers;

use App\Models\MembersModel;
use CodeIgniter\Controller;


class Members extends Controller
{
    public function index()
    {
        $model = model(MembersModel::class);

        // $data = [
        //     'members'  => $model->getMember(),
        // ];
        echo view('members/register');
    }


    public function register()
    {
        helper('form');

        // Checks whether the form is submitted.
        if (! $this->request->is('post')) {
            // The form is not submitted, so returns the form.
            return view('members/register');
        }

        $post = $this->request->getPost(['firstName','lastName','email', 'password']);

        // Checks whether the submitted data passed the validation rules.
        if (! $this->validateData($post, [
            'firstName' => 'required|max_length[100]',
            'lastName'  => 'required|max_length[100]',
            'email'  => 'required|max_length[100]|min_length[3]',
            'password'  => 'required|max_length[100]|min_length[3]'
        ])) {
            // The validation fails, so returns the form.
            return view('members/register');
        }

        $model = model(MembersModel::class);

        $model->save([
            'firstName' => $post['firstName'],
            'lastName' => $post['lastName'],
            'email'  => $post['email'],
            'password'  => $post['password'],
        ]);

        return view('members/success');
    }

    // public function register(){
    //     $firstName = $this->request->getPost("firstName");
    //     $lastName = $this->request->getPost("lastName");
    //     $email = $this->request->getPost("email");
    //     $password = $this->request->getPost("password");

    //     if($firstName == null || $lastName == null || $password == null || $email == null ){
    //         $err=['error_messages'=>"需帳號密碼等資料進行註冊",
    //         'status_code'=>400];
    //         return view('members/register',$err);
    //         //return $this->fail("需帳號密碼等資料進行註冊",400);
    //     }
        
    //     $MembersModel = new Members();
    //     $temp = $MembersModel->where('email', $email)->first();
    //     if($temp != null){
    //         $err=['error_messages'=>"帳號已被註冊",
    //         'status_code'=>400];
    //         return view('members/register',$err);
    //         //return $this->fail("帳號已被註冊",400);
    //     }
    //     $values = [
    //         'firstName'=>$firstName,
    //         'lastName'=>$lastName,
    //         'email'=>$email,
    //         'password'=>$password,
    //     ];
    //     $query = $MembersModel->insert($values);
    //     if( !$query ){
    //         $err=['error_messages'=>"未知錯誤",
    //         'status_code'=>400];
    //         return view('member/register',$err);
    //         //return  $this->fail("未知錯誤",400);
    //     }else{
    //         $go=['go_messages'=>"註冊成功，前往登入頁面",
    //         'status_code'=>200];
    //         return view('members/success',$go);
    //     }
    // }
}
