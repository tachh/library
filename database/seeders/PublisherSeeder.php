<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    public function run(): void
    {
        $publishers = [
            'Penguin Random House',
            'HarperCollins',
            'Simon & Schuster',
            'Hachette Livre',
            'Macmillan Publishers',
            'Scholastic',
            'Wiley',
            'Pearson',
            'Oxford University Press',
            'Cambridge University Press'
        ];

        foreach ($publishers as $publisher) {
            Publisher::create([
                'name' => $publisher,
                'address' => "Headquarters of $publisher",
                'description' => "One of the leading publishers in the industry"
            ]);
        }
    }
}
