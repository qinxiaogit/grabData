@extends('layouts.app')

@section('content')
{{--<div class="row">--}}
    {{--<div class="col-lg-3"></div>--}}
    {{--<div class="col-md-12">支持逗号分隔多关键字</div>--}}
    {{--<div class="col-lg-3"></div>--}}
{{--</div>--}}
<div class="row">
    <div class="col-lg-12">
        <div class="input-group">
            <input type="text" class="form-control h50" id="baidu" placeholder="关键字...">
            <div class="input-group-btn">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                </ul>
            </div>
            <!-- /btn-group -->
        </div>
    </div>
</div>
@endsection