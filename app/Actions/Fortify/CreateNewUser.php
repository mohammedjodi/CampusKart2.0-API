<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     * 
     * @param  array<string, string>  $input
     *
     * @throws ValidationException
     */
    public function create(array $input): User
    {
       $validated =  Validator::make($input, [
            'first_name' => ['required', 'string', 'min:3', 'max:255'],

            'last_name' => ['required', 'string', 'min:3', 'max:255'],

            'username' => [
                'required',
                'string',
                'min:3',
                'max:255',
                Rule::unique('users', 'username'),
            ],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users', 'email'),
            ],

            'phone' => ['required', 'string', 'max:20'],

            'university_id' => [
                'required',
                'integer',
                Rule::exists('universities', 'id'),
            ],

            'bio' => ['nullable', 'string', 'max:500'],

            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],

            'password' => $this->passwordRules(),

        ])->validate();

        // Store the validated data in the database and return the created user instance
        return User::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'university_id' => $validated['university_id'],
            'bio' => $validated['bio'] ?? null,
            'avatar' => $validated['avatar'] ?? null,
            'password' => $validated['password'],
        ]);
    }
}
