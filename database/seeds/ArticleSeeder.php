<?php

use App\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles = array(
            array("title" => "Pantai Kuta, Bali", "description" => "Pantai Kuta adalah sebuah tempat pariwisata", "image" => "", "category_id" => 1),
            array("title" => "Gunung Sinabung", "description" => "Gunung Sinabung adalah sebuah gunung yang berada di Sumatera Utara", "image" => "", "category_id" => 2),
            array("title" => "Lorem Ipsum", "description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.", "image" => "", "category_id" => 2),
        );

        for ($i = 0; $i < count($articles); $i++) {
            $article = new Article();
            $article->title = $articles[$i]["title"];
            $article->description = $articles[$i]["description"];
            $article->image = $articles[$i]["image"];
            $article->user_id = 1;
            $article->category_id = $articles[$i]["category_id"];
            $article->save();
        }
    }
}
