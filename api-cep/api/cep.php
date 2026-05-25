<?php

header("Content-Type: application/json; charset=utf-8");

require "../config/database.php";

$metodo = $_SERVER["REQUEST_METHOD"];

$cep = $_GET["cep"] ?? null;

$dados = json_decode(
    file_get_contents("php://input"),
    true
);

switch ($metodo) {

    // =====================
    // LISTAR / BUSCAR
    // =====================
    case "GET":

        // Buscar um CEP específico
        if ($cep) {

            $cep = preg_replace('/\D/', '', $cep);

            $sql = $pdo->prepare(
                "SELECT * FROM cep
                 WHERE REPLACE(cep,'-','') = ?"
            );

            $sql->execute([$cep]);

            $resultado = $sql->fetch();

            if ($resultado) {

                echo json_encode(
                    $resultado,
                    JSON_UNESCAPED_UNICODE
                );

            } else {

                echo json_encode([
                    "erro" => "CEP não encontrado"
                ]);
            }

        } else {

            // Listar todos
            $sql = $pdo->query(
                "SELECT * FROM cep"
            );

            echo json_encode(
                $sql->fetchAll(),
                JSON_UNESCAPED_UNICODE
            );
        }

    break;

    // =====================
    // CADASTRAR
    // =====================
    case "POST":

        $sql = $pdo->prepare(
            "INSERT INTO cep
            (cep, rua, bairro, cidade, estado)
            VALUES (?, ?, ?, ?, ?)"
        );

        $sql->execute([
            $dados["cep"],
            $dados["rua"],
            $dados["bairro"],
            $dados["cidade"],
            $dados["estado"]
        ]);

        echo json_encode([
            "mensagem" => "CEP cadastrado"
        ]);

    break;

    // =====================
    // ATUALIZAR
    // =====================
    case "PUT":

        $sql = $pdo->prepare(
            "UPDATE cep
             SET rua=?, bairro=?, cidade=?, estado=?
             WHERE cep=?"
        );

        $sql->execute([
            $dados["rua"],
            $dados["bairro"],
            $dados["cidade"],
            $dados["estado"],
            $dados["cep"]
        ]);

        echo json_encode([
            "mensagem" => "CEP atualizado"
        ]);

    break;

    // =====================
    // DELETAR
    // =====================
    case "DELETE":

        $sql = $pdo->prepare(
            "DELETE FROM cep WHERE cep=?"
        );

        $sql->execute([$cep]);

        echo json_encode([
            "mensagem" => "CEP removido"
        ]);

    break;

    default:

        echo json_encode([
            "erro" => "Método inválido"
        ]);

}