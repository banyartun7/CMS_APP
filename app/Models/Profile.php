<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
    protected $table = "profiles";
    protected $guarded = [];
}
