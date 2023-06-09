<?php

// Filtro que ajudam com inserções de comentários visando diminuir chances de ataque XSS no futuro
function htmlchars($string = "")
{
  return htmlspecialchars($string, ENT_QUOTES, 'UTF-8', false);
}

// Função que faz o registro dos logs das ações reaizados ao longo do sistema
function logs($id_user,$situacao,$pagina,$detalhes){
    $Log = Controller::model("Log");   
    $Log->set("id_user",$id_user)
        ->set("situacao",$situacao)
        ->set("pagina",$pagina)
        ->set("detalhes",$detalhes);
    $Log->save();  
}

/**
 * Criar um SEO amigável para uso dentro do sistema
 * @param  string $string
 * @return string
 */
function url_slug($string = "")
{
    if (!is_string($string)) {
        $string = "";
    }

    $s = trim(mb_strtolower($string));

   
    $s = str_replace(
        array("ü", "ö", "ğ", "ı", "ə", "ç", "ş"),
        array("u", "o", "g", "i", "e", "c", "s"),
        $s);

  
    $cyr = array('а','б','в','г','д','е','ё','ж','з','и','й','к','л','м',
                 'н','о','п','р','с','т','у', 'ф','х','ц','ч','ш','щ','ъ',
                 'ы','ь', 'э', 'ю','я');
    $lat = array('a','b','v','g','d','e','io','zh','z','i','y','k','l',
                 'm','n','o','p','r','s','t','u', 'f', 'h', 'ts', 'ch',
                 'sh', 'sht', 'a', 'i', 'y', 'e','yu', 'ya');
    $s = str_replace($cyr, $lat, $s);


    $s = preg_replace("/[^a-z0-9]/", "-", $s);


    $s = preg_replace("/-{2,}/", "-", $s);

    return trim($s, "-");
}


/**
 * Deletar arquivos ou pastas 
 * @param string $path Path to file or folder
 */
function deletePath($path)
{
    if (is_dir($path) === true) {
        $files = array_diff(scandir($path), array('.', '..'));

        foreach ($files as $file) {            
            deletePath(realpath($path) . '/' . $file);
        }

        return rmdir($path);
    } else if (is_file($path) === true) {
        return unlink($path);
    }

    return false;
}

/**
 * Validação de data
 * @param  string  $date   date string
 * @param  string  $format
 * @return boolean
 */
function isValidDate($date, $format = 'Y-m-d H:i:s')
{
    $d = \DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

/**
 * Verificação de trabalho real de arquivos 
 *
 * @param  integer  $size      size in bytes
 * @param  integer $precision
 * @return string|bool
 */
function readableFileSize($size, $precision = 2) {
    if ($size < 0) {
        $size = 0;
    }

    $units = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
    $step = 1024;
    $i = 0;

    $max = count($units) - 1;

    while (($size / $step) > 0.9) {
        $size = $size / $step;
        $i++;

        if ($i > $max) {
            return false;
        }
    }

    return round($size, $precision). $units[$i];
}

/**
 * Convert numbers to human readable formats (Ex: 3K, 3.4M)
 * @param  integer $numbers Number to convert
 * @return string
 */
function readableNumber($numbers, $precision = 2)
{
   $readable = ["",  "K", "M", "B"];
   $index = 0;

   while($numbers > 1000){
      $numbers /= 1000;
      $index++;
   }
   return round($numbers, $precision) ." ". $readable[$index];
}

/*
 * Informações Gerais do site
 * @param  string $name  data identifier
 * @param  string $field
 * @return string
 */
function general_data($name, $field = null)
{
    if (!is_string($name)) {
        return null;
    }

    if (!isset($GLOBALS["General_Data"]) || !is_array($GLOBALS["General_Data"])) {
        $GLOBALS["General_Data"] = array();
    }

    if (isset($GLOBALS["General_Data"][$name])) {
        $settings = $GLOBALS["General_Data"][$name];
    } else {
        $settings = Controller::model("GeneralData", $name);
        $GLOBALS["General_Data"][$name] = $settings;
    }

    if (is_string($field)) {      
        return $settings->get("data.".$field);
    }

    return $settings;
}

/**
 * Get settings
 * @return string
 */
function site_settings($field = null)
{
    return general_data("settings", $field);
}


/**
 * Pequena opções de escolha cadastradas no sistemas
 * @param  string  $option_name
 * @param  boolean $default_value 
 */
function get_option($option_name, $default_value = false)
{  
    return "default";
}


/**
 * Get/Set option values [code, shortcode, name, localname] for the ACTIVE_LANG
 * @param  string $option Name of the option
 * @param  string|null $value  value of the option to set. If null don't update the value
 * @return string|null         Value of the option or null (if not found)
 */
function active_lang($option, $value = null)
{
    $options = ["code", "shortcode", "name", "localname"];

    if (!in_array($option, $options)) {

        return null;
    }

    if (!defined('ACTIVE_LANG')) {
      
        return null;
    }

    if (is_null($value)) {
        if (Config::get("active_lang_".$option)) {
        
            return Config::get("active_lang_".$option);
        }

        foreach (Config::get("applangs") as $al) {
            if ($al["code"] == ACTIVE_LANG) {
        
                foreach ($al as $key => $value) {
                    Config::set("active_lang_".$key, $value);
                }
                break;
            }
        }

        return Config::get("active_lang_".$option);
    } else {
        Config::set("active_lang_".$option, $value);
        return Config::get("active_lang_".$option);
    }
}

