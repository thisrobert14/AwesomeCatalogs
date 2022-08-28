<?php

namespace App\Models;

use App\Models\User;
use App\Models\Resource;
use App\Models\CatalogUserStar;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Catalog extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function resources(): HasMany
    {
        return $this->hasMany(Resource::class);
    }

    public function stars(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'catalog_user_stars');
    }

    public function isStaredByUser(?User $user)
    {
        if (!$user) {
            return false;
        }

        return CatalogUserStar::where('catalog_id', $this->id)
            ->where('user_id', $user->id)
            ->exists();
    }

    public function star(User $user)
    {
        CatalogUserStar::create([
            'catalog_id' => $this->id,
            'user_id' => $user->id
        ]);
    }

    public function removeStar(User $user)
    {
        CatalogUserStar::where('catalog_id', $this->id)
            ->where('user_id', $user->id)
            ->delete();
    }
}
