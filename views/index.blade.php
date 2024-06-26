<!Doctype html>
<html>

<head>
  <title>{{ $name }}</title>
</head>

<body>
  <div class="container">{{ $name }}</div>
  <form method="POST" action="/test" id="submit">
    <select id="appId" name="appId">
      @foreach($apps as $app)
        <option value="{{ $app[1] }}">{{ $app[0] }}</option>
      @endforeach
    </select>
    <textarea name="message" id="message"/></textarea>
    <button type="submit">Submit</button>
</form>
</body>

</html>
