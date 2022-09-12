@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">

                        <span class="ms-auto mt-2 text-muted fw-bold">قائمة الجلسات</span>
                        <a href="{{ route('create') }}" class="btn btn-primary">أضف جلسة</a>

                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <th>#</th>
                                <th>الجلسة</th>
                                <th>بداية الجلسة</th>
                                <th>نهاية الجلسة</th>
                                <th>حالة الجلسة</th>
                            </thead>
                            <tbody>


                                @forelse ($reservations as $key=>$reservation)
                                    <tr>
                                        <td>{{ $key += 1 }}</td>
                                        <td>{{ $reservation->session->name }}</td>
                                        <td>{{ $reservation->start_date }}</td>
                                        <td>{{ $reservation->end_date }}</td>
                                        <td><span class="btn btn-sm

                                            @if ($reservation->status == 'pending')
                                                btn-primary
                                            @endif
                                            @if ($reservation->status == 'complete')
                                                btn-success
                                            @endif

                                            @if ($reservation->status == 'underway')
                                                btn-info
                                            @endif

                                            @if ($reservation->status == 'cancel')
                                                btn-danger
                                            @endif

                                            round">{{ $reservation->status }}</span></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">لا يوجد لديك اي جلسة</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
