<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charity;
use App\Feature;
use Session;

class FeatureController extends Controller
{
      public function create($charity_id)
      {
          $charity = Charity::where('id', '=', $charity_id);
          if ($charity -> count()) {
            $charity = $charity -> first();
          }
          return view('feature.create')->with([
              'charity' => $charity,
          ]);
      }


      /**
      * POST
      */
      public function store(Request $request, $charity_id)
      {

          # Validate
          $this->validate($request, [
              'name' => 'required|min:3',
              'description' => 'required|min:10|max:1024',
          ]);

          $charity = Charity::where('id', '=', $charity_id);
          if ($charity -> count()) {
            $charity = $charity -> first();
          }

          $feature = new Feature();
          $feature->name = $request->input('name');
          $feature->description = $request->input('description');
          $feature->charity_id = $charity->id;
          $feature->save();


          Session::flash('flash_message', 'Your feature '.$feature->name.' was added to charity '.$charity->charity_name);

          return redirect('/charitys'.'/'.$charity_id);

      }


      /**
    	* GET
        * Page to confirm deletion
    	*/
        public function delete($charity_id, $id) {

            $charity = Charity::find($charity_id);

            $feature = Feature::find($id);

            return view('feature.delete')->with([
                'charity' => $charity,
                'feature' => $feature,
            ]);
        }

      /**
      * POST
      */
      public function destroy($charity_id, $id)
      {
        $charity = Charity::find($charity_id);

        $feature = Feature::find($id);

          if(is_null($charity)) {
              Session::flash('message','Charity not found.');
              return redirect('/charitys');
          }

          if(is_null($feature)) {
              Session::flash('message','Charity not found.');
              return redirect('/charitys'.'/'.$charity_id);
          }

          # First remove any tags associated with this book
          #if($book->tags()) {
          #    $book->tags()->detach();
          #}

          $feature->delete();

          # Finish
          Session::flash('flash_message', 'feature '.$feature->name.' for '.$charity->charity_name.' was deleted.');
          return redirect('/charitys'.'/'.$charity_id);
      }

      public function edit($charity_id, $id)
      {
          $charity = Charity::find($charity_id);

          $feature = Feature::find($id);

          return view('feature.edit')->with([
              'charity' => $charity,
              'feature' => $feature,
          ]);
      }

      /**
      * POST
      */
      public function update(Request $request, $charity_id , $id)
      {

        # Validate
        $this->validate($request, [
            'name' => 'required|min:3',
            'description' => 'required|min:10|max:1024',
        ]);

        $charity = Charity::where('id', '=', $charity_id);
        if ($charity -> count()) {
          $charity = $charity -> first();
        }

        $feature = Feature::where('id', '=', $id);
        if ($feature -> count()) {
          $feature = $feature -> first();
        }
        $feature->name = $request->input('name');
        $feature->description = $request->input('description');
        $feature->charity_id = $charity->id;
        $feature->save();


        Session::flash('flash_message', 'Your feature '.$feature->name.' was edited for charity '.$charity->charity_name);

        return redirect('/charitys'.'/'.$charity_id);
      }
}
