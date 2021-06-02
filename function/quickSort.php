<?php
/**
 * 快速排序
 */
function quickSort($array)
{
    if (!isset($array[1]))
        return $array;
    $mid = $array[0];

    $leftArray = array();
    $rightArray = array();

    foreach ($array as $v) {
        if ($v > $mid) {
            $rightArray[] = $v; //把比中间值大的数据放入数组
        }
        if ($v < $mid) {
            $leftArray[] = $v; //把比中间值小的数据放入另一个数组
        }
    }

    $leftArray = quickSort($leftArray); // 把小数组 进行二次切割。另外把分割的元素 加到小的元素后边。

    $leftArray[] = $mid;

    $rightArray = quickSort($rightArray);  // 把比中间值大的数组在进行一次切割。

    return array_merge($leftArray, $rightArray);

}