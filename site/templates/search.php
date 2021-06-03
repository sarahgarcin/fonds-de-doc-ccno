<?php snippet('header') ?>
<?php snippet('head') ?>
<?php snippet('infos') ?>
<?php snippet('emprunter') ?>

	<main>
		<?php $query = get('q');?>
		<div class="list-books">
			<!-- <div class="list-books__th list-books__th--desktop hide-for-small-only">
				<div class="list-books__details">
					<div class="list-books__details__inner row">
						<div class="list-books__td list-books__td--title <?php e(param('order') == 'desc' && param('sort') == "title", "desc", "asc")?> col-sm-3 col-md-4">
							<?php if(param('order') == 'asc' && param('sort') == "title"):?>
								<a href="<?=$site->url()?>/search?q=<?=$query?>&sort:title/order:desc" title="Titre">Titre</a>
							<?php elseif(param('sort') == null):?>
								<a href="<?=$site->url()?>/search?q=<?=$query?>&sort:title/order:desc" title="Titre">Titre</a>
							<?php else:?>
								<a href="<?=$site->url()?>/search?q=<?=$query?>&sort:title/order:asc" title="Titre">Titre</a>
							<?php endif; ?>
						</div>
						<div class="list-books__td list-books__td--author <?php e(param('order') == 'desc' && param('sort') == "author", "desc", "asc")?> col-sm-3">
							<?php if(param('order') == 'asc' && param('sort') == "author"):?>
								<a href="<?=$site->url()?>&sort:author/order:desc" title="Auteur">Auteur.trice.s</a>
							<?php else:?>
								<a href="<?=$site->url()?>&sort:author/order:asc" title="Auteur">Auteur.trice.s</a>
							<?php endif; ?>
						</div>
						<div class="list-books__td list-books__td--year <?php e(param('order') == 'desc' && param('sort') == "year", "desc", "asc")?> col-sm-1">
							<?php if(param('order') == 'asc' && param('sort') == "year"):?>
								<a href="<?=$site->url()?>&sort:year/order:desc" title="Année">Année</a>
								<?php else:?>
									<a href="<?=$site->url()?>&sort:year/order:asc" title="Année">Année</a>
								<?php endif; ?>
						</div>
						<div class="list-books__td list-books__td--tags">Mots-clés</div>
						<div class="list-books__td list-books__td--type <?php e(param('order') == 'desc' && param('sort') == "type", "desc", "asc")?> col-sm-1">
							<?php if(param('order') == 'asc' && param('sort') == "type"):?>
								<a href="<?=$site->url()?>&sort:type/order:desc" title="Genre">Genre</a>
							<?php else:?>
								<a href="<?=$site->url()?>&sort:type/order:asc" title="Genre">Genre</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div> -->
			<div class="list-books__th list-books__th--desktop hide-for-small-only">
				<div class="list-books__details">
					<div class="list-books__details__inner row">
						<div class="list-books__td list-books__td--title <?php e(param('order') == 'desc' && param('sort') == "title", "desc", "asc")?> col-sm-3 col-md-4">
							<?php if(param('order') == 'asc' && param('sort') == "title"):?>
								<a href="<?=$site->url()?>/sort:title/order:desc/search?q=<?=$query?>" title="Titre">Titre</a>
							<?php elseif(param('sort') == null):?>
								<a href="<?=$site->url()?>/sort:title/order:desc/search?q=<?=$query?>" title="Titre">Titre</a>
							<?php else:?>
								<a href="<?=$site->url()?>/sort:title/order:asc/search?q=<?=$query?>" title="Titre">Titre</a>
							<?php endif; ?>
						</div>
						<div class="list-books__td list-books__td--author <?php e(param('order') == 'desc' && param('sort') == "author", "desc", "asc")?> col-sm-3">
							<?php if(param('order') == 'asc' && param('sort') == "author"):?>
								<a href="<?=$site->url()?>/sort:author/order:desc/search?q=<?=$query?>" title="Auteur">Auteur.trice.s</a>
							<?php else:?>
								<a href="<?=$site->url()?>/sort:author/order:asc/search?q=<?=$query?>" title="Auteur">Auteur.trice.s</a>
							<?php endif; ?>
						</div>
						<div class="list-books__td list-books__td--year <?php e(param('order') == 'desc' && param('sort') == "year", "desc", "asc")?> col-sm-1">
							<?php if(param('order') == 'asc' && param('sort') == "year"):?>
								<a href="<?=$site->url()?>/sort:year/order:desc/search?q=<?=$query?>" title="Année">Année</a>
								<?php else:?>
									<a href="<?=$site->url()?>/sort:year/order:asc/search?q=<?=$query?>" title="Année">Année</a>
								<?php endif; ?>
						</div>
						<div class="list-books__td list-books__td--tags">Mots-clés</div>
						<div class="list-books__td list-books__td--type <?php e(param('order') == 'desc' && param('sort') == "type", "desc", "asc")?> col-sm-1">
							<?php if(param('order') == 'asc' && param('sort') == "type"):?>
								<a href="<?=$site->url()?>/sort:type/order:desc/search?q=<?=$query?>" title="Genre">Genre</a>
							<?php else:?>
								<a href="<?=$site->url()?>/sort:type/order:asc/search?q=<?=$query?>" title="Genre">Genre</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="list-books-content">
				<?php 
					$books = $results;
					// sort by category
					$books = $books->sortBy('title');
					if($sort = param('sort')) {
						if(param('order') == 'asc'){
  						$books = $books->sortBy($sort, 'asc');
  					}
  					else{
							$books = $books->sortBy($sort, 'desc');
						}	
					}
					
				?>
		    <?php foreach ($books as $book): ?>

			    <article>
			    	<div class="list-books__details__inner row">
							<div class="list-books__td list-books__td--title col-xs-12 col-sm-3 col-md-4">
								<h3>
									<?= $book->title() ?>
								</h3>
							</div>
							<?php $authors = Str::split($book->author(), ',');?>
							<ul class="list-books__td col-sm-3 col-xs-12 authors">
								<?php foreach($authors as $key => $author):?>
									<li>
										<a href="<?=$site->url()?>/author:<?= urlencode($author)?>" class="author" title="<?= $author?>">
											<?= $author?>
										</a>
										<?php if(count($authors) > 1 && (count($authors)-1) != $key): 
												echo '<span class="comma">,</span>'; 
											endif;?>
									</li>
								<?php endforeach;?>
							</ul>
							<p class="list-books__td col-sm-1 col-xs-12">
									<?= $book->year() ?>
								</p>
							<?php 
								$tags = Str::split($book->tags(), ',');
								$fiveTags = array_slice($tags, 0, 5)
							?>
							<ul class="list-books__td tags">
								<?php foreach($fiveTags as $key => $tag):?>
									<li>
										<a href="<?=$site->url()?>/tag:<?= urlencode($tag)?>" class="tag" title="<?= $tag?>">
											<?= $tag?>
										</a>
										<?php if(count($tags) > 1 && (count($tags)-1) != $key): 
												echo '<span class="comma">,</span>'; 
											endif;?>
									</li>
								<?php endforeach;?>
							</ul>
							
							<p class="list-books__td col-sm-1 col-xs-12">
								<?= $book->type() ?>
							</p>
							<p class="list-books__td see-more">
								+
							</p>
							
							<div class="list-books__icon"></div>
						</div>
						<div class="list-books__content fold">
							<div class="book row">
								<div class="book__image col-sm-4 col-xs-6">
									<?php if($book->hasImages()):?>
										<div class="book__image__inner">
											<figure>
												<img src="<?= $book->images()->first()->url()?>" alt="<?= $book->images()->filename()?>">
											</figure>
										</div>
									<?php endif;?>
								</div>
								<div class="book__text col-sm-8 col-xs-12">
									<p class="book__collection"><?= $book->collection() ?></p>
									<p class="book__publisher"><?= $book->publisher() ?></p>
									<p class="book__isbn"><?= $book->isbn() ?></p>
									<p class="book__language"><?= $book->language() ?></p>
									<p class="book__summary"><?= $book->summary() ?></p>
									<ul class="book__tags">
										<?php foreach($tags as $tag):?>
											<li class="tag" data-tag="<?= urlencode($tag)?>">
												<a href="<?=$site->url()?>/tag:<?= urlencode($tag)?>" class="tag" title="<?= $tag?>">
													<?= $tag?>
												</a>
											</li>
										<?php endforeach;?>
									</ul>
									<p class="book__number">Nombre d'exemplaire: <?= $book->number() ?></p>
								</div>
							</div>
						</div>
			    </article>
		    <?php endforeach ?>
	    </div>
	  </div>
	
		
	</main>
<?php snippet('footer') ?>
