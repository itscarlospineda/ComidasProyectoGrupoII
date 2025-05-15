<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Dish;
use App\Models\Settings;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
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

         Category::create([
            'name' => 'Baleadas',
         ]);
         Category::create([
            'name' => 'Golosinas',
         ]);
         Category::create([
            'name' => 'Combos Familiares',
         ]);
         Category::create([
            'name' => 'Combos para Dos',
         ]);
         Category::create([
            'name' => 'Pollo con tajadas',
         ]);
         Category::create([
            'name' => 'Pollo con papas',
         ]);


        Dish::create([
            'name' => 'Baleadas',
            'desc' => 'Exquisita tortilla de harina con frijoles, queso y mantequilla. Vendida por unidad.',
            'price' => json_encode(
                    [
                        [
                            "name"=> "Sencilla", "price"=>10
                        ],
                        [
                            "name"=> "Con huevo", "price"=>16
                        ],
                        [
                            "name"=> "Con Embutido", "price"=>15
                        ],
                        [
                            "name"=> "Con Chorizo", "price"=>15
                        ],
                        [
                            "name"=> "Huevo y Chorizo", "price"=>25
                        ],
                        [
                            "name"=> "Con pollo", "price"=>25
                        ],
                        ]),
            'category_id' => 1,    
            'picture' => 'foods/Baleada-Sencilla.jpg',
        ]);
        

        Dish::create([
            'name' => 'Pollo Chuco con tajadas',
            'desc' => 'Bandeja con nuestro excelente pollo frito, acompañado con tajadas y salsa al gusto.',
            'price' => json_encode(
                    [
                        [
                            "name"=> "Media Porcion Pierna", "price"=>55
                        ],
                        [
                            "name"=> "Media Porcion cadera", "price"=>60
                        ],
                        [
                            "name"=> "Media Porcion Ala", "price"=>65
                        ],
                          [
                            "name"=> "Media porcion Pechuga", "price"=>75
                        ],
                          [
                            "name"=> "Porcion Pierna-Cadera", "price"=>90
                        ],
                          [
                            "name"=> "Porcion Ala-Pechuga", "price"=>98
                        ],
                        ]),
            'category_id' => 5,
            'picture' => 'foods/pollo-chuco.jpeg',
        ]);


