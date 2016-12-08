<?php

return [
	'404'      => 'Страница не найдена.',
	'auth'     => [
		'title'          => 'Авторизация',
		'username'       => 'Логин',
		'password'       => 'Пароль',
		'login'          => 'Войти',
		'logout'         => 'Выйти',
		'wrong-username' => 'Неверный логин',
		'wrong-password' => 'или пароль'
	],
	'ckeditor' => [
		'upload'        => [
			'success' => 'Файл был успешно загружен: \\n- Размер: :size кб \\n- ширина/высота: :width x :height',
			'error'   => [
				'common'              => 'Возникла ошибка при загрузке файла.',
				'wrong_extension'     => 'Файл ":file" имеет неверный тип.',
				'filesize_limit'      => 'Максимальный размер файла :size кб.',
				'imagesize_max_limit' => 'Ширина x Высота = :width x :height \\n Максимальный размер изображение должен быть: :maxwidth x :maxheight',
				'imagesize_min_limit' => 'Ширина x Высота = :width x :height \\n Минимальный размер изображение должен быть: :minwidth x :minheight',
			]
		],
		'image_browser' => [
			'title'    => 'Вставка изображения с сервера',
			'subtitle' => 'Выберите изображение для вставки',
		],
	],
	'table'    => [
		'new-entry'      => 'Новая запись',
		'edit'           => 'Редактировать',
		'restore'        => 'Восстановить',
		'delete'         => 'Удалить',
		'delete-confirm' => 'Вы уверены, что хотите удалить эту запись?',
		'delete-error'   => 'Невозможно удалить эту запись. Необходимо предварительно удалить все связанные записи.',
		'moveUp'         => 'Подвинуть вверх',
		'moveDown'       => 'Подвинуть вниз',
		'error'          => 'В процессе обработки вашего запроса возникла ошибка',
		'filter'         => 'Показать подобные записи',
		'filter-goto'    => 'Перейти',
		'save'           => 'Сохранить',
		'cancel'         => 'Отменить',
		'back'           => 'Back',
		'download'       => 'Скачать',
		'all'            => 'Все',
		'processing'     => '<i class="fa fa-5x fa-circle-o-notch fa-spin"></i>',
		'loadingRecords' => 'Подождите...',
		'lengthMenu'     => 'Отображать _MENU_ записей',
		'zeroRecords'    => 'Не найдено подходящих записей.',
		'info'           => 'Записи с _START_ по _END_ из _TOTAL_',
		'infoEmpty'      => 'Записи с 0 по 0 из 0',
		'infoFiltered'   => '(отфильтровано из _MAX_ записей)',
		'infoThousands'  => '',
		'infoPostFix'    => '',
		'search'         => 'Поиск: ',
		'emptyTable'     => 'Нет записей',
		'paginate'       => [
			'first'    => 'Первая',
			'previous' => '&larr;',
			'next'     => '&rarr;',
			'last'     => 'Последняя'
		]
	],
	'select'   => [
		'nothing'     => 'Ничего не выбрано',
		'selected'    => 'выбрано',
		'placeholder' => 'Выберите из списка',
	],
	'image'    => [
		'browse'         => 'Выбор изображения',
		'browseMultiple' => 'Выбор изображений',
		'remove'         => 'Удалить',
	],
	'file'     => [
		'browse' => 'Выбор файла',
		'remove' => 'Удалить',
	],
];