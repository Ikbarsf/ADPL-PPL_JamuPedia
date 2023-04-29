<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Laravel\Fortify\Fortify;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;
    protected function mitra(User $user){
        $user->assignRole('mitra');
    }
    protected function customer(User $user){
        $user->assignRole('customer');
    }


    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'alamat' => ['required', 'string'],
            'password' => $this->passwordRules(),
            // 'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $role = $input['role'];

        if($role==='mitra'){
            return DB::transaction(function () use ($input) {
                return tap(User::create([
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'alamat' => $input['alamat'],
                    'password' => Hash::make($input['password']),
                ]), 
                function (User $user) {
                    $this->mitra($user);
                    return redirect()->intended(Fortify::redirects('login'));
                });
            });
        }else{
            return DB::transaction(function () use ($input) {
                return tap(User::create([
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'alamat' => $input['alamat'],
                    'password' => Hash::make($input['password']),
                ]), 
                function (User $user) {
                    $this->customer($user);
                });
            });
        }

        // return User::create([
            // 'name' => $input['name'],
            // 'email' => $input['email'],
            // 'alamat' => $input['alamat'],
            // 'password' => Hash::make($input['password']),
        // ]);
    }
}
