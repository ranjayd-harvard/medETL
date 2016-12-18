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
      #$user = $request->user();
      #if($user) {
          $charitys = Charity::all();
          #where('user_id', '=', $user->id)->orderBy('id','DESC')->get();
      #}
      #else {
      #    $charitys = ['ABC'];
      #}

      #dd($charitys);
      return view('charity.index')->with([
          'charitys' => $charitys
      ]);
    }

    /**
    * GET
    */
    public function create()
    {
        # Author
        #$authors_for_dropdown = Author::getForDropdown();
        # Author
        #$tags_for_checkboxes = Tag::getForCheckboxes();
        return view('charity.create');
        #->with([
        #    'authors_for_dropdown' => $authors_for_dropdown,
        #    'tags_for_checkboxes' => $tags_for_checkboxes
        #]);
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
        $charity->user_id = 1;
        $charity->save();

        # Save Tags
        #$tags = ($request->tags) ?: [];
        #$charity->tags()->sync($tags);
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
        # Possible authors
        #$authors_for_dropdown = Author::getForDropdown();
        # Possible tags
        #$tags_for_checkboxes = Tag::getForCheckboxes();
        # Just the tags for this book
        #$tags_for_this_book = [];
        #foreach($book->tags as $tag) {
        #    $tags_for_this_book[] = $tag->name;
        #}
        return view('charity.edit')->with([
                'charity' => $charity,
        #        'authors_for_dropdown' => $authors_for_dropdown,
        #        'tags_for_checkboxes' => $tags_for_checkboxes,
        #        'tags_for_this_book' => $tags_for_this_book,
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
        $charity->user_id = 1;
        $charity->save();

        # If there were tags selected...
        #if($request->tags) {
        #    $tags = $request->tags;
        #}
        # If there were no tags selected (i.e. no tags in the request)
        # default to an empty array of tags
        #else {
        #    $tags = [];
        #}

        # Above if/else could be condensed down to this: $tags = ($request->tags) ?: [];

        # Sync tags
        #$book->tags()->sync($tags);
        #$book->save();

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

        # First remove any tags associated with this book
        #if($book->tags()) {
        #    $book->tags()->detach();
        #}

        # Then delete the charity
        $charity->delete();

        # Finish
        Session::flash('flash_message', $charity->charity_name.' was deleted.');
        return redirect('/charitys');
    }


}
