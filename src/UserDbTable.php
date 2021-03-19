<?php


namespace Kl;


class UserDbTable  extends TableModel
{
    private $storage = [
        [
            'id' => 1,
            'email' => 'testuser1@test.com',
            'balance' => 120.45
        ],
        [
            'id' => 2,
            'email' => 'testuser2@test.com',
            'balance' => 9999.45
        ],
        [
            'id' => 3,
            'email' => 'testuser3@test.com',
            'balance' => 0.45
        ]
    ];

    public function updateUser($data)
    {
        try {
            $ids = array_column($this->storage, 'id');
                if (in_array($data['id'], $ids)) {
                    unset($data['id']);

                    $this->storage[$data['id']] = $data;
                    return true;
                }
        } catch (\ErrorException $e) {
            $msg = sprintf('User %s not found', $data['id']);

            error_log($msg);

            throw new \Exception($msg);
        }
    }
}
