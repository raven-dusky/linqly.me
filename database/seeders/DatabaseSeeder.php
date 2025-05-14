<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Social;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public $socials = [
        ['icon' => 'bluesky', 'name' => 'bluesky'],
        ['icon' => 'discord', 'name' => 'discord'],
        ['icon' => 'facebook', 'name' => 'facebook'],
        ['icon' => 'github', 'name' => 'github'],
        ['icon' => 'instagram', 'name' => 'instagram'],
        ['icon' => 'linkedin', 'name' => 'linkedin'],
        ['icon' => 'messenger', 'name' => 'messenger'],
        ['icon' => 'paypal', 'name' => 'paypal'],
        ['icon' => 'pinterest', 'name' => 'pinterest'],
        ['icon' => 'reddit', 'name' => 'reddit'],
        ['icon' => 'snapchat', 'name' => 'snapchat'],
        ['icon' => 'spotify', 'name' => 'spotify'],
        ['icon' => 'telegram', 'name' => 'telegram'],
        ['icon' => 'tiktok', 'name' => 'tiktok'],
        ['icon' => 'twitch', 'name' => 'twitch'],
        ['icon' => 'twitter-x', 'name' => 'twitter-x'],
        ['icon' => 'whatsapp', 'name' => 'whatsapp'],
        ['icon' => 'youtube', 'name' => 'youtube']
    ];

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password')
        ]);

        foreach ($this->socials as $social) {
            Social::create([
                'name' => $social['name'],
                'icon' => $social['icon']
            ]);
        }
    }
}
