--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.2
-- Dumped by pg_dump version 9.6.2

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: backend_access_log; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE backend_access_log (
    id integer NOT NULL,
    user_id integer NOT NULL,
    ip_address character varying(191),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE backend_access_log OWNER TO postgres;

--
-- Name: backend_access_log_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE backend_access_log_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE backend_access_log_id_seq OWNER TO postgres;

--
-- Name: backend_access_log_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE backend_access_log_id_seq OWNED BY backend_access_log.id;


--
-- Name: backend_user_groups; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE backend_user_groups (
    id integer NOT NULL,
    name character varying(191) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    code character varying(191),
    description text,
    is_new_user_default boolean DEFAULT false NOT NULL
);


ALTER TABLE backend_user_groups OWNER TO postgres;

--
-- Name: backend_user_groups_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE backend_user_groups_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE backend_user_groups_id_seq OWNER TO postgres;

--
-- Name: backend_user_groups_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE backend_user_groups_id_seq OWNED BY backend_user_groups.id;


--
-- Name: backend_user_preferences; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE backend_user_preferences (
    id integer NOT NULL,
    user_id integer NOT NULL,
    namespace character varying(100) NOT NULL,
    "group" character varying(50) NOT NULL,
    item character varying(150) NOT NULL,
    value text
);


ALTER TABLE backend_user_preferences OWNER TO postgres;

--
-- Name: backend_user_preferences_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE backend_user_preferences_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE backend_user_preferences_id_seq OWNER TO postgres;

--
-- Name: backend_user_preferences_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE backend_user_preferences_id_seq OWNED BY backend_user_preferences.id;


--
-- Name: backend_user_roles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE backend_user_roles (
    id integer NOT NULL,
    name character varying(191) NOT NULL,
    code character varying(191),
    description text,
    permissions text,
    is_system boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE backend_user_roles OWNER TO postgres;

--
-- Name: backend_user_roles_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE backend_user_roles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE backend_user_roles_id_seq OWNER TO postgres;

--
-- Name: backend_user_roles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE backend_user_roles_id_seq OWNED BY backend_user_roles.id;


--
-- Name: backend_user_throttle; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE backend_user_throttle (
    id integer NOT NULL,
    user_id integer,
    ip_address character varying(191),
    attempts integer DEFAULT 0 NOT NULL,
    last_attempt_at timestamp(0) without time zone,
    is_suspended boolean DEFAULT false NOT NULL,
    suspended_at timestamp(0) without time zone,
    is_banned boolean DEFAULT false NOT NULL,
    banned_at timestamp(0) without time zone
);


ALTER TABLE backend_user_throttle OWNER TO postgres;

--
-- Name: backend_user_throttle_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE backend_user_throttle_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE backend_user_throttle_id_seq OWNER TO postgres;

--
-- Name: backend_user_throttle_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE backend_user_throttle_id_seq OWNED BY backend_user_throttle.id;


--
-- Name: backend_users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE backend_users (
    id integer NOT NULL,
    first_name character varying(191),
    last_name character varying(191),
    login character varying(191) NOT NULL,
    email character varying(191) NOT NULL,
    password character varying(191) NOT NULL,
    activation_code character varying(191),
    persist_code character varying(191),
    reset_password_code character varying(191),
    permissions text,
    is_activated boolean DEFAULT false NOT NULL,
    role_id integer,
    activated_at timestamp(0) without time zone,
    last_login timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone,
    is_superuser boolean DEFAULT false NOT NULL
);


ALTER TABLE backend_users OWNER TO postgres;

--
-- Name: backend_users_groups; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE backend_users_groups (
    user_id integer NOT NULL,
    user_group_id integer NOT NULL
);


ALTER TABLE backend_users_groups OWNER TO postgres;

--
-- Name: backend_users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE backend_users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE backend_users_id_seq OWNER TO postgres;

--
-- Name: backend_users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE backend_users_id_seq OWNED BY backend_users.id;


--
-- Name: cache; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE cache (
    key character varying(191) NOT NULL,
    value text NOT NULL,
    expiration integer NOT NULL
);


ALTER TABLE cache OWNER TO postgres;

--
-- Name: cms_theme_data; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE cms_theme_data (
    id integer NOT NULL,
    theme character varying(191),
    data text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE cms_theme_data OWNER TO postgres;

--
-- Name: cms_theme_data_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cms_theme_data_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cms_theme_data_id_seq OWNER TO postgres;

--
-- Name: cms_theme_data_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE cms_theme_data_id_seq OWNED BY cms_theme_data.id;


--
-- Name: cms_theme_logs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE cms_theme_logs (
    id integer NOT NULL,
    type character varying(20) NOT NULL,
    theme character varying(191),
    template character varying(191),
    old_template character varying(191),
    content text,
    old_content text,
    user_id integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE cms_theme_logs OWNER TO postgres;

--
-- Name: cms_theme_logs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cms_theme_logs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cms_theme_logs_id_seq OWNER TO postgres;

--
-- Name: cms_theme_logs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE cms_theme_logs_id_seq OWNED BY cms_theme_logs.id;


--
-- Name: cms_theme_templates; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE cms_theme_templates (
    id integer NOT NULL,
    source character varying(191) NOT NULL,
    path character varying(191) NOT NULL,
    content text NOT NULL,
    file_size integer NOT NULL,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE cms_theme_templates OWNER TO postgres;

--
-- Name: cms_theme_templates_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cms_theme_templates_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cms_theme_templates_id_seq OWNER TO postgres;

--
-- Name: cms_theme_templates_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE cms_theme_templates_id_seq OWNED BY cms_theme_templates.id;


--
-- Name: deferred_bindings; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE deferred_bindings (
    id integer NOT NULL,
    master_type character varying(191) NOT NULL,
    master_field character varying(191) NOT NULL,
    slave_type character varying(191) NOT NULL,
    slave_id character varying(191) NOT NULL,
    session_key character varying(191) NOT NULL,
    is_bind boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE deferred_bindings OWNER TO postgres;

--
-- Name: deferred_bindings_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE deferred_bindings_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE deferred_bindings_id_seq OWNER TO postgres;

--
-- Name: deferred_bindings_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE deferred_bindings_id_seq OWNED BY deferred_bindings.id;


--
-- Name: demo_casemanager_case_priorities; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_casemanager_case_priorities (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    name character varying(191) NOT NULL,
    active integer NOT NULL,
    description character varying(191) NOT NULL,
    duration bigint NOT NULL,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL
);


ALTER TABLE demo_casemanager_case_priorities OWNER TO postgres;

--
-- Name: demo_casemanager_case_priorities_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_casemanager_case_priorities_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_casemanager_case_priorities_id_seq OWNER TO postgres;

--
-- Name: demo_casemanager_case_priorities_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_casemanager_case_priorities_id_seq OWNED BY demo_casemanager_case_priorities.id;


--
-- Name: demo_casemanager_cases; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_casemanager_cases (
    id integer NOT NULL,
    title character varying(255),
    description text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer,
    updated_by_id integer,
    assigned_to_id integer,
    priority_id integer,
    case_number character varying(255) NOT NULL,
    case_version character varying(255) NOT NULL,
    version integer NOT NULL,
    suspect character varying(255) NOT NULL,
    tat_duration bigint NOT NULL,
    comments text NOT NULL
);


ALTER TABLE demo_casemanager_cases OWNER TO postgres;

--
-- Name: demo_casemanager_cases_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_casemanager_cases_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_casemanager_cases_id_seq OWNER TO postgres;

--
-- Name: demo_casemanager_cases_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_casemanager_cases_id_seq OWNED BY demo_casemanager_cases.id;


--
-- Name: demo_casemanager_projects; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_casemanager_projects (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    version integer DEFAULT 0,
    label character varying(191) NOT NULL,
    description text,
    workflow_id integer,
    name character varying(191) NOT NULL,
    project_type character varying(191),
    project_lead_id integer,
    default_assignee_id integer NOT NULL,
    image character varying(191),
    url text
);


ALTER TABLE demo_casemanager_projects OWNER TO postgres;

--
-- Name: demo_casemanager_projects_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_casemanager_projects_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_casemanager_projects_id_seq OWNER TO postgres;

--
-- Name: demo_casemanager_projects_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_casemanager_projects_id_seq OWNED BY demo_casemanager_projects.id;


--
-- Name: demo_core_audit_logs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_audit_logs (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    version integer NOT NULL,
    model character varying(191) NOT NULL,
    operation character varying(191) NOT NULL,
    record_id integer NOT NULL,
    previous text NOT NULL,
    current text
);


ALTER TABLE demo_core_audit_logs OWNER TO postgres;

--
-- Name: demo_core_audit_logs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_core_audit_logs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_core_audit_logs_id_seq OWNER TO postgres;

--
-- Name: demo_core_audit_logs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_core_audit_logs_id_seq OWNED BY demo_core_audit_logs.id;


--
-- Name: demo_core_commands; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_commands (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    updated_by_id integer NOT NULL,
    created_by_id integer NOT NULL,
    name character varying(191) NOT NULL,
    description character varying(191) NOT NULL,
    slug character varying(191) NOT NULL,
    active smallint DEFAULT '1'::smallint NOT NULL,
    arguments text NOT NULL,
    parameters text NOT NULL,
    script text NOT NULL,
    plugin_id integer NOT NULL
);


ALTER TABLE demo_core_commands OWNER TO postgres;

--
-- Name: demo_core_commands_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_core_commands_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_core_commands_id_seq OWNER TO postgres;

--
-- Name: demo_core_commands_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_core_commands_id_seq OWNED BY demo_core_commands.id;


--
-- Name: demo_core_custom_fields; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_custom_fields (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    name character varying(191) NOT NULL,
    description text NOT NULL,
    type character varying(191) NOT NULL,
    model character varying(191) NOT NULL,
    length integer,
    unsigned smallint,
    allow_null smallint NOT NULL,
    "default" text NOT NULL,
    plugin_id integer NOT NULL
);


ALTER TABLE demo_core_custom_fields OWNER TO postgres;

--
-- Name: demo_core_custom_fields_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_core_custom_fields_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_core_custom_fields_id_seq OWNER TO postgres;

--
-- Name: demo_core_custom_fields_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_core_custom_fields_id_seq OWNED BY demo_core_custom_fields.id;


--
-- Name: demo_core_event_handlers; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_event_handlers (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    event character varying(191) NOT NULL,
    name character varying(191) NOT NULL,
    description text,
    model character varying(255) NOT NULL,
    script text NOT NULL,
    sort_order integer NOT NULL,
    active smallint DEFAULT '1'::smallint NOT NULL,
    plugin_id integer NOT NULL
);


ALTER TABLE demo_core_event_handlers OWNER TO postgres;

--
-- Name: demo_core_event_handlers_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_core_event_handlers_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_core_event_handlers_id_seq OWNER TO postgres;

--
-- Name: demo_core_event_handlers_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_core_event_handlers_id_seq OWNED BY demo_core_event_handlers.id;


--
-- Name: demo_core_form_actions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_form_actions (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    name character varying(191) NOT NULL,
    label character varying(191),
    form character varying(191),
    model character varying(191),
    active boolean DEFAULT true NOT NULL,
    description text,
    icon character varying(191),
    css_class character varying(191),
    sort_order integer DEFAULT 0 NOT NULL,
    plugin_id integer NOT NULL,
    script text NOT NULL,
    context text DEFAULT '["create","update","delete"]'::text NOT NULL,
    html_attributes text DEFAULT '[]'::text NOT NULL
);


ALTER TABLE demo_core_form_actions OWNER TO postgres;

--
-- Name: demo_core_form_actions_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_core_form_actions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_core_form_actions_id_seq OWNER TO postgres;

--
-- Name: demo_core_form_actions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_core_form_actions_id_seq OWNED BY demo_core_form_actions.id;


--
-- Name: demo_core_form_fields; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_form_fields (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    label character varying(191) NOT NULL,
    field_id integer,
    form character varying(191) NOT NULL,
    plugin_id integer NOT NULL,
    controls text NOT NULL,
    description text,
    active smallint NOT NULL,
    virtual smallint NOT NULL
);


ALTER TABLE demo_core_form_fields OWNER TO postgres;

--
-- Name: demo_core_form_fields_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_core_form_fields_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_core_form_fields_id_seq OWNER TO postgres;

--
-- Name: demo_core_form_fields_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_core_form_fields_id_seq OWNED BY demo_core_form_fields.id;


--
-- Name: demo_core_iframes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_iframes (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    name character varying(191) NOT NULL,
    description text NOT NULL,
    backend_menu text NOT NULL,
    slug character varying(191) NOT NULL,
    url text NOT NULL,
    active smallint DEFAULT '1'::smallint NOT NULL,
    iframe smallint DEFAULT '1'::smallint NOT NULL
);


ALTER TABLE demo_core_iframes OWNER TO postgres;

--
-- Name: demo_core_iframes_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_core_iframes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_core_iframes_id_seq OWNER TO postgres;

--
-- Name: demo_core_iframes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_core_iframes_id_seq OWNED BY demo_core_iframes.id;


--
-- Name: demo_core_inbound_api; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_inbound_api (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    method character varying(191) NOT NULL,
    plugin_id integer NOT NULL,
    script text NOT NULL,
    name character varying(191) NOT NULL,
    description text,
    url text NOT NULL,
    active smallint DEFAULT '1'::smallint NOT NULL
);


ALTER TABLE demo_core_inbound_api OWNER TO postgres;

--
-- Name: demo_core_inbound_api_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_core_inbound_api_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_core_inbound_api_id_seq OWNER TO postgres;

--
-- Name: demo_core_inbound_api_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_core_inbound_api_id_seq OWNED BY demo_core_inbound_api.id;


--
-- Name: demo_core_libraries; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_libraries (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    plugin_id integer NOT NULL,
    name character varying(191) NOT NULL,
    description text NOT NULL,
    website text NOT NULL,
    code character varying(255)
);


ALTER TABLE demo_core_libraries OWNER TO postgres;

--
-- Name: demo_core_libraries_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_core_libraries_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_core_libraries_id_seq OWNER TO postgres;

--
-- Name: demo_core_libraries_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_core_libraries_id_seq OWNED BY demo_core_libraries.id;


--
-- Name: demo_core_list_actions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_list_actions (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    name character varying(191) NOT NULL,
    label character varying(191),
    list character varying(191),
    model character varying(191),
    active boolean DEFAULT true NOT NULL,
    description text,
    icon character varying(191),
    css_class character varying(191),
    sort_order integer DEFAULT 0 NOT NULL,
    plugin_id integer NOT NULL,
    script text NOT NULL,
    html_attributes text DEFAULT '[]'::text NOT NULL
);


ALTER TABLE demo_core_list_actions OWNER TO postgres;

--
-- Name: demo_core_list_actions_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_core_list_actions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_core_list_actions_id_seq OWNER TO postgres;

--
-- Name: demo_core_list_actions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_core_list_actions_id_seq OWNED BY demo_core_list_actions.id;


--
-- Name: demo_core_model_associations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_model_associations (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    source_model character varying(255) NOT NULL,
    target_model character varying(255) NOT NULL,
    foreign_key character varying(255),
    cascade character varying(191) DEFAULT 'none'::character varying NOT NULL,
    relation character varying(191) NOT NULL,
    plugin_id integer NOT NULL,
    cascade_priority_order integer DEFAULT 0 NOT NULL,
    description text,
    name character varying(255) NOT NULL,
    active boolean NOT NULL
);


ALTER TABLE demo_core_model_associations OWNER TO postgres;

--
-- Name: demo_core_model_associations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_core_model_associations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_core_model_associations_id_seq OWNER TO postgres;

--
-- Name: demo_core_model_associations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_core_model_associations_id_seq OWNED BY demo_core_model_associations.id;


--
-- Name: demo_core_models; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_models (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    name character varying(255) NOT NULL,
    model character varying(255) NOT NULL,
    controller character varying(255) NOT NULL,
    plugin_id integer NOT NULL,
    audit boolean DEFAULT false NOT NULL,
    record_history boolean DEFAULT false NOT NULL,
    audit_columns text DEFAULT '*'::text NOT NULL,
    description text DEFAULT ''::text,
    attach_audited_by boolean DEFAULT false NOT NULL,
    viewable boolean DEFAULT false
);


ALTER TABLE demo_core_models OWNER TO postgres;

--
-- Name: demo_core_models_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_core_models_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_core_models_id_seq OWNER TO postgres;

--
-- Name: demo_core_models_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_core_models_id_seq OWNED BY demo_core_models.id;


--
-- Name: demo_core_view_role_associations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_view_role_associations (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    version integer,
    record_id integer NOT NULL,
    role_id integer NOT NULL,
    plugin_id integer NOT NULL,
    model character varying(255)
);


ALTER TABLE demo_core_view_role_associations OWNER TO postgres;

--
-- Name: demo_core_nav_role_associations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_core_nav_role_associations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_core_nav_role_associations_id_seq OWNER TO postgres;

--
-- Name: demo_core_nav_role_associations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_core_nav_role_associations_id_seq OWNED BY demo_core_view_role_associations.id;


--
-- Name: demo_core_navigations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_navigations (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    version integer,
    label character varying(191) NOT NULL,
    type character varying(191) NOT NULL,
    active boolean NOT NULL,
    name character varying(191) NOT NULL,
    description text,
    url text,
    model character varying(191),
    view character varying(191),
    form character varying(191),
    record_id integer,
    plugin_id integer NOT NULL,
    parent_id integer,
    sort_order smallint NOT NULL,
    icon character varying(255) DEFAULT NULL::character varying,
    dashboard_id integer,
    widget_id integer,
    uipage_id integer
);


ALTER TABLE demo_core_navigations OWNER TO postgres;

--
-- Name: demo_core_navigations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_core_navigations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_core_navigations_id_seq OWNER TO postgres;

--
-- Name: demo_core_navigations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_core_navigations_id_seq OWNED BY demo_core_navigations.id;


--
-- Name: demo_core_permission_policy_associations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_permission_policy_associations (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    plugin_id integer NOT NULL,
    permission_id integer NOT NULL,
    policy_id integer NOT NULL
);


ALTER TABLE demo_core_permission_policy_associations OWNER TO postgres;

--
-- Name: demo_core_permission_policy_associations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_core_permission_policy_associations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_core_permission_policy_associations_id_seq OWNER TO postgres;

--
-- Name: demo_core_permission_policy_associations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_core_permission_policy_associations_id_seq OWNED BY demo_core_permission_policy_associations.id;


--
-- Name: demo_core_permissions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_permissions (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    plugin_id integer NOT NULL,
    model character varying(191) NOT NULL,
    operation character varying(191) NOT NULL,
    columns text,
    condition text,
    code character varying(191) NOT NULL,
    admin_override boolean DEFAULT true NOT NULL,
    name character varying(191) NOT NULL,
    description text,
    active boolean NOT NULL,
    system boolean DEFAULT false NOT NULL
);


ALTER TABLE demo_core_permissions OWNER TO postgres;

--
-- Name: demo_core_permissions_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_core_permissions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_core_permissions_id_seq OWNER TO postgres;

--
-- Name: demo_core_permissions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_core_permissions_id_seq OWNED BY demo_core_permissions.id;


--
-- Name: demo_core_role_policy_associations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_role_policy_associations (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    plugin_id integer NOT NULL,
    role_id integer NOT NULL,
    policy_id integer NOT NULL
);


ALTER TABLE demo_core_role_policy_associations OWNER TO postgres;

--
-- Name: demo_core_role_policy_associations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_core_role_policy_associations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_core_role_policy_associations_id_seq OWNER TO postgres;

--
-- Name: demo_core_role_policy_associations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_core_role_policy_associations_id_seq OWNED BY demo_core_role_policy_associations.id;


--
-- Name: demo_core_roles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_roles (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    name character varying(191) NOT NULL,
    code character varying(191) NOT NULL,
    description text NOT NULL,
    plugin_id integer NOT NULL
);


ALTER TABLE demo_core_roles OWNER TO postgres;

--
-- Name: demo_core_roles_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_core_roles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_core_roles_id_seq OWNER TO postgres;

--
-- Name: demo_core_roles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_core_roles_id_seq OWNED BY demo_core_roles.id;


--
-- Name: demo_core_security_policies; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_security_policies (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    name character varying(191) NOT NULL,
    description text NOT NULL,
    plugin_id integer NOT NULL
);


ALTER TABLE demo_core_security_policies OWNER TO postgres;

--
-- Name: demo_core_security_policies_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_core_security_policies_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_core_security_policies_id_seq OWNER TO postgres;

--
-- Name: demo_core_security_policies_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_core_security_policies_id_seq OWNED BY demo_core_security_policies.id;


--
-- Name: demo_core_ui_pages; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_ui_pages (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    version integer,
    name character varying(191) NOT NULL,
    description text,
    code character varying(191) NOT NULL,
    template text NOT NULL,
    plugin_id integer NOT NULL
);


ALTER TABLE demo_core_ui_pages OWNER TO postgres;

--
-- Name: demo_core_ui_page_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_core_ui_page_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_core_ui_page_id_seq OWNER TO postgres;

--
-- Name: demo_core_ui_page_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_core_ui_page_id_seq OWNED BY demo_core_ui_pages.id;


--
-- Name: demo_core_user_role_associations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_user_role_associations (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    user_id integer NOT NULL,
    role_id integer NOT NULL,
    plugin_id integer NOT NULL,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL
);


ALTER TABLE demo_core_user_role_associations OWNER TO postgres;

--
-- Name: demo_core_user_role_associations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_core_user_role_associations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_core_user_role_associations_id_seq OWNER TO postgres;

--
-- Name: demo_core_user_role_associations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_core_user_role_associations_id_seq OWNED BY demo_core_user_role_associations.id;


--
-- Name: demo_core_webhooks; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_webhooks (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    name character varying(191) NOT NULL,
    description text NOT NULL,
    active smallint NOT NULL,
    url text NOT NULL,
    method character varying(191) NOT NULL,
    request_headers text,
    request_body text,
    condition text,
    event character varying(255) NOT NULL,
    model character varying(255) NOT NULL,
    async boolean DEFAULT true NOT NULL,
    timeout integer DEFAULT 3600 NOT NULL
);


ALTER TABLE demo_core_webhooks OWNER TO postgres;

--
-- Name: demo_core_webhooks_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_core_webhooks_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_core_webhooks_id_seq OWNER TO postgres;

--
-- Name: demo_core_webhooks_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_core_webhooks_id_seq OWNED BY demo_core_webhooks.id;


--
-- Name: demo_notification_channels; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_notification_channels (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    script text NOT NULL,
    configuration text,
    active boolean DEFAULT true NOT NULL,
    plugin_id integer NOT NULL,
    name character varying(191) NOT NULL,
    description text
);


ALTER TABLE demo_notification_channels OWNER TO postgres;

--
-- Name: demo_notification_channels_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_notification_channels_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_notification_channels_id_seq OWNER TO postgres;

--
-- Name: demo_notification_channels_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_notification_channels_id_seq OWNED BY demo_notification_channels.id;


--
-- Name: demo_notification_logs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_notification_logs (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    notification_id integer NOT NULL,
    delivered boolean DEFAULT false NOT NULL,
    status text
);


ALTER TABLE demo_notification_logs OWNER TO postgres;

--
-- Name: demo_notification_logs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_notification_logs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_notification_logs_id_seq OWNER TO postgres;

--
-- Name: demo_notification_logs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_notification_logs_id_seq OWNED BY demo_notification_logs.id;


--
-- Name: demo_notification_notifications; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_notification_notifications (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    event character varying(255) NOT NULL,
    model character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    description text,
    condition text NOT NULL,
    plugin_id integer NOT NULL,
    active boolean NOT NULL,
    enable_logging boolean DEFAULT false NOT NULL,
    template_id integer NOT NULL,
    channel_id integer NOT NULL
);


ALTER TABLE demo_notification_notifications OWNER TO postgres;

--
-- Name: demo_notification_notifications_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_notification_notifications_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_notification_notifications_id_seq OWNER TO postgres;

--
-- Name: demo_notification_notifications_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_notification_notifications_id_seq OWNED BY demo_notification_notifications.id;


--
-- Name: demo_notification_subscribers; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_notification_subscribers (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    subscriber_id integer NOT NULL,
    subscriber_group_id integer NOT NULL,
    plugin_id integer NOT NULL,
    notification_id integer NOT NULL
);


ALTER TABLE demo_notification_subscribers OWNER TO postgres;

--
-- Name: demo_notification_subscribers_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_notification_subscribers_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_notification_subscribers_id_seq OWNER TO postgres;

--
-- Name: demo_notification_subscribers_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_notification_subscribers_id_seq OWNED BY demo_notification_subscribers.id;


--
-- Name: demo_report_dashboards; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_report_dashboards (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    name character varying(191) NOT NULL,
    description text NOT NULL,
    active smallint NOT NULL,
    config_widgets text NOT NULL,
    public smallint NOT NULL,
    code character varying(255),
    plugin_id integer
);


ALTER TABLE demo_report_dashboards OWNER TO postgres;

--
-- Name: demo_report_dashboards_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_report_dashboards_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_report_dashboards_id_seq OWNER TO postgres;

--
-- Name: demo_report_dashboards_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_report_dashboards_id_seq OWNED BY demo_report_dashboards.id;


--
-- Name: demo_report_widgets; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_report_widgets (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    name character varying(191) NOT NULL,
    code character varying(191) NOT NULL,
    description character varying(191) NOT NULL,
    template text NOT NULL,
    data text NOT NULL,
    script text NOT NULL,
    public smallint NOT NULL,
    library_id integer NOT NULL,
    plugin_id integer NOT NULL,
    active integer NOT NULL
);


ALTER TABLE demo_report_widgets OWNER TO postgres;

--
-- Name: demo_report_widgets_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_report_widgets_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_report_widgets_id_seq OWNER TO postgres;

--
-- Name: demo_report_widgets_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_report_widgets_id_seq OWNED BY demo_report_widgets.id;


--
-- Name: demo_workflow_queue_assignment_groups; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_workflow_queue_assignment_groups (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    group_id integer NOT NULL,
    queue_id integer NOT NULL,
    sort_order integer NOT NULL,
    plugin_id integer NOT NULL
);


ALTER TABLE demo_workflow_queue_assignment_groups OWNER TO postgres;

--
-- Name: demo_workflow_queue_assignment_groups_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_workflow_queue_assignment_groups_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_workflow_queue_assignment_groups_id_seq OWNER TO postgres;

--
-- Name: demo_workflow_queue_assignment_groups_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_workflow_queue_assignment_groups_id_seq OWNED BY demo_workflow_queue_assignment_groups.id;


--
-- Name: demo_workflow_queue_items; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_workflow_queue_items (
    id integer NOT NULL,
    queue_id integer NOT NULL,
    assigned_to_id integer NOT NULL,
    record_id integer NOT NULL,
    model character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    poped_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    plugin_id integer NOT NULL
);


ALTER TABLE demo_workflow_queue_items OWNER TO postgres;

--
-- Name: demo_workflow_queue_items_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_workflow_queue_items_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_workflow_queue_items_id_seq OWNER TO postgres;

--
-- Name: demo_workflow_queue_items_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_workflow_queue_items_id_seq OWNED BY demo_workflow_queue_items.id;


--
-- Name: demo_workflow_queue_pop_criterias; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_workflow_queue_pop_criterias (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    name character varying(191) NOT NULL,
    description text,
    script text NOT NULL,
    plugin_id integer NOT NULL
);


ALTER TABLE demo_workflow_queue_pop_criterias OWNER TO postgres;

--
-- Name: demo_workflow_queue_pop_criterias_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_workflow_queue_pop_criterias_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_workflow_queue_pop_criterias_id_seq OWNER TO postgres;

--
-- Name: demo_workflow_queue_pop_criterias_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_workflow_queue_pop_criterias_id_seq OWNED BY demo_workflow_queue_pop_criterias.id;


--
-- Name: demo_workflow_queue_routing_rules; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_workflow_queue_routing_rules (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    script text NOT NULL,
    name character varying(191) NOT NULL,
    description text,
    plugin_id integer NOT NULL
);


ALTER TABLE demo_workflow_queue_routing_rules OWNER TO postgres;

--
-- Name: demo_workflow_queue_routing_rules_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_workflow_queue_routing_rules_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_workflow_queue_routing_rules_id_seq OWNER TO postgres;

--
-- Name: demo_workflow_queue_routing_rules_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_workflow_queue_routing_rules_id_seq OWNED BY demo_workflow_queue_routing_rules.id;


--
-- Name: demo_workflow_queues; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_workflow_queues (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    description text NOT NULL,
    script text NOT NULL,
    active smallint DEFAULT '1'::smallint NOT NULL,
    virtual smallint DEFAULT '1'::smallint NOT NULL,
    queue_order character varying(255) NOT NULL,
    sort_order integer NOT NULL,
    input_condition text NOT NULL,
    model character varying(255) NOT NULL,
    redundancy_policy character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    plugin_id integer NOT NULL,
    service_channel_id integer NOT NULL,
    pop_criteria_id integer NOT NULL,
    routing_rule_id integer NOT NULL
);


ALTER TABLE demo_workflow_queues OWNER TO postgres;

--
-- Name: demo_workflow_queues_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_workflow_queues_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_workflow_queues_id_seq OWNER TO postgres;

--
-- Name: demo_workflow_queues_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_workflow_queues_id_seq OWNED BY demo_workflow_queues.id;


--
-- Name: demo_workflow_service_channels; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_workflow_service_channels (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    plugin_id integer NOT NULL,
    name character varying(191) NOT NULL,
    event character varying(191) NOT NULL,
    description text NOT NULL,
    model character varying(191) NOT NULL,
    inbox_order integer NOT NULL,
    active boolean DEFAULT true NOT NULL,
    assigned_to_field character varying(191) DEFAULT 'assigned_to_id'::character varying NOT NULL,
    assignment_capacity integer DEFAULT '-1'::integer NOT NULL,
    condition text NOT NULL
);


ALTER TABLE demo_workflow_service_channels OWNER TO postgres;

--
-- Name: demo_workflow_service_channels_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_workflow_service_channels_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_workflow_service_channels_id_seq OWNER TO postgres;

--
-- Name: demo_workflow_service_channels_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_workflow_service_channels_id_seq OWNED BY demo_workflow_service_channels.id;


--
-- Name: demo_workflow_workflow_items; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_workflow_workflow_items (
    id integer NOT NULL,
    workflow_id integer,
    created_by_id integer,
    updated_by_id integer,
    model character varying(255),
    record_id integer,
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    assigned_at timestamp without time zone,
    current_state_id integer,
    assigned_to_id integer,
    finished_at timestamp without time zone,
    plugin_id integer
);


ALTER TABLE demo_workflow_workflow_items OWNER TO postgres;

--
-- Name: demo_workflow_workflow_items_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_workflow_workflow_items_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_workflow_workflow_items_id_seq OWNER TO postgres;

--
-- Name: demo_workflow_workflow_items_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_workflow_workflow_items_id_seq OWNED BY demo_workflow_workflow_items.id;


--
-- Name: demo_workflow_workflow_states; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_workflow_workflow_states (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    name character varying(191) NOT NULL,
    description text NOT NULL,
    active integer NOT NULL,
    code character varying(191) NOT NULL,
    plugin_id integer NOT NULL
);


ALTER TABLE demo_workflow_workflow_states OWNER TO postgres;

--
-- Name: demo_workflow_workflow_states_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_workflow_workflow_states_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_workflow_workflow_states_id_seq OWNER TO postgres;

--
-- Name: demo_workflow_workflow_states_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_workflow_workflow_states_id_seq OWNED BY demo_workflow_workflow_states.id;


--
-- Name: demo_workflow_workflow_transitions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_workflow_workflow_transitions (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    assigned_to_id integer NOT NULL,
    workflow_item_id integer NOT NULL,
    from_state_id integer NOT NULL,
    to_state_id integer NOT NULL,
    data text,
    plugin_id integer NOT NULL
);


ALTER TABLE demo_workflow_workflow_transitions OWNER TO postgres;

--
-- Name: demo_workflow_workflow_transitions_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_workflow_workflow_transitions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_workflow_workflow_transitions_id_seq OWNER TO postgres;

--
-- Name: demo_workflow_workflow_transitions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_workflow_workflow_transitions_id_seq OWNED BY demo_workflow_workflow_transitions.id;


--
-- Name: demo_workflow_workflows; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_workflow_workflows (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    active integer DEFAULT 1 NOT NULL,
    name character varying(191) NOT NULL,
    code character varying(191) NOT NULL,
    description text NOT NULL,
    definition text NOT NULL,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    plugin_id integer NOT NULL,
    sort_order integer NOT NULL,
    model character varying(255) NOT NULL,
    input_condition text NOT NULL,
    event character varying(191)
);


ALTER TABLE demo_workflow_workflows OWNER TO postgres;

--
-- Name: demo_workflow_workflows_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE demo_workflow_workflows_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE demo_workflow_workflows_id_seq OWNER TO postgres;

--
-- Name: demo_workflow_workflows_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE demo_workflow_workflows_id_seq OWNED BY demo_workflow_workflows.id;


--
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE failed_jobs (
    id integer NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    failed_at timestamp(0) without time zone,
    exception text
);


ALTER TABLE failed_jobs OWNER TO postgres;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE failed_jobs_id_seq OWNER TO postgres;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE failed_jobs_id_seq OWNED BY failed_jobs.id;


--
-- Name: indikator_backend_trash; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE indikator_backend_trash (
    id integer NOT NULL,
    type character varying(1) DEFAULT '1'::character varying NOT NULL,
    path character varying(255) NOT NULL,
    size character varying(8) DEFAULT '0'::character varying NOT NULL
);


ALTER TABLE indikator_backend_trash OWNER TO postgres;

--
-- Name: indikator_backend_trash_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE indikator_backend_trash_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE indikator_backend_trash_id_seq OWNER TO postgres;

--
-- Name: indikator_backend_trash_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE indikator_backend_trash_id_seq OWNED BY indikator_backend_trash.id;


--
-- Name: jobs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE jobs (
    id bigint NOT NULL,
    queue character varying(191) NOT NULL,
    payload text NOT NULL,
    attempts smallint NOT NULL,
    reserved_at integer,
    available_at integer NOT NULL,
    created_at integer NOT NULL
);


ALTER TABLE jobs OWNER TO postgres;

--
-- Name: jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE jobs_id_seq OWNER TO postgres;

--
-- Name: jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE jobs_id_seq OWNED BY jobs.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE migrations (
    id integer NOT NULL,
    migration character varying(191) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE migrations OWNER TO postgres;

--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE migrations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE migrations_id_seq OWNER TO postgres;

--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE migrations_id_seq OWNED BY migrations.id;


--
-- Name: sessions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE sessions (
    id character varying(191) NOT NULL,
    payload text,
    last_activity integer,
    user_id integer,
    ip_address character varying(45),
    user_agent text
);


ALTER TABLE sessions OWNER TO postgres;

--
-- Name: system_event_logs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE system_event_logs (
    id integer NOT NULL,
    level character varying(191),
    message text,
    details text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE system_event_logs OWNER TO postgres;

--
-- Name: system_event_logs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE system_event_logs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE system_event_logs_id_seq OWNER TO postgres;

--
-- Name: system_event_logs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE system_event_logs_id_seq OWNED BY system_event_logs.id;


--
-- Name: system_files; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE system_files (
    id integer NOT NULL,
    disk_name character varying(191) NOT NULL,
    file_name character varying(191) NOT NULL,
    file_size integer NOT NULL,
    content_type character varying(191) NOT NULL,
    title character varying(191),
    description text,
    field character varying(191),
    attachment_id character varying(191),
    attachment_type character varying(191),
    is_public boolean DEFAULT true NOT NULL,
    sort_order integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE system_files OWNER TO postgres;

--
-- Name: system_files_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE system_files_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE system_files_id_seq OWNER TO postgres;

--
-- Name: system_files_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE system_files_id_seq OWNED BY system_files.id;


--
-- Name: system_mail_layouts; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE system_mail_layouts (
    id integer NOT NULL,
    name character varying(191),
    code character varying(191),
    content_html text,
    content_text text,
    content_css text,
    is_locked boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    options text
);


ALTER TABLE system_mail_layouts OWNER TO postgres;

--
-- Name: system_mail_layouts_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE system_mail_layouts_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE system_mail_layouts_id_seq OWNER TO postgres;

--
-- Name: system_mail_layouts_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE system_mail_layouts_id_seq OWNED BY system_mail_layouts.id;


--
-- Name: system_mail_partials; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE system_mail_partials (
    id integer NOT NULL,
    name character varying(191),
    code character varying(191),
    content_html text,
    content_text text,
    is_custom boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE system_mail_partials OWNER TO postgres;

--
-- Name: system_mail_partials_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE system_mail_partials_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE system_mail_partials_id_seq OWNER TO postgres;

--
-- Name: system_mail_partials_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE system_mail_partials_id_seq OWNED BY system_mail_partials.id;


--
-- Name: system_mail_templates; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE system_mail_templates (
    id integer NOT NULL,
    code character varying(191),
    subject character varying(191),
    description text,
    content_html text,
    content_text text,
    layout_id integer,
    is_custom boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE system_mail_templates OWNER TO postgres;

--
-- Name: system_mail_templates_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE system_mail_templates_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE system_mail_templates_id_seq OWNER TO postgres;

--
-- Name: system_mail_templates_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE system_mail_templates_id_seq OWNED BY system_mail_templates.id;


--
-- Name: system_parameters; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE system_parameters (
    id integer NOT NULL,
    namespace character varying(100) NOT NULL,
    "group" character varying(50) NOT NULL,
    item character varying(150) NOT NULL,
    value text
);


ALTER TABLE system_parameters OWNER TO postgres;

--
-- Name: system_parameters_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE system_parameters_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE system_parameters_id_seq OWNER TO postgres;

--
-- Name: system_parameters_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE system_parameters_id_seq OWNED BY system_parameters.id;


--
-- Name: system_plugin_history; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE system_plugin_history (
    id integer NOT NULL,
    code character varying(191) NOT NULL,
    type character varying(20) NOT NULL,
    version character varying(50) NOT NULL,
    detail text,
    created_at timestamp(0) without time zone
);


ALTER TABLE system_plugin_history OWNER TO postgres;

--
-- Name: system_plugin_history_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE system_plugin_history_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE system_plugin_history_id_seq OWNER TO postgres;

--
-- Name: system_plugin_history_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE system_plugin_history_id_seq OWNED BY system_plugin_history.id;


--
-- Name: system_plugin_versions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE system_plugin_versions (
    id integer NOT NULL,
    code character varying(191) NOT NULL,
    version character varying(50) NOT NULL,
    created_at timestamp(0) without time zone,
    is_disabled boolean DEFAULT false NOT NULL,
    is_frozen boolean DEFAULT false NOT NULL
);


ALTER TABLE system_plugin_versions OWNER TO postgres;

--
-- Name: system_plugin_versions_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE system_plugin_versions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE system_plugin_versions_id_seq OWNER TO postgres;

--
-- Name: system_plugin_versions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE system_plugin_versions_id_seq OWNED BY system_plugin_versions.id;


--
-- Name: system_request_logs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE system_request_logs (
    id integer NOT NULL,
    status_code integer,
    url character varying(191),
    referer text,
    count integer DEFAULT 0 NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE system_request_logs OWNER TO postgres;

--
-- Name: system_request_logs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE system_request_logs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE system_request_logs_id_seq OWNER TO postgres;

--
-- Name: system_request_logs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE system_request_logs_id_seq OWNED BY system_request_logs.id;


--
-- Name: system_revisions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE system_revisions (
    id integer NOT NULL,
    user_id integer,
    field character varying(191),
    "cast" character varying(191),
    old_value text,
    new_value text,
    revisionable_type character varying(191) NOT NULL,
    revisionable_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE system_revisions OWNER TO postgres;

--
-- Name: system_revisions_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE system_revisions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE system_revisions_id_seq OWNER TO postgres;

--
-- Name: system_revisions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE system_revisions_id_seq OWNED BY system_revisions.id;


--
-- Name: system_settings; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE system_settings (
    id integer NOT NULL,
    item character varying(191),
    value text
);


ALTER TABLE system_settings OWNER TO postgres;

--
-- Name: system_settings_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE system_settings_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE system_settings_id_seq OWNER TO postgres;

--
-- Name: system_settings_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE system_settings_id_seq OWNED BY system_settings.id;


--
-- Name: backend_access_log id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY backend_access_log ALTER COLUMN id SET DEFAULT nextval('backend_access_log_id_seq'::regclass);


--
-- Name: backend_user_groups id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY backend_user_groups ALTER COLUMN id SET DEFAULT nextval('backend_user_groups_id_seq'::regclass);


--
-- Name: backend_user_preferences id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY backend_user_preferences ALTER COLUMN id SET DEFAULT nextval('backend_user_preferences_id_seq'::regclass);


--
-- Name: backend_user_roles id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY backend_user_roles ALTER COLUMN id SET DEFAULT nextval('backend_user_roles_id_seq'::regclass);


--
-- Name: backend_user_throttle id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY backend_user_throttle ALTER COLUMN id SET DEFAULT nextval('backend_user_throttle_id_seq'::regclass);


--
-- Name: backend_users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY backend_users ALTER COLUMN id SET DEFAULT nextval('backend_users_id_seq'::regclass);


--
-- Name: cms_theme_data id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cms_theme_data ALTER COLUMN id SET DEFAULT nextval('cms_theme_data_id_seq'::regclass);


--
-- Name: cms_theme_logs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cms_theme_logs ALTER COLUMN id SET DEFAULT nextval('cms_theme_logs_id_seq'::regclass);


--
-- Name: cms_theme_templates id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cms_theme_templates ALTER COLUMN id SET DEFAULT nextval('cms_theme_templates_id_seq'::regclass);


--
-- Name: deferred_bindings id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY deferred_bindings ALTER COLUMN id SET DEFAULT nextval('deferred_bindings_id_seq'::regclass);


--
-- Name: demo_casemanager_case_priorities id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_casemanager_case_priorities ALTER COLUMN id SET DEFAULT nextval('demo_casemanager_case_priorities_id_seq'::regclass);


--
-- Name: demo_casemanager_cases id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_casemanager_cases ALTER COLUMN id SET DEFAULT nextval('demo_casemanager_cases_id_seq'::regclass);


--
-- Name: demo_casemanager_projects id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_casemanager_projects ALTER COLUMN id SET DEFAULT nextval('demo_casemanager_projects_id_seq'::regclass);


--
-- Name: demo_core_audit_logs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_audit_logs ALTER COLUMN id SET DEFAULT nextval('demo_core_audit_logs_id_seq'::regclass);


--
-- Name: demo_core_commands id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_commands ALTER COLUMN id SET DEFAULT nextval('demo_core_commands_id_seq'::regclass);


--
-- Name: demo_core_custom_fields id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_custom_fields ALTER COLUMN id SET DEFAULT nextval('demo_core_custom_fields_id_seq'::regclass);


--
-- Name: demo_core_event_handlers id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_event_handlers ALTER COLUMN id SET DEFAULT nextval('demo_core_event_handlers_id_seq'::regclass);


--
-- Name: demo_core_form_actions id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_form_actions ALTER COLUMN id SET DEFAULT nextval('demo_core_form_actions_id_seq'::regclass);


--
-- Name: demo_core_form_fields id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_form_fields ALTER COLUMN id SET DEFAULT nextval('demo_core_form_fields_id_seq'::regclass);


--
-- Name: demo_core_iframes id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_iframes ALTER COLUMN id SET DEFAULT nextval('demo_core_iframes_id_seq'::regclass);


--
-- Name: demo_core_inbound_api id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_inbound_api ALTER COLUMN id SET DEFAULT nextval('demo_core_inbound_api_id_seq'::regclass);


--
-- Name: demo_core_libraries id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_libraries ALTER COLUMN id SET DEFAULT nextval('demo_core_libraries_id_seq'::regclass);


--
-- Name: demo_core_list_actions id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_list_actions ALTER COLUMN id SET DEFAULT nextval('demo_core_list_actions_id_seq'::regclass);


--
-- Name: demo_core_model_associations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_model_associations ALTER COLUMN id SET DEFAULT nextval('demo_core_model_associations_id_seq'::regclass);


--
-- Name: demo_core_models id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_models ALTER COLUMN id SET DEFAULT nextval('demo_core_models_id_seq'::regclass);


--
-- Name: demo_core_navigations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_navigations ALTER COLUMN id SET DEFAULT nextval('demo_core_navigations_id_seq'::regclass);


--
-- Name: demo_core_permission_policy_associations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_permission_policy_associations ALTER COLUMN id SET DEFAULT nextval('demo_core_permission_policy_associations_id_seq'::regclass);


--
-- Name: demo_core_permissions id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_permissions ALTER COLUMN id SET DEFAULT nextval('demo_core_permissions_id_seq'::regclass);


--
-- Name: demo_core_role_policy_associations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_role_policy_associations ALTER COLUMN id SET DEFAULT nextval('demo_core_role_policy_associations_id_seq'::regclass);


--
-- Name: demo_core_roles id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_roles ALTER COLUMN id SET DEFAULT nextval('demo_core_roles_id_seq'::regclass);


--
-- Name: demo_core_security_policies id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_security_policies ALTER COLUMN id SET DEFAULT nextval('demo_core_security_policies_id_seq'::regclass);


--
-- Name: demo_core_ui_pages id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_ui_pages ALTER COLUMN id SET DEFAULT nextval('demo_core_ui_page_id_seq'::regclass);


--
-- Name: demo_core_user_role_associations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_user_role_associations ALTER COLUMN id SET DEFAULT nextval('demo_core_user_role_associations_id_seq'::regclass);


--
-- Name: demo_core_view_role_associations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_view_role_associations ALTER COLUMN id SET DEFAULT nextval('demo_core_nav_role_associations_id_seq'::regclass);


--
-- Name: demo_core_webhooks id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_webhooks ALTER COLUMN id SET DEFAULT nextval('demo_core_webhooks_id_seq'::regclass);


--
-- Name: demo_notification_channels id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_notification_channels ALTER COLUMN id SET DEFAULT nextval('demo_notification_channels_id_seq'::regclass);


--
-- Name: demo_notification_logs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_notification_logs ALTER COLUMN id SET DEFAULT nextval('demo_notification_logs_id_seq'::regclass);


--
-- Name: demo_notification_notifications id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_notification_notifications ALTER COLUMN id SET DEFAULT nextval('demo_notification_notifications_id_seq'::regclass);


--
-- Name: demo_notification_subscribers id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_notification_subscribers ALTER COLUMN id SET DEFAULT nextval('demo_notification_subscribers_id_seq'::regclass);


--
-- Name: demo_report_dashboards id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_report_dashboards ALTER COLUMN id SET DEFAULT nextval('demo_report_dashboards_id_seq'::regclass);


--
-- Name: demo_report_widgets id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_report_widgets ALTER COLUMN id SET DEFAULT nextval('demo_report_widgets_id_seq'::regclass);


--
-- Name: demo_workflow_queue_assignment_groups id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_workflow_queue_assignment_groups ALTER COLUMN id SET DEFAULT nextval('demo_workflow_queue_assignment_groups_id_seq'::regclass);


--
-- Name: demo_workflow_queue_items id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_workflow_queue_items ALTER COLUMN id SET DEFAULT nextval('demo_workflow_queue_items_id_seq'::regclass);


--
-- Name: demo_workflow_queue_pop_criterias id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_workflow_queue_pop_criterias ALTER COLUMN id SET DEFAULT nextval('demo_workflow_queue_pop_criterias_id_seq'::regclass);


--
-- Name: demo_workflow_queue_routing_rules id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_workflow_queue_routing_rules ALTER COLUMN id SET DEFAULT nextval('demo_workflow_queue_routing_rules_id_seq'::regclass);


--
-- Name: demo_workflow_queues id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_workflow_queues ALTER COLUMN id SET DEFAULT nextval('demo_workflow_queues_id_seq'::regclass);


--
-- Name: demo_workflow_service_channels id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_workflow_service_channels ALTER COLUMN id SET DEFAULT nextval('demo_workflow_service_channels_id_seq'::regclass);


--
-- Name: demo_workflow_workflow_items id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_workflow_workflow_items ALTER COLUMN id SET DEFAULT nextval('demo_workflow_workflow_items_id_seq'::regclass);


--
-- Name: demo_workflow_workflow_states id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_workflow_workflow_states ALTER COLUMN id SET DEFAULT nextval('demo_workflow_workflow_states_id_seq'::regclass);


--
-- Name: demo_workflow_workflow_transitions id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_workflow_workflow_transitions ALTER COLUMN id SET DEFAULT nextval('demo_workflow_workflow_transitions_id_seq'::regclass);


--
-- Name: demo_workflow_workflows id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_workflow_workflows ALTER COLUMN id SET DEFAULT nextval('demo_workflow_workflows_id_seq'::regclass);


--
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY failed_jobs ALTER COLUMN id SET DEFAULT nextval('failed_jobs_id_seq'::regclass);


--
-- Name: indikator_backend_trash id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY indikator_backend_trash ALTER COLUMN id SET DEFAULT nextval('indikator_backend_trash_id_seq'::regclass);


--
-- Name: jobs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY jobs ALTER COLUMN id SET DEFAULT nextval('jobs_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY migrations ALTER COLUMN id SET DEFAULT nextval('migrations_id_seq'::regclass);


--
-- Name: system_event_logs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY system_event_logs ALTER COLUMN id SET DEFAULT nextval('system_event_logs_id_seq'::regclass);


--
-- Name: system_files id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY system_files ALTER COLUMN id SET DEFAULT nextval('system_files_id_seq'::regclass);


--
-- Name: system_mail_layouts id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY system_mail_layouts ALTER COLUMN id SET DEFAULT nextval('system_mail_layouts_id_seq'::regclass);


--
-- Name: system_mail_partials id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY system_mail_partials ALTER COLUMN id SET DEFAULT nextval('system_mail_partials_id_seq'::regclass);


--
-- Name: system_mail_templates id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY system_mail_templates ALTER COLUMN id SET DEFAULT nextval('system_mail_templates_id_seq'::regclass);


--
-- Name: system_parameters id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY system_parameters ALTER COLUMN id SET DEFAULT nextval('system_parameters_id_seq'::regclass);


--
-- Name: system_plugin_history id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY system_plugin_history ALTER COLUMN id SET DEFAULT nextval('system_plugin_history_id_seq'::regclass);


--
-- Name: system_plugin_versions id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY system_plugin_versions ALTER COLUMN id SET DEFAULT nextval('system_plugin_versions_id_seq'::regclass);


--
-- Name: system_request_logs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY system_request_logs ALTER COLUMN id SET DEFAULT nextval('system_request_logs_id_seq'::regclass);


--
-- Name: system_revisions id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY system_revisions ALTER COLUMN id SET DEFAULT nextval('system_revisions_id_seq'::regclass);


--
-- Name: system_settings id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY system_settings ALTER COLUMN id SET DEFAULT nextval('system_settings_id_seq'::regclass);


--
-- Data for Name: backend_access_log; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY backend_access_log (id, user_id, ip_address, created_at, updated_at) FROM stdin;
1	1	::1	2020-04-26 05:35:53	2020-04-26 05:35:53
2	1	::1	2020-04-26 14:14:50	2020-04-26 14:14:50
3	1	::1	2020-04-27 11:00:49	2020-04-27 11:00:49
4	1	::1	2020-04-27 11:30:13	2020-04-27 11:30:13
5	1	::1	2020-04-27 11:53:33	2020-04-27 11:53:33
6	1	::1	2020-05-05 14:57:09	2020-05-05 14:57:09
7	1	::1	2020-05-05 16:33:38	2020-05-05 16:33:38
8	1	::1	2020-05-06 07:46:48	2020-05-06 07:46:48
9	1	::1	2020-05-06 07:52:04	2020-05-06 07:52:04
10	1	::1	2020-05-06 07:53:05	2020-05-06 07:53:05
11	1	::1	2020-05-06 13:24:19	2020-05-06 13:24:19
12	1	::1	2020-05-08 15:27:03	2020-05-08 15:27:03
13	1	::1	2020-05-09 11:27:07	2020-05-09 11:27:07
14	2	::1	2020-05-10 06:11:09	2020-05-10 06:11:09
15	2	::1	2020-05-10 06:22:06	2020-05-10 06:22:06
16	2	::1	2020-05-10 06:23:29	2020-05-10 06:23:29
17	2	::1	2020-05-10 06:29:15	2020-05-10 06:29:15
18	1	::1	2020-05-10 06:30:01	2020-05-10 06:30:01
19	2	::1	2020-05-10 09:29:57	2020-05-10 09:29:57
20	2	::1	2020-05-10 09:43:08	2020-05-10 09:43:08
21	1	::1	2020-05-10 10:28:31	2020-05-10 10:28:31
22	2	::1	2020-05-10 15:56:18	2020-05-10 15:56:18
23	2	::1	2020-05-11 05:23:47	2020-05-11 05:23:47
24	1	::1	2020-05-12 04:15:35	2020-05-12 04:15:35
25	1	::1	2020-05-13 04:16:44	2020-05-13 04:16:44
26	1	::1	2020-05-13 04:39:24	2020-05-13 04:39:24
27	1	::1	2020-05-16 05:40:24	2020-05-16 05:40:24
28	1	::1	2020-05-16 05:54:11	2020-05-16 05:54:11
29	1	::1	2020-05-16 05:57:33	2020-05-16 05:57:33
30	1	::1	2020-05-16 06:05:48	2020-05-16 06:05:48
31	1	::1	2020-05-16 06:47:32	2020-05-16 06:47:32
32	1	::1	2020-05-16 07:46:35	2020-05-16 07:46:35
33	1	::1	2020-05-16 14:52:38	2020-05-16 14:52:38
34	1	::1	2020-05-16 15:08:46	2020-05-16 15:08:46
35	1	::1	2020-05-17 06:03:28	2020-05-17 06:03:28
36	1	::1	2020-05-17 06:17:39	2020-05-17 06:17:39
\.


--
-- Name: backend_access_log_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('backend_access_log_id_seq', 36, true);


--
-- Data for Name: backend_user_groups; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY backend_user_groups (id, name, created_at, updated_at, code, description, is_new_user_default) FROM stdin;
1	Owners	2020-04-26 05:34:31	2020-04-26 05:34:31	owners	Default group for website owners.	f
2	Quality	2020-05-04 13:47:55	2020-05-04 13:48:02	quality		f
3	Check IN	2020-05-17 13:13:54	2020-05-17 13:13:54	check-in		f
\.


--
-- Name: backend_user_groups_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('backend_user_groups_id_seq', 3, true);


--
-- Data for Name: backend_user_preferences; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY backend_user_preferences (id, user_id, namespace, "group", item, value) FROM stdin;
2	1	demo_core	permissioncontroller	lists	{"visible":["id","code","name","active","model","operation","plugin_id"],"per_page":"120"}
3	1	demo_core	auditlogcontroller	lists	{"visible":["id","created_at","updated_at","created_by_id","updated_by_id","version","model","record_id"],"per_page":"20"}
1	1	demo_core	modelcontroller	lists	{"visible":["id","name","model","plugin_id","audit","record_history","audit_columns"],"per_page":"20"}
\.


--
-- Name: backend_user_preferences_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('backend_user_preferences_id_seq', 3, true);


--
-- Data for Name: backend_user_roles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY backend_user_roles (id, name, code, description, permissions, is_system, created_at, updated_at) FROM stdin;
1	Publisher	publisher	Site editor with access to publishing tools.		t	2020-04-26 05:34:31	2020-04-26 05:34:31
2	Developer	developer	Site administrator with access to developer tools.		t	2020-04-26 05:34:31	2020-04-26 05:34:31
\.


--
-- Name: backend_user_roles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('backend_user_roles_id_seq', 2, true);


--
-- Data for Name: backend_user_throttle; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY backend_user_throttle (id, user_id, ip_address, attempts, last_attempt_at, is_suspended, suspended_at, is_banned, banned_at) FROM stdin;
1	1	::1	0	\N	f	\N	f	\N
2	2	::1	0	\N	f	\N	f	\N
\.


--
-- Name: backend_user_throttle_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('backend_user_throttle_id_seq', 2, true);


--
-- Data for Name: backend_users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY backend_users (id, first_name, last_name, login, email, password, activation_code, persist_code, reset_password_code, permissions, is_activated, role_id, activated_at, last_login, created_at, updated_at, deleted_at, is_superuser) FROM stdin;
2	Suraj	Baliyan	suraj	suraj.baliyan4@gmail.com	$2y$10$sZj8Bfs9CVKMvkVrsWjvhuh02DhE/cxn38DU9KttZTvnD1d5EGXE2	\N	$2y$10$Af.BtOXNQ.GCQzfYKWqhGOGOc6MkOoZVFFNdXkO67hyLVnOPwabV6	\N	\N	f	5	\N	2020-05-11 05:23:46	2020-05-10 06:08:53	2020-05-11 05:23:46	\N	f
1	Admin	Person	admin	admin@domain.tld	$2y$10$gs9tcpJn5uAmNOzaS4DvZO4l5qrF4zyzATp5AKiT3mKjFt3mnY/KS	\N	$2y$10$uuw0mDxXBbwYuZ5VYdtbR.YgoT.UGNUmFa5A8/9FUbrKA0xKrF2Hy	\N		t	2	\N	2020-05-17 06:17:39	2020-04-26 05:34:31	2020-05-17 06:17:39	\N	t
\.


--
-- Data for Name: backend_users_groups; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY backend_users_groups (user_id, user_group_id) FROM stdin;
1	1
2	3
1	3
\.


--
-- Name: backend_users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('backend_users_id_seq', 2, true);


--
-- Data for Name: cache; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cache (key, value, expiration) FROM stdin;
\.


--
-- Data for Name: cms_theme_data; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cms_theme_data (id, theme, data, created_at, updated_at) FROM stdin;
\.


--
-- Name: cms_theme_data_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cms_theme_data_id_seq', 1, false);


--
-- Data for Name: cms_theme_logs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cms_theme_logs (id, type, theme, template, old_template, content, old_content, user_id, created_at, updated_at) FROM stdin;
\.


--
-- Name: cms_theme_logs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cms_theme_logs_id_seq', 1, false);


--
-- Data for Name: cms_theme_templates; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cms_theme_templates (id, source, path, content, file_size, updated_at, deleted_at) FROM stdin;
\.


--
-- Name: cms_theme_templates_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cms_theme_templates_id_seq', 1, false);


--
-- Data for Name: deferred_bindings; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY deferred_bindings (id, master_type, master_field, slave_type, slave_id, session_key, is_bind, created_at, updated_at) FROM stdin;
5	Backend\\Models\\BrandSetting	logo	System\\Models\\File	3	EaoluK0AhAsGXVG5WDgEmuYX0YTrxEseyWYvJnCL	f	2020-05-06 07:51:01	2020-05-06 07:51:01
7	Backend\\Models\\BrandSetting	favicon	System\\Models\\File	4	EaoluK0AhAsGXVG5WDgEmuYX0YTrxEseyWYvJnCL	f	2020-05-06 07:51:22	2020-05-06 07:51:22
10	Backend\\Models\\BrandSetting	logo	System\\Models\\File	7	Pfez6EsZzJHUMyuYr4N2VpEBGV6monEj1dXkfM9Z	f	2020-05-06 07:52:17	2020-05-06 07:52:17
12	Demo\\Core\\Models\\CoreUser	avatar	System\\Models\\File	9	EuMv43foUO0rMAgxqNQDb3si9bOEdj5v4T5U9nrX	t	2020-05-10 08:06:00	2020-05-10 08:06:00
13	Demo\\Core\\Models\\CoreUser	avatar	System\\Models\\File	10	DDYx7dzFkG4piNEeux5oWMmwHAjDHCvcUCUnNoGY	t	2020-05-10 08:07:57	2020-05-10 08:07:57
\.


--
-- Name: deferred_bindings_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('deferred_bindings_id_seq', 16, true);


--
-- Data for Name: demo_casemanager_case_priorities; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_casemanager_case_priorities (id, created_at, updated_at, name, active, description, duration, created_by_id, updated_by_id) FROM stdin;
1	2020-04-27 11:07:15	2020-04-27 11:07:15	Normal	1		2155	1	1
3	2020-04-27 11:12:45	2020-04-27 11:12:45	High	1	54	5	1	1
\.


--
-- Name: demo_casemanager_case_priorities_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_casemanager_case_priorities_id_seq', 3, true);


--
-- Data for Name: demo_casemanager_cases; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_casemanager_cases (id, title, description, created_at, updated_at, created_by_id, updated_by_id, assigned_to_id, priority_id, case_number, case_version, version, suspect, tat_duration, comments) FROM stdin;
23	\N	\N	2020-05-17 15:20:54	2020-05-17 15:21:30	1	1	1	1	2222	545454	1	wweewe	5454545	
\.


--
-- Name: demo_casemanager_cases_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_casemanager_cases_id_seq', 23, true);


--
-- Data for Name: demo_casemanager_projects; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_casemanager_projects (id, created_at, updated_at, created_by_id, updated_by_id, version, label, description, workflow_id, name, project_type, project_lead_id, default_assignee_id, image, url) FROM stdin;
\.


--
-- Name: demo_casemanager_projects_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_casemanager_projects_id_seq', 1, false);


--
-- Data for Name: demo_core_audit_logs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_audit_logs (id, created_at, updated_at, created_by_id, updated_by_id, version, model, operation, record_id, previous, current) FROM stdin;
4	2020-04-12 16:03:25	2020-04-12 16:03:25	1	1	0	Demo\\Casemanager\\Models\\CaseModel	updating	150	{"id":150,"title":null,"description":null,"created_at":"2020-04-12 08:27:24","updated_at":"2020-04-12 15:41:19","created_by_id":1,"updated_by_id":1,"priority_id":3,"case_number":"1212","case_version":"","suspect":"","tat_duration":null,"comments":"","plugin_id":null,"assigned_to_id":1,"test_columns":"","another_field":null,"version":0}	\N
5	2020-04-12 16:05:03	2020-04-12 16:05:03	1	1	0	Demo\\Casemanager\\Models\\CaseModel	updating	150	{"id":150,"title":null,"description":null,"created_at":"2020-04-12 08:27:24","updated_at":"2020-04-12 16:03:25","created_by_id":1,"updated_by_id":1,"priority_id":3,"case_number":"1214","case_version":"","suspect":"","tat_duration":null,"comments":"","plugin_id":null,"assigned_to_id":1,"test_columns":"","another_field":null,"version":1}	\N
6	2020-04-12 16:05:19	2020-04-12 16:05:19	1	1	1	Demo\\Casemanager\\Models\\CaseModel	updating	150	{"id":150,"title":null,"description":null,"created_at":"2020-04-12 08:27:24","updated_at":"2020-04-12 16:05:03","created_by_id":1,"updated_by_id":1,"priority_id":3,"case_number":"1214","case_version":"","suspect":"","tat_duration":null,"comments":"","plugin_id":null,"assigned_to_id":1,"test_columns":"","another_field":null,"version":1}	\N
7	2020-04-12 16:05:28	2020-04-12 16:05:28	1	1	2	Demo\\Casemanager\\Models\\CaseModel	updating	150	{"id":150,"title":null,"description":null,"created_at":"2020-04-12 08:27:24","updated_at":"2020-04-12 16:05:19","created_by_id":1,"updated_by_id":1,"priority_id":3,"case_number":"1214","case_version":"","suspect":"test","tat_duration":null,"comments":"","plugin_id":null,"assigned_to_id":1,"test_columns":"","another_field":null,"version":2}	\N
1	2020-05-10 10:40:42	2020-05-10 10:40:42	1	1	0	Demo\\Core\\Models\\Navigation	updating	52	{"id":52,"created_at":"2020-05-10 10:28:19","updated_at":"2020-05-10 10:28:19","created_by_id":1,"updated_by_id":1,"version":null,"label":"Dashboard","type":"list","active":true,"name":"dashboard","description":"","url":"","model":"Demo\\\\Report\\\\Models\\\\Dashboard","list":"$\\/demo\\/report\\/models\\/dashboard\\/columns.yaml","form":"","record_id":null,"plugin_id":3,"parent_id":26,"sort_order":2,"icon":"oc-icon-adjust"}	\N
2	2020-05-10 14:43:32	2020-05-10 14:43:32	1	1	1	Demo\\Core\\Models\\Navigation	updating	52	{"id":52,"created_at":"2020-05-10 10:28:19","updated_at":"2020-05-10 10:40:42","created_by_id":1,"updated_by_id":1,"version":1,"label":"Dashboard2","type":"list","active":true,"name":"dashboard","description":"","url":"","model":"Demo\\\\Report\\\\Models\\\\Dashboard","list":"$\\/demo\\/report\\/models\\/dashboard\\/columns.yaml","form":"","record_id":null,"plugin_id":3,"parent_id":26,"sort_order":2,"icon":"oc-icon-adjust"}	\N
3	2020-05-17 15:21:30	2020-05-17 15:21:30	1	1	0	Demo\\Casemanager\\Models\\CaseModel	updating	23	{"id":23,"title":null,"description":null,"created_at":"2020-05-17 15:20:54","updated_at":"2020-05-17 15:20:54","created_by_id":1,"updated_by_id":1,"assigned_to_id":null,"priority_id":1,"case_number":"2222","case_version":"545454","version":0,"suspect":"wweewe","tat_duration":5454545,"comments":""}	\N
\.


--
-- Name: demo_core_audit_logs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_core_audit_logs_id_seq', 3, true);


--
-- Data for Name: demo_core_commands; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_commands (id, created_at, updated_at, updated_by_id, created_by_id, name, description, slug, active, arguments, parameters, script, plugin_id) FROM stdin;
\.


--
-- Name: demo_core_commands_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_core_commands_id_seq', 1, false);


--
-- Data for Name: demo_core_custom_fields; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_custom_fields (id, created_at, updated_at, created_by_id, updated_by_id, name, description, type, model, length, unsigned, allow_null, "default", plugin_id) FROM stdin;
\.


--
-- Name: demo_core_custom_fields_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_core_custom_fields_id_seq', 1, false);


--
-- Data for Name: demo_core_event_handlers; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_event_handlers (id, created_at, updated_at, created_by_id, updated_by_id, event, name, description, model, script, sort_order, active, plugin_id) FROM stdin;
\.


--
-- Name: demo_core_event_handlers_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_core_event_handlers_id_seq', 1, false);


--
-- Data for Name: demo_core_form_actions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_form_actions (id, created_at, updated_at, created_by_id, updated_by_id, name, label, form, model, active, description, icon, css_class, sort_order, plugin_id, script, context, html_attributes) FROM stdin;
8	2020-04-12 08:37:37	2020-04-19 04:40:45	1	1	test	Test	$/demo/casemanager/models/casemodel/fields.yaml	Demo\\Casemanager\\Models\\CaseModel	t		oc-icon-adjust		0	6	function(){\r\n        alert('Alert from action');\r\n        return false;\r\n}	["create","update"]	[]
9	2020-04-13 14:34:58	2020-04-19 05:48:48	1	1	view-history	View History		Demo\\Core\\Models\\UniversalModel	t		oc-icon-history		0	10	function(event,engine,action,$element){\r\n    var location = engine.list.navigate({\r\n            controller:'demo/core/auditlogcontroller'\r\n        },{\r\n        filter:{\r\n            record_id:engine.form.getFormModel().id\r\n        }\r\n    });\r\n    console.log(location);\r\n}	["update","preview"]	[{"name":"data-show","value":"return this.data.action.modelRecord.audit===true;"}]
2	2020-04-26 15:38:44	2020-04-27 09:13:03	1	1	save-close	Save & Close		Demo\\Core\\Models\\UniversalModel	t		oc-icon-save		-1	10		["create","update"]	[{"name":"data-request","value":"onSave"},{"name":"data-hotkey","value":"ctrl+enter, cmd+enter"},{"name":"data-load-indicator","value":"Saving..."},{"name":"data-request-data","value":"close:1"}]
1	2020-04-26 15:37:16	2020-04-27 11:09:54	1	1	save	Save		Demo\\Core\\Models\\UniversalModel	t		oc-icon-adjust		-2	10	function(){}	["update"]	[{"name":"data-request","value":"onSave"},{"name":"data-hotkey","value":"ctrl+s, cmd+s"},{"name":"data-load-indicator","value":"Saving..."},{"name":"data-request-data","value":"redirect:0"}]
10	2020-04-26 15:37:16	2020-04-27 11:09:54	1	1	create	Create		Demo\\Core\\Models\\UniversalModel	t		oc-icon-adjust		-2	10	function(){}	["create"]	[{"name":"data-request","value":"onSave"},{"name":"data-hotkey","value":"ctrl+s, cmd+s"},{"name":"data-load-indicator","value":"Saving..."}]
3	2020-05-13 04:12:13	2020-05-13 04:12:13	1	1	widget-preview	Preview	$/demo/report/models/widget/fields.yaml	Demo\\Report\\Models\\Widget	t		oc-icon-photo		3	14	function(){\r\n}	["update"]	[{"name":"data-toggle","value":"model"},{"name":"href","value":"#previewModal"},{"name":"data-size","value":"large"},{"name":"data-request","value":"onPreview"},{"name":"data-load-indicator","value":"Loading"},{"name":"data-request-update","value":"widget_renderer: '#previewModal .modal-body'"},{"name":"data-hotkey","value":"ctrl+p, cmd+p"}]
4	2020-05-13 04:12:13	2020-05-13 04:14:14	1	1	dashboard-preview	Preview	$/demo/report/models/dashboard/fields.yaml	Demo\\Report\\Models\\Dashboard	t		oc-icon-photo		3	14	function(){\r\n}	["update"]	[{"name":"data-toggle","value":"model"},{"name":"href","value":"#previewModal"},{"name":"data-size","value":"large"},{"name":"data-request","value":"onPreview"},{"name":"data-load-indicator","value":"Loading"},{"name":"data-request-update","value":"widget_renderer: '#previewModal .modal-body'"},{"name":"data-hotkey","value":"ctrl+p, cmd+p"}]
\.


--
-- Name: demo_core_form_actions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_core_form_actions_id_seq', 4, true);


--
-- Data for Name: demo_core_form_fields; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_form_fields (id, created_at, updated_at, created_by_id, updated_by_id, label, field_id, form, plugin_id, controls, description, active, virtual) FROM stdin;
\.


--
-- Name: demo_core_form_fields_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_core_form_fields_id_seq', 1, false);


--
-- Data for Name: demo_core_iframes; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_iframes (id, created_at, updated_at, created_by_id, updated_by_id, name, description, backend_menu, slug, url, active, iframe) FROM stdin;
3	2019-11-24 15:42:32	2020-03-16 05:09:54	1	1	Test		[{"plugin":"10","main_menu":"main-menu-item","side_menu":"side-menu-item2"}]	test	https://www.youtube.com/watch?v=cTbIjrF05N0	1	1
\.


--
-- Name: demo_core_iframes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_core_iframes_id_seq', 1, false);


--
-- Data for Name: demo_core_inbound_api; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_inbound_api (id, created_at, updated_at, created_by_id, updated_by_id, method, plugin_id, script, name, description, url, active) FROM stdin;
1	\N	2020-04-26 08:37:10	1	1	get	10	return $context->pathVariables;	Test	<p><a href="http://localhost:8084/engine/inbound-api/demo-casemanager/test/aditya">http://localhost:8084/engine/inbound-api/demo-casemanager/test/aditya</a> </p>	/test/{name}	1
\.


--
-- Name: demo_core_inbound_api_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_core_inbound_api_id_seq', 1, false);


--
-- Data for Name: demo_core_libraries; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_libraries (id, created_at, updated_at, created_by_id, updated_by_id, plugin_id, name, description, website, code) FROM stdin;
1	2020-05-10 07:34:36	2020-05-13 04:03:38	1	1	10	EchartJS		https://echarts.apache.org/en/index.html	echart-js
\.


--
-- Name: demo_core_libraries_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_core_libraries_id_seq', 1, true);


--
-- Data for Name: demo_core_list_actions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_list_actions (id, created_at, updated_at, created_by_id, updated_by_id, name, label, list, model, active, description, icon, css_class, sort_order, plugin_id, script, html_attributes) FROM stdin;
2	2020-04-11 14:12:05	2020-04-12 08:36:42	1	1	test	test2	$/demo/casemanager/models/casemodel/columns.yaml	Demo\\Casemanager\\Models\\CaseModel	t		oc-icon-adjust		0	6		[]
5	2020-04-27 09:24:16	2020-04-27 09:27:18	1	1	reorder	Reorder		Demo\\Core\\Models\\UniversalModel	t		oc-icon-list		-2	10	function(event,engine){\r\n    engine.list.navigate(engine.ui.getModelRecord(),{},'reorder');\r\n}	[]
4	2020-04-27 09:24:16	2020-04-27 10:43:43	1	1	delete	Delete		Demo\\Core\\Models\\UniversalModel	t		oc-icon-trash-o	control-disabled	-1	10	function(){\r\n    $(this).data('request-data', {\r\n        checked: $('.control-list').listWidget('getChecked')\r\n    })\r\n}	[{"name":"data-request","value":"onDelete"},{"name":"data-request-confirm","value":"Delete the selected records?"},{"name":"data-request-success","value":"$(this).prop('disabled', true)"},{"name":"data-trigger-action","value":"enable"},{"name":"data-trigger","value":".control-list input[type=checkbox]"},{"name":"data-stripe-load-indicator","value":""},{"name":"disabled","value":"disabled"},{"name":"data-trigger-condition","value":"checked"}]
3	2020-04-19 05:47:48	2020-04-27 10:44:08	1	1	view	View	$/demo/core/models/auditlog/columns.yaml	Demo\\Core\\Models\\AuditLog	t		oc-icon-eye	btn-default	0	10	function(event,engine){\r\n    var selected = engine.list.getSelectedRecordIds();\r\n    if(selected.length === 0 || selected.length > 1){\r\n        $.oc.flashMsg({\r\n            'text': 'Please select only a single record ro view.',\r\n            'class': 'error',\r\n            'interval': 5\r\n        });\r\n        return;\r\n    }\r\n    engine.form.navigate(engine.ui.getModelRecord(),selected[0],'audit-form-view');\r\n}	[{"name":"disabled","value":"disabled"},{"name":"data-trigger-action","value":"enable"},{"name":"data-trigger","value":".control-list input[type=checkbox]"},{"name":"data-trigger-condition","value":"checked"}]
1	2020-04-27 09:24:16	2020-05-16 05:53:59	1	1	create	Create		Demo\\Core\\Models\\UniversalModel	t		oc-icon-plus		-3	10	function(event,engine){\r\n    engine.listService.getCurrentList().navigate('create');\r\n}	[]
6	2020-05-17 09:24:19	2020-05-17 12:58:46	1	1	pick-case	Pick Case	$/demo/casemanager/models/casemodel/columns.yaml	Demo\\Casemanager\\Models\\CaseModel	t		oc-icon-anchor		4	6	function(){\r\n    $.request('onPickItemFromQueue', {\r\n        data: {queueId: $('#queueDropdown').val()}\r\n    });\r\n}	[{"name":"data-show","value":"return engine.listService.getCurrentList().getTotalRecord()"}]
\.


--
-- Name: demo_core_list_actions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_core_list_actions_id_seq', 6, true);


--
-- Data for Name: demo_core_model_associations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_model_associations (id, created_at, updated_at, created_by_id, updated_by_id, source_model, target_model, foreign_key, cascade, relation, plugin_id, cascade_priority_order, description, name, active) FROM stdin;
1	2019-12-21 11:25:39	2019-12-21 11:25:39	1	1	Demo\\Core\\Models\\ModelAssociation	Demo\\Core\\Models\\Model	source_model	delete	belongs_to	10	0		Model Association Belongs To a Source Model	t
2	2019-12-21 11:25:39	2019-12-21 11:25:39	1	1	Demo\\Core\\Models\\ModelAssociation	Demo\\Core\\Models\\Model	target_model	delete	belongs_to	10	0		Model Association Belongs To a Target Model	t
3	2019-12-21 11:25:39	2019-12-21 11:25:39	1	1	Demo\\Core\\Models\\EventHandler	Demo\\Core\\Models\\Model	model	delete	belongs_to	10	0		Event Handler Belongs To a Model	t
4	2019-12-21 11:25:39	2019-12-21 11:25:39	1	1	Demo\\Core\\Models\\CustomField	Demo\\Core\\Models\\Model	model	delete	belongs_to	10	0		Custom Field Belongs To a Model	t
5	2019-12-21 11:25:39	2019-12-21 11:25:39	1	1	Demo\\Core\\Models\\FormField	Demo\\Core\\Models\\CustomField	field_id	delete	belongs_to	10	0		Custom Field Belongs To a Model	t
6	2019-12-21 11:25:39	2019-12-21 11:25:39	1	1	Demo\\Core\\Models\\RolePolicyAssociation	Demo\\Core\\Models\\Role	role_id	delete	belongs_to	10	0		RolePolicyAssociation Belongs To a Role	t
7	2019-12-21 11:25:39	2019-12-21 11:25:39	1	1	Demo\\Core\\Models\\RolePolicyAssociation	Demo\\Core\\Models\\SecurityPolicy	policy_id	delete	belongs_to	10	0		RolePolicyAssociation Belongs To a SecurityPolicy	t
8	2019-12-21 11:25:39	2019-12-21 11:25:39	1	1	Demo\\Core\\Models\\PermissionPolicyAssociation	Demo\\Core\\Models\\Permission	permission_id	delete	belongs_to	10	0		PermissionPolicyAssociation Belongs To a Permission	t
9	2019-12-21 11:25:39	2019-12-21 11:25:39	1	1	Demo\\Core\\Models\\PermissionPolicyAssociation	Demo\\Core\\Models\\SecurityPolicy	policy_id	delete	belongs_to	10	0		PermissionPolicyAssociation Belongs To a SecurityPolicy	t
40	2019-12-21 11:25:39	2019-12-21 11:25:39	1	1	Demo\\Workflow\\Models\\QueueItem	Demo\\Workflow\\Models\\Queue	queue_id	delete	belongs_to	11	0		Queue Item Belongs To a Queue	t
41	2019-12-21 11:25:39	2019-12-21 11:25:39	1	1	Demo\\Workflow\\Models\\Queue	Demo\\Workflow\\Models\\QueueRoutingRule	routing_rule_id	restrict	belongs_to	11	0		Queue belongs to a Routing Rule	t
42	2019-12-21 11:25:39	2019-12-21 11:25:39	1	1	Demo\\Workflow\\Models\\Queue	Demo\\Workflow\\Models\\Model	model	restrict	belongs_to	11	0		Queue belongs To a Model	t
43	2019-12-21 11:25:39	2019-12-21 11:25:39	1	1	Demo\\Workflow\\Models\\QueuePopCriteria	Demo\\Workflow\\Models\\Queue	pop_criteria_id	delete	belongs_to	11	0		Queue Belongs To a Pop Criteria	t
44	2019-12-21 11:25:39	2019-12-21 11:25:39	1	1	Demo\\Workflow\\Models\\WorkflowItem	Demo\\Workflow\\Models\\Workflow	workflow_id	restrict	belongs_to	11	0		Workflo Item belongs to a Workflow	t
45	2019-12-21 11:25:39	2019-12-21 11:25:39	1	1	Demo\\Workflow\\Models\\WorkflowTransition	Demo\\Workflow\\Models\\WorkflowItem	workflow_item	delete	belongs_to	11	0		Workflow Transition belongs to a WorkflowItem	t
\.


--
-- Name: demo_core_model_associations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_core_model_associations_id_seq', 1, false);


--
-- Data for Name: demo_core_models; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_models (id, created_at, updated_at, created_by_id, updated_by_id, name, model, controller, plugin_id, audit, record_history, audit_columns, description, attach_audited_by, viewable) FROM stdin;
41	2019-12-20 14:15:39	2020-04-12 15:57:19	1	1	Case Model	Demo\\Casemanager\\Models\\CaseModel	Demo\\Casemanager\\Controllers\\CaseController	6	t	f	["*"]		t	f
501	2020-04-26 07:09:40	2020-04-26 07:09:40	1	1	List Action	Demo\\Core\\Models\\ListAction	Demo\\Core\\Controllers\\ListActionController	10	f	f	0		f	t
89	2020-04-18 15:35:39	2020-04-18 15:35:39	1	1	Audit Log	Demo\\Core\\Models\\AuditLog	Demo\\Core\\Controllers\\AuditLogController	10	f	f	0		f	f
88	2020-04-18 14:53:04	2020-04-18 15:36:42	1	1	Model Model	Demo\\Core\\Models\\ModelModel	Demo\\Core\\Controllers\\ModelController	10	f	f	0		f	f
87	2020-04-13 14:06:29	2020-04-13 14:06:29	1	1	Universal	Demo\\Core\\Models\\UniversalModel	Demo\\Core\\Controllers\\UniversalController	10	f	f	0		f	f
20	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Notification Subscriber	Demo\\Notification\\Models\\NotificationSubscriber	Demo\\Notification\\Controllers\\NotificationSubscriberController	10	f	f	[" * "]	\N	t	f
2	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Custom Field	Demo\\Core\\Models\\CustomField	Demo\\Core\\Controllers\\CustomFieldController	10	f	f	[" * "]	\N	t	f
3	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Form Field	Demo\\Core\\Models\\FormField	Demo\\Core\\Controllers\\FormFieldController	10	f	f	[" * "]	\N	t	f
4	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Event Handler	Demo\\Core\\Models\\EventHandler	Demo\\Core\\Controllers\\EventHandlerController	10	f	f	[" * "]	\N	t	f
5	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Inbound Api	Demo\\Core\\Models\\InboundApi	Demo\\Core\\Controllers\\InboundApiController	10	f	f	[" * "]	\N	t	f
6	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Command	Demo\\Core\\Models\\Command	Demo\\Core\\Controllers\\CommandController	10	f	f	[" * "]	\N	t	f
7	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Iframe	Demo\\Core\\Models\\Iframe	Demo\\Core\\Controllers\\IframeController	10	f	f	[" * "]	\N	t	f
8	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Javascript Library	Demo\\Core\\Models\\JavascriptLibrary	Demo\\Core\\Controllers\\JavascriptLibraryController	10	f	f	[" * "]	\N	t	f
9	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Webhook	Demo\\Core\\Models\\Webhook	Demo\\Core\\Controllers\\WebhookController	10	f	f	[" * "]	\N	t	f
10	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Model Association	Demo\\Core\\Models\\ModelAssociation	Demo\\Core\\Controllers\\AssociationController	10	f	f	[" * "]	\N	t	f
12	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Permission	Demo\\Core\\Models\\Permission	Demo\\Core\\Controllers\\PermissionController	10	f	f	[" * "]	\N	t	f
13	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Security Policy	Demo\\Core\\Models\\SecurityPolicy	Demo\\Core\\Controllers\\SecurityPolicyController	10	f	f	[" * "]	\N	t	f
14	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Security Policy Association	Demo\\Core\\Models\\PermissionPolicyAssociation	Demo\\Core\\Controllers\\PermissionPolicyAssociationController	10	f	f	[" * "]	\N	t	f
15	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Role Policy Association	Demo\\Core\\Models\\RolePolicyAssociation	Demo\\Core\\Controllers\\RolePolicyAssociationController	10	f	f	[" * "]	\N	t	f
18	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Notification Channel	Demo\\Notification\\Models\\NotificationChannel	Demo\\Notification\\Controllers\\NotificationChannelController	10	f	f	[" * "]	\N	t	f
19	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Notification	Demo\\Notification\\Models\\Notification	Demo\\Notification\\Controllers\\NotificationController	10	f	f	[" * "]	\N	t	f
113	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Queue	Demo\\Workflow\\Models\\Queue	Demo\\Workflow\\Controllers\\QueueController	11	f	f	["*"]	\N	t	f
114	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Queue Item	Demo\\Workflow\\Models\\QueueItem	Demo\\Workflow\\Controllers\\QueueItemController	11	f	f	["*"]	\N	t	f
115	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Queue Pop Criteria	Demo\\Workflow\\Models\\QueuePopCriteria	Demo\\Workflow\\Controllers\\QueuePopCriteriaController	11	f	f	["*"]	\N	t	f
116	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Queue Routing Rule	Demo\\Workflow\\Models\\QueueRoutingRule	Demo\\Workflow\\Controllers\\QueueRoutingRuleController	11	f	f	["*"]	\N	t	f
117	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Workflow	Demo\\Workflow\\Models\\Workflow	Demo\\Workflow\\Controllers\\WorkflowController	11	f	f	["*"]	\N	t	f
119	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Workflow State	Demo\\Workflow\\Models\\WorkflowState	Demo\\Workflow\\Controllers\\WorkflowStateController	11	f	f	["*"]	\N	t	f
120	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Workflow Transition	Demo\\Workflow\\Models\\WorkflowTransition	Demo\\Workflow\\Controllers\\WorkflowTransitionController	11	f	f	["*"]	\N	t	f
121	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Webhook	Demo\\Workflow\\Models\\Webhook	Demo\\Workflow\\Controllers\\WebhookController	11	f	f	["*"]	\N	t	f
118	2019-12-20 14:15:39	2020-04-12 13:38:42	1	1	Workflow Item	Demo\\Workflow\\Models\\WorkflowItem	Demo\\Workflow\\Controllers\\WorkflowItemController	11	f	f	["id","created_at","updated_at","0"]		t	f
31	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Widget	Demo\\Report\\Models\\Widget	Demo\\Report\\Controllers\\WidgetController	14	f	f	["*"]	\N	t	f
32	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Dashboard	Demo\\Report\\Models\\Dashboard	Demo\\Report\\Controllers\\DashboardController	14	f	f	["*"]	\N	t	f
508	2020-04-27 12:16:53	2020-05-08 08:13:16	1	1	Role	Demo\\Core\\Models\\Role	Demo\\Core\\Controllers\\RoleController	10	f	f	0		f	f
510	2020-05-10 04:11:48	2020-05-10 04:11:48	1	1	users	Demo\\Core\\Models\\User	Demo\\Core\\Controllers\\UserController	10	f	f	*		f	f
511	2020-05-10 04:11:48	2020-05-10 04:11:48	1	1	case_priority	Demo\\Casemanager\\Models\\Casepriority	Demo\\Casemanager\\Controllers\\CasepriorityController	10	f	f	*		f	f
512	2020-05-10 04:11:48	2020-05-10 04:11:48	1	1	workflow_transitions	Demo\\Workflow\\Models\\WorkflowTransitions	Demo\\Workflow\\Controllers\\WorkflowTransitionsController	10	f	f	*		f	f
513	2020-05-10 04:11:48	2020-05-10 04:11:48	1	1	logs	Demo\\Notification\\Models\\NotificationLog	Demo\\Notification\\Controllers\\NotificationLogController	10	f	f	*		f	f
514	2020-05-10 04:11:48	2020-05-10 04:11:48	1	1	user_role_associations	Demo\\Core\\Models\\UserRoleAssociation	Demo\\Core\\Controllers\\UserRoleAssociationController	10	f	f	*		f	f
515	2020-05-10 04:11:48	2020-05-10 04:11:48	1	1	routing_rules	Demo\\Workflow\\Models\\QueueRoutingrule	Demo\\Workflow\\Controllers\\QueueRoutingruleController	10	f	f	*		f	f
504	2020-04-27 10:59:17	2020-04-27 11:06:05	1	1	Case Priority	Demo\\Casemanager\\Models\\CasePriority	Demo\\Casemanager\\Controllers\\CasePriorityController	6	f	f	0		f	f
16	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	User	Demo\\Core\\Models\\CoreUser	Demo\\Core\\Controllers\\UserController	10	f	f	[" * "]	\N	t	f
17	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	User	Demo\\Core\\Models\\CoreUserGroup	Demo\\Core\\Controllers\\UserGroupController	10	f	f	[" * "]	\N	t	f
502	2020-04-26 07:16:16	2020-04-26 07:16:16	1	1	Form Action	Demo\\Core\\Models\\FormAction	Demo\\Core\\Controllers\\FormActionController	10	f	f	0		f	t
505	2020-04-27 11:51:21	2020-04-27 11:55:17	1	1	Project	Demo\\Casemanager\\Models\\Project	Demo\\Casemanager\\Controllers\\ProjectController	6	f	f	0		f	f
523	2020-05-17 05:53:01	2020-05-17 05:53:01	1	1	Mail Templates	Demo\\Notification\\Models\\MailTemplate	Demo\\Notification\\Controllers\\MailTemplates	3	f	f	0		f	f
516	2020-05-10 04:11:48	2020-05-10 04:11:48	1	1	service_channel	Demo\\Workflow\\Models\\ServiceChannel	Demo\\Workflow\\Controllers\\ServiceChannelController	10	f	f	*		f	f
517	2020-05-10 04:11:48	2020-05-10 04:11:48	1	1	groups	Demo\\Core\\Models\\UserGroup	Demo\\Core\\Controllers\\UserGroupController	10	f	f	*		f	f
518	2020-05-10 05:15:28	2020-05-10 05:15:28	1	1	Navigation Role Association	Demo\\Core\\Models\\NavigationRoleAssociation	Demo\\Core\\Controllers\\NavigationRoleAssociationController	10	f	f	0		f	f
509	2020-05-09 11:25:29	2020-05-10 16:00:23	1	1	Navigation	Demo\\Core\\Models\\Navigation	Demo\\Core\\Controllers\\NavigationController	10	f	f	["*"]		f	f
519	2020-05-16 05:56:51	2020-05-16 05:56:51	1	1	UI Page	Demo\\Core\\Models\\UiPage	Demo\\Core\\Controllers\\UiPageController	10	f	f	0		f	f
520	2020-05-17 05:46:59	2020-05-17 05:46:59	1	1	Mail Brand Setting	Demo\\Notification\\Models\\MailBrandSetting	Demo\\Notification\\Controllers\\MailBrandSetting	3	f	f	0		f	f
521	2020-05-17 05:47:53	2020-05-17 05:47:53	1	1	Mail Layouts	Demo\\Notification\\Models\\MailLayout	Demo\\Notification\\Controllers\\MailLayouts	3	f	f	0		f	f
522	2020-05-17 05:52:11	2020-05-17 05:52:11	1	1	Mail Partial	Demo\\Notification\\Models\\MailPartial	Demo\\Notification\\Controllers\\MailPartials	3	f	f	0		f	f
\.


--
-- Name: demo_core_models_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_core_models_id_seq', 523, true);


--
-- Name: demo_core_nav_role_associations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_core_nav_role_associations_id_seq', 291, true);


--
-- Data for Name: demo_core_navigations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_navigations (id, created_at, updated_at, created_by_id, updated_by_id, version, label, type, active, name, description, url, model, view, form, record_id, plugin_id, parent_id, sort_order, icon, dashboard_id, widget_id, uipage_id) FROM stdin;
5	\N	\N	1	1	\N	Model Association	list	t	model_association	\N	\N	Demo\\Core\\Models\\ModelAssociation	\N	\N	\N	10	1	2	icon-puzzle-piece	\N	\N	\N
2	2020-05-09 11:48:03	2020-05-09 11:48:03	1	1	\N	Models	list	t	models			Demo\\Core\\Models\\ModelModel	\N		\N	10	1	0	oc-icon-table	\N	\N	\N
10	\N	\N	1	1	\N	Commands	list	t	commands	\N	\N	Demo\\Core\\Models\\Command	\N	\N	\N	10	1	7	icon-terminal	\N	\N	\N
12	\N	\N	1	1	\N	Webhooks	list	t	webhooks	\N	\N	Demo\\Core\\Models\\Webhook	\N	\N	\N	10	1	9	icon-chain	\N	\N	\N
18	\N	\N	1	1	\N	Users	list	t	users	\N	\N	Demo\\Core\\Models\\User	\N	\N	\N	10	17	0	icon-user	\N	\N	\N
19	\N	\N	1	1	\N	Roles	list	t	roles	\N	\N	Demo\\Core\\Models\\Role	\N	\N	\N	10	17	1	icon-suitcase	\N	\N	\N
21	\N	\N	1	1	\N	Permissions	list	t	permissions	\N	\N	Demo\\Core\\Models\\Permission	\N	\N	\N	10	17	3	icon-key	\N	\N	\N
28	\N	\N	1	1	\N	Notifications	list	t	notifications	\N	\N	Demo\\Notification\\Models\\Notification	\N	\N	\N	10	26	1	icon-comment	\N	\N	\N
31	2020-05-09 15:11:36	2020-05-09 15:11:36	1	1	\N	Reports	folder	t	reports			\N	\N		\N	10	\N	4	oc-icon-book	\N	\N	\N
32	\N	\N	1	1	\N	Dashboards	list	t	dashboards	\N	\N	Demo\\Report\\Models\\Dashboard	\N	\N	\N	10	31	0	icon-tachometer	\N	\N	\N
33	\N	\N	1	1	\N	Widgets	list	t	widgets	\N	\N	Demo\\Report\\Models\\Widget	\N	\N	\N	10	31	1	icon-codepen	\N	\N	\N
35	\N	\N	1	1	\N	Workflows	list	t	workflows	\N	\N	Demo\\Workflow\\Models\\Workflow	\N	\N	\N	10	34	0	icon-recycle	\N	\N	\N
46	\N	\N	1	1	\N	Case Priority	list	t	case_priority	\N	\N	Demo\\Casemanager\\Models\\Casepriority	\N	\N	\N	10	44	1	icon-flash	\N	\N	\N
17	2020-05-09 15:07:01	2020-05-09 15:32:22	1	1	\N	Security	folder	t	security			\N	\N		\N	10	48	2	oc-icon-lock	\N	\N	\N
1	2020-05-09 11:33:08	2020-05-09 15:32:33	1	1	\N	Engine	folder	t	engine			\N	\N		\N	10	48	1	oc-icon-gears	\N	\N	\N
43	\N	\N	1	1	\N	Pop Criteria	list	t	pop_criteria	\N	\N	Demo\\Workflow\\Models\\QueuePopCriteria	\N	\N	\N	10	34	8	icon-code	\N	\N	\N
24	\N	\N	1	1	\N	Role Policy Associations	list	t	role_policy_associations	\N	\N	Demo\\Core\\Models\\RolePolicyAssociation	\N	\N	\N	10	17	6	icon-dot-circle-o	\N	\N	\N
11	\N	2020-05-16 06:05:13	1	1	\N	Iframe	list	t	iframe			Demo\\Core\\Models\\Iframe	\N		\N	10	55	8	oc-icon-adjust	\N	\N	\N
4	\N	2020-05-16 06:05:32	1	1	\N	Navigations	list	t	navigations			Demo\\Core\\Models\\Navigation	\N		\N	10	55	1	oc-icon-adjust	\N	\N	\N
40	\N	2020-05-16 07:44:41	1	1	\N	Queues	list	t	queues			Demo\\Workflow\\Models\\Queue	\N		\N	11	34	5	oc-icon-adjust	\N	\N	\N
26	2020-05-09 15:09:59	2020-05-16 14:23:03	1	1	\N	Notification	folder	t	notification			\N	\N		\N	3	\N	3	oc-icon-envelope	\N	\N	\N
34	2020-05-09 15:13:06	2020-05-16 14:24:22	1	1	\N	Workflow	folder	t	workflow			\N	\N		\N	11	\N	5	oc-icon-recycle	\N	\N	\N
47	\N	\N	1	1	\N	Projects	list	t	projects	\N	\N	Demo\\Casemanager\\Models\\Project	\N	\N	\N	10	44	2	icon-briefcase	\N	\N	\N
44	2020-05-09 15:16:49	2020-05-09 15:30:47	1	1	\N	Case Management	folder	t	case-management			\N	\N		\N	10	51	6	oc-icon-institution	\N	\N	\N
16	\N	\N	1	1	\N	Audit Logs	list	t	audit_logs	\N	\N	Demo\\Core\\Models\\AuditLog	\N	\N	\N	10	1	13	icon-file-archive-o	\N	\N	\N
8	\N	\N	1	1	\N	Event Handler	list	t	event_handler	\N	\N	Demo\\Core\\Models\\EventHandler	\N	\N	\N	10	1	5	icon-code	\N	\N	\N
38	\N	\N	1	1	\N	Workflow States	list	t	workflow_states	\N	\N	Demo\\Workflow\\Models\\WorkflowState	\N	\N	\N	10	34	3	icon-dot-circle-o	\N	\N	\N
37	\N	\N	1	1	\N	Workflow Transitions	list	t	workflow_transitions	\N	\N	Demo\\Workflow\\Models\\WorkflowTransitions	\N	\N	\N	10	34	2	icon-long-arrow-right	\N	\N	\N
30	\N	\N	1	1	\N	Logs	list	t	logs	\N	\N	Demo\\Notification\\Models\\NotificationLog	\N	\N	\N	10	26	3	icon-file	\N	\N	\N
25	\N	\N	1	1	\N	User Role Associations	list	t	user_role_associations	\N	\N	Demo\\Core\\Models\\UserRoleAssociation	\N	\N	\N	10	17	7	icon-user-plus	\N	\N	\N
42	\N	\N	1	1	\N	Routing Rules	list	t	routing_rules	\N	\N	Demo\\Workflow\\Models\\QueueRoutingrule	\N	\N	\N	10	34	7	icon-share-alt	\N	\N	\N
23	\N	\N	1	1	\N	Policy Permissions	list	t	policy_permissions	\N	\N	Demo\\Core\\Models\\SecurityPolicy	\N	\N	\N	10	17	5	icon-sitemap	\N	\N	\N
20	\N	\N	1	1	\N	Policies	list	t	policies	\N	\N	Demo\\Core\\Models\\SecurityPolicy	\N	\N	\N	10	17	2	icon-circle-o-notch	\N	\N	\N
27	\N	\N	1	1	\N	Channels	list	t	channels	\N	\N	Demo\\Notification\\Models\\NotificationChannel	\N	\N	\N	10	26	0	icon-signal	\N	\N	\N
39	\N	\N	1	1	\N	Service Channel	list	t	service_channel	\N	\N	Demo\\Workflow\\Models\\ServiceChannel	\N	\N	\N	10	34	4	icon-sitemap	\N	\N	\N
29	\N	\N	1	1	\N	Notification Subscribers	list	t	notification_subscribers	\N	\N	Demo\\Notification\\Models\\NotificationSubscriber	\N	\N	\N	10	26	2	icon-users	\N	\N	\N
9	\N	\N	1	1	\N	Inbound Api	list	t	inbound_api	\N	\N	Demo\\Core\\Models\\InboundApi	\N	\N	\N	10	1	6	icon-space-shuttle	\N	\N	\N
41	\N	\N	1	1	\N	Queue Items	list	t	queue_items	\N	\N	Demo\\Workflow\\Models\\QueueItem	\N	\N	\N	10	34	6	icon-stack-exchange	\N	\N	\N
22	\N	\N	1	1	\N	Groups	list	t	groups	\N	\N	Demo\\Core\\Models\\UserGroup	\N	\N	\N	10	17	4	icon-users	\N	\N	\N
36	\N	\N	1	1	\N	Workflow Items	list	t	workflow_items	\N	\N	Demo\\Workflow\\Models\\WorkflowItem	\N	\N	\N	10	34	1	icon-tag	\N	\N	\N
6	\N	\N	1	1	\N	Fields	list	t	fields	\N	\N	Demo\\Core\\Models\\CustomField	\N	\N	\N	10	1	3	icon-th-list	\N	\N	\N
54	2020-05-13 04:38:17	2020-05-13 04:38:31	1	1	\N	Dashboard	dashboard	t	dashboard			\N	\N		\N	6	44	4	oc-icon-dashboard	1	\N	\N
49	2020-05-09 15:26:31	2020-05-16 14:23:26	1	1	\N	Messaging	folder	f	messaging			\N	\N		\N	10	\N	2	oc-icon-mail-forward	\N	\N	\N
53	2020-05-13 04:37:14	2020-05-13 04:39:02	1	1	\N	Case Report	widget	t	case-report			\N	\N		\N	6	44	0	oc-icon-book	\N	1	\N
55	2020-05-16 06:02:40	2020-05-16 06:02:40	1	1	\N	User Interface	folder	t	user-interface			\N	\N		\N	10	48	2	oc-icon-desktop	\N	\N	\N
15	\N	2020-05-16 06:04:57	1	1	\N	List Actions	list	t	list_actions			Demo\\Core\\Models\\ListAction	\N		\N	10	55	12	oc-icon-adjust	\N	\N	\N
14	\N	2020-05-16 06:05:03	1	1	\N	Form Actions	list	t	form_actions			Demo\\Core\\Models\\FormAction	\N		\N	10	55	11	oc-icon-adjust	\N	\N	\N
13	\N	2020-05-16 06:05:07	1	1	\N	Libraries	list	t	libraries			Demo\\Core\\Models\\JavascriptLibrary	\N		\N	10	55	10	oc-icon-adjust	\N	\N	\N
50	2020-05-09 15:27:27	2020-05-16 14:23:48	1	1	\N	Main	folder	f	main			\N	\N		\N	10	\N	3	oc-icon-bolt	\N	\N	\N
7	\N	2020-05-16 06:05:20	1	1	\N	Form Fields	list	t	form_fields			Demo\\Core\\Models\\FormField	\N		\N	10	55	4	oc-icon-adjust	\N	\N	\N
56	2020-05-16 06:47:21	2020-05-16 06:47:21	1	1	\N	Page -Hello World	uipage	t	page-hello-world			\N	\N		\N	10	55	15	oc-icon-child	\N	\N	2
48	2020-05-09 15:23:48	2020-05-09 15:23:48	1	1	\N	System	folder	t	system			\N	\N		\N	10	\N	1	oc-icon-desktop	\N	\N	\N
51	2020-05-09 15:28:15	2020-05-09 15:28:15	1	1	\N	Workspace	folder	t	workspace			\N	\N		\N	10	\N	5	oc-icon-user-secret	\N	\N	\N
57	2020-05-16 14:51:56	2020-05-16 14:51:56	1	1	\N	Pages	list	t	pages			Demo\\Core\\Models\\UiPage	\N		\N	10	55	5	oc-icon-codepen	\N	\N	\N
52	2020-05-10 10:28:19	2020-05-16 14:59:12	1	1	2	Youtube	url	t	youtube		https://www.youtube.com/embed/RBumgq5yVrA	Demo\\Report\\Models\\Dashboard	\N		\N	6	44	5	oc-icon-adjust	\N	\N	\N
58	2020-05-17 06:17:22	2020-05-17 06:17:22	1	1	\N	Templates	list	t	templates			Demo\\Notification\\Models\\MailTemplate	\N		\N	3	26	4	oc-icon-file-code-o	\N	\N	\N
45	\N	2020-05-18 04:31:45	1	1	\N	Pick Cases	list	t	pick-cases			Demo\\Casemanager\\Models\\CaseModel	\N		\N	6	44	0	oc-icon-ambulance	\N	\N	\N
59	2020-05-18 04:33:41	2020-05-23 05:32:57	1	1	\N	My Cases	list	t	my-cases			Demo\\Casemanager\\Models\\CaseModel	mycases		\N	6	44	0	oc-icon-briefcase	\N	\N	\N
\.


--
-- Name: demo_core_navigations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_core_navigations_id_seq', 61, true);


--
-- Data for Name: demo_core_permission_policy_associations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_permission_policy_associations (id, created_at, updated_at, created_by_id, updated_by_id, plugin_id, permission_id, policy_id) FROM stdin;
504	2020-04-26 07:09:40	2020-04-26 07:09:40	1	1	2	500	507
505	2020-04-26 07:09:40	2020-04-26 07:09:40	1	1	2	501	507
506	2020-04-26 07:09:40	2020-04-26 07:09:40	1	1	2	502	507
507	2020-04-26 07:09:40	2020-04-26 07:09:40	1	1	2	503	507
508	2020-04-26 07:09:40	2020-04-26 07:09:40	1	1	2	504	507
533	2020-04-27 10:59:16	2020-04-27 10:59:16	1	1	6	529	514
534	2020-04-27 10:59:16	2020-04-27 10:59:16	1	1	6	530	514
535	2020-04-27 10:59:16	2020-04-27 10:59:16	1	1	6	531	514
536	2020-04-27 10:59:17	2020-04-27 10:59:17	1	1	6	532	514
16	2020-04-06 07:56:24	2020-04-06 07:56:24	1	1	6	81	61
17	2020-04-06 07:56:24	2020-04-06 07:56:24	1	1	6	83	61
18	2020-04-06 07:56:24	2020-04-06 07:56:24	1	1	6	85	61
524	2020-04-26 07:16:15	2020-04-26 07:16:15	1	1	2	520	512
525	2020-04-26 07:16:16	2020-04-26 07:16:16	1	1	2	521	512
526	2020-04-26 07:16:16	2020-04-26 07:16:16	1	1	2	522	512
527	2020-04-26 07:16:16	2020-04-26 07:16:16	1	1	2	523	512
528	2020-04-26 07:16:16	2020-04-26 07:16:16	1	1	2	524	512
19	2020-04-06 07:56:24	2020-04-06 07:56:24	1	1	6	87	61
20	2020-04-06 07:58:19	2020-04-06 07:58:19	1	1	6	82	62
21	2020-04-06 07:58:19	2020-04-06 07:58:19	1	1	6	84	62
22	2020-04-06 07:58:19	2020-04-06 07:58:19	1	1	6	86	62
23	2020-04-06 07:58:19	2020-04-06 07:58:19	1	1	6	88	62
14	2020-04-06 07:18:47	2020-04-06 07:18:47	6	6	14	242	142
15	2020-04-06 07:18:47	2020-04-06 07:18:47	6	6	14	243	142
537	2020-04-27 11:51:21	2020-04-27 11:51:21	1	1	6	533	515
538	2020-04-27 11:51:21	2020-04-27 11:51:21	1	1	6	534	515
539	2020-04-27 11:51:21	2020-04-27 11:51:21	1	1	6	535	515
540	2020-04-27 11:51:21	2020-04-27 11:51:21	1	1	6	536	515
549	2020-04-27 12:16:52	2020-04-27 12:16:52	1	1	10	545	518
550	2020-04-27 12:16:53	2020-04-27 12:16:53	1	1	10	546	518
551	2020-04-27 12:16:53	2020-04-27 12:16:53	1	1	10	547	518
552	2020-04-27 12:16:53	2020-04-27 12:16:53	1	1	10	548	518
553	2020-05-09 11:25:28	2020-05-09 11:25:28	1	1	10	549	519
554	2020-05-09 11:25:29	2020-05-09 11:25:29	1	1	10	550	519
555	2020-05-09 11:25:29	2020-05-09 11:25:29	1	1	10	551	519
556	2020-05-09 11:25:29	2020-05-09 11:25:29	1	1	10	552	519
557	2020-05-10 05:15:28	2020-05-10 05:15:28	1	1	10	553	520
558	2020-05-10 05:15:28	2020-05-10 05:15:28	1	1	10	554	520
559	2020-05-10 05:15:28	2020-05-10 05:15:28	1	1	10	555	520
560	2020-05-10 05:15:28	2020-05-10 05:15:28	1	1	10	556	520
561	2020-05-16 05:56:51	2020-05-16 05:56:51	1	1	10	557	521
562	2020-05-16 05:56:51	2020-05-16 05:56:51	1	1	10	558	521
563	2020-05-16 05:56:51	2020-05-16 05:56:51	1	1	10	559	521
564	2020-05-16 05:56:51	2020-05-16 05:56:51	1	1	10	560	521
565	2020-05-17 05:46:59	2020-05-17 05:46:59	1	1	3	561	522
566	2020-05-17 05:46:59	2020-05-17 05:46:59	1	1	3	562	522
567	2020-05-17 05:46:59	2020-05-17 05:46:59	1	1	3	563	522
568	2020-05-17 05:46:59	2020-05-17 05:46:59	1	1	3	564	522
569	2020-05-17 05:47:53	2020-05-17 05:47:53	1	1	3	565	523
570	2020-05-17 05:47:53	2020-05-17 05:47:53	1	1	3	566	523
571	2020-05-17 05:47:53	2020-05-17 05:47:53	1	1	3	567	523
572	2020-05-17 05:47:53	2020-05-17 05:47:53	1	1	3	568	523
573	2020-05-17 05:52:10	2020-05-17 05:52:10	1	1	3	569	524
574	2020-05-17 05:52:11	2020-05-17 05:52:11	1	1	3	570	524
575	2020-05-17 05:52:11	2020-05-17 05:52:11	1	1	3	571	524
576	2020-05-17 05:52:11	2020-05-17 05:52:11	1	1	3	572	524
577	2020-05-17 05:53:01	2020-05-17 05:53:01	1	1	3	573	525
578	2020-05-17 05:53:01	2020-05-17 05:53:01	1	1	3	574	525
579	2020-05-17 05:53:01	2020-05-17 05:53:01	1	1	3	575	525
580	2020-05-17 05:53:01	2020-05-17 05:53:01	1	1	3	576	525
\.


--
-- Name: demo_core_permission_policy_associations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_core_permission_policy_associations_id_seq', 580, true);


--
-- Data for Name: demo_core_permissions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_permissions (id, created_at, updated_at, created_by_id, updated_by_id, plugin_id, model, operation, columns, condition, code, admin_override, name, description, active, system) FROM stdin;
529	2020-04-27 10:59:16	2020-04-27 10:59:16	1	1	6	Demo\\Casemanager\\Models\\CasePriority	read	\N	\N	demo.casemanager::models.casepriority.row.read	t	Case Priority read Permission	This is the system generated permission for Case Priority read	t	t
530	2020-04-27 10:59:16	2020-04-27 10:59:16	1	1	6	Demo\\Casemanager\\Models\\CasePriority	write	\N	\N	demo.casemanager::models.casepriority.row.write	t	Case Priority write Permission	This is the system generated permission for Case Priority write	t	t
531	2020-04-27 10:59:16	2020-04-27 10:59:16	1	1	6	Demo\\Casemanager\\Models\\CasePriority	create	\N	\N	demo.casemanager::models.casepriority.row.create	t	Case Priority create Permission	This is the system generated permission for Case Priority create	t	t
532	2020-04-27 10:59:17	2020-04-27 10:59:17	1	1	6	Demo\\Casemanager\\Models\\CasePriority	delete	\N	\N	demo.casemanager::models.casepriority.row.delete	t	Case Priority delete Permission	This is the system generated permission for Case Priority delete	t	t
81	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	6	Demo\\Casemanager\\Models\\CaseModel	read			demo.casemanager::models.casemodel.row.read	t	Case Model Read Permission		t	t
82	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	6	Demo\\Casemanager\\Models\\CasePriority	read			demo.casemanager::models.casepriority.row.read	t	Case Priority Read Permission		t	t
83	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	6	Demo\\Casemanager\\Models\\CaseModel	write			demo.casemanager::models.casemodel.row.write	t	Case Model Write Permission		t	t
84	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	6	Demo\\Casemanager\\Models\\CasePriority	write			demo.casemanager::models.casepriority.row.write	t	Case Priority Write Permission		t	t
85	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	6	Demo\\Casemanager\\Models\\CaseModel	create			demo.casemanager::models.casemodel.row.create	t	Case Model Create Permission		t	t
86	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	6	Demo\\Casemanager\\Models\\CasePriority	create			demo.casemanager::models.casepriority.row.create	t	Case Priority Create Permission		t	t
87	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	6	Demo\\Casemanager\\Models\\CaseModel	delete			demo.casemanager::models.casemodel.row.delete	t	Case Model Delete Permission		t	t
88	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	6	Demo\\Casemanager\\Models\\CasePriority	delete			demo.casemanager::models.casepriority.row.delete	t	Case Priority Delete Permission		t	t
19	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\ModelModel	read	\N	\N	demo.core::models.model.row.read	t	Models Model Read Permission	\N	t	t
20	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\CustomField	read	\N	\N	demo.core::models.customfield.row.read	t	Custom Field Read Permission	\N	t	t
21	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\FormField	read	\N	\N	demo.core::models.formfield.row.read	t	Form Field Read Permission	\N	t	t
22	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\EventHandler	read	\N	\N	demo.core::models.eventhandler.row.read	t	Event Handler Read Permission	\N	t	t
23	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\InboundApi	read	\N	\N	demo.core::models.inboundapi.row.read	t	Inbound Api Read Permission	\N	t	t
24	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\Command	read	\N	\N	demo.core::models.command.row.read	t	Command Read Permission	\N	t	t
25	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\Iframe	read	\N	\N	demo.core::models.iframe.row.read	t	Iframe Read Permission	\N	t	t
26	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\JavascriptLibrary	read	\N	\N	demo.core::models.javascriptlibrary.row.read	t	Javascript Library Read Permission	\N	t	t
27	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\Webhook	read	\N	\N	demo.core::models.webhook.row.read	t	Webhook Read Permission	\N	t	t
28	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\ModelAssociation	read	\N	\N	demo.core::models.modelassociation.row.read	t	Model Association Read Permission	\N	t	t
29	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\Role	read	\N	\N	demo.core::models.role.row.read	t	Role Read Permission	\N	t	t
30	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\Permission	read	\N	\N	demo.core::models.permission.row.read	t	Permission Read Permission	\N	t	t
31	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\SecurityPolicy	read	\N	\N	demo.core::models.securitypolicy.row.read	t	Security Policy Read Permission	\N	t	t
32	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\PermissionPolicyAssociation	read	\N	\N	demo.core::models.permissionpolicyassociation.row.read	t	Security Policy Association Read Permission	\N	t	t
33	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\RolePolicyAssociation	read	\N	\N	demo.core::models.rolepolicyassociation.row.read	t	Role Policy Association Read Permission	\N	t	t
34	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\CoreUser	read	\N	\N	demo.core::models.coreuser.row.read	t	User Read Permission	\N	t	t
35	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\CoreUserGroup	read	\N	\N	demo.core::models.coreusergroup.row.read	t	User Read Permission	\N	t	t
59	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\ModelModel	write	\N	\N	demo.core::models.model.row.write	t	Models Model Write Permission	\N	t	t
60	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\CustomField	write	\N	\N	demo.core::models.customfield.row.write	t	Custom Field Write Permission	\N	t	t
61	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\FormField	write	\N	\N	demo.core::models.formfield.row.write	t	Form Field Write Permission	\N	t	t
62	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\EventHandler	write	\N	\N	demo.core::models.eventhandler.row.write	t	Event Handler Write Permission	\N	t	t
63	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\InboundApi	write	\N	\N	demo.core::models.inboundapi.row.write	t	Inbound Api Write Permission	\N	t	t
64	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\Command	write	\N	\N	demo.core::models.command.row.write	t	Command Write Permission	\N	t	t
65	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\Iframe	write	\N	\N	demo.core::models.iframe.row.write	t	Iframe Write Permission	\N	t	t
66	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\JavascriptLibrary	write	\N	\N	demo.core::models.javascriptlibrary.row.write	t	Javascript Library Write Permission	\N	t	t
67	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\Webhook	write	\N	\N	demo.core::models.webhook.row.write	t	Webhook Write Permission	\N	t	t
68	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\ModelAssociation	write	\N	\N	demo.core::models.modelassociation.row.write	t	Model Association Write Permission	\N	t	t
69	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\Role	write	\N	\N	demo.core::models.role.row.write	t	Role Write Permission	\N	t	t
70	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\Permission	write	\N	\N	demo.core::models.permission.row.write	t	Permission Write Permission	\N	t	t
71	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\SecurityPolicy	write	\N	\N	demo.core::models.securitypolicy.row.write	t	Security Policy Write Permission	\N	t	t
72	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\PermissionPolicyAssociation	write	\N	\N	demo.core::models.permissionpolicyassociation.row.write	t	Security Policy Association Write Permission	\N	t	t
73	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\RolePolicyAssociation	write	\N	\N	demo.core::models.rolepolicyassociation.row.write	t	Role Policy Association Write Permission	\N	t	t
74	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\CoreUser	write	\N	\N	demo.core::models.coreuser.row.write	t	User Write Permission	\N	t	t
75	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\CoreUserGroup	write	\N	\N	demo.core::models.coreusergroup.row.write	t	User Write Permission	\N	t	t
99	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\ModelModel	create	\N	\N	demo.core::models.model.row.create	t	Models Model Create Permission	\N	t	t
100	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\CustomField	create	\N	\N	demo.core::models.customfield.row.create	t	Custom Field Create Permission	\N	t	t
101	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\FormField	create	\N	\N	demo.core::models.formfield.row.create	t	Form Field Create Permission	\N	t	t
102	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\EventHandler	create	\N	\N	demo.core::models.eventhandler.row.create	t	Event Handler Create Permission	\N	t	t
103	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\InboundApi	create	\N	\N	demo.core::models.inboundapi.row.create	t	Inbound Api Create Permission	\N	t	t
104	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\Command	create	\N	\N	demo.core::models.command.row.create	t	Command Create Permission	\N	t	t
105	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\Iframe	create	\N	\N	demo.core::models.iframe.row.create	t	Iframe Create Permission	\N	t	t
106	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\JavascriptLibrary	create	\N	\N	demo.core::models.javascriptlibrary.row.create	t	Javascript Library Create Permission	\N	t	t
107	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\Webhook	create	\N	\N	demo.core::models.webhook.row.create	t	Webhook Create Permission	\N	t	t
108	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\ModelAssociation	create	\N	\N	demo.core::models.modelassociation.row.create	t	Model Association Create Permission	\N	t	t
109	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\Role	create	\N	\N	demo.core::models.role.row.create	t	Role Create Permission	\N	t	t
110	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\Permission	create	\N	\N	demo.core::models.permission.row.create	t	Permission Create Permission	\N	t	t
111	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\SecurityPolicy	create	\N	\N	demo.core::models.securitypolicy.row.create	t	Security Policy Create Permission	\N	t	t
112	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\PermissionPolicyAssociation	create	\N	\N	demo.core::models.permissionpolicyassociation.row.create	t	Security Policy Association Create Permission	\N	t	t
113	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\RolePolicyAssociation	create	\N	\N	demo.core::models.rolepolicyassociation.row.create	t	Role Policy Association Create Permission	\N	t	t
114	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\CoreUser	create	\N	\N	demo.core::models.coreuser.row.create	t	User Create Permission	\N	t	t
115	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\CoreUserGroup	create	\N	\N	demo.core::models.coreusergroup.row.create	t	User Create Permission	\N	t	t
139	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\ModelModel	delete	\N	\N	demo.core::models.model.row.delete	t	Models Model Delete Permission	\N	t	t
140	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\CustomField	delete	\N	\N	demo.core::models.customfield.row.delete	t	Custom Field Delete Permission	\N	t	t
141	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\FormField	delete	\N	\N	demo.core::models.formfield.row.delete	t	Form Field Delete Permission	\N	t	t
142	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\EventHandler	delete	\N	\N	demo.core::models.eventhandler.row.delete	t	Event Handler Delete Permission	\N	t	t
143	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\InboundApi	delete	\N	\N	demo.core::models.inboundapi.row.delete	t	Inbound Api Delete Permission	\N	t	t
144	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\Command	delete	\N	\N	demo.core::models.command.row.delete	t	Command Delete Permission	\N	t	t
145	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\Iframe	delete	\N	\N	demo.core::models.iframe.row.delete	t	Iframe Delete Permission	\N	t	t
146	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\JavascriptLibrary	delete	\N	\N	demo.core::models.javascriptlibrary.row.delete	t	Javascript Library Delete Permission	\N	t	t
147	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\Webhook	delete	\N	\N	demo.core::models.webhook.row.delete	t	Webhook Delete Permission	\N	t	t
148	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\ModelAssociation	delete	\N	\N	demo.core::models.modelassociation.row.delete	t	Model Association Delete Permission	\N	t	t
149	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\Role	delete	\N	\N	demo.core::models.role.row.delete	t	Role Delete Permission	\N	t	t
158	2019-12-20 14:15:39	2019-12-28 14:43:57	1	1	15	Demo\\Notification\\Models\\NotificationChannel	read	\N	\N	demo.notification::models.notificationchannel.row.read	t	Notification Channel Read Permission	\N	t	t
159	2019-12-20 14:15:39	2019-12-28 14:43:57	1	1	15	Demo\\Notification\\Models\\NotificationChannel	write	\N	\N	demo.notification::models.notificationchannel.row.write	t	Notification Channel Write Permission	\N	t	t
160	2019-12-20 14:15:39	2019-12-28 14:43:57	1	1	15	Demo\\Notification\\Models\\NotificationChannel	create	\N	\N	demo.notification::models.notificationchannel.row.create	t	Notification Channel Create Permission	\N	t	t
161	2019-12-20 14:15:39	2019-12-28 14:43:57	1	1	15	Demo\\Notification\\Models\\NotificationChannel	delete	\N	\N	demo.notification::models.notificationchannel.row.delete	t	Notification Channel Delete Permission	\N	t	t
162	2019-12-20 14:15:39	2019-12-28 14:43:57	1	1	15	Demo\\Notification\\Models\\Notification	read	\N	\N	demo.notification::models.notification.row.delete	t	Notification Read Permission	\N	t	t
163	2019-12-20 14:15:39	2019-12-28 14:43:57	1	1	15	Demo\\Notification\\Models\\Notification	write	\N	\N	demo.notification::models.notification.row.write	t	Notification Write Permission	\N	t	t
164	2019-12-20 14:15:39	2019-12-28 14:43:57	1	1	15	Demo\\Notification\\Models\\Notification	create	\N	\N	demo.notification::models.notification.row.create	t	Notification Create Permission	\N	t	t
165	2019-12-20 14:15:39	2019-12-28 14:43:57	1	1	15	Demo\\Notification\\Models\\Notification	delete	\N	\N	demo.notification::models.notification.row.delete	t	Notification Delete Permission	\N	t	t
166	2019-12-20 14:15:39	2019-12-28 14:43:57	1	1	15	Demo\\Notification\\Models\\NotificationSubscriber	read	\N	\N	demo.notification::models.notificationsubscriber.row.delete	t	NotificationSubscriber Read Permission	\N	t	t
150	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\Permission	delete	\N	\N	demo.core::models.permission.row.delete	t	Permission Delete Permission	\N	t	t
167	2019-12-20 14:15:39	2019-12-28 14:43:57	1	1	15	Demo\\Notification\\Models\\NotificationSubscriber	write	\N	\N	demo.notification::models.notificationsubscriber.row.write	t	NotificationSubscriber Write Permission	\N	t	t
168	2019-12-20 14:15:39	2019-12-28 14:43:57	1	1	15	Demo\\Notification\\Models\\NotificationSubscriber	create	\N	\N	demo.notification::models.notificationsubscriber.row.create	t	NotificationSubscriber Create Permission	\N	t	t
169	2019-12-20 14:15:39	2019-12-28 14:43:57	1	1	15	Demo\\Notification\\Models\\NotificationSubscriber	delete	\N	\N	demo.notification::models.notificationsubscriber.row.delete	t	NotificationSubscriber Delete Permission	\N	t	t
151	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\SecurityPolicy	delete	\N	\N	demo.core::models.securitypolicy.row.delete	t	Security Policy Delete Permission	\N	t	t
152	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\PermissionPolicyAssociation	delete	\N	\N	demo.core::models.permissionpolicyassociation.row.delete	t	Security Policy Association Delete Permission	\N	t	t
153	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\RolePolicyAssociation	delete	\N	\N	demo.core::models.rolepolicyassociation.row.delete	t	Role Policy Association Delete Permission	\N	t	t
154	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\CoreUser	delete	\N	\N	demo.core::models.coreuser.row.delete	t	User Delete Permission	\N	t	t
155	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\CoreUserGroup	delete	\N	\N	demo.core::models.coreusergroup.row.delete	t	User Delete Permission	\N	t	t
211	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\Queue	read	\N	\N	demo.workflow::models.queue.row.read	t	Queue Read Permission	\N	t	t
212	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\QueueItem	write	\N	\N	demo.workflow::models.queueitem.row.write	t	Queue Item Write Permission	\N	t	t
213	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\QueueItem	create	\N	\N	demo.workflow::models.queueitem.row.create	t	Queue Item Create Permission	\N	t	t
214	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\QueuePopCriteria	create	\N	\N	demo.workflow::models.queuepopcriteria.row.create	t	Queue Pop Criteria Create Permission	\N	t	t
215	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\WorkflowState	read	\N	\N	demo.workflow::models.workflowstate.row.read	t	Workflow State Read Permission	\N	t	t
216	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\Workflow	create	\N	\N	demo.workflow::models.workflow.row.create	t	Workflow Create Permission	\N	t	t
250	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\WorkflowItem	create	\N	\N	demo.workflow::models.workflowitem.row.create	t	Workflow Item Create Permission	\N	t	t
217	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\WorkflowTransition	delete	\N	\N	demo.workflow::models.workflowtransition.row.delete	t	Workflow Transition Delete Permission	\N	t	t
251	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\QueueRoutingRule	write	\N	\N	demo.workflow::models.queueroutingrule.row.write	t	Queue Routing Rule Write Permission	\N	t	t
218	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\QueueRoutingRule	read	\N	\N	demo.workflow::models.queueroutingrule.row.read	t	Queue Routing Rule Read Permission	\N	t	t
253	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\WorkflowItem	write	\N	\N	demo.workflow::models.workflowitem.row.write	t	Workflow Item Write Permission	\N	t	t
219	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\WorkflowTransition	create	\N	\N	demo.workflow::models.workflowtransition.row.create	t	Workflow Transition Create Permission	\N	t	t
220	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\Queue	delete	\N	\N	demo.workflow::models.queue.row.delete	t	Queue Delete Permission	\N	t	t
221	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\Workflow	read	\N	\N	demo.workflow::models.workflow.row.read	t	Workflow Read Permission	\N	t	t
222	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\WorkflowState	write	\N	\N	demo.workflow::models.workflowstate.row.write	t	Workflow State Write Permission	\N	t	t
223	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\WorkflowTransition	write	\N	\N	demo.workflow::models.workflowtransition.row.write	t	Workflow Transition Write Permission	\N	t	t
224	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\Workflow	write	\N	\N	demo.workflow::models.workflow.row.write	t	Workflow Write Permission	\N	t	t
225	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\Queue	create	\N	\N	demo.workflow::models.queue.row.create	t	Queue Create Permission	\N	t	t
226	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\Workflow	delete	\N	\N	demo.workflow::models.workflow.row.delete	t	Workflow Delete Permission	\N	t	t
227	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\Queue	write	\N	\N	demo.workflow::models.queue.row.write	t	Queue Write Permission	\N	t	t
228	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\QueueItem	delete	\N	\N	demo.workflow::models.queueitem.row.delete	t	Queue Item Delete Permission	\N	t	t
229	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\WorkflowItem	read	\N	\N	demo.workflow::models.workflowitem.row.read	t	Workflow Item Read Permission	\N	t	t
230	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\WorkflowState	delete	\N	\N	demo.workflow::models.workflowstate.row.delete	t	Workflow State Delete Permission	\N	t	t
231	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\QueuePopCriteria	read	\N	\N	demo.workflow::models.queuepopcriteria.row.read	t	Queue Pop Criteria Read Permission	\N	t	t
232	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\QueuePopCriteria	write	\N	\N	demo.workflow::models.queuepopcriteria.row.write	t	Queue Pop Criteria Write Permission	\N	t	t
233	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\WorkflowTransition	read	\N	\N	demo.workflow::models.workflowtransition.row.read	t	Workflow Transition Read Permission	\N	t	t
234	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\WorkflowItem	delete	\N	\N	demo.workflow::models.workflowitem.row.delete	t	Workflow Item Delete Permission	\N	t	t
235	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\QueuePopCriteria	delete	\N	\N	demo.workflow::models.queuepopcriteria.row.delete	t	Queue Pop Criteria Delete Permission	\N	t	t
236	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\QueueRoutingRule	create	\N	\N	demo.workflow::models.queueroutingrule.row.create	t	Queue Routing Rule Create Permission	\N	t	t
237	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\QueueRoutingRule	delete	\N	\N	demo.workflow::models.queueroutingrule.row.delete	t	Queue Routing Rule Delete Permission	\N	t	t
238	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\WorkflowState	create	\N	\N	demo.workflow::models.workflowstate.row.create	t	Workflow State Create Permission	\N	t	t
239	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\QueueItem	read	\N	\N	demo.workflow::models.queueitem.row.read	t	Queue Item Read Permission	\N	t	t
246	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	14	Demo\\Report\\Models\\Dashboard	delete	\N	\N	demo.report::models.dashboard.row.delete	t	Dashboard Delete Permission	\N	t	t
247	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	14	Demo\\Report\\Models\\Dashboard	create	\N	\N	demo.report::models.dashboard.row.create	t	Dashboard Create Permission	\N	t	t
248	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	14	Demo\\Report\\Models\\Widget	write	\N	\N	demo.report::models.widget.row.write	t	Widget Write Permission	\N	t	t
241	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	14	Demo\\Report\\Models\\Widget	read	\N	\N	demo.report::models.widget.row.read	t	Widget Read Permission	\N	t	t
242	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	14	Demo\\Report\\Models\\Dashboard	write	\N	\N	demo.report::models.dashboard.row.write	t	Dashboard Write Permission	\N	t	t
243	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	14	Demo\\Report\\Models\\Dashboard	read	\N	\N	demo.report::models.dashboard.row.read	t	Dashboard Read Permission	\N	t	t
244	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	14	Demo\\Report\\Models\\Widget	delete	\N	\N	demo.report::models.widget.row.delete	t	Widget Delete Permission	\N	t	t
245	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	14	Demo\\Report\\Models\\Widget	create	\N	\N	demo.report::models.widget.row.create	t	Widget Create Permission	\N	t	t
533	2020-04-27 11:51:21	2020-04-27 11:51:21	1	1	6	Demo\\Casemanager\\Models\\Project	read	\N	\N	demo.casemanager::models.project.row.read	t	Project read Permission	This is the system generated permission for Project read	t	t
534	2020-04-27 11:51:21	2020-04-27 11:51:21	1	1	6	Demo\\Casemanager\\Models\\Project	write	\N	\N	demo.casemanager::models.project.row.write	t	Project write Permission	This is the system generated permission for Project write	t	t
535	2020-04-27 11:51:21	2020-04-27 11:51:21	1	1	6	Demo\\Casemanager\\Models\\Project	create	\N	\N	demo.casemanager::models.project.row.create	t	Project create Permission	This is the system generated permission for Project create	t	t
536	2020-04-27 11:51:21	2020-04-27 11:51:21	1	1	6	Demo\\Casemanager\\Models\\Project	delete	\N	\N	demo.casemanager::models.project.row.delete	t	Project delete Permission	This is the system generated permission for Project delete	t	t
549	2020-05-09 11:25:28	2020-05-09 11:25:28	1	1	10	Demo\\Core\\Models\\Navigation	read	\N	\N	demo.core::models.navigation.row.read	t	Navigation read Permission	This is the system generated permission for Navigation read	t	t
550	2020-05-09 11:25:28	2020-05-09 11:25:28	1	1	10	Demo\\Core\\Models\\Navigation	write	\N	\N	demo.core::models.navigation.row.write	t	Navigation write Permission	This is the system generated permission for Navigation write	t	t
551	2020-05-09 11:25:29	2020-05-09 11:25:29	1	1	10	Demo\\Core\\Models\\Navigation	create	\N	\N	demo.core::models.navigation.row.create	t	Navigation create Permission	This is the system generated permission for Navigation create	t	t
552	2020-05-09 11:25:29	2020-05-09 11:25:29	1	1	10	Demo\\Core\\Models\\Navigation	delete	\N	\N	demo.core::models.navigation.row.delete	t	Navigation delete Permission	This is the system generated permission for Navigation delete	t	t
500	2020-04-26 07:09:39	2020-04-26 07:09:39	1	1	10	Demo\\Core\\Models\\ListAction	read	\N	\N	demo.core::models.listaction.row.read	t	List Action read Permission	This is the system generated permission for List Action read	t	t
501	2020-04-26 07:09:40	2020-04-26 07:09:40	1	1	10	Demo\\Core\\Models\\ListAction	write	\N	\N	demo.core::models.listaction.row.write	t	List Action write Permission	This is the system generated permission for List Action write	t	t
502	2020-04-26 07:09:40	2020-04-26 07:09:40	1	1	10	Demo\\Core\\Models\\ListAction	create	\N	\N	demo.core::models.listaction.row.create	t	List Action create Permission	This is the system generated permission for List Action create	t	t
503	2020-04-26 07:09:40	2020-04-26 07:09:40	1	1	10	Demo\\Core\\Models\\ListAction	delete	\N	\N	demo.core::models.listaction.row.delete	t	List Action delete Permission	This is the system generated permission for List Action delete	t	t
504	2020-04-26 07:09:40	2020-04-26 07:09:40	1	1	10	Demo\\Core\\Models\\ListAction	view	\N	\N	demo.core::models.listaction.row.view	t	List Action view Permission	This is the system generated permission for List Action view	t	t
557	2020-05-16 05:56:51	2020-05-16 05:56:51	1	1	10	Demo\\Core\\Models\\UiPage	read	\N	\N	demo.core::models.uipage.row.read	t	UI Page read Permission	This is the system generated permission for UI Page read	t	t
558	2020-05-16 05:56:51	2020-05-16 05:56:51	1	1	10	Demo\\Core\\Models\\UiPage	write	\N	\N	demo.core::models.uipage.row.write	t	UI Page write Permission	This is the system generated permission for UI Page write	t	t
559	2020-05-16 05:56:51	2020-05-16 05:56:51	1	1	10	Demo\\Core\\Models\\UiPage	create	\N	\N	demo.core::models.uipage.row.create	t	UI Page create Permission	This is the system generated permission for UI Page create	t	t
560	2020-05-16 05:56:51	2020-05-16 05:56:51	1	1	10	Demo\\Core\\Models\\UiPage	delete	\N	\N	demo.core::models.uipage.row.delete	t	UI Page delete Permission	This is the system generated permission for UI Page delete	t	t
565	2020-05-17 05:47:52	2020-05-17 05:47:52	1	1	3	Demo\\Notification\\Models\\MailLayout	read	\N	\N	demo.notification::models.maillayout.row.read	t	Mail Layouts read Permission	This is the system generated permission for Mail Layouts read	t	t
566	2020-05-17 05:47:53	2020-05-17 05:47:53	1	1	3	Demo\\Notification\\Models\\MailLayout	write	\N	\N	demo.notification::models.maillayout.row.write	t	Mail Layouts write Permission	This is the system generated permission for Mail Layouts write	t	t
567	2020-05-17 05:47:53	2020-05-17 05:47:53	1	1	3	Demo\\Notification\\Models\\MailLayout	create	\N	\N	demo.notification::models.maillayout.row.create	t	Mail Layouts create Permission	This is the system generated permission for Mail Layouts create	t	t
568	2020-05-17 05:47:53	2020-05-17 05:47:53	1	1	3	Demo\\Notification\\Models\\MailLayout	delete	\N	\N	demo.notification::models.maillayout.row.delete	t	Mail Layouts delete Permission	This is the system generated permission for Mail Layouts delete	t	t
573	2020-05-17 05:53:01	2020-05-17 05:53:01	1	1	3	Demo\\Notification\\Models\\MailTemplate	read	\N	\N	demo.notification::models.mailtemplate.row.read	t	Mail Templates read Permission	This is the system generated permission for Mail Templates read	t	t
574	2020-05-17 05:53:01	2020-05-17 05:53:01	1	1	3	Demo\\Notification\\Models\\MailTemplate	write	\N	\N	demo.notification::models.mailtemplate.row.write	t	Mail Templates write Permission	This is the system generated permission for Mail Templates write	t	t
575	2020-05-17 05:53:01	2020-05-17 05:53:01	1	1	3	Demo\\Notification\\Models\\MailTemplate	create	\N	\N	demo.notification::models.mailtemplate.row.create	t	Mail Templates create Permission	This is the system generated permission for Mail Templates create	t	t
576	2020-05-17 05:53:01	2020-05-17 05:53:01	1	1	3	Demo\\Notification\\Models\\MailTemplate	delete	\N	\N	demo.notification::models.mailtemplate.row.delete	t	Mail Templates delete Permission	This is the system generated permission for Mail Templates delete	t	t
545	2020-04-27 12:16:52	2020-04-27 12:16:52	1	1	10	Demo\\Core\\Models\\Role	read	\N	\N	demo.core::models.role.row.read	t	Role read Permission	This is the system generated permission for Role read	t	t
546	2020-04-27 12:16:53	2020-04-27 12:16:53	1	1	10	Demo\\Core\\Models\\Role	write	\N	\N	demo.core::models.role.row.write	t	Role write Permission	This is the system generated permission for Role write	t	t
547	2020-04-27 12:16:53	2020-04-27 12:16:53	1	1	10	Demo\\Core\\Models\\Role	create	\N	\N	demo.core::models.role.row.create	t	Role create Permission	This is the system generated permission for Role create	t	t
548	2020-04-27 12:16:53	2020-04-27 12:16:53	1	1	10	Demo\\Core\\Models\\Role	delete	\N	\N	demo.core::models.role.row.delete	t	Role delete Permission	This is the system generated permission for Role delete	t	t
553	2020-05-10 05:15:28	2020-05-10 05:15:28	1	1	10	Demo\\Core\\Models\\NavigationRoleAssociation	read	\N	\N	demo.core::models.navigationroleassociation.row.read	t	Navigation Role Association read Permission	This is the system generated permission for Navigation Role Association read	t	t
554	2020-05-10 05:15:28	2020-05-10 05:15:28	1	1	10	Demo\\Core\\Models\\NavigationRoleAssociation	write	\N	\N	demo.core::models.navigationroleassociation.row.write	t	Navigation Role Association write Permission	This is the system generated permission for Navigation Role Association write	t	t
555	2020-05-10 05:15:28	2020-05-10 05:15:28	1	1	10	Demo\\Core\\Models\\NavigationRoleAssociation	create	\N	\N	demo.core::models.navigationroleassociation.row.create	t	Navigation Role Association create Permission	This is the system generated permission for Navigation Role Association create	t	t
556	2020-05-10 05:15:28	2020-05-10 05:15:28	1	1	10	Demo\\Core\\Models\\NavigationRoleAssociation	delete	\N	\N	demo.core::models.navigationroleassociation.row.delete	t	Navigation Role Association delete Permission	This is the system generated permission for Navigation Role Association delete	t	t
520	2020-04-26 07:16:15	2020-04-26 07:16:15	1	1	10	Demo\\Core\\Models\\FormAction	read	\N	\N	demo.core::models.formaction.row.read	t	Form Action read Permission	This is the system generated permission for Form Action read	t	t
521	2020-04-26 07:16:15	2020-04-26 07:16:15	1	1	10	Demo\\Core\\Models\\FormAction	write	\N	\N	demo.core::models.formaction.row.write	t	Form Action write Permission	This is the system generated permission for Form Action write	t	t
522	2020-04-26 07:16:16	2020-04-26 07:16:16	1	1	10	Demo\\Core\\Models\\FormAction	create	\N	\N	demo.core::models.formaction.row.create	t	Form Action create Permission	This is the system generated permission for Form Action create	t	t
523	2020-04-26 07:16:16	2020-04-26 07:16:16	1	1	10	Demo\\Core\\Models\\FormAction	delete	\N	\N	demo.core::models.formaction.row.delete	t	Form Action delete Permission	This is the system generated permission for Form Action delete	t	t
524	2020-04-26 07:16:16	2020-04-26 07:16:16	1	1	10	Demo\\Core\\Models\\FormAction	view	\N	\N	demo.core::models.formaction.row.view	t	Form Action view Permission	This is the system generated permission for Form Action view	t	t
561	2020-05-17 05:46:59	2020-05-17 05:46:59	1	1	3	Demo\\Notification\\Models\\MailBrandSetting	read	\N	\N	demo.notification::models.mailbrandsetting.row.read	t	Mail Brand Setting read Permission	This is the system generated permission for Mail Brand Setting read	t	t
562	2020-05-17 05:46:59	2020-05-17 05:46:59	1	1	3	Demo\\Notification\\Models\\MailBrandSetting	write	\N	\N	demo.notification::models.mailbrandsetting.row.write	t	Mail Brand Setting write Permission	This is the system generated permission for Mail Brand Setting write	t	t
563	2020-05-17 05:46:59	2020-05-17 05:46:59	1	1	3	Demo\\Notification\\Models\\MailBrandSetting	create	\N	\N	demo.notification::models.mailbrandsetting.row.create	t	Mail Brand Setting create Permission	This is the system generated permission for Mail Brand Setting create	t	t
564	2020-05-17 05:46:59	2020-05-17 05:46:59	1	1	3	Demo\\Notification\\Models\\MailBrandSetting	delete	\N	\N	demo.notification::models.mailbrandsetting.row.delete	t	Mail Brand Setting delete Permission	This is the system generated permission for Mail Brand Setting delete	t	t
569	2020-05-17 05:52:10	2020-05-17 05:52:10	1	1	3	Demo\\Notification\\Models\\MailPartial	read	\N	\N	demo.notification::models.mailpartial.row.read	t	Mail Partial read Permission	This is the system generated permission for Mail Partial read	t	t
570	2020-05-17 05:52:10	2020-05-17 05:52:10	1	1	3	Demo\\Notification\\Models\\MailPartial	write	\N	\N	demo.notification::models.mailpartial.row.write	t	Mail Partial write Permission	This is the system generated permission for Mail Partial write	t	t
571	2020-05-17 05:52:11	2020-05-17 05:52:11	1	1	3	Demo\\Notification\\Models\\MailPartial	create	\N	\N	demo.notification::models.mailpartial.row.create	t	Mail Partial create Permission	This is the system generated permission for Mail Partial create	t	t
572	2020-05-17 05:52:11	2020-05-17 05:52:11	1	1	3	Demo\\Notification\\Models\\MailPartial	delete	\N	\N	demo.notification::models.mailpartial.row.delete	t	Mail Partial delete Permission	This is the system generated permission for Mail Partial delete	t	t
\.


--
-- Name: demo_core_permissions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_core_permissions_id_seq', 576, true);


--
-- Data for Name: demo_core_role_policy_associations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_role_policy_associations (id, created_at, updated_at, created_by_id, updated_by_id, plugin_id, role_id, policy_id) FROM stdin;
3	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	3	61
4	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	3	61
5	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	3	61
6	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	3	61
7	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	3	61
8	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	3	61
9	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	3	61
22	2020-05-10 06:31:16	2020-05-10 06:31:16	1	1	6	2	143
23	2020-05-10 06:31:16	2020-05-10 06:31:16	1	1	6	2	61
24	2020-05-10 06:31:16	2020-05-10 06:31:16	1	1	6	2	62
25	2020-05-10 06:31:16	2020-05-10 06:31:16	1	1	6	2	514
26	2020-05-10 06:31:16	2020-05-10 06:31:16	1	1	6	2	507
27	2020-05-10 06:31:16	2020-05-10 06:31:16	1	1	6	2	512
\.


--
-- Name: demo_core_role_policy_associations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_core_role_policy_associations_id_seq', 27, true);


--
-- Data for Name: demo_core_roles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_roles (id, created_at, updated_at, created_by_id, updated_by_id, name, code, description, plugin_id) FROM stdin;
2	2020-04-04 14:10:36	2020-04-06 07:16:12	1	1	Agent	agent	test	6
1	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Administrator	admin	Admin of the platform	10
\.


--
-- Name: demo_core_roles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_core_roles_id_seq', 1, false);


--
-- Data for Name: demo_core_security_policies; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_security_policies (id, created_at, updated_at, created_by_id, updated_by_id, name, description, plugin_id) FROM stdin;
143	2020-04-06 14:06:17	2020-04-06 14:06:17	1	1	Agent Case Policy		6
61	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Case Model Security Policy	Security Policy for all operations on Case Model	6
62	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Case Priority Security Policy	Security Policy for all operations on Case Priority	6
514	2020-04-27 10:59:16	2020-04-27 10:59:16	1	1	Case Priority Policy	Autogenerated policy for Case Priority	6
21	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Models Model Security Policy	Security Policy for all operations on Models Model	10
22	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Custom Field Security Policy	Security Policy for all operations on Custom Field	10
23	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Form Field Security Policy	Security Policy for all operations on Form Field	10
24	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Event Handler Security Policy	Security Policy for all operations on Event Handler	10
25	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Inbound Api Security Policy	Security Policy for all operations on Inbound Api	10
26	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Command Security Policy	Security Policy for all operations on Command	10
27	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Iframe Security Policy	Security Policy for all operations on Iframe	10
28	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Javascript Library Security Policy	Security Policy for all operations on Javascript Library	10
29	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Webhook Security Policy	Security Policy for all operations on Webhook	10
30	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Model Association Security Policy	Security Policy for all operations on Model Association	10
31	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Role Security Policy	Security Policy for all operations on Role	10
32	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Permission Security Policy	Security Policy for all operations on Permission	10
33	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Security Policy Security Policy	Security Policy for all operations on Security Policy	10
34	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Security Policy Association Security Policy	Security Policy for all operations on Security Policy Association	10
35	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Role Policy Association Security Policy	Security Policy for all operations on Role Policy Association	10
36	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	User Security Policy	Security Policy for all operations on User	10
37	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	User Security Policy -1	Security Policy for all operations on User	10
14	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Workflow Security Policy	Security Policy for all operations on Workflow	11
15	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Workflow Item Security Policy	Security Policy for all operations on Workflow Item	11
16	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Workflow State Security Policy	Security Policy for all operations on Workflow State	11
17	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Workflow Transition Security Policy	Security Policy for all operations on Workflow Transition	11
18	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Webhook Security Policy -1	Security Policy for all operations on Webhook	11
19	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Widget Security Policy	Security Policy for all operations on Widget	11
20	2019-12-20 14:15:39	2019-12-28 14:43:57	1	1	Dashboard Security Policy	Security Policy for all operations on Dashboard	11
111	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Queue Security Policy	Security Policy for all operations on Queue	11
112	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Queue Item Security Policy	Security Policy for all operations on Queue Item	11
113	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Queue Pop Criteria Security Policy	Security Policy for all operations on Queue Pop Criteria	11
114	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Queue Routing Rule Security Policy	Security Policy for all operations on Queue Routing Rule	11
1	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Queue Security Policy-1	Security Policy for all operations on Queue	11
2	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Queue Item Security Policy-1	Security Policy for all operations on Queue Item	11
3	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Queue Pop Criteria Security Policy-1	Security Policy for all operations on Queue Pop Criteria	11
4	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Queue Routing Rule Security Policy-1	Security Policy for all operations on Queue Routing Rule	11
5	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Workflow Security Policy-1	Security Policy for all operations on Workflow	11
6	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Workflow Item Security Policy-1	Security Policy for all operations on Workflow Item	11
7	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Workflow State Security Policy-1	Security Policy for all operations on Workflow State	11
8	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Workflow Transition Security Policy-1	Security Policy for all operations on Workflow Transition	11
9	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Webhook Security Policy -2	Security Policy for all operations on Webhook	11
10	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Queue Security Policy-2	Security Policy for all operations on Queue	11
11	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Queue Item Security Policy-2	Security Policy for all operations on Queue Item	11
12	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Queue Pop Criteria Security Policy-2	Security Policy for all operations on Queue Pop Criteria	11
13	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Queue Routing Rule Security Policy-2	Security Policy for all operations on Queue Routing Rule	11
115	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Report Security Policy	Security Policy for all operations on Report	11
116	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Report Item Security Policy	Security Policy for all operations on Report Item	11
117	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Report State Security Policy	Security Policy for all operations on Report State	11
118	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Report Transition Security Policy	Security Policy for all operations on Report Transition	11
120	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Queue Security Policy-3	Security Policy for all operations on Queue	11
121	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Queue Item Security Policy-3	Security Policy for all operations on Queue Item	11
122	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Queue Pop Criteria Security Policy-3	Security Policy for all operations on Queue Pop Criteria	11
123	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Queue Routing Rule Security Policy-3	Security Policy for all operations on Queue Routing Rule	11
124	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Report Security Policy-1	Security Policy for all operations on Report	11
125	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Report Item Security Policy-1	Security Policy for all operations on Report Item	11
126	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Report State Security Policy-1	Security Policy for all operations on Report State	11
141	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Widget Security Policy-1	Security Policy for all operations on Widget	14
142	2019-12-20 14:15:39	2019-12-28 14:43:57	1	1	Dashboard Security Policy-1	Security Policy for all operations on Dashboard	14
518	2020-04-27 12:16:52	2020-04-27 12:16:52	1	1	Role Policy	Autogenerated policy for Role	10
520	2020-05-10 05:15:28	2020-05-10 05:15:28	1	1	Navigation Role Association Policy	Autogenerated policy for Navigation Role Association	10
522	2020-05-17 05:46:59	2020-05-17 05:46:59	1	1	Mail Brand Setting Policy	Autogenerated policy for Mail Brand Setting	3
524	2020-05-17 05:52:10	2020-05-17 05:52:10	1	1	Mail Partial Policy	Autogenerated policy for Mail Partial	3
507	2020-04-26 07:09:39	2020-04-26 07:09:39	1	1	List Action Policy	Autogenerated policy for List Action	2
512	2020-04-26 07:16:15	2020-04-26 07:16:15	1	1	Form Action Policy	Autogenerated policy for Form Action	2
515	2020-04-27 11:51:21	2020-04-27 11:51:21	1	1	Project Policy	Autogenerated policy for Project	6
519	2020-05-09 11:25:28	2020-05-09 11:25:28	1	1	Navigation Policy	Autogenerated policy for Navigation	10
521	2020-05-16 05:56:50	2020-05-16 05:56:50	1	1	UI Page Policy	Autogenerated policy for UI Page	10
523	2020-05-17 05:47:52	2020-05-17 05:47:52	1	1	Mail Layouts Policy	Autogenerated policy for Mail Layouts	3
525	2020-05-17 05:53:00	2020-05-17 05:53:00	1	1	Mail Templates Policy	Autogenerated policy for Mail Templates	3
\.


--
-- Name: demo_core_security_policies_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_core_security_policies_id_seq', 525, true);


--
-- Name: demo_core_ui_page_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_core_ui_page_id_seq', 2, true);


--
-- Data for Name: demo_core_ui_pages; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_ui_pages (id, created_at, updated_at, created_by_id, updated_by_id, version, name, description, code, template, plugin_id) FROM stdin;
2	2020-05-16 06:00:56	2020-05-16 15:13:38	1	1	\N	Hello World		hello-world	<h1>\r\n    Hello World\r\n</h1>	10
\.


--
-- Data for Name: demo_core_user_role_associations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_user_role_associations (id, created_at, updated_at, user_id, role_id, plugin_id, created_by_id, updated_by_id) FROM stdin;
1	2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	1	1
8	2020-04-06 08:54:23	2020-04-06 08:54:23	3	2	10	1	1
12	2020-04-06 14:03:21	2020-04-06 14:03:21	6	2	10	1	1
3	2020-05-10 06:10:59	2020-05-10 06:10:59	2	2	10	1	1
\.


--
-- Name: demo_core_user_role_associations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_core_user_role_associations_id_seq', 3, true);


--
-- Data for Name: demo_core_view_role_associations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_view_role_associations (id, created_at, updated_at, created_by_id, updated_by_id, version, record_id, role_id, plugin_id, model) FROM stdin;
282	2020-05-18 04:31:45	2020-05-18 04:31:45	1	1	\N	45	2	6	Demo\\Core\\Models\\Navigation
283	2020-05-18 04:31:45	2020-05-18 04:31:45	1	1	\N	45	1	6	Demo\\Core\\Models\\Navigation
55	2020-05-10 06:31:16	2020-05-10 06:31:16	1	1	\N	46	2	6	Demo\\Core\\Models\\Navigation
56	2020-05-10 06:31:16	2020-05-10 06:31:16	1	1	\N	51	2	6	Demo\\Core\\Models\\Navigation
57	2020-05-10 06:31:16	2020-05-10 06:31:16	1	1	\N	44	2	6	Demo\\Core\\Models\\Navigation
210	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	5	1	10	Demo\\Core\\Models\\Navigation
211	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	2	1	10	Demo\\Core\\Models\\Navigation
212	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	10	1	10	Demo\\Core\\Models\\Navigation
213	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	12	1	10	Demo\\Core\\Models\\Navigation
214	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	18	1	10	Demo\\Core\\Models\\Navigation
215	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	19	1	10	Demo\\Core\\Models\\Navigation
216	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	21	1	10	Demo\\Core\\Models\\Navigation
217	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	28	1	10	Demo\\Core\\Models\\Navigation
218	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	31	1	10	Demo\\Core\\Models\\Navigation
219	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	32	1	10	Demo\\Core\\Models\\Navigation
220	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	33	1	10	Demo\\Core\\Models\\Navigation
221	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	35	1	10	Demo\\Core\\Models\\Navigation
222	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	46	1	10	Demo\\Core\\Models\\Navigation
223	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	17	1	10	Demo\\Core\\Models\\Navigation
224	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	1	1	10	Demo\\Core\\Models\\Navigation
225	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	43	1	10	Demo\\Core\\Models\\Navigation
226	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	24	1	10	Demo\\Core\\Models\\Navigation
227	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	11	1	10	Demo\\Core\\Models\\Navigation
228	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	4	1	10	Demo\\Core\\Models\\Navigation
229	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	40	1	10	Demo\\Core\\Models\\Navigation
230	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	26	1	10	Demo\\Core\\Models\\Navigation
231	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	34	1	10	Demo\\Core\\Models\\Navigation
232	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	47	1	10	Demo\\Core\\Models\\Navigation
233	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	44	1	10	Demo\\Core\\Models\\Navigation
234	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	16	1	10	Demo\\Core\\Models\\Navigation
235	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	8	1	10	Demo\\Core\\Models\\Navigation
236	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	38	1	10	Demo\\Core\\Models\\Navigation
237	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	37	1	10	Demo\\Core\\Models\\Navigation
238	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	30	1	10	Demo\\Core\\Models\\Navigation
239	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	25	1	10	Demo\\Core\\Models\\Navigation
241	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	42	1	10	Demo\\Core\\Models\\Navigation
242	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	23	1	10	Demo\\Core\\Models\\Navigation
243	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	20	1	10	Demo\\Core\\Models\\Navigation
244	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	27	1	10	Demo\\Core\\Models\\Navigation
245	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	39	1	10	Demo\\Core\\Models\\Navigation
246	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	29	1	10	Demo\\Core\\Models\\Navigation
247	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	9	1	10	Demo\\Core\\Models\\Navigation
248	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	41	1	10	Demo\\Core\\Models\\Navigation
249	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	22	1	10	Demo\\Core\\Models\\Navigation
250	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	36	1	10	Demo\\Core\\Models\\Navigation
251	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	6	1	10	Demo\\Core\\Models\\Navigation
252	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	54	1	10	Demo\\Core\\Models\\Navigation
253	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	49	1	10	Demo\\Core\\Models\\Navigation
254	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	53	1	10	Demo\\Core\\Models\\Navigation
255	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	55	1	10	Demo\\Core\\Models\\Navigation
256	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	15	1	10	Demo\\Core\\Models\\Navigation
257	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	14	1	10	Demo\\Core\\Models\\Navigation
258	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	13	1	10	Demo\\Core\\Models\\Navigation
259	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	50	1	10	Demo\\Core\\Models\\Navigation
260	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	7	1	10	Demo\\Core\\Models\\Navigation
261	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	56	1	10	Demo\\Core\\Models\\Navigation
262	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	48	1	10	Demo\\Core\\Models\\Navigation
263	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	51	1	10	Demo\\Core\\Models\\Navigation
264	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	57	1	10	Demo\\Core\\Models\\Navigation
265	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	52	1	10	Demo\\Core\\Models\\Navigation
266	2020-05-17 06:26:58	2020-05-17 06:26:58	1	1	\N	58	1	10	Demo\\Core\\Models\\Navigation
267	2020-05-17 06:26:59	2020-05-17 06:26:59	1	1	\N	2	1	10	Demo\\Core\\Models\\UiPage
268	2020-05-17 06:26:59	2020-05-17 06:26:59	1	1	\N	2	1	10	Demo\\Core\\Models\\ListAction
269	2020-05-17 06:26:59	2020-05-17 06:26:59	1	1	\N	5	1	10	Demo\\Core\\Models\\ListAction
270	2020-05-17 06:26:59	2020-05-17 06:26:59	1	1	\N	4	1	10	Demo\\Core\\Models\\ListAction
271	2020-05-17 06:26:59	2020-05-17 06:26:59	1	1	\N	3	1	10	Demo\\Core\\Models\\ListAction
272	2020-05-17 06:26:59	2020-05-17 06:26:59	1	1	\N	1	1	10	Demo\\Core\\Models\\ListAction
273	2020-05-17 06:26:59	2020-05-17 06:26:59	1	1	\N	8	1	10	Demo\\Core\\Models\\FormAction
274	2020-05-17 06:26:59	2020-05-17 06:26:59	1	1	\N	9	1	10	Demo\\Core\\Models\\FormAction
275	2020-05-17 06:26:59	2020-05-17 06:26:59	1	1	\N	2	1	10	Demo\\Core\\Models\\FormAction
276	2020-05-17 06:26:59	2020-05-17 06:26:59	1	1	\N	1	1	10	Demo\\Core\\Models\\FormAction
277	2020-05-17 06:26:59	2020-05-17 06:26:59	1	1	\N	10	1	10	Demo\\Core\\Models\\FormAction
278	2020-05-17 06:26:59	2020-05-17 06:26:59	1	1	\N	3	1	10	Demo\\Core\\Models\\FormAction
279	2020-05-17 06:26:59	2020-05-17 06:26:59	1	1	\N	4	1	10	Demo\\Core\\Models\\FormAction
280	2020-05-17 06:26:59	2020-05-17 06:26:59	1	1	\N	1	1	10	Demo\\Report\\Models\\Widget
281	2020-05-17 06:26:59	2020-05-17 06:26:59	1	1	\N	1	1	10	Demo\\Report\\Models\\Dashboard
290	2020-05-23 05:32:57	2020-05-23 05:32:57	1	1	\N	59	2	6	Demo\\Core\\Models\\Navigation
291	2020-05-23 05:32:57	2020-05-23 05:32:57	1	1	\N	59	1	6	Demo\\Core\\Models\\Navigation
\.


--
-- Data for Name: demo_core_webhooks; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_webhooks (id, created_at, updated_at, created_by_id, updated_by_id, name, description, active, url, method, request_headers, request_body, condition, event, model, async, timeout) FROM stdin;
\.


--
-- Name: demo_core_webhooks_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_core_webhooks_id_seq', 1, false);


--
-- Data for Name: demo_notification_channels; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_notification_channels (id, created_at, updated_at, created_by_id, updated_by_id, script, configuration, active, plugin_id, name, description) FROM stdin;
2	2019-12-27 14:30:24	2019-12-28 04:54:07	1	1	$fromUser = $context->self->getConfig('from_user');\r\n$notification = $context->notification;\r\n$subscribers = $notification->getSubscribers();\r\n$template = $notification->template;\r\n$pluginCon = $context->getPluginConnection('demo.notification');\r\n$logger = $pluginCon->getPluginLogger();\r\nforeach($subscribers as $subscriber){\r\n    $logger->debug('Sending notification '.$template->code .' to '.$subscriber->email);\r\n    $context->Mail::send($template->code, $context->toArray() , function($message) use($notification,$template,$subscriber,$context) {\r\n        $message->to( $subscriber->email, $subscriber->first_name.' '.$subscriber->last_name);  \r\n    });    \r\n}	[{"configuration":"from_user","value":"test@test.com"}]	t	15	Simple Email Channel	Email Notification channel
1	2019-12-25 14:14:11	2019-12-27 15:16:37	1	1	$fromUser = $context->self->getConfig('from_user');\r\n$notification = $context->notification;\r\n$subscribers = $notification->getSubscribers();\r\n$template = $notification->template;\r\nforeach($subscribers as $subscriber){\r\n    $context->Mail::queue($template->code, $context->toArray() , function($message) use($notification,$template,$subscriber) {\r\n        $message->to( $subscriber->email, $subscriber->first_name.' '.$subscriber->last_name);    \r\n    });    \r\n}	[{"configuration":"from_user","value":"test@test.com"}]	t	10	Queued Email Channel	Email Notification channel
\.


--
-- Name: demo_notification_channels_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_notification_channels_id_seq', 1, false);


--
-- Data for Name: demo_notification_logs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_notification_logs (id, created_at, updated_at, created_by_id, updated_by_id, notification_id, delivered, status) FROM stdin;
1	2019-12-27 16:40:07	2019-12-27 16:40:07	1	1	2	t	success
2	2019-12-27 16:40:47	2019-12-27 16:40:47	1	1	2	t	success
\.


--
-- Name: demo_notification_logs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_notification_logs_id_seq', 1, false);


--
-- Data for Name: demo_notification_notifications; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_notification_notifications (id, created_at, updated_at, created_by_id, updated_by_id, event, model, name, description, condition, plugin_id, active, enable_logging, template_id, channel_id) FROM stdin;
\.


--
-- Name: demo_notification_notifications_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_notification_notifications_id_seq', 1, false);


--
-- Data for Name: demo_notification_subscribers; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_notification_subscribers (id, created_at, updated_at, created_by_id, updated_by_id, subscriber_id, subscriber_group_id, plugin_id, notification_id) FROM stdin;
\.


--
-- Name: demo_notification_subscribers_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_notification_subscribers_id_seq', 1, false);


--
-- Data for Name: demo_report_dashboards; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_report_dashboards (id, created_at, updated_at, created_by_id, updated_by_id, name, description, active, config_widgets, public, code, plugin_id) FROM stdin;
1	2020-05-10 09:22:09	2020-05-10 15:54:50	1	1	Default Deshboard		1	[{"x":"0","y":"0","width":"6","height":"8","widget":"1"},{"x":"6","y":"0","width":"6","height":"8","widget":"1"}]	0	default-dashboard	3
\.


--
-- Name: demo_report_dashboards_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_report_dashboards_id_seq', 1, true);


--
-- Data for Name: demo_report_widgets; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_report_widgets (id, created_at, updated_at, created_by_id, updated_by_id, name, code, description, template, data, script, public, library_id, plugin_id, active) FROM stdin;
1	2019-12-01 07:42:56	2020-05-10 09:16:29	1	1	Queue Iteam Bar Chart	queue-iteam-bar-chart			select name, count(*) as value\r\nfrom (select queue.name, item.id as item_id\r\nfrom demo_workflow_queue_items item,\r\ndemo_workflow_queues queue\r\nwhere queue.id = item.queue_id) as queue_data\r\ngroup by name	var dom = this.getBody();\r\nvar myChart = echarts.init(dom);\r\n\r\noption = {\r\ntooltip: {\r\ntrigger: 'item',\r\nformatter: "{a} <br/>{b}: {c} ({d}%)"\r\n},\r\nlegend: {\r\norient: 'vertical',\r\nx: 'left',\r\n// data:['直接访问','邮件营销','联盟广告','视频广告','搜索引擎']\r\n},\r\nseries: [\r\n{\r\nname:'Queue',\r\ntype:'pie',\r\n// radius: ['50%', '70%'],\r\navoidLabelOverlap: false,\r\ndata:this.data.data\r\n}\r\n]\r\n};\r\nmyChart.setOption(option);\r\nthis.onResize(function(){\r\nmyChart.resize();\r\n});	0	1	6	1
\.


--
-- Name: demo_report_widgets_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_report_widgets_id_seq', 1, false);


--
-- Data for Name: demo_workflow_queue_assignment_groups; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_workflow_queue_assignment_groups (id, created_at, updated_at, created_by_id, updated_by_id, group_id, queue_id, sort_order, plugin_id) FROM stdin;
4	2019-12-01 07:42:56	2019-12-08 08:02:10	1	1	3	20	1	6
8	2019-12-01 07:42:56	2019-12-08 08:02:10	1	1	5	2	2	6
3	2019-12-01 07:42:56	2019-12-08 08:02:10	1	1	4	21	3	6
6	2019-12-01 07:42:56	2019-12-08 08:02:10	1	1	4	1	4	6
2	2020-05-17 15:06:26	2020-05-17 15:06:26	1	1	3	3	100	6
\.


--
-- Name: demo_workflow_queue_assignment_groups_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_workflow_queue_assignment_groups_id_seq', 3, true);


--
-- Data for Name: demo_workflow_queue_items; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_workflow_queue_items (id, queue_id, assigned_to_id, record_id, model, created_at, updated_at, poped_at, created_by_id, updated_by_id, plugin_id) FROM stdin;
\.


--
-- Name: demo_workflow_queue_items_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_workflow_queue_items_id_seq', 14, true);


--
-- Data for Name: demo_workflow_queue_pop_criterias; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_workflow_queue_pop_criterias (id, created_at, updated_at, created_by_id, updated_by_id, name, description, script, plugin_id) FROM stdin;
3	2019-11-16 13:07:42	2020-04-06 16:22:31	1	1	Simple Pop Criteria	This will pop any random item from queue	return $context->query->where('demo_workflow_queue_items.model','Demo\\Workflow\\Models\\WorkflowItem');	6
\.


--
-- Name: demo_workflow_queue_pop_criterias_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_workflow_queue_pop_criterias_id_seq', 1, false);


--
-- Data for Name: demo_workflow_queue_routing_rules; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_workflow_queue_routing_rules (id, created_at, updated_at, created_by_id, updated_by_id, script, name, description, plugin_id) FROM stdin;
3	2019-11-16 14:33:18	2020-04-04 07:28:11	1	1	$model = $context->model; \r\nif(empty($model)){\r\nthrow new $context->exception->ApplicationException('No item left to assign');\r\n}\r\nreturn $context->currentUser;	Route to current User	Route to current User	6
\.


--
-- Name: demo_workflow_queue_routing_rules_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_workflow_queue_routing_rules_id_seq', 1, false);


--
-- Data for Name: demo_workflow_queues; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_workflow_queues (id, name, description, script, active, virtual, queue_order, sort_order, input_condition, model, redundancy_policy, created_at, updated_at, created_by_id, updated_by_id, plugin_id, service_channel_id, pop_criteria_id, routing_rule_id) FROM stdin;
1	Quality Queue	All case in this queue will be assigned to a Quality		1	0	simple_queue	-900	if($context->event==='updating'){\r\n    if($context->model->isDirty('current_state_id')){\r\n        return $context->model->current_state->code === 'quality';\r\n    }\r\n}\r\nreturn false;		override	2019-10-13 03:46:56	2020-04-06 06:40:54	1	1	6	1	3	3
20	Doctor Queue	All case in this queue will be assigned to a doctor		1	0	simple_queue	-900	if($context->event==='updating'){\r\nif($context->model->isDirty('current_state_id')){\r\nreturn $context->model->current_state->code === 'doctor';\r\n}\r\n}\r\nreturn false;		override	2019-10-13 03:46:56	2020-04-04 13:26:49	1	1	6	1	3	3
2	Admin Queue	All case in this queue will be assigned to a Admin		0	0	simple_queue	-900	if($context->event==='updating'){\r\nif($context->model->isDirty('current_state_id')){\r\nreturn $context->model->current_state->code === 'admin';\r\n}\r\n}\r\nreturn false;		override	2019-10-13 03:46:56	2020-04-04 13:27:00	1	1	6	1	3	3
3	Check IN - Case Workflow Assignment Queue1	This queue will assign the case to current user who created the case	$workflowEntity = new Demo\\Casemanager\\Models\\WorkflowEntityl();\r\n$workflowEntity->workflow = Demo\\Casemanager\\Models\\Workflow::where('code','case-workflow')->get()->first();\r\n$workflowEntity->entity_id = $item->id;\r\n$workflowEntity->entity_type = get_class($item);\r\n// throw new \\Error(json_encode($workflowEntity->workflow->definition,true));\r\n$from_state = new Demo\\Casemanager\\Models\\WorkflowState();\r\n$from_state->id  = $workflowEntity->workflow->definition[0]['from_state'];\r\n$workflowEntity->current_state = $from_state;\r\n$workflowEntity->assigned_to = $this->getCurrentUser();\r\n$workflowEntity->save();	1	1	stack	-1	return $context->event==='creating';		addNew	2019-10-06 10:07:03	2020-05-17 14:58:26	1	1	6	1	3	3
\.


--
-- Name: demo_workflow_queues_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_workflow_queues_id_seq', 1, false);


--
-- Data for Name: demo_workflow_service_channels; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_workflow_service_channels (id, created_at, updated_at, created_by_id, updated_by_id, plugin_id, name, event, description, model, inbox_order, active, assigned_to_field, assignment_capacity, condition) FROM stdin;
1	2020-04-04 06:03:08	2020-04-04 07:22:51	1	1	6	Case Assignment Channel	["creating","updating"]		Demo\\Workflow\\Models\\WorkflowItem	1	t	assigned_to_id	-1	return strtolower($context->model->model) === 'demo\\casemanager\\models\\casemodel';
\.


--
-- Name: demo_workflow_service_channels_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_workflow_service_channels_id_seq', 1, false);


--
-- Data for Name: demo_workflow_workflow_items; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_workflow_workflow_items (id, workflow_id, created_by_id, updated_by_id, model, record_id, created_at, updated_at, assigned_at, current_state_id, assigned_to_id, finished_at, plugin_id) FROM stdin;
1	1	1	1	Demo\\Casemanager\\Models\\CaseModel	23	2020-05-17 15:21:30	2020-05-17 15:21:30	\N	3	1	\N	\N
\.


--
-- Name: demo_workflow_workflow_items_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_workflow_workflow_items_id_seq', 1, true);


--
-- Data for Name: demo_workflow_workflow_states; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_workflow_workflow_states (id, created_at, updated_at, created_by_id, updated_by_id, name, description, active, code, plugin_id) FROM stdin;
5	2019-10-12 10:41:21	2019-10-12 10:41:21	1	1	Doctor		1	doctor	6
4	2019-10-12 10:41:09	2019-10-12 10:41:09	1	1	Quality		1	quality	6
3	2019-10-12 10:40:02	2019-10-12 10:40:02	1	1	Start		1	start	10
6	2019-10-12 10:41:30	2019-10-12 10:41:56	1	1	Finish		1	finish	10
1	2020-05-04 13:36:46	2020-05-04 13:36:46	1	1	Before Finish		1	before-finish	6
\.


--
-- Name: demo_workflow_workflow_states_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_workflow_workflow_states_id_seq', 1, true);


--
-- Data for Name: demo_workflow_workflow_transitions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_workflow_workflow_transitions (id, created_at, updated_at, created_by_id, updated_by_id, assigned_to_id, workflow_item_id, from_state_id, to_state_id, data, plugin_id) FROM stdin;
\.


--
-- Name: demo_workflow_workflow_transitions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_workflow_workflow_transitions_id_seq', 1, false);


--
-- Data for Name: demo_workflow_workflows; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_workflow_workflows (id, created_at, updated_at, active, name, code, description, definition, created_by_id, updated_by_id, plugin_id, sort_order, model, input_condition, event) FROM stdin;
1	2019-10-08 08:17:55	2020-05-09 06:43:30	1	Case Workflow	case-workflow	Case Workflow sdsdsd	[{"from_state":"3","to_state":"4"},{"from_state":"4","to_state":"5"},{"from_state":"5","to_state":"1"},{"from_state":"1","to_state":"6"}]	1	1	6	0	Demo\\Casemanager\\Models\\CaseModel	return true;	created
\.


--
-- Name: demo_workflow_workflows_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('demo_workflow_workflows_id_seq', 1, false);


--
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY failed_jobs (id, connection, queue, payload, failed_at, exception) FROM stdin;
\.


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('failed_jobs_id_seq', 1, false);


--
-- Data for Name: indikator_backend_trash; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY indikator_backend_trash (id, type, path, size) FROM stdin;
\.


--
-- Name: indikator_backend_trash_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('indikator_backend_trash_id_seq', 1, false);


--
-- Data for Name: jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY jobs (id, queue, payload, attempts, reserved_at, available_at, created_at) FROM stdin;
\.


--
-- Name: jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('jobs_id_seq', 1, false);


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY migrations (id, migration, batch) FROM stdin;
1	2013_10_01_000001_Db_Deferred_Bindings	1
2	2013_10_01_000002_Db_System_Files	1
3	2013_10_01_000003_Db_System_Plugin_Versions	1
4	2013_10_01_000004_Db_System_Plugin_History	1
5	2013_10_01_000005_Db_System_Settings	1
6	2013_10_01_000006_Db_System_Parameters	1
7	2013_10_01_000007_Db_System_Add_Disabled_Flag	1
8	2013_10_01_000008_Db_System_Mail_Templates	1
9	2013_10_01_000009_Db_System_Mail_Layouts	1
10	2014_10_01_000010_Db_Jobs	1
11	2014_10_01_000011_Db_System_Event_Logs	1
12	2014_10_01_000012_Db_System_Request_Logs	1
13	2014_10_01_000013_Db_System_Sessions	1
14	2015_10_01_000014_Db_System_Mail_Layout_Rename	1
15	2015_10_01_000015_Db_System_Add_Frozen_Flag	1
16	2015_10_01_000016_Db_Cache	1
17	2015_10_01_000017_Db_System_Revisions	1
18	2015_10_01_000018_Db_FailedJobs	1
19	2016_10_01_000019_Db_System_Plugin_History_Detail_Text	1
20	2016_10_01_000020_Db_System_Timestamp_Fix	1
21	2017_08_04_121309_Db_Deferred_Bindings_Add_Index_Session	1
22	2017_10_01_000021_Db_System_Sessions_Update	1
23	2017_10_01_000022_Db_Jobs_FailedJobs_Update	1
24	2017_10_01_000023_Db_System_Mail_Partials	1
25	2017_10_23_000024_Db_System_Mail_Layouts_Add_Options_Field	1
26	2013_10_01_000001_Db_Backend_Users	2
27	2013_10_01_000002_Db_Backend_User_Groups	2
28	2013_10_01_000003_Db_Backend_Users_Groups	2
29	2013_10_01_000004_Db_Backend_User_Throttle	2
30	2014_01_04_000005_Db_Backend_User_Preferences	2
31	2014_10_01_000006_Db_Backend_Access_Log	2
32	2014_10_01_000007_Db_Backend_Add_Description_Field	2
33	2015_10_01_000008_Db_Backend_Add_Superuser_Flag	2
34	2016_10_01_000009_Db_Backend_Timestamp_Fix	2
35	2017_10_01_000010_Db_Backend_User_Roles	2
36	2018_12_16_000011_Db_Backend_Add_Deleted_At	2
37	2014_10_01_000001_Db_Cms_Theme_Data	3
38	2016_10_01_000002_Db_Cms_Timestamp_Fix	3
39	2017_10_01_000003_Db_Cms_Theme_Logs	3
40	2018_11_01_000001_Db_Cms_Theme_Templates	3
\.


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('migrations_id_seq', 40, true);


--
-- Data for Name: sessions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY sessions (id, payload, last_activity, user_id, ip_address, user_agent) FROM stdin;
\.


--
-- Data for Name: system_event_logs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY system_event_logs (id, level, message, details, created_at, updated_at) FROM stdin;
\.


--
-- Name: system_event_logs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('system_event_logs_id_seq', 1, false);


--
-- Data for Name: system_files; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY system_files (id, disk_name, file_name, file_size, content_type, title, description, field, attachment_id, attachment_type, is_public, sort_order, created_at, updated_at) FROM stdin;
6	5eb26c81c3c32003898351.png	favicon.png	167	image/png	\N	\N	favicon	2	Backend\\Models\\BrandSetting	t	6	2020-05-06 07:51:29	2020-05-06 07:51:40
8	5eb26cc11b34a996572679.png	logo_transparent.png	5984	image/png	\N	\N	logo	2	Backend\\Models\\BrandSetting	t	8	2020-05-06 07:52:33	2020-05-06 07:52:38
9	5eb7b5e82a95a526939505.png	QQZHa.png	207585	image/png	\N	\N	\N	\N	\N	t	9	2020-05-10 08:06:00	2020-05-10 08:06:00
10	5eb7b65d59c69493367581.png	QQZHa.png	207585	image/png	\N	\N	\N	\N	\N	t	10	2020-05-10 08:07:57	2020-05-10 08:07:57
13	5eb7be770cd7e391519152.js	macarons.js	5042	text/plain	\N	\N	javascript_files	1	Demo\\Core\\Models\\JavascriptLibrary	t	13	2020-05-10 08:42:31	2020-05-10 08:42:49
12	5eb7be71099c4460323585.js	echarts.min.js	749597	text/plain	\N	\N	javascript_files	1	Demo\\Core\\Models\\JavascriptLibrary	t	12	2020-05-10 08:42:25	2020-05-10 08:42:49
\.


--
-- Name: system_files_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('system_files_id_seq', 13, true);


--
-- Data for Name: system_mail_layouts; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY system_mail_layouts (id, name, code, content_html, content_text, content_css, is_locked, created_at, updated_at, options) FROM stdin;
1	Default layout	default	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">\n<html xmlns="http://www.w3.org/1999/xhtml">\n<head>\n    <meta name="viewport" content="width=device-width, initial-scale=1.0" />\n    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />\n</head>\n<body>\n    <style type="text/css" media="screen">\n        {{ brandCss|raw }}\n        {{ css|raw }}\n    </style>\n\n    <table class="wrapper layout-default" width="100%" cellpadding="0" cellspacing="0">\n\n        <!-- Header -->\n        {% partial 'header' body %}\n            {{ subject|raw }}\n        {% endpartial %}\n\n        <tr>\n            <td align="center">\n                <table class="content" width="100%" cellpadding="0" cellspacing="0">\n                    <!-- Email Body -->\n                    <tr>\n                        <td class="body" width="100%" cellpadding="0" cellspacing="0">\n                            <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0">\n                                <!-- Body content -->\n                                <tr>\n                                    <td class="content-cell">\n                                        {{ content|raw }}\n                                    </td>\n                                </tr>\n                            </table>\n                        </td>\n                    </tr>\n                </table>\n            </td>\n        </tr>\n\n        <!-- Footer -->\n        {% partial 'footer' body %}\n            &copy; {{ "now"|date("Y") }} {{ appName }}. All rights reserved.\n        {% endpartial %}\n\n    </table>\n\n</body>\n</html>	{{ content|raw }}	@media only screen and (max-width: 600px) {\n    .inner-body {\n        width: 100% !important;\n    }\n\n    .footer {\n        width: 100% !important;\n    }\n}\n\n@media only screen and (max-width: 500px) {\n    .button {\n        width: 100% !important;\n    }\n}	t	2020-04-26 05:34:31	2020-04-26 05:34:31	\N
2	System layout	system	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">\n<html xmlns="http://www.w3.org/1999/xhtml">\n<head>\n    <meta name="viewport" content="width=device-width, initial-scale=1.0" />\n    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />\n</head>\n<body>\n    <style type="text/css" media="screen">\n        {{ brandCss|raw }}\n        {{ css|raw }}\n    </style>\n\n    <table class="wrapper layout-system" width="100%" cellpadding="0" cellspacing="0">\n        <tr>\n            <td align="center">\n                <table class="content" width="100%" cellpadding="0" cellspacing="0">\n                    <!-- Email Body -->\n                    <tr>\n                        <td class="body" width="100%" cellpadding="0" cellspacing="0">\n                            <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0">\n                                <!-- Body content -->\n                                <tr>\n                                    <td class="content-cell">\n                                        {{ content|raw }}\n\n                                        <!-- Subcopy -->\n                                        {% partial 'subcopy' body %}\n                                            **This is an automatic message. Please do not reply to it.**\n                                        {% endpartial %}\n                                    </td>\n                                </tr>\n                            </table>\n                        </td>\n                    </tr>\n                </table>\n            </td>\n        </tr>\n    </table>\n\n</body>\n</html>	{{ content|raw }}\n\n\n---\nThis is an automatic message. Please do not reply to it.	@media only screen and (max-width: 600px) {\n    .inner-body {\n        width: 100% !important;\n    }\n\n    .footer {\n        width: 100% !important;\n    }\n}\n\n@media only screen and (max-width: 500px) {\n    .button {\n        width: 100% !important;\n    }\n}	t	2020-04-26 05:34:31	2020-04-26 05:34:31	\N
\.


--
-- Name: system_mail_layouts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('system_mail_layouts_id_seq', 2, true);


--
-- Data for Name: system_mail_partials; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY system_mail_partials (id, name, code, content_html, content_text, is_custom, created_at, updated_at) FROM stdin;
1	Header	header	<tr>\n    <td class="header">\n        {% if url %}\n            <a href="{{ url }}">\n                {{ body }}\n            </a>\n        {% else %}\n            <span>\n                {{ body }}\n            </span>\n        {% endif %}\n    </td>\n</tr>	*** {{ body|trim }} <{{ url }}>	f	2020-05-17 05:35:44	2020-05-17 05:35:44
2	Footer	footer	<tr>\n    <td>\n        <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0">\n            <tr>\n                <td class="content-cell" align="center">\n                    {{ body|md_safe }}\n                </td>\n            </tr>\n        </table>\n    </td>\n</tr>	-------------------\n{{ body|trim }}	f	2020-05-17 05:35:44	2020-05-17 05:35:44
3	Button	button	<table class="action" align="center" width="100%" cellpadding="0" cellspacing="0">\n    <tr>\n        <td align="center">\n            <table width="100%" border="0" cellpadding="0" cellspacing="0">\n                <tr>\n                    <td align="center">\n                        <table border="0" cellpadding="0" cellspacing="0">\n                            <tr>\n                                <td>\n                                    <a href="{{ url }}" class="button button-{{ type ?: 'primary' }}" target="_blank">\n                                        {{ body }}\n                                    </a>\n                                </td>\n                            </tr>\n                        </table>\n                    </td>\n                </tr>\n            </table>\n        </td>\n    </tr>\n</table>	{{ body|trim }} <{{ url }}>	f	2020-05-17 05:35:44	2020-05-17 05:35:44
4	Panel	panel	<table class="panel" width="100%" cellpadding="0" cellspacing="0">\n    <tr>\n        <td class="panel-content">\n            <table width="100%" cellpadding="0" cellspacing="0">\n                <tr>\n                    <td class="panel-item">\n                        {{ body|md_safe }}\n                    </td>\n                </tr>\n            </table>\n        </td>\n    </tr>\n</table>	{{ body|trim }}	f	2020-05-17 05:35:44	2020-05-17 05:35:44
5	Table	table	<div class="table">\n    {{ body|md_safe }}\n</div>	{{ body|trim }}	f	2020-05-17 05:35:45	2020-05-17 05:35:45
6	Subcopy	subcopy	<table class="subcopy" width="100%" cellpadding="0" cellspacing="0">\n    <tr>\n        <td>\n            {{ body|md_safe }}\n        </td>\n    </tr>\n</table>	-----\n{{ body|trim }}	f	2020-05-17 05:35:45	2020-05-17 05:35:45
7	Promotion	promotion	<table class="promotion" align="center" width="100%" cellpadding="0" cellspacing="0">\n    <tr>\n        <td align="center">\n            {{ body|md_safe }}\n        </td>\n    </tr>\n</table>	{{ body|trim }}	f	2020-05-17 05:35:45	2020-05-17 05:35:45
\.


--
-- Name: system_mail_partials_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('system_mail_partials_id_seq', 7, true);


--
-- Data for Name: system_mail_templates; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY system_mail_templates (id, code, subject, description, content_html, content_text, layout_id, is_custom, created_at, updated_at) FROM stdin;
1	backend::mail.invite	\N	Invite new admin to the site	\N	\N	2	f	2020-05-17 05:35:45	2020-05-17 05:35:45
2	backend::mail.restore	\N	Reset an admin password	\N	\N	2	f	2020-05-17 05:35:45	2020-05-17 05:35:45
\.


--
-- Name: system_mail_templates_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('system_mail_templates_id_seq', 2, true);


--
-- Data for Name: system_parameters; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY system_parameters (id, namespace, "group", item, value) FROM stdin;
4	system	core	build	465
2	system	update	retry	1589781813
1	system	update	count	0
3	cyd293.backendskin	skin	active	"nobleui"
\.


--
-- Name: system_parameters_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('system_parameters_id_seq', 4, true);


--
-- Data for Name: system_plugin_history; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY system_plugin_history (id, code, type, version, detail, created_at) FROM stdin;
1	Demo.Casemanager	comment	1.0.1	Initialize plugin.	2020-04-26 05:34:27
2	Demo.Casemanager	script	1.0.2	builder_table_create_demo_casemanager_cases.php	2020-04-26 05:34:27
3	Demo.Casemanager	comment	1.0.2	Created table demo_casemanager_cases	2020-04-26 05:34:27
4	Demo.Casemanager	script	1.0.3	builder_table_create_demo_casemanager_case_priorities.php	2020-04-26 05:34:27
5	Demo.Casemanager	comment	1.0.3	Created table demo_casemanager_case_priorities	2020-04-26 05:34:27
6	Demo.Core	comment	1.0.1	Initialize plugin.	2020-04-26 05:34:27
7	Demo.Core	script	1.0.2	builder_table_create_demo_core_inbound_api.php	2020-04-26 05:34:27
8	Demo.Core	comment	1.0.2	Created table demo_core_inbound_api	2020-04-26 05:34:27
9	Demo.Core	script	1.0.3	builder_table_create_demo_core_event_handlers.php	2020-04-26 05:34:27
10	Demo.Core	comment	1.0.3	Created table demo_core_event_handlers	2020-04-26 05:34:27
11	Demo.Core	script	1.0.4	builder_table_create_demo_core_commands.php	2020-04-26 05:34:27
12	Demo.Core	comment	1.0.4	Created table demo_core_commands	2020-04-26 05:34:27
13	Demo.Core	script	1.0.5	builder_table_create_demo_core_iframes.php	2020-04-26 05:34:27
14	Demo.Core	comment	1.0.5	Created table demo_core_iframes	2020-04-26 05:34:27
15	Demo.Core	script	1.0.6	builder_table_create_demo_core_webhooks.php	2020-04-26 05:34:27
16	Demo.Core	comment	1.0.6	Created table demo_core_webhooks	2020-04-26 05:34:27
17	Demo.Core	script	1.0.7	builder_table_create_demo_core_custom_fields.php	2020-04-26 05:34:27
18	Demo.Core	comment	1.0.7	Created table demo_core_custom_fields	2020-04-26 05:34:27
19	Demo.Core	script	1.0.8	builder_table_create_demo_core_form_fields.php	2020-04-26 05:34:28
20	Demo.Core	comment	1.0.8	Created table demo_core_form_fields	2020-04-26 05:34:28
21	Demo.Core	script	1.0.9	builder_table_create_demo_core_models.php	2020-04-26 05:34:28
22	Demo.Core	comment	1.0.9	Created table demo_core_models	2020-04-26 05:34:28
23	Demo.Core	script	1.0.10	builder_table_create_demo_core_model_associations.php	2020-04-26 05:34:28
24	Demo.Core	comment	1.0.10	Created table demo_core_model_associations	2020-04-26 05:34:28
25	Demo.Core	script	1.0.11	builder_table_create_demo_core_permissions.php	2020-04-26 05:34:28
26	Demo.Core	comment	1.0.11	Created table demo_core_permissions	2020-04-26 05:34:28
27	Demo.Core	script	1.0.12	builder_table_create_demo_core_security_policies.php	2020-04-26 05:34:28
28	Demo.Core	comment	1.0.12	Created table demo_core_security_policies	2020-04-26 05:34:28
29	Demo.Core	script	1.0.13	builder_table_create_demo_core_role_policy_associations.php	2020-04-26 05:34:28
30	Demo.Core	comment	1.0.13	Created table demo_core_role_policy_associations	2020-04-26 05:34:28
31	Demo.Core	script	1.0.14	builder_table_create_demo_core_permission_policy_associations.php	2020-04-26 05:34:28
32	Demo.Core	comment	1.0.14	Created table demo_core_permission_policy_associations	2020-04-26 05:34:28
33	Demo.Core	script	1.0.15	builder_table_create_demo_core_roles.php	2020-04-26 05:34:28
34	Demo.Core	comment	1.0.15	Created table demo_core_roles	2020-04-26 05:34:28
35	Demo.Core	script	1.0.16	builder_table_create_demo_core_user_role_associations.php	2020-04-26 05:34:28
36	Demo.Core	comment	1.0.16	Created table demo_core_user_role_associations	2020-04-26 05:34:28
37	Demo.Core	script	1.0.17	builder_table_create_demo_core_form_actions.php	2020-04-26 05:34:28
38	Demo.Core	comment	1.0.17	Created table demo_core_form_actions	2020-04-26 05:34:28
39	Demo.Core	script	1.0.18	builder_table_create_demo_core_list_actions.php	2020-04-26 05:34:28
40	Demo.Core	comment	1.0.18	Created table demo_core_list_actions	2020-04-26 05:34:28
41	Demo.Core	script	1.0.19	builder_table_create_demo_core_audit_logs.php	2020-04-26 05:34:28
42	Demo.Core	comment	1.0.19	Created table demo_core_audit_logs	2020-04-26 05:34:28
43	Demo.Core	script	1.0.20	builder_table_create_demo_core_libraries.php	2020-04-26 05:34:28
44	Demo.Core	comment	1.0.20	Created table demo_core_libraries	2020-04-26 05:34:28
45	Demo.Notification	comment	1.0.1	Initialize plugin.	2020-04-26 05:34:28
46	Demo.Notification	script	1.0.2	builder_table_create_demo_notification_channels.php	2020-04-26 05:34:28
47	Demo.Notification	comment	1.0.2	Created table demo_notification_channels	2020-04-26 05:34:28
48	Demo.Notification	script	1.0.3	builder_table_create_demo_notification_notifications.php	2020-04-26 05:34:28
49	Demo.Notification	comment	1.0.3	Created table demo_notification_notifications	2020-04-26 05:34:28
50	Demo.Notification	script	1.0.4	builder_table_create_demo_notification_subscribers.php	2020-04-26 05:34:28
51	Demo.Notification	comment	1.0.4	Created table demo_notification_subscribers	2020-04-26 05:34:28
52	Demo.Notification	script	1.0.5	builder_table_create_demo_notification_logs.php	2020-04-26 05:34:28
53	Demo.Notification	comment	1.0.5	Created table demo_notification_logs	2020-04-26 05:34:28
54	Demo.Report	comment	1.0.1	Initialize plugin.	2020-04-26 05:34:28
55	Demo.Report	script	1.0.2	builder_table_create_demo_report_widgets.php	2020-04-26 05:34:28
56	Demo.Report	comment	1.0.2	Created table demo_report_widgets	2020-04-26 05:34:28
57	Demo.Report	script	1.0.3	builder_table_create_demo_report_dashboards.php	2020-04-26 05:34:28
58	Demo.Report	comment	1.0.3	Created table demo_report_dashboards	2020-04-26 05:34:28
59	Demo.Workflow	comment	1.0.1	Initialize plugin.	2020-04-26 05:34:29
60	Demo.Workflow	script	1.0.2	builder_table_create_demo_workflow_queues.php	2020-04-26 05:34:29
61	Demo.Workflow	comment	1.0.2	Created table demo_workflow_queues	2020-04-26 05:34:29
62	Demo.Workflow	script	1.0.3	builder_table_create_demo_workflow_queue_items.php	2020-04-26 05:34:29
63	Demo.Workflow	comment	1.0.3	Created table demo_workflow_queue_items	2020-04-26 05:34:29
64	Demo.Workflow	script	1.0.4	builder_table_create_demo_workflow_workflows.php	2020-04-26 05:34:29
65	Demo.Workflow	comment	1.0.4	Created table demo_workflow_workflows	2020-04-26 05:34:29
66	Demo.Workflow	comment	1.0.5	Created table demo_workflow_workflow_entities	2020-04-26 05:34:29
67	Demo.Workflow	script	1.0.6	builder_table_create_demo_workflow_workflow_transitions.php	2020-04-26 05:34:29
68	Demo.Workflow	comment	1.0.6	Created table demo_workflow_workflow_transitions	2020-04-26 05:34:29
69	Demo.Workflow	script	1.0.7	builder_table_create_demo_workflow_queue_assignment_groups.php	2020-04-26 05:34:29
70	Demo.Workflow	comment	1.0.7	Created table demo_workflow_queue_assignment_groups	2020-04-26 05:34:29
71	Demo.Workflow	script	1.0.8	builder_table_create_demo_workflow_workflow_states.php	2020-04-26 05:34:29
72	Demo.Workflow	comment	1.0.8	Created table demo_workflow_workflow_states	2020-04-26 05:34:29
73	Demo.Workflow	script	1.0.9	builder_table_create_demo_workflow_queue_routing_rules.php	2020-04-26 05:34:29
74	Demo.Workflow	comment	1.0.9	Created table demo_workflow_queue_routing_rules	2020-04-26 05:34:29
75	Demo.Workflow	script	1.0.10	builder_table_create_demo_workflow_queue_pop_criterias.php	2020-04-26 05:34:29
76	Demo.Workflow	comment	1.0.10	Created table demo_workflow_queue_pop_scripts	2020-04-26 05:34:29
77	Demo.Workflow	script	1.0.11	builder_table_create_demo_workflow_service_channels.php	2020-04-26 05:34:29
78	Demo.Workflow	comment	1.0.11	Created table demo_workflow_service_channels	2020-04-26 05:34:29
79	Indikator.Backend	comment	1.0.0	First version of Backend Plus.	2020-04-26 05:34:29
80	Indikator.Backend	comment	1.0.1	Fixed the update count issue.	2020-04-26 05:34:29
81	Indikator.Backend	comment	1.0.2	Added Last logins widget.	2020-04-26 05:34:29
82	Indikator.Backend	comment	1.0.3	Added RSS viewer widget.	2020-04-26 05:34:29
83	Indikator.Backend	comment	1.0.4	Minor improvements and bugfix.	2020-04-26 05:34:29
84	Indikator.Backend	comment	1.0.5	Added Random images widget.	2020-04-26 05:34:29
85	Indikator.Backend	comment	1.0.6	Added virtual keyboard option.	2020-04-26 05:34:29
86	Indikator.Backend	comment	1.1.0	Added Lorem ipsum components (image and text).	2020-04-26 05:34:29
87	Indikator.Backend	comment	1.1.0	Improving the Random images widget with slideshow.	2020-04-26 05:34:29
88	Indikator.Backend	comment	1.1.0	Added Turkish translation (thanks to mahony0).	2020-04-26 05:34:29
89	Indikator.Backend	comment	1.1.0	Fixed the URL path issue by virtual keyboard.	2020-04-26 05:34:29
90	Indikator.Backend	comment	1.1.1	Hide the "Find more themes" link.	2020-04-26 05:34:29
91	Indikator.Backend	comment	1.1.2	Added German translation.	2020-04-26 05:34:29
92	Indikator.Backend	comment	1.1.3	The widgets work on localhost too.	2020-04-26 05:34:29
93	Indikator.Backend	comment	1.1.4	Added Spanish translation.	2020-04-26 05:34:29
94	Indikator.Backend	comment	1.2.0	All features are working on the whole backend.	2020-04-26 05:34:29
95	Indikator.Backend	comment	1.2.1	Rounded profile image is optional in top menu.	2020-04-26 05:34:29
96	Indikator.Backend	comment	1.2.2	Fixed the authenticated user bug.	2020-04-26 05:34:29
97	Indikator.Backend	comment	1.2.3	Hide the Media menu optional in top menu.	2020-04-26 05:34:29
98	Indikator.Backend	comment	1.2.4	Minor improvements and bugfix.	2020-04-26 05:34:29
99	Indikator.Backend	comment	1.2.5	Renamed the name of backend widgets.	2020-04-26 05:34:29
100	Indikator.Backend	comment	1.2.6	Improved the automatic search focus.	2020-04-26 05:34:29
101	Indikator.Backend	comment	1.2.7	Minor improvements.	2020-04-26 05:34:29
102	Indikator.Backend	comment	1.2.8	Fixed the hiding Media menu issue.	2020-04-26 05:34:29
103	Indikator.Backend	comment	1.2.9	Improved the widget exception handling.	2020-04-26 05:34:29
104	Indikator.Backend	comment	1.3.0	Added 2 new options for Settings.	2020-04-26 05:34:29
105	Indikator.Backend	comment	1.3.1	Fixed the search field hide issue.	2020-04-26 05:34:29
106	Indikator.Backend	comment	1.3.2	Delete only demo folder instead of october.	2020-04-26 05:34:29
107	Indikator.Backend	comment	1.3.3	Added clear button option to form fields.	2020-04-26 05:34:29
108	Indikator.Backend	comment	1.3.4	Improved the Media menu hiding.	2020-04-26 05:34:29
109	Indikator.Backend	comment	1.3.5	Fixed the automatically focus option.	2020-04-26 05:34:29
110	Indikator.Backend	comment	1.3.6	Added the Cache dashboard widget.	2020-04-26 05:34:29
111	Indikator.Backend	comment	1.4.0	Added 2 new form widgets.	2020-04-26 05:34:29
112	Indikator.Backend	comment	1.4.1	Added new colorpicker form widget.	2020-04-26 05:34:29
113	Indikator.Backend	comment	1.4.2	Minor improvements.	2020-04-26 05:34:29
114	Indikator.Backend	comment	1.4.3	Improved the Cache dashboard widget.	2020-04-26 05:34:29
115	Indikator.Backend	comment	1.4.4	Updated for latest October.	2020-04-26 05:34:29
116	Indikator.Backend	comment	1.4.5	Minor improvements and bugfix.	2020-04-26 05:34:29
117	Indikator.Backend	comment	1.4.6	Improved the UI and fixed bug.	2020-04-26 05:34:29
118	Indikator.Backend	comment	1.4.7	Hide the label in top menu.	2020-04-26 05:34:29
119	Indikator.Backend	comment	1.4.8	Enable the gzip compression.	2020-04-26 05:34:29
120	Indikator.Backend	script	1.5.0	create_trash_table.php	2020-04-26 05:34:29
121	Indikator.Backend	comment	1.5.0	Delete the unused files and folders.	2020-04-26 05:34:29
122	Indikator.Backend	comment	1.5.1	Minor improvements and bugfix.	2020-04-26 05:34:29
123	Indikator.Backend	comment	1.5.2	Improved the Trash items page.	2020-04-26 05:34:29
124	Indikator.Backend	comment	1.5.3	Expanded the Trash items page.	2020-04-26 05:34:29
125	Indikator.Backend	comment	1.5.4	Minor improvements.	2020-04-26 05:34:29
126	Indikator.Backend	comment	1.5.5	Added tooltip when hiding the labels.	2020-04-26 05:34:29
127	Indikator.Backend	comment	1.5.6	Fixed the page overflow issue.	2020-04-26 05:34:29
128	Indikator.Backend	comment	1.5.7	Added the context menu feature.	2020-04-26 05:34:29
129	Indikator.Backend	comment	1.5.8	Improved the context menu.	2020-04-26 05:34:29
130	Indikator.Backend	comment	1.6.0	Available the Elite version.	2020-04-26 05:34:29
131	Indikator.Backend	comment	1.6.1	Added the Russian translation.	2020-04-26 05:34:29
132	Indikator.Backend	comment	1.6.2	Added the Brazilian Portuguese lang.	2020-04-26 05:34:29
133	Indikator.Backend	comment	1.6.3	Minor improvements.	2020-04-26 05:34:29
134	Indikator.Backend	comment	1.6.4	Fixed the German translation.	2020-04-26 05:34:29
135	Indikator.Backend	comment	1.6.5	Fixed the Cache widget issue.	2020-04-26 05:34:29
136	Indikator.Backend	comment	1.6.6	!!! Updated for October 420+.	2020-04-26 05:34:29
137	Indikator.Backend	comment	1.6.7	Added more trash items.	2020-04-26 05:34:29
138	Indikator.Backend	comment	1.6.8	Minor improvements.	2020-04-26 05:34:29
139	Indikator.Backend	comment	1.6.9	Added permission to Dashboard widgets.	2020-04-26 05:34:29
140	Indikator.Backend	comment	1.6.10	Added Polish translation.	2020-04-26 05:34:29
141	Indikator.Backend	comment	1.6.11	Updated the trash file list.	2020-04-26 05:34:29
142	October.Demo	comment	1.0.1	First version of Demo	2020-04-26 05:34:29
143	RainLab.Builder	comment	1.0.1	Initialize plugin.	2020-04-26 05:34:29
144	RainLab.Builder	comment	1.0.2	Fixes the problem with selecting a plugin. Minor localization corrections. Configuration files in the list and form behaviors are now autocomplete.	2020-04-26 05:34:29
145	RainLab.Builder	comment	1.0.3	Improved handling of the enum data type.	2020-04-26 05:34:29
146	RainLab.Builder	comment	1.0.4	Added user permissions to work with the Builder.	2020-04-26 05:34:29
147	RainLab.Builder	comment	1.0.5	Fixed permissions registration.	2020-04-26 05:34:29
148	RainLab.Builder	comment	1.0.6	Fixed front-end record ordering in the Record List component.	2020-04-26 05:34:29
149	RainLab.Builder	comment	1.0.7	Builder settings are now protected with user permissions. The database table column list is scrollable now. Minor code cleanup.	2020-04-26 05:34:29
150	RainLab.Builder	comment	1.0.8	Added the Reorder Controller behavior.	2020-04-26 05:34:29
151	RainLab.Builder	comment	1.0.9	Minor API and UI updates.	2020-04-26 05:34:29
152	RainLab.Builder	comment	1.0.10	Minor styling update.	2020-04-26 05:34:29
153	RainLab.Builder	comment	1.0.11	Fixed a bug where clicking placeholder in a repeater would open Inspector. Fixed a problem with saving forms with repeaters in tabs. Minor style fix.	2020-04-26 05:34:29
154	RainLab.Builder	comment	1.0.12	Added support for the Trigger property to the Media Finder widget configuration. Names of form fields and list columns definition files can now contain underscores.	2020-04-26 05:34:29
155	RainLab.Builder	comment	1.0.13	Minor styling fix on the database editor.	2020-04-26 05:34:29
156	RainLab.Builder	comment	1.0.14	Added support for published_at timestamp field	2020-04-26 05:34:29
157	RainLab.Builder	comment	1.0.15	Fixed a bug where saving a localization string in Inspector could cause a JavaScript error. Added support for Timestamps and Soft Deleting for new models.	2020-04-26 05:34:29
158	RainLab.Builder	comment	1.0.16	Fixed a bug when saving a form with the Repeater widget in a tab could create invalid fields in the form's outside area. Added a check that prevents creating localization strings inside other existing strings.	2020-04-26 05:34:29
159	RainLab.Builder	comment	1.0.17	Added support Trigger attribute support for RecordFinder and Repeater form widgets.	2020-04-26 05:34:29
160	RainLab.Builder	comment	1.0.18	Fixes a bug where '::class' notations in a model class definition could prevent the model from appearing in the Builder model list. Added emptyOption property support to the dropdown form control.	2020-04-26 05:34:29
161	RainLab.Builder	comment	1.0.19	Added a feature allowing to add all database columns to a list definition. Added max length validation for database table and column names.	2020-04-26 05:34:29
162	RainLab.Builder	comment	1.0.20	Fixes a bug where form the builder could trigger the "current.hasAttribute is not a function" error.	2020-04-26 05:34:29
163	RainLab.Builder	comment	1.0.21	Back-end navigation sort order updated.	2020-04-26 05:34:29
164	RainLab.Builder	comment	1.0.22	Added scopeValue property to the RecordList component.	2020-04-26 05:34:29
165	RainLab.Builder	comment	1.0.23	Added support for balloon-selector field type, added Brazilian Portuguese translation, fixed some bugs	2020-04-26 05:34:29
166	RainLab.Builder	comment	1.0.24	Added support for tag list field type, added read only toggle for fields. Prevent plugins from using reserved PHP keywords for class names and namespaces	2020-04-26 05:34:29
167	RainLab.Builder	comment	1.0.25	Allow editing of migration code in the "Migration" popup when saving changes in the database editor.	2020-04-26 05:34:29
168	RainLab.Builder	comment	1.0.26	Allow special default values for columns and added new "Add ID column" button to database editor.	2020-04-26 05:34:29
169	Demo.Casemanager	script	1.0.4	builder_table_create_demo_casemanager_projects.php	2020-04-27 11:41:41
170	Demo.Casemanager	comment	1.0.4	Created table demo_casemanager_projects	2020-04-27 11:41:41
171	Cyd293.BackendSkin	comment	1.0.1	Initial Backend Skin	2020-05-05 14:35:38
172	Cyd293.BackendSkin	comment	1.0.2	Update Event Dispatcher	2020-05-05 14:35:38
173	Cyd293.BackendSkin	comment	1.0.3	Update PluginEventSubscriber.php	2020-05-05 14:35:38
174	Cyd293.BackendSkin	comment	1.0.4	Fix modules theme customization	2020-05-05 14:35:38
175	Cyd293.BackendSkin	comment	1.1.0	Add separation of backendskin and theme	2020-05-05 14:35:38
176	Cyd293.BackendSkin	comment	1.1.0	Add new method on defining skin code	2020-05-05 14:35:38
177	Cyd293.BackendSkin	comment	1.1.1	Update Asset maker to accept multiple file in addCss and addJs	2020-05-05 14:35:38
178	Cyd293.BackendSkin	comment	1.1.1	Fix assets that was directly access by Url::asset	2020-05-05 14:35:38
179	Cyd293.BackendSkin	comment	1.1.2	Use extends for url instead of singleton	2020-05-05 14:35:38
180	Demo.Core	script	1.0.21	builder_table_create_demo_core_navigations.php	2020-05-09 09:00:54
181	Demo.Core	comment	1.0.21	Created table demo_core_navigations	2020-05-09 09:00:54
182	Demo.Core	script	1.0.22	builder_table_create_demo_core_nav_role_associations.php	2020-05-10 05:07:46
183	Demo.Core	comment	1.0.22	Created table demo_core_nav_role_associations	2020-05-10 05:07:46
184	Demo.Core	script	1.0.23	builder_table_create_demo_core_ui_page.php	2020-05-16 05:03:16
185	Demo.Core	comment	1.0.23	Created table demo_core_ui_page	2020-05-16 05:03:16
\.


--
-- Name: system_plugin_history_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('system_plugin_history_id_seq', 185, true);


--
-- Data for Name: system_plugin_versions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY system_plugin_versions (id, code, version, created_at, is_disabled, is_frozen) FROM stdin;
3	Demo.Notification	1.0.5	2020-04-26 05:34:28	f	f
8	RainLab.Builder	1.0.26	2020-04-26 05:34:29	f	f
11	Demo.Workflow	1.0.11	2020-04-26 05:34:29	f	f
2	Indikator.Backend	1.6.11	2020-04-26 05:34:29	f	f
14	Demo.Report	1.0.3	2020-04-26 05:34:28	f	f
6	Demo.Casemanager	1.0.4	2020-04-27 11:41:41	f	f
9	Cyd293.BackendSkin	1.1.2	2020-05-05 14:35:38	f	f
10	Demo.Core	1.0.23	2020-05-16 05:03:16	f	f
7	October.Demo	1.0.1	2020-04-26 05:34:29	f	f
\.


--
-- Name: system_plugin_versions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('system_plugin_versions_id_seq', 9, true);


--
-- Data for Name: system_request_logs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY system_request_logs (id, status_code, url, referer, count, created_at, updated_at) FROM stdin;
\.


--
-- Name: system_request_logs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('system_request_logs_id_seq', 1, false);


--
-- Data for Name: system_revisions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY system_revisions (id, user_id, field, "cast", old_value, new_value, revisionable_type, revisionable_id, created_at, updated_at) FROM stdin;
\.


--
-- Name: system_revisions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('system_revisions_id_seq', 1, false);


--
-- Data for Name: system_settings; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY system_settings (id, item, value) FROM stdin;
2	backend_brand_settings	{"app_name":"Case Manager","app_tagline":"Manage Your Business","primary_color":"#34495e","secondary_color":"#e67e22","accent_color":"#3498db","menu_mode":"inline","custom_css":""}
\.


--
-- Name: system_settings_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('system_settings_id_seq', 2, true);


--
-- Name: backend_access_log backend_access_log_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY backend_access_log
    ADD CONSTRAINT backend_access_log_pkey PRIMARY KEY (id);


--
-- Name: backend_user_groups backend_user_groups_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY backend_user_groups
    ADD CONSTRAINT backend_user_groups_pkey PRIMARY KEY (id);


--
-- Name: backend_user_preferences backend_user_preferences_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY backend_user_preferences
    ADD CONSTRAINT backend_user_preferences_pkey PRIMARY KEY (id);


--
-- Name: backend_user_roles backend_user_roles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY backend_user_roles
    ADD CONSTRAINT backend_user_roles_pkey PRIMARY KEY (id);


--
-- Name: backend_user_throttle backend_user_throttle_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY backend_user_throttle
    ADD CONSTRAINT backend_user_throttle_pkey PRIMARY KEY (id);


--
-- Name: backend_users_groups backend_users_groups_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY backend_users_groups
    ADD CONSTRAINT backend_users_groups_pkey PRIMARY KEY (user_id, user_group_id);


--
-- Name: backend_users backend_users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY backend_users
    ADD CONSTRAINT backend_users_pkey PRIMARY KEY (id);


--
-- Name: cache cache_key_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cache
    ADD CONSTRAINT cache_key_unique UNIQUE (key);


--
-- Name: cms_theme_data cms_theme_data_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cms_theme_data
    ADD CONSTRAINT cms_theme_data_pkey PRIMARY KEY (id);


--
-- Name: cms_theme_logs cms_theme_logs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cms_theme_logs
    ADD CONSTRAINT cms_theme_logs_pkey PRIMARY KEY (id);


--
-- Name: cms_theme_templates cms_theme_templates_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cms_theme_templates
    ADD CONSTRAINT cms_theme_templates_pkey PRIMARY KEY (id);


--
-- Name: deferred_bindings deferred_bindings_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY deferred_bindings
    ADD CONSTRAINT deferred_bindings_pkey PRIMARY KEY (id);


--
-- Name: demo_casemanager_case_priorities demo_casemanager_case_priorities_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_casemanager_case_priorities
    ADD CONSTRAINT demo_casemanager_case_priorities_pkey PRIMARY KEY (id);


--
-- Name: demo_casemanager_cases demo_casemanager_cases_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_casemanager_cases
    ADD CONSTRAINT demo_casemanager_cases_pkey PRIMARY KEY (id);


--
-- Name: demo_casemanager_projects demo_casemanager_projects_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_casemanager_projects
    ADD CONSTRAINT demo_casemanager_projects_pkey PRIMARY KEY (id);


--
-- Name: demo_core_audit_logs demo_core_audit_logs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_audit_logs
    ADD CONSTRAINT demo_core_audit_logs_pkey PRIMARY KEY (id);


--
-- Name: demo_core_commands demo_core_commands_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_commands
    ADD CONSTRAINT demo_core_commands_pkey PRIMARY KEY (id);


--
-- Name: demo_core_custom_fields demo_core_custom_fields_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_custom_fields
    ADD CONSTRAINT demo_core_custom_fields_pkey PRIMARY KEY (id);


--
-- Name: demo_core_event_handlers demo_core_event_handlers_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_event_handlers
    ADD CONSTRAINT demo_core_event_handlers_pkey PRIMARY KEY (id);


--
-- Name: demo_core_form_actions demo_core_form_actions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_form_actions
    ADD CONSTRAINT demo_core_form_actions_pkey PRIMARY KEY (id);


--
-- Name: demo_core_form_fields demo_core_form_fields_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_form_fields
    ADD CONSTRAINT demo_core_form_fields_pkey PRIMARY KEY (id);


--
-- Name: demo_core_iframes demo_core_iframes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_iframes
    ADD CONSTRAINT demo_core_iframes_pkey PRIMARY KEY (id);


--
-- Name: demo_core_inbound_api demo_core_inbound_api_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_inbound_api
    ADD CONSTRAINT demo_core_inbound_api_pkey PRIMARY KEY (id);


--
-- Name: demo_core_libraries demo_core_libraries_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_libraries
    ADD CONSTRAINT demo_core_libraries_pkey PRIMARY KEY (id);


--
-- Name: demo_core_list_actions demo_core_list_actions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_list_actions
    ADD CONSTRAINT demo_core_list_actions_pkey PRIMARY KEY (id);


--
-- Name: demo_core_model_associations demo_core_model_associations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_model_associations
    ADD CONSTRAINT demo_core_model_associations_pkey PRIMARY KEY (id);


--
-- Name: demo_core_models demo_core_models_model_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_models
    ADD CONSTRAINT demo_core_models_model_unique UNIQUE (model);


--
-- Name: demo_core_models demo_core_models_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_models
    ADD CONSTRAINT demo_core_models_pkey PRIMARY KEY (id);


--
-- Name: demo_core_view_role_associations demo_core_nav_role_associations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_view_role_associations
    ADD CONSTRAINT demo_core_nav_role_associations_pkey PRIMARY KEY (id);


--
-- Name: demo_core_navigations demo_core_navigations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_navigations
    ADD CONSTRAINT demo_core_navigations_pkey PRIMARY KEY (id);


--
-- Name: demo_core_permission_policy_associations demo_core_permission_policy_associations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_permission_policy_associations
    ADD CONSTRAINT demo_core_permission_policy_associations_pkey PRIMARY KEY (id);


--
-- Name: demo_core_permissions demo_core_permissions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_permissions
    ADD CONSTRAINT demo_core_permissions_pkey PRIMARY KEY (id);


--
-- Name: demo_core_role_policy_associations demo_core_role_policy_associations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_role_policy_associations
    ADD CONSTRAINT demo_core_role_policy_associations_pkey PRIMARY KEY (id);


--
-- Name: demo_core_roles demo_core_roles_code_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_roles
    ADD CONSTRAINT demo_core_roles_code_unique UNIQUE (code);


--
-- Name: demo_core_roles demo_core_roles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_roles
    ADD CONSTRAINT demo_core_roles_pkey PRIMARY KEY (id);


--
-- Name: demo_core_security_policies demo_core_security_policies_name_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_security_policies
    ADD CONSTRAINT demo_core_security_policies_name_unique UNIQUE (name);


--
-- Name: demo_core_security_policies demo_core_security_policies_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_security_policies
    ADD CONSTRAINT demo_core_security_policies_pkey PRIMARY KEY (id);


--
-- Name: demo_core_ui_pages demo_core_ui_page_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_ui_pages
    ADD CONSTRAINT demo_core_ui_page_pkey PRIMARY KEY (id);


--
-- Name: demo_core_user_role_associations demo_core_user_role_associations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_user_role_associations
    ADD CONSTRAINT demo_core_user_role_associations_pkey PRIMARY KEY (id);


--
-- Name: demo_core_webhooks demo_core_webhooks_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_webhooks
    ADD CONSTRAINT demo_core_webhooks_pkey PRIMARY KEY (id);


--
-- Name: demo_notification_channels demo_notification_channels_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_notification_channels
    ADD CONSTRAINT demo_notification_channels_pkey PRIMARY KEY (id);


--
-- Name: demo_notification_logs demo_notification_logs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_notification_logs
    ADD CONSTRAINT demo_notification_logs_pkey PRIMARY KEY (id);


--
-- Name: demo_notification_notifications demo_notification_notifications_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_notification_notifications
    ADD CONSTRAINT demo_notification_notifications_pkey PRIMARY KEY (id);


--
-- Name: demo_notification_subscribers demo_notification_subscribers_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_notification_subscribers
    ADD CONSTRAINT demo_notification_subscribers_pkey PRIMARY KEY (id);


--
-- Name: demo_report_dashboards demo_report_dashboards_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_report_dashboards
    ADD CONSTRAINT demo_report_dashboards_pkey PRIMARY KEY (id);


--
-- Name: demo_report_widgets demo_report_widgets_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_report_widgets
    ADD CONSTRAINT demo_report_widgets_pkey PRIMARY KEY (id);


--
-- Name: demo_workflow_queue_assignment_groups demo_workflow_queue_assignment_groups_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_workflow_queue_assignment_groups
    ADD CONSTRAINT demo_workflow_queue_assignment_groups_pkey PRIMARY KEY (id);


--
-- Name: demo_workflow_queue_items demo_workflow_queue_items_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_workflow_queue_items
    ADD CONSTRAINT demo_workflow_queue_items_pkey PRIMARY KEY (id);


--
-- Name: demo_workflow_queue_pop_criterias demo_workflow_queue_pop_criterias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_workflow_queue_pop_criterias
    ADD CONSTRAINT demo_workflow_queue_pop_criterias_pkey PRIMARY KEY (id);


--
-- Name: demo_workflow_queue_routing_rules demo_workflow_queue_routing_rules_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_workflow_queue_routing_rules
    ADD CONSTRAINT demo_workflow_queue_routing_rules_pkey PRIMARY KEY (id);


--
-- Name: demo_workflow_queues demo_workflow_queues_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_workflow_queues
    ADD CONSTRAINT demo_workflow_queues_pkey PRIMARY KEY (id);


--
-- Name: demo_workflow_service_channels demo_workflow_service_channels_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_workflow_service_channels
    ADD CONSTRAINT demo_workflow_service_channels_pkey PRIMARY KEY (id);


--
-- Name: demo_workflow_workflow_states demo_workflow_workflow_states_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_workflow_workflow_states
    ADD CONSTRAINT demo_workflow_workflow_states_pkey PRIMARY KEY (id);


--
-- Name: demo_workflow_workflow_transitions demo_workflow_workflow_transitions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_workflow_workflow_transitions
    ADD CONSTRAINT demo_workflow_workflow_transitions_pkey PRIMARY KEY (id);


--
-- Name: demo_workflow_workflows demo_workflow_workflows_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_workflow_workflows
    ADD CONSTRAINT demo_workflow_workflows_pkey PRIMARY KEY (id);


--
-- Name: backend_users email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY backend_users
    ADD CONSTRAINT email_unique UNIQUE (email);


--
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- Name: demo_core_form_fields field_id; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_form_fields
    ADD CONSTRAINT field_id UNIQUE (form);


--
-- Name: indikator_backend_trash indikator_backend_trash_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY indikator_backend_trash
    ADD CONSTRAINT indikator_backend_trash_pkey PRIMARY KEY (id);


--
-- Name: jobs jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY jobs
    ADD CONSTRAINT jobs_pkey PRIMARY KEY (id);


--
-- Name: backend_users login_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY backend_users
    ADD CONSTRAINT login_unique UNIQUE (login);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: demo_core_custom_fields name; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_custom_fields
    ADD CONSTRAINT name UNIQUE (model);


--
-- Name: backend_user_groups name_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY backend_user_groups
    ADD CONSTRAINT name_unique UNIQUE (name);


--
-- Name: backend_user_roles role_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY backend_user_roles
    ADD CONSTRAINT role_unique UNIQUE (name);


--
-- Name: sessions sessions_id_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY sessions
    ADD CONSTRAINT sessions_id_unique UNIQUE (id);


--
-- Name: system_event_logs system_event_logs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY system_event_logs
    ADD CONSTRAINT system_event_logs_pkey PRIMARY KEY (id);


--
-- Name: system_files system_files_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY system_files
    ADD CONSTRAINT system_files_pkey PRIMARY KEY (id);


--
-- Name: system_mail_layouts system_mail_layouts_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY system_mail_layouts
    ADD CONSTRAINT system_mail_layouts_pkey PRIMARY KEY (id);


--
-- Name: system_mail_partials system_mail_partials_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY system_mail_partials
    ADD CONSTRAINT system_mail_partials_pkey PRIMARY KEY (id);


--
-- Name: system_mail_templates system_mail_templates_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY system_mail_templates
    ADD CONSTRAINT system_mail_templates_pkey PRIMARY KEY (id);


--
-- Name: system_parameters system_parameters_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY system_parameters
    ADD CONSTRAINT system_parameters_pkey PRIMARY KEY (id);


--
-- Name: system_plugin_history system_plugin_history_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY system_plugin_history
    ADD CONSTRAINT system_plugin_history_pkey PRIMARY KEY (id);


--
-- Name: system_plugin_versions system_plugin_versions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY system_plugin_versions
    ADD CONSTRAINT system_plugin_versions_pkey PRIMARY KEY (id);


--
-- Name: system_request_logs system_request_logs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY system_request_logs
    ADD CONSTRAINT system_request_logs_pkey PRIMARY KEY (id);


--
-- Name: system_revisions system_revisions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY system_revisions
    ADD CONSTRAINT system_revisions_pkey PRIMARY KEY (id);


--
-- Name: system_settings system_settings_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY system_settings
    ADD CONSTRAINT system_settings_pkey PRIMARY KEY (id);


--
-- Name: act_code_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX act_code_index ON backend_users USING btree (activation_code);


--
-- Name: admin_role_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX admin_role_index ON backend_users USING btree (role_id);


--
-- Name: backend_user_throttle_ip_address_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX backend_user_throttle_ip_address_index ON backend_user_throttle USING btree (ip_address);


--
-- Name: backend_user_throttle_user_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX backend_user_throttle_user_id_index ON backend_user_throttle USING btree (user_id);


--
-- Name: cms_theme_data_theme_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX cms_theme_data_theme_index ON cms_theme_data USING btree (theme);


--
-- Name: cms_theme_logs_theme_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX cms_theme_logs_theme_index ON cms_theme_logs USING btree (theme);


--
-- Name: cms_theme_logs_type_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX cms_theme_logs_type_index ON cms_theme_logs USING btree (type);


--
-- Name: cms_theme_logs_user_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX cms_theme_logs_user_id_index ON cms_theme_logs USING btree (user_id);


--
-- Name: cms_theme_templates_path_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX cms_theme_templates_path_index ON cms_theme_templates USING btree (path);


--
-- Name: cms_theme_templates_source_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX cms_theme_templates_source_index ON cms_theme_templates USING btree (source);


--
-- Name: code_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX code_index ON backend_user_groups USING btree (code);


--
-- Name: deferred_bindings_master_field_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX deferred_bindings_master_field_index ON deferred_bindings USING btree (master_field);


--
-- Name: deferred_bindings_master_type_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX deferred_bindings_master_type_index ON deferred_bindings USING btree (master_type);


--
-- Name: deferred_bindings_session_key_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX deferred_bindings_session_key_index ON deferred_bindings USING btree (session_key);


--
-- Name: deferred_bindings_slave_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX deferred_bindings_slave_id_index ON deferred_bindings USING btree (slave_id);


--
-- Name: deferred_bindings_slave_type_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX deferred_bindings_slave_type_index ON deferred_bindings USING btree (slave_type);


--
-- Name: item_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX item_index ON system_parameters USING btree (namespace, "group", item);


--
-- Name: jobs_queue_reserved_at_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX jobs_queue_reserved_at_index ON jobs USING btree (queue, reserved_at);


--
-- Name: reset_code_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX reset_code_index ON backend_users USING btree (reset_password_code);


--
-- Name: role_code_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX role_code_index ON backend_user_roles USING btree (code);


--
-- Name: system_event_logs_level_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX system_event_logs_level_index ON system_event_logs USING btree (level);


--
-- Name: system_files_attachment_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX system_files_attachment_id_index ON system_files USING btree (attachment_id);


--
-- Name: system_files_attachment_type_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX system_files_attachment_type_index ON system_files USING btree (attachment_type);


--
-- Name: system_files_field_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX system_files_field_index ON system_files USING btree (field);


--
-- Name: system_mail_templates_layout_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX system_mail_templates_layout_id_index ON system_mail_templates USING btree (layout_id);


--
-- Name: system_plugin_history_code_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX system_plugin_history_code_index ON system_plugin_history USING btree (code);


--
-- Name: system_plugin_history_type_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX system_plugin_history_type_index ON system_plugin_history USING btree (type);


--
-- Name: system_plugin_versions_code_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX system_plugin_versions_code_index ON system_plugin_versions USING btree (code);


--
-- Name: system_revisions_field_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX system_revisions_field_index ON system_revisions USING btree (field);


--
-- Name: system_revisions_revisionable_id_revisionable_type_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX system_revisions_revisionable_id_revisionable_type_index ON system_revisions USING btree (revisionable_id, revisionable_type);


--
-- Name: system_revisions_user_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX system_revisions_user_id_index ON system_revisions USING btree (user_id);


--
-- Name: system_settings_item_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX system_settings_item_index ON system_settings USING btree (item);


--
-- Name: user_item_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX user_item_index ON backend_user_preferences USING btree (user_id, namespace, "group", item);


--
-- PostgreSQL database dump complete
--

