<?php
namespace VighIosif\ObjectContainers\Tests;

use VighIosif\ObjectContainers\Classes\Account;
use VighIosif\ObjectContainers\Classes\Containers\AccountContainer;

require dirname(__FILE__) . '/../vendor/autoload.php';

class ContainerTest extends \PHPUnit_Framework_TestCase
{
    public function __construct()
    {
        date_default_timezone_set('Europe/Amsterdam');
        parent::__construct();
    }

    public function testCreateContainer()
    {
        $accountContainer = new AccountContainer();
        $accountEntity    = new Account();
        $accountEntity->setType(1)->setUsername('johndoe')->setPassword('qwe123');
        $accountContainer->add($accountEntity);

        $accountContainerCompare = AccountContainer::factory([
            [
                'type'     => '1',
                'username' => 'johndoe',
                'password' => 'qwe123',
            ],
        ]);

        $this->assertEquals(
            $accountContainer,
            $accountContainerCompare
        );
    }
}