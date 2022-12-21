@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header bg-success">
                    <h3 class="text-white">Assign Role To User <span class="text-white">(create role)</span></h3>
                </div>
                <div class="card-body">
                    <form action="{{route('assign.role')}}" method="post">
                        @csrf
                        <div class="mt-2">
                            <label for="permission" class="form-label">User Name</label>
                            <select class="form-control" name="user_id" id="">
                                <option value="">-- Select User --</option>
                                @foreach ($users as $user )
                                    <option class="form-control" value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-3">
                            <label for="permission" class="form-label">Role Name</label>
                            <select class="form-control" name="role_id" id="">
                                <option value="">-- Select Role --</option>
                                @foreach ($roles as $role )
                                    <option class="form-control" value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-success mt-2">Create Role</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card mt-3">
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
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header bg-success">
                    <h3 class="text-white">Create Permission</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('permission.store')}}" method="post">
                        @csrf
                        <div class="mt-3">
                            <label for="name" class="form-label">Permission Name</label>
                            <input type="text" class="form-control" name="permission_name" id="name">
                            <div class="mt-2">
                                @error('name')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-success" type="submit">Create Permission</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header bg-success">
                    <h3 class="text-white">Create Role</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('role.store')}}" method="post">
                        @csrf
                        <div class="mt-3">
                            <label for="name" class="form-label">Role Name</label>
                            <input type="text" class="form-control" name="role_name" id="name">
                            <div class="mt-2">
                                @error('role_name')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="name" class="form-label">Role Name</label>
                            <br>
                            @foreach ($permissions as $permission )
                                <input type="checkbox" name="permission_name[]" value="{{$permission->id}}" id="name">  {{$permission->name}} <br>
                            @endforeach
                            <div class="mt-2">
                                @error('permission_name')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-success" type="submit">Create Role</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection