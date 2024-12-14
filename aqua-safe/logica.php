<?php
$id = $_GET['id'];
$turbides = $_GET['turb'];
$temperatura = $_GET['temp'];
$relatorio = [
    'id' => $id,
    'turbides' => $turbides,
    'temperatura' => $temperatura
];
if (!file_exists(__DIR__.'/data'))
{
    mkdir(__DIR__.'/data', 0777, true);
    $relatorios = array();
}
else
{
    if(file_exists(__DIR__.'/data/monitoramento.json'))
    {
        $relatorios = json_decode(file_get_contents(__DIR__.'/data/monitoramento.json'),true);
        if($relatorios == null)
        {
            $relatorios = array();
        }
    }
    else
    {
        $relatorios = array();
    }
}
$relatorios[] = $relatorio;
$relatorios = json_encode($relatorios,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
file_put_contents(__DIR__."/data/monitoramento.json",$relatorios);
?>