

<ul class="list-group">
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="{{ route('my_profile') }}" >My profile</a>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <a  data-toggle="collapse" data-target="#collapseOne" aria-controls="collapseOne" aria-expanded="false">Users</a>
    </li>
    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="{{ route('new_user_create') }}" >New User</a>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="{{ route('show_all_users') }}">all users</a>
            <span class="badge badge-success badge-pill">{{ App\User::all()->count() }}</span>
        </li>
    </div>
    <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="{{ route('create_channel') }}">Channels</a>
    <span class="badge badge-danger badge-pill">{{ App\Channel::all()->count() }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        Threads
        <span class="badge badge-warning badge-pill">2</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        Replies
        <span class="badge badge-warning badge-pill">5</span>
    </li>



</ul>








</ul>
