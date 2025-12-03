<?php

class Tools {
  
  // Gera um hash aleatório
  static function geraCodigoAutenticacao()
  {
    $length = 4;
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }

  // Retorna a data atual
  static function getDate() {
    return date('Y-m-d');
  }
  
  // Retorna a data e horário atuais
  static function getDateTime() {
    return date('Y-m-d H:i:s');
  }
  
  // Retorna a data passsada no formato BR (DD/MM/AAAA)
  static function formataData($date){
    return date("d/m/Y",strtotime($date));        
  }
  
  // Retorna a data passsada no formato padrao americado (AAAA/MM/DD)
  static function formataDataBd($date){
    $data = str_replace(" ","",$date);
    $date_r = explode("/",$data);
    $date_bd = $date_r[2]."-".$date_r[1]."-".$date_r[0];
    return $date_bd;
  }
  
  // Retorna a data e horas passsada no formato BR (DD/MM/AAAA HH:MM:SS)   
  static function formataDataTime($date){
    return date("d/m/Y H:i",strtotime($date));        
  }
  
  // Retorna a quantidade de dias entre duas datas
  static function difData($data_inicial,$data_final){
    $time_inicial = strtotime($data_inicial);
    $time_final = strtotime($data_final);
    $diferenca_dtas = $time_final - $time_inicial;     
    $numero_dias = (int)floor($diferenca_dtas / (60 * 60 * 24));     
    return $numero_dias;
  }
  
  // Retorna a quantidade de horas entre duas datas
  static function difHoras($data_inicial,$data_final){
    $datatime1 = new DateTime($data_inicial);
    $datatime2 = new DateTime($data_final);
    $data1  = $datatime1->format('Y-m-d H:i:s');
    $data2  = $datatime2->format('Y-m-d H:i:s');
    $diff = $datatime1->diff($datatime2);
    $horas = $diff->h + ($diff->days * 24);
    return $horas;
  }
  
  // Soma uma determinada quantidade de dias a uma data         
  static function somaData($data_inicial,$dias){     
    $soma_data = date('Y-m-d', strtotime("+".$dias." days",strtotime($data_inicial)));        
    return $soma_data;     
  }
  
  // Retorna o valor (BANCO) passado em reais (R$)
  static function formataMoeda($valor){        
    return number_format($valor,2,",",".");        
  }       
  
  // Retorna o valor em reais (R$) passado em valor do banco
  static function formataMoedaBd($valor){
    $moeda = str_replace(".","",$valor);    
    $moeda = str_replace(",",".",$moeda);        
    return $moeda;        
  }     
  
  // Gera um hash de uma string de acordo com o tipo passado
  static function geraHash($tipo,$str){        
    if($tipo == "md5"){
      $hash = md5($str);
    }        
    if($tipo == "sha1"){
      $hash = sha1($str); 
    }
    if($tipo == "password"){                
      $options = array(
        'cost' => 7
      );
      $hash = password_hash($str, PASSWORD_BCRYPT, $options);
    }
    return $hash;
  }
  
  // Remove os caracteres não permitidos de uma string
  static function protege($string) {
    // Remove espaços extras do começo e do final
    $string = trim($string);
    // Remove barras invertidas
    $string = stripslashes($string);
    // Converte caracteres especiais em entidades HTML (protege contra XSS)
    $string = htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    return $string;
  }

  // Verifica se é um JSON válido
  static function isValidJSON($string) {
    json_decode($string);
    return (json_last_error() == JSON_ERROR_NONE);
  }
  
  // Adiciona 'HTTP' ou 'HTTPS' a uma string      
  static function urlExt($url){
    $url_explode = explode(":",$url);
    if ($url_explode[0] != "http" && $url_explode[0]!="https") {
      $url = "http://".$url;
    }        
    return $url;   
  }       
  
