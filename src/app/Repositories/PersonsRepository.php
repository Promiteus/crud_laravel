<?php

namespace App\Repositories;


use App\Person;
use App\Repositories\Contract\PersonRepositoryContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PersonsRepository
 * @package App\Crud\PersonRepository
 */
class PersonsRepository implements PersonRepositoryContract
{
    /**
     * @var Person
     */
    private Person $model;

    /**
     * PersonsRepository constructor.
     * @param Person $model
     */
    public function __construct(Person $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $data
     */
    final public function create(array $data): void
    {
        $data[Person::USER_ID] = auth()->id();
        $this->model->newQuery()->create($data);
    }

    /**
     * @return Collection
     */
    final public function getAll(): Collection
    {
        $userId = auth()->id();
        return $this->model
                ->newQuery()
                ->where(Person::USER_ID, '=', $userId)
                ->orderBy(Person::ID, 'desc')->get();
    }

    /**
     * @param int $id
     * @param array $data
     * @return bool
     */
    final public function update(int $id, array $data): bool
    {
       $person = $this->find($id);
       if ($person) {
          return $person->update($data);
       }
       return false;
    }

    /**
     * @param int $id
     * @return bool
     * @throws \Exception
     */
    final public function delete(int $id): bool
    {
       $person = $this->find($id);
        if ($person) {
            return $person->delete();
        }
        return false;
    }

    /**
     * @param int $id
     * @return Model
     */
    final public function find(int $id): Model
    {
       return $this->model->newQuery()->find($id);
    }
}
