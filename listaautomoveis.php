<!DOCTYPE html>
<html>
<head>
    <title>Lista de Automóveis</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-4">
    <h2>Lista de Automóveis</h2>

    <form method="GET" action="">
        <div class="form-group">
            <label for="busca">Buscar por nome do carro:</label>
            <div class="input-group">
                <input type="text" class="form-control" id="busca" name="busca">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </div>
        </div>
    </form>

    <?php
    $connection = mysqli_connect('127.0.0.1', 'root', 'password', 'test_webline_db');
    if (!$connection) {
        die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
    }
    $query = "SELECT a.nome AS nome_carro, a.placa, a.chassi, m.nome AS nome_montadora
              FROM automoveis a
              INNER JOIN montadoras m ON a.montadora = m.codigo";
    if (isset($_GET['busca']) && !empty($_GET['busca'])) {
        $busca = $_GET['busca'];
        $query .= " WHERE a.nome LIKE '%$busca%'";
    }

    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "<table class='table'>
                <tr>
                    <th class='table-dark'>Nome do Carro</th>
                    <th class='table-dark'>Placa</th>
                    <th class='table-dark'>Chassi</th>
                    <th class='table-dark'>Montadora</th>
                </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td class='table-bordered td'>" . $row['nome_carro'] . "</td>
                    <td class='table-bordered td'>" . $row['placa'] . "</td>
                    <td class='table-bordered td'>" . $row['chassi'] . "</td>
                    <td class='table-bordered td'>" . $row['nome_montadora'] . "</td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "Nenhum automóvel encontrado.";
    }
    mysqli_close($connection);
    ?>
  </div>
</body>
</html>