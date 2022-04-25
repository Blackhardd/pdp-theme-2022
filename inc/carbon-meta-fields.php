<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;


/**
 *  Homepage
 */

Container::make( 'post_meta', __( 'Настройки шаблона', 'pdp' ) )
	->where( 'post_template', '=', 'homepage.php' )
	->add_tab( __( 'Слайдер', 'pdp' ), array(
		Field::make( 'complex', 'slides', __( 'Слайды', 'pdp' ) )
			->set_collapsed( true )
			->add_fields( array(
				Field::make( 'select', 'type', __( 'Тип', 'pdp' ) )
					->add_options( array(
						'dark'  => __( 'Темный', 'pdp' ),
						'light' => __( 'Светлый', 'pdp' )
					) )
					->set_default_value( 'dark' ),
				Field::make( 'text', 'width', __( 'Ширина контента', 'pdp' ) ),
				Field::make( 'text', 'overtitle', __( 'Надзаголовок', 'pdp' ) ),
				Field::make( 'text', 'title', __( 'Заголовок', 'pdp' ) ),
				Field::make( 'text', 'description', __( 'Описание', 'pdp' ) ),
				Field::make( 'text', 'promotion', __( 'Описание акции', 'pdp' ) ),
				Field::make( 'text', 'button', __( 'Текст кнопки', 'pdp' ) ),
				Field::make( 'text', 'link', __( 'Ссылка', 'pdp' ) ),
				Field::make( 'select', 'button_style', __( 'Стиль кнопки', 'pdp' ) )
					->add_options( array(
						'outline'   => __( 'Обводка', 'pdp' ),
						'default'   => __( 'Стандартный', 'pdp' )
					) )
					->set_default_value( 'outline' ),
				Field::make( 'image', 'background1x', __( 'Фоновая картинка (1х)', 'pdp' ) ),
				Field::make( 'image', 'background2x', __( 'Фоновая картинка (2х)', 'pdp' ) )
			) )
	) )
	->add_tab( __( 'Слайдер услуг', 'pdp' ), array(
		Field::make( 'text', 'service_categories_overtitle', __( 'Надзаголовок', 'pdp' ) ),
		Field::make( 'text', 'service_categories_title', __( 'Заголовок', 'pdp' ) ),
	) )
	->add_tab( __( 'Наш Instagram', 'pdp' ), array(
		Field::make( 'text', 'instagram_overtitle', __( 'Надзаголовок', 'pdp' ) ),
		Field::make( 'text', 'instagram_title', __( 'Заголовок', 'pdp' ) ),
		Field::make( 'text', 'instagram_description', __( 'Описание', 'pdp' ) ),
		Field::make( 'text', 'instagram_button', __( 'Текст кнопки', 'pdp' ) ),
		Field::make( 'text', 'instagram_link', __( 'Ссылка', 'pdp' ) )
	) )
	->add_tab( __( 'О сети', 'pdp' ), array(
		Field::make( 'text', 'network_overtitle', __( 'Надзаголовок', 'pdp' ) ),
		Field::make( 'text', 'network_title', __( 'Заголовок', 'pdp' ) ),
		Field::make( 'rich_text', 'network_first_content', sprintf( __( 'Контент %s', 'pdp' ), '1' ) ),
		Field::make( 'text', 'network_second_title', sprintf( __( 'Заголовок %s', 'pdp' ), '2' ) ),
		Field::make( 'rich_text', 'network_second_content', sprintf( __( 'Контент %s', 'pdp' ), '2' ) ),
		Field::make( 'text', 'network_third_title', sprintf( __( 'Заголовок %s', 'pdp' ), '3' ) ),
		Field::make( 'rich_text', 'network_third_content', sprintf( __( 'Контент %s', 'pdp' ), '3' ) ),
		Field::make( 'text', 'network_fourth_title', sprintf( __( 'Заголовок %s', 'pdp' ), '4' ) ),
		Field::make( 'rich_text', 'network_fourth_content', sprintf( __( 'Контент %s', 'pdp' ), '4' ) ),
		Field::make( 'image', 'network_first_image1x', sprintf( __( 'Изображение %s (1x)', 'pdp' ), '1' ) )
			->set_width( 25 ),
		Field::make( 'image', 'network_first_image2x', sprintf( __( 'Изображение %s (2x)', 'pdp' ), '1' ) )
		     ->set_width( 25 ),
		Field::make( 'image', 'network_second_image1x', sprintf( __( 'Изображение %s', 'pdp' ), '2' ) )
		     ->set_width( 25 ),
		Field::make( 'image', 'network_second_image2x', sprintf( __( 'Изображение %s', 'pdp' ), '2' ) )
		     ->set_width( 25 )
	) )
	->add_tab( __( 'Об услугах', 'pdp' ), array(
		Field::make( 'text', 'about_services_overtitle', __( 'Надзаголовок', 'pdp' ) ),
		Field::make( 'text', 'about_services_title', __( 'Заголовок', 'pdp' ) ),
		Field::make( 'rich_text', 'about_services_content', __( 'Контент', 'pdp' ) ),
		Field::make( 'image', 'about_services_image1x', __( 'Изображение (1x)', 'pdp' ) ),
		Field::make( 'image', 'about_services_image2x', __( 'Изображение (2x)', 'pdp' ) )
	) )
	->add_tab( __( 'Преимущества', 'pdp' ), array(
		Field::make( 'text', 'advantages_overtitle', __( 'Надзаголовок', 'pdp' ) ),
		Field::make( 'text', 'advantages_title', __( 'Заголовок секции', 'pdp' ) ),
		Field::make( 'complex', 'advantages_list', __( 'Список преимуществ', 'pdp' ) )
			->set_collapsed( true )
			->add_fields( array(
				Field::make( 'textarea', 'content', __( 'Контент', 'pdp' ) ),
			) )
	) )
	->add_tab( __( 'Отзывы', 'pdp' ), array(
		Field::make( 'text', 'testimonials_overtitle', __( 'Надзаголовок', 'pdp' ) ),
		Field::make( 'text', 'testimonials_title', __( 'Заголовок секции', 'pdp' ) )
	) )
	->add_tab( __( 'Меню услуг', 'pdp' ), array(
		Field::make( 'text', 'services_overtitle', __( 'Надзаголовок', 'pdp' ) ),
		Field::make( 'text', 'services_title', __( 'Заголовок', 'pdp' ) ),
		Field::make( 'complex', 'services_categories', __( 'Категории услуг', 'pdp' ) )
			->set_collapsed( true )
			->add_fields( array(
				Field::make( 'text', 'title', __( 'Заголовок', 'pdp' ) ),
				Field::make( 'textarea', 'content', __( 'Контент', 'pdp' ) ),
			) ),
		Field::make( 'textarea', 'services_call', __( 'Текст предложения', 'pdp' ) ),
		Field::make( 'text', 'services_button', __( 'Текст кнопки', 'pdp' ) ),
		Field::make( 'text', 'services_link', __( 'Ссылка', 'pdp' ) ),
	) )
	->add_tab( __( 'Перфекционизм', 'pdp' ), array(
		Field::make( 'text', 'perfectionism_heading', __( 'Заголовок', 'pdp' ) ),
		Field::make( 'rich_text', 'perfectionism_content', __( 'Контент', 'pdp' ) ),
		Field::make( 'image', 'perfectionism_image1x', __( 'Изображение (1x)', 'pdp' ) ),
		Field::make( 'image', 'perfectionism_image2x', __( 'Изображение (2x)', 'pdp' ) )
	) )
	->add_tab( __( 'Форма', 'pdp' ), array(
		Field::make( 'text', 'form_title', __( 'Заголовок', 'pdp' ) ),
		Field::make( 'textarea', 'form_subtitle', __( 'Подзаголовок', 'pdp' ) )
	) )
	->add_tab( __( 'Вопросы и ответы' ), array(
		Field::make( 'text', 'faq_title', __( 'Заголовок', 'pdp' ) ),
		Field::make( 'complex', 'faq_items', __( 'Список вопросов', 'pdp' ) )
		     ->set_collapsed( true )
		     ->add_fields( array(
			     Field::make( 'text', 'title', __( 'Вопрос', 'pdp' ) ),
			     Field::make( 'rich_text', 'content', __( 'Ответ', 'pdp' ) ),
		     ) )
	) );


