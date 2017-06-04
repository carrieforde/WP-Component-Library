<?php
/**
 * Buttons Component
 *
 * @since   0.0.0
 * @package WP_Component_Library
 */
?>

<section class="wpcl-component component-text-elements">

	<div class="text-element">
		<h2><?php esc_html_e( 'Headings', 'wp-components' ); ?></h2>

		<h1><?php esc_html_e( 'Heading 1', 'alcatraz' ); ?></h1>
		<h2><?php esc_html_e( 'Heading 2', 'alcatraz' ); ?></h2>
		<h3><?php esc_html_e( 'Heading 3', 'alcatraz' ); ?></h3>
		<h4><?php esc_html_e( 'Heading 4', 'alcatraz' ); ?></h4>
		<h5><?php esc_html_e( 'Heading 5', 'alcatraz' ); ?></h5>
		<h6><?php esc_html_e( 'Heading 6', 'alcatraz' ); ?></h6>
	</div>

	<div class="text-element">
		<h2><?php esc_html_e( 'Horizontal Rule', 'wp-components' ); ?></h2>

		<hr />
	</div>

	<div class="text-element">
		<h2><?php esc_html_e( 'Inline Elements', 'wp-components' ); ?></h2>

		<p><a href="#"><?php esc_html_e( 'This is a text link', 'alcatraz' ); ?></a></p>

		<p><strong><?php esc_html_e( 'Strong is used to indicate strong importance', 'alcatraz' ); ?></strong></p>

		<p><em><?php esc_html_e( 'This text has added emphasis', 'alcatraz' ) ?></em></p>

		<p><?php esc_html_e( 'The ', 'alcatraz' ); ?><b><?php esc_html_e( 'b element', 'alcatraz' ); ?></b><?php esc_html_e( ' is stylistically different from normal text, without any special importance', 'alcatraz' ); ?></p>

		<p><?php esc_html_e( 'The ', 'alcatraz' ); ?><i><?php esc_html_e( 'i element', 'alcatraz' ); ?></i><?php esc_html_e( ' is text that is set off from the normal text', 'alcatraz' ); ?></p>

		<p><?php esc_html_e( 'The ', 'alcatraz' ); ?><u><?php esc_html_e( 'u element', 'alcatraz' ); ?></u><?php esc_html_e( ' is text with an unarticulated, though explicitly rendered, non-textual annotation', 'alcatraz' ); ?></p>

		<p><del><?php esc_html_e( 'This text is deleted' ); ?></del><?php esc_html_e( ' and ', 'alcatraz' ); ?><ins><?php esc_html_e( 'this text is inserted', 'alcatraz' ); ?></ins></p>

		<p><s><?php esc_html_e( 'This text as a strikethrough', 'alcatraz' ); ?></s></p>

		<p><?php esc_html_e( 'Superscript', 'alcatraz' ); ?><sup>&reg;</sup></p>

		<p><?php esc_html_e( 'Subscript for things like H', 'alcatraz' ); ?><sub><?php esc_html_e( '2', 'alcatraz' ); ?></sub><?php esc_html_e( 'O', 'alcatraz' ); ?></p>

		<p><small><?php esc_html_e( 'This small text is small for fine print, etc', 'alatraz-components' ); ?></small></p>

		<p><?php esc_html_e( 'Abbreviation: ', 'alcatraz' ); ?><abbr title="<?php esc_attr_e( 'HyperText Markup Language', 'alcatraz' ); ?>">HTML</abbr></p>

		<p><?php esc_html_e( 'Keyboard input: ', 'alcatraz' ); ?><kbd><?php esc_html_e( 'Cmd', 'alcatraz' ); ?></kbd></p>

		<p><q cite="<?php esc_url( 'https://developer.mozilla.org/en-US/docs/HTML/Element/q' ); ?>"><?php esc_html_e( 'This text is a short inline quotation', 'alcatraz' ); ?></q></p>

		<p><cite><?php esc_html_e( 'This is a citation', 'alcatraz' ); ?></cite></p>

		<p><?php esc_html_e( 'The ', 'alcatraz' ); ?><dfn><?php esc_html_e( 'dfn element', 'alcatraz' ); ?></dfn><?php esc_html_e( ' indicates a definition.' ); ?></p>

		<p><?php esc_html_e( 'The ', 'alcatraz' ); ?><mark><?php esc_html_e( 'mark element', 'alcatraz' ); ?></mark><?php esc_html_e( ' indicates a highlight' ); ?></p>

		<p><code><?php esc_html_e( 'This is what inline code looks like', 'alcatraz' ); ?></code></p>

		<p><samp><?php esc_html_e( 'This is sample output from a computer program', 'alcatraz' ); ?></samp></p>

		<p><?php esc_html_e( 'The ', 'alcatraz' ); ?><var><?php esc_html_e( 'variable element', 'alcatraz' ); ?></var><?php esc_html_e( ' such as ', 'alcatraz' ); ?><var><?php esc_html_e( 'x', 'alcatraz' ); ?></var><?php esc_html_e( ' = ', 'alcatraz' ); ?><var><?php esc_html_e( 'y', 'alcatraz' ); ?></var></p>
	</div>

	<div class="text-element">
		<p><?php esc_html_e( 'A paragraph (from the Greek paragraphos, "to write beside" or "written beside") is a self-contained unit of a discourse in writing dealing with a particular point or idea. A paragraph consists of one or more sentences. Though not required by the syntax of any language, paragraphs are usually an expected part of formal writing, used to organize longer prose.', 'alcatraz' ); ?></p>
	</div>

	<div class="text-element">
		<pre><?php esc_html_e( 'P R E F O R M A T T E D T E X T
! " # $ % &amp; \' ( ) * + , - . /
0 1 2 3 4 5 6 7 8 9 : ; &lt; = &gt; ?
@ A B C D E F G H I J K L M N O
P Q R S T U V W X Y Z [ \ ] ^ _
` a b c d e f g h i j k l m n o
p q r s t u v w x y z { | } ~', 'alcatraz' ); ?></pre>
	</div>
</section>
