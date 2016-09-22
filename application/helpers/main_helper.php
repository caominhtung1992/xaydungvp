<?php
function add_date($orgDate,$date){
    $cd = strtotime($orgDate);
    $retDAY = date('m/d/Y', mktime(0,0,0,date('m',$cd),date('d',$cd) + $date,date('Y',$cd)));
    return $retDAY;
}
function checkMail($str){
    $pattern='/^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/';
    preg_match($pattern, $str, $match);
    if($match){
        return true;
    }else{
        return false;
    }
}
function checkPhone($str) {
    $reg = '/^[0-9-+]+$/';
    preg_match($reg, $str, $match);
    if($match){
        return true;
    }else{
        return false;
    }
}
function CutStr($str,$number = 150,$dot=true)
{
    $leng = strlen($str);
    if($leng > $number)
    {
        $temp  = substr($str, 0, $number);
        $str   = substr($temp, 0, strrpos($temp, " ")).($dot ? "..." : "");
    }

    return $str;
}

function check_captcha($text)
{
    return ($_SESSION['security_code_small'] == $text ? TRUE : FALSE );
}
function resizeImg($parth,$nameImg,$width,$height){
    $this->load->library('image_lib');
    $config['image_library'] = 'gd2';
    $config['source_image'] = $parth. '/'.$nameImg;
    $config['new_image'] = $parth. '/thumb/'.$nameImg;
    $config['create_thumb'] = TRUE;
    $config['maintain_ratio'] = TRUE;
    $config['thumb_marker'] = FALSE;
    $config['width'] = $width;
    $config['height'] = $height;
    $this->image_lib->initialize($config);
    $this->image_lib->resize();
    $this->image_lib->clear();
}
function fillter($str){
    $str = str_replace("<", "&lt;", $str);
    $str = str_replace(">", "&gt;", $str);
    $str = str_replace("&", "&amp;", $str);
    $str = str_replace("|", "&brvbar;", $str);
    $str = str_replace("~", "&tilde;", $str);
    $str = str_replace("`", "&lsquo;", $str);
    $str = str_replace("#", "&curren;", $str);
    $str = str_replace("%", "&permil;", $str);
    $str = str_replace("'", "&rsquo;", $str);
    $str = str_replace("\"", "&quot;", $str);
    $str = str_replace("\\", "&frasl;", $str);
    $str = str_replace("--", "&ndash;&ndash;", $str);
    $str = str_replace("ar(", "ar&Ccedil;", $str);
    $str = str_replace("Ar(", "Ar&Ccedil;", $str);
    $str = str_replace("aR(", "aR&Ccedil;", $str);
    $str = str_replace("AR(", "AR&Ccedil;", $str);
    return htmlspecialchars($str);
}
function captcha() {
    $ci = & get_instance();
    $ci->load->library('session');
    $qna = array(
        1 => array('question' => 'Mot cong mot', 'answer' => 2),
        2 => array('question' => 'ba tru hai', 'answer' => 1),
        3 => array('question' => 'ba nhan nam', 'answer' => 15),
        4 => array('question' => 'sau chia hai', 'answer' => 3),
        5 => array('question' => 'nang bach tuyet va .... chu lun', 'answer' => 7),
        6 => array('question' => 'Alibaba va ... ten cuop', 'answer' => 40),
        7 => array('question' => 'an mot qua khe, tra .... cuc vang', 'answer' => 1),
        8 => array('question' => 'may tui .... gang, mang di ma dung', 'answer' => 3)
    );
    $rand_key = array_rand($qna); // Lay ngau nhien mot key trong arr $qna
    $ci->session->set_userdata('captcha', $qna[$rand_key]);//dung session de luu captcha
    return $question = $qna[$rand_key]['question'];
}

function create_image1()
{
    $ci = & get_instance();
    $ci->load->library('session');
    $md5_hash = md5(rand(0,999));
    $security_code = substr($md5_hash, 15, 5);
    $ci->session->set_userdata("security_code1", $security_code);
    $width = 100;
    $height = 30;
    $image = ImageCreate($width, $height);
    $white = ImageColorAllocate($image, 255, 255, 255);
    $black = ImageColorAllocate($image, 0, 0, 0);
    ImageFill($image, 0, 0, $black);
    ImageString($image, 5, 30, 6, $security_code, $white);
    header("Content-Type: image/jpeg");
    ImageJpeg($image);
    ImageDestroy($image);
}
?>
