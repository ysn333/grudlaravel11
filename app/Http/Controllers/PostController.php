<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;



class PostController extends Controller
{
    public function create() {
        return view('create');
    }

    // PostController.php

// PostController.php

public function ourfilestore(Request $request) {

    $validated = $request->validate(
        [
            'name' =>'required|min:3',
            'description' =>'required|min:10',
            'image' =>'nullable|mimes:jpeg,png,jpg',
        ]
        );


    $imageName = null;

    if (isset($request->image)) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
    }

    $post = new Post;

    $post->name = $request->name;
    $post->description = $request->description;
    $post->image = $imageName;

    $post->save();

    return redirect()->route('home')->with('success', 'Your post successfully.');

    }


    public function editData($id) {

        $post = Post::findOrFail($id);
        return view('edit', ['ourPost' => $post]);
    }

    public function updateData($id , Request $request)  {


        $validated = $request->validate(
            [
                'name' =>'required|min:3',
                'description' =>'required|min:10',
                'image' =>'nullable|mimes:jpeg,png,jpg',
            ]
            );



        $post = Post::findOrFail($id);

        $post->name = $request->name;
        $post->description = $request->description;

        if (isset($request->image)) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $post->image = $imageName;
        }


        $post->save();

        return redirect()->route('home')->with('success', 'Your post successfully Update.');
    }

    public function deleteData($id) {

        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('home')->with('success', 'Your post successfully Delete.');

    }
}
