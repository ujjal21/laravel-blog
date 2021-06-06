<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use DataTables;
class ModalajaxController extends Controller
{
    //
    public function create()
        {
    
         // this operation is done by modal.
        }
    
        public function store(Request $request)
        {
            $request->validate([
              'title'           => 'required',
              'body'          => 'required',
          
          ]);

        //  Book::updateOrCreate(['id' => $request->book_id],
         // ['title' => $request->title, 'author' => $request->author]);

    
           Blog::create([
                 'title'  => $request->title,
                 'body'   => $request->body,
                  ]);
         return response()->json(['success'=>'Ajax request submitted successfully']);
         }
    
         public function index(Request $request)
         {
    
           $blogs = Blog::all();
           return view('ajax_modal.ajax-modal-index',['blogs'=>$blogs]);
         }
         public function edit(Blog $blog)
         {
           return response()->json($blog);
         }
    
         public function update(Blog $blog,Request $request)
         {
            $request->validate([
                'title'           => 'required',
                'body'          => 'required',
            
            ]);
             
            $blog->title = $request->title;
            $blog->body = $request->body;
            $blog->save();
     
     
             return response()->json(['success'=>'Ajax request updated successfully']);
          }
    
          public function show(Blog $blog)
          {
           // $contact = Contact::all();
           // return view('save_null.ajax-request-show',['blog'=>$blog]);
           return response()->json($blog);

          }
    
          public function delete(Blog $blog)
          {

            $blog -> delete();
           return redirect()->back()->with('delete','Data deleted successfull');
            return response()->json(['success'=>'Ajax request updated successfully']);
            
          }
   
    

}
