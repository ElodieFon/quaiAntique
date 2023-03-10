

INSERT INTO `article` (`id`, `name`, `description`, `image`, `inverse`, `active`) VALUES
(1, 'Histoire', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis, alias accusantium aliquam nostrum sint ipsum, enim dignissimos exercitationem perferendis voluptatem ullam nam maiores accusamus reiciendis aut laboriosam maxime corporis, hic illum quas beatae amet quasi quibusdam magnam. Atque, ullam. Excepturi facilis cum, praesentium temporibus doloremque fuga tempora quidem asperiores! Aspernatur!', 'chetan-hireholi-WOQCwfnlhcs-unsplash.jpg', 0, 1),
(2, 'Notre cuisine', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis, alias accusantium aliquam nostrum sint ipsum, enim dignissimos exercitationem perferendis voluptatem ullam nam maiores accusamus reiciendis aut laboriosam maxime corporis, hic illum quas beatae amet quasi quibusdam magnam. Atque, ullam. Excepturi facilis cum, praesentium temporibus doloremque fuga tempora quidem asperiores! Aspernatur!', 'pylyp-sukhenko-y-XZf_TNRms-unsplash (1).jpg', 1, 1),
(3, 'Notre chef', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis, alias accusantium aliquam nostrum sint ipsum, enim dignissimos exercitationem perferendis voluptatem ullam nam maiores accusamus reiciendis aut laboriosam maxime corporis, hic illum quas beatae amet quasi quibusdam magnam. Atque, ullam. Excepturi facilis cum, praesentium temporibus doloremque fuga tempora quidem asperiores! Aspernatur!', 'redcharlie-redcharlie1-t-7KEq9M0b0-unsplash.jpg', 0, 1);


INSERT INTO `category` (`id`, `nom`, `active`, `updated_at`, `created_at`) VALUES
(1, 'Entrées', 1, NULL, '2023-03-07 13:06:02'),
(2, 'Plats', 1, NULL, '2023-03-07 13:06:13'),
(3, 'Desserts', 1, NULL, '2023-03-07 13:06:23'),
(4, 'Goutés', 0, NULL, '2023-03-07 13:06:43');

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230306142159', '2023-03-06 14:22:05', 380),
('DoctrineMigrations\\Version20230309112157', '2023-03-09 11:22:13', 175),
('DoctrineMigrations\\Version20230309115531', '2023-03-09 11:55:35', 87);

INSERT INTO `horaire` (`id`, `jour`, `matin_debut`, `matin_fin`, `aprem_debut`, `aprem_fin`, `active`) VALUES
(1, 'Lundi', '11:30:00', '14:00:00', '19:30:00', '20:00:00', 1),
(2, 'mardi', '11:30:00', '14:00:00', '19:30:00', '20:00:00', 1),
(3, 'mercredi', '11:30:00', '14:00:00', '19:30:00', '20:00:00', 1),
(4, 'jeudi', '11:30:00', '14:00:00', '19:30:00', '20:00:00', 1),
(5, 'vendredi', '11:30:00', '14:00:00', '19:30:00', '20:00:00', 1),
(6, 'samedi', '11:30:00', '14:00:00', '19:30:00', '20:00:00', 1),
(7, 'dimanche', '11:30:00', '14:00:00', '19:30:00', '20:00:00', 0);

INSERT INTO `info_resto` (`id`, `nom`, `telephone`, `email`, `adresse`, `cp`, `ville`, `pays`, `active`, `carte_url`, `lien_maps`) VALUES
(1, 'Le Quai Antique', '0401123334', 'le.quai.antique@hotmail.com', '99 rue Croix d\'or', '73000', 'Chambéry', 'France', 1, 'carte maps.png', 'https://goo.gl/maps/ys2fKRRxdWgEYJLaA');

INSERT INTO `product` (`id`, `category_id`, `name`, `description`, `prix`, `image`, `updated_at`, `active`, `created_at`, `product_of_moment`) VALUES
(1, 3, 'crepes suzette', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci eveniet consectetur illum labore excepturi eos libero nemo impedit unde quibusdam dolorem pariatur, fuga autem ea, nobis numquam! Dolores delectus ducimus tenetur provident sapiente minima dolorum quod nostrum quo corrupti ipsam, rerum, laboriosam, soluta facere ad optio blanditiis! Cupiditate, nisi debitis!', '250.00', 'joyful-vT5xrj3z1OE-unsplash.jpg', NULL, 1, '2023-03-07 13:07:11', 1),
(2, 2, 'blanquette de veaux', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci eveniet consectetur illum labore excepturi eos libero nemo impedit unde quibusdam dolorem pariatur, fuga autem ea, nobis numquam! Dolores delectus ducimus tenetur provident sapiente minima dolorum quod nostrum quo corrupti ipsam, rerum, laboriosam, soluta facere ad optio blanditiis! Cupiditate, nisi debitis!', '1500.00', 'farhad-ibrahimzade-KpOl9jV2aJM-unsplash (1).jpg', NULL, 1, '2023-03-07 13:07:42', 0),
(3, 1, 'salade fruits de mer', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci eveniet consectetur illum labore excepturi eos libero nemo impedit unde quibusdam dolorem pariatur, fuga autem ea, nobis numquam! Dolores delectus ducimus tenetur provident sapiente minima dolorum quod nostrum quo corrupti ipsam, rerum, laboriosam, soluta facere ad optio blanditiis! Cupiditate, nisi debitis!', '650.00', 'anna-pelzer-IGfIGP5ONV0-unsplash (1).jpg', '2023-03-07 13:08:54', 1, '2023-03-07 13:08:20', 0),
(4, 1, 'salade César', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci eveniet consectetur illum labore excepturi eos libero nemo impedit unde quibusdam dolorem pariatur, fuga autem ea, nobis numquam! Dolores delectus ducimus tenetur provident sapiente minima dolorum quod nostrum quo corrupti ipsam, rerum, laboriosam, soluta facere ad optio blanditiis! Cupiditate, nisi debitis!', '650.00', 'hermes-rivera-OzBLe_Eg1mg-unsplash (1).jpg', NULL, 1, '2023-03-07 13:08:49', 1),
(5, 2, 'bœuf bourguignon', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci eveniet consectetur illum labore excepturi eos libero nemo impedit unde quibusdam dolorem pariatur, fuga autem ea, nobis numquam! Dolores delectus ducimus tenetur provident sapiente minima dolorum quod nostrum quo corrupti ipsam, rerum, laboriosam, soluta facere ad optio blanditiis! Cupiditate, nisi debitis!', '1500.00', 'farhad-ibrahimzade-TvMWBS6TIsg-unsplash (1).jpg', NULL, 1, '2023-03-07 13:09:19', 1),
(6, 2, 'sautée de fruit de mer', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci eveniet consectetur illum labore excepturi eos libero nemo impedit unde quibusdam dolorem pariatur, fuga autem ea, nobis numquam! Dolores delectus ducimus tenetur provident sapiente minima dolorum quod nostrum quo corrupti ipsam, rerum, laboriosam, soluta facere ad optio blanditiis! Cupiditate, nisi debitis!', '1420.00', 'farhad-ibrahimzade-HNmcgpzPHag-unsplash.jpg', NULL, 1, '2023-03-07 13:09:56', 0),
(7, 3, 'Gateau au yaourt', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci eveniet consectetur illum labore excepturi eos libero nemo impedit unde quibusdam dolorem pariatur, fuga autem ea, nobis numquam! Dolores delectus ducimus tenetur provident sapiente minima dolorum quod nostrum quo corrupti ipsam, rerum, laboriosam, soluta facere ad optio blanditiis! Cupiditate, nisi debitis!', '350.00', 'téléchargement.jpg', '2023-03-07 13:10:45', 0, '2023-03-07 13:10:30', 0),
(8, 3, 'mini glaces', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci eveniet consectetur illum labore excepturi eos libero nemo impedit unde quibusdam dolorem pariatur, fuga autem ea, nobis numquam! Dolores delectus ducimus tenetur provident sapiente minima dolorum quod nostrum quo corrupti ipsam, rerum, laboriosam, soluta facere ad optio blanditiis! Cupiditate, nisi debitis!', '350.00', 'najlacam-f8TajCVv4s8-unsplash (1).jpg', NULL, 1, '2023-03-07 13:11:15', 0),
(9, 3, 'Tarte citron meringué', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci eveniet consectetur illum labore excepturi eos libero nemo impedit unde quibusdam dolorem pariatur, fuga autem ea, nobis numquam! Dolores delectus ducimus tenetur provident sapiente minima dolorum quod nostrum quo corrupti ipsam, rerum, laboriosam, soluta facere ad optio blanditiis! Cupiditate, nisi debitis!', '350.00', '13on-z4BJGODf6O4-unsplash.jpg', '2023-03-07 13:11:57', 1, '2023-03-07 13:11:34', 1),
(10, 1, 'Salade mixte', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci eveniet consectetur illum labore excepturi eos libero nemo impedit unde quibusdam dolorem pariatur, fuga autem ea, nobis numquam! Dolores delectus ducimus tenetur provident sapiente minima dolorum quod nostrum quo corrupti ipsam, rerum, laboriosam, soluta facere ad optio blanditiis! Cupiditate, nisi debitis!', '650.00', 'anh-nguyen-kcA-c3f_3FE-unsplash.jpg', NULL, 1, '2023-03-07 13:12:49', 0);

INSERT INTO `reservation` (`id`, `heure_id`, `user_id`, `name_client`, `date`, `nb_persons`, `nb_children`, `comentaire`, `allergie`) VALUES
(26, 1, 1, 'heello', '2023-03-08 00:00:00', 7, NULL, NULL, 0);

INSERT INTO `reservation_horaire` (`id`, `heure`, `active`, `nb_place`) VALUES
(1, '11:30:00', 1, 10),
(2, '11:45:00', 1, 10),
(3, '12:00:00', 1, 10),
(4, '12:15:00', 1, 10),
(5, '12:30:00', 1, 10),
(6, '12:45:00', 1, 10),
(7, '13:00:00', 1, 10),
(8, '13:15:00', 1, 10),
(9, '13:30:00', 1, 10),
(10, '13:45:00', 1, 10),
(11, '14:00:00', 1, 10),
(12, '19:30:00', 1, 10),
(13, '19:45:00', 1, 10),
(14, '20:00:00', 1, 10),
(15, '20:15:00', 1, 10),
(16, '20:30:00', 1, 10),
(17, '20:45:00', 1, 10),
(18, '21:00:00', 1, 10),
(19, '21:15:00', 1, 10),
(20, '21:30:00', 1, 10),
(21, '21:45:00', 1, 10),
(22, '22:00:00', 1, 10);

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `is_verified`, `name`) VALUES
(1, 'Admin@hotmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$LckVhlPn37j3t6gzQYTP.ecSMkGyKdPwy8ne07AqhF9wXC0Vo7S56', 0, 'Admin');


