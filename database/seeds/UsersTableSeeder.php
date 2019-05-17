<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->command->getOutput()->writeln('<info>Creating a user</info>');
        $data['name'] = $this->command->ask('Name');
        $data['email'] = $this->command->ask('Email address');
        $data['password'] = $this->command->ask('Password (the password you enter can be seen here)');

        $validator_result = \Illuminate\Support\Facades\Validator::make($data, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        if (!$validator_result->fails()) {
            $user = \App\Models\User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => \Illuminate\Support\Facades\Hash::make($data['password'])
            ]);

            $this->command->getOutput()->writeln('<info>' . $user->name . ' account created successfully.</info>');

        } else {
            $this->command->getOutput()->writeln('<fg=black;bg=red>Account not created, check below errors and try again.</>');
            foreach ($validator_result->errors()->messages() as $err) {
                $this->command->getOutput()->writeln('<comment>- ' . $err[0] . '</comment>');
            }
        }


    }
}
