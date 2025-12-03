<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\OAuth;

require ("lib/PHPMailer/src/Exception.php");
require ("lib/PHPMailer/src/PHPMailer.php");
require ("lib/PHPMailer/src/SMTP.php");
require ("lib/PHPMailer/src/OAuth.php");
require ("SendPulse.class.php");

class Email {
  // Configurações
	protected $host = SMTP_HOST;
	protected $user = SMTP_USER;
  protected $password = SMTP_PASS;
  protected $port = SMTP_PORT;
  protected $from = SMTP_FROM;
  protected $autenticacao;
  protected $sendApi;
	protected $erro;
	protected $debug;
	protected $dados = array();
	protected $assunto;
  protected $corpo;
  protected $destinatarios = array();
	protected $responderParaNome;	    
  protected $responderParaEmail;
  protected $anexos = array();

  // Estilo
  protected $mainColor = COR_SITE;
  protected $fontLight = "#616161";
  protected $fontDark = "#424242";

	// Construtor
	public function __construct($dados, $assunto, $destinatarios, $responderParaNome, $responderParaEmail, $anexos, $debug = false) {
    $this->assunto = $assunto;
    $this->destinatarios = $destinatarios;		
		$this->responderParaNome = $responderParaNome;			
		$this->responderParaEmail = $responderParaEmail;
    $this->anexos = $anexos;
    $this->dados = $dados;
    $this->autenticacao = EMAIL_AUTENTICADO == "1" ? true : false;
    $this->sendApi = SEND_API == "1" ? true : false;
    $this->debug = $debug;
    $this->buildEmail();
	}

	// Exibe uma pré-visualização do e-mail
	public function getPrev() {
		return $this->corpo;
	}

	// Retorna a mensagem de erro
	public function getErro() {
		return $this->erro;		
  }
  
  // Envia o e-mail
  public function Enviar() {
    $mail = new PHPMailer();
    if ($this->debug) {
      $mail->SMTPDebug = 2;
    } 
    $mail->setLanguage("br");

    $mail->Host = $this->host; 
    $mail->Username = $this->user;
    $mail->Password = $this->password;
    $mail->Port = $this->port;
    if ($this->port == 465) {
      $mail->SMTPSecure = "ssl";
    } else if ($this->port == 587) {
      $mail->SMTPSecure = "tls";
    }

    // Envio por API
    if ($this->sendApi) {
      if ($this->sendMailApi()) {
        return true;
      }
      return false;
    }
    
    // Envio autenticado
    if ($this->autenticacao) {
      $mail->isSMTP();
      $mail->SMTPAuth = true;
    } 

    // Envio direto (Sem autenticação)
    else {
      $mail->isSendmail();
    }
    
    $mail->setFrom($this->from, TITULO_SITE);
    foreach ($this->destinatarios as $destinatario) {			
      $mail->AddAddress($destinatario);
    }
    $mail->AddReplyTo($this->responderParaEmail, $this->responderParaNome);
    if (is_array($this->anexos) && !empty($this->anexos)) {
      foreach ($this->anexos as $anexo) {
        if (file_exists($anexo['arquivo'])) {
          $mail->addAttachment($anexo['arquivo'], $anexo['nome']);
        }
      }
    }
    $mail->isHTML(true);
    $mail->CharSet = "utf-8";
    $mail->Subject = $this->assunto;
    $mail->Body = $this->corpo;
    if ($mail->send()) {
      return true;
    } else {
      $this->erro = "Erro: ".$mail->ErrorInfo;
    }
    return false;
  }

  // Envia o e-mail por API
  private function sendMailApi() {
    global $conexao;
    $sp = new SendPulse($conexao);
    $mailData = [
      'from_name' => TITULO_SITE,
      'from_mail' => $this->from,
      'to_list' => $this->destinatarios,
      'subject' => $this->assunto,
      'body' => $this->corpo,
    ];
    $send = $sp->sendEmail($mailData);
    if ($send) {
      return true;
    }
    $this->erro = "Erro: ".$sp->getError();
    return false;
  }

