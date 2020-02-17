/**
 * Add br to wysiwyg editor
 *
 * @package WordPress
 * @subpackage Parker et Parker
 * @since Parker et Parker 1.0
 * @author Philippe BARTOLESCHI - Smart 7
 */
(function() {
	tinymce.create('tinymce.plugins.br', {
		init : function(ed, url) {
			ed.addCommand('tinyBr', function() {
				ed.execCommand('mceInsertContent', false, '<br />');
			});
			ed.addButton('br', {title : 'Insérer un saut de ligne', cmd : 'tinyBr', image:url+'/../tinymce/images/br.png' });
		},
	});
	tinymce.PluginManager.add('br', tinymce.plugins.br);
})();