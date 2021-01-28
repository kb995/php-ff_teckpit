<?php
require_once('./class/Lives.php');
require_once('./class/Human.php');
require_once('./class/Enemy.php');
require_once('./class/Brave.php');
require_once('./class/BlackMage.php');
require_once('./class/WhiteMage.php');
require_once('./class/Message.php');


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

$messageObj = new Message;

// 全滅判定関数
function isFinish($objects)
  {
      $deathCnt = 0;
      foreach ($objects as $object) {
          if ($object->getHitPoint() > 0) {
              return false;
          }
          $deathCnt++;
      }
      if ($deathCnt === count($objects)) {
          return true;
      }
  }

while (!$isFinishFlg) {

    echo '-----------------' . PHP_EOL;
    echo $turn_count . 'ターン目' . PHP_EOL . PHP_EOL;

    // ステータス表示
    $messageObj->displayStatusMessage($members);
    $messageObj->displayStatusMessage($enemies);

    echo '-----------------' . PHP_EOL;
    echo PHP_EOL;

    // 攻撃処理
    $messageObj->displayAttackMessage($members, $enemies);
    $messageObj->displayAttackMessage($enemies, $members);

    // 全滅チェック
    $isFinishFlg = isFinish($members);
    if ($isFinishFlg) {
        $message = 'GAME OVER ....' . PHP_EOL;
        break;
    }

    $isFinishFlg = isFinish($enemies);
    if ($isFinishFlg) {
        $message = '♪♪♪ファンファーレ♪♪♪';
        break;
    }

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
            echo 'GAME OVER ....' . PHP_EOL;
            break;
        }

    $turn_count++;
}

echo '★★★★★ 戦闘終了 ★★★★★' . PHP_EOL;

echo $message;

// ステータス表示
$messageObj->displayStatusMessage($members);
$messageObj->displayStatusMessage($enemies);
