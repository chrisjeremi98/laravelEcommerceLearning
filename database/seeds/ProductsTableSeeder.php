<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Tohato Chocobi Star Shaped Chocolate Snacks, 25 g',
            'slug' => 'tohato-chocobi-star',
            'description' => 'A chocolate snack that sparkles with tastiness. Satisfy your between-meal hunger pangs with these cute star-shaped snacks. Corn-based and crunchy, these calcium-enriched snacks have a mild chocolate flavour that is sure to appeal to your sweet tooth. Each box comes with one of twenty-five character stickers from the popular Japanese anime, Crayon Shin-chan.',
            'price' => 20000.00,
            'image' => 'tohato.jpg',
        ]);

        DB::table('products')->insert([
            'name' => 'Gekkeikan Kome To Mizu No Sake Junmai Sake, 720 ml',
            'slug' => 'gekkeikan-kome-to-mizu-no-sake-junmai-sake',
            'description' => 'A versatile sake ideal for sake drinking beginners and experts alike! Made using koshihikari rice (which is particularly well-suited for sake making), this dry sake is mellow and full-bodied in flavour, with a fruity aroma and refreshing aftertaste. Its flexibility makes it ideal for drinking chilled, at room temperature or gently warmed, or even as part of a sake cocktail or infusion. Try drinking this sake in a variety of ways and see which way you enjoy most.

Sake Category: Junmai (pure rice wine)
Sake Metre Value: +3.5 (dry)
Acidity: 1.3 (low to average)
Flavour: Dry, mellow, full-bodied, refreshing
Fragrance: Fruity
Drinking Temperature: Chilled, room temperature, or warmed to 35-40 degrees celsius
Food Pairing: Delicious to enjoy with full-flavoured sushi (such as mackerel or smoked salmon), tofu, salads, and grilled meats.',
            'price' => 350000.00,
            'image' => 'gekkeikan.jpg',
        ]);

        DB::table('products')->insert([
            'name' => 'Noodle Bowl - Black, 135 g',
            'slug' => 'noodle-bowl-black',
            'description' => 'Practical and durable.

This large noodle/donburi bowl is perfect for serving one-bowl hot meals like udon, soba, and donburi. Made in Japan from recycled polyurethane, this bowl is able to withstand temperatures of up to 140°C, making it both microwave and dishwasher safe. Ideal for everyday use. Bowl measures approx. 14.5cm in diameter, 8cm in height.',
            'price' => 70000.00,
            'image' => 'noodle-bowl-black.jpg',
        ]);

        DB::table('products')->insert([
            'name' => 'Ceramic Lucky Cat Figurines, 55 g',
            'slug' => 'ceramic-lucky-cat-figurines',
            'description' => 'Add a little luck to the room.

Brighten up either yours or a loved one\'s home or work space with this pair of adorable lucky cat ornaments. Made from ceramic, these lucky cats are a pale yellow in colour, with red paws, ears, and collars. Both cats are clutching traditional koban coins in one paw, while their other paw is raised to beckon good luck to come their way. This is an ideal little gift for cat lovers or people needing a little extra luck on their side. Ornaments measure approx. 4cm in width, 3.5cm in depth, 4.5cm in height.',
            'price' => 78000.00,
            'image' => 'lucky-cat-ceramics-figurines.jpg',
        ]);

        DB::table('products')->insert([
            'name' => 'Kumamon Origami Paper, 50 g, 16 sheets',
            'slug' => 'kumamon-origami-paper',
            'description' => 'Voted the most popular mascot in Japan in 2011, Kumamon is the official mascot of Kumamoto Prefecture in Western Japan. With the special paper and a few simple folds you can create your own paper Kumamon poloshirt, standing bear, box, chopstick stand, or envelope. Instructions included are in Japanese, but are clear and easy to follow with pictures. If you love bears, you are sure to love Kumamon and all their beary goodness.',
            'price' => 52500.00,
            'image' => 'original.jpg',
        ]);
        DB::table('products')->insert([
            'name' => 'Pop Culture Snack Box Subscription',
            'slug' => 'snack-box-subscription',
            'description' => 'Sign up for our Pop Culture Snack Box to get the coolest, quirkiest and most colourful selection of Japanese snacks and confectionery delivered to your door every month. With the contents changing every month, you’re sure to be surprised and delighted each time you open up your Pop Culture Snack Box.',
            'price' => 250000.00,
            'image' => 'candy-box.jpg',
        ]);

        DB::table('products')->insert([
            'name' => 'Japan Centre Fresh Box Subscription',
            'slug' => 'japan-centre-fresh-subscription',
            'description' => 'Subscribe today and receive rewards including, exclusive tea towel, a pair of chopsticks, soy sauce dish and even bonus Loyalty Points. Don\'t forget to sign up to our newsletter for exclusive offers.',
            'price' => 450500.00,
            'image' => 'fresh-box.jpg',
        ]);

        DB::table('products')->insert([
            'name' => 'Classic Sake Set Subscription, 1 bottle of sake, 2 snacks',
            'slug' => 'classic-sake-set-subscription',
            'description' => 'With this monthly subscription, you will receive a different bottle of sake with every order as well as a selection of savoury snacks that compliment your sake. ',
            'price' => 350000.00,
            'image' => 'classic_sake_set.jpg',
        ]);
    }
}
