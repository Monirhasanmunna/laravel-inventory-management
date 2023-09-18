@extends('app')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12  animation">
        <div class="x_panel">
            <div class="x_title">
                <h2>Add Permissions<small>add permissions</small></h2>

                <div class="text-right">
                    <a href="{{route('userManagement.role.index')}}" class="btn btn-secondary"><i
                            class="fa-solid fa-arrow-left mr-2" style="font-size: 17px;"></i>Back</a>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <form action="{{route('userManagement.role.permission.store')}}" method="POST">
                    @csrf

                    <div class="card-body">
                        <div class="form-group mb-5">
                            <label style="color: #626262;" for="roles">Role Name :</label>
                            <input class="form-control" id="roles"  value="{{$role->name}}" readonly type="text">
                            <input class="form-control" name="role_id" value="{{$role->id}}"  type="hidden">
                        </div>

                        <div class="text-center mb-4"><strong>Manage Role Permission</strong></div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="select-all">
                            <label class="form-check-label" for="select-all">Select All</label>
                        </div>

                        <div class="row">
                            @foreach ($permissionGroups as $group)
                                <div class="col-3 mb-5">
                                    <h5 class="text-capitalize">Module : {{$group->group_name}}</h5>
                                    @php
                                    $permissions = App\Models\User::getPermissionByGroupName($group->group_name)
                                    @endphp
                                    @foreach ($permissions as $permission)
                                    <div class="mb-3 ml-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="permission-{{$permission->id}}"
                                                name="permission_ids[]" value="{{$permission->id}}"
                                                    @if(isset($role))
                                                        @foreach ($role->permissions as $rolePermissions)
                                                            {{$rolePermissions->id == $permission->id ? 'checked' : ''}}
                                                        @endforeach
                                                    @endif
                                                    >

                                            <label class="form-check-label"
                                                for="permission-{{$permission->id}}">{{$permission->name}}</label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>

                        {{-- @empty
                            <div class="row">
                                <div class="col">
                                    <strong>No Permission Found.</strong>
                                </div>
                            </div>
                        @endforelse --}}
                    </div>

                    <div class="mt-3 ml-4 mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>

    $('#select-all').click(function(event){

        if(this.checked) {
            $(':checkbox').each(function() {
                this.checked = true;
            });
        }else{
            $(':checkbox').each(function() {
                this.checked = false;
            });
        }

    });

</script>
@endpush