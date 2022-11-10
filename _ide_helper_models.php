<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Session
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property \Illuminate\Support\Carbon $time
 * @property int $cost
 * @property string $description
 * @property int|null $capacity
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Trainee[] $bookedTrainees
 * @property-read int|null $booked_trainees_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $bookedUsers
 * @property-read int|null $booked_users_count
 * @method static \Database\Factories\SessionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Session newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Session newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Session query()
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereUpdatedAt($value)
 */
	class Session extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Trainee
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $first_name
 * @property string $last_name
 * @property \Illuminate\Support\Carbon $dob
 * @property int $credit
 * @property int $user_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Session[] $sessions
 * @property-read int|null $sessions_count
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\TraineeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Trainee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Trainee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Trainee query()
 * @method static \Illuminate\Database\Eloquent\Builder|Trainee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trainee whereCredit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trainee whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trainee whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trainee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trainee whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trainee whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trainee whereUserId($value)
 */
	class Trainee extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Transaction
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $net
 * @property int $user_id
 * @property int|null $session_id
 * @property int|null $admin_id
 * @property-read \App\Models\User|null $admin
 * @property-read \App\Models\Session|null $session
 * @property-read \App\Models\Trainee|null $trainee
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereNet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereSessionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereUserId($value)
 */
	class Transaction extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $credits
 * @property string|null $local_area
 * @property \Illuminate\Support\Carbon $dob
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Session[] $sessions
 * @property-read int|null $sessions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Trainee[] $trainees
 * @property-read int|null $trainees_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Transaction[] $transactions
 * @property-read int|null $transactions_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCredits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLocalArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

