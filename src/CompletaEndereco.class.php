<?php

class CompletaEndereco 
{

  // Consulta de cep (API: buscarcep.com.br)
  static function getEndereco($cep, $formato = "json") 
  {
    $error = "";
    $endereco = [];
    $endereco['api'] = "buscarcep";
		$url = "https://www.buscarcep.com.br/?cep=".$cep."&formato=json&chave=1C/qnlVW";
    $retorno = Tools::curlRequest("GET", $url);
    $retorno = json_decode($retorno, true);
    if ($retorno['status'] !== "error" && $retorno['resultado'] == "1") {
      $endereco['logradouro'] = $retorno['tipo_logradouro'] . " " . $retorno['logradouro'];
      $endereco['bairro'] = $retorno['bairro'];
      $endereco['cidade'] = $retorno['cidade'];
      $endereco['uf'] = $retorno['uf'];
      $endereco['cep'] = $retorno['cep'];
      if ($formato === "json") {
        return json_encode($endereco);
      }
      return $endereco;
    } else if ($retorno['status'] === "error") {
      $error = $retorno['message'];
    } else if ($retorno['resultado'] != "1") {
      $error = $retorno;
    }
    // Backup (ViaCep)
    return self::getEnderecoViaCep($cep, $formato, $error);
  }

  // Consulta de cep (API: ViaCep)
  static function getEnderecoViaCep($cep, $formato = "json", $prevError = false) 
  {
    $endereco = [];
    $endereco['api'] = "viacep";
		$url = "https://viacep.com.br/ws/".$cep."/json/";
    $retorno = Tools::curlRequest("GET", $url);
    $retorno = json_decode($retorno, true);
    if ($retorno['status'] !== "error" && $retorno['erro'] !== "true" && $retorno['cep'] !== "") {
      $endereco['logradouro'] = $retorno['logradouro'];
      $endereco['bairro'] = $retorno['bairro'];
      $endereco['cidade'] = $retorno['localidade'];
      $endereco['uf'] = $retorno['uf'];
      $endereco['cep'] = Tools::somenteNumeros($retorno['cep']);
      if ($prevError) {
        $endereco['api1-error'] = $prevError;
      }
      if ($formato === "json") {
        return json_encode($endereco);
      }
      return $endereco;
    } else if ($retorno['status'] === "error") {
      return json_encode([
        'api1-error' => $prevError,
        'api2-error' => $retorno['message'],
      ]);
    } else {
      return json_encode([
        'api1-error' => $prevError,
        'api2-error' => $retorno,
      ]);
    }
    return false;
  }
}
