@props(['users'])
<h5>All users</h5>
<table class="table table-bordered text-center mb-0" style="width: 300px;">
    <thead class="bg-secondary text-dark">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Profile</th>
            <th>Type</th>
            <th>Permits</th>
            <th>Choose permits</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody class="align-middle">
        @foreach($users as $user)
        <tr>
            
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @if($user->profile_photo_url)
                <img style="width: 80px; border-radius: 8px;" src="{{ $user->profile_photo_url }}" alt="">
                @endif
            </td>
            <td>
                @if($user->role_id == "1")
                <button type="button" class="btn btn-info">
                Admin
                </button>
                
                @elseif($user->role_id == "0")
                <button type="button" class="btn btn-primary">
                User
                </button>
                @endif
            </td>
            <td>
                @if($user->status=="0")
                    <button type="button" class="btn btn-success">Active</button>
                    @elseif($user->status=="1")
                    <button type="button" class="btn btn-danger">Deactive</button>
                @endif
            </td>
            <td>
                <form method="POST"
                    action="{{ url('users/all_users/'. $user->id) }}">
                    @csrf
                    
                    <input type="hidden" name="id">
                    <select name="status">
                        <option value="0">Active</option>
                        <option value="1">Deactive</option>
                    </select>
                    <input type="submit" name="submit" value="Choose!?">
                </form>
            </td>
            <td>
                <a href="edit/{{ $user->id }}"><span class="glyphicon glyphicon-pencil"></span></a> |
                <a href="create/{{ $user->id }}"><span class="glyphicon glyphicon-remove"></span></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>