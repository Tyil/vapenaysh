<?php

use Illuminate\Database\Seeder;

use App\Flavour;
use App\Mix;
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
        $flavours = [
            ['Strawberry', 'Some weird brand'],
            ['Banana', 'Some other weird brand'],
        ];

        foreach ($flavours as $flavour) {
            list($name, $brand) = $flavour;

            $record = new Flavour();

            $record->name = $name;
            $record->brand = $brand;
            $record->link = '';
            $record->save();
        }

        $mixes = [
            'Bananaberry'
        ];

        foreach ($mixes as $name) {
            $record = new Mix();

            $record->name = $name;
            $record->created_by = 1;
            $record->save();
        }

        $mixFlavours = [
            'test' => [
                [1, 1],
                [1, 2],
            ],
        ];

        foreach ($mixFlavours as $mixName => $mixFlavour) {
            foreach ($mixFlavour as $entry) {
                list($mixId, $flavourId) = $entry;

                $record = new MixFlavour();

                $record->mix_id = $mixId;
                $record->flavour_id = $flavourId;
                $record->save();
            }
        }
    }
}
