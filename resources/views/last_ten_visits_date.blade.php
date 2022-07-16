@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} - no of visits = {{ $visit_numb }}</div>

                <div class="card-body">
                    @forelse($visits as $visit)
                        <p>{{ \Carbon\Carbon::make($visit->created_at)->diffForHumans() }}</p>
                        <hr>
                    @empty
                        <p>no visits</p>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
