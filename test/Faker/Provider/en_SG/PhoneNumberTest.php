<?php

namespace Faker\Test\Provider\en_SG;

use Faker\Generator;
use Faker\Provider\en_SG\PhoneNumber;

class PhoneNumberTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $faker = new Generator();
        $faker->addProvider(new PhoneNumber($faker));
        $this->faker = $faker;
    }

    // http://en.wikipedia.org/wiki/Telephone_numbers_in_Singapore#Numbering_plan
    // y means 0 to 8 only
    // x means 0 to 9
    public function testMobilePhoneNumberStartWith9Returns9yxxxxxx()
    {
        $this->assertRegExp('/^(\+65|65)?\s*9\s*[0-8]{3}\s*\d{4}$/', $this->faker->phoneNumber());
    }

    // http://en.wikipedia.org/wiki/Telephone_numbers_in_Singapore#Numbering_plan
    // z means 1 to 9 only
    // x means 0 to 9
    public function testMobilePhoneNumberStartWith7Or8Returns7Or8zxxxxxx()
    {
        $this->assertRegExp('/^(\+65|65)?\s*[7-8]\s*[1-9]{3}\s*\d{4}$/', $this->faker->phoneNumber());
    }
}
