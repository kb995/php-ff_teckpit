<?php

require_once('./class/Human.php');
require_once('./class/Enemy.php');
require_once('./class/Brave.php');
require_once('./class/BlackMage.php');
require_once('./class/WhiteMage.php');

$members = array();
$members[] = new Brave('ティーダ');
$members[] = new WhiteMage('ユウナ');
$members[] = new BlackMage('ルールー');

$enemies = array();
$enemies[] = new Enemy('ゴブリン', 20, 50);
$enemies[] = new Enemy('ボム', 25, 70);
$enemies[] = new Enemy('モルボル', 30, 100);

$turn_count = 1;

echo '★★★★★ 戦闘開始 ★★★★★' . PHP_EOL;
$isFinishFlg = false;

while (!$isFinishFlg) {

    // ステータス表示
    echo '-----------------' . PHP_EOL;
    echo $turn_count . 'ターン目' . PHP_EOL . PHP_EOL;

    foreach ($members as $member) {
        echo $member->getName() . ':' . $member->getHitPoint() . '/' . $member::MAX_HITPOINT  . PHP_EOL;
    }

    foreach ($enemies as $enemy) {
    echo $enemy->getName() . ':' . $enemy->getHitPoint() . '/' . $enemy::MAX_HITPOINT  . PHP_EOL;
    }

    echo '-----------------' . PHP_EOL;
    echo PHP_EOL;

    // 攻撃
    foreach ($members as $member) {
        // 白魔道士の場合、味方のオブジェクトも渡す
        if (get_class($member) == 'WhiteMage') {
            $attackResult = $member->doAttackWhiteMage($enemies, $members);
        } else {
            $attackResult = $member->doAttack($enemies);
        }
       echo PHP_EOL;
    }
    echo PHP_EOL;

    foreach ($enemies as $enemy) {
        $enemy->doAttack($members);
        echo PHP_EOL;
    }
    echo PHP_EOL;

        // 仲間の全滅チェック
        $deathCnt = 0;
        foreach ($members as $member) {
            if ($member->getHitPoint() > 0) {
                $isFinishFlg = false;
                break;
            }
            $deathCnt++;
        }

        if ($deathCnt === count($members)) {
            $isFinishFlg = true;
            echo 'GAME OVER ....' . PHP_EOL . PHP_EOL;
            break;
        }

    // 敵の全滅チェック
    $deathCnt = 0;

    foreach ($enemies as $enemy) {
        if ($enemy->getHitPoint() > 0) {
            $isFinishFlg = false;
            break;
        }
        $deathCnt++;
    }

    if ($deathCnt === count($enemies)) {
        $isFinishFlg = true;
        echo '♪♪♪ファンファーレ♪♪♪' . PHP_EOL . PHP_EOL;
        break;
    }

    $turn_count++;
}

echo '★★★★★ 戦闘終了 ★★★★★' . PHP_EOL;

foreach ($members as $member) {
    echo $member->getName() . ':' . $member->getHitPoint() . '/' . $member::MAX_HITPOINT  . PHP_EOL;
}
echo PHP_EOL;
foreach ($enemies as $enemy) {
    echo $enemy->getName() . ':' . $enemy->getHitPoint() . '/' . $enemy::MAX_HITPOINT  . PHP_EOL;
}
