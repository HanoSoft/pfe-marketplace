<?php


namespace AdminBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AdminBundle\Entity\User;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;


class LoadUser implements FixtureInterface,ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $userManager = $this->container->get('fos_user.user_manager');

        $user = $userManager->createUser();
        $user->setUsername('pophamdi');
        $user->setEmail('pophamdi@gmail.com');
        $user->setPlainPassword('pop1993.');
        $user->setEnabled(true);
        $user->addRole('ROLE_ADMIN');
        $manager->persist($user);

        $user = $userManager->createUser();
        $user->setUsername('nouha');
        $user->setEmail('nouha@gmail.com');
        $user->setPlainPassword('nhstudio');
        $user->setEnabled(true);
        $user->addRole('ROLE_ADMIN');
        $manager->persist($user);


        $manager->flush();
    }
}