<?php

namespace App;

use PHPUnit\Framework\TestCase;

class TruncaterTest extends TestCase
{
    public function testEmpty()
    {
        $truncater = new Truncater();
        $this->assertSame($truncater->truncate(''), '');
    }

    public function testDefaultOptions()
    {
        $truncater = new Truncater();
        $this->assertSame(
            $truncater->truncate('Малкин Денис Алексеевич'),
            'Малкин Денис Алексеевич'
        );

        $truncater2 = new Truncater(['length' => 10]);
        $this->assertSame(
            $truncater2->truncate('Малкин Денис Алексеевич'),
            'Малкин Ден...'
        );
    }

    public function testLessLength()
    {
        $truncater = new Truncater();
        $this->assertSame($truncater->truncate(
            'Малкин Денис Алексеевич',
            ['length' => 10]
        ), 'Малкин Ден...');
    }

    public function testLongerLength()
    {
        $truncater = new Truncater();
        $this->assertSame($truncater->truncate(
            'Малкин Денис Алексеевич',
            ['length' => 50]
        ), 'Малкин Денис Алексеевич');
    }

    public function testNegativeLength()
    {
        $truncater = new Truncater();
        $this->assertSame($truncater->truncate(
            'Малкин Денис Алексеевич',
            ['length' => -10]
        ), 'Малкин Дени...');
    }

    public function testNewSeparation()
    {
        $truncater = new Truncater();
        $this->assertSame($truncater->truncate(
            'Малкин Денис Алексеевич',
            ['length' => 10, 'separator' => '*']
        ), 'Малкин Ден*');
    }
    public function testNewSeparationAndDefSetting()
    {
        $truncater = new Truncater();
        $this->assertSame($truncater->truncate(
            'Малкин Денис Алексеевич',
            ['separator' => '*']
        ), 'Малкин Денис Алексеевич');
    }

    public function testSettingsOverrides()
    {
        $truncater = new Truncater(['length' => 10, 'separator' => ' :)']);
        $this->assertSame(
            $truncater->truncate('Малкин Денис Алексеевич',),
            'Малкин Ден :)'
        );
        $this->assertSame($truncater->truncate(
            'Малкин Денис Алексеевич',
            ['length' => 7, 'separator' => '*_*']
        ), 'Малкин*_*');
        $this->assertSame(
            $truncater->truncate('Малкин Денис Алексеевич',),
            'Малкин Ден :)'
        );
    }
}
