@extends('admin.main')

@section('content')
<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Active</th>
      <th>Update</th>
      <th style="width: 100px">Action</th>
    </tr>
  </thead>
  <tbody>
    {!!createMenu($menus)!!}
  </tbody>
</table>

@endsection