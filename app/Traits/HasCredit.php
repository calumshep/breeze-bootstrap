<?php

namespace App\Traits;

use App\Exceptions\NegativeCreditException;
use App\Models\Session;
use App\Models\Transaction;

/**
 * @property $credit
 * @method save()
 */
trait HasCredit
{
    /**
     * Add the specified number of credits to the user's credit balance
     *
     * @param int $credits
     * @return void
     */
    public function addCredit(int $credits)
    {
        $this->credit += $credits;
        $this->save();
    }

    /**
     * Deduct the specified number of credits from the user's credit balance
     *
     * @param int $amount
     *
     * @return void
     * @throws \App\Exceptions\NegativeCreditException
     */
    public function chargeCredit(int $amount)
    {
        $this->credit -= $amount;

        if ($this->credit < 0) {
            throw new NegativeCreditException();
        } else {
            $this->save();
        }
    }

    /**
     * @deprecated
     *
     * Whether the user has enough credit to book the given session
     *
     * @param \App\Models\Session $session
     * @return bool
     */
    public function canAfford(Session $session)
    {
        return $this->credit >= $session->cost;
    }

    /**
     * Gets the transactions relating to the trainee.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
