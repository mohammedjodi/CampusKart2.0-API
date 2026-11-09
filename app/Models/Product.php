<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\beLongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'category_id',
        'brand_id',
        'condition_id',
        'status_id',
        'title',
        'description',
        'price',
    ];

    /**
     * Price to be handled as a decimal value with two decimal places.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
        ];
    }

     public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id')
            ->orderBy('sort_order');
    }

    public function favoritedBy(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'favorites',
            'product_id',
            'user_id'
        )->withTimestamps();
    }

    // Relationship between products and Users
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function condition(): BelongsTo
    {
        return $this->belongsTo(Condition::class, 'condition_id', 'id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(ProductStatus::class, 'status_id', 'id');
    }


}
