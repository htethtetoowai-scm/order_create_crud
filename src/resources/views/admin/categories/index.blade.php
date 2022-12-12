@extends('admin.app')

@section('title', 'Categories')

@section('content')

<div class="app-page-title mb-2">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="fas fa-stream icon-gradient bg-mean-fruit"></i>
      </div>
      <div>Categories</div>
    </div>
  </div>
</div>
<div class="mb-1">
  <a href="{{route('categories.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add new category</a>
</div>
<div class="card">
  <div class="card-body">
    <table class="table table-bordered" id="categories-table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Title</th>
          <th>Description</th>
          <th>Created At</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $cateogry)
          <tr>
            <th scope="row">{{$cateogry->id}}</th>
            <td><a href="{{route('categories.show', [$cateogry->id])}}">{{$cateogry->title}}</a></td>
            <td>{{$cateogry->description}}</td>
            <td>{{$cateogry->created_at->format('Y-m-d')}}</td>
            <td>
              <a href="{{route('categories.edit', [$cateogry->id])}}" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></a>
              <a href="javascript:void(0)" class="delete-btn btn btn-outline-danger btn-sm" data-id="{{ $cateogry->id }}"><i class="fas fa-trash"></i></a>
            </td>
            <form action="{{ route('categories.destroy', [$cateogry->id]) }}" method="POST" id="del-form{{ $cateogry->id }}">
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
