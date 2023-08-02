<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Support\Str;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts= auth()->user()->contacts;
        return view('contact.index',compact( 'contacts'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title="Create Contact";
        $route=route('contacts.store');
        $type=1;
        return view('contact.create',compact('title','route','type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {
        $path=null;
        if($request->hasFile('image_path')){
            $path = $request->file('image_path')->store(
                'contact', Contact::$disk
            );
        }
        $data = array_merge($request->all(), [
            'user_id'=>auth()->id(),
            'image_path'=>$path
        ]);
        $contact=Contact::create($data);

        if($contact)
        return redirect()->route('contacts.index')->with('success','Contact has been added successfully');

        return redirect()->route('contacts.index')->with('error','Something has gone wrong');

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

        $title="Edit Contact";
        $route=route('contacts.update',$contact);
        $type=2;
        return view('contact.edit',['contact'=>$contact,'title'=>$title,'route'=>$route,'type'=>$type]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        //
           

        if($contact){
            $path=$contact->image_path;
            if( $request->hasFile('image_path')){
                $file= $request->file('image_path');
                $name= $path??(Str::Random(40).'.'.$file->getClientOriginalExtension());

                $path = $file->storeAs(
                    'contact', basename($name),Contact::$disk
                );
    
            }
           
            $data = array_merge($request->all(), [
                'image_path'=>$path,
                'user_id'=>auth()->id()
            ]);
    
            $contact->update($data);
            return redirect()->route('contacts.index')->with('success','Contact has been updated successfully');
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //

        $contact->delete();

        return redirect()->route('contacts.index')->with('success','Contact has been deleted successfully');


    }
}
