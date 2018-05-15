<?php
/**
 * Created by PhpStorm.
 * User: laurentbeauvisage
 * Date: 07/05/2018
 * Time: 14:07
 */

namespace App;


class DonationFee
{

    private $donation;
    private $commissionPercentage;


    public function __construct($donation, $commissionPercentage)
    {
        if($commissionPercentage < 0 || $commissionPercentage >30) {
            throw new \Exception("la valeur doit être compris entre 0 et 30");
        }
        $this->donation = $donation;
        $this->commissionPercentage = $commissionPercentage;

    }

    public function getCommissionAmount()
    {
        $commission = ($this->donation/100) * $this->commissionPercentage;
        return $commission;
    }
    public function getAmountCollected()
    {
      $amount = ($this->donation) - $this->getCommissionAmount();
      return $amount;
    }

}
