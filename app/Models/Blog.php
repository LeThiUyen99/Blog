<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Blog extends Model
{
    protected $table = 'blog';

    protected $fillable = [
        'createDate',
        'updateDate',
        'blogName',
        'blogInf',
        'blogPicture',
        'blogContent',
        'userId',
        'categoryId',
    ];

    public $timestamps = false;
}
