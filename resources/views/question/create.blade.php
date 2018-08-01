@extends('layouts.app')
@section('content')
    @include('vendor.ueditor.assets')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">发布问题</div>

                    <div class="card-body">
                        <form method="post" action="/question">
                            {!! csrf_field() !!}

                            <div class="form-group">
                                <label for="title">标题</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="标题">
                            </div>
                            <div class="form-group">
                                <!-- 编辑器容器 -->
                                <script id="container" name="body" type="text/plain"></script>
                            </div>
                            <button type="submit" class="btn btn-success">发布问题</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container');
        ue.ready(function () {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
        });
    </script>



@endsection