<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charity;
use Session;

class CharityController extends Controller
{

    /**
    * GET
    */
    public function index(Request $request)
    {
      $user = $request->user();
      if($user) {
          $charitys = Charity::where('user_id', '=', $user->id)->orderBy('id','DESC')->get();
      }
      else {
          $charitys = [];
      }

      return view('charity.index')->with([
          'charitys' => $charitys
      ]);
    }

    /**
    * GET
    */
    public function create()
    {
        return view('charity.create');
    }


    /**
    * POST
    */
    public function store(Request $request)
    {

        # Validate
        $this->validate($request, [
            'name' => 'required|min:3',
            'description' => 'required|min:10|max:1024',
            'address1' => 'required|min:3',
            'city' => 'required|min:3',
            'state' => 'required|min:2',
            'phone' => 'required|min:10',
            'zipcode' => 'required|numeric|min:5',
        ]);

        $charity = new Charity();
        $charity->charity_name = $request->input('name');
        $charity->charity_desc = $request->input('description');
        $charity->address1 = $request->input('address1');
        $charity->address2 = $request->input('address2');
        $charity->city = $request->input('city');
        $charity->state = $request->input('state');
        $charity->phone1 = $request->input('phone');
        $charity->zipcode = $request->input('zipcode');
        $charity->country = 'USA';
        $charity->user_id = $request->user()->id;
        $charity->save();

        Session::flash('flash_message', 'Your charity '.$charity->title.' was added.');

        return redirect('/charitys');

    }


    /**
    * GET
    */
    public function show($id)
    {
        $charity = Charity::find($id);

        if(is_null($charity)) {
            Session::flash('message','Book not found');
            return redirect('/charitys');
        }

        return view('charity.show')->with([
            'charity' => $charity,
        ]);
    }

    public function edit($id)
    {
        $charity = Charity::find($id);

        return view('charity.edit')->with([
                'charity' => $charity,
        ]);
    }

    /**
    * POST
    */
    public function update(Request $request, $id)
    {

        # Validate
        $this->validate($request, [
            'name' => 'required|min:3',
            'description' => 'required|min:10|max:1024',
            'address1' => 'required|min:3',
            'city' => 'required|min:3',
            'state' => 'required|min:2',
            'phone' => 'required|min:10',
            'zipcode' => 'required|numeric|min:5',
        ]);

        # Find and update charity
        $charity = Charity::find($id);
        $charity->charity_name = $request->input('name');
        $charity->charity_desc = $request->input('description');
        $charity->address1 = $request->input('address1');
        $charity->address2 = $request->input('address2');
        $charity->city = $request->input('city');
        $charity->state = $request->input('state');
        $charity->phone1 = $request->input('phone');
        $charity->zipcode = $request->input('zipcode');
        $charity->country = 'USA';
        $charity->user_id = $request->user()->id;
        $charity->save();

        # Finish
        Session::flash('flash_message', 'Your changes to '.$charity->charity_name.' were saved.');
        return redirect('/charitys');
    }


    /**
  	* GET
      * Page to confirm deletion
  	*/
      public function delete($id) {

          $charity = Charity::find($id);

          return view('charity.delete')->with('charity', $charity);
      }

    /**
    * POST
    */
    public function destroy($id)
    {
        # Get the book to be deleted
        $charity = Charity::find($id);

        if(is_null($charity)) {
            Session::flash('message','Charity not found.');
            return redirect('/charitys');
        }

        # First remove any features/members associated with this charity
        if($charity->features()) {
            $charity->features()->delete();
        }
        if($charity->members()) {
            $charity->members()->delete();
        }


        # Then delete the charity
        $charity->delete();

        # Finish
        Session::flash('flash_message', $charity->charity_name.' was deleted.');
        return redirect('/charitys');
    }


}
