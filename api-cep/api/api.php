<?php

header("Content-Type: application/json; charset=utf-8");

require "../config/database.php";

$method = $_SERVER['REQUEST_METHOD'];

$cep = $_GET['cep'] ?? null;

$body = json_decode(
    file_get_contents("php://input"),
    true
);

switch ($method) {

    // ==========================
    // GET
    // ==========================
    case "GET":

        // Buscar CEP específico
        if ($cep) {

            $cep = preg_replace('/\D/', '', $cep);

            $stmt = $pdo->prepare(
                "SELECT * FROM cep
                 WHERE REPLACE(cep,'-','') = ?"
            );

            $stmt->execute([$cep]);

            $resultado = $stmt->fetch();

            if ($resultado) {

                echo json_encode(
                    $resultado,
                    JSON_UNESCAPED_UNICODE
                );

            } else {

                http_response_code(404);

                echo json_encode([
                    "erro" => "CEP não encontrado"
                ], JSON_UNESCAPED_UNICODE);

            }

        } else {

            // Listar todos os CEPs
            $stmt = $pdo->query(
                "SELECT * FROM cep"
            );

            echo json_encode(
                $stmt->fetchAll(),
                JSON_UNESCAPED_UNICODE
            );
        }

    break;

    // ==========================
    // POST
    // ==========================
    case "POST":

        $stmt = $pdo->prepare(
            "INSERT INTO cep
            (cep, rua, bairro, cidade, estado)
            VALUES (?, ?, ?, ?, ?)"
        );

        $stmt->execute([
            $body['cep'],
            $body['rua'],
            $body['bairro'],
            $body['cidade'],
            $body['estado']
        ]);

        echo json_encode([
            "mensagem" => "CEP cadastrado com sucesso"
        ], JSON_UNESCAPED_UNICODE);

    break;

    // ==========================
    // PUT
    // ==========================
    case "PUT":

        $stmt = $pdo->prepare(
            "UPDATE cep
            SET rua=?, bairro=?, cidade=?, estado=?
            WHERE cep=?"
        );

        $stmt->execute([
            $body['rua'],
            $body['bairro'],
            $body['cidade'],
            $body['estado'],
            $body['cep']
        ]);

        echo json_encode([
            "mensagem" => "CEP atualizado"
        ], JSON_UNESCAPED_UNICODE);

    break;

    // ==========================
    // DELETE
    // ==========================
    case "DELETE":

        $stmt = $pdo->prepare(
            "DELETE FROM cep WHERE cep=?"
        );

        $stmt->execute([$cep]);

        echo json_encode([
            "mensagem" => "CEP removido"
        ], JSON_UNESCAPED_UNICODE);

    break;

    default:

        http_response_code(405);

        echo json_encode([
            "erro" => "Método não permitido"
        ], JSON_UNESCAPED_UNICODE);

}