/**
 *  About Us
 */

Container::make( 'post_meta', __( 'Настройки шаблона', 'pdp' ) )
	->where( 'post_template', '=', 'about.php' )
	->add_tab( __( 'Hero секция', 'pdp' ), array(
		Field::make( 'text', 'hero_overtitle', __( 'Надзаголовок', 'pdp' ) ),
		Field::make( 'text', 'hero_title', __( 'Заголовок', 'pdp' ) ),
		Field::make( 'textarea', 'hero_description', __( 'Описание', 'pdp' ) ),
		Field::make( 'image', 'hero_background1x', __( 'Фоновая картинка (1х)', 'pdp' ) ),
		Field::make( 'image', 'hero_background2x', __( 'Фоновая картинка (2х)', 'pdp' ) )
	) )
	->add_tab( __( 'Об услугах', 'pdp' ), array(
		Field::make( 'text', 'about_services_overtitle', __( 'Надзаголовок', 'pdp' ) ),
		Field::make( 'text', 'about_services_title', __( 'Заголовок', 'pdp' ) ),
		Field::make( 'rich_text', 'about_services_content', __( 'Контент', 'pdp' ) ),
		Field::make( 'image', 'about_services_image1x', __( 'Изображение (1x)', 'pdp' ) ),
		Field::make( 'image', 'about_services_image2x', __( 'Изображение (2x)', 'pdp' ) )
	) )
	->add_tab( __( 'Основатели', 'pdp' ), array(
		Field::make( 'text', 'founders_title', __( 'Заголовок', 'pdp' ) ),
		Field::make( 'rich_text', 'founders_content', __( 'Контент', 'pdp' ) ),
		Field::make( 'text', 'founders_sign', __( 'Подпись', 'pdp' ) ),
		Field::make( 'image', 'founders_image1x', __( 'Изображение (1x)', 'pdp' ) ),
		Field::make( 'image', 'founders_image2x', __( 'Изображение (2x)', 'pdp' ) )
	) )
	->add_tab( __( 'Преимущества', 'pdp' ), array(
		Field::make( 'text', 'advantages_overtitle', __( 'Надзаголовок', 'pdp' ) ),
		Field::make( 'text', 'advantages_title', __( 'Заголовок секции', 'pdp' ) ),
		Field::make( 'complex', 'advantages_list', __( 'Список преимуществ', 'pdp' ) )
		     ->set_collapsed( true )
		     ->add_fields( array(
			     Field::make( 'textarea', 'content', __( 'Контент', 'pdp' ) ),
		     ) )
	) )
	->add_tab( __( 'Услуги', 'pdp' ), array(
		Field::make( 'text', 'services_overtitle', __( 'Надзаголовок', 'pdp' ) ),
		Field::make( 'text', 'services_title', __( 'Заголовок секции', 'pdp' ) )
	) )
	->add_tab( __( 'Регламенты', 'pdp' ), array(
		Field::make( 'text', 'regulations_badge_title', __( 'Текст бейджа', 'pdp' ) ),
		Field::make( 'text', 'regulations_title', __( 'Заголовок', 'pdp' ) ),
		Field::make( 'text', 'regulations_subtitle', __( 'Подзаголовок', 'pdp' ) )
	) )
	->add_tab( __( 'Отзывы', 'pdp' ), array(
		Field::make( 'text', 'testimonials_overtitle', __( 'Надзаголовок', 'pdp' ) ),
		Field::make( 'text', 'testimonials_title', __( 'Заголовок секции', 'pdp' ) )
	) )
	->add_tab( __( 'Косметика', 'pdp' ), array(
		Field::make( 'text', 'cosmetics_overtitle', __( 'Надзаголовок', 'pdp' ) ),
		Field::make( 'text', 'cosmetics_title', __( 'Заголовок секции', 'pdp' ) ),
		Field::make( 'media_gallery', 'cosmetics_gallery', __( 'Логотипы', 'pdp' ) )
		     ->set_type( 'image' )
	) )
	->add_tab( __( 'Школа', 'pdp' ), array(
		Field::make( 'text', 'school_overtitle', __( 'Надзаголовок', 'pdp' ) ),
		Field::make( 'text', 'school_title', __( 'Заголовок секции', 'pdp' ) ),
		Field::make( 'textarea', 'school_description', __( 'Описание', 'pdp' ) ),
		Field::make( 'complex', 'school_directions', __( 'Направления', 'pdp' ) )
		     ->set_collapsed( true )
		     ->add_fields( array(
			     Field::make( 'text', 'name', __( 'Название', 'pdp' ) ),
		     ) ),
		Field::make( 'text', 'school_button', __( 'Текст кнопки', 'pdp' ) ),
		Field::make( 'text', 'school_link', __( 'Ссылка', 'pdp' ) ),
		Field::make( 'image', 'school_image1x', __( 'Изображение (1x)', 'pdp' ) ),
		Field::make( 'image', 'school_image2x', __( 'Изображение (2x)', 'pdp' ) ),
	) )
	->add_tab( __( 'Франшиза', 'pdp' ), array(
		Field::make( 'text', 'franchise_overtitle', __( 'Надзаголовок', 'pdp' ) ),
		Field::make( 'text', 'franchise_title', __( 'Заголовок секции', 'pdp' ) ),
		Field::make( 'textarea', 'franchise_description', __( 'Описание', 'pdp' ) ),
		Field::make( 'complex', 'franchise_features', __( 'Фишки', 'pdp' ) )
		     ->set_collapsed( true )
		     ->add_fields( array(
			     Field::make( 'text', 'title', __( 'Заголовок', 'pdp' ) ),
			     Field::make( 'text', 'description', __( 'Описание', 'pdp' ) ),
		     ) ),
		Field::make( 'text', 'franchise_button', __( 'Текст кнопки', 'pdp' ) ),
		Field::make( 'text', 'franchise_link', __( 'Ссылка', 'pdp' ) ),
		Field::make( 'image', 'franchise_image1x', __( 'Изображение (1x)', 'pdp' ) ),
		Field::make( 'image', 'franchise_image2x', __( 'Изображение (2x)', 'pdp' ) ),
	) );


