<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Admin extends Model
{
    protected $table = 'admin';
    public $adminId;
    public $adminName;
    public $adminPass;
    public $adminEmail;
    public $adminAddress;
    public $adminPhone;
    public $adminType;

    public function insert()
    {
        DB::insert("insert into $this->table(adminName, adminPass, adminEmail, adminAddress, adminPhone, adminType)value (?,?,?,?,?,?)",[
            $this->adminName,
            $this->adminPass,
            $this->adminEmail,
            $this->adminAddress,
            $this->adminPhone,
            $this->adminType
        ]);
    }
//    use HasFactory;
}
