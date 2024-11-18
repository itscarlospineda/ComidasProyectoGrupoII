<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Dish;
use App\Models\Reward;
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

        /* Post::create([
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
*/
        Dish::create([
            'name' => 'Catrachitas',
            'desc' => 'Tradicional entrada que lleva con orgullo el pseudónimo de nuestro país. Incluye como ingrediente principal los frijoles con queso.',
            'price' => 15.50,
        ]);

         Dish::create([
            'name' => 'Sopa de Caracol',
            'desc' => 'Una sopa hondureña que tiene como ingrediente la leche de coco y el caracol, que te transportará a una explosión de sabores a tu paladar.',
            'price' => 40.00,
        ]);

        Dish::create([
            'name' => 'Nacatamales',
            'desc' => 'Son un plato tipico que se prepara para grandes celebraciones como la navidad y año nuevo.',
            'price' => 25.00,
        ]);
        
        Dish::create([
            'name' => 'Pescado Frito',
            'desc' => 'Un plato tradicional de las costumbres culinarias de centroamerica. Un plato de pescado frito con tajadas de platano y acompañantes deliciosos.',
            'price' => 95.00,
        ]);
         Dish::create([
            'name' => 'Plato tipico Hondureño',
            'desc' => 'Un manjar con variedad de ingredientes que componen, un plato lleno de color, sabor y cultura.',
            'price' => 85.00,
        ]);
        Dish::create([
            'name' => 'Yuca con chicharron',
            'desc' => 'Comida de la región que despliega una diversidad de texturas y sabores que lo convierte en una delicia culinaria.',
            'price' => 70.00,
        ]);
        Dish::create([
            'name' => 'Arroz con leche',
            'desc' => 'Delicioso arroz cocido en diferente tipos de leche, ideal para servir como postre.',
            'price' => 50.00,
        ]);
        Dish::create([
            'name' => 'Hojuelas',
            'desc' => 'Deliciosas hojuelas de maíz, se suelen servir en fiestas y reuniones.',
            'price' => 30.00,
        ]);
           Dish::create([
            'name' => 'PLatano maduro en miel',
            'desc' => 'látano maduro combinado con miel que lo convierte en un manjar.',
            'price' => 30.00,
        ]);
        
         Dish::create([
            'name' => 'Pastel tres leches',
            'desc' => 'látano maduro combinado con miel que lo convierte en un manjar.',
            'price' => 60.00,
        ]);
        /*

        Reward::create( [
        "Name"  => "Orden tajadas",
        "Description" => "Complementa tus platos con una porcion extra de tajadas. ",
        "Points_needed" => 50,
        ]);
        
        Reward::create( [
        "Name"  => "Tres leches pequeño",
        "Description" => "Saborea el sabor de nuestros postres para nuestros clientes fieles. ",
        "Points_needed" => 80,
        ]);

        Reward::create( [
        "Name"  => "Pierna/Cadera pollo frito",
        "Description" => "Agrega mas carne y mas sabor a tu plato.",
        "Points_needed" => 110,
        ]);

        Reward::create( [
            "Name"  => "Pollo chuco",
            "Description" => "El mayor premio para nuestros clientes leales de corazon, un plato entero de pollo chuco solo para ti.",
            "Points_needed" => 170,
            ]);
            */
    }
}
