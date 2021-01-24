<?php

class BlackMage extends Human
{
    const MAX_HITPOINT = 80;
    private $hp = 80;
    private $attackPoint = 10;
    private $intelligence = 30;

    public function __construct($name)
    {
        parent::__construct($name, $this->hp, $this->attackPoint);
    }

    public function doAttack($enemy)
    {
        if (rand(1, 2) === 1) {
            echo '『' .$this->getName() . '』のスキルが発動した！' . PHP_EOL;
            echo '『ファイア』！！' . PHP_EOL;
            echo $enemy->getName() . ' に ' . $this->intelligence * 1.5 . ' のダメージ！' . PHP_EOL;
            $enemy->tookDamage($this->intelligence * 1.5);
        } else {
            parent::doAttack($enemy);
        }
        return true;
    }

}
