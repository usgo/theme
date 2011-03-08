<script>
eidogoConfig = {enableShortcuts: true, markVariations: false, theme: "standard"};
</script>
<script type="text/javascript" src="http://eidogo.com/player/js/all.compressed.js">
</script>
<noscript>
<p>Error:  the Eidogo go player requires a JavaScript-enabled browser.  Most likely, to see the go board here, you only need to turn on JavaScript from the Options tab on your browser's Tool menu.</p>
</noscript>
<?php $sgf_path = base_path() . $field_sgf[0]['filepath']; ?>
<div class="eidogo-player-auto" sgf="<?php print $sgf_path; ?>"> </div>
<a href="<?php print $sgf_path; ?>">Click here to download SGF.</a>
<?php print $content; ?>
<p>For problems, questions, or comments (about this web page or go in general), email the
<a href="mailto:potw@usgo.org">Problem Of The Week editor</a>)
</p>
