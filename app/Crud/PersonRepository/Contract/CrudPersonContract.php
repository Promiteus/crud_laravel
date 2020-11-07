<?php

namespace App\Crud\PersonRepository\Contract;


use App\Crud\Person;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface CrudPersonContract
 * @package App\Crud\PersonRepository\Contract
 */
interface CrudPersonContract
{
    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * @return Collection
     */
    public function getAll(): Collection ;

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data);

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * @param $id
     * @return Person
     */
    public function find($id): Person;
}
