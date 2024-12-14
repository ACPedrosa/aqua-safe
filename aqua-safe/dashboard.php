<?php
$id = $_GET['id'];

if (!file_exists(__DIR__.'/data'))
{
    header("Location: form.php");
}
else
{
    if(file_exists(__DIR__.'/data/pessoas.json'))
    {
        $pessoas = json_decode(file_get_contents(__DIR__.'/data/pessoas.json'),true);
        if($pessoas == null)
        {
            header("Location: form.php");
        }
    }
    else
    {
        header("Location: form.php");
    }
}
$tem = true;

for($i = 0 ;$i < count($pessoas);$i++)
{
    if($id == $pessoas[$i]['id'])
    {
        $pessoa = [
            'nome' => $pessoas[$i]['nome'],
            'end' => $pessoas[$i]['endereco'],
            'id' => $id
        ];
        $tem = false;
    }
}
if($tem)
{
    header("Location: form.php");
}
if (!file_exists(__DIR__.'/data'))
{
    header("Location: form.php");
}
else
{
    if(file_exists(__DIR__.'/data/monitoramento.json'))
    {
        $relatorios = json_decode(file_get_contents(__DIR__.'/data/monitoramento.json'),true);
        if($relatorios == null)
        {
            header("Location: form.php");
        }
    }
    else
    {
        header("Location: form.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    for($i = count($relatorios)-1 ; $i >= 0;$i--):
        if($relatorios[$i]["id"] == $pessoa["id"]):?>
            <div>
                <?php print $pessoa['nome']?>
                <br>
                <?php print $pessoa['end']?>
                <br>
                <?php print $relatorios[$i]['temperatura']?>
                <br>
                <?php print $relatorios[$i]['turbides']?>
                <br>
                <?php print $relatorios[$i]['data']?>
            </div>
    <?php
        endif;
    endfor;
    ?>
</body>
</html>