/**
 *  Gifts
 */

Container::make( 'post_meta', __( 'Настройки шаблона', 'pdp' ) )
	->where( 'post_template', '=', 'gift-cards.php' )
	->add_tab( __( 'Hero', 'pdp' ), array(
		Field::make( 'text', 'hero_overtitle', __( 'Надзаголовок', 'pdp' ) ),
		Field::make( 'text', 'hero_title', __( 'Заголовок', 'pdp' ) ),
		Field::make( 'textarea', 'hero_description', __( 'Описание', 'pdp' ) ),
		Field::make( 'image', 'hero_background1x', __( 'Фоновая картинка (1х)', 'pdp' ) ),
		Field::make( 'image', 'hero_background2x', __( 'Фоновая картинка (2х)', 'pdp' ) )
	) )
	->add_tab( __( 'Подарки', 'pdp' ), array(
		Field::make( 'complex', 'gifts', __( 'Варианты', 'pdp' ) )
			->set_collapsed( true )
			->add_fields( array(
				Field::make( 'text', 'title', __( 'Заголовок', 'pdp' ) ),
				Field::make( 'text', 'name', __( 'Название', 'pdp' ) ),
				Field::make( 'text', 'slug', __( 'Ярлык', 'pdp' ) ),
				Field::make( 'image', 'cover1x', __( 'Обложка (1х)', 'pdp' ) ),
				Field::make( 'image', 'cover2x', __( 'Обложка (2х)', 'pdp' ) ),
				Field::make( 'image', 'hover_cover1x', __( 'Обложка при наведении (1х)', 'pdp' ) ),
				Field::make( 'image', 'hover_cover2x', __( 'Обложка при наведении (2х)', 'pdp' ) ),
				Field::make( 'checkbox', 'bestseller', __( 'Бестселлер', 'pdp' ) )
				     ->set_option_value( 'yes' ),
				Field::make( 'select', 'type', __( 'Тип', 'pdp' ) )
					->add_options( array(
						'card'  => __( 'Карта', 'pdp' ),
						'box'  => __( 'Бокс', 'pdp' )
					) ),
				Field::make( 'complex', 'gallery', __( 'Галерея', 'pdp' ) )
					->set_collapsed( true )
					->add_fields( array(
						Field::make( 'image', 'item1x', __( 'Изображение (1х)', 'pdp' ) ),
						Field::make( 'image', 'item2x', __( 'Изображение (2х)', 'pdp' ) )
					) ),
				Field::make( 'color', 'color', __( 'Цвет', 'pdp' ) ),
				Field::make( 'textarea', 'amount', __( 'Номиналы (через запятую)', 'pdp' ) )
					->set_conditional_logic( array(
						array(
							'field' => 'type',
							'value' => 'card'
						)
					) ),
				Field::make( 'textarea', 'desc', __( 'Описание', 'pdp' ) )
				     ->set_conditional_logic( array(
					     array(
						     'field' => 'type',
						     'value' => 'box'
					     )
				     ) )
			) )
	) )
	->add_tab( __( 'Первый баннер', 'pdp' ), array(
		Field::make( 'text', 'first_banner_title', __( 'Заголовок', 'pdp' ) ),
		Field::make( 'image', 'first_banner_background1x', __( 'Изображение (1x)', 'pdp' ) ),
		Field::make( 'image', 'first_banner_background2x', __( 'Изображение (2x)', 'pdp' ) ),
		Field::make( 'text', 'first_banner_button', __( 'Текст кнопки', 'pdp' ) ),
		Field::make( 'text', 'first_banner_link', __( 'Ссылка', 'pdp' ) ),
	) )
	->add_tab( __( 'Промо блок', 'pdp' ), array(
		Field::make( 'text', 'promo_overtitle', __( 'Надзаголовок', 'pdp' ) ),
		Field::make( 'text', 'promo_title', __( 'Заголовок', 'pdp' ) ),
		Field::make( 'text', 'promo_subtitle', __( 'Подзаголовок', 'pdp' ) ),
		Field::make( 'rich_text', 'promo_content', __( 'Контент', 'pdp' ) ),
		Field::make( 'complex', 'promo_features', __( 'Фишки', 'pdp' ) )
			->set_collapsed( true )
			->add_fields( array(
				Field::make( 'textarea', 'icon', __( 'SVG код', 'pdp' ) ),
				Field::make( 'text', 'title', __( 'Заголовок', 'pdp' ) ),
			) ),
		Field::make( 'image', 'promo_image1x', __( 'Изображение (1x)', 'pdp' ) ),
		Field::make( 'image', 'promo_image2x', __( 'Изображение (2x)', 'pdp' ) )
	) )
	->add_tab( __( 'Второй баннер', 'pdp' ), array(
		Field::make( 'text', 'second_banner_title', __( 'Заголовок', 'pdp' ) ),
		Field::make( 'text', 'second_banner_subtitle', __( 'Подзаголовок', 'pdp' ) ),
		Field::make( 'image', 'second_banner_background1x', __( 'Изображение (1x)', 'pdp' ) ),
		Field::make( 'image', 'second_banner_background2x', __( 'Изображение (2x)', 'pdp' ) ),
		Field::make( 'text', 'second_banner_button', __( 'Текст кнопки', 'pdp' ) ),
		Field::make( 'text', 'second_banner_link', __( 'Ссылка', 'pdp' ) ),
	) )
	->add_tab( __( 'Форма заказа', 'pdp' ), array(
		Field::make( 'text', 'form_title', __( 'Заголовок', 'pdp' ) ),
		Field::make( 'text', 'form_subtitle', __( 'Подзаголовок', 'pdp' ) )
	) );


