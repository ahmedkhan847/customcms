Exception handling is one of the essential parts of your code. It helps save your code in unusual circumstances. PHP 7 comes with two new classes which help you handle errors more easily. However, before these classes are introduced in PHP 7, you have to write your exception error classes to handle the different errors. We will be discussing these classes in detail below.

Throwable Class:
----------------

This is one of the new reserved word and class introduced in PHP 7, from this, **Exception** and **Error** classes are extended. This class helps you to catch any throwable errors whether they are any exception or error. For example

    <?php
    try {
        throw new Exception("This is an exception");
    } catch(Throwable $e) {
        echo $e->getMessage();
    }

Or any of the newly defined Parse Error: 

    <?php
    try {
    $result = eval("2*'7'");
    }
    catch(Throwable $e){
    
       	echo $e->getMessage();
    }

  

Error Class:
------------

This is another new reserved word and class added in PHP 7, which will handle different error exceptions, either throwing fatal error or type errors. Further four new error subclasses which are extended from Error class are:

1. Arithmetic Error
2. Type Error
3. Parse Error
4. Assertion Error

The main thing to remember before upgrading to PHP 7 is that if you have defined a custom error class having name **error** in the versions before PHP 7, then you have to be sure that you have changed your custom error class name, or you will get **Fatal Error**. Let’s discuss the above four classes one by one.

**Arithmetic Error**
This error shows up when an error occurs while performing mathematical operations. Like when you are using `intdiv()` in your function for some division and after some calculation a number is divided by 0 or -1 then Arithmetic Error will be thrown. For example, if you enter the following code:

    <?php
    
    try {
    var_dump(intdiv(PHP_INT_MIN, -1));
    }
    catch(ArithmeticError $e){
       echo $e->getMessage();
    }

You will get “***Division of PHP_INT_MIN by -1 is not an integer***” because we have bit shifted it by a negative amount. Another class, ***DivisionByZeroError***, also extends from Arithmetic Error. This error is thrown on two different conditions:

First, if you do modulus of a number by 0, ***DivisionByZeroError*** occurs, showing “***Modulo by zero***” error message:

    <?php
    try {
    $result = 5%0;
    echo $result;
    }
    catch(DivisionByZeroError $e){
       echo $e->getMessage();
     }

However, if you use the same method as above and change the % by /, you will get a warning instead of exception and the result can be any from these: ***+INF, -INF, or NAN*** . However, you can throw the ***DivisionByZeroError*** exception by using this:

    try {
        $result = @(1.0 / 0);
    
        if (in_array($result, [INF, NAN])) {
            throw new DivisionByZeroError('Division by zero error');
        }
    } catch (DivisionByZeroError $e) {
        echo $e->getMessage();
    }

Or you can use intdiv() function to throw ***DivisionByZeroError***.

**Note**: A bug report for this issue has been [reported](https://bugs.php.net/bug.php?id=71306).

**Type Error**

This error is mostly used with the Scalar Type function in PHP 7. The error will be shown when you have created a function or variable of specific data type and you are trying to save a value of different data type. For example:

    <?php
    declare(strict_types=1);
    function add(int $a, int $b)
    {
    return $a + $b;
    }
    
    try {
    
    echo add("3","4");
    
    }
    catch(TypeError $e){
       echo $e->getMessage();
    }

If you run the above code, TypeError exception will be thrown and you will get “***must be of the type integer, string given***” error, but if you run the above code without `declare(strict_types=1);` you won’t get any exception and the result will be 7 unless you change the number by a string like “**name**”. 

**Parse Error**

This error is thrown when you are using `eval()` function to insert a new line of code or using an external PHP file which contains syntax error. Before the Parse Error, when you have a syntax error in your external PHP file or in `eval()` function, your code gets broken and shows you a fatal error. For example let's just assume we have a PHP file having the following code.

    <?php
    $a = 4
    $result = $a *5;

And we are calling it another PHP file: 

    <?php
    try {
       require "index3.php";
    }
    catch(ParseError $e){
       echo $e->getMessage();      
    }

When we run the above code we will get “***syntax error, unexpected end of file***” instead of fatal error. This class helps you in many conditions. For example, you are sending a user information to another class and by mistake user have send an irrelevant data which can break your code. Before this it was mostly impossible to handle syntax and fatal errors easily.

**Assertion Error**

Before Assertion Error class, we have to create our own function to handle assertions exception to handle fatal errors when you have binded your custom function using assert_options(). This error will only be thrown when an assertion is made via assert() fails. To work with it, you first need to configure the assert directives in PHP.ini file. You need to turn on these 2 options according to your need.

1.	**Assert.exception:** By default, its value is **0** and it only generates warning for that object rather than throwing error. If you change it’s value to 1 then it will throw an exception or an Assertion Error, which can be catchable by Throwable or AssertionError by it self.
2.	**Zend.assertions:** By default, it’s value is **-1** which is for production mode, i.e assertion code will not be generated. When it is set to **1** it will be in development mode in which assertion code will be generated and executed. When it is set to **0**, assertion code will be generated but won’t be executed in runtime. 

Summary
-------

If you are using a PHP version less than 7 than you should also have to keep these things in mind before moving to PHP 7. I have also written a short [php upgrade guide](http://www.cloudways.com/blog/php-7-upgrade-guide/) which you use to help you before upgrading your whole site.

**Author Bio:**

Ahmed Khan is a PHP community manager at [Cloudways](http://www.cloudways.com/). He loves to write articles on PHP and loves to learn new things. You can follow him on [twitter](https://twitter.com/ahmedkhan0627/).





