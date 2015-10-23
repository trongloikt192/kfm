/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */
var configCKE = {
    skin: 'moonocolor',
    // codeSnippet_theme: 'Monokai',
    language: 'vi',
    height: 400,
    // filebrowserBrowseUrl: '{{ url() }}',
    toolbarGroups: [
        { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
        // { name: 'editing',     groups: [ 'find', 'selection', /* 'spellchecker' */ ] },
        { name: 'links' },
        { name: 'insert' },
        // { name: 'forms' },
        { name: 'document',    groups: [ 'mode', 'document', 'doctools' ] },
        { name: 'tools' },
        { name: 'others' },
        //'/',
        { name: 'colors' },
        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
        { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
        { name: 'styles' }
    ]
};
        
CKEDITOR.editorConfig = function( configCKE ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
};
