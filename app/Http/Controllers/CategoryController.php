<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
class CategoryController extends Controller
{

    public function homepage(){
        $posts = Post::orderBy('id','DESC')->paginate(5);
        $categories = Category::all();
        return view('pages.home')->with('categories', $categories)->with('posts', $posts);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $categories = Category::orderBy('id','DESC')->get(); // thêm sau thì lên đầu
        $categories = Category::all(); //
        return view('admincp.category.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admincp.category.create');
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
        $data = new Category();
        $data->fill($request->validate([
            'title' => 'required|max:255',
            'status' => 'required',
        ],['title.required'=> 'Yêu cầu tên danh mục']));
        $data->save();
        return back()->with('message','Thêm danh mục thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $category = Category::findOrFail($id);
        return view('admincp.category.show')->with('category',$category);
    }

    public function showCategory($id){
        $categories = Category::all();
        $posts = Post::with('category')->where('id_category', $id)->get();
        return view('pages.blogs')->with(compact('categories', 'posts'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = Category::findOrFail($id);
        $data->fill($request->validate([
            'title' => 'required|max:255',
            'status' => 'required',
        ],['title.required'=> 'Yêu cầu tên danh mục']));
        $data->save();
        return redirect('category')->with('message','Cập nhật danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function delete(Request  $request, $id){
        Category::destroy($id);
        return redirect()->back()->with('message','Xoá danh mục thành công');
    }
}
