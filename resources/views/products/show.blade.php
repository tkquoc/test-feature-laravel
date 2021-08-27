@include('layouts.app')
<a href="/" class="btn btn-primary">Trang chủ</a>
<h1>Tên sản phẩm: {{ $product->name }}</h1>
<p>Mô tả: {{ $product->desc }}</p>
