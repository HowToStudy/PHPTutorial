# PHPTutorial
The Ultimate PHP Tutorial.[[编辑]](https://github.com/HowToStudy/PHPTutorial/edit/master/README.md)

## 一、简述
在众多的唱衰PHP的环境下，对《PHP与MySQL程序设计》进行了简单的走读。语言的路演故事虽非跌宕起伏精彩纷呈，却也在当时的环境下引领了Web的潮流。对PHP的发展趋势不予置评，存在即合理，以需求为主抛却杂音杂念。PHP的学习资源很多，但是更多的需要初学者coding+coding+coding。

### 关于环境搭建和开发工具
习惯了C++的编程模式，不喜欢PHP需要安装各个组件的方式，即便是集成的WampServer、XAMPP、AppServ、phpStudy、phpnow等，却也并没有一个真正符合心意的。最终为了快速预览代码效果选择了第一个下载的XAMPP。开发工具直接选择了PHPStorm(强烈推荐)。

### 关于语法糖
注释风格等喜欢单行注释，变量类型与C++类似，增加了array，同时弱类型和自由转换更加便利。数组、字符串操作、正则表达式的支持很棒，大致浏览后需要在项目实践中来复习和记忆。

Web页面交互的Post和Get方式，C++中相同，只是语言的特性解析和处理方式不同；SESSION在web中很重要，需要结合项目深入了解和学习；URL编解码与C++通用。
PHP动态页面中，可以直接内嵌JavaScript，实现与JavaScript的动态交互功能。JS的变量更加灵活，直接使用var声明。关于JavaScript的详细介绍和教程，请参考[JavaScript Tutorial](https://github.com/HowToStudy/JavaScriptTutorial)。

## 二、核心技术
1. Cookie和Session: 因网页是无状态的连接程序，无法感知用户的浏览状态。HTTP协议下使用cookie或者seesion来传递会话信息，cookie对C++不陌生属于客户端数据，seesion存储在服务器端更加安全，seesion多存在服务器内存中。

2. 图形图像处理: PHP提供[GD](http://www.boutell.com/gd)处理图像(GD支持Gif、PNG、JPEG、WBMP、XBM等)，[Jpgraph](http://www.aditus.nu/jpgraph/)同样提供了丰富的工具，实现对数据进行图形化分析。使用此技术可以生成网站验证码，显示图书月销量柱形图等。
```
<?php
$im = imagecreate(200, 60);
$white = imagecolorallocate($im, 225, 66, 159);
imagegif($im);
?>
```
3. 文件系统: 文件之于数据库，其实是一样的：打开、读写、关闭和存储，目录是一种另类文件，文件传输属于网络范畴

4. 面向对象：OOA、OOD、OOP，类是对事物的抽象，对象是事物的特殊个体(类的实例化)，实现封装、继承和多态。高级语法糖:  \_\_set、\_\_get、\_\_call、\_\_sleep、\_\_wakeup、\_\_toString、\_\_autoload等， 这些在C++中是没有的。
```
<?php 
class Obj {
  static $num  = 0;
  public $name;
  public function __construct($name) {
    $this->name = $name;
    $this->num++;
  }
  function __destruct() {
    $this->num--;
    echo $this->name." die.<br/>";
  }
  public function getName() final {
    return $this->name;
  }
}
$ant = new Obj("Ant");
// unset($ant);
?>
```
5. 加密技术: MD5/SHA/DES
6. MySQL数据库：CRUD、phpMyAdmin
```
\> net start mysql
\> mysql -u root -h 127.0.0.1 -p
\> Enter password: xxx
mysql> ...
mysql> quit;
\> net stop mysql
```

## 学习笔记
* [第一篇：基础知识abc](01_abc.php)



## 资源推荐
* [PHP中文](https://www.php.cn/)
* PHP从入门到精通-明日科技
* PHP与MySQL程序设计
