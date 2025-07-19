<h1> Student Dashboard </h1>

 <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();this.closest('form').submit();">Logout</a>
                    </form>