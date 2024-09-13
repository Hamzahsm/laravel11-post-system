<?php

namespace App\Models;

use Illuminate\Support\Arr;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use App\Models\User;

class Post extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['author', 'category']; //eager loading, biar query lebih cepat

    //eloquent reationship //akan menghasilkan lazy loading
    public function author(): BelongsTo //jangan lupa import class belongs To
    {
        return $this->belongsTo(User::class); //satu post milik satu user ke table user
    }

    public function category(): BelongsTo 
    {
        return $this->belongsTo(Category::class);
    }

    //search fitur -> query scope
    public function scopeFilter(Builder $query , array $filters): void 
    {
        //
        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) => //kalau ada input search, kembalikan input search, kalau tidak ada, batalkan
            $query->where('title', 'like', '%' . $search . '%')
        );

        $query->when(
            $filters['category'] ?? false,
            fn($query, $category) => //calback function fn()
            $query->whereHas('category', fn($query) => //whereHas -> db relations
                $query->where('slug', $category)
            )
        );

        $query->when(
            $filters['author'] ?? false,
            fn($query, $author) => //calback function fn()
            $query->whereHas('author', fn($query) => //whereHas -> db relations 
                $query->where('username', $author)
            )
        );

        
    }

}


// class Post {
    //menampilkan seluruh data post
    // public static function all() {
    //     return [
    //         [
    //             'id' => 1,
    //             'slug' => 'judul-artikel-1',
    //             'title' => 'Judul Artikel 1',
    //             'author' => 'Writer 1',
    //             'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Blanditiis ad, quis delectus, perferendis adipisci omnis ullam ipsam neque libero sapiente et voluptatum qui, dolorem molestiae animi reiciendis vero nisi cupiditate. Odio repellendus optio deserunt? Eveniet, fuga quod eius nesciunt dolorem ad modi magnam incidunt tempora minus explicabo eos quasi maiores?'
    //         ],
    //         [
    //             'id' => 2,
    //             'slug' => 'judul-artikel-2',
    //             'title' => 'Judul Artikel 2',
    //             'author' => 'Writer 2',
    //             'body' => 'Lorem ipsum, bla bla bla, lorem ipsum'
    //         ]
    //         ];
    // }


    //mencari data post
    // public static function find($slug): array {

    //     menggunakan function call back use ($slug)
    //     return Arr::first(static::all(), function($post) use ($slug) {
    //         return $post['slug'] == $slug;
    //     }); 

    //     menggunakan arrow function
    //     $post =  Arr::first(static::all(), fn ($post) => $post['slug'] == $slug);

    //     if(! $post) {
    //         abort(404);
    //     }

    //     return $post;
    // }


// }