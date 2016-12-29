-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Дек 29 2016 г., 22:32
-- Версия сервера: 5.6.33
-- Версия PHP: 5.6.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `listbook`
--

-- --------------------------------------------------------

--
-- Структура таблицы `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `author`
--

INSERT INTO `author` (`id`, `name`) VALUES
(1, 'Дэн Браун'),
(2, 'Дуглас Адамс'),
(3, 'Теодор- Валенси'),
(4, 'Артуро Перес Реверте'),
(5, 'Владимир Кунин'),
(10, 'Федор михалыч'),
(11, 'Иван Петрович');

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(255) NOT NULL,
  `pages` int(11) NOT NULL,
  `genre` varchar(60) NOT NULL,
  `annotation` text NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `pages`, `genre`, `annotation`, `img`) VALUES
(1, 'Цифровая крепость', '1,2', 525, '1,2', 'Автор СУПЕРБЕСТСЕЛЛЕРА ДЕСЯТИЛЕТИЯ предлагает вам взломать еще ОДИН КОД — сверхсложный, таящий в себе опасность и угрозу для всего мира! Но… КТО ПРИДУМАЛ этот код?! ЧЕГО он добивается?! ЗАЧЕМ вступил в безжалостную игру с Агентством национальной безопасности США?! Оружие загадочного врага — всего лишь набор символов и букв. За расшифровку берется ЛУЧШИЙ КРИПТОГРАФ Америки Сьюзан Флетчер. И то, что она обнаруживает, ставит под угрозу не только важнейшие разработки спецслужб США, но и судьбы миллионов людей… С этой секунды на Сьюзан начинается настоящая ОХОТА…', ''),
(2, 'Путеводитель хитч-хайкера по Галактике', '1,2,3', 846, '1,4', 'Отрывок из книги Путеводитель хитч-хайкера по Галактике На самом конце Западного Завитка Галактики, в захолустье, даже не занесенном на звездные карты, есть маленькая желтая звезда, не привлекающая особого внимания. В 149 миллионах километров от нее вертится маленькая зелено-голубая планета. Населяющие ее разумные формы жизни, происходящие от обезьян, настолько примитивны, что до сих пор считают электронные часы едва ли не высшим достижением техники.', ''),
(3, 'Берлиоз', '3', 654, '3', 'Если бы понадобилось подобрать девиз к жизненному пути Берлиоза, я бы избрал для этого мушкетера музыки слова: «Вопреки всему!» Близкие препятствовали тому, чтобы он следовал своему музыкальному призванию. «Я буду композитором — вопреки всему!» — говорил он.', ''),
(4, 'Кожа для барабана, или Севильское причастие', '4', 232, '4', 'В компьютер Папы Римского проникает хакер и оставляет сообщение о церкви, которая «убивает, дабы защитить себя». Ватикан отряжает в Севилью эмиссара Лорепсо Куарта – установить личность автора послания и разобраться в ситуации. Отец Куарт погружается в хитросплетения церковной политики и большого бизнеса, вынужден решать тяжелые нравственные дилеммы, распутывать детективную интригу и противостоять соблазну...', ''),
(5, 'Иванов и Рабинович, или «Ай гоу ту Хайфа!»', '5,1', 95, '6,5', 'Перед вами — подлинная КЛАССИКА отечественного «диссидентского юмора». Книга, над которой хохотали — и будут хохотать — миллионы российских читателей, снова и снова не устающих наслаждаться «одиссеей» Иванова и Рабиновича, купивших по дешевке «исторически ценное» антикварное суденышко и отправившихся па нем в «далекую и загадочную» Хайфу. Где она, эта самая Хайфа, и что она вообще такое?! Пожалуй, не важно это не только для Иванова и Рабиновича, но и для нас — покоренных полетом иронического воображения Владимира Кунина!', ''),
(6, 'Гарри Поттер 1', '1,2,3', 0, '1,2,3', 'Гарри Поттер 1Гарри Поттер 1Гарри Поттер 1Гарри Поттер 1Гарри Поттер 1Гарри Поттер 1Гарри Поттер 1Гарри Поттер 1Гарри Поттер 1', ''),
(7, 'Гарри Поттер 2', '1,4', 0, '2,4,6', 'Гарри Поттер 2Гарри Поттер 2Гарри Поттер 2Гарри Поттер 2Гарри Поттер 2Гарри Поттер 2Гарри Поттер 2Гарри Поттер 2Гарри Поттер 2Гарри Поттер 2', ''),
(8, 'Гарри Поттер 3', '1,5', 0, '1,6', 'Гарри Поттер 3Гарри Поттер 3Гарри Поттер 3Гарри Поттер 3Гарри Поттер 3Гарри Поттер 3Гарри Поттер 3Гарри Поттер 3Гарри Поттер 3Гарри Поттер 3', ''),
(19, 'Гарри Поттер 5', '1,11', 0, '1,5', 'Гарри Поттер 4Гарри Поттер 4Гарри Поттер 4Гарри Поттер 4Гарри Поттер 4Гарри Поттер 4Гарри Поттер 4Гарри Поттер 4Гарри Поттер 4', 'ElvinJones_LeeTanner.jpg'),
(20, 'Гарри Поттер 4', '4,10', 0, '4,5', 'Гарри Поттер 5Гарри Поттер 5Гарри Поттер 5Гарри Поттер 5Гарри Поттер 5Гарри Поттер 5Гарри Поттер 5Гарри Поттер 5Гарри Поттер 5Гарри Поттер 5Гарри Поттер 5Гарри Поттер 5Гарри Поттер 5Гарри Поттер 5Гарри Поттер 5', 'bmw_m1_hood.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `genre`
--

INSERT INTO `genre` (`id`, `title`) VALUES
(1, 'фантастика'),
(2, 'История'),
(3, 'детектив'),
(4, 'юмор'),
(5, 'Комедия'),
(6, 'Ужасы');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT для таблицы `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
