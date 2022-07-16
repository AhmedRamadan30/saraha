@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} - no of visits = {{ $visits }}</div>

                <div class="card-body">
                    @forelse($messages as $message)
                        <p>{{ $message->text }}</p>
                        <hr>
                    @empty
                        <p>no message</p>
                    @endforelse

                </div>
                {{ $messages->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
