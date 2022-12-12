@extends('admin.app')

@section('title', 'Roles')

@section('content')

<div class="app-page-title mb-2">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="fas fa-stream icon-gradient bg-mean-fruit"></i>
      </div>
      <div>Roles</div>
    </div>
  </div>
</div>
<div class="mb-1">
  <a href="{{route('roles.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add new category</a>
</div>
<div class="card">
  <div class="card-body">
    <table class="table table-bordered" id="roles-table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Created At</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($roles as $role)
          <tr>
            <th scope="row">{{$role->id}}</th>
            <td><a href="{{route('roles.show', [$role->id])}}">{{$role->name}}</a></td>
            <td>{{$role->created_at->format('Y-m-d')}}</td>
            <td>
              <a href="{{route('roles.edit', [$role->id])}}" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></a>
              <a href="javascript:void(0)" class="delete-btn btn btn-outline-danger btn-sm" data-id="{{ $role->id }}"><i class="fas fa-trash"></i></a>
            </td>
            <form action="{{ route('roles.destroy', [$role->id]) }}" method="POST" id="del-form{{ $role->id }}">
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
