<?php

class Human
{
    const MAX_HP = 100;
    public $name;
    public $hp = 100;
    public $attackPoint = 30;

    public function doAttack($enemy) {
        echo '「'. $this->name . '」の攻撃!' . PHP_EOL;
        echo '「'. $enemy->name . '」に ' . $this->attackPoint . ' のダメージ！' . PHP_EOL;
        $enemy->tookDamage($this->attackPoint);
    }

    public function tookDamage($damage)
    {
        $this->hp -= $damage;

        if ($this->hp < 0) {
            $this->hp = 0;
        }
    }

}