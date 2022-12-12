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
  <a href="{{route('subCategories.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add new sub category</a>
</div>
<div class="card">
  <div class="card-body">
    <table class="table table-bordered" id="sub-categories-table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Title</th>
          <th>Description</th>
          <th>Category</th>
          <th>Created At</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($subCategories as $subCategory)
          <tr>
            <th scope="row">{{$subCategory->id}}</th>
            <td><a href="{{route('subCategories.show', [$subCategory->id])}}">{{$subCategory->title}}</a></td>
            <td>{{$subCategory->description}}</td>
            <td>{{$subCategory->category->title}}</td>
            <td>{{$subCategory->created_at->format('Y-m-d')}}</td>
            <td>
              <a href="{{route('subCategories.edit', [$subCategory->id])}}" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></a>
              <a href="javascript:void(0)" class="delete-btn btn btn-outline-danger btn-sm" data-id="{{ $subCategory->id }}"><i class="fas fa-trash"></i></a>
            </td>
            <form action="{{ route('subCategories.destroy', [$subCategory->id]) }}" method="POST" id="del-form{{ $subCategory->id }}">
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
