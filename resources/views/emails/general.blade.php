<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>{{ $subjectText }}</title>
</head>

<body>
    <p>{{ $bodyText }}</p>

    @if (!empty($customData))
        <ul>
            @foreach ($customData as $key => $value)
                <li><strong>{{ ucfirst($key) }}:</strong> {{ $value }}</li>
            @endforeach
        </ul>
    @endif
</body>

</html>
