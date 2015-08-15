<?php

return [
	'404'      => 'Página não encontrada.',
	'auth'     => [
		'title'          => 'Autorização',
		'username'       => 'Usuário',
		'password'       => 'Senha',
		'login'          => 'Login',
		'logout'         => 'Logout',
		'wrong-username' => 'Nome de usuário errado',
		'wrong-password' => 'ou senha'
	],
	'ckeditor' => [
		'upload'        => [
			'success' => 'Arquivo enviado: \\n- Tamanho: :size kb \\n- largura/altura: :width x :height',
			'error'   => [
				'common'              => 'Não é possível enviar o arquivo.',
				'wrong_extension'     => 'Arquivo ":file" está com a extensão errada.',
				'filesize_limit'      => 'O tamanho máximo permitido para arquivo é :size kb.',
				'imagesize_max_limit' => 'Largura x Altura = :width x :height \\n As dimensões máximas para Largura x Altura devem ser: :maxwidth x :maxheight',
				'imagesize_min_limit' => 'Largura x Altura = :width x :height \\n As dimensões máximas para Largura x Altura devem ser: :minwidth x :minheight',
			]
		],
		'image_browser' => [
			'title'    => 'Inserir imagem do servidor',
			'subtitle' => 'Escolha a imagem para inserir',
		],
	],
	'table'    => [
		'new-entry'      => 'Nova entrada',
		'edit'           => 'Editar',
		'delete'         => 'Excluir',
		'delete-confirm' => 'Tem certeza que deseja excluir este registro',
		'delete-error'   => 'Ocorreu um erro ao excluir este registro. Você deve excluir todos os registros relacionados antes.',
		'moveUp'         => 'Mover p/cima',
		'moveDown'       => 'Mover p/baixo',
		'filter'         => 'Mostrar entradas similares',
		'filter-goto'    => 'Mostrar',
		'save'           => 'Salvar',
		'cancel'         => 'Cancelar',
		'download'       => 'Download',
		'all'            => 'Todos',
		'processing'     => '<i class="fa fa-5x fa-circle-o-notch fa-spin"></i>',
		'loadingRecords' => 'Carregando...',
		'lengthMenu'     => 'Mostrar _MENU_ entradas',
		'zeroRecords'    => 'Nenhum registro encontrado.',
		'info'           => 'Mostrando _START_ a _END_ de _TOTAL_ registros',
		'infoEmpty'      => 'Mostrando 0 a 0 de 0 registros',
		'infoFiltered'   => '(filtrado de _MAX_ registros no total)',
		'infoThousands'  => '.',
		'infoPostFix'    => '',
		'search'         => 'Pesquisar: ',
		'emptyTable'     => 'Nenhum informação na tabela',
		'paginate'       => [
			'first'    => '<i class="fa fa-angle-double-left"></i>',
			'previous' => '<i class="fa fa-angle-left"></i>',
			'next'     => '<i class="fa fa-angle-right"></i>',
			'last'     => '<i class="fa fa-angle-double-right"></i>'
		]
	],
	'select'   => [
		'nothing'  => 'Nada selecionado',
		'selected' => 'selecionado'
	]
];