<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Javascript',
                'description' => 'Ask questions and share tips for JavaScript, jQuery, React, Vue, Node, 
                 D3 - anything that touches the vast JavaScript and npm ecosystem.'
            ],
            [
                'name' => 'Python',
                'description' => 'Ask questions and share tips related to Python and any tools in the Python ecosystem.'
            ],
            [
                'name' => 'Html-Css',
                'description' => 'Ask about anything related to HTML and CSS, including web design tools like Sass and Bootstrap.'
            ],
            [
                'name' => 'Backend Development',
                'description' => 'Discuss Linux, SQL, Git, Node.js / Django, Docker, NGINX, Php, Laravel and any sort of database / server tools'
            ],
            [
                'name' => 'C#',
                'description' => 'Ask questions and share tips related to C# and any tools in the .NET ecosystem.'
            ],
        ]);
    }
}
