@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">腾实后台</div>

                    <div class="panel-body">

                        <a href="{{ url('admin/systems') }}" class="btn btn-lg btn-success col-xs-12">管理系统版本</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection