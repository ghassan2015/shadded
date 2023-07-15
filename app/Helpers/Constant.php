<?php

function getUploadsPath($path = "") {
    return public_path()."/uploads/".$path;
}
function getUploadsThumbPath($path = "") {
    return public_path()."/uploads/thumbs/".$path;
}

function statusData() {
    return [
        0 => ['text' => trans('admin.not_active') , 'class' => 'label-light-danger '],
        1 => ['text' => trans('admin.active') , 'class' => 'label-light-info'],
    ];
}

function complaintForm() {
    return [
        1 => ['text' => trans('admin.visible') , 'class' => 'label-light-info'],
        0 => ['text' => trans('admin.un_visible') , 'class' => 'label-light-danger'],
    ];
}




