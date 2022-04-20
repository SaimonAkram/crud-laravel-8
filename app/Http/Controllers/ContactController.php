<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ContactController extends Controller
{
  
    public function index(Request $request)
    {
        $search= $request['search'] ?? "";
        if($search!=""){
            $contacts=Contact::where('book_name','LIKE',"%$search%")->simplepaginate(2);
        }
        else{
            //
            $contacts = Contact::simplepaginate(5);
        }
        // $contacts = Contact::simplepaginate(5);
      
   
      return view ('contacts.index',compact('contacts','search'));
    }

    
    public function create()
    {
        return view('contacts.create');
    }

   
    public function store(Request $request)
    {
        $rules=[
            'book_name'=> 'required',
            'image_file'=> 'required',
            'borrow_date'=> 'required',
            'return_date'=> 'required',
            'student_name'=> 'required|max:15',
            'member_type'=> 'required',
            'description'=> 'required|max:100',
            'academic_class'=> 'required',
        ];
        $cm=[
            'book_name.required'=>'Enter your name',
            
            'image_file.required'=>'please choose a image',
            'borrow_date.required'=>'Please insert your borrow date',
            'return_date.required'=>'Please insert your return date',
            'student_name.required'=>'Please insert your Name',
            'student_name.max'=>'your name must be at least 15 characters',
            'member_type.required'=>'Insert what kind of member you are!',
            'description.required'=>'Give a short Description of the book.',
            'description.max'=>'your description must be at least 100 characters',
            'academic_class.required'=>'Insert what class do you read!',
        ];

        $this->validate($request,$rules,$cm);

       
        $contact=new Contact();
        $contact->book_name=$request->book_name;
        $contact->image_file=$request->image_file;
        if($request->hasfile('image_file')) {
            $file=$request->file('image_file');
            $extension= $file->getClientOriginalExtension();
            $filename=time() . '.' . $extension;
            $file->move('uploads/contacts',$filename);
            $contact->image_file=$filename;


        }
        $contact->borrow_date=$request->borrow_date;
        $contact->return_date=$request->return_date;
        $contact->student_name=$request->student_name;
        $contact->member_type=$request->member_type;
        $contact->description=$request->description;
        $contact->academic_class=$request->academic_class;

       
        $contact->save();
        
        // Contact::create($input);

        return redirect('/contact')->with('flash_message', 'Contact Addedd!');  
    }

    
    public function show($id)
    {
        $contact = Contact::find($id);
        return view('contacts.show')->with('contacts', $contact);
    }

    
    public function edit($id)
    {
        $contact = Contact::find($id);
        // // dd($contact);
        // return response()->json($contact);
        return view('contacts.edit')->with('contacts', $contact);
    }

  
    public function update(Request $request, $id)
    {
        
        
        $contact = Contact::find($id);
        
        $contact->book_name=$request->book_name;
        
        if($request->hasfile('image_file')) {
            echo $request->image_file;
            $destination= 'uplaods/contacts/'.$contact->image_file;
           echo $destination;
         
            if(File::exists($destination)){
                // dd($destination);
                File::delete($destination);
            }
            $file=$request->file('image_file');
            $extension= $file->getClientOriginalExtension();
            $filename=time() . '.' . $extension;
            $file->move('uploads/contacts',$filename);
            $contact->image_file=$filename;


        }
       
        // $contact->image_file=$request->image_file;
        $contact->borrow_date=$request->borrow_date;
        $contact->return_date=$request->return_date;
        $contact->student_name=$request->student_name;
        $contact->member_type=$request->member_type;
        $contact->description=$request->description;
        $contact->academic_class=$request->academic_class;

        $contact->update();
       
        // return redirect()->back()->with('flash_message', 'Book Info Updated!');  
        return redirect('/contact')->with('flash_message', 'Contact Updated!');  
    }

   
    public function destroy($id)
    {
        $deleteData= Contact::find($id);
        $deleteData->delete();
        // Contact::destroy($id);
        return redirect('/contact')->with('flash_message', 'Contact deleted!');  
    }
}