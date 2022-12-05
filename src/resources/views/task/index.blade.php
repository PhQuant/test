@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Создание задания</div>
                    @if(old('success'))
                        <h1 style="color: green">Вы успешно создали задачу</h1>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('create.task') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="topic" class="col-md-4 col-form-label text-md-end">Тема</label>
                                <div class="col-md-6">
                                    <input id="topic" type="text" class="form-control @error('topic') is-invalid @enderror" name="topic" required
                                        autofocus>
                                    @error('topic')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-end">Описание</label>
                                <div class="col-md-6">
                                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required></textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="file" class="col-md-4 col-form-label text-md-end">Файл</label>
                                <div class="col-md-6">
                                    <input id="file" type="file" class="form-control @error('file') is-invalid @enderror" name="file" required>
                                    @error('file')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="start" class="col-md-4 col-form-label text-md-end">Начало</label>
                                <div class="col-md-6">
                                    <input id="start" type="datetime-local" class="form-control @error('start') is-invalid @enderror" name="start"
                                        required>
                                    @error('start')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="end" class="col-md-4 col-form-label text-md-end">Конец</label>
                                <div class="col-md-6">
                                    <input id="end"  type="datetime-local" class="form-control @error('end') is-invalid @enderror" name="end"
                                        required>
                                    @error('end')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Создать
                                    </button>
                                    @error('many')
                                        <h1 style="color: red">Вы создали более 4 заданий в одном промежутке времени!</h1>
                                    @enderror
                                </div>
                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
