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
        $user->setUsername('super');
        $user->setEmail('super@gmail.com');
        $user->setPlainPassword('super');
        $user->setEnabled(true);
        $user->setName('super');
        $user->setfamilyName('super');
        $user->addRole('ROLE_SUPER_ADMIN');
        $manager->persist($user);

        $user = $userManager->createUser();
        $user->setUsername('admin');
        $user->setEmail('admin@gmail.com');
        $user->setPlainPassword('admin');
        $user->setEnabled(true);
        $user->addRole('ROLE_ADMIN');
        $user->setName('admin');
        $user->setfamilyName('admin');
        $manager->persist($user);
        $manager->flush();

        $user = $userManager->createUser();
        $user->setUsername('partner');
        $user->setEmail('partner@gmail.com');
        $user->setPlainPassword('partner');
        $user->setEnabled(true);
        $user->addRole('ROLE_PARTNER');
        $user->setName('partner');
        $user->setfamilyName('partner');
        $manager->persist($user);
        $manager->flush();
    }
}