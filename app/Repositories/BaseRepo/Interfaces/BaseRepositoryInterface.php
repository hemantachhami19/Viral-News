<?php
/**
 * Created by PhpStorm.
 * User: alight
 * Date: 9/25/18
 * Time: 7:13 AM
 */

namespace App\Repositories\BaseRepo\Interfaces;


interface BaseRepositoryInterface
{
    public function create(array $attributes);

    public function update(array $attributes) : bool;

    public function all($columns = array('*'), string $orderBy = 'id', string $sortBy = 'asc');

    public function find($id);

    public function findOneOrFail($id);

    public function findBy(array $data);

    public function findOneBy(array $data);

    public function findOneByOrFail(array $data);

    public function delete() : bool;

    public function paginateArrayResults(array $data, int $perPage = 50);

}