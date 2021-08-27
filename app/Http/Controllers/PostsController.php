<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use File;
use Storage;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        //
        $posts = Post::with('category')->orderBy('id', 'Desc')->get();
        return view('admincp.post.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admincp.post.create')->with('categories',$categories);
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
        $data = $request->validate([
                    'title' => 'required|max:255',
                    'summary' => 'required',
                    'content' => 'required|max:255',
                    'image' => 'required|image',
                    'id_category' => 'required',
                    'status' => 'required'
                ],['title.required'=> 'Yêu cầu tên danh mục',
                   'summary.required'=> 'Yêu cầu tóm tắt',
                   'content.required'=> 'Yêu cầu nội dung',
                   'image.required'=> 'Yêu cầu hình ảnh',
    
            ]);

        $image = $data['image'];
        $extension =  $image->getClientOriginalExtension();
        $name = time(). '_'.$image->getClientOriginalName();
        Storage::disk('uploads')->put($name,File::get($image));

        $post = new Post();

        $post->image = $name;
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->summary = $data['summary'];
        $post->id_category = $data['id_category'];
        $post->status = $data['status'];
        $post->save();
        return back()->with('message','Thêm bài viết thành công');
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
        $categories = Category::all();
        $post = Post::findOrFail($id);
        return view('admincp.post.show')->with(compact('post','categories'));
    }

    public function showArticle($id){
        $categories = Category::all();
        $post_detail = Post::findOrFail($id);
        $cares = Post::where('id_category',$post_detail->id_category)->whereNotIn('id',[$id])->get();
        return view('pages.details')->with(compact('post_detail','categories','cares'));
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
        $data = $request->validate([
            'title' => 'required|max:255',
            'summary' => 'required',
            'content' => 'required|max:255',
            'id_category' => 'required',
            'status' => 'required'
        ],['title.required'=> 'Yêu cầu tên danh mục',
           'summary.required'=> 'Yêu cầu tóm tắt',
           'content.required'=> 'Yêu cầu nội dung',]);
           $post = Post::find($id);

           if($request->image){  // nguoi dung chon image
            // xoá ảnh cũ
            if($post->image){
                unlink('uploads/'.$post->image);
            }
            $image = $request->image;
            $extension =  $image->getClientOriginalExtension();
            $name = time(). '_'.$image->getClientOriginalName();
            Storage::disk('uploads')->put($name,File::get($image));
            $post->image = $name;
           }
            
            $post->title = $data['title'];
            $post->content = $data['content'];
            $post->summary = $data['summary'];
            $post->id_category = $data['id_category'];
            $post->status = $data['status'];
            $post->save();
            return redirect()->back()->with('message','Cập nhật bài viết thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function delete(Request  $request, $id){
        $post = Post::find($id);
        if($post->image){
            unlink('uploads/'.$post->image);
        }
        Post::destroy($id);
        return back()->with('message','Xoá bài viết thành công');
    }

    public function searchBlog(){
        $key = $_GET['tukhoa'];
        $categories = Category::all();
        $get_post = Post::where('title','LIKE','%'.$key.'%')->Orwhere('summary','LIKE','%'.$key.'%')->Orwhere('content','LIKE','%'.$key.'%')->get();

        return view('pages.search')->with(compact('categories', 'get_post','key'));
    } 
}
