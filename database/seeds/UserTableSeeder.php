<?php

use Illuminate\Database\Seeder;
use App\User;
			
class UserTableSeeder extends Seeder
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
				'name' 	=> 'Jorge L. Sacristán Calonge',
				'email' 	=> 'asirjorge@gmail.com',
				'user'	=> 'JorgeL',
				'nif'	=> '06278252B',
				'password' 	=> \Hash::make('123456'), 
				'type' 		=> 'admin',
				'online' 	=> 1,
				'tlf' => '677215498',
				'address' => 'Prado, 19',  
				'cp' => '16630', 
				'town' => 'Mota del Cuervo', 
				'province' => 'Cuenca', 
				'country' => 'España', 
				'created_at'=> new DateTime,
				'updated_at'=> new DateTime
			],
			[
				'name' 		=> 'Inés Moya Fernández',
				'email' 	=> 'ines@gmail.com',
				'user'	=> 'InesM',
				'nif'	=> '02555894C',
				'password' 	=> \Hash::make('123456'), 
				'type' 		=> 'user',
				'online' 	=> 1,
				'tlf' => '666587121',
				'address' => 'Fuente del Oro, 23-B',  
				'cp' => '25004', 
				'town' => 'Albacete', 
				'province' => 'Albacete', 
				'country' => 'España', 
				'created_at'=> new DateTime,
				'updated_at'=> new DateTime
			],

		);

		User::insert($data);
    }
}