  // Monta o corpo do e-mail
  private function buildEmail() {
    global $telsContato;
    // Background
    $html = '<table cellpadding="0" cellspacing="0" border="0" style="width: 100%; line-height: 100%; border-collapse: collapse"><tr><td>';
    // Container
    $html .= '<table cellpadding="0" cellspacing="0" border="0" align="center" style="border-collapse: collapse"><tr><td width="600px" valign="top">';
    // Conteúdo
    $html .= '<table width="100%" cellpadding="20" cellspacing="0" border="0" align="center" bgcolor="#f5f5f5"><tr><td><table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-collapse: collapse">';
    // Logo
    $html .= '<tr><td>&nbsp;</td></tr><tr><td style="font-family: Helvetica, Arial, sans-serif; font-size: 24px; line-height: 24px; font-weight: bold; color: '.$this->mainColor.'; text-align: center"><a href="'.URL.'" title="'.TITULO_SITE.'" target="_blank" style="color: '.$this->mainColor.'; text-decoration: none"><img src="'.LOGO_EMAIL.'" alt="'.TITULO_SITE.'" height="40px" border="0"></a></td></tr><tr><td>&nbsp;</td></tr>';
    // Título
    $html .= '<tr><td>&nbsp;</td></tr><tr><td style="font-family: Helvetica, Arial, sans-serif; font-size: 24px; line-height: 24px; font-weight: bold; color: '.$this->mainColor.'; text-align: center">'.$this->dados['titulo'].'</td></tr><tr><td>&nbsp;</td></tr>';
    // Texto
    if (isset($this->dados['texto']) && $this->dados['texto'] != "") {
      $html .= '<tr><td style="font-family: Helvetica, Arial, sans-serif; font-size: 16px; line-height: 1.4; color: '.$this->fontDark.'; text-align: center">'.$this->dados['texto'].'</td></tr><tr><td>&nbsp;</td></tr>';
    }
    // Informações (Lista)
    if (isset($this->dados['infos'])) {
      foreach ($this->dados['infos'] as $infoTit => $infoVal) {
        $html .= '<tr><td style="font-family: Helvetica, Arial, sans-serif; font-size: 16px; line-height: 1.4; font-weight: bold; color: '.$this->fontDark.'; text-align: left">'.$infoTit.'</td></tr><tr><td style="font-family: Helvetica, Arial, sans-serif; font-size: 16px; line-height: 1.4; color: '.$this->fontLight.'; text-align: left">'.$infoVal.'</td></tr><tr><td>&nbsp;</td></tr>';
      }
    }
    // Botão
    if (isset($this->dados['botao'])) {
      $html .= '<tr><td>&nbsp;</td></tr><tr><td style="text-align: center"><table cellspacing="0" cellpadding="0" align="center"><tr><td style="border-radius: 4px;" bgcolor="'.$this->mainColor.'"><a href="'.$this->dados['botao']['url'].'" target="_blank" style="padding: 10px 20px; border: 1px solid '.$this->mainColor.';border-radius: 4px; font-family: Helvetica, Arial, sans-serif; font-size: 16px; color: #ffffff; text-decoration: none; font-weight: bold; display: inline-block">'.$this->dados['botao']['texto'].'</a></td></tr></table></td></tr><tr><td>&nbsp;</td></tr>';
    }
    // Fim conteúdo
    $html .= '</table></td></tr></table>';
    // Footer
    $html .= '<table width="100%" cellpadding="20" cellspacing="0" border="0" style="border-collapse: collapse" bgcolor="#eeeeee"><tr><td><table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-collapse: collapse"><tr><td style="font-family: Helvetica, Arial, sans-serif; font-size: 16px; line-height: 1.4; color: '.$this->fontLight.'; text-align: center;"><b>'.TITULO_SITE.'</b><br>'.EMAIL_ATENDIMENTO.'<br>'.implode(" / ", $telsContato).'</td></tr></table></td></tr></table>';
    // Fim container
    $html .= '</td></tr></table>';
    // Fim background
    $html .= '</td></tr></table>';
    $this->corpo = $html;
  }

}
