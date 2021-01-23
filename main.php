<?php

require_once('./class/Human.php');
require_once('./class/Enemy.php');
require_once('./class/Brave.php');

$tiida = new Brave('ティーダ');
$goblin = new Enemy('ゴブリン');

$turn_count = 1;

echo '★★★★★ 戦闘開始 ★★★★★' . PHP_EOL;
while ($tiida->getHitPoint() > 0 && $goblin->getHitPoint() > 0) {

    // ステータス表示
    echo '-----------------' . PHP_EOL;
    echo $turn_count . 'ターン目' . PHP_EOL . PHP_EOL;
    echo $tiida->getName() . ':' . $tiida->getHitPoint() . '/' . $tiida::MAX_HP  . PHP_EOL;
    echo $goblin->getName() . ':' . $goblin->getHitPoint() . '/' . $goblin::MAX_HP  . PHP_EOL;
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
echo $tiida->getName() . ':' . $tiida->getHitPoint() . '/' . $tiida::MAX_HP  . PHP_EOL;
echo $goblin->getName() . ':' . $goblin->getHitPoint() . '/' . $goblin::MAX_HP  . PHP_EOL;

// echo PHP_EOL.PHP_EOL;
