<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <a  class="btn" id="menu-toggle"> + </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{Sentinel::check() ? Sentinel::getUser()->first_name : ''}}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a href="#" class="dropdown-item"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                 Sign out
             </a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
             </form>
            </div>
            </li>
        </ul>
    </div>
</nav>
