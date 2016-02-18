<?php

return [
	'404'      => 'Page introuvable.',
	'auth'     => [
		'title'          => 'Connexion',
		'username'       => 'Pseudo',
		'password'       => 'Mot de passe',
		'login'          => 'Connexion',
		'logout'         => 'Déconnexion',
		'wrong-username' => 'Pseudo incorrect',
		'wrong-password' => 'ou mot de passe incorrect'
	],
	'ckeditor' => [
		'upload'        => [
			'success' => 'Ficher envoyé: \\n- Size: :size kb \\n- width/height: :width x :height',
			'error'   => [
				'common'              => 'Impossible d\'envoyer le fichier.',
				'wrong_extension'     => 'L\'extension du fichier ":file" est incorrecte.',
				'filesize_limit'      => 'La taille maximum acceptée pour un fichier est de :size kb.',
				'imagesize_max_limit' => 'Largeur x Hauteur = :width x :height \\n La largeur x hauteur ne doivent pas être supérieurs à :maxwidth x :maxheight',
				'imagesize_min_limit' => 'Largeur x Hauteur = :width x :height \\n La largeur x hauteur ne doivent pas être inférieurs à: :minwidth x :minheight',
			]
		],
		'image_browser' => [
			'title'    => 'Choisissez une image à partir du serveur',
			'subtitle' => 'Choisissez une image à insérer',
		],
	],
	'table'    => [
		'new-entry'      => 'Nouvel élément',
		'edit'           => 'Édition',
		'delete'         => 'Suppression',
		'delete-confirm' => 'Êtes-vous sûr de vouloir supprimer cet élément ?',
		'delete-error'   => 'Un problème s\'est produit lors de la suppression de cet élément. Vous devez d\'abord supprimer les éléments relatifs à celui-ci.',
		'moveUp'         => 'Monter',
		'moveDown'       => 'Descendre',
		'filter'         => 'Afficher les éléments similairs',
		'filter-goto'    => 'Afficher',
		'save'           => 'Enregistrer',
		'cancel'         => 'Annuler',
		'download'       => 'Télécharger',
		'all'            => 'Tous',
		'processing'     => '<i class="fa fa-5x fa-circle-o-notch fa-spin"></i>',
		'loadingRecords' => 'Chargement...',
		'lengthMenu'     => 'Afficher _MENU_ éléments',
		'zeroRecords'    => 'Aucun élément correspondant n\'a été trouvé.',
		'info'           => 'Affiche les éléments _START_ à _END_ sur les _TOTAL_ éléments',
		'infoEmpty'      => 'Affiche 0 à 0 des 0 éléments',
		'infoFiltered'   => '(filtré des _MAX_ éléments)',
		'infoThousands'  => ' ',
		'infoPostFix'    => '',
		'search'         => 'Rechercher: ',
		'emptyTable'     => 'Aucune donnée disponible sur cette table',
		'paginate'       => [
			'first'    => 'Première page',
			'previous' => '&larr;',
			'next'     => '&rarr;',
			'last'     => 'Dernière page'
		]
	],
	'select'   => [
		'nothing'  => 'Rien n\'a été sélectionné',
		'selected' => 'sélectionné'
	]
];