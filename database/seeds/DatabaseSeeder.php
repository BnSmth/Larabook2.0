<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

    protected $tables = [
        'users',
        'statuses'
    ];

    protected $seeders = [
        'UsersTableSeeder',
        'StatusesTableSeeder'
    ];

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

        $this->cleanDatabase();

        foreach($this->seeders as $seeder)
        {
            $this->call($seeder);
        }
	}

    /**
     * Clean out the database for new seed generation
     */
    protected function cleanDatabase() {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");

        foreach($this->tables as $table)
        {
            DB::table($table)->truncate();
        }

        DB::statement("SET FOREIGN_KEY_CHECKS=1");
    }

}
