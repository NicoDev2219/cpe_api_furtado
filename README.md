# API REST de CEP

Projeto de uma API REST simples desenvolvida em PHP com MySQL.

O objetivo do projeto foi praticar:
- API REST
- métodos HTTP
- integração com banco de dados
- JSON
- PDO no PHP

A aplicação funciona localmente utilizando XAMPP.

---

# Tecnologias utilizadas

- PHP
- MySQL
- PDO
- JSON
- XAMPP

---

# Estrutura do projeto

```bash
api-cep/
│
├── config/
│   └── database.php
│
├── api/
│   └── cep.php
│
└── index.php
```

---

# Funcionalidades

- Listar todos os CEPs
- Buscar CEP específico
- Cadastrar novos CEPs
- Atualizar informações
- Remover CEPs
- Retornar dados em JSON

---

# Banco de dados

```sql
CREATE DATABASE IF NOT EXISTS db_cep;

USE db_cep;

CREATE TABLE IF NOT EXISTS cep (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cep VARCHAR(9) NOT NULL UNIQUE,
    rua VARCHAR(150),
    bairro VARCHAR(100),
    cidade VARCHAR(100),
    estado CHAR(2)
);
```

---

# Locais cadastrados

| Lugar | CEP |
|---|---|
| Copacabana - RJ | 22021-001 |
| Itapira - SP | 13970-000 |

---

# Rotas da API

## Listar todos os CEPs

```http
GET /api/cep.php
```

Exemplo:

```bash
http://localhost/api-cep/api/cep.php
```

---

## Buscar CEP específico

```http
GET /api/cep.php?cep=22021-001
```

---

## Inserir novo CEP

```http
POST /api/cep.php
```

JSON:

```json
{
  "cep": "22021-001",
  "rua": "Avenida Atlântica",
  "bairro": "Copacabana",
  "cidade": "Rio de Janeiro",
  "estado": "RJ"
}
```

---

## Atualizar CEP

```http
PUT /api/cep.php
```

---

## Remover CEP

```http
DELETE /api/cep.php?cep=22021-001
```

---

# Como executar

## 1. Instalar o XAMPP

Ativar:
- Apache
- MySQL

---

## 2. Colocar o projeto em

```bash
C:\xampp\htdocs\api-cep
```

---

## 3. Criar o banco de dados no phpMyAdmin

Executar o SQL da tabela.

---

## 4. Abrir no navegador

Página principal:

```bash
http://localhost/api-cep
```

API:

```bash
http://localhost/api-cep/api/cep.php
```

---

# Autor

Projeto desenvolvido por Nicolas Furtado.
