
// Elemento = menu de navegação
let nav = '<nav><!-- User img-profile  --><div class="user-profile"><a href="../img/editar_foto.php" class="user-img" aria-label="área de informações do usuário"><?php if (!empty($foto_funcionario)) : ?><img src="data:image/jpeg;base64,<?php echo base64_encode($foto_funcionario); ?>" alt="Foto do funcionário"><?php endif; ?></a></div><!-- Lista de links de navegação --><ul><li><ion-icon name="home-outline"></ion-icon><a href="../home/home.php">Início</a></li><li><ion-icon name="person-add-outline"></ion-icon><a href="../cadastro/cadastrarpac_rec.php">Paciente</a></li><li><ion-icon name="calendar-number-outline"></ion-icon><a href="../agenda/agenda_rec.php">Agenda</a></li><!-- <li><ion-icon name="bar-chart-outline"></ion-icon><a href="../financeiro/financeiro.php">Financeiro</a></li><li><ion-icon name="reader-outline"></ion-icon><a href="../relatorio/relatorio.php">Relatório</a></li> --></ul><a class="sair" href="../index.php"><ion-icon name="exit-outline"></ion-icon></a></nav>';

var menu = document.querySelector('.menu');

menu.innerHTML = nav;