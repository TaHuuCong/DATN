<?php

// Để nhúng 1 thư viện tự viết vào Project thì làm như sau:
// + app/Function/functions.php là thư viện tự viết
// + Mở composer.json
// + Thêm vào trong "autoload" chuỗi sau:
//        "files": [
//              "app/Function/functions.php"
//        ]
// + Chạy cmd: composer dump-autoload


// hàm chuyển chuỗi có dấu thành chuỗi không dấu
function stripUnicode($str) {
	if(!$str) return '';
	//$str = str_replace($a, $b, $str);
	$unicode = array(
		'a'  =>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ|å|ä|æ|ā|ą|ǻ|ǎ',
		'A'  =>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ|Å|Ä|Æ|Ā|Ą|Ǻ|Ǎ',
		'ae' =>'ǽ',
		'AE' =>'Ǽ',
		'c'  =>'ć|ç|ĉ|ċ|č',
		'C'  =>'Ć|Ĉ|Ĉ|Ċ|Č',
		'd'  =>'đ|ď',
		'D'  =>'Đ|Ď',
		'e'  =>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|ë|ē|ĕ|ę|ė',
		'E'  =>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ|Ë|Ē|Ĕ|Ę|Ė',
		'f'  =>'ƒ',
		'F'  =>'',
		'g'  =>'ĝ|ğ|ġ|ģ',
		'G'  =>'Ĝ|Ğ|Ġ|Ģ',
		'h'  =>'ĥ|ħ',
		'H'  =>'Ĥ|Ħ',
		'i'  =>'í|ì|ỉ|ĩ|ị|î|ï|ī|ĭ|ǐ|į|ı',
		'I'  =>'Í|Ì|Ỉ|Ĩ|Ị|Î|Ï|Ī|Ĭ|Ǐ|Į|İ',
		'ij' =>'ĳ',
		'IJ' =>'Ĳ',
		'j'  =>'ĵ',
		'J'  =>'Ĵ',
		'k'  =>'ķ',
		'K'  =>'Ķ',
		'l'  =>'ĺ|ļ|ľ|ŀ|ł',
		'L'  =>'Ĺ|Ļ|Ľ|Ŀ|Ł',
		'o'  =>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|ö|ø|ǿ|ǒ|ō|ŏ|ő',
		'O'  =>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ|Ö|Ø|Ǿ|Ǒ|Ō|Ŏ|Ő',
		'Oe' =>'œ',
		'OE' =>'Œ',
		'n'  =>'ñ|ń|ņ|ň|ŉ',
		'N'  =>'Ñ|Ń|Ņ|Ň',
		'u'  =>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|û|ū|ŭ|ü|ů|ű|ų|ǔ|ǖ|ǘ|ǚ|ǜ',
		'U'  =>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự|Û|Ū|Ŭ|Ü|Ů|Ű|Ų|Ǔ|Ǖ|Ǘ|Ǚ|Ǜ',
		's'  =>'ŕ|ŗ|ř',
		'R'  =>'Ŕ|Ŗ|Ř',
		's'  =>'ß|ſ|ś|ŝ|ş|š',
		'S'  =>'Ś|Ŝ|Ş|Š',
		't'  =>'ţ|ť|ŧ',
		'T'  =>'Ţ|Ť|Ŧ',
		'w'  =>'ŵ',
		'W'  =>'Ŵ',
		'y'  =>'ý|ỳ|ỷ|ỹ|ỵ|ÿ|ŷ',
		'Y'  =>'Ý|Ỳ|Ỷ|Ỹ|Ỵ|Ÿ|Ŷ',
		'z'  =>'ź|ż|ž',
		'Z'  =>'Ź|Ż|Ž'
	);
	foreach($unicode as $khongdau => $codau) {
		$arr = explode("|", $codau);     //hàm này sẽ chuyển một chuỗi $codau thành một mảng các phần tử với ký tự tách mảng là "|"
		$str = str_replace($arr, $khongdau, $str);   //hàm này tìm kiếm chuỗi $arr trong chuỗi nguồn $str và thay thế bằng chuỗi $khongdau
	}
	return $str;
}

// hàm thay thế 1 số kí tự đặc biệt trong tiêu đề (chuỗi $str) thành kí tự mong muốn ($strSymbol)
function changeTitle($str, $strSymbol = '-', $case = MB_CASE_LOWER) {
	$str = trim($str);  //hàm trim($string, $ky_tu) sẽ xóa ký tự $ky_tu nằm ở đầu và cuối chuỗi $str, nếu ta không nhập $ky_tu thì mặc định nó hiểu là xóa khoảng trắng.
	if ($str == "") return "";
	$str = str_replace('"', '', $str);
	$str = str_replace("'", '', $str);
	$str = stripUnicode($str);
	$str = mb_convert_case($str, $case, 'utf-8');  //hàm này chuyển đổi trong chuỗi $str chữ hoa<->thường theo định dạng utf-8: dùng $case=MB_CASE_LOWER để chuyển chữ hoa thành thường, còn nếu dùng $case=MB_CASE_UPPER thì chuyển chữ thường thành chữ hoa
	$str = preg_replace('/[\W|_]+/', $strSymbol, $str);   //thay thế trong chuỗi $str các kí tự '[\W|_]+' thành $strSymbol
	return $str;
}

?>