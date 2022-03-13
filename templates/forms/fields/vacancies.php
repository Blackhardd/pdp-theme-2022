<?php

$vacancies = pdp_get_vacancies();

?>

<select name="vacancy">
	<option value="" disabled selected><?=__( 'Выберите вакансию', 'pdp' ); ?></option>
	<?php foreach( $vacancies as $vacancy ) : ?>
			<option value="<?=$vacancy['title']; ?>"><?=$vacancy['title']; ?></option>
	<?php endforeach; ?>
</select>