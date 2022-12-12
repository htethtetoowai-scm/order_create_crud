@extends('admin.app')

@section('title', 'Items')

@section('content')

<div class="app-page-title mb-2">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="fas fa-tags icon-gradient bg-mean-fruit"></i>
      </div>
      <div>Items</div>
    </div>
  </div>
</div>
<div class="row mb-1">
  <div>
    <a href="{{route('items.create')}}" class="btn btn-primary ml-3"><i class="fas fa-plus"></i> Add new prodcut</a>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <table class="table table-bordered" id="items-table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Category</th>
          <th>SubCategory</th>
          <th>Description</th>
          <th>Price</th>
          <th>Created At</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($items as $item)
          <tr>
            <th scope="row">{{$item->id}}</th>
            <td><a href="{{route('items.show', [$item->id])}}">{{$item->name}}</a></td>
            <td>{{$item->category->title}}</td>
            <td>{{$item->subCategory->title}}</td>
            <td>{{$item->description}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->created_at->format('Y-m-d')}}</td>
            <td>
              <a href="{{route('items.edit', [$item->id])}}" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></a>
              <a href="javascript:void(0)" class="delete-btn btn btn-outline-danger btn-sm" data-id="{{ $item->id }}"><i class="fas fa-trash"></i></a>
            </td>
            <form action="{{ route('items.destroy', [$item->id]) }}" method="POST" id="del-form{{ $item->id }}">
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
