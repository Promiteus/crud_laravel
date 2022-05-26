@extends('person.layout')
@section('content')
<div class="container" id="f_edit_create">
    <h2 style="margin-top: 12px;" class="text-center">Добавить человека</a></h2>
    <br>
    <form action="{{ route('persons.store') }}" method="POST" name="add_person">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Имя</strong>
                    <input type="text" name="firstName" class="form-control" placeholder="имя">
                    <span class="text-danger">{{ $errors->first('firstName') }}</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Фамилия</strong>
                    <input type="text" name="lastName" class="form-control" placeholder="фамилия">
                    <span class="text-danger">{{ $errors->first('lastName') }}</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Email</strong>
                    <input type="email" name="email" class="form-control" placeholder="email@domain.com">
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Возраст</strong>
                    <input type="number" name="age" class="form-control" placeholder="возраст">
                    <span class="text-danger">{{ $errors->first('age') }}</span>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Добавить</button>
            </div>
        </div>
    </form>
</div>

@endsection

