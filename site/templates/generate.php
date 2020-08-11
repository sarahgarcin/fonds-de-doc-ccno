<?php snippet('header') ?>
<?php snippet('head') ?>

<?php 
	// open the file "demosaved.csv" for writing
	$file = fopen($page->root() . '/fonds.csv', 'w');
	 
	// save the column headers
	fputcsv($file, array('Id', 'Image', 'Auteur.trice', 'Titre', 'Collection / série', 'Editeur/Structure', 'Année', 'Type de document', 'ISBN', 'Mots clés', 'Langues', 'Résumé', 'Nombre d’exemplaire'));
	 
	 // fetch data
	$books = $site->find('home')->children();
	$id = 0; 
	$data = array();
	foreach($books as $book){
		$id ++;
		$data[] = array($id, $book->cover(), $book->author(), $book->title(), $book->collection(), $book->publisher(), $book->year(), $book->type(), $book->isbn(), $book->tags(), $book->language(), $book->summary(), $book->number());
	}
	 
	// save each row of the data
	foreach ($data as $row){
		fputcsv($file, $row);
	}
	 
	// Close the file
	fclose($file);

?>

<main>
	<div class="download-csv">
		<?= $page->text()->kt(); ?>
		<a href="<?= $page->files()->first()->url()?>" title="">
			Télécharger le fichier csv
		</a>
		
	</div>
</main>	

	
<?php snippet('footer') ?>


