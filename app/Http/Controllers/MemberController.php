<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charity;
use App\Member;
use Session;

class MemberController extends Controller
{
      public function create($charity_id)
      {
          $charity = Charity::where('id', '=', $charity_id);
          if ($charity -> count()) {
            $charity = $charity -> first();
          }
          return view('member.create')->with([
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

          $member = new Member();
          $member->member_name = $request->input('name');
          $member->profile_desc = $request->input('description');
          $member->charity_id = $charity->id;
          $member->save();


          Session::flash('flash_message', 'Your member ( '.$member->membername.' ) was added to charity '.$charity->charity_name);

          return redirect('/charitys'.'/'.$charity_id);

      }


      /**
    	* GET
        * Page to confirm deletion
    	*/
        public function delete($charity_id, $id) {

            $charity = Charity::find($charity_id);

            $member = Member::find($id);

            return view('member.delete')->with([
                'charity' => $charity,
                'member' => $member,
            ]);
        }

      /**
      * POST
      */
      public function destroy($charity_id, $id)
      {
        $charity = Charity::find($charity_id);

        $member = Member::find($id);

          if(is_null($charity)) {
              Session::flash('message','Charity not found.');
              return redirect('/charitys');
          }

          if(is_null($member)) {
              Session::flash('message','Charity not found.');
              return redirect('/charitys'.'/'.$charity_id);
          }

          # First remove any tags associated with this book
          #if($book->tags()) {
          #    $book->tags()->detach();
          #}

          $member->delete();

          # Finish
          Session::flash('flash_message', 'member '.$member->member_name.' for '.$charity->charity_name.' was deleted.');
          return redirect('/charitys'.'/'.$charity_id);
      }

      public function edit($charity_id, $id)
      {
          $charity = Charity::find($charity_id);

          $member = Member::find($id);

          return view('member.edit')->with([
              'charity' => $charity,
              'member' => $member,
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

        $member = Member::where('id', '=', $id);
        if ($member -> count()) {
          $member = $member -> first();
        }
        $member->member_name = $request->input('name');
        $member->profile_desc = $request->input('description');
        $member->charity_id = $charity->id;
        $member->save();


        Session::flash('flash_message', 'Your member '.$member->member_name.' was edited for charity '.$charity->charity_name);

        return redirect('/charitys'.'/'.$charity_id);
      }
}
