<?php

// Set Active state for current Navigation links
// Used in views>layouts>navigation.blade.php
function active($path, $active = 'active')
{
    return Request::is($path) ? $active : null;
}

// Generate the Gravatar url for given email
// Used in posts>show.blade.php and user>profile_public.blade.php
function gravatar_url($email, $size = "150")
{
    if($size == null) {
        return 'http://www.gravatar.com/avatar/'.md5($email) ;
    }
    return 'http://www.gravatar.com/avatar/'. md5($email) .'?s='. $size ;
}

// Generate the url for given Image
// Used in user>profile.blade.php
function image_url($type, $filename = "")
{
	$url = '';

	switch ($type) {
		case 'user':
			$url = asset('/uploads/images/user/'. $filename);
			break;

		case 'post':
			$url = asset('/uploads/images/post/'. $filename);
			break;

		case 'customer':
			$url = asset('/uploads/images/customer/'. $filename);
			break;
		
		case 'setting':
			if( $filename == "" ) {
				$url = asset('/uploads/images/setting/');
			} else {
				$url = asset('/uploads/images/setting/'. $filename);
			}
			
			break;

		default:
			# code...
			break;
	}

    return $url;
}

function file_url($type, $filename)
{
	$url = '';

	switch ($type) {
		case 'user':
			$url = asset('/uploads/files/user/'. $filename);
			break;

		case 'post':
			$url = asset('/uploads/files/post/'. $filename);
			break;

		case 'customer':
			$url = asset('/uploads/files/customer/'. $filename);
			break;
		
		default:
			# code...
			break;
	}

    return $url;
}

// Generate back button
// Used in post.edit, post.create, deleted_users, settings_edit, profile_edit, feedback
function cancel_button($text = "Cancel")
{
    return "<a href=' " . URL::previous() . " ' class='btn btn-default pull-right'>$text</a>";
}

// Generate the url for given Image
// Used in user>profile.blade.php
function postImage_url($image = "")
{
	return asset('/uploads/images/posts/' . $image);
}


function replace_TiengViet($str)
{
	$coDau=array("à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă",
		"ằ","ắ","ặ","ẳ","ẵ",
		"è","é","ẹ","ẻ","ẽ","ê","ề"     ,"ế","ệ","ể","ễ",
		"ì","í","ị","ỉ","ĩ",
		"ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ"
		,"ờ","ớ","ợ","ở","ỡ",
		"ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
		"ỳ","ý","ỵ","ỷ","ỹ",
		"đ",
		"À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă"
		,"Ằ","Ắ","Ặ","Ẳ","Ẵ",
		"È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
		"Ì","Í","Ị","Ỉ","Ĩ",
		"Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ"
		,"Ờ","Ớ","Ợ","Ở","Ỡ",
		"Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
		"Ỳ","Ý","Ỵ","Ỷ","Ỹ",
		"Đ","ê","ù","à");

	$khongDau=array("a","a","a","a","a","a","a","a","a","a","a"
		,"a","a","a","a","a","a",
		"e","e","e","e","e","e","e","e","e","e","e",
		"i","i","i","i","i",
		"o","o","o","o","o","o","o","o","o","o","o","o"
		,"o","o","o","o","o",
		"u","u","u","u","u","u","u","u","u","u","u",
		"y","y","y","y","y",
		"d",
		"A","A","A","A","A","A","A","A","A","A","A","A"
		,"A","A","A","A","A",
		"E","E","E","E","E","E","E","E","E","E","E",
		"I","I","I","I","I",
		"O","O","O","O","O","O","O","O","O","O","O","O"
		,"O","O","O","O","O",
		"U","U","U","U","U","U","U","U","U","U","U",
		"Y","Y","Y","Y","Y",
		"D","e","u","a");

	return str_replace($coDau,$khongDau,$str);
}


function convert_utf8($str,$option=MB_CASE_TITLE)
{
	switch($option)
	{
		case "upper":
		$option = MB_CASE_UPPER;
		break;
		case "lower":
		$option = MB_CASE_LOWER;
		break;
		case "title":
		$option = MB_CASE_TITLE;
		break;
	}
	return mb_convert_case($str, $option, "UTF-8");

} 


function genarate_slug($str) 
{
    $slug = replace_TiengViet($str);
    $slug = convert_utf8($slug, MB_CASE_LOWER);
    $slug = preg_replace( '([^a-zA-Z0-9_-])', '-', $slug );

    return $slug;
}