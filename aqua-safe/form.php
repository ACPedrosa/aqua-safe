<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/form_cad.css">
    <title>Aqua Safe</title>
</head>
<body>
    <main> 
        <form action="cadastro.php" method="post">
            <div class="input-group">
                <div class="input-box">
                    <label for="nome">Primeiro Nome</label>
                    <input id="nome" type="text" name="nome" placeholder="Digite seu primeiro nome" required>
                </div>
        
                <div class="input-box">
                    <label for="end">Endereço</label>
                    <input id="nome" type="text" name="nome" placeholder="Digite seu endereço" required>
                </div>
            
                <div class="input-box">
                    <label for="tel">Telefone:</label>
                    <input id="nome" type="text" name="nome" placeholder="Digite seu telefone" required>
                </div>
                <div class="input-box">
                    <label for="tel">Código do Dispositivo</label>
                    <input id="nome" type="text" name="id" placeholder="Digite o codigo do dispositivo" required>
                </div>

                <div class="continue-button">
                    <button type="submit"><a href="dashboard.html">Continuar</a> </button>
                </div>
                
            </div>
        </form>
    </main>
</body>
</html>