<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Event\TestSuite;

use PHPUnit\Event\AbstractEventTestCase;
use PHPUnit\Event\Code\TestCollection;

/**
 * @covers \PHPUnit\Event\TestSuite\Filtered
 */
final class FilteredTest extends AbstractEventTestCase
{
    public function testConstructorSetsValues(): void
    {
        $telemetryInfo = $this->telemetryInfo();

        $testSuite = new TestSuiteWithName(
            'foo',
            9001,
            [],
            [],
            [],
            'bar',
            TestCollection::fromArray([]),
            [],
        );

        $event = new Filtered(
            $telemetryInfo,
            $testSuite
        );

        $this->assertSame($telemetryInfo, $event->telemetryInfo());
        $this->assertSame($testSuite, $event->testSuite());
    }
}
