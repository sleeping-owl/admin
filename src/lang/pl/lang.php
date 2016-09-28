<?php

return [
	'404'      => 'Strony nie znaleziono.',
	'auth'     => [
		'title'          => 'Logowanie',
		'username'       => 'Nazwa użytkownika',
		'password'       => 'Hasło',
		'login'          => 'Login',
		'logout'         => 'Wyloguj',
		'wrong-username' => 'Zły użytkownik',
		'wrong-password' => 'lub hasło'
	],
	'ckeditor' => [
		'upload'        => [
			'success' => 'Plik został przesłany: \\n- rozmiar: :size kb \\n- szerokość/wysokość: :width x :height',
			'error'   => [
				'common'              => 'Nie mogłem wysłać pliku.',
				'wrong_extension'     => 'plik ":file" ma złe rozszerzenie.',
				'filesize_limit'      => 'Maksymalny dopuszczalny rozmiar pliku wynosi :size kb.',
				'imagesize_max_limit' => 'Szerokość x Wysokość = :width x :height \\n Zdjęcie nie może by większe: :maxwidth x :maxheight',
				'imagesize_min_limit' => 'Szerokość x Wysokość = :width x :height \\n Zdjęcie nie może by mniejsze: :minwidth x :minheight',
			]
		],
		'image_browser' => [
			'title'    => 'Wstaw obraz na serwer',
			'subtitle' => 'Zmień obraz',
		],
	],
	'table'    => [
		'new-entry'      => 'Dodaj',
		'edit'           => 'Edytuj',
		'delete'         => 'Usuń',
		'delete-confirm' => 'Czy jesteś pewny, że chcesz usunąć?',
		'delete-error'   => 'Błąd podczas usuwania tego wpisu. Musisz usunąć wszystkie wpisy powiązane.',
		'moveUp'         => 'Przesuń do góry',
		'moveDown'       => 'Przesuń w dół',
		'filter'         => 'Pokaż podobne wpisy',
		'filter-goto'    => 'Pokaż',
		'save'           => 'Zapisz',
		'cancel'         => 'Anuluj',
		'download'       => 'Pobierz',
		'all'            => 'Wszystko',
		'processing'     => '<i class="fa fa-5x fa-circle-o-notch fa-spin"></i>',
		'loadingRecords' => 'Wczytuje...',
		'lengthMenu'     => 'Pokaż _MENU_',
		'zeroRecords'    => 'Nic nie znaleziono.',
		'info'           => 'Wyświetlam _START_ do _END_ z _TOTAL_ ',
		'infoEmpty'      => 'nic nie wyświetlam',
		'infoFiltered'   => '(fultrowane _MAX_)',
		'infoThousands'  => ',',
		'infoPostFix'    => '',
		'search'         => 'Szukaj: ',
		'emptyTable'     => 'Dane nie dostępne',
		'paginate'       => [
			'first'    => '<i class="fa fa-angle-double-left"></i>',
			'previous' => '<i class="fa fa-angle-left"></i>',
			'next'     => '<i class="fa fa-angle-right"></i>',
			'last'     => '<i class="fa fa-angle-double-right"></i>'
		]
	],
	'select'   => [
		'nothing'  => 'Nic nie zaznaczono',
		'selected' => 'zaznaczono'
	]
];