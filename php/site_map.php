<?php
//******************
// 必須設定
//******************
// トップページのURL
// ※末尾スラッシュ必須
define("HOMEPAGE", "https://40010monogatari.com/");

// ドキュメントルート
// ※絶対パスで指定
// 末尾スラッシュ必須
define("DOCUMENT_ROOT", "/home/c9005843/public_html/40010monogatari.com/");

// 出力するXMLサイトマップのファイルパス
// ※絶対パスで指定
define("OUTPUT",   DOCUMENT_ROOT . "sitemap.xml");

//******************
// 以下任意の設定
//******************

// サイトマップに登録しない拡張子
// ※ドット「.」必須
$ignore_types = array(".jpg", ".png", ".gif", ".dat", ".log", ".jpeg", ".webp", ".svg", ".webp2", ".pdf");

// サイトマップに登録しないファイル名
$ignore_files = array();

// // サイトマップに登録しないディレクトリ名(例：認証ありのURL)
$ignore_dirs  = array("https://40010monogatari.com/online/products/list/");

// 省略可能なファイル名の優先順位
// (サーバの設定と同じにしないと更新日時が違う可能性アリ)
$index_name   = array("index.html", "index.php", "index.cgi");

// 先頭に空の値を追加
array_unshift($index_name, "");

// 優先度の設定
// ディレクトリが深くなるごとの数値を決める (0.0～1.0)
// ※現時点ではGoogleはpriorityの値を使用していない
$priority_set = array(1.0, 0.8, 0.5, 0.2);

// 更新頻度目安の設定
// 動的ページは随時(always)に設定
// always, hourly, daily, weekly, monthly, yearly, never
define("FREQ_SET",   "weekly");

// 実行開始時刻
// 現在時刻をUNIX時間で取得 (1970年1月1日0時0分0秒からの秒数)
$start_time = date("U");

// URLを保存する変数
$URLs[md5(HOMEPAGE) . "0"] = [
    'url' => HOMEPAGE,
    'lastmod' => false,
    'priority_flg' => 0,
    'freq_set' => FREQ_SET,
];
foreach ($index_name as $index) {
    if (is_file(DOCUMENT_ROOT . $index)) {
        $file_path = DOCUMENT_ROOT . $index;
        break;
    }
}
if (isset($file_path)) {
    $modified_time = @filemtime($file_path);
    $URLs[md5(HOMEPAGE) . "0"]['lastmod'] = date(DATE_W3C, $modified_time);
}

// 登録しない拡張子とファイル名を連結する
$ignores = array_merge($ignore_types, $ignore_files);

// 無限ループ回避用
$infinity = 0;

/**
 * WEBページをHTTP通信で取得して、クロールしながら取得
 * @param string $URL
 */

