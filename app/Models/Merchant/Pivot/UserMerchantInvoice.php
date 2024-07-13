<?php

namespace App\Models\Merchant\Pivot;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserMerchantInvoice extends Pivot
{
    // Checking who have said invoice and who is the merchant
    use SoftDeletes;
}
