<?php

namespace GaylordP\ColorBundle\Command;

use Doctrine\ORM\EntityManagerInterface;
use GaylordP\ColorBundle\Entity\Color;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class ColorCommand extends Command
{
    protected static $defaultName = 'color:generate';

    private $em;
    private $colors;

    public function __construct(EntityManagerInterface $em, ParameterBagInterface $parameterBag)
    {
        $this->em = $em;
        $this->colors = $parameterBag->get('colors');

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Save colors in the database (from "colors" parameters).')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $created = 0;

        foreach ($this->colors as $name => $value) {
            $find = $this->em->getRepository(Color::class)->findOneByName($name);

            $value = ltrim($value, '#');

            if (null === $find || $find->getRgb() !== $value) {
                $entity = new Color();
                $entity->setName($name);
                $entity->setRgb($value);
                $entity->setSlug($name);

                $this->em->persist($entity);

                $created++;
            }
        }

        $this->em->flush();

        $output->write('Color saved : ' . $created);

        return 0;
    }
}
