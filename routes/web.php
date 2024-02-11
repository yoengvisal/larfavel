<?php
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $document = YamlFrontMatter::parseFile(resource_path('posts/my-first-post.html'));

    // dd($document);

    // $post = Post::all();
    // return view('posts',[
    //     "posts" => $post,
    // ]);
});

Route::get('posts/{post}', function ($slug) {
    return view('post',[
        'post' =>  Post::find($slug)
    ]);

})->where('post', '[A-z_\-]+');
