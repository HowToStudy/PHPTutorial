## 一、基础语法

1. 语句以";"结束
```
<?php
echo "Hello world!";
?>
```

2. 输出：echo/print/printf/print_r/var_dump/get_defined_vars
```
echo "<pre>";
print_r(get_defined_vars());
echo "</pre>";
```

3. 注释: comments
```
// 单行注释
#  单行注释，UNIX Shell语法
/*
   多行注释
*/
```

4. 变量：variable, 以"$"开始，中间无空格，区分大小写(case-sensitive)，短横线一般不用像减号，首字符一般不用下划线像PHP定义变量
5. 常量：comstants，一般大写，不需“$”开头，值固定不可改
```
define("name", value);
echo "判断是否已经被定义：".defined("name");
```
6. 数据类型

 * 标量数据类型
 
| 类型 | 说明 | 备注|
|------|-----|---------|
|布尔型(boolean)| * 要指定一个布尔值，使用关键字 TRUE 或 FALSE。两个都是大小写不敏感的<br/> * true  返回 1<br/> * false 返回 nothing, 即什么都没返回<br/> * isset($BooleanVar); 看这变量是否有被设定过，有则返回1，没则没返回 |
|整形(integer)|
|浮点型(float\double)| * 整数(int)大小超出其范围后，自动转化为双精度型(double)<br/> * 浮点数的字长和平台相关<br/> * 由于不可能精确的用有限位数表达某些十进制分数，所以不能相信浮点数结果精确到了最后一位，也不能直接比较两个浮点数是否相等<br/> * 如果确实需要更高的精度，应该使用任意精度数学函数库或者 gmp 函数库<br/> * 8进制以“0”开头；16进制以“0x”开头<br/> |
|字符串(string)|  * 字符串可以用三种字面上的方法定义：单引号、双引号、定界符<br/> * 和其他语法不同，单引号字符串中出现的变量和转义序列不会被变量的值替代<br/> * 双引号字符串最重要的一点是其中的变量名会被变量值替代<br/> |

 * 复合数据类型
   * 数组(array)
   * 对象(object)
```
$users=Array(Array("name"=>"Mike","city"=>"Oakville","age"=>"30"),
             Array("0",1,"bb",3,4),
             Array("kk","jj",array(99,88,"jiji")));
$monthName = array(
/*定义$monthName[1]到$monthName[12]*/
        1=>"January", "February", "March","April", "May", "June",
        "July", "August", "September", "October", "November", "December",
/*定义$monthName["Jan"]到$monthName["Dec"]*/
        "Jan"=>"January", "Feb"=>"February","Mar"=>"March", "Apr"=>"April",
        "May"=>"May", "Jun"=>"June", "Jul"=>"July", "Aug"=>"August",
        "Sep"=>"September", "Oct"=>"October", "Nov"=>"November", "Dec"=>"December",
/*定义$monthName["Jan"]到$monthName["Dec"]*/
        "January"=>"January", "February"=>"February","March"=>"March", "April"=>"April",
        "May"=>"May", "June"=>"June", "July"=>"July", "August"=>"August",
        "September"=>"September", "October"=>"October", "November"=>"November", "December"=>"December"
        );
/*打印相关的元素*/
echo "Month <B>5</B> is <B>" , $monthName[5] , "</B><BR>\n";
echo "Month <B>Aug</B> is <B>" , $monthName["Aug"] , "</B><BR>\n";
echo "Month <B>June</B> is <B>" , $monthName["June"] , "</B><BR>\n";
```
   
 * 特殊数据类型
   * 资源(resource)
   * 空值(NULL)

7. 类型转换:typecasting, php具有自动类型转换功能。但不能依赖它，因为那未必是你想要的
8. 运算符:
 * 算术运算符: 加减乘除,求余
 * 赋值运算符: +=  -=   /=  %=  <<=  >>= \*= 
 * 字符串合并: 点是合并，点等于是赋值合并
 * 自增、自减: ++  --
 * 比较运算符: >   >=  <   <=  ==  != (true则返回1；false则不返回)
 * 逻辑运算:   !(反相) (true则返回1；false则不返回)
 * 短路运算    && ||(true则返回1；false则不返回)
 * 非短路运算  & |(true则返回1；false则返回0)
 * 移位运算:   >> <<
 * 位运算:     &(AND)  |(OR) ^(XOR异或) ~(补码)按位取反
