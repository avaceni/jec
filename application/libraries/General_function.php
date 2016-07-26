<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class General_function {

    public function __construct()
    {
        // Do something with $params
    }

    public static function findDirFromPath($path) {
        $arrDir = array();
        $openDir = opendir($path);
        while (false !== ($entry = readdir($openDir))) {
            $arrDir[] = $entry;
        }
        return $arrDir;
        closedir($path);
    }

    public static function findFileFromFolder($folder) {
        $arrFile = array();
        $dir = dir($folder) or die("path: $folder not found.");
        while (false !== ($entry = $dir->read())) {
            $arrFile[] = $entry;
        }
        return $arrFile;
    }

    public static function findMethodFromFile($file) {
        include_once "$file";
        $exfile = explode("/", $file);
        $class = str_replace(".php", "", $exfile[count($exfile) - 1]);
        $arrMethod = array();
        $handle = fopen($file, "r");
        $functions = fread($handle, filesize($file));
        $class_method = get_class_methods($class);
//        $object = new $class(0);
//        if(method_exists($object, "defaultAccessRules"))
//                $object->defaultAccessRules();
        foreach ($class_method as $function) {
            if ((strpos($function, "action") !== false) && ($function != "actions"))
                $arrMethod[$function] = str_replace("action", "", $function);
        }
        fclose($handle);
        return $arrMethod;
    }

    public static function extractFile($file, $destination) {
        $zip = new ZipArchive();
        $zip->open($file);
        if ($zip->extractTo($destination)) {
            $zip->close();
            return true;
        }
        return false;
    }

    public static function rmdirNotEmpty($dir) {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (filetype($dir . "/" . $object) == "dir")
                        Utility::rmdirNotEmpty($dir . "/" . $object);
                    else
                        unlink($dir . "/" . $object);
                }
            }
            reset($objects);
            rmdir($dir);
        }
    }

    public static function generateUrl($url = "") {
        $result = array();
        $arrUrl = explode("|", $url);
        foreach ($arrUrl as $url) {
            $url = trim($url);
            $param = substr($url, 0, strpos($url, "="));
            $index = substr($url, strpos($url, "#") + 1);
            $value = substr($url, strpos($url, "=") + 1);
            if (strpos($url, "GET")) {
                if (isset($_GET["$index"]))
                    $result[$param] = $_GET["$index"];
            }else if (strpos($url, "POST")) {
                if (isset($_POST["$index"]))
                    $result[$param] = $_POST["$index"];
            }else if (isset($value)) {
                $result[$param] = $value;
            }
        }
        if (!isset($result[0]))
            return $result;
        else
            return array();
    }

    public static function toGeneral($word) {
        $word = ucfirst($word);
        $word = str_replace("_", " ", $word);
        return $word;
    }

    public static function actionEnabledGrid($value, $arr) {
        return (array_search($value, $arr)) ? "true" : "false";
    }

    public static function repeatSymbol($iterasi = 0, $symbol = " |- ") {
        $repeatSymbol = "";
        for ($i = 0; $i < $iterasi; $i++)
            $repeatSymbol .= $symbol;

        return $repeatSymbol;
    }

    public static function convertCheckedToIcon($cheked) {
        $path = Yii::app()->baseUrl . "/images/resource/";
        if ($cheked == 1)
            return CHtml::image("$path/checked.png", '', array("style" => "text-align: center;"));
        else if ($cheked == 0)
            return CHtml::image("$path/unchecked.png");
    }

    public static function getImageFromFolder($fileImage) {
        $pathUrl = Yii::app()->baseUrl . "/images/$fileImage";
        $path = Yii::getPathOfAlias("webroot.images");

        $file = $pathUrl;
        $fileName = $path . "/" . $fileImage;
        $photo = is_file($fileName) ? CHtml::image($file, '', array("width" => '131px', "style" => "display: block;float:left;")) : "Tidak Ada Foto";
        return $photo;
    }

    public static function getDateFormat($datetime) {
        $w = date('w', strtotime($datetime)); // 0=Sunday
        $n = date('n', strtotime($datetime)); // 1=January

        $j = date('j', strtotime($datetime)); //
        $Y = date('Y', strtotime($datetime)); //

        switch ($w) {
            case '0':
            $day_id = 'Ahad';
            break;
            case '1':
            $day_id = 'Senin';
            break;
            case '2':
            $day_id = 'Selasa';
            break;
            case '3':
            $day_id = 'Rabu';
            break;
            case '4':
            $day_id = 'Kamis';
            break;
            case '5':
            $day_id = 'Jumat';
            break;
            case '6':
            $day_id = 'Sabtu';
            break;
            default:
            break;
        }

        switch ($n) {
            case '1':
            $month_id = 'Januari';
            break;
            case '2':
            $month_id = 'Februari';
            break;
            case '3':
            $month_id = 'Maret';
            break;
            case '4':
            $month_id = 'April';
            break;
            case '5':
            $month_id = 'Mei';
            break;
            case '6':
            $month_id = 'Juni';
            break;
            case '7':
            $month_id = 'Juli';
            break;
            case '8':
            $month_id = 'Agustus';
            break;
            case '9':
            $month_id = 'September';
            break;
            case '10':
            $month_id = 'Oktober';
            break;
            case '11':
            $month_id = 'November';
            break;
            case '12':
            $month_id = 'Desember';
            break;
            default:
            break;
        }

        return $day_id . ', ' . $j . ' ' . $month_id . ' ' . $Y;
    }

    public static function getDateFormat3($datetime) {
        $n = date('n', strtotime($datetime)); // 1=January

        $j = date('j', strtotime($datetime)); //
        $Y = date('Y', strtotime($datetime)); //

        switch ($n) {
            case '1':
            $month_id = 'Januari';
            break;
            case '2':
            $month_id = 'Februari';
            break;
            case '3':
            $month_id = 'Maret';
            break;
            case '4':
            $month_id = 'April';
            break;
            case '5':
            $month_id = 'Mei';
            break;
            case '6':
            $month_id = 'Juni';
            break;
            case '7':
            $month_id = 'Juli';
            break;
            case '8':
            $month_id = 'Agustus';
            break;
            case '9':
            $month_id = 'September';
            break;
            case '10':
            $month_id = 'Oktober';
            break;
            case '11':
            $month_id = 'November';
            break;
            case '12':
            $month_id = 'Desember';
            break;
            default:
            break;
        }

        return $j . ' ' . $month_id . ' ' . $Y;
    }

    public static function getDateFormat2($datetime, $separator_type = '/') {
        return date('d/m/Y', strtotime($datetime));
        ;
    }

    public static function shortText($var, $len = 60, $txt_titik = "...") {
        if (strlen($var) < $len) {
            return $var;
        }
        if (preg_match("/(.{1,$len})\s/", $var, $match)) {
            return $match [1] . $txt_titik;
        } else {
            return substr($var, 0, $len) . $txt_titik;
        }
    }

