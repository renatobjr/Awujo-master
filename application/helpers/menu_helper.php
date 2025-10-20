<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('is_active_link')) {
  function is_active_link($uri_segment = '', $match_type = 'segment',  $active_class = 'active') {
    $CI =& get_instance();

    $current_uri = $CI->uri->uri_string();
    if (empty($current_uri) || $current_uri === 'dashboard/index') $current_uri = 'dashboard';

    if ($match_type === 'exact') {
        if ($current_uri === $uri_segment) {
            return $active_class;
        }
    } else if ($match_type === 'segment') {
        // Usa strpos e a verificação de prefixo (como estava), mas é melhor 
        // usar uma correspondência que verifica se a URI começa com o segmento
        // OU se é a URI do segmento exatamente.
        if (strpos($current_uri, $uri_segment) === 0) {
             return $active_class;
        }
    }

    return '';
  }
}