/**
 *  Service
 */

Container::make('post_meta', __('Настройки страницы', 'pdp'))
	->where('post_template', '=', 'service-category.php')
	->add_tab(__('Шапка страницы', 'pdp'), array(
		Field::make('rich_text', 'hero_content', __('Текст', 'pdp'))
		     ->set_width(75),
		Field::make('image', 'hero_img', __('Изображение', 'pdp'))
		     ->set_width(25)
	) )
	->add_tab( __( 'Секции', 'pdp' ), array(
		Field::make( 'complex', 'sections', __( 'Список секций', 'pdp' ) )
			->set_collapsed( true )
			->add_fields( array(
				Field::make( 'text', 'title', __('Заголовок', 'pdp' ) ),
				Field::make( 'image', 'image', __('Изображение', 'pdp' ) ),
				Field::make( 'rich_text', 'content', __('Контент', 'pdp' ) ),
				Field::make( 'text', 'details', __( 'Страница подробностей', 'pdp' ) ),
				Field::make( 'text', 'form_title', __( 'Заголовок для формы', 'pdp' ) ),
				Field::make( 'text', 'form_service', __( 'Название услуги для формы', 'pdp' ) ),
				Field::make( 'rich_text', 'after_content', __( 'Контент после секции', 'pdp' ) )
			) )
	) );


