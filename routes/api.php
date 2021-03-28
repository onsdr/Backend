<?php
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/files', function(Request $req){
  //  $result = $req->file('file')->store('apiDocs');
    $document = new File();
            $document->title = $req->input('title');
            $document->content =  $req->input('content');;
            $document->save();
            // save file on database
            return response()->json([
                "success" => true,
                "message" => "File successfully uploaded",
            ]);

});