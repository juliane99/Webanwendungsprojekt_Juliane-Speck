<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;
use Image;

class DiaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diaries = Diary::latest()->paginate(5);
    
        return view('diaries.index',compact('diaries'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('diaries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'featured_image' => 'image|nullable|max:1999'
        ]);

                        // Handle File Upload

                        if($request->hasFile('featured_image')){

                            // Get filename with extension
                            $filenameWithExt = $request->file('featured_image')->getClientOriginalName();
                
                            // Get just filename
                            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                
                            // get just ext
                            $extension = $request->file('featured_image')->getClientOriginalExtension();
                
                            // filename to store
                
                            $fileNameToStore = $filename. '_'.time().'.'.$extension;
                
                            //upload Image
                
                            $path = $request->file('featured_image')->storeAs('public/featured_images', $fileNameToStore);
                            
                        } else {
                            $fileNameToStore = 'noimage.jpg';
                        }
                
                

                        Diary::create($request->all());

         return redirect()->route('diaries.index')
                        ->with('success','Diary Entry created successfully.');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Diary  $diary
     * @return \Illuminate\Http\Response
     */
    public function show(Diary $diary)
    {
        return view('diaries.show',compact('diary'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Diary  $diary
     * @return \Illuminate\Http\Response
     */
    public function edit(Diary $diary)
    {
        return view('diaries.edit',compact('diary'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Diary  $diary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diary $diary)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
    
        $diary->update($request->all());
    
        return redirect()->route('diaries.index')
                        ->with('success','Diary Entry updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diary  $diary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diary $diary)
    {
        $diary->delete();
    
        return redirect()->route('diaries.index')
                        ->with('success','Diary Entry deleted successfully');
    }
}
