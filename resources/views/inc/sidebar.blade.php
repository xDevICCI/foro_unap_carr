

<ul class="list-group">
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="{{ route('home') }}" >Dashboard</a>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="{{ route('forum') }}" >Forum</a>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="{{ route('my_profile') }}" >My profile</a>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <a  href="#" data-toggle="collapse" data-target="#collapseOne" aria-controls="collapseOne" aria-expanded="false">Users</a>
        <span class="badge badge-success badge-pill">{{ App\User::all()->count() }}</span>

    </li>
    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="{{ route('new_user_create') }}" >New User</a>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="{{ route('show_all_users') }}">all users</a>
        </li>
    </div>
    <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="{{ route('create_channel') }}">Channels</a>
    <span class="badge badge-danger badge-pill">{{ App\Channel::all()->count() }}</span>
    </li>

    <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="#"  data-toggle="collapse" data-target="#collapse2" aria-controls="collapse2" aria-expanded="false">Threads</a>
        <span class="badge badge-info badge-pill">{{ App\Thread::all()->count() }}</span>
    </li>
    <div id="collapse2" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="{{ route('create_thread') }}">New Thread</a>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="{{ route('show_all_threads') }}">all Threads</a>
        </li>
    </div>





</ul>








</ul>
