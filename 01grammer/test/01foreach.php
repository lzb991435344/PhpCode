

//foreach 的几种用法
//常见的打印函数
//print_r(),dump(),var_dump()
<?php
        $fix = array( 
		   'pfid' => array(
		   	'b' => '3',
			'c' => '4',  
		   ),
		   '1' => '1',
		   '2' => '2',
        );
    	
	foreach($fix as $key => $value){

		$tmp = $fix[$key];
        var_dump($tmp);exit;
		foreach($value as $p=>$q){
			$t=$value[$key];
		}
    }


