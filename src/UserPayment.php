<?php


namespace Kl;


class UserPayment extends Model
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var int
     */
    public $userId;

    /**
     * @var string
     */
    public $type;

    /**
     * @var float
     */
    public $balanceBefore;

    /**
     * @var string
     */
    public $amount;

    /**
     * UserPayment constructor.
     * @param $userId
     * @param $type
     * @param $balanceBefore
     * @param $amount
     * @param $id
     */
    public function __construct($userId, $type, $balanceBefore, $amount, $id = null)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->type = $type;
        $this->balanceBefore = $balanceBefore;
        $this->amount = $amount;
    }

}
