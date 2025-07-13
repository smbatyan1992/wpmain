<?php
while (have_rows("social_links", "option")):
	the_row();
	if (get_sub_field("link", "option")): ?>
			<a href="<?php the_sub_field("link"); ?>" target="_blank" class="transition" aria-label="Social Link">
				<?php the_sub_field("icon", "option"); ?>
			</a>
		<?php
	endif;
endwhile;