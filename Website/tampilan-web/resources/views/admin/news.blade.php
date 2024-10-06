<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Berita - Admin</title>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            color: #333;
        }

        header {
            background-color: #333;
            padding: 20px;
            color: white;
            text-align: center;
        }

        h1 {
            margin: 0;
        }

        .container {
            margin: 20px auto;
            max-width: 1200px;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: center;
        }

        .btn {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 10px;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-warning {
            background-color: #ffc107;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .actions {
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
    <header>
        <h1>Manage Berita</h1>
    </header>

    <div class="container">
        <a href="{{ route('admin.news.create') }}" class="btn">Tambah Berita Baru</a>
        
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Konten</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($news as $index => $berita)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $berita->title }}</td>
                    <td>{{ Str::limit($berita->content, 100) }}</td>
                    <td class="actions">
                        <a href="{{ route('admin.news.edit', $berita->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.news.destroy', $berita->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
