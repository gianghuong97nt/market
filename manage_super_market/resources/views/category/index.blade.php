<html>
<head>
</head>
<body>
<table class="table">

</table>
</body>

@extends('layouts.glance')

@section('title')
    Quản trị danh mục sản phẩm
@endsection
@section('content')
    <div class="container">
        <h1>Quản trị danh mục sản phẩm</h1>
        <div style="margin: 20px 0">
            <a href="{{url('/category/create')}}" class="btn btn-success">Thêm danh mục</a>
        </div>

        <div class="tables">
            <div class="table-responsive bs-example widget-shadow">
                <h4>Tổng số :</h4>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tiêu đề</th>
                        <th>Trạng thái</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if ($articles) : ?>
                    <?php foreach ($articles as $article) : ?>
                    <tr>
                        <td><?php echo $article['employee_no'] ?></td>
                        <td><?php echo $article['employee_nm'] ?></td>
                        <td><?php echo $article['birthday'] ?></td>
                        <td></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
