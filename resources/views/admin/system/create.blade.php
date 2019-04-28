@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">新增一篇文章</div>
                    <div class="panel-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>新增失败</strong> 输入不符合要求<br><br>
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" action="{{ url('admin/systems') }}" method="POST">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label for="branch" class="col-sm-2 control-label">客户版本:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="branch" class="form-control" required="required" value="">
                                </div>
                            </div>
                            <br/>
                            <div class="form-group">
                                <label for="version" class="col-sm-2 control-label">版&nbsp;&nbsp;本&nbsp;&nbsp;号:</label>
                                <div class="col-sm-10">
                                    <input type="number" name="version" class="form-control" required="required" value=""></input>
                                </div>
                            </div>
                            <button class="btn btn-lg btn-info">新增客户</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection