<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Gallery;
use App\Models\Section;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Thiago Verissimo',
            'email' => 'thiagoverissimodev@gmail.com',
            'password' => '123456',
        ]);
        Section::create([
            'name' => 'Artigos',
            'slug' => 'artigos',
            'priority' => '1',
            'description' => 'Link do menu superior para redirecionar para o artigos do blog',
            'menu' => '1',
            'status' => '1',
            'type' => '1',
            'url' => 'artigos'
        ]);
        Section::create([
            'name' => 'Sobre',
            'slug' => 'sobre',
            'priority' => '1',
            'description' => 'Link do menu superior para redirecionar para a página sobre do blog',
            'menu' => '1',
            'status' => '1',
            'type' => '1',
            'url' => 'sobre'
        ]);
        Section::create([
            'name' => 'Textos página inicial',
            'slug' => 'textos-pagina-inicial',
            'priority' => '1',
            'description' => 'Textos página inicial',
            'menu' => '2',
            'status' => '1',
            'type' => '1',
        ]);
        $categoryOne = Category::create([
            'name' => 'Carrossel',
            'description' => 'Esta é a categoria do Carrossel',
            'type_media' => '1',
            'status' => '1'
        ]);
        $categoryTwo = Category::create([
            'name' => 'Video Página Inicial',
            'description' => 'Video Página Inicial do Site',
            'type_media' => '2',
            'status' => '1'
        ]);
        Gallery::create([
            'name' => 'Galeria Carrossel',
            'date_event' => Carbon::now()->format('Y-m-d H:i:s'),
            'category_id' => $categoryOne->id,
            'description' => 'Esta é a galeria do Carrossel',
            'status' => '1'
        ]);
        Gallery::create([
            'name' => 'Video Página Inicial',
            'date_event' => Carbon::now()->format('Y-m-d H:i:s'),
            'category_id' => $categoryTwo->id,
            'description' => 'Video Canal do YouTube',
            'status' => '1'
        ]);
    }
}
