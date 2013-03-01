<?php defined( 'ABSPATH' ) or die(); ?>

<input type="hidden" name="cftp_dt_post_parent" value="<?php echo absint( $post->post_parent ); ?>" />

<?php if ( !empty( $answer_providers ) ) : ?>

	<div id="cftp_dt_add_answer">

		<p><input type="button" class="button-secondary" value="<?php _e( 'Add An Answer', 'cftp_dt' ); ?>" id="cftp_add_answer" /></p>

		<?php foreach ( $answer_providers as $provider_name => $provider ) : ?>

			<div class="add_answer" data-answer-type="<?php echo esc_attr( $provider_name ); ?>">
				<div class="answer_field">
					<?php echo $provider->get_add_form(); ?>
				</div>
				<div class="answer_title">
					<input type="text" class="regular-text" name="cftp_dt_new[<?php echo esc_attr( $provider_name ); ?>][page_title]" value="" placeholder="<?php esc_attr_e( 'Answer page title', 'cftp_dt' ); ?>" />
				</div>
			</div>

		<?php endforeach; ?>

	</div>

	<div id="cftp_dt_edit_answers">

		<?php foreach ( $answers as $answer_id => $answer ) : ?>

			<?php
			if ( !( $provider = $this->get_answer_provider( $answer->get_answer_type() ) ) )
				continue;
			?>

			<div class="edit_answer">
				<div class="answer_field">
					<input type="hidden" name="cftp_dt_edit[<?php echo esc_attr( $answer_id ); ?>][<?php echo esc_attr( $answer->get_answer_type() ); ?>][page_id]" value="<?php echo absint( $answer->get_post()->ID ); ?>" />
					<?php echo $provider->get_edit_form( $answer_id, $answer ); ?>
				</div>
				<div class="answer_title">
					<?php echo esc_html( $answer->get_page_title() ); ?>
				</div>
			</div>

		<?php endforeach; ?>

	</div>

<?php else : ?>

	<p><?php _e( 'There are no answer providers configured, this is a pretty serious problem.', 'cftp_dt' ); ?></p>

<?php endif; ?>
