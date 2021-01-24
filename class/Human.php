<?php

class Human
{
    const MAX_HP = 100;
    private $name;
    private $hp = 100;
    private $attackPoint = 30;

    public function __construct($name, $hp = 100, $attackPoint = 20)
    {
        $this->name = $name;
        $this->hp = $hp;
        $this->attackPoint = $attackPoint;
    }


    public function doAttack($enemy) {
        echo '「'. $this->getName() . '」の攻撃!' . PHP_EOL;
        echo '「'. $enemy->getName() . '」に ' . $this->getAttackPoint() . ' のダメージ！' . PHP_EOL;
        $enemy->tookDamage($this->attackPoint);
    }

    public function tookDamage($damage)
    {
        $this->hp -= $damage;

        if ($this->hp < 0) {
            $this->hp = 0;
        }
    }

    public function getName()
    {
        return $this->name;
    }

    public function getHitPoint()
    {
        return $this->hp;
    }

    public function getAttackPoint()
    {
        return $this->attackPoint;
    }

    public function recoveryDamage($heal, $target)
    {
        $this->hp += $heal;
        if ($this->hp > $target::MAX_HITPOINT) {
            $this->hp = $target::MAX_HITPOINT;
        }
    }
}
