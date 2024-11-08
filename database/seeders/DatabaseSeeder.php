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
            'title' => 'Implementación de Nuevo Sistema de Reserva',
            'content' => 'La implementación de un nuevo sistema de reserva en la plataforma de comidas representa un avance significativo en la optimización de los procesos de gestión de pedidos y atención al cliente. Este sistema permite a los usuarios realizar reservas anticipadas en restaurantes y locales de comida directamente desde la plataforma, seleccionando el horario y número de comensales de manera rápida y sencilla. Gracias a una interfaz intuitiva, el sistema facilita la visualización de la disponibilidad en tiempo real y envía recordatorios automáticos a los usuarios, lo que reduce las tasas de no asistencia y mejora la organización para el personal del restaurante.

Por otro lado, este sistema ofrece ventajas adicionales tanto para el cliente como para el establecimiento. Los restaurantes pueden ajustar su inventario de alimentos y su personal de manera más precisa, al tener un conocimiento anticipado de la demanda esperada. A su vez, la plataforma proporciona a los clientes una experiencia más personalizada al ofrecer recomendaciones basadas en sus reservas previas y preferencias. La integración de este sistema de reservas dentro de la plataforma de comidas no solo mejora la eficiencia operativa, sino que también fortalece la lealtad del cliente y permite a los negocios de alimentos planificar de manera más estratégica.',
            'author' => 'Gerencia Sabor Catracho',
            'category' => 'Informativo',
            'upload_date' => '2024-11-6',
        ]);

    }
}
