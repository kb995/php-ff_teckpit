<?php

require_once('./class/Human.php');
require_once('./class/Enemy.php');
require_once('./class/Brave.php');

$tiida = new Brave();
$goblin = new Enemy();


$tiida->name = 'ティーダ';
$goblin->name = 'ゴブリン';

$turn_count = 1;

echo '★★★★★ 戦闘開始 ★★★★★' . PHP_EOL;
while ($tiida->hp > 0 && $goblin->hp > 0) {

    // ステータス表示
    echo '-----------------' . PHP_EOL;
    echo $turn_count . 'ターン目' . PHP_EOL . PHP_EOL;
    echo $tiida->name . ':' . $tiida->hp . '/' . $tiida::MAX_HP  . PHP_EOL;
    echo $goblin->name . ':' . $goblin->hp . '/' . $goblin::MAX_HP  . PHP_EOL;
    echo '-----------------' . PHP_EOL;
    echo PHP_EOL;

    // 攻撃
    $tiida->doAttack($goblin);
    echo PHP_EOL;
    $goblin->doAttack($tiida);
    echo PHP_EOL;

    $turn_count++;
}

echo '★★★★★ 戦闘終了 ★★★★★' . PHP_EOL;
echo $tiida->name . ':' . $tiida->hp . '/' . $tiida::MAX_HP  . PHP_EOL;
echo $goblin->name . ':' . $goblin->hp . '/' . $goblin::MAX_HP  . PHP_EOL;

// echo PHP_EOL.PHP_EOL;
