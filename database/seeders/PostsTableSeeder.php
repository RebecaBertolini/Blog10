<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('posts')->insert([
        //     'title' => 'Post exemplo',
        //     'description' => 'Descrição post',
        //     'body' => 'Conteúdo do post',
        //     'slug' => 'post-exemplo',
        //     'thumb' => 'thumb-test.png',
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s')
        // ]);

        //Gerar no bd 5 posts fakes via factory(fabrica)
        // \App\Models\Post::factory(5)->create();

        //gera mais 10 posts com estado de is_active true
        // \App\Models\Post::factory(10)->active()->create();

        \App\Models\User::factory(10)->hasPosts(5, ['is_active' => true])->create();
    }
}
