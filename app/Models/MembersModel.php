<?php

namespace App\Models;

use CodeIgniter\Model;

class MembersModel extends Model
{
    protected $table = 'members';

    protected $allowedFields = [
        'm_firstName', 'm_lastName', 'm_email', 'm_password', 'create_at', 'delete_at'
    ];

    public function getMember($firstName, $lastName, $email, $password)
    {
        $memberData = $this->asArray()
                           ->where(['m_firstName' => $firstName,
                                    'm_lastName'  => $lastName,
                                    'm_email'     => $email,
                                    'm_password'  => sha1($password)])
                           ->first();
        
        return $memberData ?? false;
    }
}