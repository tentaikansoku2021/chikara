<?php

namespace App\Http\Controllers;

use App\Models\Bunbougu;
use App\Models\Classification;
use Illuminate\Http\Request;

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
            'c.str as classification',
        ])
        ->from('bunbougus as b')
        ->join('classifications as c',function($join){
            $join->on('b.classification','=','c.id');
        })
        ->orderBy('b.id','ASC')->paginate(8);

        return view('index',compact('bunbougus'))
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

        $input=$request->all();

        $result = Bunbougu::create($input);

        if(!empty($result)) {
            session()->flash('flash_message','登録しました');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bunbougu $bunbougu)
    {
        $classification = Classification::all();
        return view('edit',compact('bunbougu'))->with('classifications',$classification);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
         $request->validate([
            'name'           => 'required|max:20',
            'price'          => 'required|integer',
            'classification' => 'required|integer', 
            'detail'         => 'required|max:140',
        ]);

       

        $hasData = Bunbougu::where('id','=',$request->id);

        if($hasData->exists()){
            $hasData->update([
                'name'          =>$request->name,
                'price'         =>$request->price,
                'classification'=>$request->classification,
                'detail'        =>$request->detail,
            ]);
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
