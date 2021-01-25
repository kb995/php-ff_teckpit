<?php

class Brave extends Human
{
    const MAX_HITPONT = 120;
    private $hitPoint = self::MAX_HITPOINT;
    private $attackPoint = 30;

    public function __construct($name)
    {
        parent::__construct($name, $this->hitPoint, $this->attackPoint);
    }


    public function doAttack($enemies)
    {
        if ($this->hitPoint <= 0) {
            return false;
        }

        $enemyIndex = rand(0, count($enemies) - 1);
        $enemy = $enemies[$enemyIndex];

        if (rand(1, 3) === 1) {
            echo '「' .$this->getName() . '」のクリティカル!!' . PHP_EOL;
            echo '「' . $enemy->getName() . '」 に ' . $this->getAttackPoint() * 1.5 . ' のダメージ!!' . PHP_EOL;
            $enemy->tookDamage($this->getAttackPoint() * 1.5);
        } else {
            parent::doAttack($enemies);
        }
        return true;
    }

}
