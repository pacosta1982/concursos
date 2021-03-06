<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'last_login_at' => $faker->dateTime,
        
    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\ContactMethod::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Disability::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Company::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'acronym' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Language::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'acronym' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\EducationLevel::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\CallType::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Position::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'acronym' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\CallTable::class, static function (Faker\Generator $faker) {
    return [
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Call::class, static function (Faker\Generator $faker) {
    return [
        'description' => $faker->sentence,
        'call_type_id' => $faker->randomNumber(5),
        'position_id' => $faker->randomNumber(5),
        'company_id' => $faker->randomNumber(5),
        'start' => $faker->dateTime,
        'end' => $faker->dateTime,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\DisengagementReason::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\LanguageLevel::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\EthnicGroup::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\RequirementType::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Requirement::class, static function (Faker\Generator $faker) {
    return [
        'position_id' => $faker->randomNumber(5),
        'requirement_type_id' => $faker->randomNumber(5),
        'education_level_id' => $faker->randomNumber(5),
        'name' => $faker->firstName,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Resume::class, static function (Faker\Generator $faker) {
    return [
        'names' => $faker->sentence,
        'last_names' => $faker->sentence,
        'government_id' => $faker->sentence,
        'birthdate' => $faker->date(),
        'gender' => $faker->sentence,
        'nationality' => $faker->sentence,
        'address' => $faker->sentence,
        'neighborhood' => $faker->sentence,
        'phone' => $faker->sentence,
        'email' => $faker->email,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\AcademicState::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\AcademicTraining::class, static function (Faker\Generator $faker) {
    return [
        'resume_id' => $faker->randomNumber(5),
        'education_level_id' => $faker->randomNumber(5),
        'academic_state_id' => $faker->randomNumber(5),
        'name' => $faker->firstName,
        'institution' => $faker->sentence,
        'registered' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\LanguageLevelResume::class, static function (Faker\Generator $faker) {
    return [
        'resume_id' => $faker->randomNumber(5),
        'language_id' => $faker->randomNumber(5),
        'language_level_id' => $faker->randomNumber(5),
        'certificate' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\EndReason::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\WorkExperience::class, static function (Faker\Generator $faker) {
    return [
        'resume_id' => $faker->randomNumber(5),
        'company' => $faker->sentence,
        'position' => $faker->sentence,
        'tasks' => $faker->text(),
        'start' => $faker->date(),
        'end' => $faker->date(),
        'end_reason_id' => $faker->randomNumber(5),
        'contact' => $faker->text(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Application::class, static function (Faker\Generator $faker) {
    return [
        'code' => $faker->sentence,
        'call_id' => $faker->randomNumber(5),
        'resume_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        'data' => ['en' => $faker->sentence],
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Status::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Status::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'color' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\ApplicationStatus::class, static function (Faker\Generator $faker) {
    return [
        'application_id' => $faker->randomNumber(5),
        'status_id' => $faker->randomNumber(5),
        'user' => $faker->sentence,
        'user_model' => $faker->sentence,
        'description' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Status::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'color' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'type' => $faker->sentence,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\CallStatus::class, static function (Faker\Generator $faker) {
    return [
        'call_id' => $faker->randomNumber(5),
        'status_id' => $faker->randomNumber(5),
        'user' => $faker->sentence,
        'user_model' => $faker->sentence,
        'description' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\DisabilityResume::class, static function (Faker\Generator $faker) {
    return [
        'disability_id' => $faker->randomNumber(5),
        'cause' => $faker->sentence,
        'percent' => $faker->randomNumber(5),
        'certificate' => $faker->sentence,
        'certificate_date' => $faker->date(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\DisabilityResume::class, static function (Faker\Generator $faker) {
    return [
        'resume_id' => $faker->randomNumber(5),
        'disability_id' => $faker->randomNumber(5),
        'cause' => $faker->sentence,
        'percent' => $faker->randomNumber(5),
        'certificate' => $faker->sentence,
        'certificate_date' => $faker->date(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\EthnicResume::class, static function (Faker\Generator $faker) {
    return [
        'resume_id' => $faker->randomNumber(5),
        'name' => $faker->firstName,
        'zone' => $faker->sentence,
        'registered' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\State::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'color' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
