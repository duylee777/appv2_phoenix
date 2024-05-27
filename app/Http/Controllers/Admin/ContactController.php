<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $curentDate = date('Y-m-d');
        $newContacts = Contact::where('status', config('global.contact_status.new'))->get();
        if(count($newContacts) != 0) {
            foreach($newContacts as $new) {
                if(strtotime($curentDate) != strtotime($new->created_at->format('Y-m-d'))) {
                    $new->update(['status' => config('global.contact_status.unread')]);
                }
            }
        }

        $page = $request->has('page') ? $request->page : 1;
        $soft = ($request->has('soft') && $request->soft != "all") ? $request->soft : 'all';
        $created = $request->has('created') ? $request->created : 'all';
        $keyword = $request->has('keyword') ? $request->keyword : '';

        if(isset($soft) && $soft == 'new') {
            $contacts = Contact::orderBy('created_at', 'DESC')->where('status', config('global.contact_status.new'))->paginate(12);
        }
        elseif(isset($soft) && $soft == 'unread') {
            $contacts = Contact::orderBy('created_at', 'DESC')->where('status', config('global.contact_status.unread'))->paginate(12);
        }
        elseif(isset($soft) && $soft == 'read') {
            $contacts = Contact::orderBy('created_at', 'DESC')->where('status', config('global.contact_status.read'))->paginate(12);
        }
        else {
            $contacts = Contact::orderBy('created_at', 'DESC')->whereDate('created_at', '=', date('Y-m-d', strtotime($created)))->paginate(12);
            var_dump($contacts);die;
        }
        
        return view('admin.contact.index', compact('contacts', 'page', 'soft', 'created', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $contact = Contact::where('id', $request->id)->first();
        if($request->status == "read") {
            $contact->update(['status' => config('global.contact_status.read'), 'updated_at' => date('Y-m-d H:i:s')]);
        }
        return response('Cập nhật thành công !', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
