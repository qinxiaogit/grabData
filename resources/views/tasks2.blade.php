@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Task
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                @include('common.errors')

                <!-- New Task Form -->
                    <div class="form-horizontal">
                    {{ csrf_field() }}

                    <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Task</label>
                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control"
                                       value="{{ old('task') }}">
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button id="add" class="btn btn-default"><i class="fa fa-btn fa-plus"></i>Add Task
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Current Tasks -->
            @if (count($tasks) > 0)
                <div id="panel" class="panel panel-default" style="visibility:visible">
                    @else
                        <div id="panel" class="panel panel-default" style="visibility:hidden">
                            @endif
                            <div class="panel-heading">
                                Current Tasks
                            </div>

                            <div class="panel-body">
                                <table id="table" class="table table-striped task-table">
                                    <thead>
                                    <th>Task</th>
                                    <th>&nbsp;</th>
                                    </thead>
                                    <tbody>
                                    @foreach ($tasks as $task)
                                        <tr class="task{{$task->id}} task">
                                            <td class="table-text">
                                                <div>{{ $task->name }}</div>
                                            </td>

                                            <!-- Task Delete Button -->
                                            <td>
                                                <button class="btn btn-danger delete" data-id="{{ $task->id }}"><i
                                                            class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
        </div>
        <script>
            $(document).ready(function () {
                $('#add').click(function () {
                    $.ajax({
                        type: 'post',
                        url: '/todo2/task',
                        data: {
                            '_token': $('input[name=_token]').val(),
                            'name': $('#task-name').val()
                        },
                        success: function (data) {
                            $('#panel').css('visibility', 'visible');
                            $('#table').append('<tr class="task' + data.id + ' task"><td class="table-text"><div>' + data.name + '</div>' +
                                    '</td><td><button class="btn btn-danger delete" data-id="' + data.id + '"><i class="fa fa-btn fa-trash"></i>Delete</button></td></tr>');
                            $('#task-name').val('');
                        }
                    });
                });

                $(document).on('click', '.delete', function () {
                    var id = $(this).data('id');

                    $.ajax({
                        type: 'post',
                        url: '/todo2/task/' + id,
                        data: {
                            '_token': $('input[name=_token]').val(),
                        },
                        success: function (data) {
                            $('.task' + data.id).remove();

                            var length = $('.task').length;
                            if (length == 0) {
                                $('#panel').css('visibility', 'hidden');
                            }
                        }
                    });
                });
            });
        </script>
@endsection
