@props(['news'])
<h2>Listing all subs</h2>
              
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($news as $sub)
      <tr>
        <td>{{ $sub->name }}</td>
        <td>{{ $sub->email }}</td>
        <td>
           
          <a href="subs/{{ $sub->id }}"><span class="glyphicon glyphicon-remove"></span></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>