<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $table = 'category';
    public $categoryId;
    public $categoryName;
    public $categoryType;

    public function insert()
    {
        DB::insert("insert into $this->table(categoryName, categoryType) value (?,?)",[
            $this->categoryName,
            $this->categoryType
        ]);
    }

//    public function update()
//    {
//        DB::update("update $this->table
//        set
//        categoryName = ?,
//        categoryType = ?
//        where categoryId = ?",
//        [
//            $this->categoryName,
//            $this->categoryType,
//            $this->categoryId
//        ]);
//    }
//    use HasFactory;
//    protected $table = "category";
}