9. 条件语句: if elseif else switch
10. 循环: while for foreach, break continue
11. 函数function：PHP不允许重载(overload)，函数可以在定义之前调用，允许嵌套定义函数(但不建议这样做)，函数不调用则不加载，函数名的大小写不敏感不能重名
```
<?php
function write($text) {echo $text;}                //定义 write()函数
function writeBold($text) {echo "<B>$text</B>";}   //定义 writeBold()函数
$myFunction = "write";         //定义变量
$myFunction("你好!<BR>\n");    //由于变量后面有括号，所以找名字相同的函数: write($text)
$myFunction = "writeBold";     //定义变量
$myFunction("再见!<BR>\n");    //由于变量后面有括号，所以找名字相同的函数: writeBold($text)
?>
```
12. 变量的变量：一个“$”前缀代表普通的变量，两个前缀就是变量的变量
```
<?php
$name = "hello";
${$name}="world";              //等同于$hello=″world″;
echo "$name $hello","<br>";    //输出：hello world
echo "$name ${$name}","<br>";  //同样输出：hello world  //测试时是：hello $hello
for($i=1;$i<=5;$i++)
{ ${"var"."$i"}=$i;}           //定义 $var1 ~ $var5
echo $var3;                    //输出：3 。证明 $var3 刚才被生成了。  //测试不成功，可能版本问题。
?>
```
13. MySQL CRUD:
 * Create:   INSERT INTO table (column1,column2,column3) VALUES (val1,val2,val3);
 * Read:     SELECT * FROM table WHERE column1 = 'some_text' ORDER BY column1,column2 ASC;
 * Update:   UPDATE table SET column1 = 'some_text' WHERE id = 1;
 * DELETE:   DELETE FROM table WHERE id = 1;
 ```
 // 1. 初始化
 $hostname = "localhost";
 $username = "root";
 $password = "123";
 $database = "tutorial";
 // 2. 连接
 $link = MYSQL_CONNECT($hostname, $username, $password) OR die("connect database failed.");
 mysql_select_db($database) or die("select $database failed.");
 // 3. CRUD
 mysql_query("set names GBK");
 
 $name = addslashes($_REQUEST['name']);
 $age = addslashes($_REQUEST['age']);
 $create = "INSERT INTO table(name, age) VALUES('$name', '$age')";
 mysql_query($create) or die("create failed: ".mysql_error());
 
 $query = "SELECT * FROM table ORDER BY name ASC LIMIT 0,10";
 $result = mysql_query($query) or die("query failed:".mysql_error());
 echo "<table border='1'>";
 while ($col = mysql_fetch_array($result, MYSQL_ASSOC)) {
   echo "\t<tr>\n";
   foreach ($col as $value) {
       echo "\t\t<td>$value</td>\n";
   }
   echo "\t</tr>\n";
}
echo "</table>\n";
 
$update = "UPDATE table set name = '$name' age = '$age' WHERE name = '$name'";
mysql_query($update);

$delete_user = "DELETE FROM table WHERE name = '$name'";
mysql_query($delete_user);

mysql_close($link);
 ```
 
14. 引用文件: include include_once require require_once
15. 文件操作:
  * 打开和读取：fopen, fclose, fgets/fgetss/fgetc, feof
  * 创建和写入：mkdir, fopen, fwrite, fclose
  * 读取文件夹：dir,read, filetype, fclose

## 二、解决方案

1. PHP与HTML互相嵌入：
* 动态内容少，PHP嵌入HTML
* 页面复杂，HTML嵌入PHP

2. 重定向：
```
Header("Location: ./index.php");
```

3. 中文冲突
```
$message = base64_encode($message); // 编码
$message = base64_decode($message); // 解码
$message = nl2br($message);         // 将换行字符转成<br>
```
