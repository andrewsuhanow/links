<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
   protected $table = 'categories'; //

    public function LinkToCategorie()
    {
        return $this->hasMany(
            'App\Models\CategoriesLink',
            'category_id',
            'id'
        );
    }

}



