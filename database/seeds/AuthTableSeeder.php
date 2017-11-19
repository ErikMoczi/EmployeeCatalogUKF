<?php

use Illuminate\Database\Seeder;

/**
 * Class AuthTableSeeder
 */
class AuthTableSeeder extends Seeder
{
    use TruncateTable;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncate('user');

        $this->call(UserTableSeeder::class);
    }
}
