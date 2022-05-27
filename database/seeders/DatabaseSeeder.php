<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Course::create([    
            'id' => 1,
            'name' => 'Myanmar'
        ]);
        Course::create([    
            'id' => 2,
            'name' => 'English'
        ]);
        Course::create([    
            'id' => 3,
            'name' => 'Math'
        ]);
        Course::create([    
            'id' => 4,
            'name' => 'Physics'
        ]);
        Course::create([    
            'id' => 5,
            'name' => 'Chemistry'
        ]);
        Course::create([    
            'id' => 6,
            'name' => 'Bio'
        ]);
        Course::create([    
            'id' => 7,
            'name' => 'Eco'
        ]);
    }
}
