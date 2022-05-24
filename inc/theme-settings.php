<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

$salons = [];

foreach( pdp_get_salons( 'ASC', false, 'ru' ) as $salon ){
	$salons[$salon->ID] = $salon->post_title;
}

$languages = array( 'all' => __( 'Все', 'pdp' ) );
$service_categories_name_fields = array();

foreach( pll_the_languages( ['raw' => true, 'hide_empty' => false] ) as $lang ){
	$slug = $lang['slug'] === 'uk' ? 'ua' : $lang['slug'];

	$languages[$slug] = $lang['name'];
	$service_categories_name_fields[] = Field::make( 'text', $slug , sprintf( __( 'Название (%s)', 'pdp' ), $slug ) );
}

Container::make( 'theme_options', 'PIED-DE-POULE' )
	->set_icon( 'none' )
	->set_page_menu_position( 2 )
	->add_tab( __( 'Общие', 'pdp' ), array(
		Field::make( 'html', 'contacts_heading' )
			->set_html( sprintf( '<h2>%s</h2>', __( 'Контакты', 'pdp' ) ) ),
		Field::make( 'text', 'email', 'Email' ),
		Field::make( 'text', 'telegram_bot', 'Telegram бот' ),
		Field::make( 'text', 'viber_bot', 'Viber бот' ),
		Field::make( 'text', 'telegram', 'Telegram' ),
		Field::make( 'text', 'instagram', 'Instagram' ),
		Field::make( 'text', 'facebook', 'Facebook' ),
		Field::make( 'text', 'youtube', 'YouTube' ),
		Field::make( 'text', 'phone_qa', __( 'Номер отдела контроля качества', 'pdp_core' ) )
			->set_attribute( 'type', 'tel' ),
		Field::make( 'text', 'phone_marketing', __( 'Номер отдела маркетинга', 'pdp_core' ) )
			->set_attribute( 'type', 'tel' ),
		Field::make( 'html', 'header_heading' )
			->set_html( sprintf( '<h2>%s</h2>', 'Шапка сайта' ) ),
		Field::make( 'select', 'main_salon', __( 'Салон по умолчанию', 'pdp' ) )
		     ->set_options( $salons )
		     ->set_width( 50 ),
		Field::make( 'association', 'main_city', __( 'Основной город', 'pdp' ) )
			->set_types( array(
				array(
					'type'      => 'term',
					'taxonomy'  => 'city'
				)
			) )
			->set_max( 1 )
			->set_width( 50 ),
		Field::make( 'select', 'header_phones_banner', __( 'Баннер панели номеров', 'pdp' ) )
			->set_options( pdp_get_banners() )
			->set_width( 50 ),
		Field::make( 'select', 'header_cart_banner', __( 'Баннер панели корзины', 'pdp' ) )
			->set_options( pdp_get_banners() )
			->set_width( 50 ),
		Field::make( 'html', 'forms_heading' )
			->set_html( sprintf( '<h2>%s</h2>', 'Формы' ) ),
		Field::make( 'select', 'forms_show_salon_select', __( 'Выбор салона в формах', 'pdp' ) )
			->set_options( array(
				'1' => __( 'Показывать', 'pdp' ),
				'0' => __( 'Скрывать', 'pdp' )
			) )
			->set_width( 30 ),
		Field::make( 'select', 'forms_default_salon', __( 'Салон по умолчанию', 'pdp' ) )
			->set_options( $salons )
			->set_width( 30 ),
		Field::make( 'text', 'thank_you_page', __( 'Страница «Спасибо»', 'pdp' ) )
			->set_width( 15 )
	) )
	->add_tab( __( 'Шрифты', 'pdp' ), array(
		Field::make( 'checkbox', 'gfonts_enabled', __( 'Использовать шрифт Google Fonts?', 'pdp' ) )
			->set_option_value( 'yes' ),
		Field::make( 'multiselect', 'gfonts_language', __( 'Choose Options' ) )
		     ->set_options( $languages ),
		Field::make( 'text', 'gfonts_name', __( 'Имя шрифта', 'pdp' ) ),
		Field::make( 'textarea', 'gfonts_import', __( 'Импорт шрифта', 'pdp' ) )
	) )
	->add_tab( __( 'Аналитика', 'pdp' ), array(
		Field::make( 'textarea', 'analytics_code', __( 'Коды аналитик (head)', 'pdp' ) ),
		Field::make( 'textarea', 'analytics_code_footer', __( 'Коды аналитик (footer)', 'pdp' ) ),
		Field::make( 'complex', 'gtag_actions', __( 'События аналитики', 'pdp' ) )
			->add_fields( array(
				Field::make( 'text', 'selector', __( 'Селектор', 'pdp' ) )
					->set_width( 20 ),
				Field::make( 'text', 'event', __( 'Событие', 'pdp' ) )
					->set_width( 20 ),
				Field::make( 'text', 'gtag_event', __( 'gtag событие', 'pdp' ) )
					->set_width( 20 ),
				Field::make( 'text', 'gtag_category', __( 'gtag категория', 'pdp' ) )
					->set_width( 20 ),
				Field::make( 'text', 'gtag_action', __( 'gtag действие', 'pdp' ) )
					->set_width( 20 )
			) )
	) )
	->add_tab( __( 'Категории услуг', 'pdp' ), array(
		Field::make( 'complex', 'service_categories', __( 'Список категорий', 'pdp' ) )
			->set_collapsed( true )
			->add_fields( array_merge( $service_categories_name_fields, array(
				Field::make( 'text', 'slug', __( 'Ярлык', 'pdp' ) )
			        ->set_width( 50 ),
				Field::make( 'image', 'cover1x', __( 'Обложка (1x)', 'pdp' ) )
			        ->set_width( 25 ),
				Field::make( 'image', 'cover2x', __( 'Обложка (2x)', 'pdp' ) )
			        ->set_width( 25 )
			) ) )
	) )
	->add_tab( __( 'Прайслисты', 'pdp' ), array(
		Field::make( 'html', 'google_api_heading' )
		     ->set_html( sprintf( '<h2>%s</h2>', 'Google API' ) ),
		Field::make( 'text', 'google_client_id', __( 'ID клента', 'pdp' ) )
		     ->set_width( 50 ),
		Field::make( 'text', 'google_secret', __( 'Секретный код клента', 'pdp' ) )
		     ->set_width( 50 ),
		Field::make( 'html', 'prices_autoupdate_heading' )
		     ->set_html( sprintf( '<h2>%s</h2>', 'Ежедневное обновление' ) ),
		Field::make( 'select', 'prices_autoupdate_enabled', __( 'Включено', 'pdp' ) )
			->set_options( array(
				'true'      => __( 'Да', 'pdp' ),
				'false'     => __( 'Нет', 'pdp' )
			) )
			->set_default_value( 'false' )
			->set_width( 100 )
	) )
	->add_tab( 'Instagram', array(
		Field::make( 'text', 'instagram_app_id', __( 'App ID', 'pdp' ) ),
		Field::make( 'text', 'instagram_app_secret', __( 'App Secret', 'pdp' ) )
	) )
	->add_tab( __( 'Уведомления', 'pdp' ), array(
		Field::make( 'textarea', 'email_recipients', __( 'Получатели (через запятые)', 'pdp' ) ),
		Field::make( 'image', 'email_logo', __( 'Логотип', 'pdp' ) )
	) );