<div class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Task App</span>
        
        @if (session()->get('loggedIn'))
            <a href="/signout" style="margin-right: 20px; width: auto;">Log Out</a>
        @endif
    </div>
</div>