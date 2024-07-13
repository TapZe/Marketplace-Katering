<?php

namespace App\Models\Merchant\Pivot;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class MerchantMenuInvoice extends Pivot
{
    // The menu picked in invoice and their portion
    use SoftDeletes;
}
