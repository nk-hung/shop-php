@extends('admin.main')

@section('content')

<form action="" method="POST">
    <div class="card-body">
        <!-- name -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Danh Mục</label>
            <div class="col-sm-10">
                <input type="text" value="{{ $menu->name }}" name="name" class="form-control">
            </div>
        </div>
        <!-- parent_id -->
        <div class="form-group row">
            <label for="parent_id" class="col-sm-2 col-form-label">Tên Danh Mục</label>
            <div class="col-sm-10">
                <select name="parent_id" class="form-control">
                    <option value="0" {{ $menu->parent_id == 0 ? 'selected':''}} >--Danh Mục Cha--</option>
                    @foreach($menus as $menu_parent)
                    <option 
                      value="{{ $menu_parent->id }}"  
                      {{ $menu->parent_id == $menu_parent->id ? "selected " :"" }}  
                      {{ $menu_parent->id == $menu->id ? "disabled" : '' }}
                    >
                      {{$menu_parent->name}}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- description -->
        <div class="form-group row">
            <label class="col-sm-2">Mô tả</label>
            <div class="col-sm-10">
                <textarea name="description" class="form-control">{{ $menu->description }}</textarea>
            </div>`
        </div>
        <!-- content -->
        <div class="form-group row">
            <label class="col-sm-2">Mô tả chi tiết</label>
            <div class="col-sm-10">
                <textarea name="content" id="myeditorinstance" class="form-control">{{ $menu->content }}</textarea>
            </div>
        </div>
        <!-- active -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Kích Hoạt</label>
            <div class="col-sm-10 d-flex align-items-center">

                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active" {{ $menu->active == 1 ? "checked": ""}}>
                    <label for="active" class="custom-control-label">Yes</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="unactive" name="active" {{ $menu->active == 0 ? "checked": ""}}>
                    <label for="unactive" class="custom-control-label">No</label>
                </div>
            </div>
           </div>
    </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-info">Cập nhật</button>
    </div>
    <!-- /.card-footer -->
    @csrf
</form>
@endsection