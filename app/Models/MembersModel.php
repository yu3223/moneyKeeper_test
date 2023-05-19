<?php

namespace App\Models;

use CodeIgniter\Model;

class MembersModel extends Model
{
    protected $table = 'members';

    protected $allowedFields = ['firstName', 'lastName', 'email', 'password'];

    public function getMember($firstName, $lastName, $email, $password)
    {
        $memberData = $this->asArray()
                           ->where(['firstName' => $firstName,
                                    'lastName'  => $lastName,
                                    'email'     => $email,
                                    'password'  => $password])
                           ->first();
        
        return $memberData ?? false;
    }
}