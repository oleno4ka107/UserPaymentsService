<?php


namespace Kl;


class UserPaymentDbTable extends TableModel
{
    private $storage = [];

    public function add(UserPayment $payment)
    {
        $paymentData = $payment->toArray();
        if (empty($paymentData['id'])) {
            $paymentData['id'] = count($this->storage) + 1;
        }

        $this->storage[] = $paymentData;

        return true;
    }
}
