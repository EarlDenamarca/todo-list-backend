<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Todo;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Sample Todo 1',
            'Sample Todo 2',
            'Sample Todo 3'
        ];

        foreach ( $data as $dat ) {
            Todo::create([
                'todo' => $dat
            ]);
        }
    }
}
