<?php

require_once "./includes/criar-classe-conexao.inc.php";
require_once "./includes/criar-classe-livros.inc.php";
require_once "./dao/criar-classe-livroDAO.inc.php";


$livro = Livro::comAtributos(
    '978-3-16-148410-0',
    'Programação Web II',
    'John Doe',
    49.99,
    new DateTime('2024-01-01')
);

$conexao = new mysqli('localhost', 'user', 'password', 'database');
$dao = new LivroDAO($conexao);
$dao->cadastrar($livro, 'tb_livros');

$livros = $dao->listarTodos('tb_livros');
foreach ($livros as $livro) {
    echo $livro->getTitulo() . PHP_EOL;
}

