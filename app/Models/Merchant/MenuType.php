<?php

namespace App\Models\Merchant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MenuType extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Get all of the menu for the MenuType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function menu(): HasMany
    {
        return $this->hasMany(MerchantMenu::class);
    }
}
