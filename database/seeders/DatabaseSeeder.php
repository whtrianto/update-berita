<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
            ]
        );

        $categories = collect([
            ['name' => 'Berita', 'slug' => 'berita'],
            ['name' => 'Teknologi', 'slug' => 'teknologi'],
            ['name' => 'Olahraga', 'slug' => 'olahraga'],
        ])->map(fn($c) => Category::firstOrCreate(['slug' => $c['slug']], $c));

        $tags = collect([
            ['name' => 'Laravel', 'slug' => 'laravel'],
            ['name' => 'PHP', 'slug' => 'php'],
            ['name' => 'Indonesia', 'slug' => 'indonesia'],
        ])->map(fn($t) => Tag::firstOrCreate(['slug' => $t['slug']], $t));

        $post1 = Post::firstOrCreate(
            ['slug' => 'hello-laravel-portal'],
            [
                'user_id' => $user->id,
                'category_id' => $categories->first()->id,
                'title' => 'Hello Laravel Portal',
                'excerpt' => 'Contoh postingan pertama.',
                'content' => 'Ini adalah contoh konten postingan portal berita menggunakan Laravel 12.',
                'is_published' => true,
                'published_at' => now(),
            ]
        );
        $post1->tags()->sync($tags->pluck('id')->take(2));

        $post2 = Post::firstOrCreate(
            ['slug' => 'update-teknologi-terbaru'],
            [
                'user_id' => $user->id,
                'category_id' => $categories->get(1)->id,
                'title' => 'Update Teknologi Terbaru',
                'excerpt' => 'Ringkasan kabar teknologi.',
                'content' => 'Berbagai pembaruan teknologi dan framework modern.',
                'is_published' => true,
                'published_at' => now(),
            ]
        );
        $post2->tags()->sync($tags->pluck('id')->all());
    }
}