function getSiteURLs($URL)
{
    global $infinity;
    // 無限ループに陥っても終了するようにクロールするページ数のMAXを設定する
    // 最大ページ数ではないので注意すること (初期値 : 1000)
    if ($infinity < 1000) {
        $infinity++;
        global $URLs;
        global $ignores;
        global $ignore_dirs;
        global $index_name;

        // URLの内容を全て文字列に読み込む
        $html = @file_get_contents($URL);
        $URL = explode("/", $URL);
        if (isset($html) && $html !== 0) {
            // ページ内のリンクを全て取得
            preg_match_all('/<?a [^>]*?href="([^"]+?)"[^>]*>/i', $html, $anchors);
            foreach ($anchors[1] as $a) {
                $flag = true;

                // URLからページ内リンク（アンカー）を削除
                $a = preg_replace('/([^#]+)(#.*){0,1}/', '$1', $a);
                $anchor = $a;

                // ルートパス(/)にドメインを付与
                if (preg_match('/^\/(.*)$/', $a, $m)) {
                    $anchor = HOMEPAGE . $m[1];
                }
                // http・httpsなしURLにhttpまたはhttpsを付与
                //https通信が使われている場合、全てにhttpsを付与するが、一部httpにする必要あり？
                if (preg_match('/^\/\/(.*)$/', $a, $m)) {
                    $anchor = 'https://' . $m[1];
                }

                $URL_buff = $URL;
                if (strpos($anchor, "..") === 0) {
                    // 文頭に相対パスの記述(../)をURLに変換
                    $m = substr_count($anchor, "../") + 1;
                    array_splice($URL_buff, (0 - $m), $m);
                    $next = implode("/", $URL_buff) . '/' . preg_replace("/^(\.\.\/)+/", "", $anchor);
                } else if (strpos($anchor, ".") === 0) {
                    // 文頭に相対パスの記述(./の)をURLに変換
                    $URL_buff[count($URL_buff) - 1] = "";
                    $next = implode("/", $URL_buff) . preg_replace("/^\.\//", "", $anchor);

                } else if (strpos($anchor, HOMEPAGE) === 0) {
                    // 内部サイトURL
                    $next = $anchor;
                } 

                // 除外する拡張子・ファイルがあるか確認する
                foreach ($ignores as $ignore) {
                    $i = explode($ignore, $next);
                    if (empty(end($i))) {
                        $flag = false;
                    }
                }
                // 除外するディレクトリか確認する
                foreach ($ignore_dirs as $ignore) {
                    $i = explode(HOMEPAGE . $ignore, $next); 
                    if (count($i) > 1) {
                        $flag = false;
                    }
                }
                // ルートパスを取得
                $root_path_data = explode(HOMEPAGE, $next);
                $root_path = end($root_path_data);

                // URLをスラッシュ「/」区切りし、末尾の情報を取得
                $next_hierarchy_data = explode("/", $next); 
                $end_url = end($next_hierarchy_data); 

                if($flag){
                    if (!isset($URLs[md5($next) . "0"]['url'])) {
                        // 新しいURLの時は登録する
                        // priority_flgは、HOMEPAGEを0, 1階層目を1, 2階層目を2...と設定していく。
                        $URLs[md5($next) . "0"] = [
                            'url' => $next,
                            'lastmod' => false,
                            'priority_flg' => count(explode("/", $root_path)),
                            'prev_url' => implode('/', $URL),
                            'freq_set' => FREQ_SET,

                        ];

                        // ファイルの更新を取得・設定
                        foreach ($index_name as $index) {
                            if (is_file(DOCUMENT_ROOT . $root_path . $index)) {
                                $file_path = DOCUMENT_ROOT . $root_path . $index;
                                break;
                            }
                        }
                        if(isset($file_path)){
                            $modified_time = @filemtime($file_path);
                            $URLs[md5($next) . "0"]['lastmod'] = date(DATE_W3C, $modified_time);
                        }

                        // urlの末尾がスラッシュ「/」の場合、end(explode("/", $next))の値が""となり、本来のpriority_flgより1多く設定される。
                        // 本来の階層と合わせるため、1減算する。
                        if ($end_url === "") {
                            $URLs[md5($next) . "0"]['priority_flg']--;
                       }

                        getSiteURLs($next);
                    } else {
                        if ($URLs[md5($next) . "0"]['url'] === $next) {
                            // 既にURLが追加済みの場合、終了する
                        } else {
                            // 同じMD5値が登録されているか確認する
                            // 且つ、そのキーの配列が現在のURLでないことを確認する
                            $i = 1;
                            while (isset($URLs[md5($next) . $i]['url']) && $URLs[md5($next) . $i]['url'] !== $next) {
                                $i++;
                            }
                            if (!isset($URLs[md5($next) . $i]['url'])) {
                                $URLs[md5($next) . $i] = [
                                    'url' => $next,
                                    'lastmod' => false,
                                    'priority_flg' => count(explode("/", $root_path)),
                                    'prev_url' => implode('/', $URL),
                                    'freq_set' => FREQ_SET,
                                ];
                                // ファイルの更新を取得・設定
                                foreach ($index_name as $index) {
                                    if (is_file(DOCUMENT_ROOT . $root_path . $index)) {
                                        $file_path = DOCUMENT_ROOT . $root_path . $index;
                                        break;
                                    }
                                }
                                if(isset($file_path)){
                                    $modified_time = @filemtime($file_path);
                                    $URLs[md5($next) . "0"]['lastmod'] = date(DATE_W3C, $modified_time);
                                }
                                if ($end_url === "") {
                                    $URLs[md5($next) . "0"]['priority_flg']--;
                                }
                                getSiteURLs($next);
                            }
                        }
                    }
                }
            }
        }
    }
}

//******************
// MAIN
//******************

getSiteURLs(HOMEPAGE);

$xml = new DOMDocument("1.0", "UTF-8");
$xml->formatOutput = TRUE;
$xml_root = $xml->createElement("urlset");
foreach ($URLs as $urlinfo) {
    // 存在しないURLか確認する
    $fp = @fopen($urlinfo['url'], 'r');
    if (!$fp) {
        continue;
    }
    $xml_row = $xml->createElement("url");
    foreach ($urlinfo as $key => $value) {
        switch ($key) {
            case 'url':
                $xml_field = $xml->createElement('loc', $value);
                break;
            case 'lastmod':
                if ($value) {
                    $lastmod = $value;
                    $xml_field = $xml->createElement('lastmod', $lastmod);
                }
                break;
            case 'priority_flg':
                if ($value < count($priority_set)) {
                    $priority = $priority_set[$value];
                } else {
                    $priority = end($priority_set);
                }
                $xml_field = $xml->createElement('priority', $priority);
                break;
            case 'freq_set':
                $xml_field = $xml->createElement('changefreq', $value);
                break;
            default:
                break;
        }
        $xml_row->appendChild($xml_field);
    }
    $xml_root->appendChild($xml_row);
    $xml_root->setAttribute("xmlns", "http://www.sitemaps.org/schemas/sitemap/0.9");
    $xml_root->setAttribute("xmlns:xsi", "http://www.w3.org/2001/XMLSchema-instance");
}
$xml->appendChild($xml_root);
$xml->save(OUTPUT);

exit;