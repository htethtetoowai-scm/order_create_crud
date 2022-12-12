@extends('admin.app')

@section('title', 'Users')

@section('content')

<div class="app-page-title mb-2">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="fas fa-users-cog icon-gradient bg-mean-fruit"></i>
      </div>
      <div>Users</div>
    </div>
  </div>
</div>
<div class="mb-1">
  <a href="{{route('users.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add new user</a>
</div>
<div class="card">
  <div class="card-body">
    <table class="table table-bordered" id="users-table">
      <thead>
        <tr>
          <th>Id</th>
          <th>UserName</th>
          <th>Email</th>
          <th>Phone Number</th>
          <th>Address</th>
          <th>Activate Status</th>
          <th>Created At</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr>
            <th scope="row">{{$user->id}}</th>
            <td><a href="{{route('users.show', [$user->id])}}">{{$user->username}}</a></td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->address}}</td>
            <td>{{$user->status == 0 ? 'Deactivate' : 'Activate'}}</td>
            <td>{{$user->created_at->format('Y-m-d')}}</td>
            <td>
              <a href="{{route('users.edit', [$user->id])}}" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></a>
              <a href="javascript:void(0)" class="delete-btn btn btn-outline-danger btn-sm" data-id="{{ $user->id }}"><i class="fas fa-trash"></i></a>
            </td>
            <form action="{{ route('users.destroy', [$user->id]) }}" method="POST" id="del-form{{ $user->id }}">
              @csrf
              @method('DELETE')
            </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection

@section('script')
<script src="{{ asset('js/common.js') }}"></script>
@endsection
