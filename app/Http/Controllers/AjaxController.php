<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use DataTables;
class AjaxController extends Controller
{
    
        public function create()
        {
    
          return view('save_null.ajax-request');
        }
    
        public function store(Request $request)
        {
            $request->validate([
              'title'           => 'required',
              'body'          => 'required',
          
          ]);
    
          Blog::create([
                'title'  => $request->title,
                'body'   => $request->body,
                 ]);
         return response()->json(['success'=>'Ajax request submitted successfully']);
         }
    
         public function index(Request $request)
         {
    
           $blogs = Blog::all();
           return view('save_null.ajax-request-new-index',['blogs'=>$blogs]);
         }
         public function edit(Blog $blog)
         {
           return view('save_null.ajax-request-edit',['blog'=>$blog]);
    
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
            return view('save_null.ajax-request-show',['blog'=>$blog]);
          }
    
          public function delete(Blog $blog)
          {

            $blog -> delete();
           return redirect()->back()->with('delete','Data deleted successfull');
            return response()->json(['success'=>'Ajax request updated successfully']);
            
          }
   
    

    //
}