/**
 *  Blog
 */

Container::make( 'post_meta', __( 'Настройки', 'pdp' ) )
	->where( 'post_id', 'IN', array( get_option( 'page_for_posts' ), pll_get_post( get_option( 'page_for_posts' ) ) ) )
	->add_tab( __( 'Блог', 'pdp' ), array(
		Field::make( 'text', 'hero_overtitle', __( 'Надзаголовок', 'pdp' ) ),
		Field::make( 'text', 'hero_title', __( 'Заголовок', 'pdp' ) ),
		Field::make( 'textarea', 'hero_description', __( 'Описание', 'pdp' ) ),
		Field::make( 'image', 'hero_background1x', __( 'Фоновая картинка (1х)', 'pdp' ) ),
		Field::make( 'image', 'hero_background2x', __( 'Фоновая картинка (2х)', 'pdp' ) )
	) )
	->add_tab( __( 'Школа', 'pdp' ), array(
		Field::make( 'text', 'school_overtitle', __( 'Надзаголовок', 'pdp' ) ),
		Field::make( 'text', 'school_title', __( 'Заголовок секции', 'pdp' ) ),
		Field::make( 'textarea', 'school_description', __( 'Описание', 'pdp' ) ),
		Field::make( 'complex', 'school_directions', __( 'Направления', 'pdp' ) )
		     ->set_collapsed( true )
		     ->add_fields( array(
			     Field::make( 'text', 'name', __( 'Название', 'pdp' ) ),
		     ) ),
		Field::make( 'text', 'school_button', __( 'Текст кнопки', 'pdp' ) ),
		Field::make( 'text', 'school_link', __( 'Ссылка', 'pdp' ) ),
		Field::make( 'image', 'school_image1x', __( 'Изображение (1x)', 'pdp' ) ),
		Field::make( 'image', 'school_image2x', __( 'Изображение (2x)', 'pdp' ) ),
	) );