<style type="text/css">
.style1 {
	text-align: left;
}
</style>
<?php
					/*
					$ip=@$_SERVER['REMOTE_ADDR'];
					$referrer=@$_SERVER['HTTP_REFERER'];
					$useragent=@$_SERVER['HTTP_USER_AGENT'];
					$mes=date('m');
					$dia=date('j');
					$ano= date('Y');
					$hora=date('h:i:s');
					echo "<br/>mes:" . date('m');
					echo "<br/>dia:" . date('j');
					echo "<br/>ano:" . date('Y');
					echo "<br/>hora:" . date('h:i:s');
					
					echo "IP: ".$ip; 
					echo "<br>Referrer: ".$referrer;
					echo "<br>User-Agent: ".$useragent;
					*/
					
require "/home/cripto/testar_autenticacao3.php";
?>
<!doctype html>
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
	<title>iKNOW, OSINT!</title>
	
	<meta content="pt-pt" http-equiv="Content-Language" />
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="index, follow">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--> <html lang="pt-pt" class="no-js"> <!--<![endif]-->

	<!-- Icons -->
	<link rel="shortcut icon" href="img/favicons/favicon.ico">
	<link rel="apple-touch-icon" href="img/favicons/favicon.ico">
		
	<!-- CSS Styles -->
	<link rel="stylesheet" href="css/screen.css">
	<link rel="stylesheet" href="css/colors.css">
	<link rel="stylesheet" href="css/jquery.tipsy.css">
	<link rel="stylesheet" href="css/jquery.wysiwyg.css">
	<link rel="stylesheet" href="css/jquery.datatables.css">
	<link rel="stylesheet" href="css/jquery.nyromodal.css">
	<link rel="stylesheet" href="css/jquery.datepicker.css">
	<link rel="stylesheet" href="css/jquery.fileinput.css">
	<link rel="stylesheet" href="css/jquery.fullcalendar.css">
	<link rel="stylesheet" href="css/jquery.visualize.css">
	<link rel="stylesheet" href="css/jquery.snippet.css">
	
	<!-- Modernizr adds classes to the <html> element which allow you to target specific browser functionality in your stylesheet -->
	<script src="js/libs/modernizr-1.7.min.js"></script>

	<!-- ABRIR IMAGENS NUMA NOVA JANELa. CHAMADO aqui para ser chamado varias vezes..-->
	<script language="javascript">
	function OpenNewWindow(bigurl, width, height,link)
	{
	    var newWindow = window.open("", this.href, 
	        "location=no, directories=no, fullscreen=no, " + 
	        "menubar=no, status=no, toolbar=no, width=" + 
	        width + ", height=" + height + ", scrollbars=no");
	        
	    newWindow.document.writeln("<html>");
	    newWindow.document.writeln("<body style='margin: 0 0 0 0;'>");
	    //newWindow.document.writeln("<a href='javascript:window.close();'>");
	    newWindow.document.writeln("Clique na imagem para abrir o site ou ");
	    newWindow.document.writeln("<a href='javascript:window.close();'> AQUI para fechar</a><br/>");
	    newWindow.document.writeln("O tamanho desta janela está adaptado ao tamanho do site que aqui pode abrir<br/> ");
	    newWindow.document.writeln("<a href='"+ link + "'><img src='" + bigurl + "' alt='Clique para abrir site' id='bigImage'/></a>");
	    newWindow.document.writeln("</body></html>");
	    newWindow.document.close();
	}
	</script>	
	
</head>
<body class="fixed">
<?php
							//nr tickets pessoal
								$result = mysqli_query($mysqli, "SELECT *,COUNT(DISTINCT(tickets_id)) FROM tickets where tickets_idutilizador = " . $_SESSION['user_id'] . " ");   
									while($row = mysqli_fetch_array($result))
									{  
										$TicketsPessoal=$row['COUNT(DISTINCT(tickets_id))'];
									}
									//echo $TicketsPessoal; 
									$result = mysqli_query($mysqli, "SELECT *,COUNT(DISTINCT(operacoes_id)) FROM operacoes where operacoes_feito='0' and operacoes_idutilizador='".$id . "'");  
									while($row = mysqli_fetch_array($result))
									{  
										$operacoesfeitas=$row['COUNT(DISTINCT(operacoes_id))'];
									}	
							//numero de users
									$result = mysqli_query($mysqli, "SELECT *,COUNT(DISTINCT(utilizador_id)) FROM utilizadores");  
									while($row = mysqli_fetch_array($result))
									{  
										$utilizadores=$row['COUNT(DISTINCT(utilizador_id))']."</h2>";
									}	


							//total de operacoes por fazer geral
									$result = mysqli_query($mysqli, "SELECT *,COUNT(DISTINCT(operacoes_id)) FROM operacoes");  
									while($row = mysqli_fetch_array($result))
									{  
										$operacoes=$row['COUNT(DISTINCT(operacoes_id))'];
									}
							//maquinas
									$totalmaquinas=0;
									$result = mysqli_query($mysqli, "SELECT *,COUNT(DISTINCT(maquinas_nome)) FROM maquinas");  
								
									//$result = mysqli_query($mysqli, "SELECT *,COUNT(DISTINCT(resultado_id)),COUNT(resultado_data) FROM resultados where resultado_utilizador like '" . $utilizador ."'");  
									while($row = mysqli_fetch_array($result))
									{  
										$total_maquinas=$row['COUNT(DISTINCT(maquinas_nome))'];
										$totalmaquinas=$total_maquinas;
									}	
							//numero de visitantes
									$result = mysqli_query($mysqli, "SELECT *,COUNT(DISTINCT(id)) FROM visitantes");  
									//$result = mysqli_query($mysqli, "SELECT *,COUNT(DISTINCT(resultado_id)),COUNT(resultado_data) FROM resultados where resultado_utilizador like '" . $utilizador ."'");  
									while($row = mysqli_fetch_array($result))
									{  
										$visitantes= $row['COUNT(DISTINCT(id))'];
									}
