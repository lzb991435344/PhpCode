<?php

//初始化 XML 解析器，加载 XML，并把它输出
//创建了一个 DOMDocument-Object，并把 "note.xml" 中的 XML 载入这个文档对象中。
//saveXML() 函数把内部 XML 文档放入一个字符串，这样我们就可以输出它。
$xmlDoc = new DOMDocument();
$xmlDoc->load("note.xml");

print $xmlDoc->saveXML();
?>


<?php
//初始化 XML 解析器，加载 XML，并遍历 <note> 元素的所有元素

//每个元素之间存在空的文本节点。

//当 XML 生成时，它通常会在节点之间包含空白。XML DOM 解析器把它们当作普通的元素，
//如果您不注意它们，有时会产生问题。
$xmlDoc = new DOMDocument();
$xmlDoc->load("note.xml");

$x = $xmlDoc->documentElement;
foreach ($x->childNodes AS $item){
    print $item->nodeName . " = " . $item->nodeValue . "<br>";
}
?>

