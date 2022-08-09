<div>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif
    <table class="table dark:text-white table-bordered text-center text-white" >
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Posts Count</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $index => $user)
                <tr>
                    <td>
                        @if($editing_user == $user->id)
                            <input wire:model="temp_user.name">
                        @else
                            {{$user->name}}
                        @endif
                    </td>
                    <td>
                        @if($editing_user == $user->id)
                            <input wire:model="temp_user.email">
                        @else
                            {{$user->email}}
                        @endif
                    </td>
                    <td>
                        @if($editing_user == $user->id)
                            <select wire:model="temp_user.is_active">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        @else
                            {{$user->is_active ? "Active" : "Inactive"}}
                        @endif
                    </td>
                    <td>{{$user->posts()->count()}}</td>
                    <td>

                        @if($editing_user == $user->id)
                            <button wire:key="save-{{$user->id}}" wire:click="save({{$user->id}})" type="button" class="btn btn-success btn-sm" >
                                Save
                            </button>
                            <button wire:key="cancel-{{$user->id}}" wire:click="$set('editing_user',null)" type="button" class="btn btn-secondary btn-sm" >
                                Cancel
                            </button>
                        @else
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{$user->id}}">
                                Delete
                            </button>
                            <div class="modal fade" id="deleteModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-dark" id="exampleModalLabel">Delete User {{$user->name}}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-dark">
                                            <h1> Are you sure ? </h1>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-success" wire:click="deleteUser({{$user->id}})" data-bs-dismiss="modal">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button wire:click="$set('editing_user',{{$user->id}})" type="button" class="btn btn-primary btn-sm" >
                                Edit
                            </button>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No Users Found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <br>
    <div>
        {!! $users->links() !!}
    </div>
</div>
