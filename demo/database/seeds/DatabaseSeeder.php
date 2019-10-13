<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	//$this->call('categorysSeed');
    	//$this->call('vendorsSeed');
    	$this->call('productsSeed');
      //$this->call('User');
    }
}
class User extends Seeder{
  public function run(){
    for($i = 3; $i<=100; $i++){
      DB::table('users')->insert(['name' => "user ".$i, 'email' => "user".$i."@demo.shop.com",'password' => Hash::make('123456789')]);
    }
  }
}
class categorysSeed extends Seeder{
	public function run()
	{
		for($i = 1; $i <= 100; $i++)
		DB::table('categorys')->insert(['name' => 'category_name: '.str_random(20), 'description' => 'description_category'.str_random(20)]);
	}
}

class vendorsSeed extends Seeder{
	public function run()
	{
		for($i = 1; $i <= 100 ;$i++)
		DB::table('vendors')->insert(['name' => 'vendor_name'.str_random(20), 'description' => 'description_vendor'.str_random(20)]);
	}
}

class productsSeed extends Seeder{
	public function run()
	{
		for($i = 1 ; $i <= 100 ; $i++)
		DB::table('products')->insert(['name' => 'product_name'.str_random(20),'price' => 0,'import_price' => 0,'description' => 'description_product'.str_random(20),'categorys_id' => rand(1,100), 'vendors_id' => rand(1,100), 'sale' => 0]);
	}
}

class customersSeed extends Seeder{
	public function run()
	{
		for($i = 1 ; $i <= 90; $i++)
		DB::table('customers')->insert(['name' => 'customers_name'.str_random(20),'phone' => '0904162778' , 'address' => 'customer_address'.str_random(20)]);
	}
}

class usersCustomerssSeed extends Seeder{
	public function run()
	{
		for($i = 0 ; $i <= 100 ; $i++)
			DB::table('users_customers')->insert(['users_id' => rand(1,3), 'customers_id' => rand(1,100)]);
	}
}

class mediaSeed extends Seeder{
	public function run()
	{
		for($i = 0; $i <= 100 ; $i++)
			DB::table('media')->insert(['name' => 'media_name'.str_random(20),'path' => str_random(20)]);
	}
}

class mediaProductsSeed extends Seeder{
	public function run(){
		for($i = 0 ; $i <= 100 ; $i++)
			DB::table('products_media')->insert(['products_id' => rand(1,100), 'media_id' => rand(1,100)]);
	}
}
