<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Se il seeder è già stato lanciato in precedenza, cancella tutto prima di rilanciarlo:
        City::truncate();
        // Leggi il file CSV in modalità read
        $file_path = public_path('/files/cities.csv');
        $file_handler = fopen($file_path, 'r');
        // Esegui una volta la funzione fgetcsv per spostare il puntatore alla seconda riga del file (SKIPPANDO COSì LA PRIMA RIGA)
        $jump_one_line = fgetcsv($file_handler);

        while ($row = fgetcsv($file_handler)) {
            City::create([
                'name' => $row[5],
                'province' => $row[13],
                'region' => $row[9],
            ]);
        }
    }
}
