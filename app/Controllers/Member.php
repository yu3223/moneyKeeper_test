<?php

namespace App\Controllers;

use App\Models\MemberModel;
use CodeIgniter\Controller;

class Member extends Controller
{
    public function index()
    {
        $model = model(MemberModel::class);

        $data = [
            'member'  => $model->getMember(),
        ];
        echo view('member/overview',$data);
    }


    public function create()
    {
        helper('form');

        // Checks whether the form is submitted.
        if (! $this->request->is('post')) {
            // The form is not submitted, so returns the form.
            return view('member/create');
        }

        $post = $this->request->getPost(['name', 'email', 'password']);

        // Checks whether the submitted data passed the validation rules.
        if (! $this->validateData($post, [
            'name' => 'required|max_length[255]|min_length[3]',
            'email'  => 'required|max_length[5000]|min_length[3]',
            'password'  => 'required|max_length[5000]|min_length[3]',
        ])) {
            // The validation fails, so returns the form.
            return view('member/create');
        }

        $model = model(MemberModel::class);

        $model->save([
            'name' => $post['name'],
            'slug'  => url_title($post['name'], '-', true),
            'email'  => $post['email'],
            'password'  => $post['password'],
        ]);

        return view('member/success');
    }
}
