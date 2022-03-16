<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Test;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = Test::all();
        return view("index",["tests" =>$tests]);
    }


    public function welcome($id="")
    {
        $tests = Test::all()->sortByDesc('status');
        if($id){
            $selected = Test::find($id);
        }else{
            $selected = Test::where('status', '=', 1)->first();
        }
      

        return view("pagelist",["tests" =>$tests,"selected"=>$selected]);
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("create");
    }

public function menu(Request $request){

  $testdata=Test::where('status', '=', 1)->first();
  $testdata->status=0;
  $testdata->update();
 
    $id = request("menu");
    $data = Test::find($id);
    $data->status=1;
    $data->update();
    return redirect("/testlist");
}




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate
        ([
            'title' => ['required'],
            'description' => ['required'],
            'upload' => ['required']
        ]);
        if(!$validatedData)
        {
            return redirect("/testlist");
        }

        $input= $request->all();
        $test = new Test();
        $test->title = request("title");
        $test->description = request("description");
        $file = $request->file('upload');
        $fileName = rand(100,10000).$file->getClientOriginalName();
        $destinationPath = public_path().'/images' ;
        $file->move($destinationPath,$fileName);
        $test->image = $fileName;
        $test->save();
         return redirect("/testlist");
        
    } 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $test = Test::find($id);
        return view('show',["data" =>$test]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $test = Test::find($id);
        
        return view('edit',["data" =>$test]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,)
    {
        $test = Test::find(request("id"));
        $test->title = request("title");
        $test->description = request("description");
        if($request->hasFile('upload'))
        {
            $file = $request->file('upload');
            $fileName = rand(100,10000).$file->getClientOriginalName();
            $destinationPath = public_path().'/images' ;
            $file->move($destinationPath,$fileName);
            $test->image = $fileName;
            
        }
        $test->save();
        return redirect("/testlist");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $test = Test::find($id);
        $test->delete();
        return redirect('/testlist');
    }

}