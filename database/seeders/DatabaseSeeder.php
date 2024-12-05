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

        //EJEMPLO SEEDER DE USER
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

        //EJEMPLO SEEDER DE POSTS
        /*Post::create([
            'title' => 'Sorteo de Guitarra por Compras',
            'content' => 'Por la compra de 500 lempiras en nuestras sucursales, participas en un sorteo de guitarra, cortesía de nuestros proveedores. Sorteo a realizarse el 28 de noviembre del presente año.',
            'author' => 'Gerencia Sabor Catracho',
            'category' => 'Informativo',
        ]);
        Post::create([
            'title' => 'Musica en vivo',
            'content' => 'Disfruta de un ambiente acogerdor gracias a nuestros musicos que estaran interpretando un repertorio que te hara sentir en casa. Disfruta de esto este sabado 30',
            'author' => 'Gerencia Sabor Catracho',
            'category' => 'Informativo',
        ]);

        Post::create([
            'title' => 'Producto gratis con tus compras',
            'content' => 'Acumula puntos con cada compra que realices, visita el apartado recompensas de tu perfil y disfruta el fruto de tu fidelidad.',
            'author' => 'Gerencia Sabor Catracho',
            'category' => 'Informativo',
        ]);*/

        //SEEDER DE PLATILLOS COMIENZA AQUI
        Dish::create([
            'name' => 'Baleada Sencilla',
            'desc' => 'Exquisita tortilla de harina con frijoles, queso y mantequilla. Vendida por unidad.',
            'price' => json_encode(
                    [
                        [
                            "name"=> "Sencilla", "price"=>22
                        ],
                        [
                            "name"=> "Con huevo", "price"=>30
                        ],
                        [
                            "name"=> "Con todo", "price"=>50
                        ],
                        ]),
            'category' => 'Desayunos',         
            #'extras' =>json_encode([ ['name'=>'Aguacate', 'price'=>15] , ]),
            'picture' => 'foods/Baleada-Sencilla.jpg',
        ]);
        

        Dish::create([
            'name' => 'Pollo Chuco',
            'desc' => 'Bandeja con nuestro excelente pollo frito, acompañado con tajadas y salsa al gusto.',
            'price' => json_encode(
                    [
                        [
                            "name"=> "Pierna", "price"=>45
                        ],
                        [
                            "name"=> "Pechuga", "price"=>80
                        ],
                        [
                            "name"=> "Ala", "price"=>50
                        ],
                        ]),
            'category' => 'Almuerzos',
            #'extras' =>json_encode([ ['name'=>'Tajadas', 'price'=>0] , ['name'=>'Papas', 'price'=>10], ]),
            'picture' => 'foods/pollo-chuco.jpeg',
        ]);
        
        Dish::create([
            'name' => 'Tacos Dorados',
            'desc' => 'Orden de tres tacos dorados acompañado con vegetales abundantes y salsa de mantequilla de la casa.',
            'price' => 60,
            'category' => 'Almuerzos',
            'picture' => 'foods/tacos-dorados.jpg',
        ]);

        Dish::create([
            'name' => 'Catrachitas',
            'desc' => 'Tradicional entrada que lleva con orgullo el pseudónimo de nuestro país. Incluye como ingrediente principal los frijoles con queso.',
            'price' => 15.50,
            'category' => 'Entradas',
            'picture' => 'foods/catrachitas.jpeg',
        ]);

         Dish::create([
            'name' => 'Sopa de Caracol',
            'desc' => 'Una sopa hondureña que tiene como ingrediente la leche de coco y el caracol, que te transportará a una explosión de sabores a tu paladar.',
            'price' => 240.00,
            'category' => 'Almuerzos',
            'picture' => 'foods/sopa-caracol.jpg',
        ]);

        Dish::create([
            'name' => 'Nacatamales',
            'desc' => 'Son un plato tipico que se prepara para grandes celebraciones como la navidad y año nuevo.',
            'price' => 25.00,
            'category' => 'Entradas',
            'picture' => 'foods/nacatamal.jpg',
        ]);
        
        Dish::create([
            'name' => 'Pescado Frito',
            'desc' => 'Un plato tradicional de las costumbres culinarias de centroamerica. Un plato de pescado frito con tajadas de platano y acompañantes deliciosos.',
            'price' => 95.00,
            'category' => 'Almuerzos',
            'picture' => 'foods/pescado-frito.jpg',
        ]);

        Dish::create([
            'name' => 'Plato Tipico',
            'desc' => 'Un manjar con variedad de ingredientes que componen, un plato lleno de color, sabor y cultura.',
            'price' => 85.00,
            'category' => 'Desayunos',
            'picture' => 'foods/plato-tipico.png',
        ]);

        Dish::create([
            'name' => 'Yuca con chicharron',
            'desc' => 'Comida de la región que despliega una diversidad de texturas y sabores que lo convierte en una delicia culinaria.',
            'price' => 70.00,
            'category' => 'Almuerzos',
            'picture' => 'foods/Yuca-chicharron.jpg',
        ]);

        Dish::create([
            'name' => 'Arroz con leche',
            'desc' => 'Delicioso arroz cocido en diferente tipos de leche, ideal para servir como postre.',
            'price' => 50.00,
            'category' => 'Postres',
            'picture' => 'foods/arroz-con-leche.png',
        ]);

        Dish::create([
            'name' => 'Hojuelas',
            'desc' => 'Deliciosas hojuelas de maíz, se suelen servir en fiestas y reuniones.',
            'price' => 30.00,
            'category' => 'Postres',
            'picture' => 'foods/hojuelas.jpg',
        ]);

        Dish::create([
            'name' => 'Platano maduro en miel',
            'desc' => 'Plátano maduro combinado con miel que lo convierte en un manjar.',
            'price' => 30.00,
            'category' => 'Entradas',
            'picture' => 'foods/platano-miel.jpg',
        ]);
        
        Dish::create([
            'name' => 'Tres leches',
            'desc' => 'El único e inigualable postre, sello de la casa y de nuestra cultura para sellar un buen tiempo de comida.',
            'price' => 60.00,
            'category' => 'Postres',
            'picture' => 'foods/tres-leches.jpg',
        ]);
        

        //SEEDER PARA RECOMPENSAS
        User::create([
            'username' => 'admin',
            'fname' => 'Admin',
            'lname' => 'User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password789'), // Make sure to hash the password
            'phone_num' => '3389-5786',
            'address' => 'San Pedro Sula, HN',
            'role' => 'admin', // Assuming 'role' is a column in your users table
            'profile_picture' => 'profile_pictures/default-profile.png', // Default profile picture if any
        ]);

        Reward::create( [
        "Name"  => "Orden de Tajadas",
        "Description" => "Complementa tus platos con una porción extra de tajadas. ",
        "Points_needed" => 50,
        ]);
        
        Reward::create( [
        "Name"  => "Tres Leches Pequeño",
        "Description" => "Saborea el sabor de nuestros postres para nuestros clientes fieles. ",
        "Points_needed" => 80,
        ]);

        Reward::create( [
        "Name"  => "Pierna/Cadera Pollo Frito",
        "Description" => "Agrega más carne y más sabor a tu plato.",
        "Points_needed" => 110,
        ]);

        Reward::create( [
            "Name"  => "Pollo Chuco",
            "Description" => "El mayor premio para nuestros clientes leales de corazon, un plato entero de pollo chuco solo para ti.",
            "Points_needed" => 250,
            ]);
            
    }
}
