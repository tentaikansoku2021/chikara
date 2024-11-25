<?php

namespace App\Http\Controllers;

use App\Models\Bunbougu;
use App\Models\Classification;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class BunbouguController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $bunbougus = Bunbougu::latest()->orderBy('id','asc')->paginate(8);
        $bunbougus=Bunbougu::select([
            'b.id',
            'b.name',
            'b.price',
            'b.detail',
            'b.user_id',
            'u.name as user_name',
            'c.str as classification',
        ])
        ->from('bunbougus as b')
        ->join('classifications as c',function($join){
            $join->on('b.classification','=','c.id');
        })
        ->join('users as u', function($join) {
            $join->on('b.user_id', '=', 'u.id');
        })
        ->orderBy('b.id','ASC')->paginate(8);

        return view('index',compact('bunbougus'))
        ->with('page_id',request()->page)
        ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classifications = Classification::all();
        return view('create',compact('classifications'));
               
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20',
            'price' => 'required|integer',
            'classification' => 'required|integer', 
            'detail' => 'required|max:140',
        ]);


        // $result = Bunbougu::create($input);
        $bunbougu = new Bunbougu;
        $bunbougu->name = $request->input(['name']);
        $bunbougu->price = $request->input(['price']);
        $bunbougu->classification = $request->input(['classification']);
        $bunbougu->detail = $request->input(['detail']);
        $bunbougu->user_id = \Auth::user()->id;
        $bunbougu->save(); 

        if(!empty($bunbougu)) {
            session()->flash('flash_message',$request->name.'  を登録しました');
        } else {
            session()->flash('flash_message','登録失敗');
        }

       return redirect()->route('bunbougu.index');

    } 

    /**
     * Display the specified resource.
     */
    public function show(Bunbougu $bunbougu)
    {
        $classifications = Classification::all();
        return view('show',compact('classifications','bunbougu'))
        ->with('page_id',request()->page_id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bunbougu $bunbougu)
    {
        $classifications = Classification::all();
        return view('edit',compact('bunbougu','classifications'))
        ->with('page_id',request()->page_id);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$bunbougu)
    {
         $request->validate([
            'name'           => 'required|max:20',
            'price'          => 'required|integer',
            'classification' => 'required|integer', 
            'detail'         => 'required|max:140',
        ]);

        // $hasData = Bunbougu::find($id);
        // $hasData->update($request->all());
        $bunbougu->name = $request->input(['name']);
        $bunbougu->price = $request->input(['price']);
        $bunbougu->classification = $request->input(['classification']);
        $bunbougu->detail = $request->input(['detail']);
        $bunbougu->user_id = \Auth::user()->id;
        $bunbougu->save(); 

        
        if($bunbougu){
            session()->flash('flash_message','変更しました');
        } else {
            session()->flash('flash_error_message','変更失敗');
        }

       return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bunbougu $bunbougu)
    {
        $bunbougu->delete();
        return redirect()->route('bunbougu.index')
        ->with(session()->flash('flash_message',$bunbougu->name.'を削除しました'));
    }
}
