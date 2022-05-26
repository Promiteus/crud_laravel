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
     * @return mixed|void
     */
    public function create(array $data)
    {
        $this->model->create($data);
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->model->orderBy('id', 'desc')->get() ?? Collection::make([]);
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed|void
     */
    public function update($id, array $data)
    {
        $this->model->newModelQuery()->find($id)->update($data);
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
