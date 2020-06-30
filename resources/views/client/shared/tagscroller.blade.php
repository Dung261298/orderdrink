<div class="nav-scroller bg-white box-shadow">
  <nav class="nav nav-underline">
    <a class="nav-link active" href="#">Tags</a>
    @foreach($tags as $data)
      <a class="nav-link" href="#">
      {{$data->name}}
    </a>
    @endforeach
  </nav>
</div>