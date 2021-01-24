<?php

class Enemy
{
    const MAX_HP = 50;
    private $name;
    private $hp = 50;
    private $attackPoint = 10;

    public function __construct($name, $attackPoint, $hp)
    {
        $this->name = $name;
        $this->hp = $hp;
        $this->attackPoint = $attackPoint;
    }

    public function doAttack($human) {
        echo '「'. $this->getName() . '」の攻撃!' . PHP_EOL;
        echo '「'. $human->getName() . '」に ' . $this->getAttackPoint() . ' のダメージ！' . PHP_EOL;
        $human->tookDamage($this->getAttackPoint());
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

}
