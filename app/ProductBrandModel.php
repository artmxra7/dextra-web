<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductBrandModel extends Model
{
    use SoftDeletes;
    public $table = 'product_brands';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $dates = ['deleted_at'];
    public $fillable = [
        'name'
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
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    protected $attributes = [
        // 'is_dashboard' => 1,

        'product_brands_status' => 1,



    ];
}
