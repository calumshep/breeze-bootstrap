<?php

namespace App\Models;

use App\Exceptions\SessionBookingException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $casts = [
        'time' => 'datetime',
    ];

    protected $fillable = [
        'name',
        'time',
        'cost',
        'description',
        'capacity',
    ];

    /**
     * Get the users booked on to this session
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function bookedUsers()
    {
        return $this->belongsToMany(User::class, 'session_user');
    }

    /**
     * Get the users booked on to this session
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function bookedTrainees()
    {
        return $this->belongsToMany(Trainee::class, 'session_trainee');
    }

    /**
     * Book the given user into this session
     *
     * @param \App\Models\User $user
     *
     * @return void
     * @throws \App\Exceptions\SessionBookingException if the session is full
     */
    public function bookUser(User $user)
    {
        if ($this->hasCapacity()) {
            $this->bookedUsers()->save($user);
        } else {
            throw new SessionBookingException("The session is full.", 403);
        }
    }

    /**
     * Book the given trainee into this session
     *
     * @param \App\Models\Trainee $trainee
     *
     * @return void
     * @throws \App\Exceptions\SessionBookingException if the session is full
     */
    public function bookTrainee(Trainee $trainee)
    {
        if ($this->hasCapacity()) {
            $this->bookedTrainees()->save($trainee);
        } else {
            throw new SessionBookingException("The session is full.", 403);
        }
    }

    /**
     * Get whether the session has capacity for more bookings
     *
     * @return bool
     */
    public function hasCapacity()
    {
        return $this->capacity == 0 || ($this->bookedUsers()->count() + $this->bookedTrainees()->count()) < $this->capacity;
    }
}
