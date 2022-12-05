@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card-body">
                <div class="card">
                    <h5 class="card-header">Задачи</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Название</th>
                                    <th>Описание</th>
                                    <th>Имя клиента</th>
                                    <th>Почта клиента</th>
                                    <th>Ссылка</th>
                                    <th>Дата создания</th>
                                    <th>Старт</th>
                                    <th>Завершение</th>
                                    <th>Сделанное</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                            <strong>{{ $task->id }}</strong></td>
                                        <td>{{ $task->topic }}</td>
                                        <td>{{ $task->description }}</td>
                                        <td>{{ $task->user->name }}</td>
                                        <td>{{ $task->user->email }}</td>
                                        <td><a href="{{ asset($task->file) }}" target="_BLANK">ТЫК</a></td>
                                        <td>{{ $task->created_at }}</td>
                                        <td>{{ $task->start }}</td>
                                        <td>{{ $task->end }}</td>
                                        <td>
                                            @if ($task->is_completed == 1)
                                                <a href="#" class="btn btn-success">Сделано</a>
                                            @else
                                                <a href="{{ Route('completed.task', ['task' => $task]) }}"
                                                    class="btn btn-primary">Выполнено</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>



                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <li class="page-item prev @if($tasks->currentPage() == 1) disabled @endif">
                                <a class="page-link" href="@if($tasks->currentPage() > 1) {{$tasks->previousPageUrl()}} @endif"><</a>
                            </li>
                            @for($i = $tasks->currentPage() - 5; $i < $tasks->currentPage() + 5; $i++)
                                @if($i > 0 && $i <= $tasks->lastPage())
                                    <li class="page-item">
                                        <a class="page-link @if($i == $tasks->currentPage()) active @endif" href="{{$tasks->url($i)}}">{{$i}}</a>
                                    </li>
                                @endif
                            @endfor

                            <li class="page-item next @if($tasks->currentPage() == $tasks->lastPage()) disabled @endif">
                                <a class="page-link" href="@if($tasks->currentPage() < $tasks->lastPage()) {{$tasks->nextPageUrl()}} @endif">></a>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
        </div>
    </div>
@endsection
