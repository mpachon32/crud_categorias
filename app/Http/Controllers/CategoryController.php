<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['categories']=Category::paginate(3);
        return view('category.index',$datos);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('category.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $campos=[
        'Name'=>'required|string|max:120|min:3',
        'Description'=>'required|string|max:250|min:3',
        ];
        $mensaje=[
            'Name.required'=>'El nombre es requerido',
            'Description.required'=>'La descripción es requerida'
        ];

        $this->validate($request, $campos, $mensaje);

        //$datosCategory = request()->all();
        $datosCategory = request()->except('_token');

        Category::insert($datosCategory);
        //return response()->json($datosCategory);
        return redirect('category')->with ('mensaje','Categoria agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category=Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $campos=[
            'Name'=>'required|string|max:120|min:3',
        'Description'=>'required|string|max:250|min:3',
            ];
            $mensaje=[
                'Name.required'=>'El nombre es requerido',
                'Description.required'=>'La descripción es requerida'
            ];
    
            $this->validate($request, $campos, $mensaje);

        //
        $datosCategory = request()->except(['_token','_method']);
        Category::where('id','=',$id)->update($datosCategory);

        $category=Category::findOrFail($id);
        //return view('category.edit', compact('category'));

        return redirect('category')->with('mensaje','Categoria modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //$category=Category::findOrFail($id);
        Category::destroy($id);
        return redirect('category')->with('mensaje','Categoria borrada');

    }
}
