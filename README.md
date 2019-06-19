# NumberToWord
A php file to convert any number to word form.

# Setup

* Using Composer
For includeing this library using composer, it is very easy. there are basically two ways. 

First:
Run this command in terminal inside your project
> composer require nfraz007/number-to-word

Second: 
include this line in your composer.json file, inside require object
> "nfraz007/number-to-word" : "^2.*"


* Using Direct File Include

Setup is very easy, just import the file into your project and you are all set.

```
include("NumberToWord.php");
```

or

```
require 'NumberToWord.php';
```

# Convert a number
Converting any number to word form is very easy. Here is the syntax.

```
$str = NumberToWord("123");
echo $str;

```

> one hundred twenty-three


* **Maximum limit of length of input string = 99**
