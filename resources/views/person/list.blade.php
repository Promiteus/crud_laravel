@extends('person.layout')
@section('content')
<div class="container">
    <h2>Все пользователи</h2>
    <a id="m_btn_icon" href="{{ route('persons.create') }}"><img src={{asset('images/add_person.png')}}></a>
    <br>
    <div class="row">
        <div class="col-12">
            <table class="table table-sm table-hover" id="laravel_crud">
                <thead class="thead-dark">
                <tr>
                    <th>id</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Почта (email)</th>
                    <th>Возраст</th>
                    <th>Создан</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($persons as $person)
                <tr>
                    <td>{{ $person->id }}</td>
                    <td>{{ $person->firstName }}</td>
                    <td>{{ $person->lastName }}</td>
                    <td>{{ $person->email }}</td>
                    <td>{{ $person->age }}</td>
                    <td>{{ date('Y-m-d', strtotime($person->created_at)) }}</td>
                    <td>
                        <a id="t_btn_icon" href="{{ route('persons.edit',$person->id)}}" ><img src={{asset('images/edit_icon.png')}}></a>
                    </td>
                    <td>
                        <form action="{{ route('persons.destroy', $person->id)}}" method="post">
                            {{ csrf_field() }}
                            @method('DELETE')
                            <button id="t_btn_del" type="submit"  type="submit"><img src={{asset('images/delete_icon.png')}}></button>
                        </form>


                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


