<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'featured',
        'recommend'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }


    // Padrão para invocação de atributos = name_description
    public function getNameDescriptionAttribute()
    {
        return $this->name . " - " . $this->description;
    }

    // Query Scoped - palavra reservada scope

    public function scopeFeatured($query)
    {
        return $query->where('featured', '=', 1);
    }

    public function attachProductTag($tags, $product)
    {
        if($tags)
        {
            $tags = array_map("trim", explode(',', $tags));

            foreach ($tags as $tag) {
                $tagDb = Tag::where('name', 'LIKE', $tag)->get();

                if (count($tagDb->all()) > 0) {
                    // Verifica se tag já está anexada ao produto, caso não, anexa a tag ao produto
                    if (!$product->tags()->find($tagDb->all()[0]->attributes['id'])) {
                        $product->tags()->attach($tagDb);
                    } // Caso contrário utiliza para a sincronização das tags do produto
                    else {
                        $product->tags()->sync([$tagDb->all()[0]->attributes['id']]);
                    }
                } else {
                    $tagDb = new Tag;
                    $tagDb->name = $tag;
                    $tagDb->save();

                    $product->tags()->attach($tagDb);
                }
            }
        }
        else
        {
           foreach($product->tags as $tag)
           {
               $product->tags()->detach($tag->id);
           }
        }
    }
}
