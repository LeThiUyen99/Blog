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

//    public $blogId;
//    public $createDate;
//    public $updateDate;
//    public $blogName;
//    public $blogInf;
//    public $blogPicture;
//    public $blogContent;
//    public $userId;
//    public $categoryId;
//
//    public function insert()
//    {
//        DB::insert("insert into $this->table(createDate, updateDate, blogName, blogInf, blogPicture, blogContent, userId, categoryId)value (?,?,?,?,?,?,?,?)",[
//            $this->createDate,
//            $this->updateDate,
//            $this->blogName,
//            $this->blogInf,
//            $this->blogPicture,
//            $this->blogContent,
//            $this->userId,
//            $this->categoryId
//        ]);
//    }
//    use HasFactory;
//    protected $table = "blogs";
}
