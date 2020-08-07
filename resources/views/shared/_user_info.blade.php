<div class="row">
  <div class="col-md-3">
    <a href="{{ route('users.show', $user->id) }}" class="w-100">
      <img src="{{asset($user->photo)}}" alt="{{ $user->name }}" class="img-fluid" />
    </a>
  </div>
  <div class="col-md-9">
    <ul class="list-group text-left info-list">
      <li class="list-group-item list-group-item-action">
        <i class="fa fa-id-card-o fa-fw"></i>
        &nbsp;&nbsp;Name: {{ $user->name }}
      </li>
      <li class="list-group-item list-group-item-action">
        <i class="fa fa-id-card-o fa-fw"></i>
        &nbsp;&nbsp;Address: {{ $user->address }}
      </li>
      <li class="list-group-item list-group-item-action">
        <i class="fa fa-envelope-o fa-fw"></i>
        &nbsp;&nbsp;Email: {{ $user->email }}
      </li>
      <li class="list-group-item list-group-item-action">
        <i class="fa fa-phone fa-fw"></i>
        &nbsp;&nbsp;Phone: {{ $user->phone }}
      </li>
    </ul>
  </div>
</div>
