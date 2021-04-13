<?php
//方案一：

$input= "php_is_the_best_programming_language";
$output= "php_is_the_best_programming_language";

$input_arr = explode("_",$input);

$length = count($input_arr);
$output = "";
for($i=1;$i<$length-1;$i++){
    $output.= "_".ucwords($input_arr[$i]);
}

$output=$input_arr[0].$output."_".ucwords($input_arr[$length-1]);

//方案二
$input2 = "php_is_the_best_programming_language";
//$output2= "php_is_the_best_programming_language";
//$str = "";
/*
 * 下划线转驼峰
 */
function convertUnderline($str)
{
    $str = preg_replace_callback('/([-_]+([a-z]{1}))/i',function($matches){
        return strtoupper($matches[1]);
    },$str);
    return $str;
}
//var_dump(convertUnderline($input));

/**
 * 输出文件夹及其子文件夹
 */
function my_scandir($dir){
    $files = array();
    if(is_dir($dir)){
        if($handle=opendir($dir)){
            while(($file=readdir($handle))!==false){
               if($file!="." && $file!=".."){
                   if(is_dir($dir."/".$file)){
                       $files[$file] = my_scandir($dir."/".$file);
                   }else{
                       $files[] = $dir."/".$file;
                   }
               }
            }
            closedir($handle);
            return $files;
        }
    }
}
print_r("<pre>");
var_dump(my_scandir("D:\soft\phpstudy_pro\Extensions\Nginx1.15.11"));
