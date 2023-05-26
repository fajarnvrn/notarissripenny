<!--awal MENU NAVBAR-->
<div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/home">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/pt">PT</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/waris">Waris</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/cv">CV</a>
                </li>

                <li class="nav-item"> 
                    <a class="nav-link" href="/tanah">Tanah</a> 
                </li>

                <li style="right">
                <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Logout</button>
                </form>
                </li>
            </ul>
        </div>
    </nav>
    
<!--akhir MENU -->