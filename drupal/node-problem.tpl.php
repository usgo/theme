<h2>I AM A GO PROBLEM</h2>
<script>
eidogoConfig = {enableShortcuts: true, markVariations: false, theme: "standard"};
</script>
<script type="text/javascript" src="http://eidogo.com/player/js/all.compressed.js">
</script>
<noscript>
<p>Error:  the Eidogo go player requires a JavaScript-enabled browser.  Most likely, to see the go board here, you only need to turn on JavaScript from the Options tab on your browser's Tool menu.</p>
</noscript>

<div class="eidogo-player-auto" sgf="<?php print base_path() . $field_sgf[0]['filepath']; ?>"> </div>
<a href="<?php print base_path() . $field_sgf[0]['filepath']; ?>">Click here to download SGF.</a>
<?php print $content; ?>
