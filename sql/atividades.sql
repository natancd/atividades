CREATE TABLE atividades
(
    id serial NOT NULL,
    titulo VARCHAR(50) NOT NULL,
    descricao VARCHAR(255) NOT NULL,
	tipo VARCHAR(18) NOT NULL,
	concluida VARCHAR(3) NOT NULL
);

INSERT INTO atividades VALUES
(
	1,
	'Cliente: André',
	'Um cliente que sempre está comprando com nossa empresa, devemos atende-lo da melhor forma possível. Cliente fiel e entusiasta que tem prioridade em todos os atendimentos',
	'Atendimento',
	'sim'
);	

INSERT INTO atividades VALUES
(
	2,
	'Cliente: Jonas',
	'Um cliente que nunca está comprando com nossa empresa, devemos atende-lo da melhor forma possível para fideliza-lo.',
	'Atendimento',
	'sim'
);	

INSERT INTO atividades VALUES
(
	3,
	'Backup',
	'Serviço temporariamente deasbilitado para manutenção. Deve ser ligado para o gerente do sistemas após finalização do mesmo',
	'Manutenção',
	'não'
);	