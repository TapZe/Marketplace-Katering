<?php

namespace App\Models\Merchant;

use App\Models\User\UserProfile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MerchantMenu extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'foto',
        'price',
        'menu_type_id',
        'user_profile_id',
    ];

    /**
     * Get the menuType that owns the MerchantMenu
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function menuType(): BelongsTo
    {
        return $this->belongsTo(MenuType::class);
    }

    /**
     * Get the userProfile that owns the MerchantMenu
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userProfile(): BelongsTo
    {
        return $this->belongsTo(UserProfile::class);
    }
}
