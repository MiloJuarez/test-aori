@extends('app')
@section('content')
    <div>
        <div class="d-flex">
            <a href="{{ route('users.index') }}" class="btn btn-info">&lArr; Back to home</a>
        </div>
        <form method="post">
            <div id="errors" class="mt-2">
            </div>
            @include('pages.user.form')
            <div class="d-flex justify-content-end mt-4">
                <button class="btn btn-primary" id="btnRegister">Register</button>
            </div>
        </form>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('/js/scripts.js') }}" type="module"></script>
@endsection
