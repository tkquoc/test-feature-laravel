@include('layouts.app')

<div class="container">
    <a href="{{ route('home') }}" class="btn btn-primary">Trang chủ</a>
    <form method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" name="name" />
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Giá</label>
            <input type="number" class="form-control" name="price" />
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Mô tả</label>
            <input type="text" class="form-control" name="desc" />
            @error('desc')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Loại</label>
            <input type="text" class="form-control" name="type" />
            @error('type')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
</div>
