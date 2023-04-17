
@extends('admin.main')

@section('content')
<form action="" method="POST">
    <div class="card-body">
        <!-- name -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Danh Mục</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control">
            </div>
        </div>
        <!-- parent_id -->
        <div class="form-group row">
            <label for="parent_id" class="col-sm-2 col-form-label">Tên Danh Mục</label>
            <div class="col-sm-10">
                {{-- <select name="parent_id" class="form-control">
                    <option value="0">--Danh Mục Cha--</option>
                    @foreach($menus as $menu)
                    <option value="{{ $menu->id }}">{{$menu->name}}</option>
                    @endforeach
                </select> --}}
            </div>
        </div>
        <!-- description -->
        <div class="form-group row">
            <label class="col-sm-2">Mô tả</label>
            <div class="col-sm-10">
                <textarea name="description" class="form-control"></textarea>
            </div>
        </div>
        <!-- content -->
        <div class="form-group row">
            <label class="col-sm-2">Mô tả</label>
            <div class="col-sm-10">
                <textarea name="content" id="myeditorinstance" class="form-control"></textarea>
            </div>
        </div>
        {{-- image --}}
       <div class="form-group row">
                    <!-- <label for="customFile">Custom File</label> -->
            <label class="col-sm-2">Ảnh</label>
            <div class="col-sm-10">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="uploadFile" name="uploadFile">
                    <label class="custom-file-label" for="uploadFile">Choose file</label>
                </div>
                <div id="show_image" class="mt-2">

                </div>
                <input type="hidden" name="file" id="file">
            </div>
        </div>
        <!-- active -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Kích Hoạt</label>
            <div class="col-sm-10 d-flex align-items-center">

                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked=''>
                    <label for="active" class="custom-control-label">Yes</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="unactive" name="active">
                    <label for="unactive" class="custom-control-label">No</label>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-info">Tạo Sản phẩm</button>
    </div>
    <!-- /.card-footer -->
    @csrf
</form>
@endsection