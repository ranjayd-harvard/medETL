<?php

use Illuminate\Database\Seeder;
use App\Charity;

class FeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $existingCharitys = Charity::all();

      foreach($existingCharitys as $ch) {
        foreach(array(1,2,3,4,5) as $i) {
            DB::table('features')->insert([
              'created_at' => Carbon\Carbon::now()->toDateTimeString(),
              'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
              'name' => 'Feature '.$i.' : '.$ch->charity_name,
              'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sed urna arcu. Integer sit amet risus nisi. Nulla ut consequat quam. Etiam at facilisis metus, id lobortis elit. Donec vel nulla egestas, malesuada arcu vel, pellentesque augue. Nullam quis dapibus neque. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;',
              'charity_id' => $ch->id,
            ]);
          }
      }
    }
}
