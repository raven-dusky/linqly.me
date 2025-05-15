<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Social;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public $socials = [
        ['icon' => 'bluesky', 'name' => 'bluesky', 'color' => '#0055FF'],
        ['icon' => 'discord', 'name' => 'discord', 'color' => '#5865F2'],
        ['icon' => 'facebook', 'name' => 'facebook', 'color' => '#1877F2'],
        ['icon' => 'github', 'name' => 'github', 'color' => '#181717'],
        ['icon' => 'instagram', 'name' => 'instagram', 'color' => '#E4405F'],
        ['icon' => 'linkedin', 'name' => 'linkedin', 'color' => '#0A66C2'],
        ['icon' => 'messenger', 'name' => 'messenger', 'color' => '#0084FF'],
        ['icon' => 'paypal', 'name' => 'paypal', 'color' => '#003087'],
        ['icon' => 'pinterest', 'name' => 'pinterest', 'color' => '#BD081C'],
        ['icon' => 'reddit', 'name' => 'reddit', 'color' => '#FF4500'],
        ['icon' => 'snapchat', 'name' => 'snapchat', 'color' => '#FFFC00'],
        ['icon' => 'spotify', 'name' => 'spotify', 'color' => '#1DB954'],
        ['icon' => 'telegram', 'name' => 'telegram', 'color' => '#26A5E4'],
        ['icon' => 'tiktok', 'name' => 'tiktok', 'color' => '#FF0050'],
        ['icon' => 'twitch', 'name' => 'twitch', 'color' => '#9146FF'],
        ['icon' => 'twitter-x', 'name' => 'twitter-x', 'color' => '#000000'],
        ['icon' => 'whatsapp', 'name' => 'whatsapp', 'color' => '#25D366'],
        ['icon' => 'youtube', 'name' => 'youtube', 'color' => '#FF0000']
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
                'icon' => $social['icon'],
                'color' => $social['color']
            ]);
        }

        for ($i = 1; $i <= 5; $i++) {
            Social::create([
                'name' => 'generic_' . $i,
                'icon' => 'link-45deg',
                'color' => '#000000'
            ]);
        }
    }
}
