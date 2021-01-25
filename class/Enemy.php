<?php

class Enemy
{
    const MAX_HITPOINT = 50;
    private $name;
    private $hitPoint = 50;
    private $attackPoint = 10;

    public function __construct($name, $attackPoint, $hitPoint)
    {
        $this->name = $name;
        $this->hitPoint = $hitPoint;
        $this->attackPoint = $attackPoint;
    }

    public function doAttack($humans)
     {
        if ($this->hitPoint <= 0) {
            return false;
        }

        $humanIndex = rand(0, count($humans) - 1);
        $human = $humans[$humanIndex];

        echo '「'. $this->getName() . '」の攻撃!' . PHP_EOL;
        echo '「'. $human->getName() . '」に ' . $this->getAttackPoint() . ' のダメージ！' . PHP_EOL;
        $human->tookDamage($this->getAttackPoint());
    }

    public function tookDamage($damage)
    {
        $this->hitPoint -= $damage;

        if ($this->hitPoint < 0) {
            $this->hitPoint = 0;
        }
    }

    public function getName()
    {
        return $this->name;
    }

    public function getHitPoint()
    {
        return $this->hitPoint;
    }

    public function getAttackPoint()
    {
        return $this->attackPoint;
    }

}
