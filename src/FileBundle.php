<?php
/* Digraph Core | https://gitlab.com/byjoby/digraph-core | MIT License */
namespace Digraph\Modules\FileTypes;

use Digraph\DSO\Noun;
use Digraph\FileStore\FileStoreFile;

class FileBundle extends Noun
{
    const ROUTING_NOUNS = ['file-bundle'];
    const FILESTORE = true;
    const FILESTORE_PATH = 'filefield';
    const FILESTORE_FILE_CLASS = FileStoreFile::class;
    const SLUG_ENABLED = true;

    public function formMap(string $action) : array
    {
        $map = parent::formMap($action);
        $s = $this->factory->cms()->helper('strings');
        $map['file'] = [
            'weight' => 250,
            'label' => $s->string('forms.file.upload_multi.container'),
            'class' => 'Digraph\\Forms\\Fields\\FileStoreFieldMulti',
            'required' => true,
            'extraConstructArgs' => [static::FILESTORE_PATH]
        ];
        $map['gallery'] = [
            'weight' => 251,
            'field' => 'file-bundle.gallery',
            'label' => $s->string('forms.file-bundle.gallery'),
            'class' => 'Formward\Fields\Checkbox'
        ];
        return $map;
    }
}
