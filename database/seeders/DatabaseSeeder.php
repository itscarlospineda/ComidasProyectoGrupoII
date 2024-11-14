<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Dish;
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
            'title' => 'Sorteo de Guitarra por Compras',
            'content' => 'Por la compra de 500 lempiras en nuestras sucursales, participas en un sorteo de guitarra, cortesía de nuestros proveedores. Sorteo a realizarse el 28 de noviembre del presente año.',
            'author' => 'Gerencia Sabor Catracho',
            'category' => 'Informativo',
            'upload_date' => '2024-11-9',
        ]);

        Dish::create([
            'name' => 'Baleadas Sencilla',
            'desc' => 'Exquisita tortilla de harina con frijoles, queso y mantequilla. Vendida por unidad.',
            'price' => 20,
        ]);

        Dish::create([
            'name' => 'Pollo Chuco',
            'desc' => 'Bandeja con nuestro excelente pollo frito, acompañado con tajadas y salsa al gusto.',
            'price' => 100,
        ]);

        Dish::create([
            'name' => 'Tacos Dorados',
            'desc' => 'Orden de tres tacos dorados acompañado con vegetales abundantes y salsa de mantequilla de la casa.',
            'price' => 115,
        ]);

    }
}
