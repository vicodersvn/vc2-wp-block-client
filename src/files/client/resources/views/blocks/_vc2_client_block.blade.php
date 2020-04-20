<?php
// Create id attribute allowing for custom "anchor" value.
		$id = 'vc-client-' . $block['id'];
		if( !empty($block['anchor']) ) {
		    $id = $block['anchor'];
		}

		// Create class attribute allowing for custom "className" and "align" values.
		$className = 'vc-client';
		if( !empty($block['className']) ) {
		    $className .= ' ' . $block['className'];
		}
		if( !empty($block['align']) ) {
		    $className .= ' align' . $block['align'];
		}
		if( $is_preview ) {
		    $className .= ' is-admin';
		}

		$vc_column = get_field('vc_column');		
		$add_container = (get_field('add_container') == 'yes') ? 'container' : '';		

		?>
		<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
			<div class="client-container {{ $add_container }}">
				<?php if( have_rows('clients') ): ?>
				<div class="client-row">
					<?php while( have_rows('clients') ): the_row();  
						$client_image = get_sub_field('client_image');
						$client_link = get_sub_field('client_link');
					?>
						<div class="client-item">
							<div class="client-content">
								<a href="{{ $client_link }}"><img src="{{ $client_image }}" alt="client"></a>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
				<?php else: ?>
					<p>Please add some box.</p>
				<?php endif; ?>
			</div>
		</div>
<?php     