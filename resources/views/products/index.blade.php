@include('layouts.app')

<div class="container">
    <a href="{{ route('home') }}" class="btn btn-primary">Trang chủ</a>
    <a href="{{ route('create') }}" class="btn btn-primary">Thêm sản phẩm</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Giá</th>
            <th scope="col">Loại</th>
            <th scope="col">Hành động</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
          <tr>
            <th scope="row">{{ $product->id }}</th>
            <td>
                <a href="{{ route('show', $product->id) }}">{{ $product->name }}</a>
            </td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->type }}</td>
            <td class="d-flex">
                <a class="btn btn-primary" href="{{ route('edit', $product->id) }}">Sửa</a>
                <form action="{{ route('delete', $product->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
      </table>
      {{-- {{ $products->links() }} --}}
</div>

<style>
    a, a:visited {
        color: #333;
        text-decoration: none;
    }
</style>
