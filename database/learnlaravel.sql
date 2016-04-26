--
-- PostgreSQL database dump
--

-- Dumped from database version 9.5.1
-- Dumped by pg_dump version 9.5.1

-- Started on 2016-04-26 11:28:14

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 1 (class 3079 OID 12355)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2254 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 186 (class 1259 OID 16524)
-- Name: blog; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE blog (
    blog_id integer NOT NULL,
    blog_title character varying(255) NOT NULL,
    blog_content text NOT NULL,
    slug character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    blog_created_by character varying(255),
    blog_category_id character varying(255),
    blog_featured_image character varying(255),
    deleted_at timestamp(0) without time zone
);


ALTER TABLE blog OWNER TO postgres;

--
-- TOC entry 185 (class 1259 OID 16522)
-- Name: blog_blog_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE blog_blog_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE blog_blog_id_seq OWNER TO postgres;

--
-- TOC entry 2255 (class 0 OID 0)
-- Dependencies: 185
-- Name: blog_blog_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE blog_blog_id_seq OWNED BY blog.blog_id;


--
-- TOC entry 190 (class 1259 OID 16591)
-- Name: categories; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE categories (
    category_id integer NOT NULL,
    category_slug character varying(255) NOT NULL,
    category_name character varying(255) NOT NULL,
    category_description character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE categories OWNER TO postgres;

--
-- TOC entry 189 (class 1259 OID 16589)
-- Name: categories_category_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE categories_category_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE categories_category_id_seq OWNER TO postgres;

--
-- TOC entry 2256 (class 0 OID 0)
-- Dependencies: 189
-- Name: categories_category_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE categories_category_id_seq OWNED BY categories.category_id;


--
-- TOC entry 191 (class 1259 OID 16600)
-- Name: category_relation; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE category_relation (
    relation_blog_id integer NOT NULL,
    relation_category_id integer NOT NULL,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE category_relation OWNER TO postgres;

--
-- TOC entry 188 (class 1259 OID 16559)
-- Name: comments; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE comments (
    comment_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    comment_slug character varying(255) NOT NULL,
    comment_content character varying(255) NOT NULL,
    comment_created_by character varying(255) NOT NULL,
    status smallint NOT NULL,
    email character varying(255) NOT NULL,
    comment_blog_id integer NOT NULL,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE comments OWNER TO postgres;

--
-- TOC entry 187 (class 1259 OID 16557)
-- Name: comments_comment_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE comments_comment_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE comments_comment_id_seq OWNER TO postgres;

--
-- TOC entry 2257 (class 0 OID 0)
-- Dependencies: 187
-- Name: comments_comment_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE comments_comment_id_seq OWNED BY comments.comment_id;


--
-- TOC entry 193 (class 1259 OID 16637)
-- Name: media; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE media (
    media_id integer NOT NULL,
    media_slug character varying(255) NOT NULL,
    media_name character varying(255) NOT NULL,
    media_description text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE media OWNER TO postgres;

--
-- TOC entry 192 (class 1259 OID 16635)
-- Name: media_media_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE media_media_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE media_media_id_seq OWNER TO postgres;

--
-- TOC entry 2258 (class 0 OID 0)
-- Dependencies: 192
-- Name: media_media_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE media_media_id_seq OWNED BY media.media_id;


--
-- TOC entry 181 (class 1259 OID 16498)
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE migrations (
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE migrations OWNER TO postgres;

--
-- TOC entry 184 (class 1259 OID 16514)
-- Name: password_resets; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone NOT NULL
);


ALTER TABLE password_resets OWNER TO postgres;

--
-- TOC entry 201 (class 1259 OID 17036)
-- Name: permission_role; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE permission_role (
    id integer NOT NULL,
    permission_id integer NOT NULL,
    role_id integer NOT NULL,
    granted boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE permission_role OWNER TO postgres;

--
-- TOC entry 200 (class 1259 OID 17034)
-- Name: permission_role_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE permission_role_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE permission_role_id_seq OWNER TO postgres;

--
-- TOC entry 2259 (class 0 OID 0)
-- Dependencies: 200
-- Name: permission_role_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE permission_role_id_seq OWNED BY permission_role.id;


--
-- TOC entry 203 (class 1259 OID 17057)
-- Name: permission_user; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE permission_user (
    id integer NOT NULL,
    permission_id integer NOT NULL,
    user_id integer NOT NULL,
    granted boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE permission_user OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 17055)
-- Name: permission_user_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE permission_user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE permission_user_id_seq OWNER TO postgres;

--
-- TOC entry 2260 (class 0 OID 0)
-- Dependencies: 202
-- Name: permission_user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE permission_user_id_seq OWNED BY permission_user.id;


--
-- TOC entry 199 (class 1259 OID 17025)
-- Name: permissions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE permissions (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    slug character varying(255) NOT NULL,
    description character varying(255),
    model character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE permissions OWNER TO postgres;

--
-- TOC entry 198 (class 1259 OID 17023)
-- Name: permissions_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE permissions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE permissions_id_seq OWNER TO postgres;

--
-- TOC entry 2261 (class 0 OID 0)
-- Dependencies: 198
-- Name: permissions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE permissions_id_seq OWNED BY permissions.id;


--
-- TOC entry 197 (class 1259 OID 17004)
-- Name: role_user; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE role_user (
    id integer NOT NULL,
    role_id integer NOT NULL,
    user_id integer NOT NULL,
    granted boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE role_user OWNER TO postgres;

--
-- TOC entry 196 (class 1259 OID 17002)
-- Name: role_user_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE role_user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE role_user_id_seq OWNER TO postgres;

--
-- TOC entry 2262 (class 0 OID 0)
-- Dependencies: 196
-- Name: role_user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE role_user_id_seq OWNED BY role_user.id;


--
-- TOC entry 195 (class 1259 OID 16986)
-- Name: roles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE roles (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    slug character varying(255) NOT NULL,
    description character varying(255),
    parent_id integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE roles OWNER TO postgres;

--
-- TOC entry 194 (class 1259 OID 16984)
-- Name: roles_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE roles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE roles_id_seq OWNER TO postgres;

--
-- TOC entry 2263 (class 0 OID 0)
-- Dependencies: 194
-- Name: roles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE roles_id_seq OWNED BY roles.id;


--
-- TOC entry 183 (class 1259 OID 16503)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE users (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    provider character varying(255)
);


ALTER TABLE users OWNER TO postgres;

--
-- TOC entry 182 (class 1259 OID 16501)
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE users_id_seq OWNER TO postgres;

--
-- TOC entry 2264 (class 0 OID 0)
-- Dependencies: 182
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


--
-- TOC entry 2056 (class 2604 OID 16527)
-- Name: blog_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY blog ALTER COLUMN blog_id SET DEFAULT nextval('blog_blog_id_seq'::regclass);


--
-- TOC entry 2058 (class 2604 OID 16594)
-- Name: category_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY categories ALTER COLUMN category_id SET DEFAULT nextval('categories_category_id_seq'::regclass);


--
-- TOC entry 2057 (class 2604 OID 16562)
-- Name: comment_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY comments ALTER COLUMN comment_id SET DEFAULT nextval('comments_comment_id_seq'::regclass);


--
-- TOC entry 2059 (class 2604 OID 16640)
-- Name: media_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY media ALTER COLUMN media_id SET DEFAULT nextval('media_media_id_seq'::regclass);


--
-- TOC entry 2064 (class 2604 OID 17039)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY permission_role ALTER COLUMN id SET DEFAULT nextval('permission_role_id_seq'::regclass);


--
-- TOC entry 2066 (class 2604 OID 17060)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY permission_user ALTER COLUMN id SET DEFAULT nextval('permission_user_id_seq'::regclass);


--
-- TOC entry 2063 (class 2604 OID 17028)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY permissions ALTER COLUMN id SET DEFAULT nextval('permissions_id_seq'::regclass);


--
-- TOC entry 2061 (class 2604 OID 17007)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY role_user ALTER COLUMN id SET DEFAULT nextval('role_user_id_seq'::regclass);


--
-- TOC entry 2060 (class 2604 OID 16989)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY roles ALTER COLUMN id SET DEFAULT nextval('roles_id_seq'::regclass);


--
-- TOC entry 2055 (class 2604 OID 16506)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- TOC entry 2229 (class 0 OID 16524)
-- Dependencies: 186
-- Data for Name: blog; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY blog (blog_id, blog_title, blog_content, slug, created_at, updated_at, blog_created_by, blog_category_id, blog_featured_image, deleted_at) FROM stdin;
7	trying new Post 	<p>yeah this is a new one</p>\r\n	570c8529e879b	2016-04-12 12:18:33	2016-04-12 12:18:33	\N	\N	\N	\N
15	asdf	<p>assd</p>\r\n	570dc42b9c3d6	2016-04-13 10:59:39	2016-04-13 10:59:39	\N	\N	DN 2016-03-23 12-34-25 Wed.jpg	\N
18	Post 3	<p>affffffffffffffafaf</p>\r\n	571b1993edc92	2016-04-23 13:43:31	2016-04-23 13:53:44	\N	\N		2016-04-23 13:53:44
20	Post 5	<p>affffffaf</p>\r\n	571b1db552628	2016-04-23 14:01:09	2016-04-23 14:01:09	\N	\N		\N
19	Post 4	<p>asfaf</p>\r\n	571b1d9c4f981	2016-04-23 14:00:44	2016-04-23 14:01:21	\N	\N		2016-04-23 14:01:21
\.


--
-- TOC entry 2265 (class 0 OID 0)
-- Dependencies: 185
-- Name: blog_blog_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('blog_blog_id_seq', 20, true);


--
-- TOC entry 2233 (class 0 OID 16591)
-- Dependencies: 190
-- Data for Name: categories; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY categories (category_id, category_slug, category_name, category_description, created_at, updated_at, deleted_at) FROM stdin;
4	570c776162f96	Category 2	this is category 2	2016-04-12 11:19:45	2016-04-12 11:19:45	\N
1	570b1b0792241	Category 1	this is first category	2016-04-11 10:33:27	2016-04-12 12:24:27	\N
5	571b1d85c4f49	Category 3	this is the third category	2016-04-23 14:00:21	2016-04-23 14:00:21	\N
\.


--
-- TOC entry 2266 (class 0 OID 0)
-- Dependencies: 189
-- Name: categories_category_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('categories_category_id_seq', 5, true);


--
-- TOC entry 2234 (class 0 OID 16600)
-- Dependencies: 191
-- Data for Name: category_relation; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY category_relation (relation_blog_id, relation_category_id, deleted_at) FROM stdin;
7	1	\N
7	4	\N
18	4	2016-04-23 13:53:44
18	1	2016-04-23 13:53:44
20	5	\N
19	5	2016-04-23 14:01:21
\.


--
-- TOC entry 2231 (class 0 OID 16559)
-- Dependencies: 188
-- Data for Name: comments; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY comments (comment_id, created_at, updated_at, comment_slug, comment_content, comment_created_by, status, email, comment_blog_id, deleted_at) FROM stdin;
\.


--
-- TOC entry 2267 (class 0 OID 0)
-- Dependencies: 187
-- Name: comments_comment_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('comments_comment_id_seq', 9, true);


--
-- TOC entry 2236 (class 0 OID 16637)
-- Dependencies: 193
-- Data for Name: media; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY media (media_id, media_slug, media_name, media_description, created_at, updated_at, deleted_at) FROM stdin;
7	57163677433f3	DN 2016-03-25 14-22-59 Fri.jpg	This is an image	2016-04-19 20:45:27	2016-04-20 11:37:31	\N
10	571721163225b	yui azusa 4.jpg	\N	2016-04-20 13:26:30	2016-04-23 12:15:24	\N
\.


--
-- TOC entry 2268 (class 0 OID 0)
-- Dependencies: 192
-- Name: media_media_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('media_media_id_seq', 10, true);


--
-- TOC entry 2224 (class 0 OID 16498)
-- Dependencies: 181
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY migrations (migration, batch) FROM stdin;
2014_10_12_000000_create_users_table	1
2014_10_12_100000_create_password_resets_table	1
2016_03_22_040439_create_table_blog	2
2016_03_29_052228_add_blog_created_by_to_blog	3
2016_03_29_054856_add_table_comments	4
2016_03_30_063537_add_email_status_to_comments	5
2016_04_10_204757_create_table_categories	6
2016_04_10_214222_create_table_category_relation	7
2016_04_13_100405_add_coloumn_featured_to_blog	8
2016_04_16_210425_create_media_table	9
2016_04_19_215121_add_column_softdelete	10
2016_04_22_201239_add_column_provider	11
2016_04_23_111421_add_column_delete_at_blog	12
2016_04_23_124209_add_column_delete_at_catrelation	13
2016_04_23_131617_add_column_delete_at_comment	14
2016_04_24_053423_add_softdelete_to_categories	15
2015_01_15_105324_create_roles_table	16
2015_01_15_114412_create_role_user_table	16
2015_01_26_115212_create_permissions_table	16
2015_01_26_115523_create_permission_role_table	16
2015_02_09_132439_create_permission_user_table	16
\.


--
-- TOC entry 2227 (class 0 OID 16514)
-- Dependencies: 184
-- Data for Name: password_resets; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY password_resets (email, token, created_at) FROM stdin;
\.


--
-- TOC entry 2244 (class 0 OID 17036)
-- Dependencies: 201
-- Data for Name: permission_role; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY permission_role (id, permission_id, role_id, granted, created_at, updated_at) FROM stdin;
1	1	2	t	2016-04-24 21:11:12	2016-04-24 21:11:12
\.


--
-- TOC entry 2269 (class 0 OID 0)
-- Dependencies: 200
-- Name: permission_role_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('permission_role_id_seq', 1, true);


--
-- TOC entry 2246 (class 0 OID 17057)
-- Dependencies: 203
-- Data for Name: permission_user; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY permission_user (id, permission_id, user_id, granted, created_at, updated_at) FROM stdin;
\.


--
-- TOC entry 2270 (class 0 OID 0)
-- Dependencies: 202
-- Name: permission_user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('permission_user_id_seq', 1, false);


--
-- TOC entry 2242 (class 0 OID 17025)
-- Dependencies: 199
-- Data for Name: permissions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY permissions (id, name, slug, description, model, created_at, updated_at) FROM stdin;
1	Edit Blog	edit.blog	\N	App\\Blog	2016-04-24 21:11:12	2016-04-24 21:11:12
2	Edit Categories	edit.categories	\N	App\\Categories	2016-04-24 21:11:12	2016-04-24 21:11:12
3	Edit Media	edit.media	\N	App\\Media	2016-04-24 21:11:12	2016-04-24 21:11:12
\.


--
-- TOC entry 2271 (class 0 OID 0)
-- Dependencies: 198
-- Name: permissions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('permissions_id_seq', 3, true);


--
-- TOC entry 2240 (class 0 OID 17004)
-- Dependencies: 197
-- Data for Name: role_user; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY role_user (id, role_id, user_id, granted, created_at, updated_at) FROM stdin;
1	1	1	t	2016-04-24 20:37:13	2016-04-24 20:37:13
2	2	4	t	2016-04-24 20:37:13	2016-04-24 20:37:13
\.


--
-- TOC entry 2272 (class 0 OID 0)
-- Dependencies: 196
-- Name: role_user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('role_user_id_seq', 2, true);


--
-- TOC entry 2238 (class 0 OID 16986)
-- Dependencies: 195
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY roles (id, name, slug, description, parent_id, created_at, updated_at) FROM stdin;
1	Admin	admin		\N	2016-04-24 20:27:13	2016-04-24 20:27:13
2	Blog Writer	blog.writer		1	2016-04-24 20:27:14	2016-04-24 20:27:14
\.


--
-- TOC entry 2273 (class 0 OID 0)
-- Dependencies: 194
-- Name: roles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('roles_id_seq', 2, true);


--
-- TOC entry 2226 (class 0 OID 16503)
-- Dependencies: 183
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY users (id, name, email, password, remember_token, created_at, updated_at, provider) FROM stdin;
13	Muhammad Zuhrul Umam	reddesolator@yahoo.co.id	$2y$10$FusavIgDtCwoB0FSq1aFK.DKioZv5hS2FRV.j.NG4k2itoTx8NHVO	C250N7je2g7K4uAkNlp66FfPCmQ3gMiByoVHWXhh3MXan6rcZVNTxmUbkl9m	2016-04-22 22:05:19	2016-04-24 20:39:33	facebook
4	Hinata Shoyo	zuhrulu16@gmail.com	$2y$10$mODa2N32/gAzIHhqm8QTBOe58Kw9jMJ.GjEnx20l7cKB69GANWGri	nlJ1VwnZqzTalz4pyH7AfQBL3XcZj8mzWYoRDgh6rPTgWkfxyFvdBvXnCh35	2016-04-21 11:46:12	2016-04-24 20:43:40	\N
1	Muhammad Zuhrul Umam	zuhrulu@gmail.com	$2y$10$BYYIlGF0dTS5c5ySummcW.JluCIJ5VIWw2PQQenB.CKka8QqY3yKi	Vp1g1bbiKygTawByHawPkzLkhVX2T1M9SVyTxakBkZDjlEndshWYzrEBXgxe	2016-04-21 11:45:05	2016-04-24 21:12:23	\N
\.


--
-- TOC entry 2274 (class 0 OID 0)
-- Dependencies: 182
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('users_id_seq', 13, true);


--
-- TOC entry 2075 (class 2606 OID 16532)
-- Name: blog_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY blog
    ADD CONSTRAINT blog_pkey PRIMARY KEY (blog_id);


--
-- TOC entry 2079 (class 2606 OID 16599)
-- Name: categories_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY categories
    ADD CONSTRAINT categories_pkey PRIMARY KEY (category_id);


--
-- TOC entry 2077 (class 2606 OID 16567)
-- Name: comments_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY comments
    ADD CONSTRAINT comments_pkey PRIMARY KEY (comment_id);


--
-- TOC entry 2081 (class 2606 OID 16645)
-- Name: media_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY media
    ADD CONSTRAINT media_pkey PRIMARY KEY (media_id);


--
-- TOC entry 2094 (class 2606 OID 17042)
-- Name: permission_role_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY permission_role
    ADD CONSTRAINT permission_role_pkey PRIMARY KEY (id);


--
-- TOC entry 2098 (class 2606 OID 17063)
-- Name: permission_user_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY permission_user
    ADD CONSTRAINT permission_user_pkey PRIMARY KEY (id);


--
-- TOC entry 2091 (class 2606 OID 17033)
-- Name: permissions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY permissions
    ADD CONSTRAINT permissions_pkey PRIMARY KEY (id);


--
-- TOC entry 2087 (class 2606 OID 17010)
-- Name: role_user_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY role_user
    ADD CONSTRAINT role_user_pkey PRIMARY KEY (id);


--
-- TOC entry 2083 (class 2606 OID 16994)
-- Name: roles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id);


--
-- TOC entry 2085 (class 2606 OID 17001)
-- Name: roles_slug_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY roles
    ADD CONSTRAINT roles_slug_unique UNIQUE (slug);


--
-- TOC entry 2069 (class 2606 OID 16513)
-- Name: users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- TOC entry 2071 (class 2606 OID 16511)
-- Name: users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- TOC entry 2072 (class 1259 OID 16520)
-- Name: password_resets_email_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX password_resets_email_index ON password_resets USING btree (email);


--
-- TOC entry 2073 (class 1259 OID 16521)
-- Name: password_resets_token_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX password_resets_token_index ON password_resets USING btree (token);


--
-- TOC entry 2092 (class 1259 OID 17053)
-- Name: permission_role_permission_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX permission_role_permission_id_index ON permission_role USING btree (permission_id);


--
-- TOC entry 2095 (class 1259 OID 17054)
-- Name: permission_role_role_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX permission_role_role_id_index ON permission_role USING btree (role_id);


--
-- TOC entry 2096 (class 1259 OID 17074)
-- Name: permission_user_permission_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX permission_user_permission_id_index ON permission_user USING btree (permission_id);


--
-- TOC entry 2099 (class 1259 OID 17075)
-- Name: permission_user_user_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX permission_user_user_id_index ON permission_user USING btree (user_id);


--
-- TOC entry 2088 (class 1259 OID 17021)
-- Name: role_user_role_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX role_user_role_id_index ON role_user USING btree (role_id);


--
-- TOC entry 2089 (class 1259 OID 17022)
-- Name: role_user_user_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX role_user_user_id_index ON role_user USING btree (user_id);


--
-- TOC entry 2101 (class 2606 OID 16603)
-- Name: category_relation_relation_blog_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY category_relation
    ADD CONSTRAINT category_relation_relation_blog_id_foreign FOREIGN KEY (relation_blog_id) REFERENCES blog(blog_id);


--
-- TOC entry 2102 (class 2606 OID 16608)
-- Name: category_relation_relation_category_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY category_relation
    ADD CONSTRAINT category_relation_relation_category_id_foreign FOREIGN KEY (relation_category_id) REFERENCES categories(category_id);


--
-- TOC entry 2100 (class 2606 OID 16573)
-- Name: comment_blog_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY comments
    ADD CONSTRAINT comment_blog_id FOREIGN KEY (comment_blog_id) REFERENCES blog(blog_id);


--
-- TOC entry 2106 (class 2606 OID 17043)
-- Name: permission_role_permission_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY permission_role
    ADD CONSTRAINT permission_role_permission_id_foreign FOREIGN KEY (permission_id) REFERENCES permissions(id) ON DELETE CASCADE;


--
-- TOC entry 2107 (class 2606 OID 17048)
-- Name: permission_role_role_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY permission_role
    ADD CONSTRAINT permission_role_role_id_foreign FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE;


--
-- TOC entry 2108 (class 2606 OID 17064)
-- Name: permission_user_permission_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY permission_user
    ADD CONSTRAINT permission_user_permission_id_foreign FOREIGN KEY (permission_id) REFERENCES permissions(id) ON DELETE CASCADE;


--
-- TOC entry 2109 (class 2606 OID 17069)
-- Name: permission_user_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY permission_user
    ADD CONSTRAINT permission_user_user_id_foreign FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE;


--
-- TOC entry 2104 (class 2606 OID 17011)
-- Name: role_user_role_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY role_user
    ADD CONSTRAINT role_user_role_id_foreign FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE;


--
-- TOC entry 2105 (class 2606 OID 17016)
-- Name: role_user_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY role_user
    ADD CONSTRAINT role_user_user_id_foreign FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE;


--
-- TOC entry 2103 (class 2606 OID 16995)
-- Name: roles_parent_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY roles
    ADD CONSTRAINT roles_parent_id_foreign FOREIGN KEY (parent_id) REFERENCES roles(id);


--
-- TOC entry 2253 (class 0 OID 0)
-- Dependencies: 6
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2016-04-26 11:28:15

--
-- PostgreSQL database dump complete
--

