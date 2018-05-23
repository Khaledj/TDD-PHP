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
        if($donation < 100 || (!is_int($donation/100))) {
            throw new \Exception("la valeur doit être supérieur à 100");
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
      $amount = ($this->donation) - $this->getFixedAndCommissionFeeAmount();
      return $amount;
    }
    public function getFixedAndCommissionFeeAmount()
    {
        $commission = ($this->donation/100) * $this->commissionPercentage + Commission::fixedFee;
        return $commission;
    }
    public function getLimitFixedFeeAndCommissionAmount()
    {
        $commission = $this->getFixedAndCommissionFeeAmount() ;
        if($commission > 500) {
            $commission = 500;
        }
        return $commission;
    }
    public function getSummary()
    {
        $summary = array('donation'=>$this->donation,
                         'fixedFee'=>Commission::fixedFee,
                         'commission'=>$this->getCommissionAmount(),
                         'fixedAndCommission'=>$this->getFixedAndCommissionFeeAmount(),
                         'amountCollected'=> $this->donation - $this->getFixedAndCommissionFeeAmount());
            return $summary;
    }
}
