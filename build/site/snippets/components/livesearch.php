<?php if(!isset($response['success'])):  ?>

<div class="livesearch">
	<form id="suggest-box" action="<?= $page->url() ?>"  method="post">
		<div class="grid">
			<div class="grid_two-thirds">
				<label class="form-group">
					<span class="livesearch_label">Handelt es sich um ..</span>
					<input id="awesomplete" name="title" data-message="Please enter your first name." type="text" placeholder=".. einen oder mehrere Künstler, eine Veranstaltung?" value="<?= isset($data['title']) ? $data['title'] : '' ?>" required onkeypress="return event.keyCode != 13;">
				</label>
				<div class="alert"><?php if(isset($response['errors']['title'])) { echo $response['errors']['title']; } ?></div>
			</div>
			<div class="grid_one-third">
				<label for="category" class="form-group">
					<span class="livesearch_label">Und in welcher ..</span>
					<select id="category" name="category" value="<?= isset($data['category']) ? $data['category'] : '' ?>" required onkeypress="return event.keyCode != 13;">
						<option selected disabled>.. Kategorie?</option>
						<?php foreach ($categories as $category) : ?>
							<option><?= $category ?></option>
						<?php endforeach ?>
					</select>
				</label>
				<div class="alert"><?php if(isset($response['errors']['category'])) { echo $response['errors']['category']; } ?></div>
			</div>
			<div class="honey">
				 <label for="website">If you are a human, leave this field empty</label>
				 <input type="website" name="website" id="website" placeholder="http://example.com" value="<?= isset($data['website']) ? $data['website'] : '' ?>">
			</div>
			<div class="grid-full">
				<label for="text" class="form-group">
					<span class="livesearch_label">Und wie lautet ..</span>
					<textarea id="text" name="text" placeholder="das Album, der Track, die Punchline?" value="<?= isset($data['text']) ? $data['text'] : '' ?>"></textarea>
				</label>
				<input class="btn" type="submit" name="vote" value="Los geht's!">
				<!-- <button class="btn" type="submit" name="vote" value="Los geht's!">Los geht's!</button> -->
			</div>
		</div>
	</form>
</div>

<?php endif ?>

<div class="form-result">
  <?php if(isset($response['success'])) { echo $response['success']; } elseif(isset($response['error'])) { echo $response['error']; }  ?>
</div>
