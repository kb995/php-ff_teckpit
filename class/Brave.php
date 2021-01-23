<?php

class Brave extends Human
{
    const MAX_HP = 120;
    private $hp = self::MAX_HP;
    private $attackPoint = 40;

    public function __construct($name)
    {
        parent::__construct($name, $this->hp, $this->attackPoint);
    }


    public function doAttack($enemy)
    {
        if (rand(1, 3) === 1) {
            echo '「' .$this->getName() . '」のクリティカル!!' . PHP_EOL;
            echo '「' . $enemy->getName() . '」 に ' . $this->getAttackPoint() * 1.5 . ' のダメージ!!' . PHP_EOL;
            $enemy->tookDamage($this->getAttackPoint() * 1.5);
        } else {
            parent::doAttack($enemy);
        }
        return true;
    }

}
