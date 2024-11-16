<?php
include('header.php');
$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$data_nascimento = DateTime::createFromFormat('Y-m-d', $_POST['data_nascimento']);
if(!$data_nascimento){
    echo("<p>Ops. Data inválida!</p> <a href='index.php'>Voltar</a>");
    exit;
}

//ler xml
$signos = simplexml_load_file('signos.xml'); 
function verificar_signos($data, $inicio, $fim){
    $ano = $data->format('Y');
    $data_inicio = DateTime::createFromFormat('d/m/Y', "$inicio/$ano");
    $data_fim = DateTime::createFromFormat('d/m/Y', "$fim/$ano");
    if($data_inicio > $data_fim) $data->format('m') == '01' ? $data_inicio->modify('-1 year') : $data_fim->modify('+1 year');
    return($data >= $data_inicio && $data <= $data_fim);
}

$encontrar_signo=null;

foreach($signos as $signo){
    if(verificar_signos($data_nascimento, $signo->dataInicio, $signo->dataFim)){
        $encontrar_signo = $signo;
        break;
    }
}

?>

<body>
    <div class="container-fluid main-container mt-4 d-flex align-items-center justify-content-center" style="min-height: 80vh;">
        <div class="content-wrapper text-center p-5" style="background-color: white; border-radius: 15px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); max-width: 500px;">
            <?php if ($encontrar_signo): ?>
                <h1 class="text-primary mb-4">Olá, <?= htmlspecialchars($nome) ?>!</h1>
                <h2 class="text-primary mb-4">Seu signo é: <?= $encontrar_signo->signoNome ?></h2>
                <?php
                //Personaliza a descrição com o nome do usuário
                $descricao_personalizada = str_replace('Quem', "$nome, quem", $encontrar_signo->descricao);
                ?>
                <p class="text-muted mb-5"><?= $descricao_personalizada ?></p>
            <?php else: ?>
                <p class="text-danger mb-5">Data inválida! Não foi possível encontrar um signo correspondente.</p>
            <?php endif; ?>
            <a href='index.php' class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</body>
