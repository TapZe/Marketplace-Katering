<?php

namespace App\Models\Merchant;

use App\Models\Merchant\Pivot\MerchantMenuInvoice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'total_price',
        'address',
        'contact',
        'delivery_date',
        'payment_time',
    ];

    /**
     * The menu that belong to the Invoice
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function menu(): BelongsToMany
    {
        return $this->belongsToMany(MerchantMenu::class)->using(MerchantMenuInvoice::class);
    }
}
