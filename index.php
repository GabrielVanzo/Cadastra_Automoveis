<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Automóveis</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Cadastro de Automóveis</h2>
        <form method="POST" action="insere_automovel.php">
            <div class="form-group">
                <label for="nome">Nome do Carro:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="placa">Placa:</label>
                <input type="text" class="form-control" id="placa" name="placa" required>
            </div>
            <div class="form-group">
                <label for="chassi">Chassi:</label>
                <input type="text" class="form-control" id="chassi" name="chassi" required>
            </div>
            <div class="form-group">
                <label for="montadora">Montadora:</label>
                <select class="form-control" id="montadora" name="montadora" required>
                <?php
                    $connection = mysqli_connect('127.0.0.1', 'root', 'password', 'test_webline_db');
                    if (!$connection) {
                        die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
                    }
                    $query = "SELECT codigo, nome FROM montadoras";
                    $result = mysqli_query($connection, $query);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row['codigo'] . "'>" . $row['nome'] . "</option>";
                        }
                    }
                    mysqli_close($connection);
                ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Inserir Automóvel</button>
        </form>
    </div>
</body>
</html>
