<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand nav-text" href="#!">BATOI-INDUSTRIES</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                @foreach(config('menu') as $group)
                    @php $nameLink = key($group);$link = $group[$nameLink]; @endphp
                    @if(!is_array($link))
                        <li class="nav-item"><a class="nav-link active nav-text" aria-current="page" href="{{$link}}">{{$nameLink}}</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle nav-text" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Denuncias</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($link as $subName => $subLink)
                                    <li><a class="dropdown-item" href="{{$subLink}}">{{$subName}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach
            </ul>
            <form class="d-flex">
                <a href="{{url('/logout')}}">
                <button class="btn btn-outline-light" type="submit" >
                    Exit
                </button>
                </a>
            </form>
        </div>
    </div>
</nav>
