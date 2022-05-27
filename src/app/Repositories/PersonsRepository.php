<?php

namespace App\Repositories;


use App\Person;
use App\Repositories\Contract\PersonRepositoryContract;
use Illuminate\Database\Eloquent\Collection;

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
        return $this->model
                ->newQuery()
                ->orderBy(Person::ID, 'desc')->get();
    }

    /**
     * @param $id
     * @param array $data
     * @return bool
     */
    final public function update($id, array $data): bool
    {
       $person = $this->model->newQuery()->find($id);
       if ($person) {
          return $person->update($data);
       }
       return false;
    }

    /**
     * @param $id
     * @return mixed|void
     * @throws \Exception
     */
    public function delete($id)
    {
        $this->model->newModelQuery()->find($id)->delete();
    }

    /**
     * @param $id
     * @return Person
     */
    public function find($id): Person
    {
       return $this->model->newModelQuery()->find($id);
    }
}
