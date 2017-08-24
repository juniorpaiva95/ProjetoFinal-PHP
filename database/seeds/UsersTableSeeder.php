<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use App\Entities\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name'=>'Junior Paiva','login'=>'juniorpaiva95','password'=>Hash::make("123456"),'cpf'=>'116.135.984-24','email'=>'juniorpaiva95@gmail.com']);
        User::create(['name'=>'Lucas Dantas','login'=>'lluke8','password'=>Hash::make("123456"),'cpf'=>'116.135.984-25','email'=>'lluke8@gmail.com']);
        User::create(['name'=>'Renan Mendes','login'=>'renanmendes','password'=>Hash::make("123456"),'cpf'=>'116.135.984-26','email'=>'renanmendes@gmail.com']);
    }
}
