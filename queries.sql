CREATE TABLE users(
    id INT UNSIGNED AUTO_INCREMENT NOT NULL,
    username VARCHAR(25),
    password CHAR(60) NOT NULL,
    PRIMARY KEY (id)
);


-- aggiungi una colonna tabella 
ALTER TABLE users ADD COLUMN email VARCHAR(100);
--cancella colonna tabella 
ALTER TABLE users DROP COLUMN email VARCHAR(100);
--modifica righa tabella dobbiamo riscrivere tutti i campi della colonna se no li sovrascrive e quindi li perdi se non li riscrivi
ALTER TABLE users MODIFY COLUMN password VARCHAR(60) NOT NULL;
--elimina tabella 
DROP TABLE IF EXISTS users;
--elimina Database
DROP DATABASE IF EXISTS dbname;

--------------------------------------------------------------------------------------------------------------------------------------------

-- INSERT INTO users(username,password) VALUES('admin',PASSWORD('admin'));
--cercare un determinato campo
SELECT * FROM users WHERE username='admin';


--LIKE
--cerca tutte le righe da user con chiave username il like uguale a =  la % dice dice..accetto tutti i caratteri dopo admin
--la nostra ricerca quindi stiamo cercando chi contiene admin e che abbia qualsiasi carattere dopo
SELECT * FROM users WHERE username LIKE 'admin%';


--operatore AND
SELECT * FROM users WHERE username LIKE 'admin%' AND password like ='%mn';--cioè cerco chi finisce con 'mn' ma accetta qualsiasi carattere prima di 'mn'

---------------------------------
--underscore _  ovvero per cercare le posizioni...se metto solo ad esempio quattro trattini bassi ____  sto cercando chi abbia solo 4 caratteri
SELECT * FROM users WHERE username LIKE '_a%';--ad ogni trattino basso corrisponde una posizione quindi cerco chi abbia la lettera a come seconda lettera

--escape
SELECT * FROM users WHERE username LIKE '%\%%' ESCAPE '\';--qui stiamo cercando proprio il carattere %

--offset
SELECT  * FROM users LIMIT 3 OFFSET  0 --prima pagina
SELECT  * FROM users LIMIT 3 OFFSET  3 --pagina 2
SELECT  * FROM users LIMIT 3 OFFSET  6 --pagina 2

--order
SELECT  * FROM users ORDER BY id DESC;--ordino in modo decrescente
SELECT  * FROM users ORDER BY id ASC;--ordino in modo ascendende

--max 
SELECT *, MAX(id) FROM users;--trovo la massima id presente nella tabella

--count
SELECT COUNT(*) AS num_users FROM users WHERE LENGTH(username)<10;--conta quanti elementi con il nome più corto di 10 ci sono nella tabella user il risultato lo intitoliamo num_user

--group by
SELECT username, COUNT(*) AS num_users FROM users GROUP BY username;--contare quante volte ciascun utente ce ne


