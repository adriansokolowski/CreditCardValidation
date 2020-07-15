<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
   
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
  <h1>Formularz</h1>
    <form method="POST" action="{{ route('subscriptions.index') }}">
      @csrf
      <div class="form-group">
        <label for="CardNumber">Numer karty</label>
        <input type="text" class="form-control @error('CardNumber') is-invalid @enderror" name="CardNumber" id="CardNumber" placeholder="CardNumber...">
        @error('CardNumber')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="CvvNumber">Kod CVV karty</label>
        <input type="text" class="form-control @error('CardNumber') is-invalid @enderror" name="CvvNumber" id="CvvNumber" placeholder="CvvNumber...">
        @error('CvvNumber')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="CardType">Typ karty</label>
        <select class="form-control" name="CardType" id="CardType">
          <option value="ms">MasterCard [MS]</option>
          <option value="vi">Visa [VI]</option>
          <option value="ae">AmericanExpress [AE]</option>
        </select>
    </div>
      <button type="submit" class="btn btn-primary">Subskrybuj</button>
</form>
</div>
</body>
</html>