  // WordWrap
  static function wordWrap($string, $chunk_size = 400) {
    $offset = 0;
    $result = array();
    while(preg_match('#<(\w+)[^>]*>.*?</\1>|<\w+[^>]*/>#', $string, $match, PREG_OFFSET_CAPTURE, $offset)) { 
      if ($match[0][1] > $offset) {
        $non_html = substr($string, $offset, $match[0][1] - $offset);
        $chunks = str_split($non_html, $chunk_size );
        foreach($chunks as $s) {
          // Wrap text with length 8 in <span>, otherwise leave as it is
          $result[] = (strlen($s) == $chunk_size  ? "<span>" . $s . "</span>" : $s);
        }
      } 
      // Leave HTML tags untouched
      $result[] = $match[0][0];
      $offset = $match[0][1] + strlen($match[0][0]);
    }
    // Process last unmatched string
    if(strlen($string) > $offset) {
      $non_html = substr($string, $offset);
      $chunks = str_split($non_html, $chunk_size );
      foreach($chunks as $s) {
        $result[] = strlen($s) == $chunk_size  ? "" . $s . "" : $s;
      }
    } 
    return $result;
  }   
  
  // Limita uma string de acordo com o limite passado    
  static function limitarTexto($texto, $limite) {        
    if(strlen($texto) > $limite){
      $texto = strip_tags($texto);
      $texto = substr($texto, 0, strrpos(substr($texto, 0, $limite), ' ')) . '...';
    }        
    $texto = strip_tags($texto);        
    return $texto; 
  }       
  
  // Cria um arquivo de log
  static function gravaLog($msg, $path, $nome_arquivo){
    $arquivo = fopen($path.'/'.$nome_arquivo,'a');
    if ($arquivo) {
      fwrite($arquivo,"[".date("r")."] -  $msg\r\n--------------------------------------------------------------------------------------\r\n");
      fclose($arquivo);
    }
  }
  
  // Seleciona o campo SELECT caso os dois alores passados sejam iguais
  static function selected($valor_banco, $valor_select) {
    if(isset($valor_banco)){
      if(strval($valor_banco) === strval($valor_select)){
        echo "selected";
      }
    }
  }
  
  // Seleciona o campo RADIO/CHECKBOX caso os dois alores passados sejam iguais
  static function checked($valor_banco, $valor_select) {
    if(isset($valor_banco)){
      if(strval($valor_banco) === strval($valor_select)){
        echo "checked";
      }
    }
  }
  
  // Habilita/Desabilita a exibição de erros de PHP
  static function debug($status) {        
    if ($status == true) {            
      ini_set('display_errors',1);
      ini_set('display_startup_erros',1);
      error_reporting(E_ALL);            
    } else {
      ini_set('display_errors',0);
      ini_set('display_startup_erros',0);
      error_reporting(0);    
    }        
  }   
  
  // Remove o diretório passado
  static function apagarDir($path) {
    if (file_exists($path)) {
      $files = glob($path . '/*');
      foreach ($files as $file) {
        is_dir($file) ? self::apagarDir($file) : unlink($file);
      }
      rmdir($path);           
    }
    return;
  }
  
  // Copia o diretório passado
  static function copiaDir($dirFont, $dirDest) {
    if (!file_exists($dirDest)) {
      mkdir($dirDest);
    }
    if ($dd = opendir($dirFont)) {
      while (false !== ($arq = readdir($dd))) {
        if ($arq != "." && $arq != "..") {
          $pathIn = "$dirFont/$arq";
          $pathOut = "$dirDest/$arq";
          if (is_dir($pathIn)){
            self::copiaDir($pathIn, $pathOut);
          } elseif (is_file($pathIn)) {
            copy($pathIn, $pathOut);
          }
        }
      }
      closedir($dd);
    }
  }
  
