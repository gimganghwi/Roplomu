<?php
//if (!defined('_CONFIGCONSTANT_')) exit;

function roplolist($skin_dir='', $cache_time=1, $options='')
{
    global $r_url;
    global $table_profile;
    global $table_roplo;
    global $member;

    if (!$skin_dir) $skin_dir = 'basic';

    if(preg_match('#^theme/(.+)$#', $skin_dir, $match)) {
        if (G5_IS_MOBILE) {
            $roplolist_skin_path = G5_THEME_MOBILE_PATH.'/'.G5_SKIN_DIR.'/roplolist/'.$match[1];
            if(!is_dir($roplolist_skin_path))
                $roplolist_skin_path = G5_THEME_PATH.'/'.G5_SKIN_DIR.'/roplolist/'.$match[1];
            $roplolist_skin_url = str_replace(G5_PATH, G5_URL, $roplolist_skin_path);
        } else {
            $roplolist_skin_path = G5_THEME_PATH.'/'.G5_SKIN_DIR.'/roplolist/'.$match[1];
            $roplolist_skin_url = str_replace(G5_PATH, G5_URL, $roplolist_skin_path);
        }
        $skin_dir = $match[1];
    } else {
        if(G5_IS_MOBILE) {
            $roplolist_skin_path = G5_MOBILE_PATH.'/'.G5_SKIN_DIR.'/roplolist/'.$skin_dir;
            $roplolist_skin_url  = G5_MOBILE_URL.'/'.G5_SKIN_DIR.'/roplolist/'.$skin_dir;
        } else {
            $roplolist_skin_path = G5_SKIN_PATH.'/roplolist/'.$skin_dir;
            $roplolist_skin_url  = G5_SKIN_URL.'/roplolist/'.$skin_dir;
        }
    }

    $cache_fwrite = true;//false;
    if(G5_USE_CACHE) {
        $cache_file = G5_DATA_PATH."/cache/roplolist-{$member['md_id']}-serial.php";

        if(!file_exists($cache_file)) {
            $cache_fwrite = true;
        } else {
            if($cache_time > 0) {
                $filetime = filemtime($cache_file);
                if($filetime && $filetime < (G5_SERVER_TIME - 3600 * $cache_time)) {
                    @unlink($cache_file);
                    $cache_fwrite = true;
                }
            }
            
            if(!$cache_fwrite) {
                try{
                    $file_contents = file_get_contents($cache_file);
                    $file_ex = explode("\n\n", $file_contents);
                    $caches = unserialize(base64_decode($file_ex[1]));

                    $list = (is_array($caches) && isset($caches['list'])) ? $caches['list'] : array();
                } catch(Exception $e){
                    $cache_fwrite = true;
                    $list = array();
                }
            }
        }
    }

    if(!G5_USE_CACHE || $cache_fwrite) {

        $list = array();

        $sql="SELECT * from $table_roplo INNER JOIN $table_profile WHERE $table_profile.member_id = '{$member['mb_id']}' AND $table_roplo.id = $table_profile.roplo_id";
        $result = sql_query($sql);
        for( $i=0 ; $row = sql_fetch_array( $result ) ; $i++ ) { 
            $list[$i] = $row;
        }

        if($cache_fwrite) {
            $handle = fopen($cache_file, 'w');
            $caches = array(
                'list' => $list,
                );
            $cache_content = "<?php if (!defined('_GNUBOARD_')) exit; ?>\n\n";
            $cache_content .= base64_encode(serialize($caches));  //serialize

            fwrite($handle, $cache_content);
            fclose($handle);

            @chmod($cache_file, 0640);
        }
    }

    ob_start();
    include $roplolist_skin_path.'/roplolist.skin.php';
    $content = ob_get_contents();
    ob_end_clean();

    return $content;
}
?>
