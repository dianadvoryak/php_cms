<?php

namespace Admin\Model\User;

use Engine\Model;

class UserRepository extends Model
{
    public function getUsers()
    {
        $sql = $this->queryBuilder->select()
            ->from('user')
            ->orderBy('id', 'DESC')
            ->sql();

        return $this->db->query($sql);
    }

    public function test()
    {
//        $user = new Page(2);
//        $user->setEmail('user@user.com');
//        $user->setPassword(md5(rand(1, 10)));
//        $user->setRole('user');
//        $user->setHash('new');
//        $user->save();
    }
}