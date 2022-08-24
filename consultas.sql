select * from livro;

#UPDATE
#UPDATE livro SET sinopse = "O livro conta a história de Ofélia" WHERE cd = 337;

#autores de livro: 6, 9, 14, 15, 11, 341, 242, 338 e 339
#livros que tem autor: 1, 3, 15, 16, 10, 26, 27, 24, 25

#consultando cd, titulo, capa do livro, e nome do autor de UM LIVRO(1)
select l.cd, l.titulo, l.capa, a.nome as Autor
	from livro l, autor_livro al, autor a
		where al.id_livro = l.cd 
			and a.cd = al.id_autor
				and l.cd = 1;

#consultando cd, titulo, capa do livro, e nome do autor de TODOS OS LIVROS

CREATE VIEW vlivro as
	select l.cd, l.titulo, l.capa, a.nome as Autor
		from livro l, autor_livro al, autor a
			where al.id_livro = l.cd 
				and a.cd = al.id_autor;

#consultando cd, titulo, capa do livro, e nome do autor pelo TITULO DO LIVRO
select l.cd, l.titulo, l.capa
	from livro l 
		where l.titulo like "%guerra%";

#consultando a view criada
select * from vlivro;
	#where titulo like "%guerra%";
    
#consultando livros por nome de autor
SELECT * FROM vlivro 
	WHERE cd IN
		(SELECT id_livro FROM autor_livro
			where id_autor IN
				(SELECT cd FROM autor WHERE nome LIKE "%e%"));

