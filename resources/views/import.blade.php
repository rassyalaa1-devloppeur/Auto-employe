<!DOCTYPE html>
<html>
<head>
    <title>Import Excel</title>
</head>
<body>

    <h2>Import Employés Excel</h2>

    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    @if($errors->any())
        <ul style="color:red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

   <form action="{{ secure_url('/import') }}" method="POST" enctype="multipart/form-data" class="import-row">
        @csrf

        <label>Choisir fichier Excel :</label>
        <input type="file" name="file" required>

        <button type="submit">Importer</button>
    </form>

</body>
</html>
