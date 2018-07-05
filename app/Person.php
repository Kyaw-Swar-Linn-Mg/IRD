<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = ['name','position','office_phone','hand_phone','state','category_id','sub_category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class,'sub_category_id','id');
    }
}
