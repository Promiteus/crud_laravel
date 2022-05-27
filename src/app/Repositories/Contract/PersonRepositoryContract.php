<?php

namespace App\Repositories\Contract;

use App\Person;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface PersonRepositoryContract
 * @package App\Crud\PersonRepository\Contract
 */
interface PersonRepositoryContract
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
     * @return bool
     */
    public function update($id, array $data): bool;

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
