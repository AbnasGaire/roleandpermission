<?php

use Illuminate\Contracts\Support\Responsable;

class Apiforproject implements Responsable
{
    public function __construct($posts)
    {
        $this->posts = $posts; 
    }

    // public function status()
    // {
    //     switch(strtolower($this->name)) {
    //         case 'teapot':
    //             return 418;
    //         default:
    //             return 200;
    //     }
    // }
    
    protected function transformPosts()
    {
        return $this->posts->map(function ($post) {
            return [
                'id' => $post->id,
                'name' => $post->name,
                
                'created_at' => $post->created_at->toIso8601String(),
                'updated_at' => $post->updated_at->toIso8601String(),

            ];
        });
    }

    
    public function toResponse(Request $request)
    {
        return response()->json($this->transformPosts());
    }

   
}


// namespace App\Http\Response;

// class Apiforproject extends Response
// {
//     public function __construct($posts)
//     {
//         $this->posts = $posts;
//     }


//     public function toResponse()
//     {
//         return response()->json($this->transformPosts());
//     }

//     protected function transformPosts()
//     {
//         return $this->posts->map(function ($post) {
//             return [
//                 'id' => $post->id,
//                 'name' => $post->name,
                
//                 'created_at' => $post->created_at->toIso8601String(),
//                 'updated_at' => $post->updated_at->toIso8601String(),

//                 // $table->id();
//                 // $table->string('name');
//                 // $table->timestamps();
//             ];
//         });
//     }
// }
?>


return Role::with(array('permissions'=>function($query){
            $query->select('name','id');
        }))
        ->select('name','id')
        ->find($id);