<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     * @throws \Exception
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $league = \App\League::firstOrCreate(['name' => 'Insider League']);

        \App\Season::firstOrCreate([
            'name' => '2020-2021',
            'starts_at' => '2020-10-10',
            'ends_at' => '2020-10-10',
            'season' => '2020-2021',
            'is_active' => false,
            'league_id' => $league->id
        ]);

        \App\Team::firstOrCreate(['name' => 'Takım 1', 'league_id' => $league->id], ['power' => random_int(1, 100)]);
        \App\Team::firstOrCreate(['name' => 'Takım 2', 'league_id' => $league->id], ['power' => random_int(1, 100)]);
        \App\Team::firstOrCreate(['name' => 'Takım 3', 'league_id' => $league->id], ['power' => random_int(1, 100)]);
        \App\Team::firstOrCreate(['name' => 'Takım 4', 'league_id' => $league->id], ['power' => random_int(1, 100)]);

    }
}
