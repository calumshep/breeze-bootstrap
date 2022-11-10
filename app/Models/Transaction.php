<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'net',
        'trainee_id',
        'session_id',
        'admin_id'
    ];

    /**
     * Gets the user related to this transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function trainee()
    {
        return $this->belongsTo(Trainee::class);
    }

    /**
     * Gets the (optional) session relating to this transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function session()
    {
        return $this->belongsTo(Session::class)->withDefault();
    }

    /**
     * Gets the (optional) admin user who executed this transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo(User::class)->withDefault(['first_name' => '-']);
    }
}
