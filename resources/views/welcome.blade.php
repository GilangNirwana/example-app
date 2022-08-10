
<!DOCTYPE html>
<html>
<head>
    <title>...</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            /*background: #555;*/
        }

        .content {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 10px;
        }
    </style>
</head>
<body>

<div class="content">
    <form action="{{route('yes')}}" method="post">
        @csrf
        {!! NoCaptcha::renderJs() !!}
        {!! NoCaptcha::display() !!}
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @if ($errors->has('g-recaptcha-response'))
        <span class="help-block">
        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
    </span>
    @endif
</div>

</body>
</html>






