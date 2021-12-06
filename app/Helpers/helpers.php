<?php

use App\Encryption\Encrypter;
use Carbon\Carbon;
use App\Models\Order;

if (! function_exists('security_decrypt')) {
	
	function security_decrypt($token)
	{
		return (new Encrypter)->decrypt($token);
	}
}

if (! function_exists('security_encrypt')) {
	
	function security_encrypt($token)
	{
		return (new Encrypter)->encrypt($token);
	}
}

if (! function_exists('image_path')) {

	function image_path($value, $default = 1) 
	{
		if (is_object($value)) {
			return is_null($value)
				? ( is_null($default) ? $value : asset("/img/no-user.png")) 
				: Storage::url($value->path);
		}

		return is_null($value)
			? (is_null($default) ? $value : asset("/img/no-user.png"))
			: Storage::url($value);
	}
	
}

if (! function_exists('image_thumb_path')) {

	function image_thumb_path($value, $default = 1) 
	{
		if (is_object($value)) {
			return is_null($value) 
				? ( is_null($default) ? $value : asset("/img/placeholder_hotels.png") ) 
				: Storage::url($value->thumb_path);
		}

		return is_null($value) 
			? ( is_null($default) ? $value : asset("/img/placeholder_hotels.png") ) 
			: Storage::url($value);
	}
	
}

/**
* Get base64 image and save in storage.
*/
if(!function_exists('getBase64Image')){
	function getBase64Image($image, $path)
	{
	     $getBase64 = explode(';base64,', $image);

	     preg_match("/^data:image\/(.*);base64/i", $image, $extension);
	     $imageName = $path . '/' . time().str_random(6) . '.' . $extension[1];

	     \Storage::put($imageName, base64_decode($getBase64[1]));

	     return $imageName;
	}
}


if (! function_exists('avatar_path')) {

	function avatar_path($value, $default = 1) 
	{
		return is_null($value)
			? (is_null($default) ? $value : asset('img/no-user.png'))
			: Storage::url($value);
	}
	
}

if (! function_exists('active_segment')) {

	function active_segment($index, $path) 
	{
		return request()->segment($index) == $path ? 'active' : '';
	}
	
}

if (! function_exists('active_path')) {

	function active_path($path = null) 
	{
		$path = is_null($path) 
				? config('app.backend_prefix')
				: config('app.backend_prefix').'/'.$path;

		return request()->is($path) ? 'active' : '';
	}
	
}

if (! function_exists('show_segment')) {

	function show_segment($index, $path) 
	{
		return request()->segment($index) == $path ? 'show' : '';
	}
	
}

if (! function_exists('location_prefix')) {

	function location_prefix($path) 
	{
		switch ($path) {
			case 'admin/cities':
				return 'cities';
			break;
			case 'admin/townships':
				return 'townships';
			break;
			case 'admin/destinations':
				return 'destinations';
			break;
			case 'admin/areas':
				return 'areas';
			break;
			case 'admin/rooms/services':
				return 'services';
			break;
			default:
				return 'admin';
		}
	}
	
}

if (! function_exists('str_filter')) {
	
	function str_filter($string)
	{
		return filter_var($string, FILTER_SANITIZE_STRING);
	}
}

if (! function_exists('str_card')) {
	
	function str_card($value)
	{
		return implode('-', str_split($value, 4));
	}
}

if (! function_exists('split_daterange')) {

	function split_daterange($date)
	{
		if (! $date) return null;

		$date = explode(' - ', $date);
		$from = $date[0];
		$to = $date[1];
		$from = str_replace('/', '-', $from);
		$to = str_replace('/', '-', $to);

		return ['from' => $from, 'to' => $to];
	}
}

if(! function_exists('send_fcm_notification')){

    function send_fcm_notification($field){

        $fcmApiKey = config('services.fcm.key');

        $url = url('https://fcm.googleapis.com/fcm/send');

        $headers = array(
            'Authorization: key=' . $fcmApiKey,
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, $url );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode($field) );
        $result = curl_exec($ch);

        // if ($result === FALSE) {
            // die('Curl failed: ' . curl_error($ch));
        // }
        \Log::info(json_encode($result));
        curl_close($ch);     

    }
}

/**
 * Character and number customer random string.
 */
if (! function_exists('chrn_random')) {
	
	function chrn_random()
	{
		return rand(65, 90) . chr(rand(65, 90)) . rand(65, 90) . chr(rand(65, 90)) . rand(65, 90) . chr(rand(65, 90));
	}
}

/**
 * Character 3 Number 6 random string
 */
if (! function_exists('chr3n6_random')) {
	
	function chr3n6_random()
	{
		return chr(rand(65, 90)) . chr(rand(65, 90)) . chr(rand(65, 90)) . rand(100000, 999999);
	}
}

/**
 * Get MB from given bytes.
 */
if (! function_exists('format_bytes')) {

	// function format_bytes($size, $precision = 2)
	// {
	//     $base = log($size, 1024);
	//     $suffixes = ['', 'KB', 'MB', 'GB', 'TB'];

	//     return round($size / 1000000, 1) . 'MB';

	//     // return round(pow(1024, $base - floor($base)), $precision) .' '. $suffixes[floor($base)];
	// }

	function format_bytes($bytes)
    {
        if ($bytes >= 1073741824) 
        {
			$bytes = round($bytes / 1000000000, 1) . 'GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = round($bytes / 1000000, 1) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = round($bytes / 1000, 1) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
	}

}

if (! function_exists('mm_to_eng_number')) {

	function mm_to_eng_number($numberInput) {

	$numbers_1 = ["၀" => 0,"၁" => 1,"၂" => 2,"၃" => 3,"၄" => 4,"၅" => 5,"၆" => 6,"၇" => 7,"၈" => 8,"၉" => 9];
	$numbers_2 = [0=>"၀",1=>"၁",2=>"၂",3=>"၃",4=>"၄",5=>"၅",6=>"၆",7=>"၇",8=>"၈",9=>"၉"];
	$change = str_replace($numbers_2, $numbers_1, $numberInput);
	return $change;
	}
}

if (! function_exists('eng_to_mm_number')) {

	function eng_to_mm_number($numberInput) {

	$numbers_1 = [0=>"၀",1=>"၁",2=>"၂",3=>"၃",4=>"၄",5=>"၅",6=>"၆",7=>"၇",8=>"၈",9=>"၉"];
	$numbers_2 = ["၀" => 0,"၁" => 1,"၂" => 2,"၃" => 3,"၄" => 4,"၅" => 5,"၆" => 6,"၇" => 7,"၈" => 8,"၉" => 9];
	$change = str_replace($numbers_2, $numbers_1, $numberInput);
	return $change;
	}
}

if (! function_exists('invoice_no')) {

	function invoice_no() 
	{
		$no = rand(100, 999);
		return Carbon::now()->format('Ymd').'-'.$no;
	}
}
