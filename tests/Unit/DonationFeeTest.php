<?php

namespace Tests\Unit;
use App\DonationFee;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DonationFeeTest extends TestCase
{
    /**
     * Test de la commission prélevée par le site.
     *
     * @throws \Exception
     */
    public function testCommissionAmountGetter()
    {
        // Etant donné une donation de 100 et commission de 10%
        $donationFees = new DonationFee(100, 10);

        // Lorsqu'on appel la méthode getCommissionAmount()
        $actual = $donationFees->getCommissionAmount();

        // Alors la Valeur de la commission doit être de 10
       $expected = 100/100*10;
       $this->assertEquals($expected, $actual);
   }

   public function testAmountCollectedGetter()
   {
        // Etant donné qu'une commission est de 10%
        $donationFees = new DonationFee(100, 10);
        // Lorsqu'on appel la méthode getAmountCollected()
        $actual = $donationFees->getAmountCollected();
        // Alors la Valeur du montant perçu doit être de 40 (montant-commision-prix fixe)
        $expected = (100-10-50);
        $this->assertEquals($expected, $actual);
    }
   public function testCommissionPercentageException()
    {   //Etant donné un pourcentage de commission positif
        //lorqu'il y a une valeur de commission supérieur à 30%
        //Alors on retourne une exception
        $this->expectException(\Exception::class);
        $donationFees = new DonationFee(100, 40);

    }
    public function testDonationException()
    {
        //Etant donné une donation en entier positif
        //lorqu'il y a une valeur de donation (négatif/inférieur à 100 ou non entier)
        //Alors on retourne une exception
        $this->expectException(\Exception::class);
        $donationFees = new DonationFee(10, 15);

    }
    public function testFixedAndCommissionFeeAmountGetter()
    {
        // Etant donné une donation de 100 et commission de 10%
        $donationFees = new DonationFee(100, 10);

        // Lorsqu'on appel la méthode getFixedAndCommissionFeeAmount()
        $actual = $donationFees->getFixedAndCommissionFeeAmount();

        // Alors la Valeur de la commission doit être de 60
        $expected = (10+50);
        $this->assertEquals($expected, $actual);
    }
    public function testLimitFixedFeeAndCommissionAmountGetter()
    {
        // Etant donné une donation supérieur  ou égale à 4500
        $donationFees = new DonationFee(10000, 10);

        // Lorsqu'on appel la méthode getLimitFixedFeeAndCommissionAmount()
        $actual = $donationFees->getLimitFixedFeeAndCommissionAmount();

        // Alors la Valeur de la commission doit être de 500
        $expected = 500;
        $this->assertEquals($expected, $actual);
    }
    public function testArraySummary()
    {
        $donationFees = new DonationFee(10000, 10);

        $actual = $donationFees->getSummary();

        $this->assertArrayHasKey('donation',$actual);
        $this->assertEquals(10000, $actual['donation']);

        $this->assertArrayHasKey('fixedFee',$actual);
        $this->assertEquals(50, $actual['fixedFee']);

        $this->assertArrayHasKey('commission',$actual);
        $this->assertEquals(1000, $actual['commission']);

        $this->assertArrayHasKey('fixedAndCommission',$actual);
        $this->assertEquals(500, $actual['fixedAndCommission']);

        $this->assertArrayHasKey('amountCollected',$actual);
        $this->assertEquals(9500, $actual['amountCollected']);
    }

}





