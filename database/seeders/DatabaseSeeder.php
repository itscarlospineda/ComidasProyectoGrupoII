<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        /*User::create([
            'username' => 'capineda',
            'fname' => 'Carlos Andres',
            'lname' => 'Pineda',
            'email' => 'carlos@gmail.com',
            'password' => Hash::make('password123'), // Make sure to hash the password
            'phone_num' => '9988-7766',
            'address' => 'San Pedro Sula, HN',
            'role' => 'user', // Assuming 'role' is a column in your users table
            'profile_picture' => 'profile_pictures/default-profile.png', // Default profile picture if any
        ]);*/

        Post::create([
            'title' => 'Apertura de Nueva Sucursal Comercial',
            'content' => 'La empresa **Favorita Click Shop** se enorgullece en anunciar la apertura de su nueva sucursal, diseñada para ofrecer una experiencia de compra moderna y cómoda a todos sus clientes. Con un espacio amplio y organizado, esta nueva tienda permitirá acceder a una variedad aún mayor de productos de alta calidad, garantizando el mismo excelente servicio que caracteriza a Favorita Click Shop. Esta apertura representa un paso más en el compromiso de la empresa por estar cerca de sus clientes y brindarles la mejor atención en cada visita. ¡Te invitamos a conocer la nueva sucursal y disfrutar de una experiencia de compra única!
               La nueva sucursal de **Favorita Click Shop** ha sido diseñada pensando en la comodidad y satisfacción de nuestros clientes, ofreciendo un ambiente moderno y acogedor donde podrán encontrar una amplia selección de productos de primera calidad. Este nuevo espacio refuerza nuestro compromiso de estar más cerca de ti, brindándote una experiencia de compra ágil y personalizada con la misma atención que nos caracteriza. Además, la sucursal cuenta con áreas de autoservicio y un equipo dedicado para asesorarte en todo lo que necesites. ¡Ven y descubre todo lo que Favorita Click Shop tiene para ofrecer en este nuevo punto de encuentro!',
            'author' => 'Gerencia Sabor Catracho',
            'category' => 'Informativo',
            'upload_date' => '2024-11-1',
        ]);

    }
}
