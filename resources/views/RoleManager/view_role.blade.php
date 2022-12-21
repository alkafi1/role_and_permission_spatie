@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-8 m-auto">
        <div class="card">
            <div class="card-header bg-success">
                <h3 class="text-white">User And Role</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <thead>
                            <th>Sl</th>
                            <th>User Name</th>
                            <th>Role Name</th>
                            <th>Permission</th>
                        </thead>
                    </tr>
                @forelse ($users as $sl=>$user )
                    <tr>
                        <td>{{$sl+1}}</td>
                        <td>{{$user->name}}</td>
                        <td>
                            <ul>
                                @foreach ($user->getRoleNames() as $role )
                                <li>{{$role}}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <ul>
                                @foreach ($user->getAllPermissions() as $permission )
                                <li>{{$permission->name}}</li>
                                @endforeach
                            </ul>
                        </td>
                        
                    </tr>
                @empty
                        <tr>
                            <td colspan="6" class="text-center text-bold">No Product Yet!!!</td>
                        </tr>
                @endforelse
                </table>
            </div>
        </div>
    </div>
</div>
    
@endsection