-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2018 a las 06:30:59
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_restaurante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `sueldo` int(11) NOT NULL,
  `descripcion` varchar(502) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `nombre`, `sueldo`, `descripcion`) VALUES
(1, 'Administrador', 1400000, 'gffghfgh');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cocinero_plato`
--

CREATE TABLE `cocinero_plato` (
  `id` int(11) NOT NULL,
  `id_cocinero` int(11) NOT NULL,
  `id_plato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallespedidos_ofertas`
--

CREATE TABLE `detallespedidos_ofertas` (
  `id_p_ofertas` int(11) NOT NULL,
  `idpedido_oferta` int(11) NOT NULL,
  `id_oferta` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallespedidos_platos`
--

CREATE TABLE `detallespedidos_platos` (
  `id_` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_plato` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `detallespedidos_platos`
--

INSERT INTO `detallespedidos_platos` (`id_`, `id_pedido`, `id_plato`, `cantidad`) VALUES
(1, 1, 5, 1),
(3, 3, 4, 2),
(4, 1, 5, 2),
(5, 4, 4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `valor_total` int(11) NOT NULL,
  `id_mesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id_factura`, `id_pedido`, `codigo`, `fecha`, `valor_total`, `id_mesa`) VALUES
(1, 1, 112233, '2018-11-30 00:00:00', 21000, 1),
(2, 3, 32654, '2018-11-30 00:00:00', 18000, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE `mesas` (
  `id` int(11) NOT NULL,
  `num_mesa` int(11) NOT NULL,
  `tipo_mesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`id`, `num_mesa`, `tipo_mesa`) VALUES