?>



	<!-- Header -->
	<header id="navigation">

		<!-- contentor da nav -->
		<div class="navigation-wrapper">
		
			<!-- logotipo tem de ser mudado -->
			<a id="logo" href="index.php" title="Página inicial">Página Inicial</a>
			
			<!-- caixa de navegacao superior -->
			<nav id="nav-main">
			
				<!-- barra de cima-->
				<ul id="nav-main-navigation">
					<li><a href="graficos.php" title="">Dashboard</a></li>
					<li><a href="#submenu-1" title="" class="nav-main-subnav">Navegação</a></li>
					<li><a href="#submenu-2" title="" class="nav-main-subnav">Operações</a><span class="small-notification"><?php echo $operacoesfeitas;?></span></li>
					<li><a href="#submenu-3" title="" class="nav-main-subnav">Tickets</a><span class="small-notification"><?php echo $TicketsPessoal;?></span></li>
					<li><a href="#submenu-5" title="" class="nav-main-subnav">eXPeriências</a></li>				</ul>
				<!-- /barra de cima-->
				
				<!-- caixa sup direito user -->
				<ul id="nav-main-user">
					<li>Bem-vindo, <a href="areapessoal.php" title="Área pessoal"><?php echo $_SESSION['nome'];?></a></li>
					<li><a href="tickets.php#sidetab5" title="Notas" class="actions"><img alt="Tickets" src="img/icons/icon_user_message.png"></a></li>
					<li><a href="areapessoal.php" title="Área pessoal" class="actions"><img alt="Definições" src="img/icons/icon_user_settings.png"></a></li>
					<li><a href="logout.php" title="Logout" class="actions"><img alt="Sair/Logout" src="img/icons/icon_user_logout.png"></a></li>
				</ul>
				<!-- /caixa sup direito user -->
				
			</nav>
			<!-- Sub Navegacao-->
								<!-- tomas teste de insert -->
					<?php include('a-menutopo.php');?>
					<!-- fim teste-->
			
		</div>
	</header>
	<!-- /Header -->
	
	<!-- Main Content -->
	<section role="main" class="page-wrapper">
	
		<!-- Dashboard -->
		<section id="dashboard">
			<h1>iKNOW, OSINT!</h1>
			
			<!-- Breadcumbs nesta página ficam de fora-->
			<ul id="breadcrumbs">
				<li><a href="index.php" title="Voltar à página inicial">Página inicial</a></li>
				<li>está aqui</li-->
			</ul>
			<!-- /Breadcumbs -->
			
			<!-- Nav atalhos -->
					<!-- tomas teste de insert -->
					<?php #require('a-menugeral.php');?>
					<meta content="pt-pt" http-equiv="Content-Language" charset="UTF-8" lang="pt-pt">
				<ul class="shortcuts">
					<li class="shortcut-settings"><a href="index.php" title="">Página Inicial</a></li>
					<li class="shortcut-tickets"><a href="operacoes.php" title="">Operações</a></li>
					<li class="shortcut-contacts"><a href="utilizadores.php" title="">Utilizadores</a></li>
					<li class="shortcut-sales"><a href="estatisticas.php" title="">Gráficos,stats,visitas</a></li>
					<li class="shortcut-looong"><a href="codigo.php" title="">Código</a></li>
					<li class="shortcut-contacts"><a href="maquinas-temp.php" title="">Máquinas</a></li>
					<li class="shortcut-articles"><a href="areapessoal.php" title="">Definições,Área Pessoal</a><span class="small-notification">Nyet</span></li>
					<li class="shortcut-articles"><a href="logs.php" title="">Logs</a><span class="small-notification">47</span></li>
					<li class="shortcut-tickets"><a href="osint_europol.php" title="">OSINT-Europol</a></li>
					<li class="shortcut-tickets"><a href="osint_jornais.php" title="">OSINT-Jornais</a></li>
					
				</ul>
					<!-- fim teste-->
			<!-- /Nav atalhos -->
		</section>
		<!-- /Dashboard -->
		
		<!-- Full width content box with minimizer -->
		<article class="content-box">
			<header>
				<h2>iKNOW - OSINT</h2>
			</header>
			<section>
			
				<!-- Tab Content #tab1 -->
				<div class="style1" id="tab1">
					<h3></h3>
					<div class="dataTables_empty">
					<code style="width: 858px">
					<h3>Tese e Projecto</h3>
					
					- Investigar o OSINT, suas potencialidades e limitações<br/>
					- Criar casos práticos do uso de OSINT para obtenção de informações<br/>
					- Usar automatização OSINT para gerar nova informação<br/>
					- Conhecer os limites da utilização legal<br/>
					- Espionagem vs OSINT (fontes fechadas vs fontes abertas)<br/>
					- Os diversos ramos das informações<br/></code>
					<br/><br/><br/>
					
					</div>
					
					<table class="data" data-chart="line">
						<thead>
							<tr>
								<td></td>
								<th scope="col">Antes</th>
								<th scope="col">22-5-2015</th>
								<th scope="col">23-5</th>
								<th scope="col">24-5</th>
								<th scope="col">25-5</th>
								<th scope="col">26-5</th>
								<th scope="col">27-5</th>
								<th scope="col">28-5</th>
								<th scope="col">29-5</th>
								<th scope="col">30-5</th>
								<th scope="col">21-7</th>
								<th scope="col">15-8</th>
								<th scope="col">19-8</th>
								<th scope="col">7-11</th>
								<th scope="col">10-11</th>
								<th scope="col">03-07</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row">SITE</th>
								<td>02</td>
								<td>05</td>
								<td>07</td>
								<td>08</td>
								<td>08</td>
								<td>09</td>
								<td>10</td>
								<td>15</td>
								<td>15</td>
								<td>15</td>
								<td>15</td>
								<td>17</td>
								<td>18</td>
								<td>18</td>
								<td>18</td>
								<td>20</td>
								<td>25</td>
							</tr>
							<tr>
								<th scope="row">Crawler</th>
								<td>05</td>
								<td>05</td>
								<td>05</td>
								<td>05</td>
								<td>05</td>
								<td>05</td>
								<td>05</td>
								<td>08</td>
								<td>09</td>
								<td>09</td>
								<td>09</td>
								<td>09</td>
								<td>09</td>
								<td>10</td>
								<td>11</td>
								<td>11</td>
								<td>11</td>
							</tr>
							<tr>
								<th scope="row">GPS</th>
								<td>02</td>
								<td>02</td>
								<td>02</td>
								<td>02</td>
								<td>02</td>
								<td>02</td>
								<td>02</td>
								<td>02</td>
								<td>02</td>
								<td>02</td>
								<td>02</td>
								<td>02</td>
								<td>02</td>
								<td>03</td>
								<td>04</td>
								<td>04</td>
								<td>05</td>
							</tr>
						</tbody>
					</table>
					<!-- /evol trab-->
						<!-- sucesso -->
						<div class="notification success">
							<a href="#" class="close-notification tooltip" title="Esconder">x</a>
							<h4>O que se tem conseguido..</h4>
							<p>O que tem sido feito,o que tem corrido bem, progressos..</p>
							<a href="#" class="show-notification-details">&#9658; Ver Detalhes</a>
							<ul class="notification-details">
								<li>2016-07-03</li>
									<ul>
										<li>Novas estatisticas e bug fixing</li>
										<ul>
											<li>estatisticas melhoradas</li>
											<li>Envio e armazenamento de informações é feito por BASE64</li>
											<li>Codificação de dados na base de dados por Blowfish</li>
										</ul>
									</ul>									<li>2016-04-10</li>
									<ul>
										<li>Página Máquinas - bug fixing:</li>
										<ul>
											<li>actualizações maradas dos progs. levaram a erros bizantinos nas temperaturas</li>
											<li>Novas actualizações vieram a corrigir</li>
											<li>Problema resolvido: variavel nao dava todos as ops mas apenas aquelas por fazer. $operacoestotal vs $operacoestotalpessoal. Convem confirmar isto..</li>
										</ul>
									</ul>	
								<li>2016-03-03</li>
									<ul>
										<li>Actualizações de HARDWARE</li>
										<ul>
											<li>Servidor 31 é agora um raspberry 3</li>
										</ul>										
									</ul>								<li>2016-02-03</li>
									<ul>
										<li>Actualizações de HARDWARE</li>
										<ul>
											<li>Todos os raspberrys 2 entraram em funcionamento</li>
										</ul>

								<li>2016-02-01</li>
									<ul>
										<li>Actualizações de software e BD's</li>
										<ul>
											<li>Mudança para MariaDB</li>
										</ul>										
									</ul>									
									<li>24-11-2015</li>
									<ul>
										<li>Página OPERACOES - bug fixing:</li>
										<ul>
											<li>potencialmente resolvida</li>
											<li>Deve ser trocada operacoes.php por operacoes-2.php</li>
											<li>Espaço no topo corrigido</li>
											<li>Problema resolvido: variavel nao dava todos as ops mas apenas aquelas por fazer. $operacoestotal vs $operacoestotalpessoal. Convem confirmar isto..</li>
										</ul>
									</ul>
								<li>07-11-2015</li>
									<ul>
										<li>Crawler. Módulo GPS:</li>
										<ul>
											<li>Acrescentado código.</li>
											<li>pasta a-imagens-e-gps:</li>
											<li> baixar_imagens.sh - baixar imagens para pasta pre-definida. Tipo de imagens: jpeg</li>
											<li> sacar_imagem0.py - Faz uso do PIL. Detecta GPS e faz a extracção de imagens e coords. Dá url Google</li>
											<li>Permite agora</li>
										</ul>
									</ul>

								<li>24-07-2015</li>
									<ul>
										<li>Melhoradas estatisticas</li>
										<li>Introdução de estatisticas de temperatura na página Máquinas</li>
										<li>Colocar o código html:<p><li>Bem-vindo, <a href="utilizador.php?id=<?php echo $_SESSION['user_id'];?>" title=""><?php echo $_SESSION['nome'];?></a></li></p>
									</ul>
								<li>22 e 23-07-2015</li>
									<ul>
										<li>Melhoradas estatisticas</li>
										<li>Introdução de estatisticas de temperatura na página Máquinas</li>
									</ul>
								<li>21-07-2015</li>
									<ul>
										<li>Corrigidos bugs na página estatisticas por utilizador.</li>
										<li>Estatisticas-admin ainda precisa de reparos na página</li>
									</ul>
								
								<li>30-5-2015</li>
									<ul>NAO ESQUECER DE COLOCAR ISTO EM TODAS AS PÁGINAS
										<li>< meta http-equiv="refresh" content="30" ></li>
										<li>< meta charset="UTF-8" ></li>
										<li> incluido date_default_timezone_set("Portugal"); no autenticar3 </li>
										<li> $timezone = date_default_timezone_get(); </li>

										<li>maquinas.php</li>
										<li>maquina.php</li>
									</ul>
								<li>29-5-2015</li>
									<ul>Páginas
										<li>...</li>
										<li>index-2-calendario.php - precisa de ser melhorado - intro de datas e eventos</li>
										<li>index-2-codigo.php - inserir codigo dos raspberrys</li>
									</ul>
								<li>28-5-2015</li>
									<ul>Páginas
										<li>index-2-calendario.php - precisa de ser melhorado - intro de datas e eventos</li>
										<li>index-2-codigo.php - inserir codigo dos raspberrys</li>
									</ul>
									<ul>Raspberrys
										<li>Ligação ao site por raspberrys remotos</li>
										<li>Criação de pasta e ficheiro com instruções dos comandos mysql - lado servidor</li>
										<li>script de instalação - instalar_python-mysqldb.sh </li>
										<li>script automático de actualização de ip - pi_actualizar_servidor.py</li>
										<li>script automático de registo de ip - pi_registar_maquina_servidor.py</li>
									</ul>
								<li>27-5-2015</li>
									<ul>Páginas
										<li>index-2-resultados.php</li>
										<li>definicoes.php - nova pagina</li>
										<li>Substituição de paxs.php e paxs1.php por testar_autenticacao3.php</li>
										<li>dados-introducao.php -paxs1,nao precisa,testar_autenticacao3.php</li>
										<li>testar_autenticacao3.php</li>
										<li>utilizadores.php</li>
										<li>index-2-visitantes.php</li>
										<li>index-2-estatisticas.php</li>
										<li>utilizadores.php</li>
									</ul>
								<li>25-5-2015</li>
									<ul>Páginas
										<li>login.php</li>
										<li>registar.php</li>
										<li>registar.php</li>
										<li>testar_autenticacao2.php</li>
										<li>processssarregisto.php</li>
										<li>processarlogin.php</li>
										<li>logout.php</li>

									</ul>
								<li>24-5-2015</li>
									<ul>index2-php
										<li>gráfico tese</li>
										<li>gráfico projecto</li>
									</ul>
								<ul>index-2-visitantes.php
										<li>gráfico tese</li>
										<li>gráfico projecto</li>
									</ul>
							</ul>
							<ul class="notification-details">
								<li>24-5-2015</li>
								<li>Lorem ipsum dolor sit amet</li>
								<li>Suspendisse et dignissim metus</li>
								<li>Maecenas id augue ac metus tempus</li>
								<li>Sed pharetra placerat est suscipit</li>
								<li>Phasellus aliquam males</li>
								<li>Nunc at dui id purus lacinia tincidunt</li>
								<li>index2-php</li>
									<li>gráfico tese</li>
									<li>gráfico projecto</li>
							<li>index-2-visitantes.php</li>
									<li>gráfico tese</li>
									<li>gráfico projecto</li>
							</ul>
						</div>
						<!-- /Notification -->
						<!-- Notification -->
						<div class="notification error">
							<a href="#" class="close-notification tooltip" title="Esconder">x</a>
							<h4>Obstáculos a transpor</h4>
							<p><span lang="pt-br">Problemas e chatices... <br>
							</span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.</p>
							<a href="#" class="show-notification-details">&#9658; Ver Detalhes</a>
							<ul class="notification-details">							
								<li>24-11-2015</li>
									<ul> Operações
										<li>Muito texto estraga APENAS A TABELA REGISTOS DETALHADOS!??!?!!?</li>
									</ul>
									<ul>Definições e área pessoal
										<li>Poucas informações</li>
										<li>Nenhuma configuração</li>
									</ul>
									<ul>Mensagens
										<li>Ainda não existe</li>
									</ul>
									<ul>Calendário
										<li>Ainda não tem eventos inseridos. Apenas obtidos de fora</li>
									</ul>
									<ul>Resultados / Operações
										<li>tabela não entra totalmente. Falta encaixar/redimensionar texto..</li>
										<li>página operações está a descair relativamente a outras1!!!! --- USAR A OPERACOESV3 -> OPERACOOES.PHP</li>
									</ul>
								<li>27-5-2015</li>
									<ul>index2-php
										<li>visitors_connections.php - ereg deprecado</li>
									</ul>				
								<li>24-5-2015</li>
									<ul>index2-php
										<li>gráfico tese</li>
										<li>gráfico projecto</li>
									</ul>
									<ul>index2-php
										<li>gráfico tese</li>
										<li>gráfico projecto</li>
									</ul>
							</ul>
						</div>

					<!-- /Notification -->
				
					<h2>Evolução da tese</h2>
					<table class="data" data-chart="line">
						<thead>
							<tr>
								<td></td>
								<th scope="col">Antes</th>
								<th scope="col">24-5</th>
								<th scope="col">01-6</th>
								<th scope="col">01-7</th>
								<th scope="col">01-8</th>
								<th scope="col">01-9</th>
								<th scope="col">04-10</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row">Escrita</th>
								<td>4</td>
								<td>0</td>
								<td>0</td>
								<td>0</td>
								<td>0</td>
								<td>0</td>
								<td>5</td>
							</tr>
							<tr>
								<th scope="row">Revisão</th>
								<td>1</td>
								<td>0</td>
								<td>0</td>
								<td>0</td>
								<td>0</td>
								<td>0</td>
								<td>0</td>
							</tr>
							<tr>
								<th scope="row">Fontes</th>
								<td>5</td>
								<td>0</td>
								<td>0</td>
								<td>0</td>
								<td>0</td>
								<td>0</td>
								<td>0</td>
							</tr>
							<tr>
								<th scope="row">Imagens etc</th>
								<td>2</td>
								<td>0</td>
								<td>0</td>
								<td>0</td>
								<td>0</td>
								<td>0</td>
								<td>1</td>
							</tr>
						</tbody>
					</table>
				
				
				</pre>
				</div>
				<!-- /Tab Content #tab1 -->						
						<!-- erro 
						<div class="notification error">
							<a href="#" class="close-notification tooltip" title="Esconder">x</a>
							<h4>Notificação de erro</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.</p>
							<a href="#" class="show-notification-details">&#9658; Mostrar Detalhes</a>
							<ul class="notification-details">
								<li>Lorem ipsum dolor sit amet</li>
								<li>Suspendisse et dignissim metus</li>
								<li>Maecenas id augue ac metus tempus</li>
								<li>Sed pharetra placerat est suscipit</li>
								<li>Phasellus aliquam males</li>
								<li>Nunc at dui id purus lacinia tincidunt</li>
							</ul>
						</div>
						<!-- /erro -->
						
						<!-- sucesso -->
						<div class="notification success">
							<a href="#" class="close-notification tooltip" title="Esconder">x</a>
							<h4>O que se tem feito..</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.</p>
							<a href="#" class="show-notification-details">&#9658;Ver Detalhes</a>
							<ul class="notification-details">
								<li>Lorem ipsum dolor sit amet</li>
								<li>Suspendisse et dignissim metus</li>
								<li>Maecenas id augue ac metus tempus</li>
								<li>Sed pharetra placerat est suscipit</li>
								<li>Phasellus aliquam males</li>
								<li>Nunc at dui id purus lacinia tincidunt</li>
							</ul>
						</div>
						<!-- /sucesso -->
						
						<!-- informação -->
						<div class="notification information">
							<a href="#" class="close-notification tooltip" title="Esconder">x</a>
							<h4>Sugestões e opções</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.</p>
							<a href="#" class="show-notification-details">&#9658; Ver Detalhes</a>
							<ul class="notification-details">
								<li>Lorem ipsum dolor sit amet</li>
								<li>Suspendisse et dignissim metus</li>
								<li>Maecenas id augue ac metus tempus</li>
								<li>Sed pharetra placerat est suscipit</li>
								<li>Phasellus aliquam males</li>
								<li>Nunc at dui id purus lacinia tincidunt</li>
							</ul>
						</div>
						<!-- /informação -->
						
						<!-- atenção --
						<div class="notification attention">
							<a href="#" class="close-notification tooltip" title="Esconder">x</a>
							<h4>Notificação de atenção</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero. Suspendisse et dignissim metus. Maecenas id augue ac metus tempus aliquam.</p>
						</div>
						<!-- /atenção -->
						
						<!-- nota -->
						<div class="notification note">
							<a href="#" class="close-notification tooltip" title="Esconder">x</a>

							<h4>Nota</h4>
							<p>lacerat est suscipit sagittis.</p>
						</div>
						<!-- /nota -->
						
						
						
						<!-- teste - osints no centro. -->
				<h3>OSINT - FlighRadar - Aviação</h3>
				<p>Acompanhamento de aviões maritimas a partir do site
				e com detalhes sobre as embarcações, destinos, partidas, imagens, etc</p>

				<!-- com acções -->
				<div class="image-frame right">
				<!--
						<a href="http://www.flightradar24.com/38.71,-9.14/7">
							<img src="imagens/flightradar24.jpg" width="400" height="250"/>
						</a>											
					<ul class="image-actions">
						<li class="image-actions-header">Opções</li>
						<li><a href="#">Ver</a></li>
						<li><a href="#">Editar</a></li>
						<li><a href="#">Apagar</a></li>
					</ul>
				-->
					<a onclick="OpenNewWindow('imagens/flightradar24.jpg', 900, 600,'http://www.flightradar24.com/38.71,-9.14/7'); return true;"><img src="imagens/flightradar24.jpg" width="400" height="250" /></a>
				</div>
				<!-- /acções -->
					<ol>
						<li>Lorem ipsum dolor sit amet</li>
						<li><strong>Consectetur adipiscing elit</strong></li>
						<li><em>Suspendisse et dignissim metus</em></li>
						<li>Maecenas id <a href="#">augue ac metus</a> tempus</li>
						<li>Nunc at dui id purus lacinia
							<ol>
								<li>Lorem ipsum dolor sit amet</li>
								<li>Consectetur adipiscing elit</li>
								<li>Suspendisse et dignissim metus</li>
								<li>Phasellus aliquam
									<ol>
										<li>Lorem ipsum dolor sit amet</li>
										<li>Consectetur adipiscing elit</li>
									</ol>
								</li>
							</ol>
						</li>
						<li>Sed pharetra placerat est suscipit</li>
					</ol>
				<br/><br/>
				
				<h3>OSINT - Norse - Ataques informáticos</h3>
				<p>A ideia aqui é ter estatisticas do trabalho feito..</p>
				<!-- velocidade... nao queremos aqui atrasar a leitura do site mas funciona..
				<div class="image-frame right">
						<iframe src="http://map.norsecorp.com/" width="400" height="250">
						  <p>Browser sem suporte a iframes..</p>
						</iframe>												
				</div>
				-->
					<div class="image-frame right">
					<!--
						<a href="http://map.norsecorp.com/" target="_blank">
								<img src="imagens/norse.jpg" width="400" height="250"/>
							</a>											
						<ul class="image-actions">
							<li class="image-actions-header">Opções</li>
							<li><a href="#">Ver</a></li>
							<li><a href="#">Editar</a></li>
							<li><a href="#">Apagar</a></li>
						</ul>
					-->
						<a target="_blank" onclick="OpenNewWindow('imagens/norse.jpg', 900, 600,'http://map.norsecorp.com/'); return true;"><img src="imagens/norse.jpg" width="400" height="250" /></a>
					</div>
					<ol>
						<li>Lorem ipsum dolor sit amet</li>
						<li><strong>Consectetur adipiscing elit</strong></li>
						<li><em>Suspendisse et dignissim metus</em></li>
						<li>Maecenas id <a href="#">augue ac metus</a> tempus</li>
						<li>Nunc at dui id purus lacinia
							<ol>
								<li>Lorem ipsum dolor sit amet</li>
								<li>Consectetur adipiscing elit</li>
								<li>Suspendisse et dignissim metus</li>
								<li>Phasellus aliquam
									<ol>
										<li>Lorem ipsum dolor sit amet</li>
										<li>Consectetur adipiscing elit</li>
									</ol>
								</li>
							</ol>
						</li>
						<li>Sed pharetra placerat est suscipit</li>
					</ol>
				<br/><br/>

				<h3>OSINT - Marinetraffic - Embarcações</h3>
				<p>Acompanhamento de embarcações maritimas a partir do site
				e com detalhes sobre as embarcações, destinos, partidas, imagens, etc</p>
					<div class="image-frame right">
						<a onclick="OpenNewWindow('imagens/marinetraffic2.jpg', 900, 600,'https://www.marinetraffic.com/pt/ais/home/centerx:-9/centery:39/zoom:10'); return true;"><img src="imagens/marinetraffic2.jpg" width="400" height="250" /></a>
					</div>
					<ol>
						<li>Lorem ipsum dolor sit amet</li>
						<li><strong>Consectetur adipiscing elit</strong></li>
						<li><em>Suspendisse et dignissim metus</em></li>
						<li>Maecenas id <a href="#">augue ac metus</a> tempus</li>
						<li>Nunc at dui id purus lacinia
							<ol>
								<li>Lorem ipsum dolor sit amet</li>
								<li>Consectetur adipiscing elit</li>
								<li>Suspendisse et dignissim metus</li>
								<li>Phasellus aliquam
									<ol>
										<li>Lorem ipsum dolor sit amet</li>
										<li>Consectetur adipiscing elit</li>
									</ol>
								</li>
							</ol>
						</li>
						<li>Sed pharetra placerat est suscipit</li>
					</ol>
				<br/><br/>
				
				<h3>OSINT - ThreatCloud - Ataques informáticos</h3>
				<p>Ilustração dos ataques a decorrer neste momento segundo o site da Checkpoint</p>
					<div class="image-frame right">
							<!-- script de imagem
							<a href="#" onclick="OpenNewWindow('imagens/checkpoint.jpg', 500, 500); return true;">
							   <img src="imagens/checkpoint.jpg" alt="Clique para ver maior" width="400" height="250"/>
							</a>
																		
						<ul class="image-actions">
							<li class="image-actions-header">Opções</li>
							<li><a href="#">Ver</a></li>
							<li><a href="#">Editar</a></li>
							<li><a href="#">Apagar</a></li>
						</ul>
						-->
						<a onclick="OpenNewWindow('imagens/checkpoint.jpg', 600, 600,'https://www.threat-cloud.com/ThreatPortal/#/map'); return true;"><img src="imagens/checkpoint.jpg" width="400" height="250" /></a>
					</div>

				<!-- nao queremos ir aqui buscar animação que compromete velocidade
				<div class="image-frame right">
						<iframe src="https://www.threat-cloud.com/ThreatPortal/#/map" width="400" height="350">
						  <p>Browser sem suporte a iframes..</p>
						</iframe>	
				</div>
				-->
				<ol>
					<li>Lorem ipsum dolor sit amet</li>
					<li><strong>Consectetur adipiscing elit</strong></li>
					<li><em>Suspendisse et dignissim metus</em></li>
					<li>Maecenas id <a href="#">augue ac metus</a> tempus</li>
					<li>Nunc at dui id purus lacinia
						<ol>
							<li>Lorem ipsum dolor sit amet</li>
							<li>Consectetur adipiscing elit</li>
							<li>Suspendisse et dignissim metus</li>
							<li>Phasellus aliquam
								<ol>
									<li>Lorem ipsum dolor sit amet</li>
									<li>Consectetur adipiscing elit</li>
								</ol>
							</li>
						</ol>
					</li>
					<li>Sed pharetra placerat est suscipit</li>
				</ol>
				<br/><br/>


				<h3>OSINT - Google Maps - Geolocalização</h3>
				<p>Acompanhamento de embarcações maritimas a partir do site
				e com detalhes sobre as embarcações, destinos, partidas, imagens, etc</p>
					<div class="image-frame right">
						<a onclick="OpenNewWindow('imagens/gmaps.jpg', 900, 600,'mapa2.php?coords=37.0849609167,-8.68427941667'); return true;">
						<img src="imagens/gmaps.jpg" width="200" height="150" /></a>
						
						<a onclick="OpenNewWindow('imagens/gmaps2.jpg', 600, 600,'https://www.google.pt/maps/@38.7180651,-9.1588684,10.5z'); return true;">
						<img src="imagens/gmaps2.jpg" width="200" height="150" /></a>
					</div>
					<ol>
						<li>Lorem ipsum dolor sit amet</li>
						<li><strong>Consectetur adipiscing elit</strong></li>
						<li><em>Suspendisse et dignissim metus</em></li>
						<li>Maecenas id <a href="#">augue ac metus</a> tempus</li>
						<li>Nunc at dui id purus lacinia
							<ol>
								<li>Lorem ipsum dolor sit amet</li>
								<li>Consectetur adipiscing elit</li>
								<li>Suspendisse et dignissim metus</li>
								<li>Phasellus aliquam
									<ol>
										<li>Lorem ipsum dolor sit amet</li>
										<li>Consectetur adipiscing elit</li>
									</ol>
								</li>
							</ol>
						</li>
						<li>Sed pharetra placerat est suscipit</li>
					</ol>
											
				</div>
				<!--/ teste - osints no centro. -->
						
						
					</div>
					<!-- /Side Tab Content #sidetab1 -->

			</section>
			<footer>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum aliquet nisi ac risus tincidunt gravida. Cras imperdiet mattis nisl et suscipit.</footer>
		</article>
		<!-- /Full width content box with minimizer -->
		
		<div class="clearfix"></div> <!-- We're really sorry for this, but because of IE7 we still need separated div with clearfix -->
		
		<!-- Half width content box -->
		<article class="content-box col-2">
			<header>
			<h2>OSINT </h2>

				<!-- Content Box Actions -->
				<nav>
					<ul class="button-switch">
						<li><a href="#" class="button">Ver</a></li>
						<li><a href="#" class="button">Editar</a></li>
						<li><a href="#" class="button gray">Apagar</a></li>
					</ul>
				</nav>
				<!-- /Content Box Actions -->
				
			</header>
			<section>
				<!-- Class .bb instantly adds 1px bottom border -->
				<h3 class="bb">Introdução ao OSINT</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse et dignissim metus. Maecenas id augue ac metus tempus aliquam. Sed pharetra placerat est suscipit sagittis. Phasellus aliquam malesuada blandit. Donec adipiscing sem erat. Nunc at dui id purus lacinia tincidunt sit amet vel erat.</p>
				
				<ol>
					<li>Lorem ipsum dolor sit amet</li>
					<li><strong>Consectetur adipiscing elit</strong></li>
					<li><em>Suspendisse et dignissim metus</em></li>
					<li>Maecenas id <a href="#">augue ac metus</a> tempus</li>
					<li>Nunc at dui id purus lacinia
						<ol>
							<li>Lorem ipsum dolor sit amet</li>
							<li>Consectetur adipiscing elit</li>
							<li>Suspendisse et dignissim metus</li>
							<li>Phasellus aliquam
								<ol>
									<li>Lorem ipsum dolor sit amet</li>
									<li>Consectetur adipiscing elit</li>
								</ol>
							</li>
						</ol>
					</li>
					<li>Sed pharetra placerat est suscipit</li>
				</ol>
				<h4>Headline H4</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse et dignissim metus. Maecenas id augue ac metus tempus aliquam. Sed pharetra placerat est suscipit sagittis. Phasellus aliquam malesuada blandit. Donec adipiscing sem erat. Nunc at dui id purus lacinia tincidunt sit amet vel erat.</p>
				<h5>Headline H5</h5>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <code>Yes, the &lt;code&gt; tag is styled too!</code> Suspendisse et dignissim metus. Maecenas id augue ac metus tempus aliquam. Sed pharetra placerat est suscipit sagittis. Phasellus aliquam malesuada blandit. Donec adipiscing sem erat. Nunc at dui id purus lacinia tincidunt sit amet vel erat.</p>
				<br/>				
				
				</div>
			</section>
		</article>
		<!-- /Half width content box -->
		
		<!-- Half width content box with margin clearing class -->
		<article class="content-box col-2 clear-rm">
			<header>
				<h2>Estatisticas da tese e projecto</h2>
				
				<!-- Caixa de opcoes -->
				<nav>
					<a href="#" class="toggle-options-switch button gray"><img src="img/icons/icon_options.png" alt="Options"></a>
					<ul class="options-switch">
						<li><a href="#">Ver</a></li>
						<li><a href="#">Editar</a></li>
						<li><a href="#">Apagar</a></li>
					</ul>
				</nav>
				<!-- /Caixa de opcoes -->
				
			</header>
			<section>
			
				<!-- Stats Summary -->
				<ul class="stats-summary">
					<li>
						<strong class="stats-count">60</strong>
						<p>Páginas escritas</p>
					</li>

					<?php
					//tempo para o natal
					$d1=strtotime("Dec 25");
					$d2=ceil(($d1-time())/60/60/24);
					//echo "Faltam " . $d2 ." ate o Natal.";
					?>
					<li>
						<strong class="stats-count"><?php echo $d2;?></strong>
						<p> dias para o Natal</p>
						<!--a href="operacoes.php" class="button stats-view tooltip" title="Ver total operações">Ver</a-->
					</li>	

					<?php
					//tempo de tese
					$date1 = new DateTime("2013-03-24");
					$date2 = new DateTime("now");
					$date2 = new DateTime("2009-06-26");
					$interval = $date1->diff($date2);
					?>
					<li>
						<strong class="stats-count"><?php echo $interval->y . " anos";?></strong>
						<p><?php echo$interval->m." meses e ".$interval->d." dias";?> de tese e trabalho</p>
					</li>
					<li>
						<strong class="stats-count">346</strong>
						<p>Projecto iKNOW OSINT</p>
						<a href="#" class="button stats-view tooltip" title="Ver">Ver</a>
					</li>
					<li>
						<strong class="stats-count"><?php echo $operacoes;?></strong>
						<p>Operações no total</p>
						<a href="operacoes.php" class="button stats-view tooltip" title="Ver total operações">Ver</a>
					</li>
					<li>
				
						<strong class="stats-count"><?php echo $total_maquinas;?></strong>
						<p>Máquinas</p>
						<a href="maquinas-temp.php" class="button stats-view tooltip" title="Ver listagem de máquinas">Ver</a>
					</li>
					<li>
						<strong class="stats-count">1024</strong>
						<p>Utilizadores</p>
						<a href="utilizadores.php" class="button stats-view tooltip" title="Ver listagem de utilizadores">Ver</a>
					</li>
				</ul>
				<!-- /Stats Summary -->
				
				<p>A ideia aqui é ter estatisticas do trabalho feito..</p>
				<P>Tese - escrita</P>
				<!-- Progress Bar -->
				<div class="progress-bar green huge">
					<div style="width:49%;">
						<span>Escrita 49%<sup>%</sup></span>
					</div>
				</div>
				<!-- /Progress Bar -->
				
				<P>Tese - defesa</P>
				<!-- Progress Bar -->
				<div class="progress-bar red huge">
					<div style="width:0%;">
						<span>0<sup>%</sup></span>
					</div>
				</div>
				<!-- /Progress Bar -->


				<P>Projecto</P>
				<!-- Progress Bar -->
				<div class="progress-bar blue huge">
					<div style="width:0%;">
						<span>0<sup>%</sup></span>
					</div>
				</div>
				<!-- /Progress Bar -->
				<p>small,medium,large,huge...</p>
				<!-- Progress Bar -->
				<div class="progress-bar black huge">
					<div style="width:0%;">
						<span>80<sup>%</sup></span>
					</div>
				</div>
				<!-- /Progress Bar -->
				
			</section>
		</article>
		<article class="content-box col-2 clear-rm">
			<header>
				<h2>OSINT</h2>
				<!-- opcoes da caixa.. -->
				<nav>
					<a href="#" class="toggle-options-switch button gray"><img src="img/icons/icon_options.png" alt="Options"></a>
					<ul class="options-switch">
						<li><a href="#">Ver</a></li>
						<li><a href="#">Editar</a></li>
						<li><a href="#">Apagar</a></li>
					</ul>
				</nav>
				<!-- /opcoes da caixa -->
			</header>
		
			<section> <!-- inicio das secções...-->
				<h3>OSINT Site da Norse:</h3>
				<p>A ideia aqui é ter estatisticas do trabalho feito..</p>
				<br/>
				
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse et dignissim metus. Maecenas id augue ac metus tempus aliquam. Sed pharetra placerat est suscipit sagittis. Phasellus aliquam malesuada blandit. Donec adipiscing sem erat. Nunc at dui id purus lacinia tincidunt sit amet vel erat.</p>
				<h5>Cabeçalho H5</h5>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <code>Yes, the &lt;code&gt; tag is styled too!</code> Suspendisse et dignissim metus. Maecenas id augue ac metus tempus aliquam. Sed pharetra placerat est suscipit sagittis. Phasellus aliquam malesuada blandit. Donec adipiscing sem erat. Nunc at dui id purus lacinia tincidunt sit amet vel erat.</p>
			</section>
		</article>

		<?php
		if (!isset($_GET['colunas']))
			{
				$colunas=$_GET['colunas']='0';
			}
			
		$colunas= $_GET['colunas'];  
		  
		if ($_GET['colunas']=='3')
		{
			?>
			<article class="content-box col-3 clear-rm">
				<header>
					<h2>OSINT</h2>
					<!-- opcoes da caixa.. -->
					<nav>
						<a href="#" class="toggle-options-switch button gray"><img src="img/icons/icon_options.png" alt="Options"></a>
						<ul class="options-switch">
							<li><a href="#">Ver</a></li>
							<li><a href="#">Editar</a></li>
							<li><a href="#">Apagar</a></li>
						</ul>
					</nav>
					<!-- /opcoes da caixa -->
				</header>
				<section> <!-- inicio das secções...-->
					<h3>OSINT Site da Norse 345:</h3>
					<p>A ideia aqui é ter estatisticas do trabalho feito..</p>
					<br/>
					
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse et dignissim metus. Maecenas id augue ac metus tempus aliquam. Sed pharetra placerat est suscipit sagittis. Phasellus aliquam malesuada blandit. Donec adipiscing sem erat. Nunc at dui id purus lacinia tincidunt sit amet vel erat.</p>
					<h5>Cabeçalho H5</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <code>Yes, the &lt;code&gt; tag is styled too!</code> Suspendisse et dignissim metus. Maecenas id augue ac metus tempus aliquam. Sed pharetra placerat est suscipit sagittis. Phasellus aliquam malesuada blandit. Donec adipiscing sem erat. Nunc at dui id purus lacinia tincidunt sit amet vel erat.</p>
				</section>
			</article>
			<article class="content-box col-3 clear-rm">
				<header>
					<h2>OSINT</h2>
					<!-- opcoes da caixa.. -->
					<nav>
						<a href="#" class="toggle-options-switch button gray"><img src="img/icons/icon_options.png" alt="Options"></a>
						<ul class="options-switch">
							<li><a href="#">Ver</a></li>
							<li><a href="#">Editar</a></li>
							<li><a href="#">Apagar</a></li>
						</ul>
					</nav>
					<!-- /opcoes da caixa -->
				</header>
				<section> <!-- inicio das secções...-->
					<h3>OSINT Site da Norse 345:</h3>
					<p>A ideia aqui é ter estatisticas do trabalho feito..</p>
					<br/>
					
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse et dignissim metus. Maecenas id augue ac metus tempus aliquam. Sed pharetra placerat est suscipit sagittis. Phasellus aliquam malesuada blandit. Donec adipiscing sem erat. Nunc at dui id purus lacinia tincidunt sit amet vel erat.</p>
					<h5>Cabeçalho H5</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <code>Yes, the &lt;code&gt; tag is styled too!</code> Suspendisse et dignissim metus. Maecenas id augue ac metus tempus aliquam. Sed pharetra placerat est suscipit sagittis. Phasellus aliquam malesuada blandit. Donec adipiscing sem erat. Nunc at dui id purus lacinia tincidunt sit amet vel erat.</p>
				</section>
			</article>
	
			<article class="content-box col-3 clear-rm">
				<header>
					<h2>OSINT</h2>
					<!-- opcoes da caixa.. -->
					<nav>
						<a href="#" class="toggle-options-switch button gray"><img src="img/icons/icon_options.png" alt="Options"></a>
						<ul class="options-switch">
							<li><a href="#">Ver</a></li>
							<li><a href="#">Editar</a></li>
							<li><a href="#">Apagar</a></li>
						</ul>
					</nav>
					<!-- /opcoes da caixa -->
				</header>
				<section> <!-- inicio das secções...-->
					<h3>OSINT Site da Norse 345:</h3>
					<p>A ideia aqui é ter estatisticas do trabalho feito..</p>
					<br/>
					
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse et dignissim metus. Maecenas id augue ac metus tempus aliquam. Sed pharetra placerat est suscipit sagittis. Phasellus aliquam malesuada blandit. Donec adipiscing sem erat. Nunc at dui id purus lacinia tincidunt sit amet vel erat.</p>
					<h5>Cabeçalho H5</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <code>Yes, the &lt;code&gt; tag is styled too!</code> Suspendisse et dignissim metus. Maecenas id augue ac metus tempus aliquam. Sed pharetra placerat est suscipit sagittis. Phasellus aliquam malesuada blandit. Donec adipiscing sem erat. Nunc at dui id purus lacinia tincidunt sit amet vel erat.</p>
				</section>
			</article>
		<?php
		}
		?>
		<!-- /Half width content box with margin clearing class -->
		
		<div class="clearfix"></div> <!-- We're really sorry for this, but because of IE7 we still need separated div with clearfix -->
		
		<!-- Full width content box -->
		<article class="content-box">
			<header>
				<h2>Notificações, Galeria de imagens, Fontes de OSINT</h2>				
			</header>
			<section>
				
				<!-- Side Tab Container -->
				<div class="sidetabs">
				
					<!-- Side Tab Navigation -->
					<nav class="sidetab-switch">
						<ul>
							<li><a class="default-sidetab" href="#sidetab1">Notificações</a></li>
							<li><a href="#sidetab2">Galeria de imagens</a></li>
						</ul>
						<p>Aenean facilisis ligula eget orci adipiscing varius. Curabitur sem ligula, egestas vel bibendum sed, sodales eu nulla. Vestibulum luctus aliquam feugiat. Donec porta interdum placerat.</p>
					</nav>
					<!-- /Side Tab Navigation -->
					
					<!-- Side Tab Content #sidetab1 -->
					<div class="sidetab default-sidetab" id="sidetab1">
					
						<h3>Notificações</h3>
						
						<!-- Notification -->
						<div class="notification error">
							<a href="#" class="close-notification tooltip" title="Esconder">x</a>
							<h4>Notificação de erro</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.</p>
							<a href="#" class="show-notification-details">&#9658; Mostrar Detalhes</a>
							<ul class="notification-details">
								<li>Lorem ipsum dolor sit amet</li>
								<li>Suspendisse et dignissim metus</li>
								<li>Maecenas id augue ac metus tempus</li>
								<li>Sed pharetra placerat est suscipit</li>
								<li>Phasellus aliquam males</li>
								<li>Nunc at dui id purus lacinia tincidunt</li>
							</ul>
						</div>
						<!-- /Notification -->
						
						<!-- Notification -->
						<div class="notification success">
							<a href="#" class="close-notification tooltip" title="Esconder">x</a>
							<h4>Notificação de Successo</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.</p>
							<a href="#" class="show-notification-details">&#9658; Mostrar Detalhes</a>
							<ul class="notification-details">
								<li>Lorem ipsum dolor sit amet</li>
								<li>Suspendisse et dignissim metus</li>
								<li>Maecenas id augue ac metus tempus</li>
								<li>Sed pharetra placerat est suscipit</li>
								<li>Phasellus aliquam males</li>
								<li>Nunc at dui id purus lacinia tincidunt</li>
							</ul>
						</div>
						<!-- /Notification -->
						
						<!-- dica -->
						<div class="notification information">
							<a href="#" class="close-notification tooltip" title="Esconder">x</a>
							<h4>Notificação de informação</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.</p>
							<a href="#" class="show-notification-details">&#9658; Mostrar Detalhes</a>
							<ul class="notification-details">
								<li>Lorem ipsum dolor sit amet</li>
								<li>Suspendisse et dignissim metus</li>
								<li>Maecenas id augue ac metus tempus</li>
								<li>Sed pharetra placerat est suscipit</li>
								<li>Phasellus aliquam males</li>
								<li>Nunc at dui id purus lacinia tincidunt</li>
							</ul>
						</div>
						<!-- /dica -->
						
						<!-- atencao -->
						<div class="notification attention">
							<a href="#" class="close-notification tooltip" title="Esconder">x</a>
							<h4>Atenção</h4>
							<p>- <a href="tickets"><?php echo $TicketsPessoal;?> tickets..</a></p>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero. 
						</div>
						<!-- /atencao -->
						
						<!-- nota -->
						<div class="notification note">
							<a href="#" class="close-notification tooltip" title="Esconder">x</a>
							<h4>Notas</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero. Suspendisse et dignissim metus. Maecenas id augue ac metus tempus aliquam. Sed pharetra placerat est suscipit sagittis.</p>
						</div>
						<!-- /nota -->
						
					</div>
					<!-- /Side Tab Content #sidetab1 -->
					
					<!-- Side Tab Content #sidetab2 -->
					<div class="sidetab" id="sidetab2">
						<h3>Galeria de Imagens</h3>
						
						<!-- galeria de imagens-->
						<ul class="image-gallery">
						<!--
							<li class="image-frame">
								<img src="imagens/flightradar24.jpg" width="300" height="225" alt="Exemplo de imagem">
								<ul class="image-actions">
									<li class="image-actions-header">Opções</li>
									<li><a href="#">Ver</a></li>
									<li><a href="#">Editar</a></li>
									<li><a href="#">Apagar</a></li>
								</ul>
							</li>
							<li class="image-frame">
								<a target="_blank" onclick="OpenNewWindow('imagens/checkpoint.jpg', 900, 600,'https://www.threat-cloud.com/ThreatPortal/#/map'); return true;"><img src="imagens/checkpoint.jpg" width="168" height="100" /></a>
								<!--
								<ul class="image-actions">
									<li class="image-actions-header">Opções</li>
									<li><a href="#">Ver</a></li>
									<li><a href="#">Editar</a></li>
									<li><a href="#">Apagar</a></li>
								</ul>
									
							<li class="image-frame">
								<a target="_blank" onclick="OpenNewWindow('imagens/marinetraffic2.jpg', 900, 600,'https://www.marinetraffic.com/pt/ais/home/centerx:-9/centery:39/zoom:10'); return true;"><img src="imagens/marinetraffic2.jpg" width="168" height="100" /></a>

								<!--
								<ul class="image-actions">
									<li class="image-actions-header">Opções</li>
									<li><a href="#">Ver</a></li>
									<li><a href="#">Editar</a></li>
									<li><a href="#">Apagar</a></li>
								</ul>
									
							</li>
							<li class="image-frame">
								<a target="_blank" onclick="OpenNewWindow('imagens/norse.jpg', 900, 600,'http://map.norsecorp.com/'); return true;"><img src="imagens/norse.jpg" width="168" height="100" /></a>
								<!--<ul class="image-actions">
									<li class="image-actions-header">Opções</li>
									<li><a href="#">Ver</a></li>
									<li><a href="#">Editar</a></li>
									<li><a href="#">Apagar</a></li>
								</ul>
								
							
							<li class="image-frame">
								<img src="imagens/flightradar24.jpg" width="168" height="100" alt="Exemplo de imagem">
								<ul class="image-actions">
									<li class="image-actions-header">Opções</li>
									<li><a href="#">Ver</a></li>
									<li><a href="#">Editar</a></li>
									<li><a href="#">Apagar</a></li>
								</ul>
							</li>
							-->
							
							
							
							
							
							
							
							
							
							
							
							
							<li class="image-frame">
								<a target="_blank" onclick="OpenNewWindow('imagens/norse.jpg', 900, 600,'http://map.norsecorp.com/'); return true;"><img src="imagens/norse.jpg" width="168" height="100" /></a>
								<ul class="image-actions">
									<li class="image-actions-header">Opções</li>
									<li><a href="#">Ver</a></li>
									<li><a href="#">Editar</a></li>
									<li><a href="#">Apagar</a></li>
								</ul>
							</li>
							<li class="image-frame">
								<a target="_blank" onclick="OpenNewWindow('imagens/checkpoint.jpg', 900, 600,'https://www.threat-cloud.com/ThreatPortal/#/map'); return true;"><img src="imagens/checkpoint.jpg" width="168" height="100" /></a>
								<ul class="image-actions">
									<li class="image-actions-header">Opções</li>
									<li><a href="#">Ver</a></li>
									<li><a href="#">Editar</a></li>
									<li><a href="#">Apagar</a></li>
								</ul>
							</li>
							<li class="image-frame">
								<a target="_blank" onclick="OpenNewWindow('imagens/marinetraffic2.jpg', 900, 600,'https://www.marinetraffic.com/pt/ais/home/centerx:-9/centery:39/zoom:10'); return true;"><img src="imagens/marinetraffic2.jpg" width="168" height="100" /></a>
								<ul class="image-actions">
									<li class="image-actions-header">Opções</li>
									<li><a href="#">Ver</a></li>
									<li><a href="#">Editar</a></li>
									<li><a href="#">Apagar</a></li>
								</ul>
							</li>
							<li class="image-frame">
								<a target="_blank" onclick="OpenNewWindow('imagens/flightradar24.jpg', 900, 600,'https://www.flightradar24.com/38.71,-9.14/7'); return true;"><img src="imagens/flightradar24.jpg" width="168" height="100" /></a>
								<ul class="image-actions">
									<li class="image-actions-header">Opções</li>
									<li><a href="#">Ver</a></li>
									<li><a href="#">Editar</a></li>
									<li><a href="#">Apagar</a></li>
								</ul>
							</li>
							<li class="image-frame">
								<a target="_blank" onclick="OpenNewWindow('imagens/portugal.jpg', 900, 600,'https://www.google.pt/maps/@38.6762397,-9.2171736,11.5z'); return true;"><img src="imagens/portugal.jpg" width="168" height="100" /></a>
								<ul class="image-actions">
									<li class="image-actions-header">Opções</li>
									<li><a href="#">Ver</a></li>
									<li><a href="#">Editar</a></li>
									<li><a href="#">Apagar</a></li>
								</ul>
							</li>
							<li class="image-frame">
								<img src="imagens/flightradar24.jpg" width="168" height="100" alt="Exemplo de imagem">
								<ul class="image-actions">
									<li class="image-actions-header">Opções</li>
									<li><a href="#">Ver</a></li>
									<li><a href="#">Editar</a></li>
									<li><a href="#">Apagar</a></li>
								</ul>
							</li>
							<li class="image-frame">
								<img src="imagens/flightradar24.jpg" width="168" height="100" alt="Exemplo de imagem">
								<ul class="image-actions">
									<li class="image-actions-header">Opções</li>
									<li><a href="#">Ver</a></li>
									<li><a href="#">Editar</a></li>
									<li><a href="#">Apagar</a></li>
								</ul>
							</li>
							<li class="image-frame">
								<img src="imagens/flightradar24.jpg" width="168" height="100" alt="Exemplo de imagem">
								<ul class="image-actions">
									<li class="image-actions-header">Opções</li>
									<li><a href="#">Ver</a></li>
									<li><a href="#">Editar</a></li>
									<li><a href="#">Apagar</a></li>
								</ul>
							</li>
							
						</ul>
						<!-- /galeria de imagens-->
						
					</div>
					<!-- /Side Tab Content #sidetab2 -->
										
				</div>
				<!-- /Side Tab Container -->
				
			</section>
		</article>
		<!-- /Full width content box -->
		
	</section>
	<!-- /Main Content -->
	
	<!-- Main Footer -->
	<footer id="footer">
		<div class="page-wrapper">
			<section>
				<h2>Vestibulum blandit massa</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris dignissim auctor dolor. Curabitur a arcu nec massa malesuada eleifend vel sit amet magna. Nulla vel leo sit amet justo porttitor vulputate ut vel sapien. Sed quis enim augue, id elementum quam.</p>
				<p>Ut vel aliquet leo. Suspendisse quis fringilla ligula. Suspendisse potenti. Nam volutpat pellentesque est, sed mattis ante interdum et.</p>
				
				<!-- Social Sub Nav List Style -->
				<ul class="social-list">
					<li><a class="social rss" href="#">RSS</a></li>
					<li><a class="social twitter" href="#">Twitter</a></li>
					<li><a class="social facebook" href="#">Facebook</a></li>
					<li><a class="social forrst" href="#">Forrst</a></li>
					<li><a class="social tumblr" href="#">Tumblr</a></li>
				</ul>
				<!-- /Social Sub Nav List Style -->
				
			</section>
			<section>
				<h2>Praesent facilisis</h2>
				<ul>
					<li><a href="#">Appstorm</a></li>
					<li><a href="#">Mac.Appstorm</a></li>
					<li><a href="#">Web.Appstorm</a></li>
					<li><a href="#">iPhone.Appstorm</a></li>
					<li><a href="#">TheNetsetter</a></li>
					<li><a href="#">Snipplr</a></li>
					<li><a href="#">Rockable Press</a></li>
					<li><a href="#">FreelanceSwitch</a></li>
					<li>      
							<a href="#" onclick="OpenNewWindow('imagens/checkpoint.jpg', 500, 500); return true;">
							   <img src="images/smallpicture.jpg" alt="Clique..."/>
							</a>					
					</li>
				</ul>
			</section>
			<section>
				<h2>Cras tellus nisi</h2>
				bla bla bla
			</section>
		</div>
	</footer>
	<!-- /Main Footer -->
	
	<!-- Sample Modal Window 
	<div id="sample" class="modal-content">
		<h1>nyroModal</h1>
		<p>Ajax Call, Ajax Call with targeting content, Single Image, Images Gallery with arrow navigating, Gallery with any kind of content, Form, Form in iframe, Form with targeting content, Form with file upload, Form with file upload with targeting content, Dom Element, Manual Call, Iframe, Stacked Modals, Many embed element through Embed.ly API, Error handling, Modal will never goes outside the view port, Esc key to close the window, Customizable animation, Customizable look, Modal title.</p>
		<a href="http://nyromodal.nyrodev.com/" class="outside">http://nyromodal.nyrodev.com</a>
	</div>
	-->
	<!-- /Sample Modal Window -->

	<!-- JavaScript at the bottom for faster page loading -->
	<script src="js/jquery.min.js"></script>
	<script>!window.jQuery && document.write(unescape('%3Cscript src="js/libs/jquery-1.5.1.min.js"%3E%3C/script%3E'))</script>
	<!--[if IE]><script src="js/jquery/excanvas.js"></script><![endif]--><!-- IE Canvas Fix for Visualize Charts -->
	<script src="js/libs/selectivizr.js"></script>
	<script src="js/jquery/jquery.visualize.js"></script>
	<script src="js/jquery/jquery.adminmenu.js"></script>
	<script src="js/jquery/jquery.visualize.tooltip.js"></script>
	<script src="js/jquery/jquery.tipsy.js"></script>
	<script src="js/jquery/jquery.nyromodal.min.js"></script>
	<script src="js/jquery/jquery.wysiwyg.js"></script>
	<script src="js/jquery/jquery.datatables.js"></script>
	<script src="js/jquery/jquery.datepicker.js"></script>
	<script src="js/jquery/jquery.fileinput.js"></script>
	<script src="js/jquery/jquery.fullcalendar.min.js"></script>
	<script src="js/jquery/jquery.ui.totop.js"></script>
	<script src="js/jquery/jquery.snippet.js"></script>
	<script src="js/script.js"></script>
	
 
</body>
</html>