  // Gera uma url amigável
  static function geraSlug($str) {
    $find = array('á', 'à', 'ã', 'â', 'é', 'ê', 'í', 'ó', 'ô', 'õ', 'ú', 'ü', 'ç', 'Á', 'À', 'Ã', 'Â', 'É', 'Ê', 'Í', 'Ó', 'Ô', 'Õ', 'Ú', 'Ü', 'Ç','&');
    $replace = array('a', 'a', 'a', 'a', 'e', 'e', 'i', 'o', 'o', 'o', 'u', 'u', 'c', 'A', 'A', 'A', 'A', 'E', 'E', 'I', 'O', 'O', 'O', 'U', 'U', 'C','e');
    $slug = str_replace($find, $replace, $str);
    $slug = strtolower($slug);
    $slug = trim($slug);
    $slug = preg_replace("/[^a-z0-9_\s-]/", "", $slug);
    $slug = preg_replace("/[\s-]+/", " ", $slug);
    $slug = preg_replace("/[\s_]/", "-", $slug);          
    return $slug;
  }   
  
  // Depura um array ou objeto
  static function dump($data) {
    if(is_array($data)) { 
      print "<pre>-----------------------\n";
      print_r($data);
      print "-----------------------</pre>";
    } elseif (is_object($data)) {
      print "<pre>--------------------\n";
      var_dump($data);
      print "--------------------------</pre>";
    } else {
      print "--------------&gt; ";
      var_dump($data);
      print " &lt;-------------------";
    }
  }     
  
  // Recarrega a página
  static function reload() {
    echo "<script>location.reload();</script>";
  }
  
  // Redireciona uma página
  static function redireciona($url) {
    echo "<script>location.href = '".$url."';</script>";
  }
  
  // Exibe um alerta em JAVASCRIPT
  static function alert($msg) {
    echo "<script>alert('".$msg."');</script>";
  }
  
  // Somente números
  static function somenteNumeros($valor){
    $var = preg_replace("/[^0-9]/", "", $valor);       
    return $var;
  }
  
  // Monta uma url com filtros GET removendo campos vazios e não permitidos
  static function montaUrlFiltro($array) {
    $url = "";
    foreach ($array as $key => $value) {
      if ($value != "" && $key != "id" && $key != "path" && $key != "pag" && $key != "p") {
        $url .= strpos($url, '?') === false ? "?".$key."=".$value : "&".$key."=".$value;
      }  
    }
    return $url;
  }
  
  // Mensagem de retorno das ações CRUD  
  static function alertReturn($template = "", $titulo = "", $texto = "", $tipo = "") {
    $templates = array(
      '0' => array(
        'title' => $titulo,
        'text' => $texto,
        'type' => $tipo
      ),
      '1' => array(
        'title' => 'Cadastrado com sucesso',
        'text' => 'Registro cadastrado com sucesso',
        'type' => 'success'
      ),
      '2' => array(
        'title' => 'Atualizado com sucesso',
        'text' => 'Registro atualizado com sucesso',
        'type' => 'success'
      ),
      '3' => array(
        'title' => 'Removido com sucesso',
        'text' => 'Registro removido com sucesso',
        'type' => 'success'
      ),
      '4' => array(
        'title' => 'Erro na operação',
        'text' => 'Não foi possível realizar essa operação',
        'type' => 'error'
      )
    );
      
    $alert =    '<script type="text/javascript">
    $(function(){       
      new PNotify({
        title: "'.$templates[$template]['title'].'",
        text: "'.$templates[$template]['text'].'",
        type: "'.$templates[$template]['type'].'",
        styling: "bootstrap3",
        addclass: "stack-bottomright",
        stack: {"dir1": "up", "dir2": "left"},
        animate: {
          animate: true,
          in_class: "fadeInRight",
          out_class: "fadeOutRight"
        },
        buttons: {
          sticker: false,
          closer_hover: false
        }
      });
    });
    </script>';
    return $alert;
  }
    
  // Aplica uma máscara
  static function mask($string, $mascara) {
    $maskared = '';
    $k = 0;
    for($i=0; $i<=strlen($mascara)-1; $i++) {
      if($mascara[$i] == '#') {
        if(isset($string[$k])) {
          $maskared .= $string[$k++];
        }
      } else {
        if(isset($mascara[$i])) {
          $maskared .= $mascara[$i];
        }
      }
    }
    return $maskared;
  }
    
