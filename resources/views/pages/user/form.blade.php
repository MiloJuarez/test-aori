<div class="text-white">
    @if (isset($user))
        <input type="hidden" name="identifier" value="{{ $user->id }}">
    @endif
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Eje. Jhon"
            value="{{ $user->nombre ?? '' }}">
    </div>

    <div class="mb-3">
        <label for="lastname" class="form-label">Lastname</label>
        <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Eje. Connor"
            value="{{ $user->apellido ?? '' }}">
    </div>

    <div class="mb-3">
        <label for="age" class="form-label">Age</label>
        <input type="number" name="age" id="age" class="form-control" placeholder="56"
            value="{{ $user->edad ?? '' }}">
    </div>
</div>
