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
        $keyword = $request->keyword != 'none' ? $request->keyword : '';
        
        $paginate = 12;
       
        if(isset($soft) && $soft == 'new') {
            if($created != 'all') {
                $contacts = Contact::orderBy('created_at', 'DESC')
                ->where('status', config('global.contact_status.new'))
                ->whereDate('created_at', '=', date('Y-m-d', strtotime($created)))
                ->where("name", "like", "%$keyword%")
                ->paginate($paginate);
            }
            else {
                $contacts = Contact::orderBy('created_at', 'DESC')
                ->where('status', config('global.contact_status.new'))
                ->where("name", "like", "%$keyword%")
                ->paginate($paginate);
            }   
        }
        elseif(isset($soft) && $soft == 'unread') {
            if($created != 'all') {
                $contacts = Contact::orderBy('created_at', 'DESC')
                ->where('status', config('global.contact_status.unread'))
                ->whereDate('created_at', '=', date('Y-m-d', strtotime($created)))
                ->where("name", "like", "%$keyword%")
                ->paginate($paginate);
            }
            else {
                $contacts = Contact::orderBy('created_at', 'DESC')
                ->where('status', config('global.contact_status.unread'))
                ->where("name", "like", "%$keyword%")
                ->paginate($paginate);
            }  
        }
        elseif(isset($soft) && $soft == 'read') {
            if($created != 'all') {
                $contacts = Contact::orderBy('created_at', 'DESC')
                ->where('status', config('global.contact_status.read'))
                ->whereDate('created_at', '=', date('Y-m-d', strtotime($created)))
                ->where("name", "like", "%$keyword%")
                ->paginate($paginate);
            }
            else {
                $contacts = Contact::orderBy('created_at', 'DESC')
                ->where('status', config('global.contact_status.read'))
                ->where("name", "like", "%$keyword%")
                ->paginate($paginate);
            }  
        }
        else {
            if($created != 'all') {
                $contacts = Contact::orderBy('created_at', 'DESC')
                ->whereDate('created_at', '=', date('Y-m-d', strtotime($created)))
                ->where("name", "like", "%$keyword%")
                ->paginate($paginate);
            }
            else {
                $contacts = Contact::orderBy('created_at', 'DESC')
                ->where("name", "like", "%$keyword%")
                ->paginate($paginate);
            }
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
