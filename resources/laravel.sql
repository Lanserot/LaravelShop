
INSERT INTO `categories` (`id`, `name`, `code`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Мобильные телефоны', 'mobilies', 'Описание мобильных телефонов', 'mobile.jpg', NULL, NULL),
(2, 'Портативная техника', 'portable', 'Описание портативной техники', 'portable.jpg', NULL, NULL),
(3, 'Бытовая техника', 'technics', '', 'appliance.jpg', NULL, NULL);

INSERT INTO `products` (`id`, `category_id`, `name`, `code`, `description`, `image`, `price`, `created_at`, `updated_at`, `count`) VALUES
(1, 1, 'iPhone X 64GB', 'iphone_x_64', 'Отличный продвинутый телефон с памятью на 64 gb', 'iphone_x.jpg', 71990, NULL, NULL, 1),
(2, 1, 'iPhone X 256GB', 'iphone_x_256', 'Отличный продвинутый телефон с памятью на 256 gb', 'iphone_x_silver.jpg', 89990, NULL, '2021-03-06 20:37:46', 22),
(3, 1, 'HTC One S', 'htc_one_s', 'Зачем платить за лишнее? Легендарный HTC One S', 'htc_one_s.png', 12490, NULL, '2021-03-06 20:31:19', 2),
(4, 1, 'iPhone 5SE', 'iphone_5se', 'Отличный классический iPhone', 'iphone_5.jpg', 17221, NULL, NULL, 1),
(5, 2, 'Наушники Beats Audio', 'beats_audio', 'Отличный звук от Dr. Dre', 'beats.jpg', 20221, NULL, '2021-03-06 20:41:52', 0),
(6, 2, 'Камера GoPro', 'gopro', 'Снимай самые яркие моменты с помощью этой камеры', 'gopro.jpg', 12000, NULL, '2021-03-06 20:41:52', 0),
(7, 2, 'Камера Panasonic HC-V770', 'panasonic_hc-v770', 'Для серьёзной видео съемки нужна серьёзная камера. Panasonic HC-V770 для этих целей лучший выбор!', 'video_panasonic.jpg', 27900, NULL, NULL, 2),
(8, 3, 'Кофемашина DeLongi', 'delongi', 'Хорошее утро начинается с хорошего кофе!', 'delongi.jpg', 25200, NULL, NULL, 1),
(9, 3, 'Холодильник Haier', 'haier', 'Для большой семьи большой холодильник!', 'haier.jpg', 40200, NULL, NULL, 4),
(10, 3, 'Блендер Moulinex', 'moulinex', 'Для самых смелых идей', 'moulinex.jpg', 4200, NULL, NULL, 1),
(11, 3, 'Мясорубка Bosch', 'bosch', 'Любите домашние котлеты? Вам определенно стоит посмотреть на эту мясорубку!', 'bosch.jpg', 9200, NULL, NULL, 1);

