<?php

class SendPulse {

  private $clientId = "24363d7d34357a3a1e2e8de217b77e41";
  private $clientSecret = "204e97337f87068211a2ced2ed789085";
  private $endpoint = "https://api.sendpulse.com/";
  private $error = "";
  private $conexao;
  
  function __construct($conexao) {
    $this->conexao = $conexao;
  }

  // Obtém o token da api
  public function getToken() {
    // Resgata o token do banco de dados
    $resultToken = $this->conexao->prepare("SELECT sp_token, sp_expires FROM sistema_conf LIMIT 1");
    $resultToken->execute();
    $numToken = $resultToken->rowCount();
    $storedToken = $resultToken->fetch(PDO::FETCH_ASSOC);
    // Verifica se o token existe e se é válido
    if ($storedToken['sp_token'] != "" && $storedToken['sp_expires'] != "" && $storedToken['sp_expires'] > Tools::getDateTime()) {
      return $storedToken['sp_token'];
    } 
    // Solicita um novo token
    else {
      $newToken = $this->generateToken();
      if ($newToken && isset($newToken['access_token']) && $newToken['access_token'] != "") {
        $accessToken = $newToken['access_token'];
        $expiresInSeconds = (int) $newToken['expires_in'];
        $expiresDate = date("Y-m-d H:i:s", strtotime(date(Tools::getDateTime())." +" . $expiresInSeconds . " seconds"));
        // Grava o novo token no banco
        $updtToken = $this->conexao->prepare("UPDATE sistema_conf SET sp_token='$accessToken', sp_expires='$expiresDate' WHERE id=1");
        $updtToken->execute();
        return $accessToken;
      }
    }
    return false;
  }
  
  // Solicita um novo token de acesso a api
  public function generateToken() {
    $endpoint = $this->endpoint . "oauth/access_token";
    $payload = array(
      'grant_type' => 'client_credentials',
      'client_id' => $this->clientId,
      'client_secret' => $this->clientSecret,
    );
    $response = $this->sendRequest($endpoint, 'POST', $payload);
    if (isset($response['error'])) {
      $this->error = $response['error'];
      return false;
    }
    return json_decode($response, true);
  }

  // Envia um e-mail
  public function sendEmail($data) {
    $endpoint = $this->endpoint . "smtp/emails";
    $accessToken = $this->getToken();
    if ($accessToken) {
      // Destinatários
      $toList = [];
      foreach ($data['to_list'] as $toItem) {
        $toList[] = [
          'email' => $toItem,
        ];
      }
      $payload = [
        'email' => [
          'from' => [
            'name' => $data['from_name'],
            'email' => $data['from_mail'],
          ],
          'to' => $toList,
          'subject' => $data['subject'],
          'html' => base64_encode($data['body']),
        ]
      ];
      $response = $this->sendRequest($endpoint, 'POST', $payload, ["Authorization: Bearer " . $accessToken]);
      $response = json_decode($response, true);
      if (isset($response['error_code'])) {
        $this->error = $response['message'];
        return false;
      }
      return true;
    }
    return false;
  }

  // Retorna o erro
  public function getError() {
    return $this->error;
  }
  
  // Realiza uma requisição
  public function sendRequest($endpoint, $method, $data = [], $headersAdd = []) {
    $timeOutLimit = 5; // Tempo limite em segundos para resposta
    $ch = curl_init($endpoint);
    switch ($method) {
      case "POST":
        curl_setopt($ch, CURLOPT_POST, 1);
        break;
      case "PUT":
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        break;
      case "DELETE":
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        break;
      default:
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        break;
    }
    if ($data && is_array($data) && count($data) > 0) {
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    }
    curl_setopt($ch, CURLOPT_URL, $endpoint);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_ENCODING, "utf-8");
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeOutLimit);
    // Headers
    $headers = [];
    $headers[] = 'Content-Type: application/json';
    if (isset($headersAdd) && is_array($headersAdd) && count($headersAdd) > 0) {
      $headers = array_merge($headers, $headersAdd);
    }
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);
    if ($result === false) {
      $erro = curl_error($ch);
      curl_close($ch);
      return json_encode([
        'status' => "error",
        'message' => "Erro na requisição: " . $erro
      ]);
    }
    /* $codResp = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($codResp >= 400) {
      curl_close($ch);
      return json_encode([
        'status' => "error",
        'message' => "Erro na requisição: código de resposta HTTP " . $codResp
      ]);
      //throw new Exception("Erro na requisição: código de resposta HTTP " . $codResp);
    } */
    curl_close($ch);
    return $result;
  }
}
  
