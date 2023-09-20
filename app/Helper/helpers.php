<?php

use App\Models\User;
use Illuminate\Support\Facades\File;

// Handle file upload

function handleUpload($inputName, $model=null){
    try{
        if(request()->hasFile($inputName)){
            // Checks to see if the image is available in the database, basically its image path, if its there, it would then call the delete method and then upload the new one, if not, it follows onto the next process
            if($model && File::exists(public_path($model->{$inputName}))){
                FIle::delete(public_path($model->{$inputName}));
            }
    
            $file = request()->file($inputName);
            $fileName = rand().$file->getClientOriginalName();
            $file->move(public_path('/uploads'), $fileName);
    
            $filePath = "/uploads/".$fileName;
    
            return $filePath;
        }
    }catch(\Exception $e){
        throw $e;
    }
    
}

function deleteFileIfExist($filePath){
    try{
        if(File::exists(public_path($filePath))){
            File::delete(public_path($filePath));
        }
    }catch(\Exception $e){
        throw $e;
    }
}

// Get dynamic colors
function getColor($index) {
    $colors = ['#558bff', '#fecc90', '#ff885e', '#282828', '#190844', '#9dd3ff'];

    return $colors[$index % count($colors)];
}

// Set sidebar item active
function setSidebarActive($route) {
    if(is_array($route)){
        foreach($route as $r){
            if(request()->routeIs($r)){
                return 'active';
            }
        }
    }
}
