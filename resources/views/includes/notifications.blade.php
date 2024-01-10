  <p>Total Notifications: {{ $totalNotifications }}</p>
  @forelse($notifications as $notification)

  @php
  $data = json_decode($notification->data);
  @endphp

  <div class="alert {{ $notification->read_at ? 'alert-read' : 'alert-success' }}" role="alert">
    <p>{{ $notification->created_at }}</p>

  
    <p><span style="color: black;font-weight: bolder;">{{
      $data->user_name ?? 'no mess'
      }}</span></p>
    <p lass="notification-text">
      
      
      {{
      $data->message ?? 'no mess'
      }}
      {{
      $data->order_id ?? 'no mess'
      }}
      
      
      @if($notification->read_at)
      <p style="color: black;font-weight: bolder;">{{ 'you read this' }}</p>
      @else
      <a href="{{ url('orders/notify/' . $notification->id)  }}" class="float-right mark-as-read">
        Mark as read
      </a>
      
      @endif
    </p>
  </div>
  @empty
  There are no new notifications
  @endforelse
  <style>
  .alert-read {
  background-color: gray;
  }
  .alert-read .notification-text {
  color: #777;
  }
  </style>