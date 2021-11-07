<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Account extends Model
{
    protected $table = 'user';
    public $userId;
    public $userName;
    public $userPass;
    public $userMail;
    public $userAddress;
    public $userPhone;
    public $userType;

    public function insert()
    {
        DB::insert("insert into $this->table(userName, userPass, userMail, userAddress, userPhone, userType)value (?,?,?,?,?,?)",[
            $this->userName,
            $this->userPass,
            $this->userMail,
            $this->userAddress,
            $this->userPhone,
            $this->userType
        ]);
    }
//    use HasFactory;
}
