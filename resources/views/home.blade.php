<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home - Service 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-3">
        <h2>SERVICE 1</h2>
        <p>Send integer value to Service 2 via RabbitMQ:</p>
        <form action="{{ route('send.to.rabbitmq') }}" method="post">
            @csrf
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Enter Integer Value:</label>
                <input type="number" class="form-control" min="1" id="integer_value" name="integer_value">
            </div>
            <button type="submit" class="btn btn-primary">Send to Service 2</button>
        </form>
      </div>
</body>
</html>
