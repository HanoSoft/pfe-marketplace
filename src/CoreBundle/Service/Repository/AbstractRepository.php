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
    public function edit($from,$id);
    public function delete($id);
    public function getAll($value);
    public function find($id);
}
