<?php
function searchOrder($arr, $k)
{
    $n = count($arr);
    $arr[$n] = $k;
    for ($i = 0; $i < $n; $i++) {
        if ($arr[$i] == $k) {
            break;
        }
    }
    if ($i < $n) {
        return $i;
    } else {
        return -1;
    }
}

$arr = [1, 5, 3, 8, 9, 4];
$index = searchOrder($arr, 8);
echo "数组中的8的索引" . $index;
/**
 * 顺序查找的原理
 * 1)以数组为长度为容器
 * 2)顺序查找，键值相等，则选择出索引。返回索引
 * 3)临界条件，将键值放入数组最后一位，如果前边键值有重复就返回。前边是指小于 而不是小于等于。
 **/
function binSearch($arr, $target)
{
    $low = 0;
    $high = count($arr) - 1;
    $find = false;
    while (true) {
        if ($low <= $high) {
            $middle = intval(($low + $high) / 2);
            var_dump($low, $high) . "\n";
            if ($arr[$middle] == $target) {
                $find = $middle;
                break;
            } else if ($arr[$middle] > $target) {
                $high = $middle - 1;
            } else {
                $low = $middle + 1;
            }
        } else {
            break;
        }
    }
    return $find;
}

/**
 * 二分查找
 * 非递归方式
 * 递归方式
 */
$array = [1, 3, 6, 9, 13, 18, 19, 29, 38, 47, 51, 56, 58, 59, 60, 63, 65, 69, 70, 71, 73, 75, 76, 77, 79, 89];
print_r("<br>");
$index = binSearch($array, 56);
echo "数组的指针是" . $index;
$n = intval((11 + 0) / 2);
print_r("<br>");
echo "5.5化整之后得到的 结果是：" . $n;
print_r("<br>");
echo "intval 042的结果是" . intval(042);
print_r("<br>");
echo 042;
/**
 * 使用闭包函数无限极分类
 */
function demo($array)
{
    #用于存储递归后的队列
    $data = [];

    # 递归函数
    $func = function (&$array, &$data, &$pid = 0) use (&$func) {
        foreach ($array as $k => $v) {
            if ($v['pid'] == $pid) {
                $data[] = $v;
                #递归自身
                $func($array, $data, $v['id']);
            }
        }
        #开始递归
        $func($array, $data);
        return $data;
    };

}

$array = array(
    0 => array('id' => 1, 'pid' => 0, 'name' => '安徽省'),
    1 => array('id' => 2, 'pid' => 5, 'name' => '浙江省'),
    2 => array('id' => 3, 'pid' => 2, 'name' => '合肥市'),
    3 => array('id' => 4, 'pid' => 2, 'name' => '长丰县'),
    4 => array('id' => 5, 'pid' => 1, 'name' => '安庆市'),
);

echo '<pre>';
var_dump(demo($array));
echo '</pre>';
/**
 * 冒泡排序原理：
 *
 */
$arr = array(1, 43, 54, 72, 21, 66, 32, 55, 11, 78, 36, 76, 39, 88);

function getpao($arr)
{
    $len = count($arr);
    //设置一个空数组 用来接收冒出来的泡
    //该层循环控制 需要冒泡的轮数
    for ($i = 0; $i < $len; $i++) {
        for ($j = 0; $j < $len - $i; $j++){
            if ($arr[$j] > $arr[$j + 1]) {
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
            }
        }
    }
    return $arr;
}

/**
 * 快速排序原理：
 */
function quickSort($arr)
{
    //判
    if (!is_array($arr)) {
        return false;
    } else {
        $length = count($arr);

        if ($length <= 1)
            return $arr;
        $left = $right = array();

        for ($i = 1; $i < $length; $i++) {
            if ($arr[$i] < $arr[0]) {
                $left[] = $arr[$i];
            } else {
                $right[] = $arr[$i];
            }
        }
        $left = quick_sort($left);
        $right = quick_sort($right);

        return array_merge($left, array($arr[0]), $right);
    }
}



