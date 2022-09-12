@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span class="ms-auto mt-2 text-muted fw-bold"> أضف جلسة</span>
                    </div>

                    <div class="card-body">

                        @if (session('success'))
                            <div class="alert alert-success fw-bold" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('info'))
                            <div class="alert alert-info fw-bold" role="alert">
                                {{ session('info') }}
                            </div>
                        @endif

                        <form action="{{ route('store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <label for="session_id" class="fw-bold mb-2">نوع الجسلة</label>
                                    <select class="form-control" name="session_id" id="session_id">
                                        <option disabled selected>اختر نوع الجلسة</option>
                                        @foreach ($sessions as $session)
                                            <option value="{{ $session->id }}">{{ $session->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('session_id')
                                        <span class="text text-danger mb-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="start_date" class="fw-bold mb-2">بداية الجسلة</label>
                                        <input type="datetime-local" name="start_date" class="form-control"
                                            value="{{ old('start_date') }}" id="start_date" />
                                        @error('start_date')
                                            <span class="text text-danger mb-2">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="end_date" class="fw-bold mb-2">نهاية الجلسة</label>
                                        <input type="datetime-local" name="end_date" class="form-control"
                                            value="{{ old('end_date') }}" id="end_date" />
                                        @error('end_date')
                                            <span class="text text-danger mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="mt-3 btn btn-primary">أضف جلسة</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
