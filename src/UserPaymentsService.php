<?php


namespace Kl;


class UserPaymentsService
{
    /**
     * @var UserPaymentDbTable
     */
    private $userPaymentsDbTable;

    /**
     * @var UserDbTable
     */
    private $userDbTable;

    /**
     * @return TableModel|UserPaymentDbTable
     */
    public function getUserPaymentsDbTable()
    {
        return $this->userPaymentsDbTable ?: UserPaymentDbTable::getInstance();
    }

    /**
     * @return TableModel|UserDbTable
     */
    public function getUserDbTable()
    {
        return $this->userDbTable ?: UserDbTable::getInstance();
    }

    public function changeBalance(User $user, $amount)
    {
        $userDbTable = $this->getUserDbTable();
        $userPaymentsDbTable = $this->getUserPaymentsDbTable();

        $paymentType = $amount >= 0 ? 'in' : 'out';
        $payment = new UserPayment($user->id, $paymentType, $user->balance, abs($amount));

        // add payment transaction
        try {
            $userPaymentsDbTable->add($payment);
            $user->changeBalance($amount);
            $userDbTable->updateUser($user->toArray());
        } catch (\ErrorException $e) {
            $msg = sprintf('Failed to pop up user balance');
            error_log($msg);
            throw new \Exception($msg);
        }

        return $user->sendEmail();
    }
}
