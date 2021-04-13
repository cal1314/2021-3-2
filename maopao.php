<?php
function _sort($arr){
    $count = count($arr) - 1;
    $temp = 0;
    /**
     *  冒泡原理：
     *  1, 比较相邻元素，一趟排序选出最大的元素。
     *  2, 需要排序数组长度-1趟，因为最后一个元素不用排序。
     */
    for( $i = 0; $i < $count; $i++ ){
        for( $j = 0; $j< $count - $i; $j++){
            if( $arr[$i] > $arr[$j] ){
                $temp = $i;
                $i = $j;
                $j = $temp;
            }
        }
    }

}
