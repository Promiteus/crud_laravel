<?php

namespace App\Repositories\Contract;

use App\Person;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

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
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update(int $id, array $data): bool;

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;

    /**
     * @param int $id
     * @return Model
     */
    public function find(int $id): Model;
}
