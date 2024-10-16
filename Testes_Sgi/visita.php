<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>agendar visita</title>
</head>
<body>
    <form action="" method="post">
            <legend>Agendar Visita</legend>
            <label for="id_grupo">Grupo:</label>
            <select id="id_grupo" name="id_grupo" required>
                <?php
                    include("conexao.php");
                    $gp = "SELECT id_grupo, nome_grupo FROM grupo";
                    $result = $con->query($gp);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . htmlspecialchars($row['id_grupo']) . "'>" . htmlspecialchars($row['nome_grupo']) . "</option>";
                        }
                    } else {
                        echo "<option value=''>Nenhum grupo encontrado</option>";
                    }
                ?>
            </select>
            <label for="membro">Selecione o Membro:</label>
            <select name="membro" id="membro" required>
                <?php
                    if (isset($_POST['id_grupo']) && !empty($_POST['id_grupo'])) {
                        // Captura o grupo selecionado pelo usuário
                        $id_grupo = htmlspecialchars($_POST['id_grupo']);
                        
                        // Consulta para buscar os membros com base no grupo selecionado
                        $mbr = "SELECT id_membro, nome_membro FROM membro WHERE id_grupo = ?";
                        $stmt = $con->prepare($mbr);
                        $stmt->bind_param("i", $id_grupo); // 'i' indica que o valor é inteiro
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . htmlspecialchars($row['id_membro']) . "'>" . htmlspecialchars($row['nome_membro']) . "</option>";
                            }
                        } else {
                            echo "<option value=''>Nenhum membro encontrado</option>";
                        }
                    } else {
                        echo "<option value=''>Selecione um grupo primeiro</option>";
                    }
                ?>
            </select>
        </fieldset>
    </form>
</body>
</html>