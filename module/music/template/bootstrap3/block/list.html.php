<ul class="list-group">
{foreach from=$aGenres item=aGenre}
	<li  class="{if $iCurrentGenre == $aGenre.genre_id}active {/if}list-group-item">
		<a href="{$aGenre.link}" id="music_genre_{$aGenre.genre_id}">{$aGenre.name|convert|clean}</a>
	</li>
{/foreach}
</ul>