@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
               @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @canImpersonate($user->id)
                            <form method="POST" action="{{ route('impersonations.store') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <button class="btn btn-info btn-xs">Personificar</button>
                            </form>
                        @endcanImpersonate
                    </td>
                </tr>
               @endforeach
            </tbody>
        </table>
        
    </div>
</div>

@endsection
