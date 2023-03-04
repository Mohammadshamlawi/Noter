<?php

namespace Database\Seeders;

use App\Models\Collection;
use App\Models\Project;
use Illuminate\Database\Seeder;

class CollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Collection::factory(2)->create();

        Collection::factory(5)
            ->has(
                Project::factory(10)
                    ->hasNotes(10)
            )
            ->create();
    }
}
