<?php

use Illuminate\Database\Seeder;
use App\Entities\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      User::create(['cpf' => '12345678972',
            'name' => 'João',
            'phone' => '3544556699',
            'birth' => '1980-10-01',
            'gender' => 'M',
            'notes' => 'xd',
            'email' => 'joao2@sistema.com',
            'password' => env('PASSWORD_HASH') ? bcrypt('1234567') : '123456',
            ]);
    }
}
