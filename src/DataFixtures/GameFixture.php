<?php

namespace App\DataFixtures;

use App\Entity\Game; 
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GameFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $games = [
            ['name' => 'Nebula Chronicles', 'genre' => 'RPG/Exploration Spatiale'],
            ['name' => 'Vortex: Quantum Awakening', 'genre' => 'FPS/Science-fiction'],
            ['name' => 'Legends of Titania', 'genre' => 'MMORPG'],
            ['name' => 'ChronoSwords', 'genre' => 'Action/Plateforme'],
            ['name' => 'Phantom Racer', 'genre' => 'Course futuriste'],
            ['name' => 'Arcane Odyssey', 'genre' => 'RPG/Fantasy'],
            ['name' => 'Tales of the Fallen Kingdom', 'genre' => 'Stratégie en temps réel'],
            ['name' => 'Echoes of Eternity', 'genre' => 'Puzzle/Aventure'],
            ['name' => 'Last Light', 'genre' => 'Survival Horror'],
            ['name' => 'CyberShift: Rogue Protocol', 'genre' => 'Hack’n’Slash/Action'],
            ['name' => 'Starship Legends', 'genre' => 'Simulation/Exploration spatiale'],
            ['name' => 'Rewind: Parallel Dimensions', 'genre' => 'Aventure narrative/Plateforme'],
            ['name' => 'Quantum Nexus', 'genre' => 'FPS/Science-fiction'],
            ['name' => 'The Forgotten Realms', 'genre' => 'RPG/Aventure'],
            ['name' => 'Void Seekers', 'genre' => 'FPS/Aventure'],
            ['name' => 'Mystic Dungeons', 'genre' => 'Action/RPG'],
            ['name' => 'Dead Moon Rising', 'genre' => 'Survival Horror/Science-fiction'],
            ['name' => 'Deep Rift', 'genre' => 'Exploration sous-marine'],
            ['name' => 'Zenith Wars', 'genre' => 'Stratégie au tour par tour'],
            ['name' => 'City of Shadows', 'genre' => 'Action/Aventure'],
        ];

        foreach ($games as $data) {
            $game = new Game();
            $game->setName($data['name']);
            $game->setGenre($data['genre']);

            $manager->persist($game);
        }

        $manager->flush();
    }
}
