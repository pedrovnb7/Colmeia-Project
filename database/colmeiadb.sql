-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/06/2024 às 02:55
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `colmeiadb`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacoes`
--

CREATE TABLE `avaliacoes` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `campanhas`
--

CREATE TABLE `campanhas` (
  `id` int(11) NOT NULL,
  `data_create` timestamp NOT NULL DEFAULT current_timestamp(),
  `title_campanha` varchar(100) NOT NULL,
  `description_campanha` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `campanhas`
--

INSERT INTO `campanhas` (`id`, `data_create`, `title_campanha`, `description_campanha`) VALUES
(1, '2024-06-19 00:33:54', 'Campanha \"Saúde em Primeiro Lugar\"', 'Descrição: Uma iniciativa para promover a saúde e o bem-estar dos colaboradores. Inclui sessões de ginástica laboral, palestras sobre alimentação saudável, e check-ups médicos regulares.'),
(2, '2024-06-19 00:34:07', 'Campanha \"Reconhecimento do Mês\"', 'Descrição: Mensalmente, um colaborador é reconhecido por seu desempenho excepcional e dedicação. O vencedor recebe um certificado e um bônus financeiro.'),
(3, '2024-06-19 00:34:21', 'Campanha \"Semana do Voluntariado\"', 'Descrição: Incentiva os funcionários a participar de atividades voluntárias na comunidade local. A empresa oferece horas de trabalho pagas para esses serviços.'),
(4, '2024-06-19 00:34:37', 'Campanha \"Ideias que Transformam\"', 'Descrição: Um concurso interno onde os colaboradores podem apresentar propostas inovadoras para melhorar processos ou produtos. As melhores ideias são implementadas e premiadas.'),
(5, '2024-06-19 00:34:57', 'Campanha \"Conecte-se Mais\"', 'Descrição: Focada em melhorar a comunicação e integração entre equipes. Inclui eventos sociais, workshops de comunicação e ferramentas colaborativas.'),
(6, '2024-06-19 00:35:13', 'Campanha \"Ambiente Sustentável\"', 'Descrição: Promove práticas sustentáveis no ambiente de trabalho, como reciclagem, redução de uso de papel e economia de energia. Inclui desafios com prêmios para as equipes mais engajadas.'),
(7, '2024-06-19 00:35:23', 'Campanha ', 'Descrição: Oferece cursos e workshops regulares para o desenvolvimento profissional dos colaboradores. Inclui acesso a plataformas de aprendizado online e palestras com especialistas.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(140) NOT NULL,
  `email` varchar(70) NOT NULL,
  `senha` varchar(6) NOT NULL,
  `role` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `role`) VALUES
(8, 'Sofia Nunes dos Reis', 'sofiaadm@teste', '123456', 'admin'),
(9, 'Pedro Henrique', 'pedroadm@teste', '123456', 'admin'),
(18, 'Leticia', 'letadm@teste', '123456', 'admin'),
(19, 'Ana Souza', 'ana.souza@example.com', 'a12345', 'user'),
(20, 'Bruno Lima', 'bruno.lima@example.com', 'b98765', 'user'),
(21, 'Carla Mendes', 'carla.mendes@example.com', 'c54321', 'user'),
(22, 'Diego Ferreira', 'diego.ferreira@example.com', 'd1234', 'user'),
(23, 'Elisa Oliveira', 'elisa.oliveira@example.com', 'e5678', 'user'),
(24, 'Felipe Santos', 'felipe.santos@example.com', 'f8765', 'user'),
(25, 'Gabriela Costa', 'gabriela.costa@example.com', 'g6543', 'user'),
(26, 'Henrique Alves', 'henrique.alves@example.com', 'h3456', 'user'),
(27, 'Isabela Rocha', 'isabela.rocha@example.com', 'i2345', 'user'),
(28, 'João Martins', 'joao.martins@example.com', 'j6789', 'user'),
(29, 'Pedro Henrique', 'pedro@teste', '123456', 'user'),
(30, 'Katia', 'katia@teste', '123456', 'user');

-- --------------------------------------------------------

--
-- Estrutura para tabela `vagas`
--

CREATE TABLE `vagas` (
  `id` int(11) NOT NULL,
  `data_create` timestamp NOT NULL DEFAULT current_timestamp(),
  `title_vaga` varchar(100) NOT NULL,
  `description_vaga` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `vagas`
--

INSERT INTO `vagas` (`id`, `data_create`, `title_vaga`, `description_vaga`) VALUES
(1, '2024-06-19 00:27:28', 'Desenvolvedor Full Stack (Nível Júnior)', 'Descrição: Procuramos um desenvolvedor Full Stack júnior para integrar nossa equipe dinâmica. O candidato ideal terá conhecimento em HTML, CSS, JavaScript, PHP e MySQL. Responsabilidades incluem desenvolvimento de aplicações web responsivas e manutenção de sistemas existentes.'),
(2, '2024-06-19 00:27:57', 'Analista de Marketing Digital', 'Descrição: Buscamos um analista de marketing digital para planejar e executar campanhas de marketing online. '),
(3, '2024-06-19 00:28:27', 'Engenheiro de Dados', 'Descrição: Estamos contratando um engenheiro de dados para gerenciar e otimizar nossa infraestrutura de dados. O candidato deve ter experiência com ETL, SQL, Python, e ferramentas de big data. Será responsável por garantir a integridade, disponibilidade e segurança dos dados.'),
(4, '2024-06-19 00:29:24', 'Designer Gráfico', 'Descrição: Procuramos um designer gráfico criativo para desenvolver materiais visuais para campanhas publicitárias, redes sociais e identidade visual da empresa. É necessário domínio de ferramentas como Adobe Photoshop, Illustrator e InDesign, além de um portfólio robusto.'),
(5, '2024-06-19 00:29:59', 'Especialista em Suporte Técnico', 'Descrição: Buscamos um especialista em suporte técnico para fornecer assistência de TI aos nossos clientes e equipe interna. O candidato deve possuir conhecimento em hardware, software, redes e capacidade de resolver problemas técnicos de maneira eficiente.'),
(6, '2024-06-19 00:30:25', 'Gerente de Projetos (TI)', 'Descrição: Estamos à procura de um gerente de projetos para liderar e coordenar nossas iniciativas de TI. Experiência em gerenciamento de projetos usando metodologias ágeis (Scrum, Kanban) é crucial. O candidato deve ser capaz de gerenciar cronogramas, recursos e garantir a entrega pontual dos projetos.'),
(7, '2024-06-19 00:30:38', 'Consultor de Recursos Humanos', 'Descrição: Buscamos um consultor de RH para desenvolver e implementar estratégias de recrutamento e seleção, além de gerenciar programas de treinamento e desenvolvimento. Experiência em processos de seleção, entrevistas e avaliação de desempenho é essencial.'),
(8, '2024-06-19 00:31:01', 'Especialista em Cyber Segurança', 'Descrição: Procuramos um especialista em cyber segurança para proteger nossos sistemas e dados contra ameaças cibernéticas. O candidato deve ter experiência com firewalls, antivírus, criptografia, e realização de auditorias de segurança. Certificações como CISSP ou CEH são desejáveis.'),
(9, '2024-06-19 00:31:22', 'Coordenador de Logística', 'Descrição: Estamos contratando um coordenador de logística para supervisionar e otimizar nossos processos de cadeia de suprimentos. O candidato será responsável por gerenciar inventários, coordenar transporte e garantir a eficiência operacional. Experiência em sistemas ERP é um diferencial.'),
(10, '2024-06-19 00:31:46', 'Redator de Conteúdo', 'Descrição: Buscamos um redator de conteúdo criativo para produzir artigos, blogs, e materiais de marketing que atraiam e engajem nosso público-alvo. O candidato deve ter habilidades excepcionais de escrita, domínio da gramática e experiência com SEO. Portfólio de trabalhos anteriores é necessário.'),
(11, '2024-06-19 00:33:02', 'Analista de Dados', 'Descrição: Buscamos um analista de dados para interpretar grandes volumes de dados e fornecer insights acionáveis para a tomada de decisões estratégicas. O candidato deve ser proficiente em ferramentas como SQL, Python e Tableau, além de ter habilidades analíticas excepcionais.'),
(12, '2024-06-19 00:33:19', 'Gerente de Contas', 'Descrição: Estamos contratando um gerente de contas para gerenciar e expandir nossa carteira de clientes corporativos. O candidato ideal terá experiência em vendas B2B, habilidades de negociação e a capacidade de construir relacionamentos sólidos com os clientes. Experiência no setor de tecnologia é um diferencial.');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `campanhas`
--
ALTER TABLE `campanhas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Índices de tabela `vagas`
--
ALTER TABLE `vagas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `campanhas`
--
ALTER TABLE `campanhas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `vagas`
--
ALTER TABLE `vagas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD CONSTRAINT `avaliacoes_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
