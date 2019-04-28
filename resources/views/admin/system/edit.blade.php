@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">编辑系统版本</div>
                    <div class="panel-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>编辑失败</strong> 输入不符合要求<br><br>
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif
                        <form class="form-horizontal" role="form" action="{{ url('admin/system/update') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$version->id}}">
                            <div class="form-group">
                                <label for="branch" class="col-sm-2 control-label">客户版本:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="branch" class="form-control" required="required" readonly unselectable="on" value="{{$version->branch}}">
                                </div>
                            </div>
                            <br/>
                            <div class="form-group">
                                <label for="version" class="col-sm-2 control-label">版&nbsp;&nbsp;本&nbsp;&nbsp;号:</label>
                                <div class="col-sm-10">
                                    <input type="number" name="version" class="form-control" required="required" value="{{$version->version}}"></input>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-lg btn-info">更新版本</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection