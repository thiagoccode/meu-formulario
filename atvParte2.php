<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Dados</title>

    
    <style>
        body {
            background: linear-gradient(to bottom, #4e4e4e, #131313);
            box-shadow: inset 0 0 50px rgba(0, 0, 0, 0.5);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow-y: auto;
            font-family: "Roboto", sans-serif;
        }

        section {
            background-color: #222222;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 0 15px rgba(29, 205, 159, 0.8);
            animation: brilho 2.5s ease-in-out infinite;
        }

        h1 {
            text-align: center;
            color: #1DCD9F;
            margin-bottom: 1rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        th, td {
            padding: 0.8rem;
            text-align: left;
            border-bottom: 1px solid #1DCD9F;
            color: #5f54d4;
        }

        th {
            color: #1DCD9F;
            font-weight: bold;
        }

        @keyframes brilho {
            0% { box-shadow: 0 0 15px rgba(29, 205, 159, 0.8); }
            50% { box-shadow: 0 0 30px rgba(29, 205, 159, 1); }
            100% { box-shadow: 0 0 15px rgba(29, 205, 159, 0.8); }
        }

        button {
            margin-top: 1rem;
            width: 150px;
            height: 40px;
            cursor: pointer;
            border: 2px solid #5f54d4;
            background-color: transparent;
            color: #1DCD9F;
            transition: background-color 0.4s ease, color 0.4s ease, transform 0.4s ease;
            font-weight: 700;
            border-radius: 0.2rem;
        }

        button:hover {
            background-color: #1DCD9F;
            color: #5f54d4;
            border: none;
            transform: scale(1.1);
        }
    </style>
</head>

<body>
    <section>
        <h1>Lista de Cadastros</h1>

        <table>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>EMAIL</th>
            </tr>

            <?php
                $servidor = "localhost";
                $usuario = "root";
                $senha = "";
                $banco = "atividade";

                $conexao = new mysqli($servidor, $usuario, $senha, $banco);

                if ($conexao->connect_error) {
                    die("Falha: " . $conexao->connect_error);
                }

                $sql = "SELECT id, nome, email FROM tabelaatv";
                $resultado = $conexao->query($sql);

                if ($resultado->num_rows > 0) {
                    while ($linha = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $linha['id'] . "</td>";
                        echo "<td>" . $linha['nome'] . "</td>";
                        echo "<td>" . $linha['email'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' style='text-align:center'>Nenhum resultado encontrado</td></tr>";
                }

                $conexao->close();
            ?>
        </table>

        <form action="index.html">
            <button type="submit">Voltar</button>
        </form>
    </section>
</body>
</html>
