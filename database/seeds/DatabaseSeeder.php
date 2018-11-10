<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ThemeTableSeeder::class);
        $this->call(JobCategoryTableSeeder::class);
        $this->call(SkillTableSeeder::class);
	$this->call(SkillDetailTableSeeder::class);
    }
}
