<?php

class Brave extends Human
{
    const MAX_HP = 120;
    private $hp = self::MAX_HP;
    private $attackPoint = 40;

    public function doAttack($enemy)
    {
        if (rand(1, 3) === 1) {
            echo '「' .$this->name . '」のクリティカル!!' . PHP_EOL;
            echo '「' . $enemy->name . '」 に ' . $this->attackPoint * 1.5 . ' のダメージ!!' . PHP_EOL;
            $enemy->tookDamage($this->attackPoint * 1.5);
        } else {
            parent::doAttack($enemy);
        }
        return true;
    }

}
