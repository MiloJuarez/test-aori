<nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
    <div class="container">
        <a class="navbar-brand" href="/">TEST CRUD</a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home <span class="visually-hidden">(current)</span></a>
                </li>
            </ul>
            @if (!isset($hideSF))
                <form class="my-2 my-lg-0">
                    <div class="d-flex">
                        <input class="form-control me-sm-2" type="text" placeholder="Search" name="search"
                            value="{{ $search }}">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </div>
                    <div class="mt-2">
                        @if (count($errors) > 0)
                            @foreach ($errors as $error)
                                <p class="text-danger mb-1"> {{ $error }}</p>
                            @endforeach
                        @endif
                    </div>
                </form>
            @endif
        </div>
    </div>
</nav>