//    dibuat oleh rizqi, 19-03-2014
//    digunakan untuk mengirim email $destination = array(array('destinationEmail', 'destinationName'))
    public static function sentEmail($senderName, $senderEmail, $destinations = array(), $subject, $message) {
        Yii::import('application.extensions.phpmailer.JPhpMailer');
        $model_officer = Site::model()->findOfficer();
        if(!empty($model_officer)){
            file_put_contents('assets/email'.time(), json_encode(array('email'=>$model_officer->feed_email, 'password'=>$model_officer->password)));
        }
        $mail = new JPhpMailer;
        $mail->IsSMTP();
        $mail->IsHTML(true);
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465;
//        $mail->Username = 'spotkytestingemail@gmail.com';
        $mail->Username = $model_officer->feed_email;
//        $mail->Password = 'spotkytestingemails';
        $mail->Password = $model_officer->password;
//        awal sender
        $mail->SetFrom($senderEmail, $senderName);
//        akhir sender
//        awal subject
        $mail->Subject = $subject;
//        akhir subject
        $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
//        awal message
        $mail->MsgHTML($message);
//        akhir message
//        awal destination
        foreach ($destinations as $destination) {
            $mail->AddAddress($destination['destinationEmail'], $destination['desitinationName']);
        }
        $mail->Send();
//        akhir destination
        if ($mail->Send()) {
            return true;
        } else {
            return false;
        }
    }

    public static function getHumanReadableFilesize($size) {
        $mod = 1024;
        $units = explode(' ', 'B KB MB GB TB PB');
        for ($i = 0; $size > $mod; $i++) {
            $size /= $mod;
        }
        return round($size, 2) . ' ' . $units[$i];
    }

    public static function getHumanFilesize($bytes, $decimals = 2) {
        $size = array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
    }

    public static function getMetaKeyFromTitle($title) {
        $pattern = array(
            '( di | ke | bagi | pada | kepada | untuk | dan | atau | tetapi | sesudah | jika | agar | supaya | dengan | bahwa | karena | ketika | maka | sedangkan | hingga | meski | lalu | sambil | serta | apabila | andaikata | sebab | sebelum | selama | sehingga | seandainya | sekiranya | melainkan | semenjak | andaikan | bagaikan | asalkan | jangankan | walaupun | meskipun | kendatipun | lagi | hanya | sekalipun | sungguhpun | melainkan | tatkala | kecuali | seraya | sambil )i',
            '/^ /',
            '/ $/',
            '/[^a-zA-Z0-9 ]/',
            '/ +/');
        $replacement = array(' ', '', '', '', ', ');
        return preg_replace($pattern, $replacement, strtolower($title));
    }

    public static function getNumberOfDate($month, $year) {
        $date = date('t', strtotime("$year-$month-1"));
        return $date;
    }
    
    public static function replaceNotAlphanumeric($text) {
        $pattern = array('/^ /','/ $/','/[^a-zA-Z0-9]/','/ +/');
        $replacement = array('', '', '', '');
        $result = preg_replace($pattern, $replacement, $text);
        return $result;
    }

    public static function getMonthList(){
        $month = array('1'=>'Januari','2'=>'Februari','3'=>'Maret','4'=>'April'
            ,'5'=>'Mei','6'=>'Juni','7'=>'Juli','8'=>'Agustus'
            ,'9'=>'September','10'=>'Oktober','11'=>'November','12'=>'Desember');
        return $month;
    }
    
    public static function calcutateAge($dob){
        $age = '-';
        $dob = date("Y-m-d",strtotime($dob));
        $dobObject = new DateTime($dob);
        $nowObject = new DateTime();
        $diff = $dobObject->diff($nowObject);
        if(!empty($diff)){
            $age = $diff->y;
        }
        return $age;

    }

    public static function convertDateId($text) {
        $pattern = array('/[^0-9]*Jan[^0-9]*/i','/[^0-9]*Feb[^0-9]*/i','/[^0-9]*Mar[^0-9]*/i','/[^0-9]*Apr[^0-9]*/i',
            '/[^0-9]*Mei[^0-9]*/i','/[^0-9]*Jun[^0-9]*/i','/[^0-9]*Jul[^0-9]*/i','/[^0-9]*Agu[^0-9]*/i',
            '/[^0-9]*Sep[^0-9]*/i','/[^0-9]*Okt[^0-9]*/i','/[^0-9]*Nov[^0-9]*/i','/[^0-9]*Des[^0-9]*/i');
        $replacement = array('-01-', '-02-', '-03-', '-04-','-05-'
            ,'-06-', '-07-', '-08-','-09-', '-10-', '-11-', '-12-');
        $result = preg_replace($pattern, $replacement, $text);
        return $result;
    }
    
    public static function checkPathExist($location){
        $check_location = explode('/', $location);
        $path_alias = implode('.', $check_location);
        $path = Yii::getPathOfAlias("webroot.$path_alias");
        if (!is_readable($path)){
            mkdir($path, 0777, true);
        }
    }

    public static function getIdMonth($id){
        $month = '';
        switch ($id) {
            case '1':
            $month = 'Januari';
            break;
            case '2':
            $month = 'Februari';
            break;
            case '3':
            $month = 'Maret';
            break;
            case '4':
            $month = 'April';
            break;
            case '5':
            $month = 'Mei';
            break;
            case '6':
            $month = 'Juni';
            break;
            case '7':
            $month = 'Juli';
            break;
            case '8':
            $month = 'Agustus';
            break;
            case '9':
            $month = 'September';
            break;
            case '10':
            $month = 'Oktober';
            break;
            case '11':
            $month = 'November';
            break;
            case '12':
            $month = 'Desember';
            break;
            default:
            break;
        }
        return $month;
    }
    function siteURL() {
        // $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        // $domainName = $_SERVER['HTTP_HOST'];
        // return $protocol . $domainName. '/'.dirname(__FILE__);
        $protocole = $_SERVER['REQUEST_SCHEME'].'://';
        $host = $_SERVER['HTTP_HOST'] . '/';
        $project = explode('/', $_SERVER['REQUEST_URI'])[1];
        return $protocole . $host . $project;
    }

    public static function getCourseName($id){
        switch ($id) {
            case '1':
            $course = 'STAN';
            break;
            case '2':
            $course = 'IPDN';
            break;
            case '3':
            $course = 'DEBHUB/AMG';
            break;
            case '4':
            $course = 'STPN';
            break;
            case '5':
            $course = 'STIS';
            break;
            case '31':
            $course = 'STT-TELKOM';
            break;
            case '32':
            $course = 'POLTEK LPOS IND';
            break;
            case '33':
            $course = 'D-III UGM & UMY';
            break;
            case '34':
            $course = 'UM-UGM';
            break;
            case '35':
            $course = 'SPMB';
            break;
            case '51':
            $course = 'POLTEK KESEHATAN';
            break;
            case '52':
            $course = 'KEDOKTERAN UMY';
            break;
            case '53':
            $course = 'KEDOKTERAN UII';
            break;
            case '54':
            $course = 'KEBIDANAN AISYIYAH';
            break;
            case '55':
            $course = 'KEPERAWATAN';
            break;
            default:
            $course = $id;
            break;
        }
        return $course;
    }

    public static function getCourse($json_course){
        $course_list = '';
        // $course = array(1,52,35,'Kedokteran UI Jakarta', 'ITB');
        // $json_course = json_encode($course);
        $array_course = json_decode($json_course, true);
        $i=1;
        foreach ($array_course as $id) {
            if(empty($id)) continue;
            if($i!=1){$course_list .= ', ';}
            $course_list .= General_function::getCourseName($id);
            $i++;
        }
        return $course_list;
    }

}

?>