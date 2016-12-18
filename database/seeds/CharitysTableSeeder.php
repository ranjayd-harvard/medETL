<?php

use Illuminate\Database\Seeder;
use App\User;

class CharitysTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $existingUsers = User::all();

      foreach($existingUsers as $user) {
        foreach(array(1,2) as $i) {
            DB::table('charitys')->insert([
              'created_at' => Carbon\Carbon::now()->toDateTimeString(),
              'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
              'charity_name' => $user->name.' - Charity '. $i,
              'charity_desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sed urna arcu. Integer sit amet risus nisi. Nulla ut consequat quam. Etiam at facilisis metus, id lobortis elit. Donec vel nulla egestas, malesuada arcu vel, pellentesque augue. Nullam quis dapibus neque. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;',
              'address1' => '123 Main St',
              'address2' => '',
              'city' => 'Boston',
              'state' => 'MA',
              'zipcode' => '02110',
              'phone1' => '(123) 456-7890',
              'country' => 'USA',
              'user_id' => $user->id,
            ]);
          }
      }
    }
}
