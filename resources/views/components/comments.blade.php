@props(['comments'])

<div class="container mt-4">
    <h5>All comments</h5>
    <div class="table-responsive">
        <table class="table table-bordered table-hover mb-0">
            <thead class="bg-secondary text-dark">
                <tr>
                    <th>Name</th>
                    <th>Comments</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comments as $user_comm)
                <tr>
                    <td>{{ $user_comm->user->name }}</td>
                    <td>{{ $user_comm->comment }}</td>
                    <td>
                        <a href="comments/{{ $user_comm->id }}" class="btn btn-danger btn-sm">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
