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
        'blogName',
        'blogInf',
        'blogPicture',
        'blogContent',
        'userId',
        'categoryId',
    ];
    public function account()
    {
        return $this->belongsTo('App\Models\Account','userId');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category','categoryId');
    }
    public $timestamps = false;
}
