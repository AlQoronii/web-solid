<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $article = [
            [
                'article_title' => 'First Article',
                'article_content' => 'Content of the first article.',
                ],
                [
                'article_title' => 'Second Article',
                'article_content' => 'Content of the second article.',
                ],
                [
                'article_title' => 'Third Article',
                'article_content' => 'Content of the third article.',
                ],
                [
                'article_title' => 'Fourth Article',
                'article_content' => 'Content of the fourth article.',
                ],
                [
                'article_title' => 'Fifth Article',
                'article_content' => 'Content of the fifth article.',
                ],
                [
                'article_title' => 'Sixth Article',
                'article_content' => 'Content of the sixth article.',
                ],
                [
                'article_title' => 'Seventh Article',
                'article_content' => 'Content of the seventh article.',
                ],
                [
                'article_title' => 'Eighth Article',
                'article_content' => 'Content of the eighth article.',
                ],
                [
                'article_title' => 'Ninth Article',
                'article_content' => 'Content of the ninth article.',
                ],
                [
                'article_title' => 'Tenth Article',
                'article_content' => 'Content of the tenth article.',
            ]
        ];

        foreach ($article as $article){
            Article::create($article);
        }
    }
}
