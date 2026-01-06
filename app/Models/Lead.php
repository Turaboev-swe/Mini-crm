<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lead extends Model
{
    /** @use HasFactory<\Database\Factories\LeadFactory> */
    use HasFactory;
    protected $fillable = [
        'full_name','phone','status','note','assigned_to'
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'assigned_to');
    }
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