  // Retorno um array com todos estados brasileiros
  static function getEstados() {
    $estadosBrasileiros = array(
      'AC' => 'Acre',
      'AL' => 'Alagoas',
      'AP' => 'Amapá',
      'AM' => 'Amazonas',
      'BA' => 'Bahia',
      'CE' => 'Ceará',
      'DF' => 'Distrito Federal',
      'ES' => 'Espírito Santo',
      'GO' => 'Goiás',
      'MA' => 'Maranhão',
      'MT' => 'Mato Grosso',
      'MS' => 'Mato Grosso do Sul',
      'MG' => 'Minas Gerais',
      'PA' => 'Pará',
      'PB' => 'Paraíba',
      'PR' => 'Paraná',
      'PE' => 'Pernambuco',
      'PI' => 'Piauí',
      'RJ' => 'Rio de Janeiro',
      'RN' => 'Rio Grande do Norte',
      'RS' => 'Rio Grande do Sul',
      'RO' => 'Rondônia',
      'RR' => 'Roraima',
      'SC' => 'Santa Catarina',
      'SP' => 'São Paulo',
      'SE' => 'Sergipe',
      'TO' => 'Tocantins'
    );
    return $estadosBrasileiros;
  }

  // Recebe data em formato americano e Retorna dia numérico
  static function retornaDia($data) {     
    $data_explode = explode('-', $data);
    $dia = $data_explode[2];
    return substr($dia, 0, 2);
  }
    
  // Retorna os meses do ano
  static function getMeses() {     
    $meses = array(
      '01' => 'Janeiro',
      '02' => 'Fevereiro',
      '03' => 'Março',
      '04' => 'Abril',
      '05' => 'Maio',
      '06' => 'Junho',
      '07' => 'Julho',
      '08' => 'Agosto',
      '09' => 'Setembro',
      '10' => 'Outubro',
      '11' => 'Novembro',
      '12' => 'Dezembro'
    );
    return $meses;
  }

