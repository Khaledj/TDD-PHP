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
       $expected = 10;
       $this->assertEquals($expected, $actual);
   }

   public function testAmountCollectedGetter()
   {
        // Etant donné qu'une commission est de 10%
        $donationFees = new DonationFee(100, 10);
        // Lorsqu'on appel la méthode getAmountCollected()
        $actual = $donationFees->getAmountCollected();
        // Alors la Valeur du montant perçu doit être de 90
        $expected = 90;
        $this->assertEquals($expected, $actual);
    }
   public function testCommissionPercentageException()
    {
        $this->expectException(\Exception::class);
        $donationFees = new DonationFee(100, 40);
    }
    public function testDonationException()
    {
        //Etant donné une donation en entier positif
        //lorqu'il y a une valeur négatif ou inférieur à 100 ou non entier
        //Alors retourne une exception
        $this->expectException(\Exception::class);
        $donationFees = new DonationFee(200, 15);
    }
}





