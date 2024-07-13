<?php

namespace App\Models\User;

use App\Models\Merchant\Invoice;
use App\Models\Merchant\MerchantMenu;
use App\Models\Merchant\Pivot\MerchantMenuInvoice;
use App\Models\Merchant\Pivot\UserMerchantMenu;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserProfile extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
        'contact',
        'description',
        'user_id',
    ];

    /**
     * Get the user that owns the UserProfile
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The shopCart that belong to the UserProfile
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function shopCart(): BelongsToMany
    {
        return $this->belongsToMany(MerchantMenu::class)->using(UserMerchantMenu::class)->withPivot('portion');
    }

    /**
     * The invoices that belong to the UserProfile
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function invoices(): BelongsToMany
    {
        return $this->belongsToMany(Invoice::class)->using(MerchantMenuInvoice::class)->withTimestamps();
    }

    /**
     * The merchants that belong to the UserProfile
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function merchants(): BelongsToMany
    {
        return $this->belongsToMany(UserProfile::class, 'merchant_menu_invoice', 'user_profile_id', 'merchant_profile_id')
            ->using(MerchantMenuInvoice::class);
    }
}
