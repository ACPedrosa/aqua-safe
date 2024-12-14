<?php
$nome = $_POST['nome'];
$tel = $_POST['tel'];
$end = $_POST['end'];
$id = $_POST['id'];
$pessoa = [
    'nome' => $nome,
    'telefone' => $tel,
    'endereco' => $end,
    'id' => $id
];
if (!file_exists(__DIR__.'/data'))
{
    mkdir(__DIR__.'/data', 0777, true);
    $pessoas = array();
}
else
{
    if(file_exists(__DIR__.'/data/pessoas.json'))
    {
        $pessoas = json_decode(file_get_contents(__DIR__.'/data/pessoas.json'),true);
        if($pessoas == null)
        {
            $pessoas = array();
        }
    }
    else
    {
        $pessoas = array();
    }
}
$add = true;
for($i = 0 ; $i < count($pessoas);$i++)
{
    if($pessoas[$i]['id'] == $pessoa['id'])
    {
        $add = false;
    }
}
if($add)
{
    $pessoas[] = $pessoa;
}
$pessoas = json_encode($pessoas,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
file_put_contents(__DIR__."/data/pessoas.json",$pessoas);
header("Location: dashboard.php?id=$id")
?>
