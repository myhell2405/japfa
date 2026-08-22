<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        $password = Hash::make('password123');

        // Remove if already exists for idempotency
        DB::table('users')->whereIn('username', array_merge(
            array_map(fn($i)=>"owner{$i}", range(1,3)),
            ['manajer1'],
            array_map(fn($i)=>"operator{$i}", range(1,5))
        ))->delete();

        // owners
        for ($i=1;$i<=3;$i++){
            $u = "owner{$i}";
            DB::table('users')->insert([
                'name' => $u,
                'email' => $u . '@example.com',
                'username' => $u,
                'password' => $password,
                'role' => 'owner',
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        // manajer
        DB::table('users')->insert([
            'name' => 'manajer1',
            'email' => 'manajer1@example.com',
            'username' => 'manajer1',
            'password' => $password,
            'role' => 'manajer',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // operators
        for ($i=1;$i<=5;$i++){
            $u = "operator{$i}";
            DB::table('users')->insert([
                'name' => $u,
                'email' => $u . '@example.com',
                'username' => $u,
                'password' => $password,
                'role' => 'operator',
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
