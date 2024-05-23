<?php

function uploadImage($path)
{
    //chemin images
    $upload_dir = 'Assets/Pictures/' . $path . '/';
  
    if ($_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
        $tmp_name = $_FILES['profile_image']['tmp_name'];
        $original_name = $_FILES['profile_image']['name'];
        $extension = pathinfo($original_name, PATHINFO_EXTENSION);
        $new_name = $path . '_' . date('YmdHis') . '.' . $extension;
        $destination = $upload_dir . $new_name;

        if (move_uploaded_file($tmp_name, $destination)) {
            return $new_name;
        } else {
            die("Failed to move uploaded file.");
        }
    } else {
        die("File upload failed.");
    }
}