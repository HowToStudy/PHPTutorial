<!DOCTYPE html>
<html>
<head>
    <title>PHP基础</title>
</head>
<body>

<?php

echo "--------------------------------------------------------------------------------------------------------<br/>";
echo "Hello World! <br />";

echo "--------------------------------------------------------------------------------------------------------<br/>";
foreach ($_SERVER as $var => $value) {
    // echo "$var => $value <br />";
}
echo $_SERVER['DOCUMENT_ROOT']."<br/>";
echo "--------------------------------------------------------------------------------------------------------<br/>";

echo $_GET['_ijt']."<br/>";
echo "--------------------------------------------------------------------------------------------------------<br/>";

$links = array("www.ant.sh", "note.ant.sh", "docs.ant.sh");
foreach ($links as $link) echo "<a href=\"https://$link\">$link</a><br/>";
echo "--------------------------------------------------------------------------------------------------------<br/>";

function footer($year) {
    echo "Copyright $year Ant.SH<br/>";
}
footer(2018);
echo "--------------------------------------------------------------------------------------------------------<br/>";

class Visitor {
    private static $vistors = 0;
    function __construct()
    {
        self::$vistors++;
    }
    static  function getVistors() {
        return self::$vistors;
    }
}

$visitor1 = new Visitor();
$visitor2 = new  Visitor();
echo "visitor: ".Visitor::getVistors()."<br/>";

class WebVistor extends Visitor {
    function getInfo() {
        return "http://www.ant.sh: ".self::getVistors();
    }
}
$ant = new WebVistor();
echo $ant->getInfo()."<br/>";
echo "--------------------------------------------------------------------------------------------------------<br/>";

// 正则表达式
// 中括号: 范围
// 量词: 一个或多个，至少N个，以X开头或结尾，p+,p*,p?,p{2},p{2,3},p{2,},p$,^p,p.p,
// 预定义字符范围: [:alpha:]....
$username = "json";
if (mb_ereg("([^a-z])", $username)) {
    echo "username is all lowercase.<br/>";
}

$url = "https://www.ant.sh";
$parts = mb_ereg("^(https://www)\.([[:alnum:]]+)\.([[:alnum:]]+)", $url, $regs);
echo mb_ereg_replace("https://([a-zA-Z0-9./-]+)$", "<a href=\"\\0\">\\0</a>", $url)."<br/>";
foreach ($regs as $reg) echo "$reg<br/>";

$pswd = "abcdefgAAAk";
if (mb_eregi("^[a-zA-Z0-9]{8,12}$", $pswd)) echo "Valid password<br/>";
echo "--------------------------------------------------------------------------------------------------------<br/>";

// 处理文件和操作系统
$path = "/home/data/user.txt";
echo "Filename: ".basename($path)."<br/>";
echo "Filename sans extension:".basename($path, ".txt")."<br/>";
echo "Directory: ".dirname($path)."<br/>";
$cover = "/images/cover.gif";
echo "AbsolutePath: ".realpath($cover)."<br/>";
echo "--------------------------------------------------------------------------------------------------------<br/>";

// PEAR: PHP Extension and Application Repository
//require_once("Numbers/Roman.php");
//$year = date("Y");
//$roman = Numbers_Roman::toNumberal($year);
//echo "Copyright &copy; $roman"."<br/>";
//echo "--------------------------------------------------------------------------------------------------------<br/>";

// 日期和时间
echo "Today is  ".date("F d, Y")."<br/>";
echo "Page last modified on ".date("F d, Y h:i:sa", getlastmod())."<br/>";
echo "--------------------------------------------------------------------------------------------------------<br/>";

// 表单
function CheckEmail($email) {
    $regexp = "^([_a-z0-9-]+)(\.[_a-z0-9-]+)*@([a-z0-9-]+)(\.[a-z0-9-]+)*(\.[a-z]{2,6})$";
    if (mb_eregi($regexp, $email)) return 1;
    return 0;
}
if (isset($_POST['submit'])) {
    $name = htmlentities($_POST['name']);
    $email = htmlentities($_POST['email']);
    if (!CheckEmail($email)) echo "The mail $email is invalid."."<br/>";
    echo "Hi, $name, The addr ".$email." will soon be a spam-magnet."."<br/>";
    echo "Your like languages: ";
    foreach ($_POST['languages'] as $lang) {
        $lang = htmlentities($lang);
        echo "$lang \t";
    }
    echo "<br/>";
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <p>
        Name: <br/>
        <input type="text" id="name" name="name" size="20" maxlength="40" />
    </p>
    <p>
        Email: <br/>
        <input type="text" id="email" name="email" size="20" maxlength="40" />
    </p>
    <p>
        <select name="languages[]" multiple="multiple">
            <option value="php">PHP</option>
            <option value="C++">C++</option>
            <option value="JS">JS</option>
        </select>
    </p>
    <input type="submit" id="submit" name="submit" value="提交" />
</form>

<?php
echo "--------------------------------------------------------------------------------------------------------<br/>";
?>

<?php
// 身份验证
echo "please input your username and password...<br/>";
header('WWW-Authenticate: Basic Realm="Book Projects"');
header("HTTP/1.1 401 Unauthorized");

//mysql_connect("localhost", "authenticator", "secret") or die("Cant not connect to database"));
//mysqli_connect("localhost", "authenticator", "secret", "corporate", 0, 0) or die("connect db failed.<br/>");
echo "--------------------------------------------------------------------------------------------------------<br/>";
?>

<?php
// 文件上传
if (!is_uploaded_file($_FILES['notes']['tmp_name'])) echo "File not uploaded.<br/>";
echo "--------------------------------------------------------------------------------------------------------<br/>";
?>

<?php
// 网络
if (checkdnsrr("ant.sh", "ANY")) echo "The domain has been reserved.";
else echo "The domain is available.";
echo "<br/>";
echo dns_get_record("note.ant.sh")."<br/>";
echo "--------------------------------------------------------------------------------------------------------<br/>";
?>

<?php
// LDAP
$host = "ldap.openldap.org";
$port = "389";
//$connection = ldap_connect($host, $port) or die("Cann't establish LDAP connection.<br/>");
//echo $connection."<br/>";
echo "$host:$port<br/>";
echo "--------------------------------------------------------------------------------------------------------<br/>";
?>


<?php
// 会话处理
echo "session-cookie<br/>";
echo "--------------------------------------------------------------------------------------------------------<br/>";
?>

<?php
// Smarty模板化
//require "Smarty.class.php";
echo "http://smarty.php.net<br/>";
echo "--------------------------------------------------------------------------------------------------------<br/>";
?>

<?php
// Web服务
echo "RSS, XML, SOAP<br/>";
echo "--------------------------------------------------------------------------------------------------------<br/>";
?>

<?php
// Zend
echo "http://framework.zend.com<br/>";
echo "--------------------------------------------------------------------------------------------------------<br/>";
?>

<?php
// 数据库
echo "Sqlite、MySQL，CRUD，PDO，存储例程，触发器，视图，索引和搜索，事务，数据导入导出<br/>";
echo "--------------------------------------------------------------------------------------------------------<br/>";
?>

<?php
phpinfo();
?>

</body>
</html>