(1, 2, 1),
(2, 10, 1),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('33acad3c3e08e3257fc6bb93445bebd07bc485cf9d706bbbc5b9818c507ecc4e79c9ee26b334de16', 1, 1, NULL, '[\"*\"]', 0, '2018-11-30 04:51:53', '2018-11-30 04:51:53', '2019-11-29 23:51:53'),
('78f4fd3d179d0789bd69951c4613cfc9fff89b9566fdb1c5d6eee4d581e1a386fb790dd63fb4f3d6', 1, 1, NULL, '[\"*\"]', 0, '2018-11-11 22:55:49', '2018-11-11 22:55:49', '2019-11-11 22:55:49'),
('8a4a181d59362851ac31e7b167799ef31d6dd33d8c0ba2fec977d3c8b370c7d6516c906adae3b5da', 1, 1, NULL, '[\"*\"]', 0, '2018-11-11 23:00:25', '2018-11-11 23:00:25', '2019-11-11 23:00:25'),
('91dd06ad7526cad78451fb3c0d72130bf07645c2e6eb59e95dad525acc6180af343c9f8058b32c97', 1, 1, NULL, '[\"*\"]', 0, '2018-11-30 00:59:28', '2018-11-30 00:59:28', '2019-11-29 19:59:28'),
('ed87a62d1e22e7e2a98b55035ee8c5a192469335045f599d5d64aa095ba78ba7c7354bd6c6d559ce', 1, 1, NULL, '[\"*\"]', 0, '2018-12-01 04:50:00', '2018-12-01 04:50:00', '2019-11-30 23:50:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'restaurante', 'LdETGrkYFWkvFYvh38FiYaCcDOG9le26A7OSOXHQ', 'http://localhost', 0, 1, 0, '2018-11-11 22:49:32', '2018-11-11 22:49:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_refresh_tokens`
--

INSERT INTO `oauth_refresh_tokens` (`id`, `access_token_id`, `revoked`, `expires_at`) VALUES
('50e0e2aaf3a6df639371b963f62f80a54cde70ffe2f74b38671568bad6610f0b2e4c3b0cd92f1d8e', '8a4a181d59362851ac31e7b167799ef31d6dd33d8c0ba2fec977d3c8b370c7d6516c906adae3b5da', 0, '2019-11-11 23:00:25'),
('575427edbcd51a0bd55584e0e9790fa5a17e128dd921e5c20e558d370356891185e12ec003b56c33', '91dd06ad7526cad78451fb3c0d72130bf07645c2e6eb59e95dad525acc6180af343c9f8058b32c97', 0, '2019-11-29 19:59:29'),
('894ea2cbea29b7e41661723b4c193d512a96f6e940f249f70eefb278131861bcbbbafc2a4dd9574f', 'ed87a62d1e22e7e2a98b55035ee8c5a192469335045f599d5d64aa095ba78ba7c7354bd6c6d559ce', 0, '2019-11-30 23:50:01'),
('cd2e3efdfe3b2c6799cc4c12d745ddacde2bbfe11fd8d7ef0a668d41e4b934edd717a921da65cad3', '33acad3c3e08e3257fc6bb93445bebd07bc485cf9d706bbbc5b9818c507ecc4e79c9ee26b334de16', 0, '2019-11-29 23:51:54'),
('f9477a65597cb430d6f97631bcadef6a8dfacfc8f465bb8f797df181dd621272621919135bb2f529', '78f4fd3d179d0789bd69951c4613cfc9fff89b9566fdb1c5d6eee4d581e1a386fb790dd63fb4f3d6', 0, '2019-11-11 22:55:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta_dia`
--

CREATE TABLE `oferta_dia` (
  `id_promociones` int(11) NOT NULL,
  `nombre_promocion` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `valor_promocion` decimal(6,3) NOT NULL,
  `rutaimagen` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'noimagen',
  `descripcion_pro` varchar(520) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `fecha_promo` date DEFAULT NULL,
  `fin_fecha_promo` date DEFAULT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `oferta_dia`
--

INSERT INTO `oferta_dia` (`id_promociones`, `nombre_promocion`, `valor_promocion`, `rutaimagen`, `descripcion_pro`, `fecha_creacion`, `fecha_promo`, `fin_fecha_promo`, `estado`) VALUES
(3, 'caritas felices', '100.000', 'caritas.jpg', 'una para y torte para mi', '2018-11-13', '2018-11-06', '2018-11-28', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `nombre_cliente` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `id_mesa` int(11) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `hora_pedido` time NOT NULL,
  `estado` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `nombre_cliente`, `id_mesa`, `fecha_pedido`, `hora_pedido`, `estado`) VALUES
(1, 'edwin', 1, '2018-12-01', '22:01:54', 'pendiente'),
(3, 'Erick', 2, '2018-12-01', '09:00:00', 'pendiente'),
(4, 'vhfgj', 3, '2018-12-01', '04:00:00', 'pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_oferta`
--

CREATE TABLE `pedido_oferta` (
  `id_pedido_oferta` int(11) NOT NULL,
  `id_mesa` int(11) NOT NULL,
  `nombre_cliente` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_venta` datetime NOT NULL,
  `estado` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pedido_oferta`
--

INSERT INTO `pedido_oferta` (`id_pedido_oferta`, `id_mesa`, `nombre_cliente`, `fecha_venta`, `estado`) VALUES
(3, 1, 'lana', '2018-11-28 22:18:49', 'cancelado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platos`
--

CREATE TABLE `platos` (
  `id_plato` int(11) NOT NULL,
  `id_tipo_plato` int(11) NOT NULL,
  `nombre` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `precio` int(11) NOT NULL,
  `imagenplato` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'noimagen',
  `descripcion` varchar(502) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `platos`
--

INSERT INTO `platos` (`id_plato`, `id_tipo_plato`, `nombre`, `precio`, `imagenplato`, `descripcion`) VALUES
(3, 1, 'Pizza Perro', 5000, 'pizzaperro.jpg', 'Deliciosa pizza de perro :v'),
(4, 1, 'Queso y pepperoni', 9000, 'queso.jpg', 'deliciosa pizza de Queso y pepperoni'),
(5, 1, 'Hawaiana', 8000, 'hawaina.jpg', 'Deliciosa pizza Hawaina :v');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_platos`
--

CREATE TABLE `tipo_platos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(502) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_platos`
--

INSERT INTO `tipo_platos` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Pizzas', 'Pizza Mas ricas'),
(2, 'Corteliria', 'Corteliria en vasso :V'),
(3, 'Sopas', 'las mejores sopas'),
(4, 'Cervezas', 'las mejores Cervezas'),
(5, 'Comidas Rapidas', 'las mejores Rapidas'),
(6, 'Almuerzos', 'las mejores Almuerzos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadores`
--

CREATE TABLE `trabajadores` (
  `id_trabajador` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellido_paterno` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellido_materno` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cedula` int(11) NOT NULL,
  `sexo` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `trabajadores`
--

INSERT INTO `trabajadores` (`id_trabajador`, `nombre`, `apellido_paterno`, `apellido_materno`, `cedula`, `sexo`, `correo`, `telefono`) VALUES
(1, 'prueba', 'pruebita', 'prubo', 111, 'm', 'jhona@gmail.com', '4422');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE `turno` (
  `id_turno` int(11) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `turno`
--

INSERT INTO `turno` (`id_turno`, `hora_inicio`, `hora_fin`, `descripcion`) VALUES
(2, '08:00:00', '16:00:00', 'de dia a tarade');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'jhona', 'jhona@gmail.com', NULL, '$2y$10$gSm0RM6cLi6mTc754.pc1.wv3wf7JFU/RZs5J/T/mlxFnIZJs3KJu', NULL, '2018-11-11 22:55:46', '2018-11-11 22:55:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_cargo`
--

CREATE TABLE `user_cargo` (
  `id_user_cargo` int(11) NOT NULL,
  `id_trabajador` int(11) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `observaciones` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user_cargo`
--

INSERT INTO `user_cargo` (`id_user_cargo`, `id_trabajador`, `id_cargo`, `observaciones`) VALUES
(1, 1, 1, 'dsfsd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_turnos`
--

CREATE TABLE `user_turnos` (
  `id_user_turnos` int(11) NOT NULL,
  `id_trabajado` int(11) NOT NULL,
  `id_turno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `cocinero_plato`
--
ALTER TABLE `cocinero_plato`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cocinero` (`id_cocinero`),
  ADD KEY `id_plato` (`id_plato`);

--
-- Indices de la tabla `detallespedidos_ofertas`
--
ALTER TABLE `detallespedidos_ofertas`
  ADD PRIMARY KEY (`id_p_ofertas`),
  ADD KEY `idpedido_oferta` (`idpedido_oferta`),
  ADD KEY `id_oferta` (`id_oferta`);

--
-- Indices de la tabla `detallespedidos_platos`
--
ALTER TABLE `detallespedidos_platos`
  ADD PRIMARY KEY (`id_`),
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `id_plato` (`id_plato`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD UNIQUE KEY `id_pedido_2` (`id_pedido`),
  ADD KEY `id_pedido` (`id_pedido`);

--
-- Indices de la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `num_mesa` (`num_mesa`),
  ADD KEY `tipo_mesa` (`tipo_mesa`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indices de la tabla `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indices de la tabla `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indices de la tabla `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indices de la tabla `oferta_dia`
--
ALTER TABLE `oferta_dia`
  ADD PRIMARY KEY (`id_promociones`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_mesa` (`id_mesa`);

--
-- Indices de la tabla `pedido_oferta`
--
ALTER TABLE `pedido_oferta`
  ADD PRIMARY KEY (`id_pedido_oferta`),
  ADD KEY `id_mesa` (`id_mesa`);

--
-- Indices de la tabla `platos`
--
ALTER TABLE `platos`
  ADD PRIMARY KEY (`id_plato`),
  ADD KEY `id_tipo_plato` (`id_tipo_plato`);

--
-- Indices de la tabla `tipo_platos`
--
ALTER TABLE `tipo_platos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD PRIMARY KEY (`id_trabajador`),
  ADD UNIQUE KEY `cedula` (`cedula`);

--
-- Indices de la tabla `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`id_turno`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `user_cargo`
--
ALTER TABLE `user_cargo`
  ADD PRIMARY KEY (`id_user_cargo`),
  ADD KEY `id_trabajador` (`id_trabajador`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- Indices de la tabla `user_turnos`
--
ALTER TABLE `user_turnos`
  ADD PRIMARY KEY (`id_user_turnos`),
  ADD KEY `id_trabajado` (`id_trabajado`),
  ADD KEY `id_turno` (`id_turno`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `cocinero_plato`
--
ALTER TABLE `cocinero_plato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `detallespedidos_ofertas`
--
ALTER TABLE `detallespedidos_ofertas`
  MODIFY `id_p_ofertas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `detallespedidos_platos`
--
ALTER TABLE `detallespedidos_platos`
  MODIFY `id_` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `mesas`
--
ALTER TABLE `mesas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `oferta_dia`
--
ALTER TABLE `oferta_dia`
  MODIFY `id_promociones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `pedido_oferta`
--
ALTER TABLE `pedido_oferta`
  MODIFY `id_pedido_oferta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `platos`
--
ALTER TABLE `platos`
  MODIFY `id_plato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tipo_platos`
--
ALTER TABLE `tipo_platos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  MODIFY `id_trabajador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `turno`
--
ALTER TABLE `turno`
  MODIFY `id_turno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `user_cargo`
--
ALTER TABLE `user_cargo`
  MODIFY `id_user_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `user_turnos`
--
ALTER TABLE `user_turnos`
  MODIFY `id_user_turnos` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cocinero_plato`
--
ALTER TABLE `cocinero_plato`
  ADD CONSTRAINT `cocinero_plato_ibfk_1` FOREIGN KEY (`id_cocinero`) REFERENCES `user_cargo` (`id_user_cargo`),
  ADD CONSTRAINT `cocinero_plato_ibfk_2` FOREIGN KEY (`id_plato`) REFERENCES `platos` (`id_plato`);

--
-- Filtros para la tabla `detallespedidos_ofertas`
--
ALTER TABLE `detallespedidos_ofertas`
  ADD CONSTRAINT `detallespedidos_ofertas_ibfk_1` FOREIGN KEY (`idpedido_oferta`) REFERENCES `pedido_oferta` (`id_pedido_oferta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detallespedidos_ofertas_ibfk_2` FOREIGN KEY (`id_oferta`) REFERENCES `oferta_dia` (`id_promociones`);

--
-- Filtros para la tabla `detallespedidos_platos`
--
ALTER TABLE `detallespedidos_platos`
  ADD CONSTRAINT `detallespedidos_platos_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`),
  ADD CONSTRAINT `detallespedidos_platos_ibfk_2` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`),
  ADD CONSTRAINT `detallespedidos_platos_ibfk_3` FOREIGN KEY (`id_plato`) REFERENCES `platos` (`id_plato`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_mesa`) REFERENCES `mesas` (`id`);

--
-- Filtros para la tabla `pedido_oferta`
--
ALTER TABLE `pedido_oferta`
  ADD CONSTRAINT `pedido_oferta_ibfk_2` FOREIGN KEY (`id_mesa`) REFERENCES `mesas` (`id`);

--
-- Filtros para la tabla `platos`
--
ALTER TABLE `platos`
  ADD CONSTRAINT `platos_ibfk_1` FOREIGN KEY (`id_tipo_plato`) REFERENCES `tipo_platos` (`id`);

--
-- Filtros para la tabla `user_cargo`
--
ALTER TABLE `user_cargo`
  ADD CONSTRAINT `user_cargo_ibfk_1` FOREIGN KEY (`id_trabajador`) REFERENCES `trabajadores` (`id_trabajador`),
  ADD CONSTRAINT `user_cargo_ibfk_2` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`);

--
-- Filtros para la tabla `user_turnos`
--
ALTER TABLE `user_turnos`
  ADD CONSTRAINT `user_turnos_ibfk_1` FOREIGN KEY (`id_trabajado`) REFERENCES `trabajadores` (`id_trabajador`),
  ADD CONSTRAINT `user_turnos_ibfk_2` FOREIGN KEY (`id_turno`) REFERENCES `turno` (`id_turno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
