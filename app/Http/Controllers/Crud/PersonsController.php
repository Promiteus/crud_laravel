<?php

namespace App\Http\Controllers\Crud;

use App\Crud\PersonRepository\Contract\CrudPersonContract;
use App\Crud\PersonRepository\PersonsRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Crud\PersonRequest;


/**
 * Class PersonsController
 * @package App\Http\Controllers\Crud
 */
class PersonsController extends Controller
{
    /**
     * @var CrudPersonContract
     */
    private CrudPersonContract $repository;

    /**
     * PersonsController constructor.
     * @param PersonsRepository $repository
     */
    public function __construct(PersonsRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('person.list', ['persons' => $this->repository->getAll()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('person.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PersonRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonRequest $request)
    {
        $this->repository->create($request->all());
        return redirect()->to('persons')->with('success','Человек добавлен!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('person.edit', ['person_data' => $this->repository->find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PersonRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PersonRequest $request, $id)
    {
        $this->repository->update($id, $request->all());
        return redirect()->to("persons")->with('success','Параметры описания изменены!');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $this->repository->delete($id);
        return redirect()->to('persons')->with('success','Человек был удален');
    }
}
