@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                @if(\Illuminate\Support\Facades\Auth::id() == $user->id)
                    <div class="card-header">You cannot send to yourself</div>
                @else
                    <div class="card-header">Message to : {{ $user->name }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('message.store', $user->id) }}">
                            @csrf
                            <div class="form-group">
                                <textarea class="form-control" cols="30" rows="10" name="text" placeholder="اكتب لصديقك ما تريد هنا" required=""></textarea>
                            </div>

                            <button class="btn btn-primary">إرسال</button>
                        </form>
                    </div>
                @endif



            </div>
        </div>
    </div>
</div>
@endsection
