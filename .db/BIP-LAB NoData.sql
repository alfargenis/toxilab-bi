-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 02-03-2024 a las 00:07:10
-- Versión del servidor: 8.3.0
-- Versión de PHP: 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `BIP-LAB`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `AlarmaExa`
--

CREATE TABLE `AlarmaExa` (
  `ID` smallint NOT NULL,
  `idMuestra` bigint DEFAULT NULL,
  `idExamen` smallint DEFAULT NULL,
  `Fecha` varchar(19) DEFAULT NULL,
  `Status` varchar(1) DEFAULT NULL,
  `Alarma` varchar(128) DEFAULT NULL,
  `idUsuario` smallint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Antibiograma`
--

CREATE TABLE `Antibiograma` (
  `idBac` mediumint DEFAULT NULL,
  `idMOrg` smallint DEFAULT NULL,
  `idAnt` smallint DEFAULT NULL,
  `Metodo` varchar(1) DEFAULT NULL,
  `Result` varchar(4) DEFAULT NULL,
  `Sens` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `applications`
--

CREATE TABLE `applications` (
  `id` bigint UNSIGNED NOT NULL,
  `name_app` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_app` text COLLATE utf8mb4_unicode_ci,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'logo-aplikasi/logo.svg',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `open_days` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `close_days` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `open_time` time DEFAULT NULL,
  `close_time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Asignar`
--

CREATE TABLE `Asignar` (
  `ID` smallint NOT NULL,
  `idInterfase` smallint DEFAULT NULL,
  `idExamen` smallint NOT NULL,
  `idExAnalizador` smallint DEFAULT NULL,
  `Activa` varchar(1) DEFAULT NULL,
  `idMetodo` smallint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Auditoria`
--

CREATE TABLE `Auditoria` (
  `ID` int NOT NULL,
  `Area` varchar(0) DEFAULT NULL,
  `TipEve` varchar(0) DEFAULT NULL,
  `Numero` varchar(0) DEFAULT NULL,
  `Numero2` varchar(0) DEFAULT NULL,
  `Imec` varchar(0) DEFAULT NULL,
  `Fecha` varchar(0) DEFAULT NULL,
  `Descrip` varchar(0) DEFAULT NULL,
  `Estacion` varchar(0) DEFAULT NULL,
  `idUsuario` varchar(0) DEFAULT NULL,
  `StatusExa` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `AxInterface`
--

CREATE TABLE `AxInterface` (
  `ID` varchar(0) DEFAULT NULL,
  `idInterface` int NOT NULL,
  `idCodigo` varchar(255) NOT NULL,
  `Descrip` varchar(0) DEFAULT NULL,
  `Status` varchar(0) DEFAULT NULL,
  `Activo` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `BacAnti`
--

CREATE TABLE `BacAnti` (
  `ID` tinyint DEFAULT NULL,
  `Codigo` tinyint DEFAULT NULL,
  `Descrip` varchar(13) DEFAULT NULL,
  `Grupo` varchar(14) DEFAULT NULL,
  `Activo` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `BacAntibioticos`
--

CREATE TABLE `BacAntibioticos` (
  `ID` smallint NOT NULL,
  `Codigo` varchar(3) DEFAULT NULL,
  `Descrip2` varchar(42) DEFAULT NULL,
  `Descrip` varchar(48) DEFAULT NULL,
  `Carga` varchar(12) DEFAULT NULL,
  `AntLocal` varchar(1) DEFAULT NULL,
  `Activo` varchar(1) DEFAULT NULL,
  `GUIDELINES` varchar(22) DEFAULT NULL,
  `CLSI` varchar(1) DEFAULT NULL,
  `SFM` varchar(1) DEFAULT NULL,
  `SRGA` varchar(1) DEFAULT NULL,
  `BSAC` varchar(1) DEFAULT NULL,
  `DIN` varchar(1) DEFAULT NULL,
  `NEO` varchar(1) DEFAULT NULL,
  `AFA` varchar(1) DEFAULT NULL,
  `ABX_NUMBER` varchar(5) DEFAULT NULL,
  `BETALACTAM` varchar(1) DEFAULT NULL,
  `CLASS` varchar(25) DEFAULT NULL,
  `SUBCLASS` varchar(24) DEFAULT NULL,
  `PROF_CLASS` varchar(25) DEFAULT NULL,
  `CLSI_ORDER` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `BacAntxP`
--

CREATE TABLE `BacAntxP` (
  `idFam` tinyint NOT NULL,
  `idAnt` smallint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `BacColoracion`
--

CREATE TABLE `BacColoracion` (
  `ID` tinyint NOT NULL,
  `Descrip` varchar(27) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `BacExamen`
--

CREATE TABLE `BacExamen` (
  `ID` varchar(0) DEFAULT NULL,
  `Descrip` varchar(0) DEFAULT NULL,
  `Activo` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `BacFMOrg`
--

CREATE TABLE `BacFMOrg` (
  `ID` tinyint NOT NULL,
  `Codigo` varchar(0) DEFAULT NULL,
  `Descrip` varchar(28) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `BacFuente`
--

CREATE TABLE `BacFuente` (
  `ID` smallint NOT NULL,
  `Descrip` varchar(44) DEFAULT NULL,
  `Activo` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `BacGram`
--

CREATE TABLE `BacGram` (
  `ID` smallint NOT NULL,
  `idBCol` tinyint DEFAULT NULL,
  `Descrip` varchar(96) DEFAULT NULL,
  `Activo` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `BacMicro`
--

CREATE TABLE `BacMicro` (
  `ID` tinyint DEFAULT NULL,
  `Codigo` tinyint DEFAULT NULL,
  `Descrip` varchar(31) DEFAULT NULL,
  `Grupo` varchar(14) DEFAULT NULL,
  `Activo` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `BacMicroOrganismos`
--

CREATE TABLE `BacMicroOrganismos` (
  `ID` smallint NOT NULL,
  `Codigo` varchar(4) DEFAULT NULL,
  `idFamilia` tinyint DEFAULT NULL,
  `Descrip` varchar(50) DEFAULT NULL,
  `Activo` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `BacMicxP`
--

CREATE TABLE `BacMicxP` (
  `idFam` tinyint DEFAULT NULL,
  `idMic` smallint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `BacMOrgxAnt`
--

CREATE TABLE `BacMOrgxAnt` (
  `idBac` mediumint NOT NULL,
  `idMOrg` smallint NOT NULL,
  `Metodo` varchar(1) DEFAULT NULL,
  `Blee` varchar(1) DEFAULT NULL,
  `Porc` decimal(3,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `BacMuestra`
--

CREATE TABLE `BacMuestra` (
  `ID` smallint NOT NULL,
  `Descrip` varchar(35) DEFAULT NULL,
  `Activo` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `BacPCorte`
--

CREATE TABLE `BacPCorte` (
  `ID` smallint NOT NULL,
  `idAnt` smallint DEFAULT NULL,
  `idMOrg` tinyint DEFAULT NULL,
  `Metodo` varchar(1) DEFAULT NULL,
  `PCorteR` varchar(4) DEFAULT NULL,
  `PCorteI` varchar(5) DEFAULT NULL,
  `PCorteS` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `BacRColor`
--

CREATE TABLE `BacRColor` (
  `idBac` mediumint NOT NULL,
  `idColor` tinyint NOT NULL,
  `Item` tinyint NOT NULL,
  `Descrip` varchar(50) DEFAULT NULL,
  `Cant` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `BacReporte`
--

CREATE TABLE `BacReporte` (
  `ID` smallint NOT NULL,
  `Descrip` varchar(37) DEFAULT NULL,
  `Reporte` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Bacteriologia`
--

CREATE TABLE `Bacteriologia` (
  `ID` mediumint NOT NULL,
  `idMuestra` bigint DEFAULT NULL,
  `idExamen` smallint DEFAULT NULL,
  `idExaInt` tinyint DEFAULT NULL,
  `idEquipo` tinyint DEFAULT NULL,
  `idBMue` smallint DEFAULT NULL,
  `idBFue` smallint DEFAULT NULL,
  `Colonias` varchar(36) DEFAULT NULL,
  `Resultado` text,
  `idCol1` tinyint DEFAULT NULL,
  `Color1` varchar(0) DEFAULT NULL,
  `idCol2` tinyint DEFAULT NULL,
  `Color2` varchar(0) DEFAULT NULL,
  `idMicro1` smallint DEFAULT NULL,
  `idMicro2` smallint DEFAULT NULL,
  `idMicro3` smallint DEFAULT NULL,
  `idMicro4` tinyint DEFAULT NULL,
  `idMicro5` tinyint DEFAULT NULL,
  `Micro1` varchar(50) DEFAULT NULL,
  `Micro2` varchar(41) DEFAULT NULL,
  `Micro3` varchar(28) DEFAULT NULL,
  `Micro4` varchar(0) DEFAULT NULL,
  `Micro5` varchar(0) DEFAULT NULL,
  `Met1` varchar(1) DEFAULT NULL,
  `Met2` varchar(1) DEFAULT NULL,
  `Met3` varchar(1) DEFAULT NULL,
  `Met4` varchar(0) DEFAULT NULL,
  `Met5` varchar(0) DEFAULT NULL,
  `Blee1` varchar(1) DEFAULT NULL,
  `Blee2` varchar(1) DEFAULT NULL,
  `Blee3` varchar(1) DEFAULT NULL,
  `Blee4` varchar(1) DEFAULT NULL,
  `Blee5` varchar(1) DEFAULT NULL,
  `Porc1` tinyint DEFAULT NULL,
  `Porc2` tinyint DEFAULT NULL,
  `Porc3` tinyint DEFAULT NULL,
  `Porc4` tinyint DEFAULT NULL,
  `Porc5` tinyint DEFAULT NULL,
  `Observ` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Bancos`
--

CREATE TABLE `Bancos` (
  `ID` tinyint NOT NULL,
  `CodExt` varchar(4) DEFAULT NULL,
  `Descrip` varchar(34) DEFAULT NULL,
  `Activo` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `collection_data`
--

CREATE TABLE `collection_data` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `informe` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` bigint UNSIGNED NOT NULL,
  `factura` int NOT NULL,
  `fecha_compra` int NOT NULL,
  `precio_unitario` decimal(8,2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `id_proveedor` bigint UNSIGNED NOT NULL,
  `id_reactivo` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Conclusiones`
--

CREATE TABLE `Conclusiones` (
  `ID` tinyint NOT NULL,
  `Descrip` varchar(30) DEFAULT NULL,
  `Memo` varchar(237) DEFAULT NULL,
  `DIConc` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Configuracion`
--

CREATE TABLE `Configuracion` (
  `ID` tinyint DEFAULT NULL,
  `DigitosMue` tinyint DEFAULT NULL,
  `LetrasServExt` varchar(4) DEFAULT NULL,
  `LetrasConv` varchar(4) DEFAULT NULL,
  `CompaniaExt` varchar(1) DEFAULT NULL,
  `Contribuyente` varchar(1) DEFAULT NULL,
  `IngxInterfase` varchar(1) DEFAULT NULL,
  `EnvPreOrden` varchar(1) DEFAULT NULL,
  `EnvFactura` varchar(1) DEFAULT NULL,
  `EnvPago` varchar(1) DEFAULT NULL,
  `EnvNCredito` varchar(1) DEFAULT NULL,
  `EnvNDebito` varchar(1) DEFAULT NULL,
  `EnvResultado` varchar(1) DEFAULT NULL,
  `EnvPaciente` varchar(1) DEFAULT NULL,
  `EnvAnuPreorden` varchar(1) DEFAULT NULL,
  `MostrarAlarma` varchar(1) DEFAULT NULL,
  `IPServSMTP` varchar(8) DEFAULT NULL,
  `UserServSMTP` varchar(21) DEFAULT NULL,
  `DigitosClave` tinyint DEFAULT NULL,
  `IPInfoKey` varchar(0) DEFAULT NULL,
  `Historico` varchar(1) DEFAULT NULL,
  `FecRecMon` varchar(19) DEFAULT NULL,
  `NTxDias` tinyint DEFAULT NULL,
  `PassServSMTP` mediumint DEFAULT NULL,
  `PortServSMTP` tinyint DEFAULT NULL,
  `lFact` tinyint DEFAULT NULL,
  `Contingencia` varchar(1) DEFAULT NULL,
  `EnvXmlPac` varchar(1) DEFAULT NULL,
  `EnvXmlRes` varchar(1) DEFAULT NULL,
  `EnvXmlPOrd` varchar(1) DEFAULT NULL,
  `EnvXmlFac` varchar(1) DEFAULT NULL,
  `EnvXmlPag` varchar(1) DEFAULT NULL,
  `EnvXmlNCr` varchar(1) DEFAULT NULL,
  `EnvXmlNDe` varchar(1) DEFAULT NULL,
  `EnvXmlConv` varchar(1) DEFAULT NULL,
  `EnvXmlSConv` varchar(1) DEFAULT NULL,
  `BloqImp` tinyint DEFAULT NULL,
  `MensBloqImp` varchar(52) DEFAULT NULL,
  `EnvOrdIM` varchar(1) DEFAULT NULL,
  `ImpFacExo` varchar(1) DEFAULT NULL,
  `IPServPOP` varchar(0) DEFAULT NULL,
  `UserServPOP` varchar(0) DEFAULT NULL,
  `PassServPOP` varchar(0) DEFAULT NULL,
  `PortServPOP` tinyint DEFAULT NULL,
  `TipAutSMTP` tinyint DEFAULT NULL,
  `ForPDF` tinyint DEFAULT NULL,
  `BloqIng` varchar(1) DEFAULT NULL,
  `MueInicial` tinyint DEFAULT NULL,
  `TipUbicacion` varchar(1) DEFAULT NULL,
  `ValIngCli` varchar(1) DEFAULT NULL,
  `PorcTMue` decimal(5,4) DEFAULT NULL,
  `EliminarTRes` varchar(1) DEFAULT NULL,
  `ImpDeuda` varchar(1) DEFAULT NULL,
  `ImpCaratula` varchar(1) DEFAULT NULL,
  `ImpTMuestra` varchar(1) DEFAULT NULL,
  `VI` varchar(1) DEFAULT NULL,
  `MEmb` varchar(1) DEFAULT NULL,
  `MDisc` varchar(1) DEFAULT NULL,
  `M3Edad` varchar(1) DEFAULT NULL,
  `BarCode` varchar(1) DEFAULT NULL,
  `Sucursales` varchar(1) DEFAULT NULL,
  `CCorreo` varchar(0) DEFAULT NULL,
  `ImpEdad` varchar(1) DEFAULT NULL,
  `PDCorreo` varchar(0) DEFAULT NULL,
  `MMetodo` varchar(1) DEFAULT NULL,
  `lPOrd` tinyint DEFAULT NULL,
  `EnvPDFRes` varchar(1) DEFAULT NULL,
  `PiePagRef` varchar(0) DEFAULT NULL,
  `FecActCost` varchar(19) DEFAULT NULL,
  `FecActDWHOrd` varchar(19) DEFAULT NULL,
  `URLServSMS` varchar(63) DEFAULT NULL,
  `PassServSMS` varchar(0) DEFAULT NULL,
  `SendSMS` varchar(1) DEFAULT NULL,
  `UserServSMS` varchar(0) DEFAULT NULL,
  `xStringSMS` varchar(0) DEFAULT NULL,
  `ImpResultado` varchar(2) DEFAULT NULL,
  `ImpFactura` varchar(2) DEFAULT NULL,
  `ImpPreOrden` varchar(2) DEFAULT NULL,
  `ImpNCredito` varchar(2) DEFAULT NULL,
  `ImpPresupuesto` varchar(2) DEFAULT NULL,
  `ImpPago` varchar(2) DEFAULT NULL,
  `ImpRepFactura` varchar(2) DEFAULT NULL,
  `ImpEstadistica` varchar(2) DEFAULT NULL,
  `EnvStatus` varchar(1) DEFAULT NULL,
  `TipStatus` varchar(0) DEFAULT NULL,
  `BarCodeRes` varchar(1) DEFAULT NULL,
  `BarCodeText` varchar(0) DEFAULT NULL,
  `MVRefOri` varchar(1) DEFAULT NULL,
  `BloqPrec` varchar(1) DEFAULT NULL,
  `PiePagPre` varchar(0) DEFAULT NULL,
  `PiePagFA` varchar(0) DEFAULT NULL,
  `PiePagFC` varchar(0) DEFAULT NULL,
  `FecActAlarm` varchar(19) DEFAULT NULL,
  `FecActRM` varchar(19) DEFAULT NULL,
  `SepMil` varchar(1) DEFAULT NULL,
  `SepDec` varchar(1) DEFAULT NULL,
  `SimMon` varchar(2) DEFAULT NULL,
  `AutSSLSMTP` varchar(1) DEFAULT NULL,
  `MFEFact` varchar(1) DEFAULT NULL,
  `PassPDFxMail` varchar(1) DEFAULT NULL,
  `TipPassPDFxMail` varchar(1) DEFAULT NULL,
  `ImpTMuestra2` varchar(1) DEFAULT NULL,
  `CodigoQR` varchar(1) DEFAULT NULL,
  `UploadWeb` varchar(1) DEFAULT NULL,
  `EnvURLSMS` varchar(1) DEFAULT NULL,
  `ServFTPCodQR` varchar(0) DEFAULT NULL,
  `DirFTPPDFWeb` varchar(0) DEFAULT NULL,
  `URLWebCodQR` varchar(0) DEFAULT NULL,
  `URLConCodQR` varchar(0) DEFAULT NULL,
  `UserURLCodQR` varchar(0) DEFAULT NULL,
  `PassURLCodQR` varchar(0) DEFAULT NULL,
  `TipCarWeb` varchar(1) DEFAULT NULL,
  `TipHosting` varchar(1) DEFAULT NULL,
  `DirFTPXMLWeb` varchar(0) DEFAULT NULL,
  `ServSincBD` varchar(0) DEFAULT NULL,
  `ValAutSuc` varchar(1) DEFAULT NULL,
  `SincronizarBD` varchar(0) DEFAULT NULL,
  `CampOblig` varchar(0) DEFAULT NULL,
  `EnvPDFResParc` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Convenios`
--

CREATE TABLE `Convenios` (
  `ID` smallint NOT NULL,
  `CodExt` varchar(3) DEFAULT NULL,
  `LetExt` varchar(3) DEFAULT NULL,
  `Descrip` varchar(71) DEFAULT NULL,
  `Abrev` varchar(19) DEFAULT NULL,
  `Juridica` varchar(1) DEFAULT NULL,
  `Dir1` varchar(78) DEFAULT NULL,
  `Dir2` varchar(68) DEFAULT NULL,
  `Rif` varchar(12) DEFAULT NULL,
  `Nit` varchar(10) DEFAULT NULL,
  `Telefono` varchar(37) DEFAULT NULL,
  `Contacto` varchar(24) DEFAULT NULL,
  `Fax` varchar(11) DEFAULT NULL,
  `eMail` varchar(33) DEFAULT NULL,
  `SubConv` varchar(1) DEFAULT NULL,
  `idLPrecio` tinyint DEFAULT NULL,
  `TipoPrecio` varchar(13) DEFAULT NULL,
  `DR` tinyint DEFAULT NULL,
  `Porc` decimal(5,2) DEFAULT NULL,
  `CargaInt` varchar(1) DEFAULT NULL,
  `ImpResult` varchar(1) DEFAULT NULL,
  `Credito` varchar(1) DEFAULT NULL,
  `Activo` varchar(1) DEFAULT NULL,
  `Stat` varchar(1) DEFAULT NULL,
  `CredDias` smallint DEFAULT NULL,
  `TipDoc` varchar(1) DEFAULT NULL,
  `ImpDoc` varchar(1) DEFAULT NULL,
  `CopiaRes` tinyint DEFAULT NULL,
  `Sqlts` bigint DEFAULT NULL,
  `SegIntegral` varchar(1) DEFAULT NULL,
  `LabRef` varchar(1) DEFAULT NULL,
  `DescLabRef` varchar(181) DEFAULT NULL,
  `Descrip2` varchar(71) DEFAULT NULL,
  `ForFactura` varchar(0) DEFAULT NULL,
  `Confidencial` varchar(1) DEFAULT NULL,
  `Validacion` varchar(1) DEFAULT NULL,
  `ExConvenio` varchar(1) DEFAULT NULL,
  `Observacion` varchar(33) DEFAULT NULL,
  `ClavIngreso` varchar(1) DEFAULT NULL,
  `ApliPorc` varchar(1) DEFAULT NULL,
  `idGxConv` tinyint DEFAULT NULL,
  `CopiaDoc` tinyint DEFAULT NULL,
  `eMailAdm` varchar(33) DEFAULT NULL,
  `BloqIngPac` varchar(1) DEFAULT NULL,
  `BloqImpRes` varchar(1) DEFAULT NULL,
  `HeaderRes` varchar(0) DEFAULT NULL,
  `UsuarioWeb` varchar(10) DEFAULT NULL,
  `ClaveWeb` varchar(28) DEFAULT NULL,
  `StatusWeb` varchar(1) DEFAULT NULL,
  `CorreoWeb` varchar(0) DEFAULT NULL,
  `PregWeb1` varchar(0) DEFAULT NULL,
  `RespWeb1` varchar(0) DEFAULT NULL,
  `PregWeb2` varchar(0) DEFAULT NULL,
  `RespWeb2` varchar(0) DEFAULT NULL,
  `PregWeb3` varchar(0) DEFAULT NULL,
  `RespWeb3` varchar(0) DEFAULT NULL,
  `idLab` tinyint DEFAULT NULL,
  `Celular` varchar(0) DEFAULT NULL,
  `idMoneda` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Cuantitativo`
--

CREATE TABLE `Cuantitativo` (
  `idMuestra` bigint NOT NULL,
  `idExamen` smallint NOT NULL,
  `ForReporte` varchar(1) DEFAULT NULL,
  `Resultado` varchar(9) DEFAULT NULL,
  `ResultString` varchar(25) DEFAULT NULL,
  `Corrida1` varchar(10) DEFAULT NULL,
  `Corrida2` varchar(9) DEFAULT NULL,
  `idMetodoR` smallint DEFAULT NULL,
  `idMetodo1` smallint DEFAULT NULL,
  `idMetodo2` smallint DEFAULT NULL,
  `Verificado` varchar(1) DEFAULT NULL,
  `xDiluir` varchar(1) DEFAULT NULL,
  `Dilucion` decimal(2,1) DEFAULT NULL,
  `Observaciones` text,
  `idConclusion` tinyint DEFAULT NULL,
  `FHResult` varchar(22) DEFAULT NULL,
  `CS` varchar(5) DEFAULT NULL,
  `MGrafico` varchar(1) DEFAULT NULL,
  `AlarmCua` varchar(1) DEFAULT NULL,
  `idVRefer` smallint DEFAULT NULL,
  `idUnidadR` smallint NOT NULL,
  `idUnidad1` smallint DEFAULT NULL,
  `idUnidad2` smallint DEFAULT NULL,
  `Referido` varchar(1) DEFAULT NULL,
  `ValMin` decimal(5,2) DEFAULT NULL,
  `ValMax` decimal(6,2) DEFAULT NULL,
  `ValEspecial` text,
  `Interpretar` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documents`
--

CREATE TABLE `documents` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre_archivo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_archivo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tamano_archivo` bigint UNSIGNED NOT NULL,
  `ruta_archivo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DWHOrdenes`
--

CREATE TABLE `DWHOrdenes` (
  `idMuestra` varchar(0) DEFAULT NULL,
  `idExamen` varchar(0) DEFAULT NULL,
  `idExaInt` varchar(0) DEFAULT NULL,
  `idCodigo` varchar(0) DEFAULT NULL,
  `DEntrega` varchar(0) DEFAULT NULL,
  `dtIngreso` varchar(0) DEFAULT NULL,
  `idUsuIng` varchar(0) DEFAULT NULL,
  `dtTomado` varchar(0) DEFAULT NULL,
  `idUsuTom` varchar(0) DEFAULT NULL,
  `dtProcesando` varchar(0) DEFAULT NULL,
  `idUsuPro` varchar(0) DEFAULT NULL,
  `dtxAutorizar` varchar(0) DEFAULT NULL,
  `idUsuxAu` varchar(0) DEFAULT NULL,
  `dtCompleto` varchar(0) DEFAULT NULL,
  `idUsuCom` varchar(0) DEFAULT NULL,
  `dtReportado` varchar(0) DEFAULT NULL,
  `idUsuRep` varchar(0) DEFAULT NULL,
  `dtRepxMail` varchar(0) DEFAULT NULL,
  `idUsuRxM` varchar(0) DEFAULT NULL,
  `StVReferencia` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Entrega`
--

CREATE TABLE `Entrega` (
  `ID` mediumint NOT NULL,
  `Fecha` varchar(19) DEFAULT NULL,
  `Entregado` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Equipos`
--

CREATE TABLE `Equipos` (
  `ID` tinyint NOT NULL,
  `Descrip` varchar(18) DEFAULT NULL,
  `idInterfase` smallint DEFAULT NULL,
  `idMetodo` smallint DEFAULT NULL,
  `idSeccion` tinyint DEFAULT NULL,
  `Activo` varchar(1) DEFAULT NULL,
  `Enviar` varchar(1) DEFAULT NULL,
  `Automatico` varchar(1) DEFAULT NULL,
  `Intervalo` tinyint DEFAULT NULL,
  `ComPort` varchar(4) DEFAULT NULL,
  `BaudRate` smallint DEFAULT NULL,
  `ByteSize` tinyint DEFAULT NULL,
  `Parity` varchar(4) DEFAULT NULL,
  `StopBit` varchar(3) DEFAULT NULL,
  `StreamProtocol` varchar(8) DEFAULT NULL,
  `EliProc` varchar(1) DEFAULT NULL,
  `CodExt` varchar(0) DEFAULT NULL,
  `Conexion` varchar(1) DEFAULT NULL,
  `IP` varchar(12) DEFAULT NULL,
  `Port` smallint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equiposP`
--

CREATE TABLE `equiposP` (
  `id` bigint UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `t_equipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modelo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adquisicion` date NOT NULL,
  `precio_adquisicion` decimal(8,2) NOT NULL,
  `vida_util` int NOT NULL,
  `ubicacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsable` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `ID` tinyint NOT NULL,
  `Descrip` varchar(23) DEFAULT NULL,
  `CodExt` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `EtiBacterio`
--

CREATE TABLE `EtiBacterio` (
  `idMBac` varchar(0) DEFAULT NULL,
  `idMuestra` varchar(0) DEFAULT NULL,
  `idExamen` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `EtiReferencia`
--

CREATE TABLE `EtiReferencia` (
  `idLab` varchar(0) DEFAULT NULL,
  `idERef` varchar(0) DEFAULT NULL,
  `idMuestra` varchar(0) DEFAULT NULL,
  `idExamen` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Examenes`
--

CREATE TABLE `Examenes` (
  `ID` smallint NOT NULL,
  `Codigo` mediumint DEFAULT NULL,
  `CodEst` mediumint DEFAULT NULL,
  `CodExt` varchar(1) DEFAULT NULL,
  `Descrip` varchar(38) DEFAULT NULL,
  `Reporte` varchar(38) DEFAULT NULL,
  `Etiqueta` varchar(15) DEFAULT NULL,
  `Oculto` varchar(1) DEFAULT NULL,
  `Activo` varchar(1) DEFAULT NULL,
  `idSeccion` tinyint DEFAULT NULL,
  `idMetodo` smallint DEFAULT NULL,
  `Unidades` varchar(15) DEFAULT NULL,
  `DefExamen` varchar(1) DEFAULT NULL,
  `Referencia` varchar(1) DEFAULT NULL,
  `ForReporte` varchar(1) DEFAULT NULL,
  `idRelacion` tinyint DEFAULT NULL,
  `Fluido` varchar(1) DEFAULT NULL,
  `Alarma` varchar(1) DEFAULT NULL,
  `DescAlarma` varchar(142) DEFAULT NULL,
  `Formula` varchar(47) DEFAULT NULL,
  `Decimales` tinyint DEFAULT NULL,
  `ValRefer` varchar(1) DEFAULT NULL,
  `Combobox` varchar(131) DEFAULT NULL,
  `Campo` varchar(8) DEFAULT NULL,
  `Conclusion` varchar(1) DEFAULT NULL,
  `PiePagina` varchar(1) DEFAULT NULL,
  `PiePagText` text,
  `Leyenda` varchar(1) DEFAULT NULL,
  `ValBajo` tinyint DEFAULT NULL,
  `ValAlto` tinyint DEFAULT NULL,
  `CodBarra` varchar(1) DEFAULT NULL,
  `InfoTubo` varchar(10) DEFAULT NULL,
  `CantLabel` tinyint DEFAULT NULL,
  `Canal` tinyint DEFAULT NULL,
  `Recargo` varchar(1) DEFAULT NULL,
  `Dias` tinyint DEFAULT NULL,
  `idUsuario` smallint DEFAULT NULL,
  `SqlTs` bigint DEFAULT NULL,
  `Reconversion` varchar(1) DEFAULT NULL,
  `ValCero` varchar(1) DEFAULT NULL,
  `Sexo` varchar(1) DEFAULT NULL,
  `RTMuestra` varchar(1) DEFAULT NULL,
  `MFac` varchar(1) DEFAULT NULL,
  `MLPr` varchar(1) DEFAULT NULL,
  `MEst` varchar(1) DEFAULT NULL,
  `Observacion` varchar(12) DEFAULT NULL,
  `Graficar` varchar(1) DEFAULT NULL,
  `EMExamen` varchar(1) DEFAULT NULL,
  `TMEspecial` varchar(1) DEFAULT NULL,
  `DescTMEsp` varchar(0) DEFAULT NULL,
  `PManual` varchar(1) DEFAULT NULL,
  `PDinamico` varchar(1) DEFAULT NULL,
  `DIPPag` varchar(1) DEFAULT NULL,
  `idUnidad` smallint DEFAULT NULL,
  `PiePaginaText` varchar(0) DEFAULT NULL,
  `iLeft` decimal(2,1) DEFAULT NULL,
  `iWidth` decimal(2,1) DEFAULT NULL,
  `iHeigth` decimal(2,1) DEFAULT NULL,
  `ciExa` varchar(0) DEFAULT NULL,
  `ReporteIng` varchar(0) DEFAULT NULL,
  `PiePagTextIng` varchar(0) DEFAULT NULL,
  `ComboboxIng` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ExAnalizador`
--

CREATE TABLE `ExAnalizador` (
  `ID` smallint NOT NULL,
  `idInterfase` smallint DEFAULT NULL,
  `idHost` varchar(25) DEFAULT NULL,
  `idCanal` varchar(5) DEFAULT NULL,
  `Test` varchar(15) DEFAULT NULL,
  `Descrip` varchar(43) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ExConclusion`
--

CREATE TABLE `ExConclusion` (
  `ID` tinyint NOT NULL,
  `idConclusion` tinyint DEFAULT NULL,
  `idExamen` smallint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ExConvenio`
--

CREATE TABLE `ExConvenio` (
  `idConvenio` varchar(0) DEFAULT NULL,
  `idExamen` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ExFAnulada`
--

CREATE TABLE `ExFAnulada` (
  `idFactura` mediumint NOT NULL,
  `idMuestra` bigint NOT NULL,
  `idExamen` smallint NOT NULL,
  `idCodigo` mediumint DEFAULT NULL,
  `idReferencia` smallint DEFAULT NULL,
  `Precio` decimal(5,2) DEFAULT NULL,
  `PrecioOld` decimal(13,4) DEFAULT NULL,
  `Reconversion` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ExLEstadistica`
--

CREATE TABLE `ExLEstadistica` (
  `idLEst` varchar(0) DEFAULT NULL,
  `idExamen` varchar(0) DEFAULT NULL,
  `Activo` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ExLPrecio`
--

CREATE TABLE `ExLPrecio` (
  `ID` mediumint DEFAULT NULL,
  `idLPrecio` tinyint NOT NULL,
  `idExamen` smallint NOT NULL,
  `Precio` decimal(10,4) DEFAULT NULL,
  `Aumento` decimal(5,4) DEFAULT NULL,
  `Reconversion` varchar(1) DEFAULT NULL,
  `DRPerf` decimal(5,4) DEFAULT NULL,
  `PorcPerf` decimal(5,4) DEFAULT NULL,
  `CAPerf` varchar(1) DEFAULT NULL,
  `RedoPerf` varchar(1) DEFAULT NULL,
  `PrecioOld` decimal(13,4) DEFAULT NULL,
  `idMoneda` tinyint DEFAULT NULL,
  `Costo` decimal(7,4) DEFAULT NULL,
  `PorcUtil` decimal(5,4) DEFAULT NULL,
  `SqlTs` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ExLPrecioOld`
--

CREATE TABLE `ExLPrecioOld` (
  `idLPrecio` tinyint DEFAULT NULL,
  `idExamen` smallint DEFAULT NULL,
  `Precio` decimal(13,4) DEFAULT NULL,
  `Aumento` decimal(5,4) DEFAULT NULL,
  `Reconversion` varchar(1) DEFAULT NULL,
  `DRPerf` tinyint DEFAULT NULL,
  `PorcPerf` decimal(5,4) DEFAULT NULL,
  `CAPerf` varchar(1) DEFAULT NULL,
  `RedoPerf` varchar(1) DEFAULT NULL,
  `PrecioOld` decimal(12,4) DEFAULT NULL,
  `idMoneda` tinyint DEFAULT NULL,
  `Costo` decimal(5,4) DEFAULT NULL,
  `PorcUtil` decimal(5,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ExLTrabajo`
--

CREATE TABLE `ExLTrabajo` (
  `ID` mediumint NOT NULL,
  `idLTrabajo` smallint DEFAULT NULL,
  `idExamen` smallint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ExMultiple`
--

CREATE TABLE `ExMultiple` (
  `ID` smallint DEFAULT NULL,
  `idMultiple` smallint NOT NULL,
  `idExamen` smallint NOT NULL,
  `Orden` tinyint DEFAULT NULL,
  `SqlTs` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ExMultipleOld`
--

CREATE TABLE `ExMultipleOld` (
  `idMultiple` smallint DEFAULT NULL,
  `idExamen` smallint DEFAULT NULL,
  `Orden` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ExPerfil`
--

CREATE TABLE `ExPerfil` (
  `ID` smallint DEFAULT NULL,
  `idPerfil` smallint NOT NULL,
  `idExamen` smallint NOT NULL,
  `SqlTs` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ExPerfilOld`
--

CREATE TABLE `ExPerfilOld` (
  `idPerfil` smallint DEFAULT NULL,
  `idExamen` smallint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ExPresupuesto`
--

CREATE TABLE `ExPresupuesto` (
  `idPre` mediumint NOT NULL,
  `idExamen` smallint NOT NULL,
  `idCodigo` mediumint DEFAULT NULL,
  `idExaInt` smallint DEFAULT NULL,
  `idSeccion` tinyint DEFAULT NULL,
  `Precio` decimal(10,4) DEFAULT NULL,
  `DefExamen` varchar(1) DEFAULT NULL,
  `idReferencia` smallint DEFAULT NULL,
  `MOrd` varchar(1) DEFAULT NULL,
  `PrecioOld` decimal(15,4) DEFAULT NULL,
  `Reconversion` varchar(1) DEFAULT NULL,
  `Precio2` decimal(5,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Exreferencia`
--

CREATE TABLE `Exreferencia` (
  `idReferencia` smallint NOT NULL,
  `idExamen` smallint NOT NULL,
  `Precio` decimal(7,4) DEFAULT NULL,
  `Dias` tinyint DEFAULT NULL,
  `Preferencia` varchar(1) DEFAULT NULL,
  `Reconversion` varchar(1) DEFAULT NULL,
  `PrecioOld` decimal(11,4) DEFAULT NULL,
  `CodExt` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Facturas`
--

CREATE TABLE `Facturas` (
  `ID` mediumint NOT NULL,
  `idMuestra` varchar(12) DEFAULT NULL,
  `idConvenio` smallint DEFAULT NULL,
  `idSConvenio` smallint DEFAULT NULL,
  `idUbicacion` tinyint DEFAULT NULL,
  `TipFactura` varchar(1) DEFAULT NULL,
  `Fecha` varchar(19) DEFAULT NULL,
  `Status` varchar(1) DEFAULT NULL,
  `ciResponsable` varchar(15) DEFAULT NULL,
  `NitResponsable` varchar(15) DEFAULT NULL,
  `nmResponsable` varchar(95) DEFAULT NULL,
  `DirResponsable` varchar(71) DEFAULT NULL,
  `Credito` varchar(1) DEFAULT NULL,
  `Porcentaje` decimal(6,4) DEFAULT NULL,
  `DR` tinyint DEFAULT NULL,
  `Monto` decimal(10,4) DEFAULT NULL,
  `Saldo` decimal(10,4) DEFAULT NULL,
  `idUsuario` smallint DEFAULT NULL,
  `Recargo` decimal(6,4) DEFAULT NULL,
  `Descuento` decimal(5,4) DEFAULT NULL,
  `MontoOld` decimal(15,4) DEFAULT NULL,
  `Reconversion` varchar(1) DEFAULT NULL,
  `TelResponsable` varchar(21) DEFAULT NULL,
  `idPago` tinyint DEFAULT NULL,
  `Llave` varchar(5) DEFAULT NULL,
  `Observ` varchar(139) DEFAULT NULL,
  `SaldoOld` decimal(15,4) DEFAULT NULL,
  `NControl` varchar(11) DEFAULT NULL,
  `NSerie` varchar(3) NOT NULL,
  `Monto2` decimal(6,4) DEFAULT NULL,
  `TCambio` decimal(6,4) DEFAULT NULL,
  `Saldo2` decimal(5,4) DEFAULT NULL,
  `IGTF` decimal(7,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Firmas`
--

CREATE TABLE `Firmas` (
  `idUsuario` smallint NOT NULL,
  `Firma` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Formas`
--

CREATE TABLE `Formas` (
  `ID` tinyint NOT NULL,
  `Descrip` varchar(16) DEFAULT NULL,
  `nmReporte` varchar(21) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ForPago`
--

CREATE TABLE `ForPago` (
  `ID` tinyint NOT NULL,
  `Codigo` varchar(4) DEFAULT NULL,
  `CodExt` varchar(2) DEFAULT NULL,
  `Descrip` varchar(21) DEFAULT NULL,
  `TipPago` varchar(1) DEFAULT NULL,
  `RBanco` varchar(1) DEFAULT NULL,
  `RPVenta` varchar(1) DEFAULT NULL,
  `Activa` varchar(1) DEFAULT NULL,
  `idMoneda` tinyint DEFAULT NULL,
  `Orden` tinyint DEFAULT NULL,
  `DescFact` varchar(21) DEFAULT NULL,
  `PorcImp` decimal(5,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `General`
--

CREATE TABLE `General` (
  `idMuestra` bigint NOT NULL,
  `idExamen` smallint NOT NULL,
  `idExaInt` smallint NOT NULL,
  `Resultado` text,
  `idUnidad` smallint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `GExPaciente`
--

CREATE TABLE `GExPaciente` (
  `idPaciente` varchar(0) DEFAULT NULL,
  `idExamen` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `GxConvenio`
--

CREATE TABLE `GxConvenio` (
  `ID` varchar(0) DEFAULT NULL,
  `Codigo` varchar(0) DEFAULT NULL,
  `Descrip` varchar(0) DEFAULT NULL,
  `Activo` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Heces`
--

CREATE TABLE `Heces` (
  `idMuestra` bigint NOT NULL,
  `idExamen` smallint NOT NULL,
  `Color` varchar(13) DEFAULT NULL,
  `Consistencia` varchar(18) DEFAULT NULL,
  `Aspecto` varchar(11) DEFAULT NULL,
  `Moco` varchar(13) DEFAULT NULL,
  `pH` decimal(2,1) DEFAULT NULL,
  `Reaccion` varchar(8) DEFAULT NULL,
  `SangreO` varchar(20) DEFAULT NULL,
  `Sangre` varchar(17) DEFAULT NULL,
  `Hematies` varchar(20) DEFAULT NULL,
  `Leucocitos` varchar(20) DEFAULT NULL,
  `RestosA` varchar(18) DEFAULT NULL,
  `Parasitos` varchar(220) DEFAULT NULL,
  `ImpKato` varchar(1) DEFAULT NULL,
  `Kato` varchar(0) DEFAULT NULL,
  `Observaciones` varchar(181) DEFAULT NULL,
  `ObsAut` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Hematologia`
--

CREATE TABLE `Hematologia` (
  `idMuestra` bigint NOT NULL,
  `idExamen` smallint NOT NULL,
  `idEquipo` tinyint DEFAULT NULL,
  `idMetodo` smallint DEFAULT NULL,
  `RepDif` varchar(1) DEFAULT NULL,
  `WBC` decimal(7,4) DEFAULT NULL,
  `RBC` decimal(6,4) DEFAULT NULL,
  `HGB` decimal(4,2) DEFAULT NULL,
  `HCT` decimal(7,3) DEFAULT NULL,
  `RET` decimal(5,2) DEFAULT NULL,
  `PLT` decimal(5,1) DEFAULT NULL,
  `MPV` decimal(5,3) DEFAULT NULL,
  `VCM` decimal(19,14) DEFAULT NULL,
  `HCM` decimal(18,15) DEFAULT NULL,
  `CHCM` decimal(18,15) DEFAULT NULL,
  `RDW` decimal(9,6) DEFAULT NULL,
  `Neutro` decimal(4,1) DEFAULT NULL,
  `Linfo` decimal(4,1) DEFAULT NULL,
  `Mono` decimal(3,1) DEFAULT NULL,
  `Eosi` decimal(3,1) DEFAULT NULL,
  `Baso` decimal(3,1) DEFAULT NULL,
  `Caya` decimal(3,1) DEFAULT NULL,
  `Promie` decimal(3,1) DEFAULT NULL,
  `Mielo` decimal(3,1) DEFAULT NULL,
  `Meta` decimal(2,1) DEFAULT NULL,
  `MonoAti` decimal(3,1) DEFAULT NULL,
  `LinfoAti` decimal(2,1) DEFAULT NULL,
  `NEp` decimal(4,1) DEFAULT NULL,
  `LYp` decimal(5,2) DEFAULT NULL,
  `MOp` decimal(4,1) DEFAULT NULL,
  `EOp` decimal(4,1) DEFAULT NULL,
  `BAp` decimal(3,1) DEFAULT NULL,
  `MIp` decimal(2,1) DEFAULT NULL,
  `NEa` decimal(4,2) DEFAULT NULL,
  `LYa` decimal(5,2) DEFAULT NULL,
  `MOa` decimal(4,2) DEFAULT NULL,
  `EOa` decimal(4,2) DEFAULT NULL,
  `BAa` decimal(4,2) DEFAULT NULL,
  `MIa` decimal(2,1) DEFAULT NULL,
  `RBCNuc` decimal(3,1) DEFAULT NULL,
  `aWBC` varchar(17) DEFAULT NULL,
  `aRBC` varchar(10) DEFAULT NULL,
  `aPLT` varchar(19) DEFAULT NULL,
  `Observaciones` text,
  `SqlTs` varchar(17) DEFAULT NULL,
  `LUp` decimal(3,1) DEFAULT NULL,
  `LUa` decimal(4,2) DEFAULT NULL,
  `CS` varchar(5) DEFAULT NULL,
  `idInterface` smallint DEFAULT NULL,
  `GRp` decimal(2,1) DEFAULT NULL,
  `GRa` decimal(2,1) DEFAULT NULL,
  `MGrafico` varchar(78) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `HistPaciente`
--

CREATE TABLE `HistPaciente` (
  `ID` mediumint NOT NULL,
  `idPaciente` mediumint DEFAULT NULL,
  `Fecha` varchar(19) DEFAULT NULL,
  `Descrip` varchar(250) DEFAULT NULL,
  `idUsuario` smallint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Imagenes`
--

CREATE TABLE `Imagenes` (
  `idMuestra` smallint NOT NULL,
  `idExamen` varchar(0) DEFAULT NULL,
  `idExaInt` varchar(0) DEFAULT NULL,
  `Imagen` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Impresoras`
--

CREATE TABLE `Impresoras` (
  `ID` tinyint NOT NULL,
  `Descrip` varchar(19) DEFAULT NULL,
  `idForma` tinyint DEFAULT NULL,
  `Printer` varchar(14) DEFAULT NULL,
  `Cola` varchar(0) DEFAULT NULL,
  `idUbicacion` tinyint DEFAULT NULL,
  `CodSeccion` varchar(0) DEFAULT NULL,
  `xDefecto` varchar(1) DEFAULT NULL,
  `idConvenio` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Ingresos`
--

CREATE TABLE `Ingresos` (
  `ID` bigint NOT NULL,
  `idPaciente` mediumint DEFAULT NULL,
  `Fecha` varchar(19) DEFAULT NULL,
  `idConvenio` smallint DEFAULT NULL,
  `idSConvenio` smallint DEFAULT NULL,
  `EnvConv` varchar(1) DEFAULT NULL,
  `idUbicacion` tinyint DEFAULT NULL,
  `idMedico` smallint DEFAULT NULL,
  `nmMedico` varchar(30) DEFAULT NULL,
  `EnvMed` varchar(1) DEFAULT NULL,
  `Porcentaje` decimal(7,4) DEFAULT NULL,
  `Monto` decimal(10,4) DEFAULT NULL,
  `Credito` varchar(1) DEFAULT NULL,
  `Recargo` decimal(6,4) DEFAULT NULL,
  `Descuento` decimal(5,4) DEFAULT NULL,
  `DR` tinyint DEFAULT NULL,
  `Carga` varchar(1) DEFAULT NULL,
  `Historia` varchar(15) DEFAULT NULL,
  `Admision` varchar(0) DEFAULT NULL,
  `FecIngreso` varchar(19) DEFAULT NULL,
  `Habitacion` varchar(1) DEFAULT NULL,
  `Cama` varchar(2) DEFAULT NULL,
  `Piso` varchar(8) DEFAULT NULL,
  `Deuda` varchar(1) DEFAULT NULL,
  `Stat` varchar(1) DEFAULT NULL,
  `Status` varchar(1) DEFAULT NULL,
  `TipoPaciente` varchar(1) DEFAULT NULL,
  `idUsuario` smallint DEFAULT NULL,
  `Observ` varchar(50) DEFAULT NULL,
  `EnvPac` varchar(1) DEFAULT NULL,
  `Reconversion` varchar(1) DEFAULT NULL,
  `Clave` varchar(15) DEFAULT NULL,
  `TMStat` varchar(1) DEFAULT NULL,
  `idPrioridad` tinyint DEFAULT NULL,
  `idExterno` varchar(0) DEFAULT NULL,
  `Llave` varchar(6) DEFAULT NULL,
  `idSucursal` tinyint DEFAULT NULL,
  `Monto2` decimal(8,4) DEFAULT NULL,
  `TCambio` decimal(6,4) DEFAULT NULL,
  `idLabRef` tinyint DEFAULT NULL,
  `idMueRef` varchar(0) DEFAULT NULL,
  `IdiomaRes` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Interfases`
--

CREATE TABLE `Interfases` (
  `ID` smallint NOT NULL,
  `Descrip` varchar(28) DEFAULT NULL,
  `Imagen` varchar(22) DEFAULT NULL,
  `Exe` varchar(17) DEFAULT NULL,
  `idProtocolo` varchar(2) DEFAULT NULL,
  `Len` tinyint DEFAULT NULL,
  `Activo` varchar(1) DEFAULT NULL,
  `Com` varchar(4) DEFAULT NULL,
  `Baud` mediumint DEFAULT NULL,
  `Byte` tinyint DEFAULT NULL,
  `Parity` varchar(4) DEFAULT NULL,
  `Stop` varchar(3) DEFAULT NULL,
  `Stream` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Laboratorio`
--

CREATE TABLE `Laboratorio` (
  `ID` smallint NOT NULL,
  `Codigo` varchar(7) DEFAULT NULL,
  `Descrip` varchar(35) DEFAULT NULL,
  `Abrev` varchar(35) DEFAULT NULL,
  `Activo` varchar(1) DEFAULT NULL,
  `CS` varchar(5) DEFAULT NULL,
  `TipLab` varchar(2) DEFAULT NULL,
  `IP` varchar(0) DEFAULT NULL,
  `Port` varchar(0) DEFAULT NULL,
  `SincBD` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `LEstadistica`
--

CREATE TABLE `LEstadistica` (
  `ID` varchar(0) DEFAULT NULL,
  `Descrip` varchar(0) DEFAULT NULL,
  `Secciones` varchar(0) DEFAULT NULL,
  `DefExamen` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Licencia`
--

CREATE TABLE `Licencia` (
  `idCodigo` varchar(10) DEFAULT NULL,
  `Laboratorio` varchar(17) DEFAULT NULL,
  `Responsable` varchar(0) DEFAULT NULL,
  `Direc1` varchar(98) DEFAULT NULL,
  `Direc2` varchar(0) DEFAULT NULL,
  `Telefono` varchar(51) DEFAULT NULL,
  `Fax` varchar(12) DEFAULT NULL,
  `Rif` varchar(12) DEFAULT NULL,
  `eMail` varchar(0) DEFAULT NULL,
  `iLogo` varchar(8) DEFAULT NULL,
  `xString` varchar(96) DEFAULT NULL,
  `EliminarTRes` varchar(1) DEFAULT NULL,
  `tLic` varchar(1) DEFAULT NULL,
  `nLic` tinyint DEFAULT NULL,
  `ImpConDeuda` varchar(1) DEFAULT NULL,
  `ImpCaratula` varchar(1) DEFAULT NULL,
  `ImpTMuestra` varchar(1) DEFAULT NULL,
  `HDDSerial` mediumint DEFAULT NULL,
  `SerialKey` varchar(0) DEFAULT NULL,
  `Version` varchar(6) DEFAULT NULL,
  `FechaVer` varchar(10) DEFAULT NULL,
  `CS` varchar(5) DEFAULT NULL,
  `Abrev` varchar(0) DEFAULT NULL,
  `idLab` tinyint DEFAULT NULL,
  `FecActLic` bigint DEFAULT NULL,
  `ID` tinyint DEFAULT NULL,
  `Dir` varchar(0) DEFAULT NULL,
  `Dir2` varchar(0) DEFAULT NULL,
  `xStringSMS` varchar(0) DEFAULT NULL,
  `Style` varchar(19) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `list_reactivos`
--

CREATE TABLE `list_reactivos` (
  `id` bigint UNSIGNED NOT NULL,
  `id_equipo` bigint UNSIGNED NOT NULL,
  `id_reactivos` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `LogErrores`
--

CREATE TABLE `LogErrores` (
  `ID` mediumint DEFAULT NULL,
  `Imec` varchar(1) DEFAULT NULL,
  `Exe` varchar(7) DEFAULT NULL,
  `Error` varchar(3) DEFAULT NULL,
  `TipErr` varchar(1) DEFAULT NULL,
  `Tabla` varchar(13) DEFAULT NULL,
  `Modulo` varchar(21) DEFAULT NULL,
  `Status` varchar(1) DEFAULT NULL,
  `Descrip` varchar(0) DEFAULT NULL,
  `Estacion` varchar(15) DEFAULT NULL,
  `FecRec` varchar(19) DEFAULT NULL,
  `FecEnv` varchar(19) DEFAULT NULL,
  `Log` varchar(196) DEFAULT NULL,
  `idUsuario` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `LPrecio`
--

CREATE TABLE `LPrecio` (
  `ID` tinyint NOT NULL,
  `Descrip` varchar(35) DEFAULT NULL,
  `Activo` varchar(1) DEFAULT NULL,
  `LPResp` varchar(1) DEFAULT NULL,
  `SqlTs` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `LTrabajo`
--

CREATE TABLE `LTrabajo` (
  `ID` smallint NOT NULL,
  `Descrip` varchar(30) DEFAULT NULL,
  `idSeccion` tinyint DEFAULT NULL,
  `xExamen` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Mail`
--

CREATE TABLE `Mail` (
  `idMuestra` varchar(0) DEFAULT NULL,
  `idExamen` varchar(0) DEFAULT NULL,
  `Env` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Medicos`
--

CREATE TABLE `Medicos` (
  `ID` smallint NOT NULL,
  `CodExt` varchar(5) DEFAULT NULL,
  `Nombre` varchar(18) DEFAULT NULL,
  `Apellido` varchar(16) DEFAULT NULL,
  `Telefono` varchar(12) DEFAULT NULL,
  `Celular` varchar(12) DEFAULT NULL,
  `Fax` varchar(12) DEFAULT NULL,
  `EnvFax` varchar(1) DEFAULT NULL,
  `eMail` varchar(35) DEFAULT NULL,
  `EnvMail` varchar(1) DEFAULT NULL,
  `Dir1` varchar(30) DEFAULT NULL,
  `SqlTs` varchar(24) DEFAULT NULL,
  `Cedula` varchar(8) DEFAULT NULL,
  `Activo` varchar(1) DEFAULT NULL,
  `idEspecialidad` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Menu`
--

CREATE TABLE `Menu` (
  `ID` tinyint NOT NULL,
  `Codigo` varchar(8) DEFAULT NULL,
  `Descrip` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Metodologia`
--

CREATE TABLE `Metodologia` (
  `ID` smallint NOT NULL,
  `Descrip` varchar(30) DEFAULT NULL,
  `Activo` varchar(1) DEFAULT NULL,
  `CodExt` varchar(0) DEFAULT NULL,
  `ciMet` varchar(0) DEFAULT NULL,
  `SqlTs` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Moneda`
--

CREATE TABLE `Moneda` (
  `ID` tinyint NOT NULL,
  `Descrip` varchar(22) DEFAULT NULL,
  `Abrev` varchar(5) DEFAULT NULL,
  `Factor` decimal(6,4) DEFAULT NULL,
  `Utilidad` decimal(5,4) DEFAULT NULL,
  `RedoMone` varchar(1) DEFAULT NULL,
  `FecUltAct` varchar(19) DEFAULT NULL,
  `idUsuario` smallint DEFAULT NULL,
  `AplCalcIng` varchar(1) DEFAULT NULL,
  `Oculta` varchar(1) DEFAULT NULL,
  `SqlTs` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Motores`
--

CREATE TABLE `Motores` (
  `ID` varchar(0) DEFAULT NULL,
  `Codigo` varchar(0) DEFAULT NULL,
  `Descrip` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `MotxAnu`
--

CREATE TABLE `MotxAnu` (
  `ID` smallint NOT NULL,
  `Descrip` varchar(30) DEFAULT NULL,
  `Activo` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Nacionalidad`
--

CREATE TABLE `Nacionalidad` (
  `ID` tinyint DEFAULT NULL,
  `Codigo` varchar(1) DEFAULT NULL,
  `CodExt` varchar(1) DEFAULT NULL,
  `Descrip` varchar(30) DEFAULT NULL,
  `Abrev` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `NCredito`
--

CREATE TABLE `NCredito` (
  `ID` smallint NOT NULL,
  `idFactura` mediumint DEFAULT NULL,
  `Fecha` varchar(19) DEFAULT NULL,
  `Descrip` varchar(50) DEFAULT NULL,
  `Monto` decimal(10,4) DEFAULT NULL,
  `idUsuario` smallint DEFAULT NULL,
  `MontoOld` decimal(14,4) DEFAULT NULL,
  `Reconversion` varchar(1) DEFAULT NULL,
  `idMotxAnu` smallint DEFAULT NULL,
  `NControl` varchar(0) DEFAULT NULL,
  `NSerie` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `NCxDetalle`
--

CREATE TABLE `NCxDetalle` (
  `idNcredito` smallint NOT NULL,
  `idMuestra` bigint DEFAULT NULL,
  `idExamen` smallint NOT NULL,
  `idCodigo` mediumint DEFAULT NULL,
  `Precio` decimal(7,4) DEFAULT NULL,
  `PrecioOld` decimal(13,4) DEFAULT NULL,
  `Reconversion` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `NDebito`
--

CREATE TABLE `NDebito` (
  `ID` smallint NOT NULL,
  `idPago` mediumint DEFAULT NULL,
  `Fecha` varchar(19) DEFAULT NULL,
  `Descrip` varchar(50) DEFAULT NULL,
  `Monto` decimal(8,4) DEFAULT NULL,
  `idUsuario` smallint DEFAULT NULL,
  `MontoOld` decimal(13,4) DEFAULT NULL,
  `Reconversion` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Ordenes`
--

CREATE TABLE `Ordenes` (
  `idMuestra` bigint NOT NULL,
  `idExamen` smallint NOT NULL,
  `idCodigo` mediumint DEFAULT NULL,
  `idExaInt` smallint DEFAULT NULL,
  `Precio` decimal(10,4) DEFAULT NULL,
  `idOrden` mediumint DEFAULT NULL,
  `idFactura` mediumint DEFAULT NULL,
  `Referencia` varchar(1) DEFAULT NULL,
  `idReferencia` smallint DEFAULT NULL,
  `idSeccion` tinyint DEFAULT NULL,
  `DefExamen` varchar(1) DEFAULT NULL,
  `MOrd` varchar(1) DEFAULT NULL,
  `MRes` varchar(1) DEFAULT NULL,
  `ForReporte` varchar(1) DEFAULT NULL,
  `ValRefer` varchar(1) DEFAULT NULL,
  `StatusExa` varchar(1) DEFAULT NULL,
  `idEntr` mediumint DEFAULT NULL,
  `Impr` varchar(1) DEFAULT NULL,
  `eMail` varchar(1) DEFAULT NULL,
  `Fax` varchar(1) DEFAULT NULL,
  `FHOrden` varchar(19) DEFAULT NULL,
  `FHReporte` varchar(19) DEFAULT NULL,
  `InfoTubo` varchar(10) DEFAULT NULL,
  `CodLabel` varchar(9) DEFAULT NULL,
  `idUsuario` smallint DEFAULT NULL,
  `Costo` decimal(9,4) DEFAULT NULL,
  `PrecioOld` decimal(15,4) DEFAULT NULL,
  `Reconversion` varchar(1) DEFAULT NULL,
  `idBac` varchar(1) DEFAULT NULL,
  `idOrdExt` varchar(0) DEFAULT NULL,
  `Precio2` decimal(5,4) DEFAULT NULL,
  `Costo2` decimal(6,4) DEFAULT NULL,
  `NSerie` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `OrdExternas`
--

CREATE TABLE `OrdExternas` (
  `ID` varchar(0) DEFAULT NULL,
  `TipDoc` varchar(0) DEFAULT NULL,
  `Numero` varchar(0) DEFAULT NULL,
  `Status` varchar(0) DEFAULT NULL,
  `Descrip` varchar(0) DEFAULT NULL,
  `Estacion` varchar(0) DEFAULT NULL,
  `FecRec` varchar(0) DEFAULT NULL,
  `FecEnv` varchar(0) DEFAULT NULL,
  `Data` varchar(0) DEFAULT NULL,
  `idUsuario` varchar(0) DEFAULT NULL,
  `Xml` varchar(0) DEFAULT NULL,
  `Log` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Orina`
--

CREATE TABLE `Orina` (
  `idMuestra` bigint NOT NULL,
  `idExamen` smallint NOT NULL,
  `idEquipo` tinyint DEFAULT NULL,
  `Color` varchar(16) DEFAULT NULL,
  `Aspecto` varchar(18) DEFAULT NULL,
  `Densidad` smallint DEFAULT NULL,
  `PH` decimal(8,2) DEFAULT NULL,
  `idMetodo` tinyint DEFAULT NULL,
  `Tiras` varchar(15) DEFAULT NULL,
  `Proteinas` varchar(6) DEFAULT NULL,
  `Glucosa` varchar(4) DEFAULT NULL,
  `Bilirrubina` varchar(3) DEFAULT NULL,
  `Nitritos` varchar(9) DEFAULT NULL,
  `Cetonicos` varchar(4) DEFAULT NULL,
  `Hemoglobina` varchar(6) DEFAULT NULL,
  `QLeucocitos` varchar(4) DEFAULT NULL,
  `Urobilina` varchar(3) DEFAULT NULL,
  `Cilindricas` varchar(13) DEFAULT NULL,
  `Mucina` varchar(12) DEFAULT NULL,
  `Tricomonas` varchar(15) DEFAULT NULL,
  `Hematies` varchar(20) DEFAULT NULL,
  `MLeucocitos` varchar(20) DEFAULT NULL,
  `Bacterias` varchar(15) DEFAULT NULL,
  `Esperma` varchar(14) DEFAULT NULL,
  `CEpiteliales` varchar(20) DEFAULT NULL,
  `CRedondas` varchar(13) DEFAULT NULL,
  `CTransicion` varchar(7) DEFAULT NULL,
  `Cilindros` varchar(84) DEFAULT NULL,
  `Cristales` varchar(80) DEFAULT NULL,
  `Observacion` text,
  `AcuLeu` varchar(11) DEFAULT NULL,
  `Hifas` varchar(20) DEFAULT NULL,
  `Blasto` varchar(17) DEFAULT NULL,
  `CilHi` varchar(10) DEFAULT NULL,
  `CilHe` varchar(10) DEFAULT NULL,
  `CilLe` varchar(9) DEFAULT NULL,
  `CilMi` varchar(9) DEFAULT NULL,
  `CilCe` varchar(9) DEFAULT NULL,
  `CilGr` varchar(10) DEFAULT NULL,
  `CilGrFi` varchar(9) DEFAULT NULL,
  `CilGrGr` varchar(9) DEFAULT NULL,
  `CriAcUr` varchar(10) DEFAULT NULL,
  `CriUrAm` varchar(10) DEFAULT NULL,
  `CriCi` varchar(10) DEFAULT NULL,
  `CriOxCa` varchar(12) DEFAULT NULL,
  `CriAcHi` varchar(10) DEFAULT NULL,
  `CriLe` varchar(10) DEFAULT NULL,
  `CriUrSo` varchar(9) DEFAULT NULL,
  `CriTi` varchar(10) DEFAULT NULL,
  `CriCo` varchar(0) DEFAULT NULL,
  `CriCaCa` varchar(7) DEFAULT NULL,
  `CriFoTr` varchar(10) DEFAULT NULL,
  `CriFoCa` varchar(9) DEFAULT NULL,
  `CriFoAm` varchar(10) DEFAULT NULL,
  `CriBiAm` varchar(10) DEFAULT NULL,
  `idInterface` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pacientes`
--

CREATE TABLE `Pacientes` (
  `ID` mediumint NOT NULL,
  `Nombre` varchar(30) DEFAULT NULL,
  `Apellido` varchar(30) DEFAULT NULL,
  `Cedula` varchar(15) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `Celular` varchar(12) DEFAULT NULL,
  `Dir1` varchar(60) DEFAULT NULL,
  `Sexo` varchar(1) DEFAULT NULL,
  `FNacimiento` varchar(19) DEFAULT NULL,
  `idConvenio` smallint DEFAULT NULL,
  `idSConvenio` smallint DEFAULT NULL,
  `Nacionalidad` varchar(1) DEFAULT NULL,
  `Activo` varchar(1) DEFAULT NULL,
  `UltVisita` varchar(19) DEFAULT NULL,
  `Historia` varchar(15) DEFAULT NULL,
  `Piso` varchar(1) DEFAULT NULL,
  `Habitacion` varchar(1) DEFAULT NULL,
  `TotFac` decimal(14,4) DEFAULT NULL,
  `TotPag` decimal(14,4) DEFAULT NULL,
  `TotSal` decimal(12,4) DEFAULT NULL,
  `Asegurado` varchar(30) DEFAULT NULL,
  `ciAsegurado` varchar(15) DEFAULT NULL,
  `SqlTs` varchar(0) DEFAULT NULL,
  `Mail` varchar(53) DEFAULT NULL,
  `EnvMail` varchar(1) DEFAULT NULL,
  `Reconversion` varchar(1) DEFAULT NULL,
  `Dir2` varchar(59) DEFAULT NULL,
  `CodExt` varchar(4) DEFAULT NULL,
  `Discapacidad` varchar(1) DEFAULT NULL,
  `Embarazo` varchar(1) DEFAULT NULL,
  `FecEmb` varchar(0) DEFAULT NULL,
  `TiempoEmb` varchar(4) DEFAULT NULL,
  `idUsuario` smallint DEFAULT NULL,
  `FecUltAct` varchar(19) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pagos`
--

CREATE TABLE `Pagos` (
  `ID` mediumint NOT NULL,
  `idFactura` mediumint DEFAULT NULL,
  `Fecha` varchar(19) DEFAULT NULL,
  `Monto` decimal(10,4) DEFAULT NULL,
  `Status` varchar(1) DEFAULT NULL,
  `idUsuario` smallint DEFAULT NULL,
  `SqlTs` varchar(24) DEFAULT NULL,
  `MontoOld` decimal(15,4) DEFAULT NULL,
  `Reconversion` varchar(1) DEFAULT NULL,
  `TipPag` varchar(1) DEFAULT NULL,
  `idConvenio` smallint DEFAULT NULL,
  `TipFactura` varchar(1) DEFAULT NULL,
  `NSerie` varchar(3) DEFAULT NULL,
  `Impuesto` decimal(7,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PagosMult`
--

CREATE TABLE `PagosMult` (
  `idPago` mediumint NOT NULL,
  `idFactura` mediumint NOT NULL,
  `Monto` decimal(6,4) DEFAULT NULL,
  `MontoOld` decimal(12,4) DEFAULT NULL,
  `Reconversion` varchar(1) DEFAULT NULL,
  `NSerie` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pagosxd`
--

CREATE TABLE `Pagosxd` (
  `ID` mediumint NOT NULL,
  `idPago` mediumint DEFAULT NULL,
  `idFPago` tinyint DEFAULT NULL,
  `idBanco` tinyint DEFAULT NULL,
  `Forma` varchar(21) DEFAULT NULL,
  `Banco` varchar(32) DEFAULT NULL,
  `Numero` varchar(20) DEFAULT NULL,
  `Monto` decimal(10,4) DEFAULT NULL,
  `MontoOld` decimal(15,4) DEFAULT NULL,
  `Reconversion` varchar(1) DEFAULT NULL,
  `idPVenta` tinyint DEFAULT NULL,
  `Lote` tinyint DEFAULT NULL,
  `Factor` decimal(8,2) DEFAULT NULL,
  `Impuesto` decimal(7,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PagxPOrd`
--

CREATE TABLE `PagxPOrd` (
  `idPOrd` varchar(0) DEFAULT NULL,
  `Recibo` varchar(0) DEFAULT NULL,
  `Fecha` varchar(0) DEFAULT NULL,
  `Monto` varchar(0) DEFAULT NULL,
  `idUsuario` varchar(0) DEFAULT NULL,
  `MontoOld` varchar(0) DEFAULT NULL,
  `Reconversion` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patients`
--

CREATE TABLE `patients` (
  `id` bigint UNSIGNED NOT NULL,
  `queue_number_id` bigint UNSIGNED DEFAULT NULL,
  `ci` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `old` int NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pemeriksaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'AUN NO CONFIRMADO',
  `late_queue_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Permisos`
--

CREATE TABLE `Permisos` (
  `idUsuario` smallint NOT NULL,
  `idControl` varchar(9) NOT NULL,
  `CS` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PreOrden`
--

CREATE TABLE `PreOrden` (
  `ID` mediumint NOT NULL,
  `idFactura` mediumint DEFAULT NULL,
  `idMuestra` bigint DEFAULT NULL,
  `Fecha` varchar(19) DEFAULT NULL,
  `Status` varchar(1) DEFAULT NULL,
  `Recargo` decimal(6,4) DEFAULT NULL,
  `Descuento` decimal(7,4) DEFAULT NULL,
  `Monto` decimal(9,4) DEFAULT NULL,
  `idUsuario` smallint DEFAULT NULL,
  `MontoOld` decimal(15,4) DEFAULT NULL,
  `Reconversion` varchar(1) DEFAULT NULL,
  `Saldo` decimal(9,4) DEFAULT NULL,
  `Cancelada` varchar(1) DEFAULT NULL,
  `SaldoOld` decimal(15,4) DEFAULT NULL,
  `Monto2` decimal(9,4) DEFAULT NULL,
  `TCambio` decimal(6,4) DEFAULT NULL,
  `Saldo2` decimal(9,4) DEFAULT NULL,
  `NSerie` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Presupuesto`
--

CREATE TABLE `Presupuesto` (
  `ID` mediumint NOT NULL,
  `Cedula` varchar(9) DEFAULT NULL,
  `Nombre` varchar(25) DEFAULT NULL,
  `Apellido` varchar(25) DEFAULT NULL,
  `Telefono` varchar(27) DEFAULT NULL,
  `Dir1` varchar(50) DEFAULT NULL,
  `Fecha` varchar(19) DEFAULT NULL,
  `FecNac` varchar(19) DEFAULT NULL,
  `Sexo` varchar(1) DEFAULT NULL,
  `idConv` smallint DEFAULT NULL,
  `idSConv` smallint DEFAULT NULL,
  `idLPre` tinyint DEFAULT NULL,
  `Monto` decimal(9,4) DEFAULT NULL,
  `Porc` decimal(7,4) DEFAULT NULL,
  `DR` tinyint DEFAULT NULL,
  `Observ` varchar(28) DEFAULT NULL,
  `idUsuario` smallint DEFAULT NULL,
  `MontoOld` decimal(13,4) DEFAULT NULL,
  `Reconversion` varchar(1) DEFAULT NULL,
  `Monto2` decimal(5,4) DEFAULT NULL,
  `TCambio` decimal(5,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Prioridad`
--

CREATE TABLE `Prioridad` (
  `ID` varchar(0) DEFAULT NULL,
  `Descrip` varchar(0) DEFAULT NULL,
  `Prioridad` varchar(0) DEFAULT NULL,
  `idUbicacion` varchar(0) DEFAULT NULL,
  `idConvenio` varchar(0) DEFAULT NULL,
  `Codigo` varchar(0) DEFAULT NULL,
  `SoloTM` varchar(0) DEFAULT NULL,
  `Edad` varchar(0) DEFAULT NULL,
  `Condicion` varchar(0) DEFAULT NULL,
  `Sexo` varchar(0) DEFAULT NULL,
  `Activo` varchar(0) DEFAULT NULL,
  `Orden` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empresa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `localidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebas`
--

CREATE TABLE `pruebas` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `id_cliente` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PVenta`
--

CREATE TABLE `PVenta` (
  `ID` varchar(0) DEFAULT NULL,
  `Descrip` varchar(0) DEFAULT NULL,
  `CodExt` varchar(0) DEFAULT NULL,
  `idBanco` varchar(0) DEFAULT NULL,
  `ComTDe` varchar(0) DEFAULT NULL,
  `ComTDeO` varchar(0) DEFAULT NULL,
  `IsrlTDe` varchar(0) DEFAULT NULL,
  `IvaTDe` varchar(0) DEFAULT NULL,
  `ComTCr` varchar(0) DEFAULT NULL,
  `ComTCrO` varchar(0) DEFAULT NULL,
  `IsrlTCr` varchar(0) DEFAULT NULL,
  `IvaTCr` varchar(0) DEFAULT NULL,
  `Activo` varchar(0) DEFAULT NULL,
  `idUsuario` varchar(0) DEFAULT NULL,
  `FecUltAct` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `queue_numbers`
--

CREATE TABLE `queue_numbers` (
  `id` bigint UNSIGNED NOT NULL,
  `number` int UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reactivos`
--

CREATE TABLE `reactivos` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `id_prueba` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Recargos`
--

CREATE TABLE `Recargos` (
  `ID` tinyint NOT NULL,
  `Tipo` varchar(7) DEFAULT NULL,
  `Dia` varchar(7) DEFAULT NULL,
  `Fecha` varchar(10) DEFAULT NULL,
  `HoraIni` varchar(8) DEFAULT NULL,
  `HoraFin` varchar(8) DEFAULT NULL,
  `Recargo` decimal(3,1) DEFAULT NULL,
  `idUsuario` tinyint DEFAULT NULL,
  `idConvenio` tinyint DEFAULT NULL,
  `idUbicacion` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Referencia`
--

CREATE TABLE `Referencia` (
  `ID` smallint NOT NULL,
  `Descrip` varchar(35) DEFAULT NULL,
  `Abrev` varchar(15) DEFAULT NULL,
  `Activo` varchar(1) DEFAULT NULL,
  `Contacto` varchar(23) DEFAULT NULL,
  `Descuento` decimal(3,1) DEFAULT NULL,
  `Direccion` varchar(50) DEFAULT NULL,
  `Rif` varchar(12) DEFAULT NULL,
  `Telefono` varchar(15) DEFAULT NULL,
  `Fax` varchar(14) DEFAULT NULL,
  `eMail` varchar(33) DEFAULT NULL,
  `SqlTs` varchar(24) DEFAULT NULL,
  `DExtras` tinyint DEFAULT NULL,
  `idLab` tinyint DEFAULT NULL,
  `onLine` varchar(1) DEFAULT NULL,
  `FTPIn` varchar(0) DEFAULT NULL,
  `FTPOut` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Relaciones`
--

CREATE TABLE `Relaciones` (
  `ID` tinyint NOT NULL,
  `Descrip` varchar(31) DEFAULT NULL,
  `Codigo1` smallint DEFAULT NULL,
  `Codigo2` tinyint DEFAULT NULL,
  `Codigo3` tinyint DEFAULT NULL,
  `Activo` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `RepGenerico`
--

CREATE TABLE `RepGenerico` (
  `ID` tinyint NOT NULL,
  `Descrip` varchar(16) DEFAULT NULL,
  `Script` varchar(67) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Secciones`
--

CREATE TABLE `Secciones` (
  `ID` tinyint NOT NULL,
  `Codigo` varchar(1) DEFAULT NULL,
  `Descrip` varchar(22) DEFAULT NULL,
  `DescripIng` varchar(0) DEFAULT NULL,
  `CodConta` varchar(6) DEFAULT NULL,
  `ColaResult` varchar(14) DEFAULT NULL,
  `ColaEtiq` varchar(14) DEFAULT NULL,
  `enColaResult` varchar(1) DEFAULT NULL,
  `enColaEtiq` varchar(50) DEFAULT NULL,
  `PiePagina` text,
  `SepImp` varchar(1) DEFAULT NULL,
  `FontDos` varchar(1) DEFAULT NULL,
  `Secbac` varchar(1) DEFAULT NULL,
  `ImpMetodo` varchar(1) DEFAULT NULL,
  `ImplbResult` varchar(1) DEFAULT NULL,
  `ImplbUnidad` varchar(1) DEFAULT NULL,
  `ImplbVRefer` varchar(1) DEFAULT NULL,
  `DIPPag` varchar(1) DEFAULT NULL,
  `SqlTs` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SeccionesOld`
--

CREATE TABLE `SeccionesOld` (
  `ID` tinyint DEFAULT NULL,
  `Codigo` varchar(1) DEFAULT NULL,
  `CodConta` varchar(6) DEFAULT NULL,
  `Descrip` varchar(20) DEFAULT NULL,
  `ColaResult` varchar(14) DEFAULT NULL,
  `ColaEtiq` varchar(14) DEFAULT NULL,
  `enColaResult` varchar(1) DEFAULT NULL,
  `enColaEtiq` varchar(1) DEFAULT NULL,
  `PiePagina` text,
  `SepImp` varchar(1) DEFAULT NULL,
  `FontDOS` varchar(1) DEFAULT NULL,
  `SecBac` varchar(1) DEFAULT NULL,
  `ImpMetodo` varchar(1) DEFAULT NULL,
  `ImplbResult` varchar(1) DEFAULT NULL,
  `ImplbUnidad` varchar(1) DEFAULT NULL,
  `ImplbVRefer` varchar(1) DEFAULT NULL,
  `DIPPag` varchar(1) DEFAULT NULL,
  `DescripIng` varchar(0) DEFAULT NULL,
  `SqlTs` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Seguridad`
--

CREATE TABLE `Seguridad` (
  `ID` mediumint NOT NULL,
  `Codigo` varchar(29) DEFAULT NULL,
  `Descrip` varchar(35) DEFAULT NULL,
  `Tabla` varchar(13) DEFAULT NULL,
  `Imec` varchar(1) DEFAULT NULL,
  `Fecha` varchar(19) DEFAULT NULL,
  `idUsu` smallint DEFAULT NULL,
  `Estacion` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SerieFact`
--

CREATE TABLE `SerieFact` (
  `ID` tinyint DEFAULT NULL,
  `NSerie` varchar(3) NOT NULL,
  `CodExt` varchar(0) DEFAULT NULL,
  `Descrip` varchar(15) DEFAULT NULL,
  `Activa` varchar(1) DEFAULT NULL,
  `SqlTs` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ServDWH`
--

CREATE TABLE `ServDWH` (
  `ID` varchar(0) DEFAULT NULL,
  `idMuestra` varchar(0) DEFAULT NULL,
  `TipDoc` varchar(0) DEFAULT NULL,
  `Env` varchar(0) DEFAULT NULL,
  `FecRec` varchar(0) DEFAULT NULL,
  `FecEnv` varchar(0) DEFAULT NULL,
  `Estacion` varchar(0) DEFAULT NULL,
  `LogEnv` varchar(0) DEFAULT NULL,
  `idUsuario` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ServExt`
--

CREATE TABLE `ServExt` (
  `ID` mediumint NOT NULL,
  `Imec` varchar(1) DEFAULT NULL,
  `TipDoc` varchar(2) DEFAULT NULL,
  `Numero` mediumint DEFAULT NULL,
  `FecRec` varchar(19) DEFAULT NULL,
  `FecEnv` varchar(19) DEFAULT NULL,
  `EnvLog` varchar(19) DEFAULT NULL,
  `Estacion` varchar(15) DEFAULT NULL,
  `Env` varchar(1) DEFAULT NULL,
  `idUsuario` smallint DEFAULT NULL,
  `LogEnv` varchar(0) DEFAULT NULL,
  `Status` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ServRefExt`
--

CREATE TABLE `ServRefExt` (
  `ID` tinyint NOT NULL,
  `Imec` varchar(1) DEFAULT NULL,
  `idLab` smallint DEFAULT NULL,
  `TipDoc` varchar(6) DEFAULT NULL,
  `Numero` varchar(5) DEFAULT NULL,
  `Status` varchar(1) DEFAULT NULL,
  `Descrip` varchar(32) DEFAULT NULL,
  `Estacion` varchar(10) DEFAULT NULL,
  `FecRec` varchar(19) DEFAULT NULL,
  `FecEnv` varchar(19) DEFAULT NULL,
  `XML` text,
  `Log` varchar(22) DEFAULT NULL,
  `idUsuario` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ServSMS`
--

CREATE TABLE `ServSMS` (
  `ID` mediumint DEFAULT NULL,
  `idMuestra` varchar(12) DEFAULT NULL,
  `TipDoc` varchar(4) DEFAULT NULL,
  `Numero` varchar(12) DEFAULT NULL,
  `Env` varchar(1) DEFAULT NULL,
  `FecRec` varchar(19) DEFAULT NULL,
  `FecEnv` varchar(19) DEFAULT NULL,
  `Estacion` varchar(14) DEFAULT NULL,
  `TextSMS` varchar(160) DEFAULT NULL,
  `LogEnv` varchar(0) DEFAULT NULL,
  `idUsuario` smallint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `StatusMue`
--

CREATE TABLE `StatusMue` (
  `idMuestra` varchar(0) DEFAULT NULL,
  `idExamen` varchar(0) DEFAULT NULL,
  `Fecha` varchar(0) DEFAULT NULL,
  `Status` varchar(0) DEFAULT NULL,
  `idUsuario` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SubConv`
--

CREATE TABLE `SubConv` (
  `ID` smallint NOT NULL,
  `LetExt` varchar(4) DEFAULT NULL,
  `idConvenio` smallint DEFAULT NULL,
  `Credito` varchar(1) DEFAULT NULL,
  `Descrip` varchar(44) DEFAULT NULL,
  `Abrev` varchar(15) DEFAULT NULL,
  `DR` tinyint DEFAULT NULL,
  `Porc` decimal(4,1) DEFAULT NULL,
  `CodExt` varchar(4) DEFAULT NULL,
  `Activo` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SubMenu`
--

CREATE TABLE `SubMenu` (
  `ID` varchar(9) NOT NULL,
  `idMenu` tinyint DEFAULT NULL,
  `Descrip` varchar(34) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Sucursales`
--

CREATE TABLE `Sucursales` (
  `ID` tinyint NOT NULL,
  `CodExt` varchar(0) DEFAULT NULL,
  `Descrip` varchar(9) DEFAULT NULL,
  `Orden` tinyint DEFAULT NULL,
  `Abrev` varchar(9) DEFAULT NULL,
  `Serie` varchar(1) DEFAULT NULL,
  `idMueIni` tinyint DEFAULT NULL,
  `Activo` varchar(1) DEFAULT NULL,
  `idLab` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tareas`
--

CREATE TABLE `Tareas` (
  `ID` tinyint NOT NULL,
  `TipTarea` tinyint DEFAULT NULL,
  `Descrip` varchar(23) DEFAULT NULL,
  `Abrev` varchar(0) DEFAULT NULL,
  `Orden` tinyint DEFAULT NULL,
  `TipFrec` varchar(1) DEFAULT NULL,
  `FrecTarea` tinyint DEFAULT NULL,
  `DiasSemana` varchar(0) DEFAULT NULL,
  `Ocurre` varchar(1) DEFAULT NULL,
  `HoraIni` varchar(19) DEFAULT NULL,
  `HoraFin` varchar(19) DEFAULT NULL,
  `Carpeta` varchar(20) DEFAULT NULL,
  `TipNotif` varchar(1) DEFAULT NULL,
  `Notifx` varchar(1) DEFAULT NULL,
  `CantNotif` tinyint DEFAULT NULL,
  `IntNotif` tinyint DEFAULT NULL,
  `MCNotif` varchar(80) DEFAULT NULL,
  `UltEjec` varchar(19) DEFAULT NULL,
  `UltNotif` varchar(19) DEFAULT NULL,
  `NotifEnv` tinyint DEFAULT NULL,
  `Log` varchar(0) DEFAULT NULL,
  `Activo` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TecladoD`
--

CREATE TABLE `TecladoD` (
  `idTeclado` tinyint NOT NULL,
  `Tag` tinyint NOT NULL,
  `Letra` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TmpAnti`
--

CREATE TABLE `TmpAnti` (
  `ID` varchar(0) DEFAULT NULL,
  `Item` varchar(0) DEFAULT NULL,
  `idAntibiotico` varchar(0) DEFAULT NULL,
  `Antibiotico` varchar(0) DEFAULT NULL,
  `idMicro1` varchar(0) DEFAULT NULL,
  `idMicro2` varchar(0) DEFAULT NULL,
  `idMicro3` varchar(0) DEFAULT NULL,
  `idMicro4` varchar(0) DEFAULT NULL,
  `idMicro5` varchar(0) DEFAULT NULL,
  `Result1` varchar(0) DEFAULT NULL,
  `Result2` varchar(0) DEFAULT NULL,
  `Result3` varchar(0) DEFAULT NULL,
  `Result4` varchar(0) DEFAULT NULL,
  `Result5` varchar(0) DEFAULT NULL,
  `Sens1` varchar(0) DEFAULT NULL,
  `Sens2` varchar(0) DEFAULT NULL,
  `Sens3` varchar(0) DEFAULT NULL,
  `Sens4` varchar(0) DEFAULT NULL,
  `Sens5` varchar(0) DEFAULT NULL,
  `idMuestra` varchar(0) DEFAULT NULL,
  `idExamen` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TmpAuditoria`
--

CREATE TABLE `TmpAuditoria` (
  `ID` varchar(0) DEFAULT NULL,
  `idMuestra` varchar(0) DEFAULT NULL,
  `idExamen` varchar(0) DEFAULT NULL,
  `Cantidad` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TmpCaja`
--

CREATE TABLE `TmpCaja` (
  `ID` mediumint DEFAULT NULL,
  `idTCaja` varchar(12) DEFAULT NULL,
  `Correlativo` mediumint DEFAULT NULL,
  `idPago` mediumint DEFAULT NULL,
  `idNdebito` tinyint DEFAULT NULL,
  `Tipo` tinyint DEFAULT NULL,
  `Fecha` varchar(19) DEFAULT NULL,
  `idFactura` mediumint DEFAULT NULL,
  `Status` varchar(1) DEFAULT NULL,
  `Forma` varchar(2) DEFAULT NULL,
  `idBanco` tinyint DEFAULT NULL,
  `Banco` varchar(29) DEFAULT NULL,
  `Numero` varchar(0) DEFAULT NULL,
  `idUsuario` tinyint DEFAULT NULL,
  `Monto` decimal(8,4) DEFAULT NULL,
  `idPaciente` mediumint DEFAULT NULL,
  `idConvenio` tinyint DEFAULT NULL,
  `idPVenta` tinyint DEFAULT NULL,
  `Lote` tinyint DEFAULT NULL,
  `idMuestra` bigint DEFAULT NULL,
  `Factor` decimal(4,2) DEFAULT NULL,
  `MMExt` decimal(6,4) DEFAULT NULL,
  `idFPago` tinyint DEFAULT NULL,
  `NSerie` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TmpEstadistica`
--

CREATE TABLE `TmpEstadistica` (
  `idTEst` varchar(0) DEFAULT NULL,
  `idExamen` varchar(0) DEFAULT NULL,
  `idSeccion` varchar(0) DEFAULT NULL,
  `Cantidad` varchar(0) DEFAULT NULL,
  `Costo` varchar(0) DEFAULT NULL,
  `ID` varchar(0) DEFAULT NULL,
  `Item` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TmpExPac`
--

CREATE TABLE `TmpExPac` (
  `ID` varchar(12) DEFAULT NULL,
  `idMuestra` bigint DEFAULT NULL,
  `Tipo` varchar(1) DEFAULT NULL,
  `idPaciente` mediumint DEFAULT NULL,
  `idExamen` smallint DEFAULT NULL,
  `StatusExa` varchar(10) DEFAULT NULL,
  `idUbicacion` tinyint DEFAULT NULL,
  `Precio` decimal(5,4) DEFAULT NULL,
  `idCodigo` varchar(5) DEFAULT NULL,
  `FechaTM` varchar(19) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TmpFactura`
--

CREATE TABLE `TmpFactura` (
  `ID` varchar(12) DEFAULT NULL,
  `idFactura` mediumint DEFAULT NULL,
  `idExamen` smallint DEFAULT NULL,
  `idCodigo` smallint DEFAULT NULL,
  `FecEntrega` varchar(10) DEFAULT NULL,
  `Precio` decimal(7,4) DEFAULT NULL,
  `NSerie` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TmpFacturas`
--

CREATE TABLE `TmpFacturas` (
  `ID` varchar(0) DEFAULT NULL,
  `idPaciente` varchar(0) DEFAULT NULL,
  `idMuestra` varchar(0) DEFAULT NULL,
  `Fecha` varchar(0) DEFAULT NULL,
  `TipDoc` varchar(0) DEFAULT NULL,
  `Status` varchar(0) DEFAULT NULL,
  `TipFactura` varchar(0) DEFAULT NULL,
  `idFactura` varchar(0) DEFAULT NULL,
  `idNCredito` varchar(0) DEFAULT NULL,
  `idConvenio` varchar(0) DEFAULT NULL,
  `idSConvenio` varchar(0) DEFAULT NULL,
  `idUbicacion` varchar(0) DEFAULT NULL,
  `Porcentaje` varchar(0) DEFAULT NULL,
  `Credito` varchar(0) DEFAULT NULL,
  `DR` varchar(0) DEFAULT NULL,
  `Monto` varchar(0) DEFAULT NULL,
  `Saldo` varchar(0) DEFAULT NULL,
  `idUsuario` varchar(0) DEFAULT NULL,
  `Item` varchar(0) DEFAULT NULL,
  `NSerie` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TmpGraficos`
--

CREATE TABLE `TmpGraficos` (
  `ID` varchar(13) DEFAULT NULL,
  `idPaciente` mediumint DEFAULT NULL,
  `idExamen` smallint DEFAULT NULL,
  `Fecha` varchar(19) DEFAULT NULL,
  `Result` decimal(9,4) DEFAULT NULL,
  `ValMinimo` decimal(2,1) DEFAULT NULL,
  `ValMaximo` decimal(2,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TmpGxGen`
--

CREATE TABLE `TmpGxGen` (
  `ID` varchar(0) DEFAULT NULL,
  `idMuestra` varchar(0) DEFAULT NULL,
  `idExamen` varchar(0) DEFAULT NULL,
  `idExaInt` varchar(0) DEFAULT NULL,
  `idCodigo` varchar(0) DEFAULT NULL,
  `Descrip` varchar(0) DEFAULT NULL,
  `Valor` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TmpNCredito`
--

CREATE TABLE `TmpNCredito` (
  `ID` varchar(12) DEFAULT NULL,
  `idNCredito` smallint DEFAULT NULL,
  `idMotxAnu` smallint DEFAULT NULL,
  `idPaciente` mediumint DEFAULT NULL,
  `Fecha` varchar(10) DEFAULT NULL,
  `idFactura` mediumint DEFAULT NULL,
  `TipFactura` varchar(1) DEFAULT NULL,
  `idConvenio` tinyint DEFAULT NULL,
  `idSConvenio` smallint DEFAULT NULL,
  `Monto` decimal(7,4) DEFAULT NULL,
  `idUsuario` tinyint DEFAULT NULL,
  `idMotivo` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TmpPagPOrd`
--

CREATE TABLE `TmpPagPOrd` (
  `ID` varchar(11) DEFAULT NULL,
  `idPreOrden` mediumint DEFAULT NULL,
  `Saldo` decimal(12,4) DEFAULT NULL,
  `Pago` decimal(5,4) DEFAULT NULL,
  `idFactura` mediumint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TmpPxImp`
--

CREATE TABLE `TmpPxImp` (
  `ID` varchar(11) DEFAULT NULL,
  `idMuestra` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TmpRes`
--

CREATE TABLE `TmpRes` (
  `ID` varchar(12) DEFAULT NULL,
  `idMuestra` bigint DEFAULT NULL,
  `idExamen` smallint DEFAULT NULL,
  `idExaInt` smallint DEFAULT NULL,
  `idCodigo` mediumint DEFAULT NULL,
  `Descrip` varchar(35) DEFAULT NULL,
  `Orden` tinyint DEFAULT NULL,
  `OrdImp` mediumint DEFAULT NULL,
  `idSeccion` tinyint DEFAULT NULL,
  `idMetodo` tinyint DEFAULT NULL,
  `idRelacion` tinyint DEFAULT NULL,
  `ForReporte` varchar(1) DEFAULT NULL,
  `DefExamen` varchar(1) DEFAULT NULL,
  `ValRefer` varchar(1) DEFAULT NULL,
  `Resultado` varchar(20) DEFAULT NULL,
  `Decimales` tinyint DEFAULT NULL,
  `Verificado` varchar(1) DEFAULT NULL,
  `Unidades` varchar(7) DEFAULT NULL,
  `ValReferencia` varchar(113) DEFAULT NULL,
  `ValMinimo` decimal(4,1) DEFAULT NULL,
  `ValMaximo` decimal(5,2) DEFAULT NULL,
  `Campo` varchar(7) DEFAULT NULL,
  `Texto` varchar(70) DEFAULT NULL,
  `idUsu` tinyint DEFAULT NULL,
  `IniUser` varchar(3) DEFAULT NULL,
  `Interpretacion` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tracking`
--

CREATE TABLE `Tracking` (
  `ID` int NOT NULL,
  `IdMuestra` bigint DEFAULT NULL,
  `idExamen` smallint DEFAULT NULL,
  `Descrip` varchar(35) DEFAULT NULL,
  `StatusExa` varchar(1) DEFAULT NULL,
  `Fecha` varchar(22) DEFAULT NULL,
  `idUsuario` smallint DEFAULT NULL,
  `Estacion` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Ubicacion`
--

CREATE TABLE `Ubicacion` (
  `ID` tinyint NOT NULL,
  `Codigo` tinyint DEFAULT NULL,
  `Descrip` varchar(15) DEFAULT NULL,
  `idConvenio` tinyint DEFAULT NULL,
  `idSubConv` tinyint DEFAULT NULL,
  `CodExt` varchar(1) DEFAULT NULL,
  `Stat` varchar(1) DEFAULT NULL,
  `TipHosp` varchar(1) DEFAULT NULL,
  `TipUbic` varchar(1) DEFAULT NULL,
  `ImpResult` varchar(1) DEFAULT NULL,
  `Campo1` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Unidades`
--

CREATE TABLE `Unidades` (
  `ID` smallint NOT NULL,
  `CodExt` varchar(0) DEFAULT NULL,
  `Descrip` varchar(15) DEFAULT NULL,
  `Activo` varchar(1) DEFAULT NULL,
  `ciUni` varchar(0) DEFAULT NULL,
  `SqlTs` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `UnidadesOld`
--

CREATE TABLE `UnidadesOld` (
  `ID` smallint DEFAULT NULL,
  `CodExt` varchar(0) DEFAULT NULL,
  `Descrip` varchar(15) DEFAULT NULL,
  `Activo` varchar(1) DEFAULT NULL,
  `ciUni` varchar(0) DEFAULT NULL,
  `SqlTs` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
  `ID` smallint NOT NULL,
  `Usuario` varchar(35) DEFAULT NULL,
  `Clave` varchar(40) DEFAULT NULL,
  `Inic` varchar(3) DEFAULT NULL,
  `Titulo` varchar(5) DEFAULT NULL,
  `Cargo` varchar(20) DEFAULT NULL,
  `MSDS` varchar(5) DEFAULT NULL,
  `CDB` varchar(7) DEFAULT NULL,
  `Univ` varchar(26) DEFAULT NULL,
  `Tecl` varchar(10) DEFAULT NULL,
  `FecVenc` varchar(19) DEFAULT NULL,
  `Vence` varchar(1) DEFAULT NULL,
  `Hora1` varchar(8) DEFAULT NULL,
  `Hora2` varchar(8) DEFAULT NULL,
  `Hora` varchar(1) DEFAULT NULL,
  `Nivel` tinyint DEFAULT NULL,
  `Activo` varchar(1) DEFAULT NULL,
  `CodExt` varchar(2) DEFAULT NULL,
  `PSeg` varchar(0) DEFAULT NULL,
  `RSeg` varchar(0) DEFAULT NULL,
  `FecCrea` varchar(19) DEFAULT NULL,
  `FecUltAcc` varchar(19) DEFAULT NULL,
  `TInac` smallint DEFAULT NULL,
  `CS` varchar(5) DEFAULT NULL,
  `Celular` varchar(11) DEFAULT NULL,
  `FecNac` varchar(10) DEFAULT NULL,
  `UsuGen` varchar(1) DEFAULT NULL,
  `ClaveOld` varchar(20) DEFAULT NULL,
  `Style` varchar(16) DEFAULT NULL,
  `SqlTs` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `UsxConvenio`
--

CREATE TABLE `UsxConvenio` (
  `idConvenio` varchar(0) DEFAULT NULL,
  `idUsuario` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `UxConvenio`
--

CREATE TABLE `UxConvenio` (
  `idConvenio` tinyint NOT NULL,
  `idUbicacion` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valparam`
--

CREATE TABLE `valparam` (
  `ID` smallint NOT NULL,
  `idExamen` smallint DEFAULT NULL,
  `idMetodo` smallint DEFAULT NULL,
  `idUnidad` smallint DEFAULT NULL,
  `Sexo` varchar(1) DEFAULT NULL,
  `Edad` varchar(9) DEFAULT NULL,
  `ValMin` decimal(9,3) DEFAULT NULL,
  `ValMax` decimal(9,3) DEFAULT NULL,
  `Interpretar` varchar(16) DEFAULT NULL,
  `Memo` text,
  `Tipo` varchar(1) DEFAULT NULL,
  `BloqAut` varchar(1) DEFAULT NULL,
  `BloqImp` varchar(1) DEFAULT NULL,
  `MensBloqImp` varchar(0) DEFAULT NULL,
  `TipInter` varchar(1) DEFAULT NULL,
  `SqlTs` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ValParamOld`
--

CREATE TABLE `ValParamOld` (
  `ID` smallint DEFAULT NULL,
  `idExamen` smallint DEFAULT NULL,
  `idMetodo` smallint DEFAULT NULL,
  `Sexo` varchar(1) DEFAULT NULL,
  `Edad` varchar(9) DEFAULT NULL,
  `ValMin` decimal(9,3) DEFAULT NULL,
  `ValMax` decimal(9,3) DEFAULT NULL,
  `Interpretar` varchar(16) DEFAULT NULL,
  `Memo` text,
  `SqlTs` bigint DEFAULT NULL,
  `Tipo` varchar(1) DEFAULT NULL,
  `BloqAut` varchar(1) DEFAULT NULL,
  `BloqImp` varchar(1) DEFAULT NULL,
  `MensBloqImp` varchar(0) DEFAULT NULL,
  `TipInter` varchar(1) DEFAULT NULL,
  `idUnidad` smallint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `VOrdenes`
--

CREATE TABLE `VOrdenes` (
  `idMuestra` varchar(0) DEFAULT NULL,
  `idExamen` varchar(0) DEFAULT NULL,
  `idCodigo` varchar(0) DEFAULT NULL,
  `idExaInt` varchar(0) DEFAULT NULL,
  `Precio` varchar(0) DEFAULT NULL,
  `idFactura` varchar(0) DEFAULT NULL,
  `Referencia` varchar(0) DEFAULT NULL,
  `idReferencia` varchar(0) DEFAULT NULL,
  `idSeccion` varchar(0) DEFAULT NULL,
  `DefExamen` varchar(0) DEFAULT NULL,
  `MOrd` varchar(0) DEFAULT NULL,
  `MRes` varchar(0) DEFAULT NULL,
  `ForReporte` varchar(0) DEFAULT NULL,
  `ValRefer` varchar(0) DEFAULT NULL,
  `StatusExa` varchar(0) DEFAULT NULL,
  `idEntr` varchar(0) DEFAULT NULL,
  `Impr` varchar(0) DEFAULT NULL,
  `eMail` varchar(0) DEFAULT NULL,
  `Fax` varchar(0) DEFAULT NULL,
  `FHOrden` varchar(0) DEFAULT NULL,
  `FHReporte` varchar(0) DEFAULT NULL,
  `InfoTubo` varchar(0) DEFAULT NULL,
  `CodLabel` varchar(0) DEFAULT NULL,
  `idUsuario` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `WorkList`
--

CREATE TABLE `WorkList` (
  `ID` varchar(0) DEFAULT NULL,
  `idMuestra` varchar(0) DEFAULT NULL,
  `idEtiqueta` varchar(0) DEFAULT NULL,
  `idEquipo` varchar(0) DEFAULT NULL,
  `idExamen` varchar(0) DEFAULT NULL,
  `idHost` varchar(0) DEFAULT NULL,
  `idCanal` varchar(0) DEFAULT NULL,
  `Rack` varchar(0) DEFAULT NULL,
  `Tubo` varchar(0) DEFAULT NULL,
  `Fluido` varchar(0) DEFAULT NULL,
  `Enviar` varchar(0) DEFAULT NULL,
  `TipoEnv` varchar(0) DEFAULT NULL,
  `NumEnv` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `AlarmaExa`
--
ALTER TABLE `AlarmaExa`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Asignar`
--
ALTER TABLE `Asignar`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_Asignar_Interfases` (`idInterfase`),
  ADD KEY `FK_Asignar_Metodologia` (`idMetodo`);

--
-- Indices de la tabla `Auditoria`
--
ALTER TABLE `Auditoria`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `AxInterface`
--
ALTER TABLE `AxInterface`
  ADD PRIMARY KEY (`idInterface`,`idCodigo`);

--
-- Indices de la tabla `BacAntibioticos`
--
ALTER TABLE `BacAntibioticos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `BacAntxP`
--
ALTER TABLE `BacAntxP`
  ADD PRIMARY KEY (`idFam`,`idAnt`);

--
-- Indices de la tabla `BacColoracion`
--
ALTER TABLE `BacColoracion`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `BacFMOrg`
--
ALTER TABLE `BacFMOrg`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `BacFuente`
--
ALTER TABLE `BacFuente`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `BacGram`
--
ALTER TABLE `BacGram`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `BacMicroOrganismos`
--
ALTER TABLE `BacMicroOrganismos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `BacMOrgxAnt`
--
ALTER TABLE `BacMOrgxAnt`
  ADD PRIMARY KEY (`idBac`,`idMOrg`);

--
-- Indices de la tabla `BacMuestra`
--
ALTER TABLE `BacMuestra`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `BacPCorte`
--
ALTER TABLE `BacPCorte`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `BacRColor`
--
ALTER TABLE `BacRColor`
  ADD PRIMARY KEY (`idBac`,`idColor`,`Item`);

--
-- Indices de la tabla `BacReporte`
--
ALTER TABLE `BacReporte`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `Bacteriologia`
--
ALTER TABLE `Bacteriologia`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `Bancos`
--
ALTER TABLE `Bancos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `collection_data`
--
ALTER TABLE `collection_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `collection_data_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compras_id_proveedor_foreign` (`id_proveedor`),
  ADD KEY `compras_id_reactivo_foreign` (`id_reactivo`);

--
-- Indices de la tabla `Conclusiones`
--
ALTER TABLE `Conclusiones`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `Convenios`
--
ALTER TABLE `Convenios`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_Convenios_LPrecio` (`idLPrecio`),
  ADD KEY `FK_Convenios_Moneda` (`idMoneda`);

--
-- Indices de la tabla `Cuantitativo`
--
ALTER TABLE `Cuantitativo`
  ADD PRIMARY KEY (`idMuestra`,`idExamen`),
  ADD KEY `FK_Cuantitativo_Metodologia` (`idMetodoR`),
  ADD KEY `idUnidadR` (`idUnidadR`),
  ADD KEY `idUnidadR_2` (`idUnidadR`);

--
-- Indices de la tabla `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documents_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `Entrega`
--
ALTER TABLE `Entrega`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `Equipos`
--
ALTER TABLE `Equipos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `equiposP`
--
ALTER TABLE `equiposP`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `Examenes`
--
ALTER TABLE `Examenes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_Examenes_Secciones` (`idSeccion`);

--
-- Indices de la tabla `ExAnalizador`
--
ALTER TABLE `ExAnalizador`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `ExConclusion`
--
ALTER TABLE `ExConclusion`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `ExFAnulada`
--
ALTER TABLE `ExFAnulada`
  ADD PRIMARY KEY (`idFactura`,`idMuestra`,`idExamen`);

--
-- Indices de la tabla `ExLPrecio`
--
ALTER TABLE `ExLPrecio`
  ADD PRIMARY KEY (`idLPrecio`,`idExamen`),
  ADD KEY `FK_ExLPrecio_Examenes` (`idExamen`),
  ADD KEY `FK_ExLPrecio_Moneda` (`idMoneda`);

--
-- Indices de la tabla `ExLTrabajo`
--
ALTER TABLE `ExLTrabajo`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `ExMultiple`
--
ALTER TABLE `ExMultiple`
  ADD PRIMARY KEY (`idMultiple`,`idExamen`);

--
-- Indices de la tabla `ExPerfil`
--
ALTER TABLE `ExPerfil`
  ADD PRIMARY KEY (`idPerfil`,`idExamen`);

--
-- Indices de la tabla `ExPresupuesto`
--
ALTER TABLE `ExPresupuesto`
  ADD PRIMARY KEY (`idPre`,`idExamen`);

--
-- Indices de la tabla `Exreferencia`
--
ALTER TABLE `Exreferencia`
  ADD PRIMARY KEY (`idReferencia`,`idExamen`);

--
-- Indices de la tabla `Facturas`
--
ALTER TABLE `Facturas`
  ADD PRIMARY KEY (`NSerie`,`ID`),
  ADD KEY `FK_Facturas_Convenios` (`idConvenio`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `Firmas`
--
ALTER TABLE `Firmas`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `Formas`
--
ALTER TABLE `Formas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `ForPago`
--
ALTER TABLE `ForPago`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `General`
--
ALTER TABLE `General`
  ADD PRIMARY KEY (`idMuestra`,`idExamen`,`idExaInt`),
  ADD KEY `FK_General_Unidades` (`idUnidad`);

--
-- Indices de la tabla `Heces`
--
ALTER TABLE `Heces`
  ADD PRIMARY KEY (`idMuestra`,`idExamen`);

--
-- Indices de la tabla `Hematologia`
--
ALTER TABLE `Hematologia`
  ADD PRIMARY KEY (`idMuestra`,`idExamen`);

--
-- Indices de la tabla `HistPaciente`
--
ALTER TABLE `HistPaciente`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `Imagenes`
--
ALTER TABLE `Imagenes`
  ADD PRIMARY KEY (`idMuestra`);

--
-- Indices de la tabla `Impresoras`
--
ALTER TABLE `Impresoras`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `Ingresos`
--
ALTER TABLE `Ingresos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_Ingresos_Pacientes` (`idPaciente`),
  ADD KEY `FK_Ingresos_Usuarios` (`idUsuario`);

--
-- Indices de la tabla `Interfases`
--
ALTER TABLE `Interfases`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `Laboratorio`
--
ALTER TABLE `Laboratorio`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `list_reactivos`
--
ALTER TABLE `list_reactivos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `list_reactivos_id_equipo_foreign` (`id_equipo`),
  ADD KEY `list_reactivos_id_reactivos_foreign` (`id_reactivos`);

--
-- Indices de la tabla `LPrecio`
--
ALTER TABLE `LPrecio`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `LTrabajo`
--
ALTER TABLE `LTrabajo`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `Medicos`
--
ALTER TABLE `Medicos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `Menu`
--
ALTER TABLE `Menu`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `Metodologia`
--
ALTER TABLE `Metodologia`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Moneda`
--
ALTER TABLE `Moneda`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `MotxAnu`
--
ALTER TABLE `MotxAnu`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `NCredito`
--
ALTER TABLE `NCredito`
  ADD PRIMARY KEY (`NSerie`,`ID`),
  ADD KEY `FK_NCredito_Usuarios` (`idUsuario`);

--
-- Indices de la tabla `NCxDetalle`
--
ALTER TABLE `NCxDetalle`
  ADD PRIMARY KEY (`idNcredito`,`idExamen`);

--
-- Indices de la tabla `NDebito`
--
ALTER TABLE `NDebito`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_NDebito_Usuarios` (`idUsuario`);

--
-- Indices de la tabla `Ordenes`
--
ALTER TABLE `Ordenes`
  ADD PRIMARY KEY (`idMuestra`,`idExamen`),
  ADD KEY `FK_Ordenes_Secciones` (`idSeccion`),
  ADD KEY `FK_Ordenes_Usuarios` (`idUsuario`);

--
-- Indices de la tabla `Orina`
--
ALTER TABLE `Orina`
  ADD PRIMARY KEY (`idMuestra`,`idExamen`);

--
-- Indices de la tabla `Pacientes`
--
ALTER TABLE `Pacientes`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `Pagos`
--
ALTER TABLE `Pagos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_Pagos_Usuarios` (`idUsuario`);

--
-- Indices de la tabla `PagosMult`
--
ALTER TABLE `PagosMult`
  ADD PRIMARY KEY (`idPago`,`NSerie`,`idFactura`),
  ADD KEY `FK_PagosMult_SerieFact` (`NSerie`);

--
-- Indices de la tabla `Pagosxd`
--
ALTER TABLE `Pagosxd`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Permisos`
--
ALTER TABLE `Permisos`
  ADD PRIMARY KEY (`idUsuario`,`idControl`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `PreOrden`
--
ALTER TABLE `PreOrden`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_PreOrden_Usuarios` (`idUsuario`);

--
-- Indices de la tabla `Presupuesto`
--
ALTER TABLE `Presupuesto`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pruebas`
--
ALTER TABLE `pruebas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pruebas_id_cliente_foreign` (`id_cliente`);

--
-- Indices de la tabla `queue_numbers`
--
ALTER TABLE `queue_numbers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reactivos`
--
ALTER TABLE `reactivos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reactivos_id_prueba_foreign` (`id_prueba`);

--
-- Indices de la tabla `Recargos`
--
ALTER TABLE `Recargos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `Referencia`
--
ALTER TABLE `Referencia`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `Relaciones`
--
ALTER TABLE `Relaciones`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `RepGenerico`
--
ALTER TABLE `RepGenerico`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `Secciones`
--
ALTER TABLE `Secciones`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `PK_Secciones` (`ID`);

--
-- Indices de la tabla `Seguridad`
--
ALTER TABLE `Seguridad`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `SerieFact`
--
ALTER TABLE `SerieFact`
  ADD PRIMARY KEY (`NSerie`),
  ADD UNIQUE KEY `PK_SerieFact` (`ID`);

--
-- Indices de la tabla `ServExt`
--
ALTER TABLE `ServExt`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `ServRefExt`
--
ALTER TABLE `ServRefExt`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `SubConv`
--
ALTER TABLE `SubConv`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `SubMenu`
--
ALTER TABLE `SubMenu`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `Sucursales`
--
ALTER TABLE `Sucursales`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `Tareas`
--
ALTER TABLE `Tareas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `TecladoD`
--
ALTER TABLE `TecladoD`
  ADD PRIMARY KEY (`idTeclado`,`Tag`);

--
-- Indices de la tabla `Tracking`
--
ALTER TABLE `Tracking`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `Ubicacion`
--
ALTER TABLE `Ubicacion`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `Unidades`
--
ALTER TABLE `Unidades`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `PK_Unidades` (`ID`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `UxConvenio`
--
ALTER TABLE `UxConvenio`
  ADD PRIMARY KEY (`idConvenio`,`idUbicacion`);

--
-- Indices de la tabla `valparam`
--
ALTER TABLE `valparam`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `PK_ID` (`ID`),
  ADD KEY `FK_ValParam_Metodologia` (`idMetodo`),
  ADD KEY `FK_ValParam_Unidades` (`idUnidad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `collection_data`
--
ALTER TABLE `collection_data`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `equiposP`
--
ALTER TABLE `equiposP`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `list_reactivos`
--
ALTER TABLE `list_reactivos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pruebas`
--
ALTER TABLE `pruebas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `queue_numbers`
--
ALTER TABLE `queue_numbers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reactivos`
--
ALTER TABLE `reactivos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Asignar`
--
ALTER TABLE `Asignar`
  ADD CONSTRAINT `FK_Asignar_Interfases` FOREIGN KEY (`idInterfase`) REFERENCES `Interfases` (`ID`),
  ADD CONSTRAINT `FK_Asignar_Metodologia` FOREIGN KEY (`idMetodo`) REFERENCES `Metodologia` (`ID`);

--
-- Filtros para la tabla `collection_data`
--
ALTER TABLE `collection_data`
  ADD CONSTRAINT `collection_data_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_id_proveedor_foreign` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id`),
  ADD CONSTRAINT `compras_id_reactivo_foreign` FOREIGN KEY (`id_reactivo`) REFERENCES `reactivos` (`id`);

--
-- Filtros para la tabla `Convenios`
--
ALTER TABLE `Convenios`
  ADD CONSTRAINT `FK_Convenios_LPrecio` FOREIGN KEY (`idLPrecio`) REFERENCES `LPrecio` (`ID`),
  ADD CONSTRAINT `FK_Convenios_Moneda` FOREIGN KEY (`idMoneda`) REFERENCES `Moneda` (`ID`);

--
-- Filtros para la tabla `Cuantitativo`
--
ALTER TABLE `Cuantitativo`
  ADD CONSTRAINT `FK_Cuantitativo_Metodologia` FOREIGN KEY (`idMetodoR`) REFERENCES `Metodologia` (`ID`);

--
-- Filtros para la tabla `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `Examenes`
--
ALTER TABLE `Examenes`
  ADD CONSTRAINT `FK_Examenes_Secciones` FOREIGN KEY (`idSeccion`) REFERENCES `Secciones` (`ID`);

--
-- Filtros para la tabla `ExLPrecio`
--
ALTER TABLE `ExLPrecio`
  ADD CONSTRAINT `FK_ExLPrecio_Examenes` FOREIGN KEY (`idExamen`) REFERENCES `Examenes` (`ID`),
  ADD CONSTRAINT `FK_ExLPrecio_LPrecio` FOREIGN KEY (`idLPrecio`) REFERENCES `LPrecio` (`ID`),
  ADD CONSTRAINT `FK_ExLPrecio_Moneda` FOREIGN KEY (`idMoneda`) REFERENCES `Moneda` (`ID`);

--
-- Filtros para la tabla `Exreferencia`
--
ALTER TABLE `Exreferencia`
  ADD CONSTRAINT `FK_Exreferencia_referencia` FOREIGN KEY (`idReferencia`) REFERENCES `Referencia` (`ID`);

--
-- Filtros para la tabla `Facturas`
--
ALTER TABLE `Facturas`
  ADD CONSTRAINT `FK_Facturas_Convenios` FOREIGN KEY (`idConvenio`) REFERENCES `Convenios` (`ID`),
  ADD CONSTRAINT `FK_Facturas_SerieFact` FOREIGN KEY (`NSerie`) REFERENCES `SerieFact` (`NSerie`);

--
-- Filtros para la tabla `General`
--
ALTER TABLE `General`
  ADD CONSTRAINT `FK_General_Unidades` FOREIGN KEY (`idUnidad`) REFERENCES `Unidades` (`ID`);

--
-- Filtros para la tabla `Ingresos`
--
ALTER TABLE `Ingresos`
  ADD CONSTRAINT `FK_Ingresos_Pacientes` FOREIGN KEY (`idPaciente`) REFERENCES `Pacientes` (`ID`),
  ADD CONSTRAINT `FK_Ingresos_Usuarios` FOREIGN KEY (`idUsuario`) REFERENCES `Usuarios` (`ID`);

--
-- Filtros para la tabla `list_reactivos`
--
ALTER TABLE `list_reactivos`
  ADD CONSTRAINT `list_reactivos_id_equipo_foreign` FOREIGN KEY (`id_equipo`) REFERENCES `equiposP` (`id`),
  ADD CONSTRAINT `list_reactivos_id_reactivos_foreign` FOREIGN KEY (`id_reactivos`) REFERENCES `reactivos` (`id`);

--
-- Filtros para la tabla `NCredito`
--
ALTER TABLE `NCredito`
  ADD CONSTRAINT `FK_NCredito_SerieFact` FOREIGN KEY (`NSerie`) REFERENCES `SerieFact` (`NSerie`),
  ADD CONSTRAINT `FK_NCredito_Usuarios` FOREIGN KEY (`idUsuario`) REFERENCES `Usuarios` (`ID`);

--
-- Filtros para la tabla `NDebito`
--
ALTER TABLE `NDebito`
  ADD CONSTRAINT `FK_NDebito_Usuarios` FOREIGN KEY (`idUsuario`) REFERENCES `Usuarios` (`ID`);

--
-- Filtros para la tabla `Ordenes`
--
ALTER TABLE `Ordenes`
  ADD CONSTRAINT `FK_Ordenes_Secciones` FOREIGN KEY (`idSeccion`) REFERENCES `Secciones` (`ID`),
  ADD CONSTRAINT `FK_Ordenes_Usuarios` FOREIGN KEY (`idUsuario`) REFERENCES `Usuarios` (`ID`);

--
-- Filtros para la tabla `Pagos`
--
ALTER TABLE `Pagos`
  ADD CONSTRAINT `FK_Pagos_Usuarios` FOREIGN KEY (`idUsuario`) REFERENCES `Usuarios` (`ID`);

--
-- Filtros para la tabla `PagosMult`
--
ALTER TABLE `PagosMult`
  ADD CONSTRAINT `FK_PagosMult_Facturas` FOREIGN KEY (`NSerie`) REFERENCES `Facturas` (`NSerie`),
  ADD CONSTRAINT `FK_PagosMult_SerieFact` FOREIGN KEY (`NSerie`) REFERENCES `SerieFact` (`NSerie`);

--
-- Filtros para la tabla `PreOrden`
--
ALTER TABLE `PreOrden`
  ADD CONSTRAINT `FK_PreOrden_Usuarios` FOREIGN KEY (`idUsuario`) REFERENCES `Usuarios` (`ID`);

--
-- Filtros para la tabla `pruebas`
--
ALTER TABLE `pruebas`
  ADD CONSTRAINT `pruebas_id_cliente_foreign` FOREIGN KEY (`id_cliente`) REFERENCES `patients` (`id`);

--
-- Filtros para la tabla `reactivos`
--
ALTER TABLE `reactivos`
  ADD CONSTRAINT `reactivos_id_prueba_foreign` FOREIGN KEY (`id_prueba`) REFERENCES `pruebas` (`id`);

--
-- Filtros para la tabla `valparam`
--
ALTER TABLE `valparam`
  ADD CONSTRAINT `FK_ValParam_Metodologia` FOREIGN KEY (`idMetodo`) REFERENCES `Metodologia` (`ID`),
  ADD CONSTRAINT `FK_ValParam_Unidades` FOREIGN KEY (`idUnidad`) REFERENCES `Unidades` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
