<?php

function uploadImage($id, $file_name, $folder_name, $table)
{
    $date = date('Y-m-d-H-i-s');
    if(request()->has($file_name)){

        $file = request()->file($file_name)->getClientOriginalName();
        request()->file($file_name)->storeAs($folder_name, $date.$file , 'public');

        // update logo value with file name
        DB::table($table)->where('id',$id)->update([$file_name => $date.$file]);

    }
}
