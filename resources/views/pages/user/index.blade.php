@extends('app')
@section('content')
    <div>
        <div class="d-flex justify-content-end">
            <a href="{{ route('users.create') }}" class="btn btn-success">Register</a>
        </div>
        <div class="container-md">
            <table class="table table-striped table-inverse table-responsive text-white">
                <thead class="thead-inverse">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Lastname</th>
                        <th>Age</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                    @endphp
                    @foreach ($users as $user)
                        <tr class="text-white bg-secondary">
                            <td scope="row">{{ $count }}</td>
                            <td>{{ $user->nombre }}</td>
                            <td>{{ $user->apellido }}</td>
                            <td>{{ $user->edad }}</td>
                            <td>
                                <a href="{{ route('users.edit', $user) }}" class="btn btn-secondary bg-dark"
                                    title="Edit user">Edit</a>
                                <button type="button" class="btn btn-danger btnDelete" title="Delete user"
                                    data-bs-toggle="modal" data-bs-target="#modelId" data-identifier="{{ $user->id }}">
                                    Delete
                                </button>
                            </td>
                        </tr>
                        @php
                            $count++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
            @if (count($users) == 0)
                <div class="d-flex justify-content-center">
                    <h4 class="fs-4 fst-italic fw-light text-white">No users found.</h4>
                </div>
            @endif
        </div>
    </div>
    @include('components.confirmDelete')
@endsection
@section('scripts')
    <script src="{{ asset('/js/index.js') }}" type="module"></script>
@endsection