Dish::create([
            'name' => 'Pollo Chuco con papas',
            'desc' => 'Bandeja con nuestro excelente pollo frito, acompañado con papas y salsa al gusto.',
            'price' => json_encode(
                    [
                        [
                            "name"=> "Media Porcion Pierna", "price"=>70
                        ],
                        [
                            "name"=> "Media Porcion cadera", "price"=>80
                        ],
                        [
                            "name"=> "Media Porcion Ala", "price"=>85
                        ],
                          [
                            "name"=> "Media porcion Pechuga", "price"=>90
                        ],
                          [
                            "name"=> "Porcion Pierna-Cadera", "price"=>100
                        ],
                          [
                            "name"=> "Porcion Ala-Pechuga", "price"=>110
                        ],
                        ]),
            'category_id' => 6,
            'picture' => 'foods/pollo-chuco.jpeg',
        ]);

        
        Dish::create([
            'name' => 'Chuleta con tajadas',
            'desc' => 'Descripcion.',
            'price' => 85,
            'category_id' => 2,
            'picture' => 'foods/tacos-dorados.jpg',
        ]);

         Dish::create([
            'name' => 'Tajadas con carne molida',
            'desc' => 'Descripcion.',
            'price' => 55,
            'category_id' => 2,
            'picture' => 'foods/tacos-dorados.jpg',
        ]);
         Dish::create([
            'name' => 'Costillas de cerdo en Salsa BBQ',
            'desc' => 'Descripcion.',
            'price' => 95,
            'category_id' => 2,
            'picture' => 'foods/tacos-dorados.jpg',
        ]);
        
        Dish::create([
            'name' => 'Patas de pollo con tajadas',
            'desc' => 'Descripcion.',
            'price' => 50,
            'category_id' => 2,
            'picture' => 'foods/tacos-dorados.jpg',
        ]);
        Dish::create([
            'name' => 'Tacos flauta',
            'desc' => 'Orden de 2.',
            'price' => 80,
            'category_id' => 2,
            'picture' => 'foods/tacos-dorados.jpg',
        ]);

        Dish::create([
            'name' => 'Enchiladas',
            'desc' => 'Orden de 2.',
            'price' => 45,
            'category_id' => 2,
            'picture' => 'foods/tacos-dorados.jpg',
        ]);

        Dish::create([
            'name' => 'Nachos con pollo',
            'desc' => 'Descripcion.',
            'price' => 95,
            'category_id' => 2,
            'picture' => 'foods/tacos-dorados.jpg',
        ]);

        Dish::create([
            'name' => 'Alitas en salsa BBQ o Bufalo',
            'desc' => 'Descripcion.',
            'price' => json_encode(
                    [
                        [
                            "name"=> "Salsa BBQ", "price"=>110
                        ],
                        [
                            "name"=> "Salsa Bufalo", "price"=>110
                        ],
                        ]),
            'category_id' => 2,
            'picture' => 'foods/tacos-dorados.jpg',
        ]);


        Dish::create([
            'name' => 'Familiar 1',
            'desc' => '8 piezas de pollo, 4 ordenes de tajadas y 1 pepsi 2L',
            'price' => 350,
            'category_id' => 3,
            'picture' => 'foods/tacos-dorados.jpg',
        ]);


        Dish::create([
            'name' => 'Familiar 2',
            'desc' => '8 piezas de pollo, 4 ordenes de papas y 1 pepsi 2L',
            'price' => 370,
            'category_id' => 3,
            'picture' => 'foods/tacos-dorados.jpg',
        ]);

        Dish::create([
            'name' => 'Super Familiar 3',
            'desc' => '10 piezas de pollo, 4 ordenes de tajadas y 1 pepsi 2L',
            'price' => 445,
            'category_id' => 3,
            'picture' => 'foods/tacos-dorados.jpg',
        ]);

 Dish::create([
            'name' => 'Super Familiar 4',
            'desc' => '10 piezas de pollo, 4 ordenes de papas y 1 pepsi 2L',
            'price' => 485,
            'category_id' => 3,
            'picture' => 'foods/tacos-dorados.jpg',
        ]);

         Dish::create([
            'name' => 'Mega Familiar 5',
            'desc' => '14 piezas de pollo, 4 ordenes de tajadas y 1 pepsi 3L',
            'price' => 485,
            'category_id' => 3,
            'picture' => 'foods/tacos-dorados.jpg',
        ]);

 Dish::create([
            'name' => 'Mega Familiar 6',
            'desc' => '14 piezas de pollo, 4 ordenes de papas y 1 pepsi 3L',
            'price' => 620,
            'category_id' => 3,
            'picture' => 'foods/tacos-dorados.jpg',
        ]);

         Dish::create([
            'name' => 'Combo para 2 #1 ',
            'desc' => '1 porcion de Pierna-Cadera, 1 porcion pechuga-ala, 1 orden de tajadas y 1 pepsi 1.25L',
            'price' => 197,
            'category_id' => 4,
            'picture' => 'foods/tacos-dorados.jpg',
        ]);


         Dish::create([
            'name' => 'Combo para 2 #2 ',
            'desc' => '1 porcion de Pierna-Cadera, 1 porcion pechuga-ala, 1 orden de tajadas y 1 pepsi 1.25L',
            'price' => 197,
            'category_id' => 4,
            'picture' => 'foods/tacos-dorados.jpg',
        ]);

        User::create([
            'username' => 'capineda',
            'fname' => 'Carlos Andres',
            'lname' => 'Pineda',
            'email' => 'carlos@gmail.com',
            'password' => Hash::make('password123'), // Make sure to hash the password
            'phone_num' => '9988-7766',
            'address' => 'San Pedro Sula, HN',
            'role' => 'user', // Assuming 'role' is a column in your users table
             
        ]);

        User::create([
            'username' => 'admin1',
            'fname' => 'amin1',
            'lname' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'), // Make sure to hash the password
            'phone_num' => '9988-7766',
            'address' => 'San Pedro Sula, HN',
            'role' => 'admin', // Assuming 'role' is a column in your users table
           
        ]);

        
        Settings::create([
            "allowPayments"=>False,
        ]);
    }
}
