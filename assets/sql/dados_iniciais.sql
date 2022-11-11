INSERT INTO generos(id, nome) VALUES
    (1, 'Alta Fantasia'),
    (2, 'Policial'),
    (3, 'Drama'),
    (4, 'Ficção Cientifica');

INSERT INTO livros(id, titulo, id_generos) VALUES
    (1, 'Assasinato no Expresso do Oriente' , 2),
    (2, 'A Sociedade do Anel'               , 1),
    (3, 'Como eu Era Antes de Voce'         , 3),
    (4, 'O Guia do Mochileiro das Galáxias' , 4);