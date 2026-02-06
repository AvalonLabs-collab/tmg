<?php

function is_void($tag)
{
    $void = ['area', 'base', 'br', 'col', 'embed', 'hr', 'img', 'input', 'link', 'meta', 'param', 'source', 'track', 'wbr'];

    return in_array(strtolower($tag), $void, true);
}

function count_top_level_roots($content)
{
    // remove Blade comments
    $content = preg_replace('/\{--.*?--\}/s', '', $content);
    // remove HTML comments
    $content = preg_replace('/<!--.*?-->/s', '', $content);

    $len = strlen($content);
    $i = 0;
    $depth = 0;
    $top = 0;
    while ($i < $len) {
        $ch = $content[$i];
        if ($ch === '<') {
            // skip doctype or comments handled above
            if ($i + 1 < $len && ($content[$i + 1] === '!' || $content[$i + 1] === '?')) {
                $i++;
                while ($i < $len && $content[$i] !== '>') {
                    $i++;
                }
                $i++;

                continue;
            }
            // find end of tag
            $j = $i + 1;
            // skip whitespace
            while ($j < $len && ctype_space($content[$j])) {
                $j++;
            }
            if ($j < $len && $content[$j] === '/') {
                // closing tag
                $j++;
                // read tag name
                $start = $j;
                while ($j < $len && preg_match('/[A-Za-z0-9:\-]/', $content[$j])) {
                    $j++;
                }
                $tag = substr($content, $start, $j - $start);
                if ($depth > 0) {
                    $depth--;
                }
                // move to end '>'
                while ($j < $len && $content[$j] !== '>') {
                    $j++;
                }
                $i = $j + 1;

                continue;
            } else {
                // opening tag or self-closing
                $start = $j;
                while ($j < $len && preg_match('/[A-Za-z0-9:\-]/', $content[$j])) {
                    $j++;
                }
                $tag = substr($content, $start, $j - $start);
                // if tag is empty (could be blade like < x-something), try to skip
                if ($tag === '') {
                    // attempt to find next '>' and continue
                    while ($i < $len && $content[$i] !== '>') {
                        $i++;
                    }
                    $i++;

                    continue;
                }
                // if depth==0, count as top-level element
                if ($depth === 0) {
                    $top++;
                }
                // find end of tag to check for '/>'
                $k = $j;
                $is_self_close = false;
                while ($k < $len && $content[$k] !== '>') {
                    $k++;
                }
                if ($k - 1 >= 0 && $content[$k - 1] === '/') {
                    $is_self_close = true;
                }
                if (! $is_self_close && ! is_void($tag)) {
                    $depth++;
                }
                $i = $k + 1;

                continue;
            }
        }
        $i++;
    }

    return $top;
}

$dir = __DIR__.'/../resources/views/livewire';
if (! is_dir($dir)) {
    echo "Directory not found: $dir\n";
    exit(1);
}
$rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
$files = [];
foreach ($rii as $file) {
    if ($file->isDir()) {
        continue;
    }
    if (substr($file->getFilename(), -10) === '.blade.php') {
        $files[] = $file->getPathname();
    }
}

$problems = [];
foreach ($files as $f) {
    $content = file_get_contents($f);
    $count = count_top_level_roots($content);
    if ($count > 1) {
        $problems[$f] = $count;
    }
}

if (empty($files)) {
    echo "No Livewire blade views found in resources/views/livewire\n";
    exit(0);
}

echo 'Scanned '.count($files)." Livewire blade views.\n";
if (empty($problems)) {
    echo "No views with more than one top-level root element found.\n";
    exit(0);
}

echo "Views with multiple top-level root elements:\n";
foreach ($problems as $p => $c) {
    echo '- '.$p.' => '.$c." roots\n";
}

exit(0);
