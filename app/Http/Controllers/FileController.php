<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use Redirect;
use Str;

class FileController extends Controller
{
   public function upload(Request $request) {
        $str_random = Str::random(10);
        if(!$request->session()->has('file-upload')) {
            $request->session()->put('file-upload',$str_random);
            $path = storage_path().'/app/uploads/'.$str_random;
            mkdir($path);
        }
       $file = $request->file('file');
       $temp_name = $request->session()->get('file-upload');
       $path = storage_path().'/app/uploads/'.$temp_name;
       $file_name = $file->getClientOriginalName();
       $unique_name = date('Y-m-d').'-'.Str::random(10).'$$'.$file_name;
       $file->move($path, $unique_name);
       return response()->json(['name' => $path.'/'.$unique_name]);
   }

    public function delete(Request $request) {
         $path = json_decode(request()->getContent(), true);
         $filepath = $path['name'];
         if(file_exists($filepath)) {
            unlink($filepath);
         }
         return $filepath;
   }

   public function changeDir($registerform) {
      
      $temp_name = request()->session()->get('file-upload');
      $current_path = storage_path().'/app/uploads/'.$temp_name;
      $new_path = storage_path().'/app/uploads/'.$registerform->id;
      rename($current_path,$new_path);
      $temp_name = request()->session()->forget('file-upload');
      return true;
   }

   public function getfile(Request $request) {
      $file = file_get_contents($request->input('path'));
      return base64_encode($file);
   }

   public function editUpload($id) {
      $file = request()->file('file');
      $path = storage_path().'/app/uploads/'.$id;
      $file_name = $file->getClientOriginalName();
      $unique_name = date('Y-m-d').'-'.Str::random(10).'$$'.$file_name;
      $file->move($path, $unique_name);
      $dir = $path.'/'.$unique_name;
      return response()->json(['name' => $dir]);
   }


   public function editDelete (Request $request) {
         $filepath = $request->input('document');
         if(file_exists($filepath)) {
            unlink($filepath);
         }
         return $filepath;
   }
}
