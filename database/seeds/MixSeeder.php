<?php

use Illuminate\Database\Seeder;

use App\Flavour;
use App\Mix;
use App\MixComment;
use App\MixFlavour;

class MixSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Mix::class, 30)->create()->each(function ($mix) {
            factory(Flavour::class, rand(1, 5))->create()->each(function ($flavour) use ($mix) {
                factory(MixFlavour::class)->create([
                    'mix_id' => $mix->id,
                    'flavour_id' => $flavour->id,
                ]);
            });

            factory(MixComment::class, rand(3, 6))->create([
                'mix_id' => $mix->id,
            ]);
        });
    }
}
