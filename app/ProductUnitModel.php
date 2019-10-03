<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductUnitModel extends Model
{
    //

    public $table = 'product_unit';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $dates = ['deleted_at'];
    public $fillable = [
        'product_unit_name'
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:30',
    ];
    public function latest($column = 'id') {
        return $this->orderBy($column, 'desc');
    }


    protected $attributes = [
        // 'is_dashboard' => 1,

        'product_unit_status' => 1,



    ];
}
