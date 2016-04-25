<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    // Padrão para invocação de atributos = tag_list
    public function getTagListAttribute()
    {
        $tags = $this->tags->lists('name');

        return implode(', ', $tags);
    }
}
