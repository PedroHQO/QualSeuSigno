<?php include('header.php'); ?>
<body>
    <body class="d-flex align-items-center justify-content-center" style="min-height: 100vh; background-color: #f8f9fa;">
        <div class="container">
            <div class="container-fluid main-container d-flex align-items-center justify-content-center" style="min-height: 100vh; background-color: #f8f9fa;">
                <div class="content-wrapper text-center p-5" style="background-color: white; border-radius: 15px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); max-width: 400px;">
                    <h1 class="title text-primary mb-3">Além dos Signos</h1>
                    <p class="subtitle text-muted mb-4">O que seu signo diz sobre você!</p>

                    <form id="signo-form" method="POST" action="show_zodiac_sign.php">
                        <div class="form-group mb-3">
                            <label for="nome" class="form-label text-secondary">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" required placeholder="Digite seu nome">
                        </div>

                        <div class="form-group mb-3">
                            <label for="data_nascimento" class="form-label text-secondary">Data de Nascimento</label>
                            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4 w-100">Enviar</button>
                    </form>

                    <footer class="footer mt-5">
                        <p class="text-muted">Desenvolvido por: Pedro_HQO </p>
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>
