<?php
$noun = $package->noun();
$fs = $cms->helper('filestore');
$files = $fs->list($noun, $noun::FILESTORE_PATH);
if (!$files) {
    return;
}

foreach ($files as $f) {
    echo $f->metacard();
}
