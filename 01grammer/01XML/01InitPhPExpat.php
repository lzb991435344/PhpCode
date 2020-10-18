<?php

/* Expat 解析器是基于事件的解析器。
<from>Jani</from>
基于事件的解析器把上面的 XML 报告为一连串的三个事件：

开始元素：from
开始 CDATA 部分，值：Jani
关闭元素：from

*/

/* xml文件
<?xml version="1.0" encoding="ISO-8859-1"?>
<note>
<to>Tove</to>
<from>Jani</from>
<heading>Reminder</heading>
<body>Don't forget me this weekend!</body>
</note>

*/

//Initialize the XML parser
$parser = xml_parser_create();//初始化 XML 解析器

//Function to use at the start of an element
function start($parser,$element_name,$element_attrs){
    switch($element_name){
    case "NOTE":
        echo "-- Note --<br>";
        break;
    case "TO":
        echo "To: ";
        break;
    case "FROM":
        echo "From: ";
        break;
    case "HEADING":
        echo "Heading: ";
        break;
    case "BODY":
        echo "Message: ";
    }
}

//Function to use at the end of an element
function stop($parser, $element_name){
    echo "<br>";
}

//Function to use when finding character data
function char($parser,$data){
    echo $data;
}

//Specify element handler
//当解析器遇到开始和结束标签时执行哪个函数
xml_set_element_handler($parser,"start","stop");

//当解析器遇到字符数据时执行哪个函数
//Specify data handler
xml_set_character_data_handler($parser,"char");

//解析文件 "test.xml"
//Open XML file
$fp = fopen("test.xml","r");

//Read data
while ($data=fread($fp, 4096)){
    xml_parse($parser,$data,feof($fp)) or
    die (sprintf("XML Error: %s at line %d",

    //把 XML 错误转换为文本说明
    xml_error_string(xml_get_error_code($parser)),
    xml_get_current_line_number($parser)));
}

//Free the XML parser
//释放分配给 xml_parser_create() 函数的内存
xml_parser_free($parser);
?>
