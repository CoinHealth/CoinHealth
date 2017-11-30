<?php
use Faker\Generator;
use App\Models\Category;
use App\Models\Appointment;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Lead::class, function(Generator $faker) {
    return [
        'subscriber_id' => $faker->numberBetween($min=1, $max=20),
        'first_name' => $faker->firstName($gender = null),
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'address' => [
            'state' => $faker->state,
            'state_abbr' => $faker->stateAbbr,
            'city' => $faker->city,
            'street' => $faker->streetAddress,
        ],
        'contact' => $faker->tollFreePhoneNumber,
        'business' => [
            'catch_phrase' => $faker->catchPhrase,
            'company' => $faker->company,
        ],
    ];
});

$factory->define(App\Models\Staff::class, function(Generator $faker) {
    return [
        'subscriber_id' => $faker->numberBetween($min=1, $max=20),
        'first_name' => $faker->firstName($gender = null),
        'last_name' => $faker->lastName,
        'contact' => $faker->tollFreePhoneNumber,
        'email' => $faker->unique()->safeEmail,
        'address' => [
            'state' => $faker->state,
            'state_abbr' => $faker->stateAbbr,
            'city' => $faker->city,
            'street' => $faker->streetAddress,
        ],
    ];
});

$factory->define(App\Models\Patient::class, function(Generator $faker) {
    return [
        'first_name' => $faker->firstName($gender = null),
        'middle_name' => $faker->lastName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'gender' => $faker->randomElement(['Male', 'Female']),
        'dob' => $faker->dateTime,
        'current_address' => [
            'state' => $faker->state,
            'state_abbr' => $faker->stateAbbr,
            'city' => $faker->city,
            'zip' => $faker->buildingNumber,
            'street_1' => $faker->streetAddress,
            'street_2' => $faker->streetAddress,
        ],
        'billing_address' => [
            'state' => $faker->state,
            'state_abbr' => $faker->stateAbbr,
            'city' => $faker->city,
            'zip' => $faker->buildingNumber,
            'street_1' => $faker->streetAddress,
            'street_2' => $faker->streetAddress,
        ],
        'language' => $faker->randomElements([
            'English',
            'French',
            'Mandarin',
            'Italian',
            'Japanese',
            'Spanish',
            'Russian',
            'Other',
            'Unknown'
        ], 3),
        'race' => $faker->randomElement([
            'American Indian or Alaska Native',
            'Asian',
            'Black or African American',
            'Native Hawaiian or Other Pacific Islander',
            'White',
            'Other',
            'Unknown',
            'Declined to specify'
        ]),
    ];
});

$factory->define(\App\Models\Appointment::class, function(Generator $faker) {
    return [
        'patient_id' => $faker->randomElement([1,2,4,5,6,7,10]),
        'provider_id' => $faker->randomElement([34, 37]),
        'reason' => $faker->realText($maxNbChars = 100, $indexSize = 2),
        'scheduled_on' => Carbon::now(),
        'minutes' => $faker->randomElement([20,45,60,15]),
        'exam_room' => $faker->randomElement(['Room 1','Room 2','Room 3','Room 4']),
        'is_active' => $faker->boolean,
        'doctors_note' => $faker->realText($maxNbChars = 150, $indexSize = 2),
    ];
});

$factory->define(\App\Models\Chat::class, function(Generator $faker) {
    return [
        'id' => $faker->uuid,
        'user_id' => 42,
    ];
});
