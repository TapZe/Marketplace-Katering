<?php

namespace App\Models\Merchant\Pivot;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserMerchantMenu extends Pivot
{
    // Temporary data for remembering users last cart (one merchant at a time) (no need for softdeletes)
}
