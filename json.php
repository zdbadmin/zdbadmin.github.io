<?php 

$prize_arr = array( 
    '0' => array('id'=>1,'min'=>1,'max'=>30,'prize'=>'一等奖','v'=>1),
    '1' => array('id'=>2,'min'=>31,'max'=>60,'prize'=>'七等奖','v'=>2),
    '2' => array('id'=>3,'min'=>61,'max'=>90,'prize'=>'六等奖','v'=>6),
    '3' => array('id'=>4,'min'=>91,'max'=>120,'prize'=>'七等奖','v'=>7),
    '4' => array('id'=>5,'min'=>121,'max'=>150,'prize'=>'五等奖','v'=>5),
    '5' => array('id'=>6,'min'=>151,'max'=>180,'prize'=>'七等奖','v'=>7),
    '6' => array('id'=>7,'min'=>181,'max'=>210,'prize'=>'四等奖','v'=>4),
    '7' => array('id'=>8,'min'=>211,'max'=>240,'prize'=>'七等奖','v'=>7),
    '8' => array('id'=>9,'min'=>241,'max'=>270,'prize'=>'三等奖','v'=>3),
    '9' => array('id'=>10,'min'=>271,'max'=>300,'prize'=>'七等奖','v'=>7),
    '10' => array('id'=>11,'min'=>301,'max'=>330,'prize'=>'二等奖','v'=>2),
    '11' => array('id'=>12,'min'=>331,'max'=>360,'prize'=>'七等奖','v'=>7),
);
foreach ($prize_arr as $key => $val) { 
    $arr[$val['id']] = $val['v']; 
}

$rid = getRand($arr); //根据概率获取奖项id s

$res = $prize_arr[$rid-1]; //中奖项 
$min = $res['min']; 
$max = $res['max']; 
$result['angle'] = mt_rand($min,$max); //随机生成一个角度 

$result['prize'] = $res['prize'];

function getRand($proArr) { 
    $result = ''; 
 
    //概率数组的总概率精度 
    $proSum = array_sum($proArr);

    //概率数组循环 
    foreach ($proArr as $key => $proCur) { 
        $randNum = mt_rand(1, $proSum); 
        if ($randNum <= $proCur) { 
            $result = $key; 
            break; 
        } else { 
            $proSum -= $proCur; 
        } 
    } 
    unset ($proArr); 
 
    return $result; 
}
echo json_encode($result); 
?>