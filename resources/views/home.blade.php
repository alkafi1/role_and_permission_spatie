@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success">
                    <h3 class="text-white">Nextive Dashboard</h3>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <h4>Thank You For Login <span class="text-success">{{Auth::user()->name}}</span> </h4> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
