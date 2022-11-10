<?php

namespace App\Models;

use App\Traits\HasCredit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainee extends Model
{
    use HasFactory, HasCredit;

    protected $fillable = [
        'first_name',
        'last_name',
        'dob',
        'user_id',
        'credit'
    ];

    protected $casts = [
        'dob' => 'datetime'
    ];

    /**
     * Get the user that the trainee instance belongs to
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the sessions this trainee is booked into
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function sessions()
    {
        return $this->belongsToMany(Session::class);
    }
}
