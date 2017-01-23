<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( !function_exists('say_hello') ) {

    function say_hello( $name = 'world' ) {
        echo 'Hello ' . $name;
    }

}


if(!function_exists('do_upload')){

    function do_upload($file_name,$file_tem_name,$folder)
    {
        $target_dir = "uploads/";
        if($folder!='' && $folder!=0){
            if(!is_dir($target_dir.$folder)){
                mkdir($target_dir.$folder);
            }
            $target_dir = $target_dir.$folder.'/';
            $folder = $folder.'/';
        }
        else $folder = '';
        $image = $file_name;
        list($txt, $ext) = explode(".", $image);
        $actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;

        $target_file = $target_dir.$actual_image_name;
        if(move_uploaded_file($file_tem_name,$target_file)){
            return ADMIN_BASE_URL.$target_file;
        }
        else
        {
            return 0;
        }

    }

}

if(!function_exists('generate_password')){

    function generate_password($length)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars),0,$length);

    }

}

if(!function_exists('image_url')){

    function image_url($image,$type)
    {
        $file = '';
        if(!$image){
            if($type=='school'){ $file = BASE_URL.'images/default-school.JPG'; }
            else if($type=='user'){ $file = BASE_URL.'images/default_avatar.png'; }
        }
        else if(file_exists('uploads/'.$image)){ $file = BASE_URL.'uploads/'.$image; }
        else{
            if($type=='school'){ $file = BASE_URL.'images/default-school.JPG'; }
            else if($type=='user'){ $file = BASE_URL.'images/default_avatar.png'; }
        }
        return $file;
    }

}

if(!function_exists('exact_mage_url')){

    function exact_mage_url($image)
    {
        $file = '';
        if(!$image){
            $file=0;
        }
        else if(file_exists('uploads/'.$image)){
            $file = BASE_URL.'uploads/'.$image;
        }

        return $file;
    }

}


if(!function_exists('check_file_type')){

    function check_file_type($tem_name,$file_type)
    {
        $valid_file_extensions = array(".jpg", ".jpeg", ".gif", ".png");

        if($file_type=='image')
            $valid_file_extensions = array(".jpg", ".jpeg", ".gif", ".png");

        $file_extension = strrchr($tem_name, ".");
        if(!in_array($file_extension, $valid_file_extensions)) {
           return false;
        }
        else{
            return true;
        }
    }

}

if(!function_exists('attachment_icon')){

    function attachment_icon($file_type)
    {
        $icon = '<i title="Attachment" class="fa fa-paperclip-o" aria-hidden="true"></i>';
        $valid_file_extensions = array(".jpg", ".jpeg", ".gif", ".png");
        $ext = pathinfo($file_type, PATHINFO_EXTENSION);
        $imgArray = array("gif","jpg","png","bmp","jpeg","PNG","JPG","GIF","BMP","JPEG");
        $pdfArray = array("pdf","PDF");
        $docArray = array("doc","docx","DOC","DOCX");
        $xlsArray = array("xls","XLS","xlsx","XLSX");
        if(in_array($ext,$imgArray)){
            $icon =  '<i title="Image" class="fa fa-file-image-o" aria-hidden="true"></i>';
        }
        else if(in_array($ext,$pdfArray)){
            $icon =  '<i title="PDF" class="fa fa-file-pdf-o" aria-hidden="true"></i>';
        }
        if(in_array($ext,$docArray)){
            $icon =  '<i title="DOC" class="fa fa-file-word-o" aria-hidden="true"></i>';
        }
        if(in_array($ext,$xlsArray)){
            $icon =  '<i title="Excel" class="fa fa-file-excel-o" aria-hidden="true"></i>';
        }
        echo $icon;
    }

}

?>