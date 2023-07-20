@props(['users'])


<table class="table table-bordered text-center mb-0" style="width: 300px;">
 <thead class="bg-secondary text-dark">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Profile</th>
        <th>Type</th>
        <th>Permits</th>
        <th>Choose permits</th>
    </tr>
        </thead>
        <tbody class="align-middle">
           @foreach($users as $user)
            <tr>
            
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->address }}</td>
            <td>{{ $user->phone }}</td>
           
            <td><img class="img-fluid w-100" src="{{ asset('users_img/'.$user->profile) }}" alt="" style="width: 40px;"></td>
            <td>
            @if($user->type == 1)

                <button type="button" class="btn btn-info">
                    Admin
                </button>
                

                @elseif($user->type == 0)
                <button type="button" class="btn btn-danger">
                    User
                </button>

            @endif
            </td>
                <td>Permits</td>
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
            </tr>
            @endforeach
            </tbody>
        </table>
             