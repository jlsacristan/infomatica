<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
			[
				'name' 			=> 'Asus F555YA-XX038T AMD E1-7010/4GB/500GB/15.6"',
				'link' 			=> 'asus-F555YA-XX038T',
				'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus repellendus doloribus molestias odio nisi! Aspernatur eos saepe veniam quibusdam totam.',
				'short_description'		=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
				'price' 		=> 675.00,
				'image' 		=> 'asus_f552cl_sx_i3_3217u.jpg',
				'visible' 		=> 1,
				'quantity_stock'		=> 25,
				'created_at' 	=> new DateTime,
				'updated_at' 	=> new DateTime,
				'category_id' 	=> 1
			],
			[
				'name' 			=> 'HP 250 G4 I3-5005U/4GB/500GB/15.6"',
				'link' 			=> 'hp-250-g4',
				'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus repellendus doloribus molestias odio nisi! Aspernatur eos saepe veniam quibusdam totam.',
				'short_description'		=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
				'price' 		=> 45.00,
				'image' 		=> 'asus_f555ya_xx038t.jpg',
				'visible' 		=> 1,
				'quantity_stock'		=> 16,
				'created_at' 	=> new DateTime,
				'updated_at' 	=> new DateTime,
				'category_id' 	=> 1
			],
			[
				'name' 			=> 'Producto 3',
				'link' 			=> 'producto-3',
				'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus repellendus doloribus molestias odio nisi! Aspernatur eos saepe veniam quibusdam totam.',
				'short_description'		=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
				'price' 		=> 175.00,
				'image' 		=> 'hp_250_g4_i3.jpg',
				'visible' 		=> 1,
				'quantity_stock'		=> 8,
				'created_at' 	=> new DateTime,
				'updated_at' 	=> new DateTime,
				'category_id' 	=> 1
			],
			[
				'name' 			=> 'Producto 4',
				'link' 			=> 'producto-4',
				'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus repellendus doloribus molestias odio nisi! Aspernatur eos saepe veniam quibusdam totam.',
				'short_description'		=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
				'price' 		=> 275.00,
				'image' 		=> 'msi_gp62_2qe_202xes.jpg',
				'visible' 		=> 1,
				'quantity_stock'		=> 12,
				'created_at' 	=> new DateTime,
				'updated_at' 	=> new DateTime,
				'category_id' 	=> 1
			],
			[
				'name' 			=> 'Smarhpone 1',
				'link' 			=> 'smarthpone-1',
				'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus repellendus doloribus molestias odio nisi! Aspernatur eos saepe veniam quibusdam totam.',
				'short_description'		=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
				'price' 		=> 1275.00,
				'image' 		=> 'huawei_ascend_g535.jpg',
				'visible' 		=> 1,
				'quantity_stock'		=> 8,
				'created_at' 	=> new DateTime,
				'updated_at' 	=> new DateTime,
				'category_id' 	=> 2
			],
			[
				'name' 			=> 'Smarhpone 2',
				'link' 			=> 'smarthpone-2',
				'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus repellendus doloribus molestias odio nisi! Aspernatur eos saepe veniam quibusdam totam.',
				'short_description'		=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
				'price' 		=> 75.00,
				'image' 		=> 'huawei_p8.jpg',
				'visible' 		=> 1,
				'quantity_stock'		=> 8,
				'created_at' 	=> new DateTime,
				'updated_at' 	=> new DateTime,
				'category_id' 	=> 2
			],
			[
				'name' 			=> 'Smarhpone 3',
				'link' 			=> 'smarthpone-3',
				'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus repellendus doloribus molestias odio nisi! Aspernatur eos saepe veniam quibusdam totam.',
				'short_description'		=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
				'price' 		=> 35.00,
				'image' 		=> 'leotec_argon.jpg',
				'visible' 		=> 1,
				'quantity_stock'		=> 8,
				'created_at' 	=> new DateTime,
				'updated_at' 	=> new DateTime,
				'category_id' 	=> 2
			],
			[
				'name' 			=> 'Smarhpone 4',
				'link' 			=> 'smarthpone-4',
				'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus repellendus doloribus molestias odio nisi! Aspernatur eos saepe veniam quibusdam totam.',
				'short_description'		=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
				'price' 		=> 175.00,
				'image' 		=> 'meizu_m2.jpg',
				'visible' 		=> 1,
				'quantity_stock'		=> 8,
				'created_at' 	=> new DateTime,
				'updated_at' 	=> new DateTime,
				'category_id' 	=> 2
			],
			
		);

		Product::insert($data);
    }
}
