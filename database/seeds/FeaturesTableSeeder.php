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
        DB::table('features')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'name' => 'Location Hours',
          'description' => 'We are open 5 days a week. Monday - Friday ( 9AM to 4:30pm )',
          'charity_id' => $ch->id,
        ]);
        DB::table('features')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'name' => 'Countries of Operations',
          'description' => 'USA, Canada, India and South Africa',
          'charity_id' => $ch->id,
        ]);
      }
    }
}
