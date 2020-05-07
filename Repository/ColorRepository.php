<?php

namespace GaylordP\ColorBundle\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use GaylordP\ColorBundle\Entity\Color;

class ColorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Color::class);
    }

    public function findAll(): array
    {
        return $this->findBy([], ['name' => 'ASC']);
    }
}
