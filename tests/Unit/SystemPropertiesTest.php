<?php
/**
 * @copyright 2015-2017 Contentful GmbH
 * @license   MIT
 */

namespace Contentful\Tests\Unit;

use Contentful\Management\SystemProperties;

class SyatemPropertiesTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateWithType()
    {
        $sys = SystemProperties::withType('Locale');
        $this->assertEquals('Locale', $sys->getType());

        $sys = SystemProperties::withType('Space');
        $this->assertEquals('Space', $sys->getType());
    }
}
