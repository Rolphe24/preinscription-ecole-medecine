<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background: linear-gradient(to right, #ffecd2, #fcb69f);
        }

        h1 {
            text-align: center;
            color: #333;
            text-shadow: 2px 2px #ccc;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
            background-color: #fff; /* Changer la couleur de fond de la table */
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        a, .btn {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            display: inline-block;
            padding: 6px 12px;
            margin-right: 5px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .btn-modifier {
            background-color: #3498db;
            border: 1px solid #2980b9;
        }

        .btn-register {
            background-color: #2ecc71;
            border: 1px solid #27ae60;
        }

        .btn-logout {
            background-color: #e74c3c;
            border: 1px solid #c0392b;
        }

        .btn-supprimer {
            background-color: #e67e22;
            border: 1px solid #d35400;
        }

        .btn:hover {
            opacity: 0.8;
        }

        .search-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .search-container input[type="text"] {
            padding: 6px;
            margin-right: 6px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .search-container input[type="submit"] {
            padding: 6px 12px;
            border: 1px solid #3498db;
            background-color: #3498db;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .search-container input[type="submit"]:hover {
            background-color: #2980b9;
        }

        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-danger {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <h1>TABLEAU</h1>
    <div class="search-container">
        <form action="{{ route('etudiants.search') }}" method="get">
            <input type="text" placeholder="Rechercher..." name="search">
            <input type="submit" value="Rechercher">
        </form>
    </div>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <ul>
        @foreach ($errors->all() as $error)
            <li class="alert alert-danger">{{ $error }}</li>
        @endforeach
    </ul>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NOM</th>
                <th>PRENOM</th>
                <th>AGE</th>
                <th>Date-Naiss</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($etudiants as $etudiant)
                <tr>
                    <td>{{ $etudiant->id }}</td>
                    <td>{{ $etudiant->nom }}</td>
                    <td>{{ $etudiant->prenom }}</td>
                    <td>{{ $etudiant->age }}</td>
                    <td>{{ $etudiant->datenaise }}</td>
                    <td>
                        <a href="/modifier/{{ $etudiant->id }}" class="btn btn-modifier">Modifier</a>
                        <a href="{{ url('register') }}" class="btn btn-register">Register</a>
                        <a href="{{ url('logout') }}" class="btn btn-logout">Logout</a>
                        <a href="/supprimer/{{ $etudiant->id }}" class="btn btn-supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement?')">Supprimer</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
