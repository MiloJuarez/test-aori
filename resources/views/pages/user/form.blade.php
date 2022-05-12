<div>
    @if ($user)
        <input type="hidden" name="identifier" value="{{ $user->id }}">
    @endif
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="User name"
            value="{{ $user->nombre ?? '' }}">
    </div>

    <div class="mb-3">
        <label for="lastname" class="form-label">Name</label>
        <input type="text" name="lastname" id="lastname" class="form-control" placeholder="User name"
            value="{{ $user->apellido ?? '' }}">
    </div>

    <div class="mb-3">
        <label for="age" class="form-label">Name</label>
        <input type="number" name="age" id="age" class="form-control" placeholder="User name"
            value="{{ $user->edad ?? '' }}">
    </div>
</div>
