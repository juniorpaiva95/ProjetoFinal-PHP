<?php

use Illuminate\Database\Seeder;
use App\Entities\Livro;
class LivrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Entities\Livro::class,50)->create();
    }
}