  // Limpa a url de um vídeo do youtube, restando apenas o ID
  static function limparUrlYouTube($url) {
    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=|shorts/|live/)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
    if (!empty($match)) {
      return $match[1];
    }
    return null;
  }

  // Gera uma string aleatória
  static function randomString($length = 10) {
    return substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, $length);
  }

  // Verifica se é Mobile
  static function isMobile($useragent = "") {
    $useragent = $useragent != "" ? $useragent : $_SERVER['HTTP_USER_AGENT'];
    return preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4));
  }

  // Limpa o nome removendo os acentos
  static function limpaNome($str) {
    $find = array('á', 'à', 'ã', 'â', 'é', 'ê', 'í', 'ó', 'ô', 'õ', 'ú', 'ü', 'ç', 'Á', 'À', 'Ã', 'Â', 'É', 'Ê', 'Í', 'Ó', 'Ô', 'Õ', 'Ú', 'Ü', 'Ç', '&');
    $replace = array('a', 'a', 'a', 'a', 'e', 'e', 'i', 'o', 'o', 'o', 'u', 'u', 'c', 'A', 'A', 'A', 'A', 'E', 'E', 'I', 'O', 'O', 'O', 'U', 'U', 'C', 'e');
    $nome = str_replace($find, $replace, $str);
    $nome = trim($nome);
    return $nome;
  }

  // Retorna o primeiro nome
  static function getFirstName($fullName, $clear = false) {
    $fullNameArr = explode(" ", trim($fullName));
    if ($clear) {
      $firstName = ucfirst(strtolower(self::limpaNome($fullNameArr[0])));
    } else {
      $firstName = ucfirst(mb_strtolower($fullNameArr[0]));
    }
    return $firstName;
  }

  // Retorna em string a representação do tempo passado com base em uma data
  static function timeElapsed($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);
    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;
    $string = array(
      'y' => 'ano',
      'm' => 'mês',
      'w' => 'semana',
      'd' => 'dia',
      'h' => 'hora',
      'i' => 'minuto',
      's' => 'segundo',
    );
    foreach ($string as $k => &$v) {
      $v = $k == 'm' && $diff->$k > 1 ? 'mese' : $v;
      if ($diff->$k) {
        $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
      } else {
        unset($string[$k]);
      }
    }
    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' atrás' : 'Agora mesmo';
  }

  /* 
  Retorna uma data em um formato específico
  Segue o formato: https://www.php.net/manual/pt_BR/function.date
  Ex: "2020-02-10 10:00:00" => "{l}, {d} de {F} de {Y} às {H}:{i}h" => "Quarta-feira, 10 de Fevereiro de 2021 às 10:00h"  
  */
  static function formataDataExt($data, $formato = "{d}/{m}/{Y}") {
    $retorno = $formato;
    $timezone = 'America/Sao_Paulo';
    $time = strtotime($data . ' ' . $timezone);
    if ($time === false) {
      return false;
    }
    $meses = array('01' => 'Janeiro', '02' => 'Fevereiro', '03' => 'Março', '04' => 'Abril', '05' => 'Maio', '06' => 'Junho', '07' => 'Julho', '08' => 'Agosto', '09' => 'Setembro', '10' => 'Outubro', '11' => 'Novembro', '12' => 'Dezembro');
    $diasSemana = array('Domingo', 'Segunda-feira', 'Terça-feira',  'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado');
    $siglas = array(
      // Dia do mês com zero à esquerda
      "d" => date("d", $time),
      // Dia da semana abreviado (3 letras)
      "D" => substr($diasSemana[date("w", $time)], 0, 3),
      // Dia do mês sem zero à esquerda
      "j" => date("j", $time),
      // Dia da semana completo
      "l" => $diasSemana[date("w", $time)],
      // Mês completo
      "F" => $meses[date("m", $time)],
      // Mês com zero à esquerda
      "m" => date("m", $time),
      // Mês abreviado (3 letras)
      "M" => substr($meses[date("m", $time)], 0, 3),
      // Ano completo (4 dígitos)
      "Y" => date("Y", $time),
      // Ano abreviado (2 dígitos)
      "y" => date("y", $time),
      // Horas (Formato 24h)
      "H" => date("H", $time),
      // Minutos
      "i" => date("i", $time),
      // Segundos
      "s" => date("s", $time),
    );
    foreach ($siglas as $sigla => $siglaV) {
      $retorno = str_replace("{" . $sigla . "}", $siglaV, $retorno);
    }
    return $retorno;
  }

  // Converte uma lista (array) em CSV e baixa
  static function arrayToCSV($list, $filename = "registros.csv") {
    if (count($list) == 0) {
      return null;
    }
    // Desabilitar cache
    $now = gmdate("D, d M Y H:i:s");
    header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
    header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
    header("Last-Modified: {$now} GMT");
    // Forçar download  
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");
    // Disposição do texto / codificação
    header("Content-Disposition: attachment;filename={$filename}");
    header("Content-Transfer-Encoding: binary");
    // Conversão para CSV
    ob_start();
    $df = fopen("php://output", 'w');
    fputcsv($df, array_keys(reset($list)));
    foreach ($list as $row) {
      fputcsv($df, $row);
    }
    fclose($df);
    return ob_get_clean();
  }

  // Obtém o endereço de IP do usuário
  static function getClientIP() {
    if (!empty($_SERVER['HTTP_X_ORIGINAL_FORWARDED_FOR'])) {
      $ip = $_SERVER['HTTP_X_ORIGINAL_FORWARDED_FOR'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $ipList = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
      $ip = trim($ipList[0]);
    } elseif (!empty($_SERVER['HTTP_CLIENT_IP'])) {
      $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['REMOTE_ADDR'])) {
      $ip = $_SERVER['REMOTE_ADDR'];
    } else {
      $ip = '';
    }
    return filter_var($ip, FILTER_VALIDATE_IP) ? $ip : 'IP inválido';
  }

  // Captcha Simples
  static function captchaValidate($dadosForm) {
    // Verifica se o campo oculto (honeypot) foi preenchido -> possível bot
    if (!empty($dadosForm['cph1d3'])) {
      return false;
    }

    // Verifica se o campo de tempo foi enviado
    if (!isset($dadosForm['cpt1m3'])) {
      return false;
    }

    // Verifica se o tempo de preenchimento foi menor que o limite
    $tempoPreenchimento = time() - intval(self::protege($dadosForm['cpt1m3']));
    $tempoMinimo = 2; // Tempo mínimo aceitável (segundos)
    if ($tempoPreenchimento < $tempoMinimo) {
      return false;
    }

    // Verifica o telefone (Formato BR / Desative em caso de site internacional)
    if ($dadosForm['telefone'] != "" && !self::validatePhoneNumber($dadosForm['telefone'])) {
      return false;
    }

    // Verifica se o campo 'mensagem' contém uma URL
    if (!empty($dadosForm['mensagem']) && preg_match('/https?:\/\/[^\s]+|www\.[^\s]+/i', $dadosForm['mensagem'])) {
      return false;
    }

    // Tudo certo, formulário válido
    return true;
  }

  // Valida número de telefone
  static function validatePhoneNumber($phoneNumber) {
    // Verificar se a string possui parênteses e traço
    if (strpos($phoneNumber, '(') !== false && strpos($phoneNumber, ')') !== false && strpos($phoneNumber, '-') !== false) {  
      // Remover caracteres especiais do número de telefone
      $phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);
      // Verificar se o número possui 11 dígitos (com DDD)
      if (strlen($phoneNumber) === 11) {
        // Verificar se os dígitos do DDD são válidos (de 11 a 99)
        $ddd = substr($phoneNumber, 0, 2);
        if (is_numeric($ddd) && ($ddd >= 11 && $ddd <= 99)) {
          // Verificar se os dígitos restantes são numéricos
          $digits = substr($phoneNumber, 2);
          if (is_numeric($digits)) {
            return true;
          }
        }
      }
    }
    return false;
  }

  // Valida o Google Recaptcha
  static function reCAPTCHAisValid($secretKey, $token) {
    if (!$secretKey) {
      return [
        'is_valid' => false,
        'return' => 'Chave secreta não enviada.',
      ];
    }
    if (!$token) {
      return [
        'is_valid' => false,
        'return' => 'Token do formulário não enviado.',
      ];
    }
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array(
      'secret' => $secretKey,
      'response' => $token,
      'remoteip' => self::getClientIP()
    );
    $options = array(
      'http' => array(
        'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query($data)
      )
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    $responseData = json_decode($response, true);
    if ($responseData['success'] == true && $responseData['action'] == 'submit' && $responseData['score'] >= 0.5) {
      return [
        'is_valid' => true,
        'return' => $responseData,
      ];
    } else {
      return [
        'is_valid' => false,
        'return' => $responseData,
      ];
    }
  }

  // Calcula o tempo de leitura com base no tamanho do texto
  static function calcReadingTime($content = '', $wpm = 250) {
    //$clean_content = strip_shortcodes( $content );
    $clean_content = preg_replace('#\[[^\]]+\]#', '', $content);
    $clean_content = strip_tags($clean_content);
    $word_count = str_word_count($clean_content);
    $time = ceil($word_count / $wpm);
    return $time;
  }

  // Gera uma thumb SVG em base64
  static function genPchSrc($width, $height) {
    $svg = "<svg xmlns='http://www.w3.org/2000/svg' width='$width' height='$height' viewBox='0 0 $width $height'></svg>";
    return "data:image/svg+xml," . rawurlencode($svg);
  }

  // Retorna a thumb do vídeo
  static function getVideoThumb($videoID, $videoPlataform = "youtube", $thumbFile = "") {
    $videoID = trim($videoID);
    if ($videoID != "") {
      if ($videoPlataform == "youtube") {
        $urlThumb = "https://img.youtube.com/vi/" . $videoID . "/";
        $thumbFile = $thumbFile != "" ? $thumbFile : "0.jpg";
        return $urlThumb . $thumbFile;
      } else if ($videoPlataform == "vimeo") {
        /* $apiData = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$id.php"));
        if (is_array($apiData) && count($apiData) > 0) {
          $videoInfo = $apiData[0];
          $thumbFile = $thumbFile != "" ? $thumbFile : "thumbnail_large";
          return $videoInfo[$thumbFile];
        } */
        return "https://vumbnail.com/" . $videoID . ".jpg";
      }
    }
    return false;
  }

  // Cria um Cookie de forma segura
  static function createCookie($name, $value, $expirationDays = 30) {
    $expirationTime = time() + (86400 * intval($expirationDays));
    setcookie($name, $value, [
      'expires' => $expirationTime,
      'path' => '/',
      'secure' => isset($_SERVER['HTTPS']),
      //'httponly' => true,
      'samesite' => 'Lax'
    ]);
    $_COOKIE[$name] = $value;
  }

  // Remove um Cookie corretamente
  static function deleteCookie($name) {
    setcookie($name, "", [
      'expires' => time() - 3600,
      'path' => '/',
      'secure' => isset($_SERVER['HTTPS']),
      'httponly' => true,
      'samesite' => 'Lax'
    ]);
    unset($_COOKIE[$name]);
  }

  // Obtém a localização do visitante com base no IP
  static function getLocationIP($userIp) {
    $cookieName = 'geoip';
    if (!empty($_COOKIE[$cookieName])) {
      $geoLocation = json_decode($_COOKIE[$cookieName], true);
      if (!empty($geoLocation) && isset($geoLocation['status']) && $geoLocation['status'] === 'success') {
        return $geoLocation;
      }
    }
    // Faz a requisição na API caso não haja cookie válido
    $geoLocation = self::ipApiGet($userIp);
    // Se a API retornar sucesso, armazena o resultado no cookie
    if (!empty($geoLocation) && isset($geoLocation['status']) && $geoLocation['status'] === 'success') {
      self::createCookie($cookieName, json_encode($geoLocation), 1);
    }
    return $geoLocation;
  }

  // Função separada para obter dados da API
  static function ipApiGet($userIp) {
    $urlApi = "https://pro.ip-api.com/json/{$userIp}?key=KzmKpd0XHKyX6wD&fields=status,message,country,countryCode,region,regionName,city,query&lang=pt-BR";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $urlApi);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 3);
    curl_setopt($ch, CURLOPT_ENCODING, "utf-8");
    $result = curl_exec($ch);
    curl_close($ch);
    return json_decode($result, true) ?? [];
  }

  // Requisição básica CURL
  static function curlRequest($method, $endpoint, $data = [], $extra = []) {
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
    curl_setopt($ch, CURLOPT_URL, $endpoint);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_ENCODING, "utf-8");
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeOutLimit);
    $result = curl_exec($ch);
    if ($result === false) {
      $erro = curl_error($ch);
      curl_close($ch);
      return json_encode([
        'status' => "error",
        'message' => "Erro na requisição: " . $erro
      ]);
      //throw new Exception("Erro na requisição: " . $erro);
    }
    $codResp = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($codResp >= 400) {
      curl_close($ch);
      return json_encode([
        'status' => "error",
        'message' => "Erro na requisição: código de resposta HTTP " . $codResp
      ]);
      //throw new Exception("Erro na requisição: código de resposta HTTP " . $codResp);
    }
    curl_close($ch);
    return $result;
  }

  static function generateCsrfToken() {
    return bin2hex(random_bytes(32));
  }

  static function verifyCsrfToken($token) {
    return isset($_SESSION['csrf_token_painel']) && hash_equals($_SESSION['csrf_token_painel'], $token); 
  } 

  // Função para gerar link do Google Maps a partir de um endereço
  static function getGoogleMapsLink($address) {
    $addressEncoded = urlencode($address);
    $link = "https://www.google.com/maps?q=" . $addressEncoded;
    return $link;
  }

}
