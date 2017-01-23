<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2015, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package    CodeIgniter
 * @author    EllisLab Dev Team
 * @copyright    Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @copyright    Copyright (c) 2014 - 2015, British Columbia Institute of Technology (http://bcit.ca/)
 * @license    http://opensource.org/licenses/MIT	MIT License
 * @link    http://codeigniter.com
 * @since    Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter Array Helpers
 *
 * @package        CodeIgniter
 * @subpackage    Helpers
 * @category    Helpers
 * @author        EllisLab Dev Team
 * @link        http://codeigniter.com/user_guide/helpers/array_helper.html
 */

// ------------------------------------------------------------------------
if (!function_exists('generatePassword')) {
    function generatePassword($length)
    {
        return bin2hex(openssl_random_pseudo_bytes($length));
    }
}
if (!function_exists('doUpload')) {
    function doUpload($temp_name, $image, $upload_path,$folder = '',$upload_type='')
    {
        /*echo $temp_name.'<br>';
        echo $image.'<br>';
        echo $upload_path.'<br>';
        echo $folder.'<br>';
        echo $upload_type.'<br>'; exit;*/
        $ext = pathinfo($image, PATHINFO_EXTENSION);

        //if(!is_dir($upload_path.$folder)){ mkdir($upload_path.$folder); }

        if($upload_type=='image'){
            $allowed = array('jpeg', 'png', 'jpg', 'JPG', 'PNG', 'JPEG');
            if (!in_array($ext, $allowed)) {
                return 0;
                exit;
            }
        }
        else if($upload_type=='video'){
            $allowed = array('3gp', 'mp4', '3GP', 'MP4');
            if (!in_array($ext, $allowed)) {
                return 0;
                exit;
            }
        }
        $folder = '';

        list($txt, $ext) = explode(".", $image);
        $imageName = str_replace(' ','_',$txt) . "_" . time() . "." . $ext;
        move_uploaded_file($temp_name, $upload_path.$folder . $imageName);
        return WEB_BASE_URL.$upload_path.$imageName;
    }
}
if (!function_exists('getImageUrl')) {
    function getImageUrl($image, $type='')
    {
        if ($image != '') {
            /*if (file_exists('uploads/' . $image)) {
                return WEB_BASE_URL . 'rest/uploads/' . $image;
            }*/
        }
        else{
            if ($type == 'profile') {
                return WEB_BASE_URL . 'rest/images/default-img.png';
            } else if ($type == 'company') {
                return WEB_BASE_URL . 'rest/images/company-logo.jpg';
            } else if ($type == 'flag') {
                return WEB_BASE_URL . 'rest/images/default-flag.png';
            }
            else{
                return WEB_BASE_URL . 'rest/images/default-img.png';
            }
        }


    }
}

if (!function_exists('getExactImageUrl')) {
    function getExactImageUrl($image)
    {
        if ($image != '') {
            if (file_exists('uploads/' . $image)) {
                return WEB_BASE_URL . 'rest/uploads/' . $image;
            }
            else{
                return '';
            }
        }
        else{
            return '';
        }
    }
}

if (!function_exists('formatSizeUnits')) {
    function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }
        return $bytes;
    }
}