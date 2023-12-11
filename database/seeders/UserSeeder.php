<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        User::create(
            [
            'name' => 'Админ',
            'phone_number' => '971003021',
            'email' => 'admin@gmail.com',
            'password' => bcrypt(11111111),
            'branch_id'=>1,
            'role_id' => 1
        ]);

        User::create(
            [
            'name' => 'Республика',
            'phone_number' => '901003021',
            'email' => 'respublika@gmail.com',
            'password' => bcrypt(11111111),
            'branch_id' => 1,
            'role_id' => 2
        ]);

        User::create(
            [
            'name' => 'Андижан',
            'phone_number' => '911003021',
            'email' => 'andijon@gmail.com',
            'password' => bcrypt(11111111),
            'branch_id' => 2,
            'role_id' => 2
        ]);

        User::create(
            [
            'name' => 'Наманган',
            'phone_number' => '921003021',
            'email' => 'namangan@gmail.com',
            'password' => bcrypt(11111111),
            'branch_id' => 3,
            'role_id' => 2
        ]);

        User::create(
            [
            'name' => 'Фергана',
            'phone_number' => '931003021',
            'email' => 'fergana@gmail.com',
            'password' => bcrypt(11111111),
            'branch_id' => 4,
            'role_id' => 2
        ]);

        User::create(
            [
            'name' => 'Ташкент',
            'phone_number' => '941003021',
            'email' => 'tashkent@gmail.com',
            'password' => bcrypt(11111111),
            'branch_id' => 5,
            'role_id' => 2
        ]);

        User::create(
            [
            'name' => 'Сырдарья',
            'phone_number' => '951003021',
            'email' => 'sirdarya@gmail.com',
            'password' => bcrypt(11111111),
            'branch_id' => 6,
            'role_id' => 2
        ]);

        User::create(
            [
            'name' => 'Джизак',
            'phone_number' => '961003021',
            'email' => 'jizzakh@gmail.com',
            'password' => bcrypt(11111111),
            'branch_id' => 7,
            'role_id' => 2
        ]);

        User::create(
            [
            'name' => 'Самарканд',
            'phone_number' => '981003021',
            'email' => 'samarkand@gmail.com',
            'password' => bcrypt(11111111),
            'branch_id' => 8,
            'role_id' => 2
        ]);

        User::create(
            [
            'name' => 'Кашкадарья',
            'phone_number' => '991003021',
            'email' => 'kashkadarya@gmail.com',
            'password' => bcrypt(11111111),
            'branch_id' => 9,
            'role_id' => 2
        ]);

        User::create(
            [
            'name' => 'Сурхандарья',
            'phone_number' => '992003021',
            'email' => 'surkhandarya@gmail.com',
            'password' => bcrypt(11111111),
            'branch_id' => 10,
            'role_id' => 2
        ]);

        User::create(
            [
            'name' => 'Навои',
            'phone_number' => '902003021',
            'email' => 'navoi@gmail.com',
            'password' => bcrypt(11111111),
            'branch_id' => 11,
            'role_id' => 2
        ]);

        User::create(
            [
            'name' => 'Бухара',
            'phone_number' => '912003021',
            'email' => 'bukhara@gmail.com',
            'password' => bcrypt(11111111),
            'branch_id' => 12,
            'role_id' => 2
        ]);

        User::create(
            [
            'name' => 'Хорезм',
            'phone_number' => '922003021',
            'email' => 'khorezm@gmail.com',
            'password' => bcrypt(11111111),
            'branch_id' => 13,
            'role_id' => 2
        ]);

        User::create(
            [
            'name' => 'Каракалпакстан',
            'phone_number' => '932003021',
            'email' => 'karakalpakstan@gmail.com',
            'password' => bcrypt(11111111),
            'branch_id' => 14,
            'role_id' => 2
        ]);
        User::create(
            [
            'name' => 'Подтверждатель',
            'phone_number' => '903306022',
            'email' => 'confirmator@gmail.com',
            'password' => bcrypt(11111111),
            'branch_id' => 1,
            'role_id' => 4
        ]);

    }
}
