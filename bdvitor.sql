-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Dez-2025 às 00:58
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdvitor`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nivel` int(10) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(500) DEFAULT NULL,
  `chave` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `data_cad` datetime DEFAULT NULL,
  `validacao_login_codigo` int(1) DEFAULT NULL,
  `status` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id`, `nivel`, `nome`, `email`, `senha`, `chave`, `token`, `data_cad`, `validacao_login_codigo`, `status`) VALUES
(1, 1, 'Ellos', 'contato@ellosdesign.com.br', '$2y$07$ZzXYji4WgFjoKbUQSWsW0udC/TVTEAfsa/yMD0RpzkRi40xnL3bh6', '8f95cb79987e8864a34a8d26a46bff83', '87fe0b7e995567e525116569a02b4e5bd976b3b9', '2016-10-01 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin_acessos`
--

CREATE TABLE `admin_acessos` (
  `id` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `data_acesso` datetime DEFAULT NULL,
  `ip_acesso` varchar(255) DEFAULT NULL,
  `user_agent` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `admin_acessos`
--

INSERT INTO `admin_acessos` (`id`, `id_admin`, `data_acesso`, `ip_acesso`, `user_agent`) VALUES
(1, 1, '2025-12-03 20:17:36', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36');

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin_avisos`
--

CREATE TABLE `admin_avisos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `mensagem` varchar(10000) DEFAULT NULL,
  `data_cad` datetime DEFAULT NULL,
  `prioridade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin_categorias_niveis`
--

CREATE TABLE `admin_categorias_niveis` (
  `id` int(11) NOT NULL,
  `categoria` varchar(200) DEFAULT NULL,
  `titulo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `admin_categorias_niveis`
--

INSERT INTO `admin_categorias_niveis` (`id`, `categoria`, `titulo`) VALUES
(78, 'opcoes', 'Gerenciar opções do site'),
(79, 'logos', 'Gerenciar logotipos'),
(80, 'usuarios', 'Gerenciar usuários do site'),
(81, 'niveis', 'Gerenciar níveis de acesso ao site'),
(82, 'paginas', 'Gerenciar páginas do site'),
(83, 'paginas_fotos', 'Gerenciar fotos das páginas'),
(84, 'paginas_blocos', 'Gerenciar itens das páginas'),
(85, 'newsletter', 'Gerenciar newsletter'),
(86, 'blog_posts', 'Gerenciar postagens do blog'),
(87, 'blog_categorias', 'Gerenciar categorias do blog'),
(88, 'blog_comentarios', 'Gerenciar comentários do blog'),
(89, 'downloads', 'Gerenciar downloads'),
(90, 'faq', 'Gerenciar perguntas frequentes'),
(91, 'videos', 'Gerenciar vídeos'),
(92, 'galerias', 'Gerenciar fotos'),
(93, 'galerias_fotos', 'Gerenciar fotos dos álbuns'),
(94, 'produtos', 'Gerenciar produtos'),
(95, 'produtos_fotos', 'Gerenciar fotos dos produtos'),
(96, 'produtos_categorias', 'Gerenciar categorias dos produtos'),
(97, 'produtos_subcategorias', 'Gerenciar subcategorias dos produtos'),
(98, 'servicos', 'Gerenciar serviços'),
(99, 'slide', 'Gerenciar slide'),
(100, 'blocos_home', 'Gerenciar blocos (Home)'),
(101, 'contadores', 'Gerenciar contadores (Home)'),
(102, 'depoimentos', 'Gerenciar depoimentos'),
(103, 'clientes', 'Gerenciar clientes'),
(104, 'orcamentos', 'Gerenciar orçamentos'),
(106, 'scripts', 'Gerenciar scripts'),
(107, 'dados_contato', 'Gerenciar dados de contato'),
(108, 'pixel_facebook', 'Gerenciar Pixel do Facebook');

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin_conf`
--

CREATE TABLE `admin_conf` (
  `id` int(11) NOT NULL,
  `titulo_site` varchar(255) DEFAULT NULL,
  `email_atendimento` varchar(255) DEFAULT NULL,
  `email_formulario` varchar(255) DEFAULT NULL,
  `telefones` varchar(255) DEFAULT NULL,
  `horario_funcionamento` varchar(1000) DEFAULT NULL,
  `endereco` varchar(2000) DEFAULT NULL,
  `mapa` mediumtext DEFAULT NULL,
  `link_mapa` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `whats_msg` varchar(255) DEFAULT NULL,
  `whats_lateral` int(1) DEFAULT 1,
  `whats_event` varchar(255) DEFAULT NULL,
  `frase_topo` varchar(255) DEFAULT NULL,
  `botao_txt` varchar(255) DEFAULT NULL,
  `botao_url` varchar(255) DEFAULT NULL,
  `popup_cookies` int(1) DEFAULT 1,
  `skype` varchar(255) DEFAULT NULL,
  `facebook` varchar(500) DEFAULT NULL,
  `twitter` varchar(500) DEFAULT NULL,
  `instagram` varchar(500) DEFAULT NULL,
  `linkedin` varchar(500) DEFAULT NULL,
  `youtube` varchar(500) DEFAULT NULL,
  `tiktok` varchar(255) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` varchar(255) DEFAULT NULL,
  `fb_api_status` int(1) DEFAULT NULL,
  `fb_api_id` varchar(100) DEFAULT NULL,
  `fb_api_token` text DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `admin_conf`
--

INSERT INTO `admin_conf` (`id`, `titulo_site`, `email_atendimento`, `email_formulario`, `telefones`, `horario_funcionamento`, `endereco`, `mapa`, `link_mapa`, `whatsapp`, `whats_msg`, `whats_lateral`, `whats_event`, `frase_topo`, `botao_txt`, `botao_url`, `popup_cookies`, `skype`, `facebook`, `twitter`, `instagram`, `linkedin`, `youtube`, `tiktok`, `seo_title`, `seo_description`, `fb_api_status`, `fb_api_id`, `fb_api_token`, `status`) VALUES
(1, 'Vitor Barbosa', 'vitorbbs99@gmail.com', 'vitorbbs99@gmail.com', '(11) 99449-2349', '', '', '', 'https://www.google.com/maps?q=', '(11) 99449-2349', 'Olá! Gostaria de mais informações.', 1, '', '', '', 'https://google.com', 1, '', 'https://facebook.com', '', 'https://instagram.com', 'https://linkedin.com', '', 'https://tiktok.com/', 'Vitor Barbosa', 'Desenvolvedor full-stack.', 0, '', '', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin_failed_logins`
--

CREATE TABLE `admin_failed_logins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `attempts` int(11) DEFAULT 0,
  `last_attempt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `locked_until` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin_logos`
--

CREATE TABLE `admin_logos` (
  `id` int(11) NOT NULL,
  `local` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `data_cad` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `admin_logos`
--

INSERT INTO `admin_logos` (`id`, `local`, `logo`, `titulo`, `status`, `data_cad`) VALUES
(24, 'principal', '7c23c8f783eaaff5e54b1065c2889736.png', 'Principal', 1, '2017-05-25'),
(25, 'icon_admin', 'eab0b312d66b01f1e37313504521eed1.jpg', 'Admin', 1, '2017-05-25'),
(26, 'footer', '593726dc6f1757d8387a9aa3572ca8d8.png', 'Rodapé', 1, '2017-05-25'),
(27, 'email', '48e69d462c2f5534aa56fd94256447c6.png', 'E-mail', 1, '2017-05-25'),
(29, 'share', 'cb053f501b1aca17f9aa5314103acc50.png', '', 1, '2022-07-31'),
(31, 'favicon', '49b6043a0fb938cd613610c1945d962d.png', '', 1, '2022-07-31');

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin_niveis`
--

CREATE TABLE `admin_niveis` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `permissoes` varchar(1000) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `admin_niveis`
--

INSERT INTO `admin_niveis` (`id`, `titulo`, `permissoes`, `status`) VALUES
(1, 'Administrador', 'alertas,meus_dados,blocos_home,blog_categorias,produtos_categorias,clientes,blog_comentarios,contadores,dados_contato,depoimentos,downloads,galerias,paginas_fotos,galerias_fotos,produtos_fotos,paginas_blocos,logos,newsletter,niveis,opcoes,orcamentos,paginas,faq,pixel_facebook,blog_posts,produtos,scripts,servicos,slide,produtos_subcategorias,usuarios,videos', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin_scripts`
--

CREATE TABLE `admin_scripts` (
  `id` int(11) NOT NULL,
  `ordem_exibicao` int(11) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `rule` varchar(255) DEFAULT NULL,
  `page_rule` varchar(255) DEFAULT NULL,
  `page` varchar(255) DEFAULT NULL,
  `local` varchar(255) DEFAULT NULL,
  `code` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `dta_cad` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `admin_scripts`
--

INSERT INTO `admin_scripts` (`id`, `ordem_exibicao`, `titulo`, `rule`, `page_rule`, `page`, `local`, `code`, `status`, `dta_cad`) VALUES
(1, 1, 'Google Analytics', 'all', '', '', 'head', '', 0, '2023-04-16'),
(6, 2, 'Obrigado (Cadastros)', 'custom', 'equals', 'obrigado', 'head', '', 0, '2024-05-24'),
(8, 3, 'CSS Personalizado', 'all', '', '', 'head', '<style>\r\n</style>', 0, '2025-03-28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin_visitas`
--

CREATE TABLE `admin_visitas` (
  `id` int(11) NOT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `user_ip` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `device` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `page_first` varchar(255) DEFAULT NULL,
  `page_last` varchar(255) DEFAULT NULL,
  `data_cad` datetime DEFAULT current_timestamp(),
  `data_upd` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `admin_visitas`
--

INSERT INTO `admin_visitas` (`id`, `session_id`, `token`, `user_ip`, `user_agent`, `device`, `city`, `state`, `country`, `page_first`, `page_last`, `data_cad`, `data_upd`) VALUES
(1, '1a849ecc12250f45661fe52ca98bfdb5', 'dfe8e25b2c5744fe0c8336f969c1e746d508f77245fa00f1d8c8925a734b2ddb58a6b574', '172.24.144.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'desktop', NULL, NULL, NULL, '/base-lp2/', '/base-lp2/', '2025-04-01 14:51:43', '2025-04-01 15:01:22'),
(2, '27763e9b67dbca390dab4600da204db1', 'e996aa750d03323818f09d889ce218a1376327e52cce92efda9859a63d134e021adf986b', '172.24.144.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'desktop', NULL, NULL, NULL, '/base-lp2/', '/base-lp2/obrigado', '2025-04-02 12:09:56', '2025-04-02 14:41:06'),
(3, '6276f08b602b23111bf3c3af117205d8', '423a71f472a1048d2bdbbbc3038a7c5d17ffd1c41d83696dee38e13ea013ad1b448f8e84', '172.24.144.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'desktop', 'Guarulhos', 'SP', 'BR', '/base-lp2/', '/base-lp2/', '2025-04-03 11:16:07', '2025-04-03 19:22:09'),
(4, '5104e9a986edc4a844088d5a5e86c2e0', '9ed75dfe52e5d662087ca676ed3ca07bf03039a14eb1485f01bb4f00a40c69e31846d42b', '172.24.144.1', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Mobile Safari/537.36', 'mobile', NULL, NULL, NULL, '/base-lp2/', '/base-lp2/', '2025-04-03 14:00:42', '2025-04-03 19:17:15'),
(5, 'bf87547eae940dde54efcfb9422d6c84', '6d271d987ffe0b5d2f4ad1234b1f8da1608fc307ffef41e79579c23cbae25aedab7a21f6', '172.24.144.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'desktop', NULL, NULL, NULL, '/base-lp2/', '/base-lp2/', '2025-04-04 11:19:38', '2025-04-04 14:53:03'),
(6, '6ad6d924744c1a81b96572307c8c87b1', '1c183d939f9baac20a9ce2beff348dccce4fcc03fda2214e849cb2daf9ec7e187ccc9a35', '172.24.144.1', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Mobile Safari/537.36', 'mobile', NULL, NULL, NULL, '/base-lp2/', '/base-lp2/', '2025-04-04 14:33:09', '2025-04-04 14:54:03'),
(7, '275b56a729053ae47707b3a8b8506504', '32a649ece4c27580df8d2bd907b103179759ef1d86ddbee7cf271f62a705be726083b788', '172.24.144.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_1_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.1.1 Mobile/15E148 Safari/604.1', 'mobile', NULL, NULL, NULL, '/base-lp2/', '/base-lp2/', '2025-04-04 14:41:25', '2025-04-04 14:50:50'),
(8, '33e8e9053c49beb6ed701981f53f1ab2', '2fb190cbd3255012a391bc1847352e2392960fd0a33936b29f8f5587da19964fd1f663ed', '172.24.144.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'desktop', NULL, NULL, NULL, '/base-lp2/', '/base-lp2/', '2025-04-10 14:26:03', '2025-04-10 14:44:28'),
(9, '697c00196fe86a65c91b23d02ec6aada', '7bb2f801fd744b94450f8e945b6f933f020c966c7548eb8d8be66b11a51d1c0c69618ad3', '172.24.144.1', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Mobile Safari/537.36', 'mobile', NULL, NULL, NULL, '/base-lp2/', '/base-lp2/', '2025-04-10 14:43:41', '2025-04-10 14:44:07'),
(10, '6700oagmouhmu6u33cg28ara7a', '95072b8c35bfc273f00fc52245ba32902b88c4b12ef5e463928943033daf0a4c82f7ec42', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'desktop', NULL, NULL, NULL, '/vitor/', '/vitor/', '2025-12-03 17:20:30', '2025-12-03 17:29:41'),
(11, 't99f2lgrq3jqb67icgglmvvboh', 'a07bb2832d63c6604ec1f87d2b7609aa37bb6c658278557f4fbc19e915c2c5a3d699722b', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'desktop', NULL, NULL, NULL, '/vitor/', '/vitor/', '2025-12-03 20:16:01', '2025-12-03 20:58:27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin_wpp_clicks`
--

CREATE TABLE `admin_wpp_clicks` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(100) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `blocos_home`
--

CREATE TABLE `blocos_home` (
  `id` int(11) NOT NULL,
  `ordem_exibicao` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `texto` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `tipo_link` varchar(100) DEFAULT NULL,
  `data_cad` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `blocos_home`
--

INSERT INTO `blocos_home` (`id`, `ordem_exibicao`, `foto`, `titulo`, `texto`, `url`, `tipo_link`, `data_cad`, `status`) VALUES
(1, 1, 'e1527d464cc53f10e497ddb187c3a2f1.png', 'Suporte Personalizado', 'Nossa equipe está pronta para atender as necessidades de cada cliente.', '', 'Sem URL', '2022-08-13', 1),
(2, 2, 'ade4f23276e02fa78c975ca987e550fc.png', 'Satisfação Garantida', 'Satisfação total garantida de uma empresa com mais de 10 anos de experiência.', '', 'Sem URL', '2022-08-13', 1),
(3, 3, '3111d683b47dcd90fd108e593b113dc4.png', 'Profissionais Qualificados', 'Nossos profissionais são altamente qualificados garantindo o melhor serviço.', '', 'Sem URL', '2022-08-13', 1),
(4, 4, '628c4c2611ab439a1f8bab215d27d695.png', 'Tecnologia e Inovação', 'Trabalhamos com as melhores e mais recentes tecnologias do mercado.', '', 'Sem URL', '2022-08-13', 1),
(5, 5, '8b6234b9acc60f9506fd88394e7becf1.png', 'Agilidade e Segurança', 'Garantimos agilidade e segurança na prestação dos nossos serviços.', '', 'Sem URL', '2022-08-13', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `paginas`
--

CREATE TABLE `paginas` (
  `id` int(11) NOT NULL,
  `pagina` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `subtitulo` varchar(255) DEFAULT NULL,
  `texto` mediumtext DEFAULT NULL,
  `texto2` mediumtext DEFAULT NULL,
  `resumo` text DEFAULT NULL,
  `missao` text DEFAULT NULL,
  `visao` text DEFAULT NULL,
  `valores` text DEFAULT NULL,
  `botao` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `arquivo` varchar(255) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `paginas`
--

INSERT INTO `paginas` (`id`, `pagina`, `foto`, `banner`, `titulo`, `subtitulo`, `texto`, `texto2`, `resumo`, `missao`, `visao`, `valores`, `botao`, `link`, `video`, `arquivo`, `seo_title`, `seo_description`, `status`) VALUES
(2, 'politica-de-privacidade', 'afae05344a4454881a52d7efb49a63eb.jpg', 'df563cfe1c62c3fd88c1cf305f461053.jpg', 'Política de Privacidade', '', '<p>N&oacute;s usamos cookies para melhorar sua experi&ecirc;ncia de navega&ccedil;&atilde;o no portal. Ao utilizar o <strong>dominio.com.br</strong>, voc&ecirc; concorda com a pol&iacute;tica de monitoramento de cookies. Para ter mais informa&ccedil;&otilde;es sobre como isso &eacute; feito, acesse Pol&iacute;tica de cookies. Se voc&ecirc; concorda, clique em <strong>Aceito</strong>.</p>\r\n\r\n<p><strong>O que s&atilde;o cookies?</strong><br />\r\nCookies s&atilde;o arquivos salvos em seu computador, tablet ou telefone quando voc&ecirc; visita um site.Usamos os cookies necess&aacute;rios para fazer o site funcionar da melhor forma poss&iacute;vel e sempre aprimorar os nossos servi&ccedil;os.<br />\r\nAlguns cookies s&atilde;o classificados como necess&aacute;rios e permitem a funcionalidade central, como seguran&ccedil;a, gerenciamento de rede e acessibilidade. Estes cookies podem ser coletados e armazenados assim que voc&ecirc; inicia sua navega&ccedil;&atilde;o ou quando usa algum recurso que os requer.</p>\r\n\r\n<p><strong>Cookies Prim&aacute;rios</strong><br />\r\nAlguns cookies ser&atilde;o colocados em seu dispositivo diretamente pelo nosso site - s&atilde;o conhecidos como cookies prim&aacute;rios. Eles s&atilde;o essenciais para voc&ecirc; navegar no site e usar seus recursos.</p>\r\n\r\n<p><strong>Tempor&aacute;rios</strong><br />\r\nN&oacute;s utilizamos cookies de sess&atilde;o. Eles s&atilde;o tempor&aacute;rios e expiram quando voc&ecirc; fecha o navegador ou quando a sess&atilde;o termina.</p>\r\n\r\n<p><strong>Finalidade</strong><br />\r\nEstabelecer controle de idioma e seguran&ccedil;a ao tempo da sess&atilde;o.</p>\r\n\r\n<p><strong>Persistentes</strong><br />\r\nUtilizamos tamb&eacute;m cookies persistentes que permanecem em seu disco r&iacute;gido at&eacute; que voc&ecirc; os apague ou seu navegador o fa&ccedil;a, dependendo da data de expira&ccedil;&atilde;o do cookie. Todos os cookies persistentes t&ecirc;m uma data de expira&ccedil;&atilde;o gravada em seu c&oacute;digo, mas sua dura&ccedil;&atilde;o pode variar.</p>\r\n\r\n<p><strong>Finalidade</strong><br />\r\nColetam e armazenam a ci&ecirc;ncia sobre o uso de cookies no site.</p>\r\n\r\n<p><strong>Cookies de Terceiros</strong><br />\r\nOutros cookies s&atilde;o colocados no seu dispositivo n&atilde;o pelo site que voc&ecirc; est&aacute; visitando, mas por terceiros, como, por exemplo, os sistemas anal&iacute;ticos.</p>\r\n\r\n<p><strong>Tempor&aacute;rios</strong><br />\r\nN&oacute;s utilizamos cookies de sess&atilde;o. Eles s&atilde;o tempor&aacute;rios e expiram quando voc&ecirc; fecha o navegador ou quando a sess&atilde;o termina.</p>\r\n\r\n<p><strong>Finalidade</strong><br />\r\nColetam informa&ccedil;&otilde;es sobre como voc&ecirc; usa o site, como as p&aacute;ginas que voc&ecirc; visitou e os links em que clicou. Nenhuma dessas informa&ccedil;&otilde;es pode ser usada para identific&aacute;-lo. Seu &uacute;nico objetivo &eacute; possibilitar an&aacute;lises e melhorar as fun&ccedil;&otilde;es do site.</p>\r\n\r\n<p><strong>Persistentes</strong><br />\r\nUtilizamos tamb&eacute;m cookies persistentes que permanecem em seu disco r&iacute;gido at&eacute; que voc&ecirc; os apague ou seu navegador o fa&ccedil;a, dependendo da data de expira&ccedil;&atilde;o do cookie. Todos os cookies persistentes t&ecirc;m uma data de expira&ccedil;&atilde;o gravada em seu c&oacute;digo, mas sua dura&ccedil;&atilde;o pode variar.</p>\r\n\r\n<p><strong>Finalidade</strong><br />\r\nColetam informa&ccedil;&otilde;es sobre como voc&ecirc; usa o site, como as p&aacute;ginas que voc&ecirc; visitou e os links em que clicou. Nenhuma dessas informa&ccedil;&otilde;es pode ser usada para identific&aacute;-lo. Seu &uacute;nico objetivo &eacute; possibilitar an&aacute;lises e melhorar as fun&ccedil;&otilde;es do site.</p>\r\n\r\n<p>Voc&ecirc; pode desabilit&aacute;-los alterando as configura&ccedil;&otilde;es do seu navegador, mas saiba que isso pode afetar o funcionamento do site.</p>\r\n\r\n<ul>\r\n	<li>Chrome</li>\r\n	<li>Firefox</li>\r\n	<li>Microsoft Edge</li>\r\n	<li>Internet Explorer</li>\r\n</ul>\r\n', '', '', '', '', '', '', '', '', NULL, '', '', 0),
(3, 'contato', NULL, '24fb4dec60723a93ddfaa9917ecf8124.jpg', 'Contato', '', '<p style=\"text-align:center\"><strong>Preencha o formul&aacute;rio abaixo e clique em&nbsp;enviar.</strong><br />\r\nResponderemos sua mensagem o mais r&aacute;pido poss&iacute;vel!</p>\r\n', '', '', '', '', '', '', '', '', NULL, '', '', 0),
(4, 'sobre-home', '8d736964fad3445d29c9a2c014b06a86.jpg', '', 'A Empresa', 'Sobre Nós', '<p>Lorem, ipsum dolor sit amet <strong>consectetur</strong> adipisicing elit. Sequi nulla obcaecati eos asperiores temporibus. Non autem tempore, voluptatem ex tenetur enim culpa accusantium? Explicabo nemo totam at corrupti corporis est voluptate autem harum, rerum inventore excepturi quod perferendis sequi illo voluptas ipsa facere suscipit nostrum delectus repudiandae quis! Expedita voluptates quod iste enim et, cupiditate tenetur. Nulla non illum incidunt quod culpa obcaecati praesentium atque, laborum possimus ratione dolores nostrum molestiae consectetur nobis id? Temporibus?</p>\r\n', '', '', '', '', '', 'Cadastre-se Agora!', '', '', 'FAV3_GUIA_DE_INVESTIMENTO_DA_QUEBRADA.pdf', '', '', 0),
(5, 'popup', '', NULL, 'Aviso', '', '', '', '', '', '', '', '', '', '', NULL, '', '', 0),
(7, 'blocos-destaques', 'e09cbe5e55d96d029cacc78cd93ada66.jpg', '4d27f0b8d72efe4f1a9248b70833e08a.jpg', 'Nossos Diferenciais', 'Por que escolher a nossa empresa? Confira nossos diferenciais', '', '', '', '', '', '', 'Cadastre-se Agora!', '', '', NULL, '', '', 0),
(8, 'contadores', '8fb94e2264d0467f5d7582a64b044379.jpg', 'd84cdbe17430a2237e0441d9bb87563d.jpg', 'Confira Nossos Números', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.', '', '', '', '', '', '', 'Cadastre-se Agora!', '', '', NULL, '', '', 0),
(9, 'chamada', 'f91c0773303c623748d4df7b1d93240d.jpg', '5bdeb7419a1c3c2c7d1110a09aa6027f.jpg', 'Oportunidade Imperdível!', '', '<p>Clique no bot&atilde;o abaixo e solicite um <strong>or&ccedil;amento</strong> de forma simples e r&aacute;pida.</p>\r\n', '', '', '', '', '', 'Cadastre-se Agora!', '', '', NULL, '', '', 0),
(10, 'depoimentos', NULL, NULL, 'Depoimentos de Clientes', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '', '', '', '', '', '', 'Cadastre-se Agora!', '', '', NULL, '', '', 0),
(11, 'clientes', NULL, NULL, 'Nossos Clientes', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '', '', '', '', '', '', 'Cadastre-se Agora!', '', '', NULL, '', '', 0),
(12, 'perguntas-frequentes', NULL, '9bfe3acdd77c92578fdac31831d01a32.jpg', 'Perguntas Frequentes', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '', '', '', '', '', '', 'Cadastre-se Agora!', '', '', NULL, '', '', 0),
(15, 'termos-de-uso', NULL, '531f814342c6c6eda52957b6a9b189b1.jpg', 'Termos de Uso', '', '', '', '', '', '', '', '', '', '', NULL, '', '', 0),
(16, 'fotos', NULL, '47986111592b07957418ef292a4f95be.jpg', 'Fotos', '', '', '', '', '', '', '', '', '', '', NULL, '', '', 0),
(17, 'videos', NULL, '5ee5fe3f0ea2a3f76af8ac6a3b4ca761.jpg', 'Vídeos', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '', '', '', '', '', '', 'Cadastre-se Agora!', '', '', NULL, '', '', 0),
(22, 'video-home', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(24, 'obrigado', NULL, '21f05ac023a9a669aa00c1d5c7e2570a.jpg', ' Cadastro Realizado!', '', '<h2 style=\"text-align:center\">Obrigado! Seu cadastro foi realizado com sucesso.</h2>\r\n\r\n<p style=\"text-align:center\">Em breve entraremos em contato para maiores informa&ccedil;&otilde;es.</p>\r\n', '', '', '', '', '', '', '', '', NULL, '', '', 0),
(26, 'newsletter', '43eb806632be60ae85fd56923a4723ec.jpg', NULL, 'Newsletter', 'Cadastre-se e fique por dentro das novidades!', '', '', '', '', '', '', 'Cadastrar', '', '', NULL, '', '', 1),
(27, 'footer', '046e5f7e7e21b817cf24ccdac0c6b741.jpg', NULL, '', '', '', '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis nemo cum commodi similique.', '', '', '', '', '', '', NULL, '', '', 0),
(28, 'produtos-home', NULL, NULL, 'Produtos em Destaque', 'Conheça nosso catálogo de produtos', '', '', '', '', '', '', '', '', '', NULL, '', '', 0),
(29, 'servicos-form', NULL, NULL, 'Solicitar Orçamento', 'Solicite um orçamento sem compromisso de forma simples e rápida. Preencha o formulário abaixo.', '', '', '', '', '', '', 'Enviar Solicitação', '', '', NULL, '', '', 0),
(30, 'unidades', NULL, '75f17410356e235ed0c7709bdc80e9c0.jpg', 'Nossas Unidades', '', '', '', '', '', '', '', '', '', '', NULL, '', '', 0),
(31, 'apresentacao', NULL, 'b1489f0464d63afee12dc6c4aabb3f10.jpg', 'Headline da <b>Landing Page</b>', 'Lorem ipsum dolor sit amet <b>consectetur adipisicing elit</b>.', '<p>Lorem ipsum dolor sit amet <strong>consectetur</strong> adipisicing elit. Natus tempora aut perspiciatis, harum, nesciunt nam ex voluptatem minus exercitationem facere animi dolorum ducimus illo optio?</p>\r\n\r\n<ul>\r\n	<li>Item lp 1dsa das</li>\r\n	<li>Item lp 2 das das</li>\r\n	<li>Item lp 3dsa dsa saudyas</li>\r\n	<li>Item lp 4dasda</li>\r\n	<li>Item lp 5</li>\r\n</ul>\r\n', '', '', '', '', '', '', '', '', NULL, '', '', 0),
(32, 'formulario', NULL, NULL, 'Cadastre-se Agora!', 'Realize seu cadastro abaixo.', '', '', '* Prometemos não utilizar suas informações de contato para enviar qualquer tipo de SPAM.', '', '', '', 'Cadastrar', '', '', NULL, '', '', 0),
(33, 'galeria', NULL, NULL, 'Galeria de fotos', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '', '', '', '', '', '', 'Cadastre-se Agora!', '', '', NULL, '', '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `paginas_blocos`
--

CREATE TABLE `paginas_blocos` (
  `id` int(11) NOT NULL,
  `pagina_id` int(11) DEFAULT NULL,
  `ordem_exibicao` int(11) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `texto` mediumtext DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `paginas_blocos`
--

INSERT INTO `paginas_blocos` (`id`, `pagina_id`, `ordem_exibicao`, `titulo`, `texto`, `foto`, `status`) VALUES
(1, 1, 1, 'Carlos Alberto', '<p>Advogado S&oacute;cio</p>\r\n', 'eb36c794c745f92753aadf224a13ad0e.png', 1),
(2, 1, 2, 'Carlos Alberto', '<p>Advogado S&oacute;cio</p>\r\n', '98a6c53536b240b5c49a10ac6fbd0862.png', 1),
(3, 1, 3, 'Carlos Alberto', '<p>Advogado S&oacute;cio</p>\r\n', '6513b1f0fd4cab7b82321451e381cc6b.png', 1),
(4, 1, 4, 'Carlos Alberto', '<p>Advogado S&oacute;cio</p>\r\n', '2cdff10252b9b48adaf96c6e5aec9044.png', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `paginas_fotos`
--

CREATE TABLE `paginas_fotos` (
  `id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `ordem_exibicao` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `destaque` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `paginas_fotos`
--

INSERT INTO `paginas_fotos` (`id`, `item_id`, `ordem_exibicao`, `foto`, `descricao`, `destaque`) VALUES
(1, 1, 1, '3fd6f29e5d5a43f1e70186708be24a45.jpg', NULL, 1),
(2, 1, 2, 'f387873bbb9a8fb026f8aeec552894e7.jpg', NULL, NULL),
(3, 1, 4, '614950debd485f6ac67aee5378f8a6cd.jpg', NULL, NULL),
(4, 1, 3, 'b9d1362e3a2b71cc08f5a8739524bfea.jpg', NULL, NULL),
(10, 33, 1, '8d55c4f88f1daba34d428fd3b5a16c2a.jpg', 'Descrição da foto', 1),
(11, 33, 2, '4de251398229b8d356da2e1c9e80f5d7.jpg', 'Descrição da foto', 0),
(12, 33, 4, 'd88a28ef1aaf54c9272a202972786504.jpg', 'Descrição da foto', 0),
(13, 33, 3, '7ceafa064c0826257058516e2c62592f.jpg', 'Descrição da foto', 0),
(14, 33, 5, '8db67c7bb4b6413b64442f0cbfea7d96.jpg', 'Descrição da foto', 0),
(15, 33, 6, '0cfb62892a015f2ce07b9e97f2aeb726.jpg', 'Descrição da foto', 0),
(16, 33, 7, '3beec92423e7a09333c1379c43d7355c.jpg', 'Descrição da foto', 0),
(17, 33, 8, '3197749843c64fc8b65319d2306c29ff.jpg', 'Descrição da foto', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sistema_conf`
--

CREATE TABLE `sistema_conf` (
  `id` int(11) NOT NULL,
  `url_base` varchar(255) DEFAULT NULL,
  `smtp_host` varchar(255) DEFAULT NULL,
  `smtp_user` varchar(255) DEFAULT NULL,
  `smtp_pass` varchar(255) DEFAULT NULL,
  `smtp_from` varchar(255) DEFAULT NULL,
  `smtp_port` varchar(100) DEFAULT NULL,
  `email_autenticado` int(2) DEFAULT NULL,
  `envio_gmail` int(1) DEFAULT NULL,
  `sp_api` int(2) DEFAULT 0,
  `sp_token` text DEFAULT NULL,
  `sp_expires` datetime DEFAULT NULL,
  `timezone` varchar(255) DEFAULT NULL,
  `expire_session` int(11) DEFAULT 1,
  `cor_principal` varchar(255) DEFAULT NULL,
  `cor_secundaria` varchar(255) DEFAULT NULL,
  `btn_principal` varchar(255) DEFAULT NULL,
  `btn_secundario` varchar(255) DEFAULT NULL,
  `cor_icheck` varchar(255) DEFAULT NULL,
  `recaptcha_key` varchar(255) DEFAULT NULL,
  `recaptcha_secret` varchar(255) DEFAULT NULL,
  `cache` varchar(100) DEFAULT NULL,
  `force_https` int(1) DEFAULT NULL,
  `force_www` int(1) DEFAULT NULL,
  `manutencao` int(1) DEFAULT 0,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `sistema_conf`
--

INSERT INTO `sistema_conf` (`id`, `url_base`, `smtp_host`, `smtp_user`, `smtp_pass`, `smtp_from`, `smtp_port`, `email_autenticado`, `envio_gmail`, `sp_api`, `sp_token`, `sp_expires`, `timezone`, `expire_session`, `cor_principal`, `cor_secundaria`, `btn_principal`, `btn_secundario`, `cor_icheck`, `recaptcha_key`, `recaptcha_secret`, `cache`, `force_https`, `force_www`, `manutencao`, `status`) VALUES
(1, 'https://ellosdesignprojetos.com.br/baselp/', 'smtp-pulse.com', 'projetos@ellosdesign.com.br', '6GdKQiLDcN2rZ', 'naoresponder@sitemail.com.br', '465', 1, 0, 0, NULL, NULL, 'America/Sao_Paulo', 1, '#222', '#ff8727', '#ff8727', '#ff8727', '#ff8727', '6LcFEOQpAAAAAI7Klmb2l1mKRnGf_ff6VdMk19F7', '6LcFEOQpAAAAAGiRFOQSWFOdF_Pt3Uwq8jSkxt8D', '1', 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `ordem_exibicao` int(11) DEFAULT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `foto_mb` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `exibe_conteudo` int(11) DEFAULT NULL,
  `alinha_conteudo` varchar(100) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `subtitulo` varchar(255) DEFAULT NULL,
  `texto` varchar(255) DEFAULT NULL,
  `botao` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `tipo_link` varchar(100) DEFAULT NULL,
  `data_cad` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `slide`
--

INSERT INTO `slide` (`id`, `ordem_exibicao`, `tipo`, `foto`, `foto_mb`, `video`, `exibe_conteudo`, `alinha_conteudo`, `titulo`, `subtitulo`, `texto`, `botao`, `url`, `tipo_link`, `data_cad`, `status`) VALUES
(1, 1, 'background', 'd40421ecfaff815e0a0d52d6db322df1.jpg', NULL, NULL, 1, 'center', 'Sobre a Empresa', 'Somos Referência', 'Conte com uma empresa com mais de 10 anos de experiência no mercado.', 'Saiba Mais', '', 'Sem URL', '2022-08-13', 1),
(2, 2, 'background', '98019c674ea3bfe8611a8f7fb394a6c2.jpg', NULL, NULL, 1, 'center', 'Conheça Nossas Soluções', NULL, 'Confira as soluções ideais para você!', 'Confira Agora!', '', 'Sem URL', '2022-08-13', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `admin_acessos`
--
ALTER TABLE `admin_acessos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `admin_avisos`
--
ALTER TABLE `admin_avisos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `admin_categorias_niveis`
--
ALTER TABLE `admin_categorias_niveis`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `admin_conf`
--
ALTER TABLE `admin_conf`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `admin_failed_logins`
--
ALTER TABLE `admin_failed_logins`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `admin_logos`
--
ALTER TABLE `admin_logos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `admin_niveis`
--
ALTER TABLE `admin_niveis`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `admin_scripts`
--
ALTER TABLE `admin_scripts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `admin_visitas`
--
ALTER TABLE `admin_visitas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `admin_wpp_clicks`
--
ALTER TABLE `admin_wpp_clicks`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `blocos_home`
--
ALTER TABLE `blocos_home`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ordem_exibicao` (`ordem_exibicao`);

--
-- Índices para tabela `paginas`
--
ALTER TABLE `paginas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `paginas_blocos`
--
ALTER TABLE `paginas_blocos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`pagina_id`);

--
-- Índices para tabela `paginas_fotos`
--
ALTER TABLE `paginas_fotos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sistema_conf`
--
ALTER TABLE `sistema_conf`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ordem_exibicao` (`ordem_exibicao`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `admin_acessos`
--
ALTER TABLE `admin_acessos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `admin_avisos`
--
ALTER TABLE `admin_avisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `admin_categorias_niveis`
--
ALTER TABLE `admin_categorias_niveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT de tabela `admin_conf`
--
ALTER TABLE `admin_conf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `admin_failed_logins`
--
ALTER TABLE `admin_failed_logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `admin_logos`
--
ALTER TABLE `admin_logos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `admin_niveis`
--
ALTER TABLE `admin_niveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `admin_scripts`
--
ALTER TABLE `admin_scripts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `admin_visitas`
--
ALTER TABLE `admin_visitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `admin_wpp_clicks`
--
ALTER TABLE `admin_wpp_clicks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `blocos_home`
--
ALTER TABLE `blocos_home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `paginas`
--
ALTER TABLE `paginas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `paginas_blocos`
--
ALTER TABLE `paginas_blocos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `paginas_fotos`
--
ALTER TABLE `paginas_fotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `sistema_conf`
--
ALTER TABLE `sistema_conf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
