<?php
/**
 * Markdown语法编辑器
 * Created by ycy
 * User: ycy
 * AddTime: 2018/3/19 下午3:07
 */
namespace App\Admin\Extensions;

use Encore\Admin\Form\Field;

class MarkDown extends Field
{
    protected $view = 'admin.form.editor';

    protected $id = 'myEditor';

    protected static $css = [
        'http://cdn.bootcss.com/codemirror/4.10.0/codemirror.min.css',
        'http://cdn.bootcss.com/highlight.js/8.4/styles/default.min.css',

        'plugin/editor/css/pygment_trac.css',
        'plugin/editor/css/editor.css',
    ];

    protected static $js = [
//        'http://cdn.bootcss.com/highlight.js/8.4/highlight.min.js',
//        'http://cdn.bootcss.com/marked/0.3.2/marked.min.js',
//        'http://cdn.bootcss.com/codemirror/4.10.0/codemirror.min.js',
//        'http://cdn.bootcss.com/zeroclipboard/2.2.0/ZeroClipboard.min.js',
//
//        'plugin/editor/js/highlight.js',
//        'plugin/editor/js/modal.js',
//        'plugin/editor/js/MIDI.js',
//        'plugin/editor/js/fileupload.js',
//        'plugin/editor/js/bacheditor.js',
//        'plugin/editor/js/bootstrap3-typeahead.js',
    ];
}