<?php

namespace CoreBundle\Service\Repository;

/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 16/03/2018
 * Time: 12:00
 */
Interface AbstractRepository {
    public function add($form);
    public function edit($from);
    public function delete($form);
    public function getAll($value);
}