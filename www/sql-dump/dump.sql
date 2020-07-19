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


--
-- Name: uuid-ossp; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS "uuid-ossp" WITH SCHEMA public;


--
-- Name: EXTENSION "uuid-ossp"; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION "uuid-ossp" IS 'generate universally unique identifiers (UUIDs)';


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
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    name character varying(191) NOT NULL,
    active integer NOT NULL,
    description character varying(191) NOT NULL,
    duration bigint NOT NULL,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    id uuid NOT NULL
);


ALTER TABLE demo_casemanager_case_priorities OWNER TO postgres;

--
-- Name: demo_casemanager_cases; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_casemanager_cases (
    title character varying(255),
    description text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer,
    updated_by_id integer,
    assigned_to_id integer,
    case_number character varying(255) NOT NULL,
    case_version character varying(255) NOT NULL,
    version integer NOT NULL,
    suspect character varying(255) NOT NULL,
    tat_duration bigint NOT NULL,
    comments text NOT NULL,
    id uuid NOT NULL,
    priority_id uuid,
    workflow_state_id uuid,
    queue_id uuid
);


ALTER TABLE demo_casemanager_cases OWNER TO postgres;

--
-- Name: demo_casemanager_projects; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_casemanager_projects (
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    version integer DEFAULT 0,
    label character varying(191) NOT NULL,
    description text,
    name character varying(191) NOT NULL,
    project_type character varying(191),
    default_assignee_id integer NOT NULL,
    image character varying(191),
    url text,
    id uuid NOT NULL,
    workflow_id uuid,
    project_lead_id uuid
);


ALTER TABLE demo_casemanager_projects OWNER TO postgres;

--
-- Name: demo_core_audit_logs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_audit_logs (
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    version integer NOT NULL,
    model character varying(191) NOT NULL,
    operation character varying(191) NOT NULL,
    previous text NOT NULL,
    current text,
    id uuid NOT NULL,
    record_id uuid
);


ALTER TABLE demo_core_audit_logs OWNER TO postgres;

--
-- Name: demo_core_commands; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_commands (
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
    plugin_id integer NOT NULL,
    id uuid NOT NULL
);


ALTER TABLE demo_core_commands OWNER TO postgres;

--
-- Name: demo_core_custom_fields; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_custom_fields (
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
    plugin_id integer NOT NULL,
    id uuid NOT NULL
);


ALTER TABLE demo_core_custom_fields OWNER TO postgres;

--
-- Name: demo_core_event_handlers; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_event_handlers (
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
    plugin_id integer NOT NULL,
    id uuid NOT NULL
);


ALTER TABLE demo_core_event_handlers OWNER TO postgres;

--
-- Name: demo_core_form_actions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_form_actions (
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
    html_attributes text DEFAULT '[]'::text NOT NULL,
    id uuid NOT NULL
);


ALTER TABLE demo_core_form_actions OWNER TO postgres;

--
-- Name: demo_core_form_fields; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_form_fields (
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    label character varying(191) NOT NULL,
    form character varying(191) NOT NULL,
    plugin_id integer NOT NULL,
    controls text NOT NULL,
    description text,
    active smallint NOT NULL,
    virtual smallint NOT NULL,
    id uuid NOT NULL,
    field_id uuid
);


ALTER TABLE demo_core_form_fields OWNER TO postgres;

--
-- Name: demo_core_iframes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_iframes (
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
    iframe smallint DEFAULT '1'::smallint NOT NULL,
    id uuid NOT NULL
);


ALTER TABLE demo_core_iframes OWNER TO postgres;

--
-- Name: demo_core_inbound_api; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_inbound_api (
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
    active smallint DEFAULT '1'::smallint NOT NULL,
    id uuid NOT NULL
);


ALTER TABLE demo_core_inbound_api OWNER TO postgres;

--
-- Name: demo_core_libraries; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_libraries (
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    plugin_id integer NOT NULL,
    name character varying(191) NOT NULL,
    description text NOT NULL,
    website text NOT NULL,
    code character varying(255),
    id uuid NOT NULL
);


ALTER TABLE demo_core_libraries OWNER TO postgres;

--
-- Name: demo_core_list_actions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_list_actions (
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
    html_attributes text DEFAULT '[]'::text NOT NULL,
    id uuid NOT NULL
);


ALTER TABLE demo_core_list_actions OWNER TO postgres;

--
-- Name: demo_core_model_associations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_model_associations (
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
    active boolean NOT NULL,
    id uuid NOT NULL
);


ALTER TABLE demo_core_model_associations OWNER TO postgres;

--
-- Name: demo_core_models; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_models (
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
    viewable boolean DEFAULT false,
    id uuid NOT NULL
);


ALTER TABLE demo_core_models OWNER TO postgres;

--
-- Name: demo_core_navigations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_navigations (
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
    plugin_id integer NOT NULL,
    sort_order smallint NOT NULL,
    icon character varying(255) DEFAULT NULL::character varying,
    id uuid NOT NULL,
    record_id uuid,
    parent_id uuid,
    dashboard_id uuid,
    widget_id uuid,
    uipage_id uuid
);


ALTER TABLE demo_core_navigations OWNER TO postgres;

--
-- Name: demo_core_permission_policy_associations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_permission_policy_associations (
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    plugin_id integer NOT NULL,
    id uuid NOT NULL,
    permission_id uuid,
    policy_id uuid
);


ALTER TABLE demo_core_permission_policy_associations OWNER TO postgres;

--
-- Name: demo_core_permissions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_permissions (
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
    system boolean DEFAULT false NOT NULL,
    id uuid NOT NULL
);


ALTER TABLE demo_core_permissions OWNER TO postgres;

--
-- Name: demo_core_role_policy_associations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_role_policy_associations (
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    plugin_id integer NOT NULL,
    id uuid NOT NULL,
    role_id uuid,
    policy_id uuid
);


ALTER TABLE demo_core_role_policy_associations OWNER TO postgres;

--
-- Name: demo_core_roles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_roles (
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    name character varying(191) NOT NULL,
    code character varying(191) NOT NULL,
    description text NOT NULL,
    plugin_id integer NOT NULL,
    id uuid NOT NULL
);


ALTER TABLE demo_core_roles OWNER TO postgres;

--
-- Name: demo_core_security_policies; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_security_policies (
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    name character varying(191) NOT NULL,
    description text NOT NULL,
    plugin_id integer NOT NULL,
    id uuid NOT NULL
);


ALTER TABLE demo_core_security_policies OWNER TO postgres;

--
-- Name: demo_core_ui_pages; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_ui_pages (
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    version integer,
    name character varying(191) NOT NULL,
    description text,
    code character varying(191) NOT NULL,
    template text NOT NULL,
    plugin_id integer NOT NULL,
    id uuid NOT NULL
);


ALTER TABLE demo_core_ui_pages OWNER TO postgres;

--
-- Name: demo_core_user_role_associations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_user_role_associations (
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    user_id integer NOT NULL,
    plugin_id integer NOT NULL,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    id uuid NOT NULL,
    role_id uuid
);


ALTER TABLE demo_core_user_role_associations OWNER TO postgres;

--
-- Name: demo_core_view_role_associations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_view_role_associations (
    created_at timestamp(0) without time zone DEFAULT NULL::timestamp without time zone,
    updated_at timestamp(0) without time zone DEFAULT NULL::timestamp without time zone,
    created_by_id integer,
    updated_by_id integer,
    version integer,
    plugin_id integer,
    model character varying(255),
    id uuid DEFAULT uuid_generate_v4() NOT NULL,
    record_id uuid,
    role_id uuid
);


ALTER TABLE demo_core_view_role_associations OWNER TO postgres;

--
-- Name: demo_core_webhooks; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_core_webhooks (
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
    timeout integer DEFAULT 3600 NOT NULL,
    id uuid NOT NULL
);


ALTER TABLE demo_core_webhooks OWNER TO postgres;

--
-- Name: demo_notification_channels; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_notification_channels (
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    script text NOT NULL,
    configuration text,
    active boolean DEFAULT true NOT NULL,
    plugin_id integer NOT NULL,
    name character varying(191) NOT NULL,
    description text,
    id uuid NOT NULL
);


ALTER TABLE demo_notification_channels OWNER TO postgres;

--
-- Name: demo_notification_logs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_notification_logs (
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    delivered boolean DEFAULT false NOT NULL,
    status text,
    id uuid NOT NULL,
    notification_id uuid
);


ALTER TABLE demo_notification_logs OWNER TO postgres;

--
-- Name: demo_notification_notifications; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_notification_notifications (
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
    id uuid NOT NULL,
    template_id uuid,
    channel_id uuid
);


ALTER TABLE demo_notification_notifications OWNER TO postgres;

--
-- Name: demo_notification_subscribers; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_notification_subscribers (
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    plugin_id integer NOT NULL,
    id uuid NOT NULL,
    subscriber_id uuid,
    subscriber_group_id uuid,
    notification_id uuid
);


ALTER TABLE demo_notification_subscribers OWNER TO postgres;

--
-- Name: demo_report_dashboards; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_report_dashboards (
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    name character varying(191) NOT NULL,
    description text NOT NULL,
    active smallint NOT NULL,
    widgets_config jsonb NOT NULL,
    public smallint NOT NULL,
    code character varying(255),
    plugin_id integer,
    id uuid NOT NULL
);


ALTER TABLE demo_report_dashboards OWNER TO postgres;

--
-- Name: demo_report_widget_library_associations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_report_widget_library_associations (
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    plugin_id integer NOT NULL,
    id uuid NOT NULL,
    widget_id uuid,
    library_id uuid
);


ALTER TABLE demo_report_widget_library_associations OWNER TO postgres;

--
-- Name: demo_report_widgets; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_report_widgets (
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
    plugin_id integer NOT NULL,
    active boolean DEFAULT true NOT NULL,
    id uuid NOT NULL,
    library_id uuid
);


ALTER TABLE demo_report_widgets OWNER TO postgres;

--
-- Name: demo_workflow_queue_assignment_groups; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_workflow_queue_assignment_groups (
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    group_id integer NOT NULL,
    sort_order integer NOT NULL,
    plugin_id integer NOT NULL,
    id uuid NOT NULL,
    queue_id uuid
);


ALTER TABLE demo_workflow_queue_assignment_groups OWNER TO postgres;

--
-- Name: demo_workflow_queue_items; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_workflow_queue_items (
    assigned_to_id integer,
    model character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    poped_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    plugin_id integer NOT NULL,
    id uuid NOT NULL,
    queue_id uuid,
    record_id uuid
);


ALTER TABLE demo_workflow_queue_items OWNER TO postgres;

--
-- Name: demo_workflow_queue_pop_criterias; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_workflow_queue_pop_criterias (
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    name character varying(191) NOT NULL,
    description text,
    script text NOT NULL,
    plugin_id integer NOT NULL,
    id uuid NOT NULL
);


ALTER TABLE demo_workflow_queue_pop_criterias OWNER TO postgres;

--
-- Name: demo_workflow_queue_routing_rules; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_workflow_queue_routing_rules (
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    script text NOT NULL,
    name character varying(191) NOT NULL,
    description text,
    plugin_id integer NOT NULL,
    id uuid NOT NULL
);


ALTER TABLE demo_workflow_queue_routing_rules OWNER TO postgres;

--
-- Name: demo_workflow_queues; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_workflow_queues (
    name character varying(255) NOT NULL,
    description text NOT NULL,
    script text NOT NULL,
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
    virtual boolean DEFAULT false NOT NULL,
    active boolean DEFAULT true,
    id uuid NOT NULL,
    service_channel_id uuid,
    pop_criteria_id uuid,
    routing_rule_id uuid
);


ALTER TABLE demo_workflow_queues OWNER TO postgres;

--
-- Name: demo_workflow_service_channels; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_workflow_service_channels (
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
    condition text NOT NULL,
    id uuid NOT NULL
);


ALTER TABLE demo_workflow_service_channels OWNER TO postgres;

--
-- Name: demo_workflow_workflow_items; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_workflow_workflow_items (
    created_by_id integer,
    updated_by_id integer,
    model character varying(255),
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    assigned_at timestamp without time zone,
    assigned_to_id integer,
    finished_at timestamp without time zone,
    plugin_id integer,
    id uuid NOT NULL,
    workflow_id uuid,
    record_id uuid,
    current_state_id uuid
);


ALTER TABLE demo_workflow_workflow_items OWNER TO postgres;

--
-- Name: demo_workflow_workflow_states; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_workflow_workflow_states (
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    name character varying(191) NOT NULL,
    description text NOT NULL,
    active integer NOT NULL,
    code character varying(191) NOT NULL,
    plugin_id integer NOT NULL,
    id uuid NOT NULL
);


ALTER TABLE demo_workflow_workflow_states OWNER TO postgres;

--
-- Name: demo_workflow_workflow_transitions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_workflow_workflow_transitions (
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by_id integer NOT NULL,
    updated_by_id integer NOT NULL,
    data text,
    plugin_id integer NOT NULL,
    column_12 integer,
    backward_direction boolean DEFAULT false,
    id uuid NOT NULL,
    workflow_item_id uuid,
    from_state_id uuid,
    to_state_id uuid
);


ALTER TABLE demo_workflow_workflow_transitions OWNER TO postgres;

--
-- Name: demo_workflow_workflows; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE demo_workflow_workflows (
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
    event character varying(191),
    id uuid NOT NULL,
    model_state_field character varying(255) DEFAULT 'workflow_state_id'::character varying
);


ALTER TABLE demo_workflow_workflows OWNER TO postgres;

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
    value text,
    data_type character varying(255) DEFAULT 'text'::character varying NOT NULL,
    description text
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
37	1	::1	2020-05-26 14:44:49	2020-05-26 14:44:49
38	1	::1	2020-05-29 08:15:23	2020-05-29 08:15:23
39	2	::1	2020-06-01 13:49:31	2020-06-01 13:49:31
40	1	::1	2020-06-06 06:51:40	2020-06-06 06:51:40
41	2	::1	2020-06-07 04:48:26	2020-06-07 04:48:26
42	2	::1	2020-06-07 05:36:42	2020-06-07 05:36:42
43	2	::1	2020-06-07 05:38:44	2020-06-07 05:38:44
44	1	::1	2020-06-07 13:16:52	2020-06-07 13:16:52
45	1	::1	2020-06-27 16:50:05	2020-06-27 16:50:05
46	1	::1	2020-06-27 16:51:15	2020-06-27 16:51:15
47	1	::1	2020-06-28 04:40:19	2020-06-28 04:40:19
48	1	::1	2020-06-28 09:07:50	2020-06-28 09:07:50
49	1	::1	2020-06-28 12:06:59	2020-06-28 12:06:59
50	1	::1	2020-06-28 14:07:21	2020-06-28 14:07:21
51	1	::1	2020-06-28 14:21:02	2020-06-28 14:21:02
52	1	::1	2020-06-28 15:06:53	2020-06-28 15:06:53
53	1	::1	2020-06-28 15:08:51	2020-06-28 15:08:51
54	1	::1	2020-06-28 15:21:21	2020-06-28 15:21:21
55	1	::1	2020-06-28 15:25:00	2020-06-28 15:25:00
56	1	::1	2020-07-05 08:07:38	2020-07-05 08:07:38
57	1	::1	2020-07-05 17:02:02	2020-07-05 17:02:02
58	1	::1	2020-07-11 06:35:39	2020-07-11 06:35:39
\.


--
-- Name: backend_access_log_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('backend_access_log_id_seq', 58, true);


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
3	1	demo_core	auditlogcontroller	lists	{"visible":["id","record_id","model","version","created_at"],"per_page":"20"}
2	1	demo_core	permissioncontroller	lists	{"visible":["id","code","name","active","model","operation","plugin_id"],"per_page":"20"}
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
1	Admin	Person	admin	admin@domain.tld	$2y$10$gs9tcpJn5uAmNOzaS4DvZO4l5qrF4zyzATp5AKiT3mKjFt3mnY/KS	\N	$2y$10$W1IQxBeJiDaB7v9Uwx52y.eRYhZevNZnhPpRT/yNPRHrT.Aqa5SSC	\N		t	2	\N	2020-07-11 06:35:39	2020-04-26 05:34:31	2020-07-11 06:35:39	\N	t
2	Suraj	Baliyan	suraj	suraj.baliyan4@gmail.com	$2y$10$sZj8Bfs9CVKMvkVrsWjvhuh02DhE/cxn38DU9KttZTvnD1d5EGXE2	\N	$2y$10$DkEYtnayrRp6Z0ZMUmJP7.Ye7uTAjObd9oUdJEMecOQSkw8Ua9g36	\N	\N	f	5	\N	2020-06-07 05:38:44	2020-05-10 06:08:53	2020-06-07 05:38:44	\N	f
\.


--
-- Data for Name: backend_users_groups; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY backend_users_groups (user_id, user_group_id) FROM stdin;
1	1
2	3
1	3
2	2
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

SELECT pg_catalog.setval('deferred_bindings_id_seq', 26, true);


--
-- Data for Name: demo_casemanager_case_priorities; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_casemanager_case_priorities (created_at, updated_at, name, active, description, duration, created_by_id, updated_by_id, id) FROM stdin;
2020-04-27 11:07:15	2020-04-27 11:07:15	Normal	1		2155	1	1	1bf6101c-7662-425a-bd1e-ef71d3b934d6
2020-04-27 11:12:45	2020-04-27 11:12:45	High	1	54	5	1	1	41e1a52e-e0d6-4cd4-96cc-00aec660b510
\.


--
-- Data for Name: demo_casemanager_cases; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_casemanager_cases (title, description, created_at, updated_at, created_by_id, updated_by_id, assigned_to_id, case_number, case_version, version, suspect, tat_duration, comments, id, priority_id, workflow_state_id, queue_id) FROM stdin;
\N	\N	2020-07-05 14:12:26	2020-07-05 14:12:37	1	1	\N	54545	54545	3	64	3171795146		8dc0d800-bec9-11ea-8024-69f5b89267d0	\N	16d9ddab-a130-4bbd-8d5c-b3e82fbf00de	c83b37aa-0fd9-4987-bff7-1a604da1ffde
\N	\N	2020-07-05 14:27:09	2020-07-05 14:27:09	1	1	1	5454		1	54545	3171796028		9bcbd910-becb-11ea-8a82-27160d7ae9f3	\N	09dfd34e-0db5-49f3-96b2-23831d811a0b	\N
\N	\N	2020-07-05 14:27:10	2020-07-05 14:27:10	1	1	1	5454		1	54545	3171796030		9caa4610-becb-11ea-9b6a-9df544c173f0	\N	09dfd34e-0db5-49f3-96b2-23831d811a0b	\N
\.


--
-- Data for Name: demo_casemanager_projects; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_casemanager_projects (created_at, updated_at, created_by_id, updated_by_id, version, label, description, name, project_type, default_assignee_id, image, url, id, workflow_id, project_lead_id) FROM stdin;
\.


--
-- Data for Name: demo_core_audit_logs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_audit_logs (created_at, updated_at, created_by_id, updated_by_id, version, model, operation, previous, current, id, record_id) FROM stdin;
2020-06-07 04:14:13	2020-06-07 04:14:13	1	1	0	Demo\\Casemanager\\Models\\CaseModel	updating	{"case_number":"5545465","case_version":"6465465","description":null,"priority_id":null,"suspect":"654654654","tat_duration":645645,"title":null}	\N	58143ad0-a875-11ea-937f-c3f3c256f915	520eafe0-a875-11ea-b038-8d334863e71c
2020-06-07 04:19:19	2020-06-07 04:19:19	1	1	1	Demo\\Casemanager\\Models\\CaseModel	updating	{"case_number":"5545465","case_version":"6465465","description":null,"priority_id":null,"suspect":"654654654","tat_duration":645645,"title":null}	\N	0ea48ed0-a876-11ea-92ad-451b73041c6c	520eafe0-a875-11ea-b038-8d334863e71c
2020-06-07 04:30:58	2020-06-07 04:30:58	1	1	0	Demo\\Casemanager\\Models\\CaseModel	updating	{"case_number":"54654","case_version":"64654","description":null,"priority_id":null,"suspect":"64654654","tat_duration":64,"title":null}	\N	af101e90-a877-11ea-891f-dfa9a35d0cc4	ac2abd90-a877-11ea-991a-7d6401d5f988
2020-06-07 04:44:29	2020-06-07 04:44:29	1	1	0	Demo\\Casemanager\\Models\\CaseModel	updating	{"case_number":"54545","case_version":"5454","description":null,"priority_id":null,"suspect":"54545","tat_duration":55454,"title":null}	\N	92e97360-a879-11ea-8e67-4ffe8779330e	88b29cb0-a879-11ea-a404-97454a3d8370
2020-06-07 04:44:37	2020-06-07 04:44:37	1	1	1	Demo\\Casemanager\\Models\\CaseModel	updating	{"case_number":"54545","case_version":"5454","description":null,"priority_id":null,"suspect":"54545","tat_duration":55454,"title":null}	\N	97bbd980-a879-11ea-81a3-7126d9b80152	88b29cb0-a879-11ea-a404-97454a3d8370
2020-06-07 06:08:56	2020-06-07 06:08:56	1	1	0	Demo\\Casemanager\\Models\\CaseModel	updating	{"case_number":"5654564","case_version":"654654","description":null,"priority_id":null,"suspect":"6465465","tat_duration":6465456,"title":null}	\N	5ed07680-a885-11ea-bfcd-1db1a7da4e7f	5e9999d0-a885-11ea-b80c-31b147e327cd
2020-06-07 06:24:43	2020-06-07 06:24:43	1	1	1	Demo\\Casemanager\\Models\\CaseModel	updating	{"case_number":"5654564","case_version":"654654","description":null,"priority_id":null,"suspect":"6465465","tat_duration":6465456,"title":null}	\N	8f814b60-a887-11ea-a59d-6913f0738228	5e9999d0-a885-11ea-b80c-31b147e327cd
2020-06-07 06:26:40	2020-06-07 06:26:40	1	1	0	Demo\\Casemanager\\Models\\CaseModel	updating	{"case_number":"5456465","case_version":"564654","description":null,"priority_id":null,"suspect":"64654","tat_duration":564654,"title":null}	\N	d93bb460-a887-11ea-a76e-6b81b90cf0ec	d29a9b00-a887-11ea-81b6-cf53d393a93f
2020-06-07 06:26:50	2020-06-07 06:26:50	1	1	1	Demo\\Casemanager\\Models\\CaseModel	updating	{"case_number":"5456465","case_version":"564654","description":null,"priority_id":null,"suspect":"64654","tat_duration":564654,"title":null}	\N	ded22a90-a887-11ea-991d-6929f34a07c1	d29a9b00-a887-11ea-81b6-cf53d393a93f
2020-06-07 06:27:16	2020-06-07 06:27:16	2	2	2	Demo\\Casemanager\\Models\\CaseModel	updating	{"case_number":"5456465","case_version":"564654","description":null,"priority_id":null,"suspect":"64654","tat_duration":564654,"title":null}	\N	ee812430-a887-11ea-aad3-d96d99f9a6fb	d29a9b00-a887-11ea-81b6-cf53d393a93f
2020-06-07 06:27:51	2020-06-07 06:27:51	2	2	3	Demo\\Casemanager\\Models\\CaseModel	updating	{"case_number":"5456465","case_version":"564654","description":null,"priority_id":null,"suspect":"64654","tat_duration":564654,"title":null}	\N	034565f0-a888-11ea-ae5a-93be2771f544	d29a9b00-a887-11ea-81b6-cf53d393a93f
2020-06-07 06:28:20	2020-06-07 06:28:20	2	2	4	Demo\\Casemanager\\Models\\CaseModel	updating	{"case_number":"5456465","case_version":"564654","description":null,"priority_id":null,"suspect":"64654","tat_duration":564654,"title":null}	\N	14fd4020-a888-11ea-bd18-2d58f60bf3fb	d29a9b00-a887-11ea-81b6-cf53d393a93f
2020-06-07 06:28:35	2020-06-07 06:28:35	2	2	5	Demo\\Casemanager\\Models\\CaseModel	updating	{"case_number":"5456465","case_version":"564654","description":null,"priority_id":null,"suspect":"64654","tat_duration":564654,"title":null}	\N	1de57080-a888-11ea-bc9b-292a87d0c437	d29a9b00-a887-11ea-81b6-cf53d393a93f
2020-06-07 06:51:16	2020-06-07 06:51:16	1	1	0	Demo\\Casemanager\\Models\\CaseModel	updating	{"case_number":"87897897","case_version":"45","description":null,"priority_id":null,"suspect":"test","tat_duration":87987987,"title":null}	\N	48d221c0-a88b-11ea-8547-4304304ab4ed	48824180-a88b-11ea-817a-4d17562fdc2d
2020-06-07 06:52:46	2020-06-07 06:52:46	1	1	1	Demo\\Casemanager\\Models\\CaseModel	updating	{"case_number":"87897897","case_version":"45","description":null,"priority_id":null,"suspect":"test","tat_duration":87987987,"title":null}	\N	7e53a500-a88b-11ea-bae9-f1a279c4af0b	48824180-a88b-11ea-817a-4d17562fdc2d
2020-06-07 06:55:05	2020-06-07 06:55:05	2	2	2	Demo\\Casemanager\\Models\\CaseModel	updating	{"case_number":"87897897","case_version":"45","description":null,"priority_id":null,"suspect":"test","tat_duration":87987987,"title":null}	\N	d11dc480-a88b-11ea-9714-53644c272001	48824180-a88b-11ea-817a-4d17562fdc2d
2020-06-07 06:56:02	2020-06-07 06:56:02	2	2	3	Demo\\Casemanager\\Models\\CaseModel	updating	{"case_number":"87897897","case_version":"45","description":null,"priority_id":null,"suspect":"test","tat_duration":87987987,"title":null}	\N	f32e4200-a88b-11ea-a982-531072a88246	48824180-a88b-11ea-817a-4d17562fdc2d
2020-06-07 06:56:49	2020-06-07 06:56:49	2	2	4	Demo\\Casemanager\\Models\\CaseModel	updating	{"case_number":"87897897","case_version":"45","description":null,"priority_id":null,"suspect":"test","tat_duration":87987987,"title":null}	\N	0f0b42e0-a88c-11ea-b829-093f819d053d	48824180-a88b-11ea-817a-4d17562fdc2d
2020-06-13 05:58:08	2020-06-13 05:58:08	1	1	0	Demo\\Casemanager\\Models\\CaseModel	updating	{"case_number":"54545","case_version":"54545","description":null,"priority_id":null,"suspect":"545454","tat_duration":54545,"title":null}	\N	db0035d0-ad3a-11ea-8f70-47f2d7d521c1	da839640-ad3a-11ea-8219-415e71b1df69
2020-06-13 06:13:13	2020-06-13 06:13:13	1	1	0	Demo\\Casemanager\\Models\\CaseModel	updating	{"case_number":"4545","case_version":"5454","description":null,"priority_id":null,"suspect":"45454","tat_duration":5454,"title":null}	\N	f6620d60-ad3c-11ea-bbd9-a561d0fc31ef	f627cb90-ad3c-11ea-8e90-c13740dd6e15
2020-06-13 06:16:09	2020-06-13 06:16:09	1	1	1	Demo\\Casemanager\\Models\\CaseModel	updating	{"case_number":"4545","case_version":"5454","description":null,"priority_id":null,"suspect":"45454","tat_duration":5454,"title":null}	\N	5f5a8180-ad3d-11ea-9426-23641faf80d6	f627cb90-ad3c-11ea-8e90-c13740dd6e15
2020-06-13 06:18:16	2020-06-13 06:18:16	1	1	1	Demo\\Casemanager\\Models\\CaseModel	updating	{"case_number":"54545","case_version":"54545","description":null,"priority_id":null,"suspect":"545454","tat_duration":54545,"title":null}	\N	ab65cea0-ad3d-11ea-8706-e3195c1b5af8	da839640-ad3a-11ea-8219-415e71b1df69
2020-06-13 06:18:17	2020-06-13 06:18:17	1	1	2	Demo\\Casemanager\\Models\\CaseModel	updating	{"case_number":"54545","case_version":"54545","description":null,"priority_id":null,"suspect":"545454","tat_duration":54545,"title":null}	\N	ab8f9330-ad3d-11ea-ae32-6fe326c3e435	da839640-ad3a-11ea-8219-415e71b1df69
2020-06-14 06:45:44	2020-06-14 06:45:44	1	1	0	Demo\\Casemanager\\Models\\CaseModel	updating	{"case_number":"8787","case_version":"8787","description":null,"priority_id":null,"suspect":"87878","tat_duration":8787,"title":null}	\N	abf0f050-ae0a-11ea-a796-25b9e6a7b08a	ab979270-ae0a-11ea-8a21-bd39412de736
2020-06-14 09:21:17	2020-06-14 09:21:17	1	1	1	Demo\\Casemanager\\Models\\CaseModel	updating	{"case_number":"8787","case_version":"8787","description":null,"priority_id":null,"suspect":"87878","tat_duration":8787,"title":null}	\N	66ecb500-ae20-11ea-a31d-1b94b0299010	ab979270-ae0a-11ea-8a21-bd39412de736
2020-06-14 09:21:17	2020-06-14 09:21:17	1	1	2	Demo\\Casemanager\\Models\\CaseModel	updating	{"case_number":"8787","case_version":"8787","description":null,"priority_id":null,"suspect":"87878","tat_duration":8787,"title":null}	\N	67120570-ae20-11ea-aa04-07d32b491397	ab979270-ae0a-11ea-8a21-bd39412de736
2020-06-20 09:18:05	2020-06-20 09:18:05	1	1	0	Demo\\Casemanager\\Models\\CaseModel	updating	{"case_number":"7015","case_version":"54545","description":null,"priority_id":null,"suspect":"5454","tat_duration":3170481484,"title":null}	\N	f2d12f90-b2d6-11ea-a47e-579924fd5f91	f2628130-b2d6-11ea-9857-af73e7931f92
2020-06-20 09:18:14	2020-06-20 09:18:14	1	1	1	Demo\\Casemanager\\Models\\CaseModel	updating	{"case_number":"7015","case_version":"54545","description":null,"priority_id":null,"suspect":"5454","tat_duration":3170481484,"title":null}	\N	f863e440-b2d6-11ea-9438-f94f54105680	f2628130-b2d6-11ea-9857-af73e7931f92
2020-06-20 09:18:15	2020-06-20 09:18:15	1	1	2	Demo\\Casemanager\\Models\\CaseModel	updating	{"case_number":"7015","case_version":"54545","description":null,"priority_id":null,"suspect":"5454","tat_duration":3170481484,"title":null}	\N	f887deb0-b2d6-11ea-a4f5-e94f209b861a	f2628130-b2d6-11ea-9857-af73e7931f92
2020-07-05 14:12:26	2020-07-05 14:12:26	1	1	0	Demo\\Casemanager\\Models\\CaseModel	updating	{"case_number":"54545","case_version":"54545","description":null,"priority_id":null,"suspect":"64","tat_duration":3171795146,"title":null}	\N	8e0fdde0-bec9-11ea-9058-f53a98b78a14	8dc0d800-bec9-11ea-8024-69f5b89267d0
2020-07-05 14:12:36	2020-07-05 14:12:36	1	1	1	Demo\\Casemanager\\Models\\CaseModel	updating	{"case_number":"54545","case_version":"54545","description":null,"priority_id":null,"suspect":"64","tat_duration":3171795146,"title":null}	\N	93f949c0-bec9-11ea-9473-95915803942a	8dc0d800-bec9-11ea-8024-69f5b89267d0
2020-07-05 14:12:37	2020-07-05 14:12:37	1	1	2	Demo\\Casemanager\\Models\\CaseModel	updating	{"case_number":"54545","case_version":"54545","description":null,"priority_id":null,"suspect":"64","tat_duration":3171795146,"title":null}	\N	941fdbe0-bec9-11ea-85f2-4745af2be7ec	8dc0d800-bec9-11ea-8024-69f5b89267d0
2020-07-05 14:27:09	2020-07-05 14:27:09	1	1	0	Demo\\Casemanager\\Models\\CaseModel	updating	{"case_number":"5454","case_version":"","description":null,"priority_id":null,"suspect":"54545","tat_duration":3171796028,"title":null}	\N	9c0bab40-becb-11ea-9b69-a5098717725e	9bcbd910-becb-11ea-8a82-27160d7ae9f3
2020-07-05 14:27:10	2020-07-05 14:27:10	1	1	0	Demo\\Casemanager\\Models\\CaseModel	updating	{"case_number":"5454","case_version":"","description":null,"priority_id":null,"suspect":"54545","tat_duration":3171796030,"title":null}	\N	9cea5f10-becb-11ea-875a-474b8a71d25f	9caa4610-becb-11ea-9b6a-9df544c173f0
\.


--
-- Data for Name: demo_core_commands; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_commands (created_at, updated_at, updated_by_id, created_by_id, name, description, slug, active, arguments, parameters, script, plugin_id, id) FROM stdin;
\.


--
-- Data for Name: demo_core_custom_fields; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_custom_fields (created_at, updated_at, created_by_id, updated_by_id, name, description, type, model, length, unsigned, allow_null, "default", plugin_id, id) FROM stdin;
\.


--
-- Data for Name: demo_core_event_handlers; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_event_handlers (created_at, updated_at, created_by_id, updated_by_id, event, name, description, model, script, sort_order, active, plugin_id, id) FROM stdin;
\.


--
-- Data for Name: demo_core_form_actions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_form_actions (created_at, updated_at, created_by_id, updated_by_id, name, label, form, model, active, description, icon, css_class, sort_order, plugin_id, script, context, html_attributes, id) FROM stdin;
2020-04-13 14:34:58	2020-06-07 05:47:29	1	1	view-history	View History		Demo\\Core\\Models\\UniversalModel	t		oc-icon-history		0	10	function(event,engine,action,$element){\r\n    var location = engine.list.navigate({\r\n            controller:'demo/core/auditlogcontroller'\r\n        },{\r\n        filter:{\r\n            record_id:engine.form.getFormModel().id\r\n        }\r\n    });\r\n    console.log(location);\r\n}	["update","preview"]	[{"name":"data-show","value":"return this.data.action.modelRecord.audit===true;"}]	54e73d14-1a67-4327-91a7-3e5b1aa49a90
2020-04-26 15:37:16	2020-06-07 05:47:44	1	1	create	Create		Demo\\Core\\Models\\UniversalModel	t		oc-icon-adjust		-2	10	function(){}	["create"]	[{"name":"data-request","value":"onSave"},{"name":"data-hotkey","value":"ctrl+s, cmd+s"},{"name":"data-load-indicator","value":"Saving..."}]	0625b4f7-ab22-48ba-9eb2-e748cad64eab
2020-04-12 08:37:37	2020-04-19 04:40:45	1	1	test	Test	$/demo/casemanager/models/casemodel/fields.yaml	Demo\\Casemanager\\Models\\CaseModel	t		oc-icon-adjust		0	6	function(){\r\n        alert('Alert from action');\r\n        return false;\r\n}	["create","update"]	[]	801aec17-c33e-4dd1-9a97-560e2534cf3c
2020-05-31 14:09:07	2020-06-07 05:31:43	1	1	push-case	Push		Demo\\Casemanager\\Models\\CaseModel	t		oc-icon-arrow-circle-up	btn-secondary	4	6	function(){\r\n}	["update"]	[{"name":"data-request","value":"onPushCase"},{"name":"data-request-flash","value":""},{"name":"data-request-success","value":"$(this).hide()"},{"name":"data-load-indicator","value":"Pushing"},{"name":"data-request-confirm","value":"Are you sure?"},{"name":"data-show","value":"return action.form.getFormModel().assigned_to_id === me.id"}]	fa00326d-63d6-4d51-84ee-9567cd8bf986
2020-04-26 15:38:44	2020-06-07 05:46:42	1	1	save-close	Save & Close		Demo\\Core\\Models\\UniversalModel	t		oc-icon-save		-1	10		["create","update"]	[{"name":"data-request","value":"onSave"},{"name":"data-hotkey","value":"ctrl+enter, cmd+enter"},{"name":"data-load-indicator","value":"Saving..."},{"name":"data-request-data","value":"close:1"}]	74aa9c40-9618-4fc2-890f-35d98a81b875
2020-04-26 15:37:16	2020-06-07 05:46:52	1	1	save	Save		Demo\\Core\\Models\\UniversalModel	t		oc-icon-adjust		-2	10	function(){}	["update"]	[{"name":"data-request","value":"onSave"},{"name":"data-hotkey","value":"ctrl+s, cmd+s"},{"name":"data-load-indicator","value":"Saving..."},{"name":"data-request-data","value":"redirect:0"}]	60f9be27-c475-462f-a146-40588aa0bc91
2020-05-13 04:12:13	2020-06-07 05:47:03	1	1	dashboard-preview	Preview	$/demo/report/models/dashboard/fields.yaml	Demo\\Report\\Models\\Dashboard	t		oc-icon-photo		3	14	function(){\r\n}	["update"]	[{"name":"data-toggle","value":"model"},{"name":"href","value":"#previewModal"},{"name":"data-size","value":"large"},{"name":"data-request","value":"onPreview"},{"name":"data-load-indicator","value":"Loading"},{"name":"data-request-update","value":"widget_renderer: '#previewModal .modal-body'"},{"name":"data-hotkey","value":"ctrl+p, cmd+p"}]	c916ac69-bfd1-4ccc-8b75-2d8160831de6
2020-05-13 04:12:13	2020-06-07 05:47:21	1	1	widget-preview	Preview	$/demo/report/models/widget/fields.yaml	Demo\\Report\\Models\\Widget	t		oc-icon-photo		3	14	function(){\r\n}	["update"]	[{"name":"data-toggle","value":"model"},{"name":"href","value":"#previewModal"},{"name":"data-size","value":"large"},{"name":"data-request","value":"onPreview"},{"name":"data-load-indicator","value":"Loading"},{"name":"data-request-update","value":"widget_renderer: '#previewModal .modal-body'"},{"name":"data-hotkey","value":"ctrl+p, cmd+p"}]	eaa211e4-d899-413b-b6ef-64339b3b3626
2020-05-31 14:09:07	2020-06-07 05:32:17	1	1	rever-case	Revert		Demo\\Casemanager\\Models\\CaseModel	t		oc-icon-undo	btn-default	5	6	function () {\r\n    var form = new EngineForm({\r\n        fields: {\r\n            remark: {\r\n                type: 'richeditor',\r\n                label: 'Enter you remark',\r\n                span: 'full',\r\n            },\r\n        }\r\n    }).build();\r\n    form.showInPopup({\r\n        size: 'md',\r\n        title: 'Are you sure?',\r\n        actions: [{\r\n            name: 'revert-case',\r\n            label: 'Revert',\r\n            active: true,\r\n            icon: '',\r\n            css_class: 'btn btn-primary',\r\n            handler: function () {\r\n                $.request('onRevertCase', {\r\n                    url: EngineForm.getCurrentForm().$el.find('form').prop('action'),\r\n                    loading: $.oc.stripeLoadIndicator,\r\n                    data: {\r\n                        remark: form.getValue('remark')\r\n                    }\r\n                });\r\n            }\r\n        }]\r\n    });\r\n}	["update"]	[{"name":"data-show","value":"return action.form.getFormModel().assigned_to_id === me.id"}]	27909423-8ed9-4465-801c-c0f081f286fc
\.


--
-- Data for Name: demo_core_form_fields; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_form_fields (created_at, updated_at, created_by_id, updated_by_id, label, form, plugin_id, controls, description, active, virtual, id, field_id) FROM stdin;
\.


--
-- Data for Name: demo_core_iframes; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_iframes (created_at, updated_at, created_by_id, updated_by_id, name, description, backend_menu, slug, url, active, iframe, id) FROM stdin;
2019-11-24 15:42:32	2020-03-16 05:09:54	1	1	Test		[{"plugin":"10","main_menu":"main-menu-item","side_menu":"side-menu-item2"}]	test	https://www.youtube.com/watch?v=cTbIjrF05N0	1	1	41386ff9-ff61-4941-aa20-65314812fad3
\.


--
-- Data for Name: demo_core_inbound_api; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_inbound_api (created_at, updated_at, created_by_id, updated_by_id, method, plugin_id, script, name, description, url, active, id) FROM stdin;
\N	2020-06-16 14:19:41	1	1	get	10	return $context->pathVariables;	Test	<p><a href="http://localhost:8084/engine/inbound-api/demo-casemanager/test/aditya">http://localhost:8084/engine/inbound-api/demo-core/test/aditya</a></p>	/test/{name}	1	6ed75cc6-467c-441a-9a45-f8a20e825452
\.


--
-- Data for Name: demo_core_libraries; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_libraries (created_at, updated_at, created_by_id, updated_by_id, plugin_id, name, description, website, code, id) FROM stdin;
2020-05-10 07:34:36	2020-05-13 04:03:38	1	1	10	EchartJS		https://echarts.apache.org/en/index.html	echart-js	a65cda17-3942-4dac-995b-fd66fe412d1a
2020-06-21 04:12:40	2020-06-21 04:13:52	1	1	10	Ag Grid Community Edition	<p>ag-Grid is the industry standard for JavaScript Enterprise Applications. Developers using ag-Grid are building applications that would not be possible if ag-Grid did not exist.</p>	https://www.ag-grid.com/javascript-grid/	ag-grid	72d4e2a0-b375-11ea-a676-43d852c02135
2020-06-21 04:18:38	2020-06-21 04:18:38	1	1	3	Chart Js Slandered	<h2>Simple yet flexible JavaScript charting for designers &amp; developers</h2>	https://www.chartjs.org/	chart-js-slandered	484b31f0-b376-11ea-a48a-af29a00365d7
\.


--
-- Data for Name: demo_core_list_actions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_list_actions (created_at, updated_at, created_by_id, updated_by_id, name, label, list, model, active, description, icon, css_class, sort_order, plugin_id, script, html_attributes, id) FROM stdin;
2020-04-19 05:47:48	2020-04-27 10:44:08	1	1	view	View	$/demo/core/models/auditlog/columns.yaml	Demo\\Core\\Models\\AuditLog	t		oc-icon-eye	btn-default	0	10	function(event,engine){\r\n    var selected = engine.list.getSelectedRecordIds();\r\n    if(selected.length === 0 || selected.length > 1){\r\n        $.oc.flashMsg({\r\n            'text': 'Please select only a single record ro view.',\r\n            'class': 'error',\r\n            'interval': 5\r\n        });\r\n        return;\r\n    }\r\n    engine.form.navigate(engine.ui.getModelRecord(),selected[0],'audit-form-view');\r\n}	[{"name":"disabled","value":"disabled"},{"name":"data-trigger-action","value":"enable"},{"name":"data-trigger","value":".control-list input[type=checkbox]"},{"name":"data-trigger-condition","value":"checked"}]	8f870606-9895-47d9-aa57-0c7e9cf99880
2020-04-27 09:24:16	2020-05-31 13:23:42	1	1	reorder	Reorder		Demo\\Core\\Models\\UniversalModel	f		oc-icon-list		-2	10	function(event,engine){\r\n    engine.list.navigate(engine.ui.getModelRecord(),{},'reorder');\r\n}	[]	72d7f744-e5d4-4f88-8b2f-e16b4132ab42
2020-04-11 14:12:05	2020-05-31 13:24:08	1	1	test	test2	$/demo/casemanager/models/casemodel/columns.yaml	Demo\\Casemanager\\Models\\CaseModel	f		oc-icon-adjust		0	6		[]	d6d84ed8-7b59-4538-b9f5-f69f24489aef
2020-04-27 09:24:16	2020-07-12 11:24:24	1	1	create	Create		Demo\\Core\\Models\\UniversalModel	t		oc-icon-plus		1	10	function(event,engine){\r\n    EngineList.getCurrentList().navigate('create');\r\n}	[]	7fc66991-e2ac-4d1f-9aec-282d485287eb
2020-04-27 09:24:16	2020-07-12 11:24:49	1	1	delete	Delete		Demo\\Core\\Models\\UniversalModel	t		oc-icon-trash-o	control-disabled	2	10	function(){\r\n    $(this).data('request-data', {\r\n        checked: $('.control-list').listWidget('getChecked')\r\n    })\r\n}	[{"name":"data-request","value":"onDelete"},{"name":"data-request-confirm","value":"Delete the selected records?"},{"name":"data-request-success","value":"$(this).prop('disabled', true)"},{"name":"data-trigger-action","value":"enable"},{"name":"data-trigger","value":".control-list input[type=checkbox]"},{"name":"data-stripe-load-indicator","value":""},{"name":"disabled","value":"disabled"},{"name":"data-trigger-condition","value":"checked"}]	362fa0f2-16ac-4d0d-b11b-79d954c87bd1
2020-05-17 09:24:19	2020-06-21 05:03:28	1	1	pick-case	Pick Case	$/demo/casemanager/models/casemodel/columns.yaml	Demo\\Casemanager\\Models\\CaseModel	t		oc-icon-anchor		4	6	function () {\r\n    $.oc.stripeLoadIndicator.show();\r\n    $.request('onGetCurrentUserQueues', {\r\n        url: '/backend/demo/workflow/queuecontroller',\r\n        success: function (response) {\r\n            if (response.length === 0) {\r\n                $.oc.flashMsg({\r\n                    'text': 'You are not assigned in any queue.',\r\n                    'class': 'info',\r\n                    'interval': 5\r\n                });\r\n                $.oc.stripeLoadIndicator.hide();\r\n                return;\r\n            }\r\n            var options = {};\r\n            for (var i = 0; i < response.length; i++) {\r\n                options[response[i].id] = response[i].name + ' (Total :'+response[i].total+')';\r\n            }\r\n            var form = new EngineForm({\r\n                fields: {\r\n                    queue: {\r\n                        type: 'dropdown',\r\n                        label: 'Queue',\r\n                        span: 'full',\r\n                        emptyOption: '-- select an option --',\r\n                        showSearch: true,\r\n                        options: options,\r\n                    },\r\n                }\r\n            }).build().on('render', function () {\r\n                $.oc.stripeLoadIndicator.hide();\r\n            });\r\n            form.showInPopup({\r\n                size: 'md',\r\n                title: 'Select a Queue',\r\n                actions: [{\r\n                    name: 'queue-selection',\r\n                    label: 'Select',\r\n                    active: true,\r\n                    icon: '',\r\n                    css_class: 'btn btn-primary',\r\n                    handler: function () {\r\n                        $.request('onPickItemFromQueue', {\r\n                            url: '/backend/demo/workflow/QueueController',\r\n                            loading: $.oc.stripeLoadIndicator,\r\n                            data: {\r\n                                queueId: form.getValue('queue')\r\n                            }\r\n                        });\r\n                    }\r\n                }]\r\n            });\r\n        },\r\n    });\r\n}	[{"name":"data-trigger-action","value":"disable"},{"name":"data-trigger","value":".control-list input[type=checkbox]"},{"name":"data-trigger-condition","value":"checked"}]	4f95d22e-7293-4495-81f8-ee194bac2c8b
2020-07-12 11:23:47	2020-07-12 12:55:16	1	1	filter			Demo\\Core\\Models\\UniversalModel	t	<p>Filter</p>	oc-icon-filter	btn mr-0	0	10	function(event){\r\n    var filter = new engine.Filter().build();\r\n    filter.showInPopup({\r\n        size:'lg',\r\n        title: 'Filter', actions: [{\r\n            name: 'apply',\r\n            label: 'Apply',\r\n            active: true,\r\n            icon: '',\r\n            css_class: 'btn btn-primary',\r\n            handler: function (e,popup) {\r\n                Engine.instannce.ui.request('onFilter',{\r\n                    data:{\r\n                        filter: filter.getSQL()\r\n                    },\r\n                });\r\n            }\r\n        }]\r\n    })\r\n}	[]	2741f560-c432-11ea-8b7b-b38010411630
\.


--
-- Data for Name: demo_core_model_associations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_model_associations (created_at, updated_at, created_by_id, updated_by_id, source_model, target_model, foreign_key, cascade, relation, plugin_id, cascade_priority_order, description, name, active, id) FROM stdin;
2019-12-21 11:25:39	2019-12-21 11:25:39	1	1	Demo\\Core\\Models\\ModelAssociation	Demo\\Core\\Models\\Model	source_model	delete	belongs_to	10	0		Model Association Belongs To a Source Model	t	0f599b35-bf20-467f-88b3-9c5763f44718
2019-12-21 11:25:39	2019-12-21 11:25:39	1	1	Demo\\Core\\Models\\ModelAssociation	Demo\\Core\\Models\\Model	target_model	delete	belongs_to	10	0		Model Association Belongs To a Target Model	t	b92dcd89-917e-4f8a-88ba-b2597b646aa6
2019-12-21 11:25:39	2019-12-21 11:25:39	1	1	Demo\\Core\\Models\\EventHandler	Demo\\Core\\Models\\Model	model	delete	belongs_to	10	0		Event Handler Belongs To a Model	t	01c4e11e-79f9-4ae7-84e0-58494d64d8f2
2019-12-21 11:25:39	2019-12-21 11:25:39	1	1	Demo\\Core\\Models\\CustomField	Demo\\Core\\Models\\Model	model	delete	belongs_to	10	0		Custom Field Belongs To a Model	t	2e122d1a-56ec-4d37-a9d7-be70f398ae37
2019-12-21 11:25:39	2019-12-21 11:25:39	1	1	Demo\\Core\\Models\\FormField	Demo\\Core\\Models\\CustomField	field_id	delete	belongs_to	10	0		Custom Field Belongs To a Model	t	32640c85-73af-4bd0-aa55-a6060e17eb75
2019-12-21 11:25:39	2019-12-21 11:25:39	1	1	Demo\\Core\\Models\\RolePolicyAssociation	Demo\\Core\\Models\\Role	role_id	delete	belongs_to	10	0		RolePolicyAssociation Belongs To a Role	t	890bac68-7ecb-48ed-b6eb-cde839128c33
2019-12-21 11:25:39	2019-12-21 11:25:39	1	1	Demo\\Core\\Models\\RolePolicyAssociation	Demo\\Core\\Models\\SecurityPolicy	policy_id	delete	belongs_to	10	0		RolePolicyAssociation Belongs To a SecurityPolicy	t	00d8602e-ba75-4906-b72f-2f2d3c226eca
2019-12-21 11:25:39	2019-12-21 11:25:39	1	1	Demo\\Core\\Models\\PermissionPolicyAssociation	Demo\\Core\\Models\\Permission	permission_id	delete	belongs_to	10	0		PermissionPolicyAssociation Belongs To a Permission	t	a1ef539b-dbcd-4ce7-9826-9baf88edf79c
2019-12-21 11:25:39	2019-12-21 11:25:39	1	1	Demo\\Core\\Models\\PermissionPolicyAssociation	Demo\\Core\\Models\\SecurityPolicy	policy_id	delete	belongs_to	10	0		PermissionPolicyAssociation Belongs To a SecurityPolicy	t	24c4fea3-4bb3-4b2d-867f-4e5fabf83392
2019-12-21 11:25:39	2019-12-21 11:25:39	1	1	Demo\\Workflow\\Models\\QueueItem	Demo\\Workflow\\Models\\Queue	queue_id	delete	belongs_to	11	0		Queue Item Belongs To a Queue	t	6fe2adab-7928-4ba1-8ab2-9084b5402b18
2019-12-21 11:25:39	2019-12-21 11:25:39	1	1	Demo\\Workflow\\Models\\Queue	Demo\\Workflow\\Models\\QueueRoutingRule	routing_rule_id	restrict	belongs_to	11	0		Queue belongs to a Routing Rule	t	6e0bc7ae-fd91-4847-8b41-0ab6162153d5
2019-12-21 11:25:39	2019-12-21 11:25:39	1	1	Demo\\Workflow\\Models\\Queue	Demo\\Workflow\\Models\\Model	model	restrict	belongs_to	11	0		Queue belongs To a Model	t	c29b6d3c-e548-42e3-baee-707228ceb2a5
2019-12-21 11:25:39	2019-12-21 11:25:39	1	1	Demo\\Workflow\\Models\\QueuePopCriteria	Demo\\Workflow\\Models\\Queue	pop_criteria_id	delete	belongs_to	11	0		Queue Belongs To a Pop Criteria	t	6d3770ee-048a-44b1-972e-db4eb3e7c8f6
2019-12-21 11:25:39	2019-12-21 11:25:39	1	1	Demo\\Workflow\\Models\\WorkflowItem	Demo\\Workflow\\Models\\Workflow	workflow_id	restrict	belongs_to	11	0		Workflo Item belongs to a Workflow	t	8b249641-e989-45f2-933b-9aece616278c
2019-12-21 11:25:39	2019-12-21 11:25:39	1	1	Demo\\Workflow\\Models\\WorkflowTransition	Demo\\Workflow\\Models\\WorkflowItem	workflow_item	delete	belongs_to	11	0		Workflow Transition belongs to a WorkflowItem	t	0c65d193-b870-4f68-be2f-7d40deb5df1b
\.


--
-- Data for Name: demo_core_models; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_models (created_at, updated_at, created_by_id, updated_by_id, name, model, controller, plugin_id, audit, record_history, audit_columns, description, attach_audited_by, viewable, id) FROM stdin;
2020-04-26 07:09:40	2020-04-26 07:09:40	1	1	List Action	Demo\\Core\\Models\\ListAction	Demo\\Core\\Controllers\\ListActionController	10	f	f	0		f	t	58500474-fd4d-4bda-a1c4-892f5301e008
2020-04-18 15:35:39	2020-04-18 15:35:39	1	1	Audit Log	Demo\\Core\\Models\\AuditLog	Demo\\Core\\Controllers\\AuditLogController	10	f	f	0		f	f	0d43527c-ba2f-47a8-8b0d-a78eaa2c630d
2019-12-20 14:15:39	2020-06-06 13:53:37	1	1	Inbound Api	Demo\\Core\\Models\\InboundApi	Demo\\Core\\Controllers\\InboundApiController	10	f	f	0		t	f	f9386c03-0314-4fc1-b2db-15dc43e917cf
2019-12-20 14:15:39	2020-06-14 07:08:21	1	1	Model Association	Demo\\Core\\Models\\ModelAssociation	Demo\\Core\\Controllers\\ModelAssociationController	10	f	f	0		t	f	1ee08836-c156-48db-a72f-586b89af118f
2020-04-18 14:53:04	2020-04-18 15:36:42	1	1	Model Model	Demo\\Core\\Models\\ModelModel	Demo\\Core\\Controllers\\ModelController	10	f	f	0		f	f	42f978b1-8e9d-41c5-ba7a-da69c1af7819
2020-04-13 14:06:29	2020-04-13 14:06:29	1	1	Universal	Demo\\Core\\Models\\UniversalModel	Demo\\Core\\Controllers\\UniversalController	10	f	f	0		f	f	e6ce6d2e-148d-466d-9799-508739a32095
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Notification Subscriber	Demo\\Notification\\Models\\NotificationSubscriber	Demo\\Notification\\Controllers\\NotificationSubscriberController	10	f	f	[" * "]	\N	t	f	4bd73094-51ff-47f0-92d8-d31549fd3e78
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Custom Field	Demo\\Core\\Models\\CustomField	Demo\\Core\\Controllers\\CustomFieldController	10	f	f	[" * "]	\N	t	f	2550e0aa-637c-418f-a1b8-e5d9c972e68b
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Form Field	Demo\\Core\\Models\\FormField	Demo\\Core\\Controllers\\FormFieldController	10	f	f	[" * "]	\N	t	f	0e20e8d5-0f54-4352-8fdc-8ee48fd6d005
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Event Handler	Demo\\Core\\Models\\EventHandler	Demo\\Core\\Controllers\\EventHandlerController	10	f	f	[" * "]	\N	t	f	62203afe-185b-40c3-b0fd-d263f1341e0e
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Command	Demo\\Core\\Models\\Command	Demo\\Core\\Controllers\\CommandController	10	f	f	[" * "]	\N	t	f	887d85ea-3f6e-4a62-9f5d-b5a138962b68
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Iframe	Demo\\Core\\Models\\Iframe	Demo\\Core\\Controllers\\IframeController	10	f	f	[" * "]	\N	t	f	79751975-864a-4015-b180-e706acb78593
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Javascript Library	Demo\\Core\\Models\\JavascriptLibrary	Demo\\Core\\Controllers\\JavascriptLibraryController	10	f	f	[" * "]	\N	t	f	de7379fc-82da-4a93-b43f-7cf367df891b
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Webhook	Demo\\Core\\Models\\Webhook	Demo\\Core\\Controllers\\WebhookController	10	f	f	[" * "]	\N	t	f	b1345d69-71f1-4490-8c4a-2141394018f9
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Permission	Demo\\Core\\Models\\Permission	Demo\\Core\\Controllers\\PermissionController	10	f	f	[" * "]	\N	t	f	6a3300da-7e73-4d8a-a6ee-c3a4e542a796
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Security Policy	Demo\\Core\\Models\\SecurityPolicy	Demo\\Core\\Controllers\\SecurityPolicyController	10	f	f	[" * "]	\N	t	f	cd1515c3-05e0-48c5-a8fa-bed69abf1c99
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Security Policy Association	Demo\\Core\\Models\\PermissionPolicyAssociation	Demo\\Core\\Controllers\\PermissionPolicyAssociationController	10	f	f	[" * "]	\N	t	f	f1336bfe-b511-4604-80d4-863856a19988
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Role Policy Association	Demo\\Core\\Models\\RolePolicyAssociation	Demo\\Core\\Controllers\\RolePolicyAssociationController	10	f	f	[" * "]	\N	t	f	359d2111-d338-42bc-a3b3-8251ed0dce3b
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Notification Channel	Demo\\Notification\\Models\\NotificationChannel	Demo\\Notification\\Controllers\\NotificationChannelController	10	f	f	[" * "]	\N	t	f	d393c0d0-86c2-4f9c-9cf7-1b58baac86f0
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Notification	Demo\\Notification\\Models\\Notification	Demo\\Notification\\Controllers\\NotificationController	10	f	f	[" * "]	\N	t	f	ce1f8927-fa3f-4705-b10d-3fafead0e583
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Queue	Demo\\Workflow\\Models\\Queue	Demo\\Workflow\\Controllers\\QueueController	11	f	f	["*"]	\N	t	f	655c489d-961b-458c-b233-ade97b1d2eb4
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Queue Item	Demo\\Workflow\\Models\\QueueItem	Demo\\Workflow\\Controllers\\QueueItemController	11	f	f	["*"]	\N	t	f	bca86a91-3f71-49e9-bf51-72b7003c9571
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Queue Pop Criteria	Demo\\Workflow\\Models\\QueuePopCriteria	Demo\\Workflow\\Controllers\\QueuePopCriteriaController	11	f	f	["*"]	\N	t	f	1a2a24f6-af44-4098-84b8-78f6975e81e9
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Queue Routing Rule	Demo\\Workflow\\Models\\QueueRoutingRule	Demo\\Workflow\\Controllers\\QueueRoutingRuleController	11	f	f	["*"]	\N	t	f	b1981076-db8e-4ed4-a1a0-2d33cda164cd
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Workflow	Demo\\Workflow\\Models\\Workflow	Demo\\Workflow\\Controllers\\WorkflowController	11	f	f	["*"]	\N	t	f	71f9fe3e-a9e1-4496-949c-ea9dda1487b4
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Workflow State	Demo\\Workflow\\Models\\WorkflowState	Demo\\Workflow\\Controllers\\WorkflowStateController	11	f	f	["*"]	\N	t	f	e630f3f9-0603-4a58-a87e-b6fb1cb757eb
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Workflow Transition	Demo\\Workflow\\Models\\WorkflowTransition	Demo\\Workflow\\Controllers\\WorkflowTransitionController	11	f	f	["*"]	\N	t	f	02d0e29d-8263-4967-9f37-3010276a622b
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Webhook	Demo\\Workflow\\Models\\Webhook	Demo\\Workflow\\Controllers\\WebhookController	11	f	f	["*"]	\N	t	f	54f28a49-43ca-48c1-a864-b6fb9e1cc76a
2019-12-20 14:15:39	2020-04-12 13:38:42	1	1	Workflow Item	Demo\\Workflow\\Models\\WorkflowItem	Demo\\Workflow\\Controllers\\WorkflowItemController	11	f	f	["id","created_at","updated_at","0"]		t	f	cf9c3c76-767e-4081-9149-3769465c0fc7
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Widget	Demo\\Report\\Models\\Widget	Demo\\Report\\Controllers\\WidgetController	14	f	f	["*"]	\N	t	f	2992b3f4-859b-41aa-b340-c2ebb85346d3
2020-04-27 11:51:21	2020-04-27 11:55:17	1	1	Project	Demo\\Casemanager\\Models\\Project	Demo\\Casemanager\\Controllers\\ProjectController	6	f	f	0		f	f	34a6cd93-49e4-4dbf-b7d0-e825970d493d
2020-05-17 05:53:01	2020-05-17 05:53:01	1	1	Mail Templates	Demo\\Notification\\Models\\MailTemplate	Demo\\Notification\\Controllers\\MailTemplates	3	f	f	0		f	f	0e210d37-73e2-49b9-b80a-9e3ebd8b1998
2020-05-10 04:11:48	2020-05-10 04:11:48	1	1	groups	Demo\\Core\\Models\\UserGroup	Demo\\Core\\Controllers\\UserGroupController	10	f	f	*		f	f	12ff4f7c-17b1-4510-8fb9-00d93fa1128a
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Dashboard	Demo\\Report\\Models\\Dashboard	Demo\\Report\\Controllers\\DashboardController	14	f	f	["*"]	\N	t	f	04da8041-7f96-4d23-bee5-9ca58dc6d12b
2020-04-27 12:16:53	2020-05-08 08:13:16	1	1	Role	Demo\\Core\\Models\\Role	Demo\\Core\\Controllers\\RoleController	10	f	f	0		f	f	d1dfa6e2-65e9-49de-839d-f2a65c9c19d2
2020-05-10 04:11:48	2020-05-10 04:11:48	1	1	users	Demo\\Core\\Models\\User	Demo\\Core\\Controllers\\UserController	10	f	f	*		f	f	9d9f08c6-32a3-48ce-b172-9bbffb81b4ad
2020-05-10 04:11:48	2020-05-10 04:11:48	1	1	case_priority	Demo\\Casemanager\\Models\\Casepriority	Demo\\Casemanager\\Controllers\\CasepriorityController	10	f	f	*		f	f	94cb17a6-aa2d-4bc4-b603-612e09f39a2f
2020-05-10 04:11:48	2020-05-10 04:11:48	1	1	workflow_transitions	Demo\\Workflow\\Models\\WorkflowTransitions	Demo\\Workflow\\Controllers\\WorkflowTransitionsController	10	f	f	*		f	f	9ad92a08-cf91-47e5-bc59-263614415960
2020-05-10 04:11:48	2020-05-10 04:11:48	1	1	logs	Demo\\Notification\\Models\\NotificationLog	Demo\\Notification\\Controllers\\NotificationLogController	10	f	f	*		f	f	7ccd8ade-691b-47f4-8999-54a616098cf8
2020-05-10 04:11:48	2020-05-10 04:11:48	1	1	user_role_associations	Demo\\Core\\Models\\UserRoleAssociation	Demo\\Core\\Controllers\\UserRoleAssociationController	10	f	f	*		f	f	7ae49b89-62ed-4026-8136-d649a7428d8c
2020-05-10 04:11:48	2020-05-10 04:11:48	1	1	routing_rules	Demo\\Workflow\\Models\\QueueRoutingrule	Demo\\Workflow\\Controllers\\QueueRoutingruleController	10	f	f	*		f	f	51789f2c-c05b-4813-8adb-d98fff1e5d80
2020-04-27 10:59:17	2020-04-27 11:06:05	1	1	Case Priority	Demo\\Casemanager\\Models\\CasePriority	Demo\\Casemanager\\Controllers\\CasePriorityController	6	f	f	0		f	f	31efb248-96f7-40fa-aa07-56838b66dfab
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	User	Demo\\Core\\Models\\CoreUser	Demo\\Core\\Controllers\\UserController	10	f	f	[" * "]	\N	t	f	bc6274fa-a406-4410-8749-de61e8cd7ab5
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	User	Demo\\Core\\Models\\CoreUserGroup	Demo\\Core\\Controllers\\UserGroupController	10	f	f	[" * "]	\N	t	f	8eb30d4a-48bd-4ca7-b848-d9245be0d63d
2020-04-26 07:16:16	2020-04-26 07:16:16	1	1	Form Action	Demo\\Core\\Models\\FormAction	Demo\\Core\\Controllers\\FormActionController	10	f	f	0		f	t	a24b1957-9aa4-462c-a5b0-e3fa356a25c1
2019-12-20 14:15:39	2020-06-01 13:38:12	1	1	Case Model	Demo\\Casemanager\\Models\\CaseModel	Demo\\Casemanager\\Controllers\\CaseController	6	t	f	["case_number","case_version","description","priority_id","suspect","tat_duration","title"]		t	f	a32f3a77-e9ef-4366-9a62-ff9c2275ada3
2020-05-10 05:15:28	2020-05-10 05:15:28	1	1	Navigation Role Association	Demo\\Core\\Models\\NavigationRoleAssociation	Demo\\Core\\Controllers\\NavigationRoleAssociationController	10	f	f	0		f	f	eff49bc7-518a-4b08-94ec-265d854e1f1a
2020-05-26 14:00:24	2020-05-26 14:00:24	1	1	Setting	System\\Models\\Parameter	Demo\\Core\\Controllers\\SettingController	10	f	f	0		f	f	9acbce33-243a-4362-a3f6-bf3eaf45fa3e
2020-05-09 11:25:29	2020-05-10 16:00:23	1	1	Navigation	Demo\\Core\\Models\\Navigation	Demo\\Core\\Controllers\\NavigationController	10	f	f	["*"]		f	f	90ba5e4a-f8c9-4cbd-a475-c2d7a6b534cd
2020-05-16 05:56:51	2020-05-16 05:56:51	1	1	UI Page	Demo\\Core\\Models\\UiPage	Demo\\Core\\Controllers\\UiPageController	10	f	f	0		f	f	5994e845-740a-431b-8adb-7def380ebbc2
2020-05-17 05:46:59	2020-05-17 05:46:59	1	1	Mail Brand Setting	Demo\\Notification\\Models\\MailBrandSetting	Demo\\Notification\\Controllers\\MailBrandSetting	3	f	f	0		f	f	497b52bf-f370-4ef4-92de-5b6802d7f7c9
2020-05-17 05:47:53	2020-05-17 05:47:53	1	1	Mail Layouts	Demo\\Notification\\Models\\MailLayout	Demo\\Notification\\Controllers\\MailLayouts	3	f	f	0		f	f	d4b21a16-1e18-42f4-8efc-36fde559c739
2020-05-17 05:52:11	2020-05-17 05:52:11	1	1	Mail Partial	Demo\\Notification\\Models\\MailPartial	Demo\\Notification\\Controllers\\MailPartials	3	f	f	0		f	f	f8506ae5-277a-4a14-8d91-8412d9d27650
2020-05-29 08:12:47	2020-05-29 08:12:47	1	1	Service Channel	Demo\\Workflow\\Models\\ServiceChannel	Demo\\Workflow\\Controllers\\ServiceChannelController	14	f	f	0		f	f	032584e9-f55f-4a0b-8451-b451f236726b
\.


--
-- Data for Name: demo_core_navigations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_navigations (created_at, updated_at, created_by_id, updated_by_id, version, label, type, active, name, description, url, model, view, form, plugin_id, sort_order, icon, id, record_id, parent_id, dashboard_id, widget_id, uipage_id) FROM stdin;
\N	2020-06-07 06:06:04	1	1	\N	Case Priority	list	t	case_priority			Demo\\Casemanager\\Models\\Casepriority		\N	10	1	oc-icon-adjust	d965a574-969f-40cf-a735-524cdacfe676	\N	3280cd3c-8a95-4683-b661-7846bc9fdf03	\N	\N	\N
2020-05-09 15:07:01	2020-06-15 16:49:48	1	1	\N	Security	folder	t	security			\N			10	2	oc-icon-folder	ede0b65d-15ca-43a2-ab83-11643c154327	\N	03b0b444-c20a-4480-8549-67bab2b176f3	\N	\N	\N
2020-05-09 15:11:36	2020-05-09 15:11:36	1	1	\N	Reports	folder	t	reports			\N	\N		10	4	oc-icon-folder	139f4d70-98d4-492d-84ab-99eabb2e2865	\N	\N	\N	\N	\N
2020-05-09 11:33:08	2020-05-09 15:32:33	1	1	\N	Engine	folder	t	engine			\N	\N		10	1	oc-icon-folder	c1021025-5a8e-4344-af1e-178dd1d1d29e	\N	03b0b444-c20a-4480-8549-67bab2b176f3	\N	\N	\N
\N	\N	1	1	\N	Model Association	list	t	model_association	\N	\N	Demo\\Core\\Models\\ModelAssociation	\N	\N	10	2	icon-puzzle-piece	05e13a5f-d931-4328-84ed-100acf537174	\N	c1021025-5a8e-4344-af1e-178dd1d1d29e	\N	\N	\N
2020-05-09 11:48:03	2020-05-09 11:48:03	1	1	\N	Models	list	t	models			Demo\\Core\\Models\\ModelModel	\N		10	0	oc-icon-table	6dfa72ba-9fe1-4d81-aed2-dc945f0ef502	\N	c1021025-5a8e-4344-af1e-178dd1d1d29e	\N	\N	\N
\N	\N	1	1	\N	Commands	list	t	commands	\N	\N	Demo\\Core\\Models\\Command	\N	\N	10	7	icon-terminal	85546192-4e1a-4dea-95fe-b8ebcc758b0d	\N	c1021025-5a8e-4344-af1e-178dd1d1d29e	\N	\N	\N
\N	\N	1	1	\N	Webhooks	list	t	webhooks	\N	\N	Demo\\Core\\Models\\Webhook	\N	\N	10	9	icon-chain	336cc40e-0020-4959-9dfe-190f6907c80c	\N	c1021025-5a8e-4344-af1e-178dd1d1d29e	\N	\N	\N
\N	\N	1	1	\N	Users	list	t	users	\N	\N	Demo\\Core\\Models\\User	\N	\N	10	0	icon-user	1e73e4d1-f263-4744-a537-ab2d22d90e3c	\N	ede0b65d-15ca-43a2-ab83-11643c154327	\N	\N	\N
\N	\N	1	1	\N	Roles	list	t	roles	\N	\N	Demo\\Core\\Models\\Role	\N	\N	10	1	icon-suitcase	15264ae2-d1b0-43f7-87fe-eda08a884bb0	\N	ede0b65d-15ca-43a2-ab83-11643c154327	\N	\N	\N
\N	\N	1	1	\N	Permissions	list	t	permissions	\N	\N	Demo\\Core\\Models\\Permission	\N	\N	10	3	icon-key	be77fb91-0909-40fe-8e23-7d094adcbd09	\N	ede0b65d-15ca-43a2-ab83-11643c154327	\N	\N	\N
\N	\N	1	1	\N	Notifications	list	t	notifications	\N	\N	Demo\\Notification\\Models\\Notification	\N	\N	10	1	icon-comment	be560371-c757-49b5-b1e1-8497c9150a3e	\N	43098bfd-5bf8-4979-a9b4-1fb837f327f3	\N	\N	\N
\N	\N	1	1	\N	Dashboards	list	t	dashboards	\N	\N	Demo\\Report\\Models\\Dashboard	\N	\N	10	0	icon-tachometer	1b4aebe2-66f2-4984-a3d0-f69c3cfb90fc	\N	139f4d70-98d4-492d-84ab-99eabb2e2865	\N	\N	\N
\N	\N	1	1	\N	Widgets	list	t	widgets	\N	\N	Demo\\Report\\Models\\Widget	\N	\N	10	1	icon-codepen	0ca975a1-b152-4289-a5aa-2d4b2453a95a	\N	139f4d70-98d4-492d-84ab-99eabb2e2865	\N	\N	\N
\N	\N	1	1	\N	Workflows	list	t	workflows	\N	\N	Demo\\Workflow\\Models\\Workflow	\N	\N	10	0	icon-recycle	84398af6-6036-43ed-b987-8f11ffb7057e	\N	492e6fda-26f4-4115-aff6-b771a7220e46	\N	\N	\N
\N	\N	1	1	\N	Pop Criteria	list	t	pop_criteria	\N	\N	Demo\\Workflow\\Models\\QueuePopCriteria	\N	\N	10	8	icon-code	2b9c5851-39a1-4c32-9bb9-b51958fdeee8	\N	492e6fda-26f4-4115-aff6-b771a7220e46	\N	\N	\N
\N	\N	1	1	\N	Role Policy Associations	list	t	role_policy_associations	\N	\N	Demo\\Core\\Models\\RolePolicyAssociation	\N	\N	10	6	icon-dot-circle-o	bd770875-29b9-496e-afe0-44d8f777c4ed	\N	ede0b65d-15ca-43a2-ab83-11643c154327	\N	\N	\N
\N	2020-05-16 06:05:13	1	1	\N	Iframe	list	t	iframe			Demo\\Core\\Models\\Iframe	\N		10	8	oc-icon-adjust	a5c69317-c4fd-4618-a92b-cff6a1f1da2f	\N	529c983e-43eb-4c04-b89f-24ac65ab4356	\N	\N	\N
\N	2020-05-16 06:05:32	1	1	\N	Navigations	list	t	navigations			Demo\\Core\\Models\\Navigation	\N		10	1	oc-icon-adjust	8d1a72d6-e7b4-49d0-a0b0-c1d1be57f044	\N	529c983e-43eb-4c04-b89f-24ac65ab4356	\N	\N	\N
\N	2020-05-16 07:44:41	1	1	\N	Queues	list	t	queues			Demo\\Workflow\\Models\\Queue	\N		11	5	oc-icon-adjust	1167df07-11a5-467e-af94-28257f1bf241	\N	492e6fda-26f4-4115-aff6-b771a7220e46	\N	\N	\N
\N	2020-05-16 06:05:20	1	1	\N	Form Fields	list	t	form_fields			Demo\\Core\\Models\\FormField	\N		10	4	oc-icon-adjust	35e67af3-a99d-4be8-bfc9-ee75e912d8b1	\N	529c983e-43eb-4c04-b89f-24ac65ab4356	\N	\N	\N
2020-05-16 06:47:21	2020-05-16 06:47:21	1	1	\N	Page -Hello World	uipage	t	page-hello-world			\N	\N		10	15	oc-icon-child	bae0b847-c210-4b91-89f7-e1f4117b1987	\N	529c983e-43eb-4c04-b89f-24ac65ab4356	\N	\N	\N
2020-05-16 14:51:56	2020-05-16 14:51:56	1	1	\N	Pages	list	t	pages			Demo\\Core\\Models\\UiPage	\N		10	5	oc-icon-codepen	9ee0e7d0-43e9-4d8a-be8a-9d0606437956	\N	529c983e-43eb-4c04-b89f-24ac65ab4356	\N	\N	\N
2020-05-10 10:28:19	2020-05-16 14:59:12	1	1	2	Youtube	url	t	youtube		https://www.youtube.com/embed/RBumgq5yVrA	Demo\\Report\\Models\\Dashboard	\N		6	5	oc-icon-adjust	ed44650b-b008-456c-85de-adc1270cfbed	\N	3280cd3c-8a95-4683-b661-7846bc9fdf03	\N	\N	\N
2020-05-17 06:17:22	2020-05-17 06:17:22	1	1	\N	Templates	list	t	templates			Demo\\Notification\\Models\\MailTemplate	\N		3	4	oc-icon-file-code-o	9ab44ba4-d108-437f-8025-b999fcffa10c	\N	43098bfd-5bf8-4979-a9b4-1fb837f327f3	\N	\N	\N
2020-05-09 15:09:59	2020-05-16 14:23:03	1	1	\N	Notification	folder	t	notification			\N	\N		3	3	oc-icon-folder	43098bfd-5bf8-4979-a9b4-1fb837f327f3	\N	\N	\N	\N	\N
2020-05-09 15:13:06	2020-05-16 14:24:22	1	1	\N	Workflow	folder	t	workflow			\N	\N		11	5	oc-icon-folder	492e6fda-26f4-4115-aff6-b771a7220e46	\N	\N	\N	\N	\N
\N	\N	1	1	\N	Audit Logs	list	t	audit_logs	\N	\N	Demo\\Core\\Models\\AuditLog	\N	\N	10	13	icon-file-archive-o	fcfcb7de-516c-415a-8ddd-3b7392c3c37f	\N	c1021025-5a8e-4344-af1e-178dd1d1d29e	\N	\N	\N
\N	\N	1	1	\N	Event Handler	list	t	event_handler	\N	\N	Demo\\Core\\Models\\EventHandler	\N	\N	10	5	icon-code	3004557a-c1b4-41c6-b4e3-3d0a4de1a52a	\N	c1021025-5a8e-4344-af1e-178dd1d1d29e	\N	\N	\N
2020-05-09 15:27:27	2020-05-16 14:23:48	1	1	\N	Main	folder	f	main			\N	\N		10	3	oc-icon-folder	1836974e-0ea8-438a-9054-d4a42692cf94	\N	\N	\N	\N	\N
\N	\N	1	1	\N	Workflow Transitions	list	t	workflow_transitions	\N	\N	Demo\\Workflow\\Models\\WorkflowTransitions	\N	\N	10	2	icon-long-arrow-right	47fe334b-d0da-4d4f-b9a7-9b9a6e59b1b2	\N	492e6fda-26f4-4115-aff6-b771a7220e46	\N	\N	\N
\N	\N	1	1	\N	Logs	list	t	logs	\N	\N	Demo\\Notification\\Models\\NotificationLog	\N	\N	10	3	icon-file	a29b979e-dcf0-4fef-9b58-cbaccecedc92	\N	43098bfd-5bf8-4979-a9b4-1fb837f327f3	\N	\N	\N
\N	\N	1	1	\N	User Role Associations	list	t	user_role_associations	\N	\N	Demo\\Core\\Models\\UserRoleAssociation	\N	\N	10	7	icon-user-plus	a541a960-fc25-48a7-b498-8443b2715bf5	\N	ede0b65d-15ca-43a2-ab83-11643c154327	\N	\N	\N
\N	\N	1	1	\N	Routing Rules	list	t	routing_rules	\N	\N	Demo\\Workflow\\Models\\QueueRoutingrule	\N	\N	10	7	icon-share-alt	bcd5d88e-e08f-47e0-a377-5761c8cc3754	\N	492e6fda-26f4-4115-aff6-b771a7220e46	\N	\N	\N
\N	\N	1	1	\N	Policy Permissions	list	t	policy_permissions	\N	\N	Demo\\Core\\Models\\SecurityPolicy	\N	\N	10	5	icon-sitemap	530b5272-a8a3-43cd-af15-8ea6a8a7c822	\N	ede0b65d-15ca-43a2-ab83-11643c154327	\N	\N	\N
\N	2020-06-06 13:24:10	1	1	\N	Projects	list	t	projects			Demo\\Casemanager\\Models\\Project		\N	10	2	oc-icon-adjust	016140c0-a7f9-11ea-a09c-77440aa34325	\N	3280cd3c-8a95-4683-b661-7846bc9fdf03	\N	\N	\N
\N	2020-06-06 13:27:49	1	1	\N	Workflow States	list	t	workflow_states			Demo\\Workflow\\Models\\WorkflowState		\N	10	3	oc-icon-adjust	fdf384c5-bdb6-4294-81a4-af302b12b332	\N	492e6fda-26f4-4115-aff6-b771a7220e46	\N	\N	\N
2020-05-18 04:33:41	2020-06-07 06:06:12	1	1	\N	My Cases	list	t	my-cases		list=mycases	Demo\\Casemanager\\Models\\CaseModel			6	0	oc-icon-briefcase	c3984be1-820c-4cc8-a675-742815313468	\N	3280cd3c-8a95-4683-b661-7846bc9fdf03	\N	\N	\N
2020-05-09 15:23:48	2020-05-29 07:56:04	1	1	\N	System	folder	t	system			\N			10	1	oc-icon-folder	03b0b444-c20a-4480-8549-67bab2b176f3	\N	\N	\N	\N	\N
\N	2020-06-07 06:06:40	1	1	\N	All Cases	list	t	all-cases			Demo\\Casemanager\\Models\\CaseModel			6	0	oc-icon-ambulance	01f868fa-2ac6-42c1-b5e0-030df343dd31	\N	3280cd3c-8a95-4683-b661-7846bc9fdf03	\N	\N	\N
2020-05-09 15:16:49	2020-06-07 06:06:48	1	1	\N	Case Management	folder	t	case-management			\N			10	6	oc-icon-folder	3280cd3c-8a95-4683-b661-7846bc9fdf03	\N	7ffd7ee5-deb5-41af-876f-6bac700a35be	\N	\N	\N
2020-05-09 15:28:15	2020-06-07 06:06:56	1	1	\N	Workspace	folder	t	workspace			\N			10	10	oc-icon-folder	7ffd7ee5-deb5-41af-876f-6bac700a35be	\N	\N	\N	\N	\N
\N	\N	1	1	\N	Policies	list	t	policies	\N	\N	Demo\\Core\\Models\\SecurityPolicy	\N	\N	10	2	icon-circle-o-notch	6adbdf35-29f5-468f-8d0d-4e3003f298d0	\N	ede0b65d-15ca-43a2-ab83-11643c154327	\N	\N	\N
\N	\N	1	1	\N	Channels	list	t	channels	\N	\N	Demo\\Notification\\Models\\NotificationChannel	\N	\N	10	0	icon-signal	211608c8-5b81-47bf-8757-8c39889924b7	\N	43098bfd-5bf8-4979-a9b4-1fb837f327f3	\N	\N	\N
\N	\N	1	1	\N	Service Channel	list	t	service_channel	\N	\N	Demo\\Workflow\\Models\\ServiceChannel	\N	\N	10	4	icon-sitemap	1f280b8a-9dbd-4b58-a295-59c0740b315d	\N	492e6fda-26f4-4115-aff6-b771a7220e46	\N	\N	\N
\N	\N	1	1	\N	Notification Subscribers	list	t	notification_subscribers	\N	\N	Demo\\Notification\\Models\\NotificationSubscriber	\N	\N	10	2	icon-users	93b19b14-276d-4422-b2d4-3d4fb869de0c	\N	43098bfd-5bf8-4979-a9b4-1fb837f327f3	\N	\N	\N
\N	\N	1	1	\N	Inbound Api	list	t	inbound_api	\N	\N	Demo\\Core\\Models\\InboundApi	\N	\N	10	6	icon-space-shuttle	06df55ff-f6c2-4b71-8493-c4b74f75b640	\N	c1021025-5a8e-4344-af1e-178dd1d1d29e	\N	\N	\N
\N	\N	1	1	\N	Queue Items	list	t	queue_items	\N	\N	Demo\\Workflow\\Models\\QueueItem	\N	\N	10	6	icon-stack-exchange	d044112f-9928-4685-b9c5-acb536b15a84	\N	492e6fda-26f4-4115-aff6-b771a7220e46	\N	\N	\N
\N	\N	1	1	\N	Groups	list	t	groups	\N	\N	Demo\\Core\\Models\\UserGroup	\N	\N	10	4	icon-users	5bec7e75-a7ff-48f0-8c90-03123697af4d	\N	ede0b65d-15ca-43a2-ab83-11643c154327	\N	\N	\N
\N	\N	1	1	\N	Workflow Items	list	t	workflow_items	\N	\N	Demo\\Workflow\\Models\\WorkflowItem	\N	\N	10	1	icon-tag	5080c46a-c9d4-45dc-93d0-8835e4731f4d	\N	492e6fda-26f4-4115-aff6-b771a7220e46	\N	\N	\N
\N	\N	1	1	\N	Fields	list	t	fields	\N	\N	Demo\\Core\\Models\\CustomField	\N	\N	10	3	icon-th-list	e149e54e-ddcb-4b1b-b80b-2c37755ad953	\N	c1021025-5a8e-4344-af1e-178dd1d1d29e	\N	\N	\N
\N	2020-05-16 06:04:57	1	1	\N	List Actions	list	t	list_actions			Demo\\Core\\Models\\ListAction	\N		10	12	oc-icon-adjust	dcbc468c-12c8-4f92-b57c-6f05d092b1c1	\N	529c983e-43eb-4c04-b89f-24ac65ab4356	\N	\N	\N
\N	2020-05-16 06:05:03	1	1	\N	Form Actions	list	t	form_actions			Demo\\Core\\Models\\FormAction	\N		10	11	oc-icon-adjust	7b2d4011-b582-457e-8549-637b0a61f93b	\N	529c983e-43eb-4c04-b89f-24ac65ab4356	\N	\N	\N
\N	2020-05-16 06:05:07	1	1	\N	Libraries	list	t	libraries			Demo\\Core\\Models\\JavascriptLibrary	\N		10	10	oc-icon-adjust	485ac274-9ef0-45fa-87f7-1e77a8f6b234	\N	529c983e-43eb-4c04-b89f-24ac65ab4356	\N	\N	\N
2020-05-13 04:37:14	2020-06-14 06:00:06	1	1	\N	Case Report	widget	t	case-report			\N			6	0	oc-icon-book	6f85afbb-3858-4387-b4ce-9f70cf19ed20	\N	3280cd3c-8a95-4683-b661-7846bc9fdf03	\N	84383d11-89c6-4dac-906c-bb2b08923b53	\N
2020-05-09 15:26:31	2020-05-16 14:23:26	1	1	\N	Messaging	folder	f	messaging			\N	\N		10	2	oc-icon-folder	88a02697-074c-4dfc-9e7c-5dd964901e21	\N	\N	\N	\N	\N
2020-05-16 06:02:40	2020-05-16 06:02:40	1	1	\N	User Interface	folder	t	user-interface			\N	\N		10	2	oc-icon-folder	529c983e-43eb-4c04-b89f-24ac65ab4356	\N	03b0b444-c20a-4480-8549-67bab2b176f3	\N	\N	\N
2020-05-13 04:38:17	2020-06-20 06:33:23	1	1	\N	Dashboard	dashboard	t	dashboard			\N			6	4	oc-icon-dashboard	81d30c41-fd09-4757-a6f9-e92463faf8bc	\N	3280cd3c-8a95-4683-b661-7846bc9fdf03	cc326831-e515-44a8-8eb8-b23b8fa8fdaa	\N	\N
\.


--
-- Data for Name: demo_core_permission_policy_associations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_permission_policy_associations (created_at, updated_at, created_by_id, updated_by_id, plugin_id, id, permission_id, policy_id) FROM stdin;
2020-04-26 07:09:40	2020-04-26 07:09:40	1	1	2	8ba81c03-f434-41c9-9c46-6bee6d5e8eeb	8310cc31-dd04-424f-8a54-9a2c92a088e1	22ba842b-7972-4ccd-825b-c9659d4e7465
2020-04-26 07:09:40	2020-04-26 07:09:40	1	1	2	e14f0cfe-5021-4992-8f73-fd322466b5ae	a48f2b53-19c0-4121-b501-b58a624935bc	22ba842b-7972-4ccd-825b-c9659d4e7465
2020-04-26 07:09:40	2020-04-26 07:09:40	1	1	2	31324d9e-97be-4364-a035-41c0a4aff53e	0450167e-8449-4f5b-a9e3-048391c99e97	22ba842b-7972-4ccd-825b-c9659d4e7465
2020-04-26 07:09:40	2020-04-26 07:09:40	1	1	2	5b00103e-dd4f-49ad-9851-24077c52354b	33f61906-9d7a-4e08-ac91-eb653fea8270	22ba842b-7972-4ccd-825b-c9659d4e7465
2020-04-26 07:09:40	2020-04-26 07:09:40	1	1	2	2f6149d7-f3ca-4891-a35f-1f35b8c65486	a987b529-da3d-4148-9dd3-606e1227b5a8	22ba842b-7972-4ccd-825b-c9659d4e7465
2020-04-27 10:59:16	2020-04-27 10:59:16	1	1	6	67581199-e83d-46bd-bd92-1e460b2f9dd4	35fce9b9-8b6a-4a92-a214-6d4e554f1e81	0dcd7801-d4ae-439d-907d-950b72a9f24d
2020-04-27 10:59:16	2020-04-27 10:59:16	1	1	6	787477ce-e48d-4599-ada9-0fc0f6ad0c0e	b4e3b6cb-ebb1-4fbc-bc65-f59a2008da61	0dcd7801-d4ae-439d-907d-950b72a9f24d
2020-04-27 10:59:16	2020-04-27 10:59:16	1	1	6	486dfb69-5b72-418f-903e-ffc9405ca949	58faebcc-6b97-4b46-9e9e-0070f1556837	0dcd7801-d4ae-439d-907d-950b72a9f24d
2020-04-27 10:59:17	2020-04-27 10:59:17	1	1	6	d4954d73-557b-44ad-acdf-b241446c3473	50880924-3110-478c-b01b-63c5c456edeb	0dcd7801-d4ae-439d-907d-950b72a9f24d
2020-04-06 07:56:24	2020-04-06 07:56:24	1	1	6	e0c0ab2b-702b-4f1a-938c-cc2e88430c76	973f538e-62d3-4570-90d1-0310970e3046	694b6dcf-0017-4013-bc71-c7d71dae6a3a
2020-04-06 07:56:24	2020-04-06 07:56:24	1	1	6	42f94486-0be0-4147-8bea-3239fba28929	687046cf-9692-4292-ad35-efce1aaf42d4	694b6dcf-0017-4013-bc71-c7d71dae6a3a
2020-04-06 07:56:24	2020-04-06 07:56:24	1	1	6	7996970e-e126-4cb0-890d-52c4e9978279	dab8870c-1ba8-4846-b9b7-00bbd39ec3a4	694b6dcf-0017-4013-bc71-c7d71dae6a3a
2020-04-26 07:16:15	2020-04-26 07:16:15	1	1	2	bf95b6c4-a5c5-41db-9235-85fe749a7c75	1ffe9bfb-58ff-477b-a656-36cc4e2cce04	f7d2748b-a40e-44cc-bbc3-ef17bbd82077
2020-04-26 07:16:16	2020-04-26 07:16:16	1	1	2	ad1da32d-cd35-4485-8794-2a7a21e70ddc	01f62d21-e9dd-4c96-bdf5-ec1543ee0639	f7d2748b-a40e-44cc-bbc3-ef17bbd82077
2020-04-26 07:16:16	2020-04-26 07:16:16	1	1	2	e3ed4bfa-421c-4db5-881f-b9f9e1b40869	2c27bd90-7a26-4e9d-960c-35742b63cc17	f7d2748b-a40e-44cc-bbc3-ef17bbd82077
2020-04-26 07:16:16	2020-04-26 07:16:16	1	1	2	9e5df362-eaed-4d6b-9a6f-8ab3a67dbd26	772ae40c-ff97-4ede-bda7-6d8cd0441e92	f7d2748b-a40e-44cc-bbc3-ef17bbd82077
2020-04-26 07:16:16	2020-04-26 07:16:16	1	1	2	3ea2cfa1-8930-4f02-a9fd-e4fe4ac197fb	91e26c0b-ae0c-4411-8821-b9812a4d8b41	f7d2748b-a40e-44cc-bbc3-ef17bbd82077
2020-04-06 07:56:24	2020-04-06 07:56:24	1	1	6	75366ff5-4245-43e0-85cf-daa491b283ab	36edd8af-c53b-4f2b-9fb7-461f741a7676	694b6dcf-0017-4013-bc71-c7d71dae6a3a
2020-04-06 07:58:19	2020-04-06 07:58:19	1	1	6	01435073-e0a3-4c82-9a89-09972e76083a	df0f2fe6-9528-421b-8462-81491b982d82	7d48cc5f-ae88-47fa-a29e-5566e08fe187
2020-04-06 07:58:19	2020-04-06 07:58:19	1	1	6	02b5491f-3570-4e80-b98b-4f25ad3e4570	f20adac9-f180-4720-b892-b58cf18f3166	7d48cc5f-ae88-47fa-a29e-5566e08fe187
2020-04-06 07:58:19	2020-04-06 07:58:19	1	1	6	7698cecd-fd07-407e-b753-3a9783dd620b	167aea1d-751c-4064-b7b4-b7a9a7e474ac	7d48cc5f-ae88-47fa-a29e-5566e08fe187
2020-05-17 05:47:53	2020-05-17 05:47:53	1	1	3	184216ef-08e4-4cf8-aa62-7b65d126eff3	4537497b-b519-44d4-9f2a-bb37e102ad31	ccb4059f-d21c-4e9a-9a33-ede9a46b3291
2020-05-17 05:47:53	2020-05-17 05:47:53	1	1	3	72105d80-17fd-405e-9375-8e524b83162d	41152b61-10bd-4e93-baaa-515b7ee8b1d9	ccb4059f-d21c-4e9a-9a33-ede9a46b3291
2020-05-17 05:52:10	2020-05-17 05:52:10	1	1	3	ae690372-6d82-44a9-9179-0f92fec7434d	87e96f3e-0bba-443a-b420-57278b4ed0e7	c789ebf5-15b8-47fe-94b3-52a2b78c1397
2020-05-17 05:52:11	2020-05-17 05:52:11	1	1	3	993298aa-f2d9-4639-9eaf-061b85d5e9cb	56353b9f-78b8-480a-909a-ed0d6641b6c9	c789ebf5-15b8-47fe-94b3-52a2b78c1397
2020-05-17 05:52:11	2020-05-17 05:52:11	1	1	3	4d4aea7c-0441-4da4-a7dc-39f5479cd3e8	9f7304df-5b8e-4fa1-91a3-96a1d5d00df8	c789ebf5-15b8-47fe-94b3-52a2b78c1397
2020-05-17 05:52:11	2020-05-17 05:52:11	1	1	3	b036b07b-a7e5-4f37-9e0a-3de849ad1c23	6cf18928-ad33-440e-b7b9-61cd43554ed9	c789ebf5-15b8-47fe-94b3-52a2b78c1397
2020-05-17 05:53:01	2020-05-17 05:53:01	1	1	3	5f704a75-94e9-4ae2-9dbc-c27bad9bd6d2	8a4f3d17-7b60-4f64-b360-977892c78bcc	d1b96d4c-11d9-4450-bf3f-d6a387cecbc9
2020-05-17 05:53:01	2020-05-17 05:53:01	1	1	3	dabf8aa8-edd1-4d5d-a2b1-b27758a39f06	ce0238d2-5a0d-487e-b323-665b1d81c7e4	d1b96d4c-11d9-4450-bf3f-d6a387cecbc9
2020-05-17 05:53:01	2020-05-17 05:53:01	1	1	3	ba063af8-7a46-4397-928c-ea11ed1b8cc8	24e2709c-4cb9-481c-b3bf-b08d8a62f427	d1b96d4c-11d9-4450-bf3f-d6a387cecbc9
2020-05-17 05:53:01	2020-05-17 05:53:01	1	1	3	b91a9ec0-f82a-49d3-b3b7-049e63ba3a7c	134dab70-f285-42d7-b0ff-7167e2acbe35	d1b96d4c-11d9-4450-bf3f-d6a387cecbc9
2020-05-26 14:00:23	2020-05-26 14:00:23	1	1	10	9d10e6d1-3015-487d-89d8-0c7e968603a8	cdd20bc9-83a0-4868-b25b-5cf3a44e422f	dca386f7-4def-4739-8942-52d494d3be01
2020-05-26 14:00:24	2020-05-26 14:00:24	1	1	10	bc1b3c50-7cec-4cd2-8a72-23ac975b54b2	b4631adf-9c69-4c5d-a938-d002947e940d	dca386f7-4def-4739-8942-52d494d3be01
2020-05-26 14:00:24	2020-05-26 14:00:24	1	1	10	8968f76a-f759-49d4-a207-17853a89c45d	a553449e-af5f-4e20-a1e8-b18ef4f38e56	dca386f7-4def-4739-8942-52d494d3be01
2020-05-26 14:00:24	2020-05-26 14:00:24	1	1	10	37feb9b0-09d3-407c-aea6-d3c8cd973c12	50ce192e-6999-4acb-95bb-929058b1dcf4	dca386f7-4def-4739-8942-52d494d3be01
2020-05-29 08:12:46	2020-05-29 08:12:46	1	1	14	705fd029-4de5-48af-834c-27006980f647	9f626681-b9be-439a-9b3d-451dbef42196	1bb91fca-e15a-4fb7-b176-0be599769c86
2020-05-29 08:12:46	2020-05-29 08:12:46	1	1	14	178d621e-9dfb-4a81-aa26-55bebf969f59	19e19159-28a0-4fa6-9c6c-d7b3881646c2	1bb91fca-e15a-4fb7-b176-0be599769c86
2020-05-29 08:12:46	2020-05-29 08:12:46	1	1	14	4b85fa8e-04f6-4fb6-afdd-5a6178b8e03d	c91090cd-d197-4fc0-ad11-ca96eff84cd7	1bb91fca-e15a-4fb7-b176-0be599769c86
2020-05-29 08:12:47	2020-05-29 08:12:47	1	1	14	0710e033-7506-4b56-922f-2cf3eaa910c9	13647c7a-fb93-42b4-8e72-14abd3efcee2	1bb91fca-e15a-4fb7-b176-0be599769c86
2020-04-06 07:58:19	2020-04-06 07:58:19	1	1	6	0f48afa9-1fa6-4293-8f99-0cba3214bcf8	9662eafc-606b-4108-b60a-28554776a560	7d48cc5f-ae88-47fa-a29e-5566e08fe187
2020-04-06 07:18:47	2020-04-06 07:18:47	6	6	14	30138d33-6050-42a9-a0e1-24053d875605	a70dbd44-6388-4c3c-b350-bd5e2985703a	1fcbb601-df64-4947-b1ca-e277326b5ef0
2020-04-06 07:18:47	2020-04-06 07:18:47	6	6	14	39b9920c-fb2a-433c-a9cb-f5033755018f	b332dfde-b251-46fc-9869-c528283dc6ae	1fcbb601-df64-4947-b1ca-e277326b5ef0
2020-04-27 11:51:21	2020-04-27 11:51:21	1	1	6	f8849559-4a6b-4d45-8ac1-3bdcaafe9713	b6ccd813-b2c9-4df1-961c-04df2031a3a9	b70d97bf-4ef2-4fa1-bc21-332b0bf6aef9
2020-04-27 11:51:21	2020-04-27 11:51:21	1	1	6	e7f1da3f-8a84-4666-b074-d78f750b52c8	9dd592de-c8bf-4c60-ae3f-5b48a49ed314	b70d97bf-4ef2-4fa1-bc21-332b0bf6aef9
2020-04-27 11:51:21	2020-04-27 11:51:21	1	1	6	e83ae886-96bf-44af-a4a2-79e612f0d308	2fe02db1-77fd-43eb-9cb6-e1c84b44bf7b	b70d97bf-4ef2-4fa1-bc21-332b0bf6aef9
2020-04-27 11:51:21	2020-04-27 11:51:21	1	1	6	28db10b3-bd87-453b-abcf-dd90ea00e201	c17220cd-f6f5-4912-9dfd-5045a93604a9	b70d97bf-4ef2-4fa1-bc21-332b0bf6aef9
2020-04-27 12:16:52	2020-04-27 12:16:52	1	1	10	1aa6574b-0e6b-4006-abe5-24226b11ba93	7525ccf2-f3eb-481f-a4fa-7bfabe6727a8	6613e84f-9a84-47e3-b5bf-c63879565291
2020-04-27 12:16:53	2020-04-27 12:16:53	1	1	10	92be9a14-e47a-430d-93ab-48686dbea1f3	3738376a-c035-435f-9534-7c0058524f79	6613e84f-9a84-47e3-b5bf-c63879565291
2020-04-27 12:16:53	2020-04-27 12:16:53	1	1	10	4ade16e6-e40d-4c21-a40d-3b5467e0439f	dd05044e-0d55-490c-b8d2-a3e7ae96d33f	6613e84f-9a84-47e3-b5bf-c63879565291
2020-04-27 12:16:53	2020-04-27 12:16:53	1	1	10	65b4def0-247a-41cc-bbf0-516f0f0f506a	d346ba98-9642-4f83-b4cd-5cb2b344d911	6613e84f-9a84-47e3-b5bf-c63879565291
2020-05-09 11:25:28	2020-05-09 11:25:28	1	1	10	aea3d1d2-c933-4b9c-a579-663ae5e2d318	f2d034b5-e778-4d64-a894-a7d917952f18	5f932697-47d8-4908-a374-9154150c2c1e
2020-05-09 11:25:29	2020-05-09 11:25:29	1	1	10	134669e0-05c1-4a9b-840a-22337cc3d57c	def47772-d544-4c5d-a1a9-aef9ce5e980e	5f932697-47d8-4908-a374-9154150c2c1e
2020-05-09 11:25:29	2020-05-09 11:25:29	1	1	10	1edc5ace-76e9-4f60-93bc-1d76e717eec0	3eaa00db-d16e-4f4c-a768-0b046374d69e	5f932697-47d8-4908-a374-9154150c2c1e
2020-05-09 11:25:29	2020-05-09 11:25:29	1	1	10	e6370990-b8a8-48cb-ad36-78b01a74b988	da37a6b4-291c-444a-95fe-849fa0e0e435	5f932697-47d8-4908-a374-9154150c2c1e
2020-05-10 05:15:28	2020-05-10 05:15:28	1	1	10	6f4d1665-b7ec-49fb-b540-157a1667f66f	d16d1625-4bbd-4f3b-92cd-05499e577f6e	23ce0011-6627-4b93-a9eb-58161f823380
2020-05-10 05:15:28	2020-05-10 05:15:28	1	1	10	53c97e36-f642-4bdb-880e-8d682201db2e	97d9e377-7eca-477e-a816-2c9ccd8b54f3	23ce0011-6627-4b93-a9eb-58161f823380
2020-05-10 05:15:28	2020-05-10 05:15:28	1	1	10	5c7e760b-2eb7-4bae-8b72-68e00ca54e28	73142b4b-edbc-423c-af61-5d97e8bd7ca2	23ce0011-6627-4b93-a9eb-58161f823380
2020-05-10 05:15:28	2020-05-10 05:15:28	1	1	10	9f2ef627-7545-43c9-ad95-7ad5d4143688	c8be5306-fede-42b9-ad2c-f74feb058af1	23ce0011-6627-4b93-a9eb-58161f823380
2020-05-16 05:56:51	2020-05-16 05:56:51	1	1	10	c0b0f26c-75b9-4679-afbd-b8c3cc446d47	b398875b-39e4-490b-8e5a-a74845e399f4	263d4d8d-d000-4bf1-b341-14be05cf39b2
2020-05-16 05:56:51	2020-05-16 05:56:51	1	1	10	7584ff71-e90f-479f-8c30-401d1035004c	77e5b9d0-f2cf-4be6-8aea-936aa3e80c1b	263d4d8d-d000-4bf1-b341-14be05cf39b2
2020-05-16 05:56:51	2020-05-16 05:56:51	1	1	10	eef4eb20-89d0-4e0a-a06e-d3070867074e	a6378efa-2b35-4eaa-9dc4-0631907143b9	263d4d8d-d000-4bf1-b341-14be05cf39b2
2020-05-16 05:56:51	2020-05-16 05:56:51	1	1	10	f70a7bbf-def4-4ce8-9b8f-0ea327fb9c0c	83cd01a7-e56d-4fa3-93cf-3751ff791914	263d4d8d-d000-4bf1-b341-14be05cf39b2
2020-05-17 05:46:59	2020-05-17 05:46:59	1	1	3	5c8c0de0-cb32-443e-b467-1934b6841afa	40847dce-06cd-4394-9451-96716753fcfd	17d879db-f891-432e-8621-758eaf89593f
2020-05-17 05:46:59	2020-05-17 05:46:59	1	1	3	acf087f3-0407-4010-87b6-41e93e36c481	6672677a-c0af-45a2-b96e-e2d300ac59b5	17d879db-f891-432e-8621-758eaf89593f
2020-05-17 05:46:59	2020-05-17 05:46:59	1	1	3	bbcfae92-6953-4179-920e-960f192ad9cf	ca2418d8-46c9-493e-be1e-dcc048b9f74b	17d879db-f891-432e-8621-758eaf89593f
2020-05-17 05:46:59	2020-05-17 05:46:59	1	1	3	f6754b7f-46a0-4424-8ca7-7d485c322bfc	4562741d-d316-42d1-b0c9-6f78137e8a40	17d879db-f891-432e-8621-758eaf89593f
2020-05-17 05:47:53	2020-05-17 05:47:53	1	1	3	42764bc5-8db0-486b-a184-1a7149640b3b	36f5d231-9449-4b4a-acf0-cac67b0f440a	ccb4059f-d21c-4e9a-9a33-ede9a46b3291
2020-05-17 05:47:53	2020-05-17 05:47:53	1	1	3	99d407b2-d49a-49df-9210-467609b24b52	844b8eb0-86f0-48b8-a8ca-f2aecf138f28	ccb4059f-d21c-4e9a-9a33-ede9a46b3291
\.


--
-- Data for Name: demo_core_permissions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_permissions (created_at, updated_at, created_by_id, updated_by_id, plugin_id, model, operation, columns, condition, code, admin_override, name, description, active, system, id) FROM stdin;
2020-04-27 10:59:16	2020-04-27 10:59:16	1	1	6	Demo\\Casemanager\\Models\\CasePriority	read	\N	\N	demo.casemanager::models.casepriority.row.read	t	Case Priority read Permission	This is the system generated permission for Case Priority read	t	t	35fce9b9-8b6a-4a92-a214-6d4e554f1e81
2020-04-27 10:59:16	2020-04-27 10:59:16	1	1	6	Demo\\Casemanager\\Models\\CasePriority	write	\N	\N	demo.casemanager::models.casepriority.row.write	t	Case Priority write Permission	This is the system generated permission for Case Priority write	t	t	b4e3b6cb-ebb1-4fbc-bc65-f59a2008da61
2020-04-27 10:59:16	2020-04-27 10:59:16	1	1	6	Demo\\Casemanager\\Models\\CasePriority	create	\N	\N	demo.casemanager::models.casepriority.row.create	t	Case Priority create Permission	This is the system generated permission for Case Priority create	t	t	58faebcc-6b97-4b46-9e9e-0070f1556837
2020-04-27 10:59:17	2020-04-27 10:59:17	1	1	6	Demo\\Casemanager\\Models\\CasePriority	delete	\N	\N	demo.casemanager::models.casepriority.row.delete	t	Case Priority delete Permission	This is the system generated permission for Case Priority delete	t	t	50880924-3110-478c-b01b-63c5c456edeb
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	6	Demo\\Casemanager\\Models\\CaseModel	read			demo.casemanager::models.casemodel.row.read	t	Case Model Read Permission		t	t	973f538e-62d3-4570-90d1-0310970e3046
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	6	Demo\\Casemanager\\Models\\CasePriority	read			demo.casemanager::models.casepriority.row.read	t	Case Priority Read Permission		t	t	df0f2fe6-9528-421b-8462-81491b982d82
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	6	Demo\\Casemanager\\Models\\CaseModel	write			demo.casemanager::models.casemodel.row.write	t	Case Model Write Permission		t	t	687046cf-9692-4292-ad35-efce1aaf42d4
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	6	Demo\\Casemanager\\Models\\CasePriority	write			demo.casemanager::models.casepriority.row.write	t	Case Priority Write Permission		t	t	f20adac9-f180-4720-b892-b58cf18f3166
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	6	Demo\\Casemanager\\Models\\CaseModel	create			demo.casemanager::models.casemodel.row.create	t	Case Model Create Permission		t	t	dab8870c-1ba8-4846-b9b7-00bbd39ec3a4
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	6	Demo\\Casemanager\\Models\\CasePriority	create			demo.casemanager::models.casepriority.row.create	t	Case Priority Create Permission		t	t	167aea1d-751c-4064-b7b4-b7a9a7e474ac
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	6	Demo\\Casemanager\\Models\\CaseModel	delete			demo.casemanager::models.casemodel.row.delete	t	Case Model Delete Permission		t	t	36edd8af-c53b-4f2b-9fb7-461f741a7676
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	6	Demo\\Casemanager\\Models\\CasePriority	delete			demo.casemanager::models.casepriority.row.delete	t	Case Priority Delete Permission		t	t	9662eafc-606b-4108-b60a-28554776a560
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\ModelModel	read	\N	\N	demo.core::models.model.row.read	t	Models Model Read Permission	\N	t	t	634d7a3d-e12a-4ba1-bd1b-4413c7166857
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\CustomField	read	\N	\N	demo.core::models.customfield.row.read	t	Custom Field Read Permission	\N	t	t	4e887799-ab06-426e-8f29-ed86217436dc
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\FormField	read	\N	\N	demo.core::models.formfield.row.read	t	Form Field Read Permission	\N	t	t	235457c6-0082-4850-bc96-763d10da63b3
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\EventHandler	read	\N	\N	demo.core::models.eventhandler.row.read	t	Event Handler Read Permission	\N	t	t	405140cf-af50-4069-9bad-7b42b383a916
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\InboundApi	read	\N	\N	demo.core::models.inboundapi.row.read	t	Inbound Api Read Permission	\N	t	t	c39ddf18-8315-4412-aa29-9c39aac9a157
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\Command	read	\N	\N	demo.core::models.command.row.read	t	Command Read Permission	\N	t	t	7a043619-eb21-43b3-b38e-61ae01791a56
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\Iframe	read	\N	\N	demo.core::models.iframe.row.read	t	Iframe Read Permission	\N	t	t	ac1c02d0-2fb3-4594-adc5-c05a5e14585d
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\JavascriptLibrary	read	\N	\N	demo.core::models.javascriptlibrary.row.read	t	Javascript Library Read Permission	\N	t	t	0c7de00e-dba8-4d0f-8b28-0280bedde093
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\Webhook	read	\N	\N	demo.core::models.webhook.row.read	t	Webhook Read Permission	\N	t	t	736c6e24-3e06-42b2-bfd2-fd3eceedd270
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\ModelAssociation	read	\N	\N	demo.core::models.modelassociation.row.read	t	Model Association Read Permission	\N	t	t	57d62e35-f3b7-42be-bd34-624169691484
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\Role	read	\N	\N	demo.core::models.role.row.read	t	Role Read Permission	\N	t	t	8f05b696-ed76-420e-9d1e-bea34c6ee87d
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\Permission	read	\N	\N	demo.core::models.permission.row.read	t	Permission Read Permission	\N	t	t	468a1dc8-b75a-4977-afcb-4899d403fb56
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\SecurityPolicy	read	\N	\N	demo.core::models.securitypolicy.row.read	t	Security Policy Read Permission	\N	t	t	91d80013-ec65-457d-8404-a4f77a53fcce
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\PermissionPolicyAssociation	read	\N	\N	demo.core::models.permissionpolicyassociation.row.read	t	Security Policy Association Read Permission	\N	t	t	be66ffc8-028b-4143-8ecd-6c69a63c1df2
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\RolePolicyAssociation	read	\N	\N	demo.core::models.rolepolicyassociation.row.read	t	Role Policy Association Read Permission	\N	t	t	0fd847b0-97c8-45ff-8e2e-1ed1bafcdf97
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\CoreUser	read	\N	\N	demo.core::models.coreuser.row.read	t	User Read Permission	\N	t	t	5a28f578-dbd1-4140-bd1b-a2a04678f93d
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\CoreUserGroup	read	\N	\N	demo.core::models.coreusergroup.row.read	t	User Read Permission	\N	t	t	44559ec3-446c-4390-8153-dd3183bb40da
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\ModelModel	write	\N	\N	demo.core::models.model.row.write	t	Models Model Write Permission	\N	t	t	35b878a9-c98e-41ab-ad14-568bf6229595
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\CustomField	write	\N	\N	demo.core::models.customfield.row.write	t	Custom Field Write Permission	\N	t	t	f86a95c4-6eae-4f13-a4c3-f9fb39d05fee
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\FormField	write	\N	\N	demo.core::models.formfield.row.write	t	Form Field Write Permission	\N	t	t	06cc5073-9406-46f5-acd8-2ea23b940e74
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\EventHandler	write	\N	\N	demo.core::models.eventhandler.row.write	t	Event Handler Write Permission	\N	t	t	28d86711-9f61-43f2-9111-28c9a15667c2
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\InboundApi	write	\N	\N	demo.core::models.inboundapi.row.write	t	Inbound Api Write Permission	\N	t	t	4f2c21b7-412c-4969-98fc-28c8633d4806
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\Command	write	\N	\N	demo.core::models.command.row.write	t	Command Write Permission	\N	t	t	d1fce9f7-1d30-4941-a04a-c22c06b8c754
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\Iframe	write	\N	\N	demo.core::models.iframe.row.write	t	Iframe Write Permission	\N	t	t	7235e750-8805-4dce-bd86-cf3877d3088a
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\JavascriptLibrary	write	\N	\N	demo.core::models.javascriptlibrary.row.write	t	Javascript Library Write Permission	\N	t	t	19942a9a-921c-47e3-935c-4ed9fd4b505b
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\Webhook	write	\N	\N	demo.core::models.webhook.row.write	t	Webhook Write Permission	\N	t	t	55733055-880f-4e96-9098-89238c160db9
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\ModelAssociation	write	\N	\N	demo.core::models.modelassociation.row.write	t	Model Association Write Permission	\N	t	t	5a9e1e3b-173b-4773-b904-68510a9084be
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\Role	write	\N	\N	demo.core::models.role.row.write	t	Role Write Permission	\N	t	t	ef346317-0e41-44ab-b7c6-b23e865301c9
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\Permission	write	\N	\N	demo.core::models.permission.row.write	t	Permission Write Permission	\N	t	t	5be00d39-9f2b-4c9d-99e5-6fbf3b5621cc
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\SecurityPolicy	write	\N	\N	demo.core::models.securitypolicy.row.write	t	Security Policy Write Permission	\N	t	t	fe764ff9-02ed-454a-afbb-7c9f09e9dfec
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\PermissionPolicyAssociation	write	\N	\N	demo.core::models.permissionpolicyassociation.row.write	t	Security Policy Association Write Permission	\N	t	t	dfbbc861-9c38-45cf-b803-947dc28c38a6
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\RolePolicyAssociation	write	\N	\N	demo.core::models.rolepolicyassociation.row.write	t	Role Policy Association Write Permission	\N	t	t	16760b52-d701-46fc-8187-0fc1ab34d280
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\CoreUser	write	\N	\N	demo.core::models.coreuser.row.write	t	User Write Permission	\N	t	t	bae545e0-6c9b-4222-b25c-2b7ab5c27a7a
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\CoreUserGroup	write	\N	\N	demo.core::models.coreusergroup.row.write	t	User Write Permission	\N	t	t	c06fbf64-318f-4387-9acd-3aad30c6f223
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\ModelModel	create	\N	\N	demo.core::models.model.row.create	t	Models Model Create Permission	\N	t	t	3a2cd259-fc75-4291-b914-f9b448c1d0c2
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\CustomField	create	\N	\N	demo.core::models.customfield.row.create	t	Custom Field Create Permission	\N	t	t	b9ccf37a-2adb-4f4d-aa71-74695011d433
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\FormField	create	\N	\N	demo.core::models.formfield.row.create	t	Form Field Create Permission	\N	t	t	101e00bc-3a5d-4d36-b74c-cf2821cb789a
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\EventHandler	create	\N	\N	demo.core::models.eventhandler.row.create	t	Event Handler Create Permission	\N	t	t	dd1666d3-0c9d-4549-9b5b-48bbf2c29e53
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\InboundApi	create	\N	\N	demo.core::models.inboundapi.row.create	t	Inbound Api Create Permission	\N	t	t	973899fd-ffc4-41d9-a928-9c0b6b3d72e6
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\Command	create	\N	\N	demo.core::models.command.row.create	t	Command Create Permission	\N	t	t	6b8bf33c-d486-4110-ac11-994246a8d60a
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\Iframe	create	\N	\N	demo.core::models.iframe.row.create	t	Iframe Create Permission	\N	t	t	e61eaef8-86f9-4e2b-af1f-e07c14e5817b
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\JavascriptLibrary	create	\N	\N	demo.core::models.javascriptlibrary.row.create	t	Javascript Library Create Permission	\N	t	t	d908f6a2-8532-4738-a0ff-58173e0f4682
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\Webhook	create	\N	\N	demo.core::models.webhook.row.create	t	Webhook Create Permission	\N	t	t	4b1442c1-51c2-4bee-8652-884b731394af
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\ModelAssociation	create	\N	\N	demo.core::models.modelassociation.row.create	t	Model Association Create Permission	\N	t	t	60696c4d-9ccf-41b7-9710-7971e625dd6a
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\Role	create	\N	\N	demo.core::models.role.row.create	t	Role Create Permission	\N	t	t	4fadf849-abc6-41fb-a785-fc62567f3cb4
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\Permission	create	\N	\N	demo.core::models.permission.row.create	t	Permission Create Permission	\N	t	t	58b78788-f2ba-471b-b5fc-bb119252b01e
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\SecurityPolicy	create	\N	\N	demo.core::models.securitypolicy.row.create	t	Security Policy Create Permission	\N	t	t	b858ec1f-2243-4247-aa84-cde73caf7236
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\PermissionPolicyAssociation	create	\N	\N	demo.core::models.permissionpolicyassociation.row.create	t	Security Policy Association Create Permission	\N	t	t	9f795eb8-0c37-4d1c-a422-39726eecf21b
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\RolePolicyAssociation	create	\N	\N	demo.core::models.rolepolicyassociation.row.create	t	Role Policy Association Create Permission	\N	t	t	3d4f2439-3f64-4ea0-8784-154e83495a7f
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\CoreUser	create	\N	\N	demo.core::models.coreuser.row.create	t	User Create Permission	\N	t	t	8c2e3923-174f-4629-94ed-e6de53114071
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\CoreUserGroup	create	\N	\N	demo.core::models.coreusergroup.row.create	t	User Create Permission	\N	t	t	dc127cc6-1c7f-4796-8c34-c7d2c2056e34
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\ModelModel	delete	\N	\N	demo.core::models.model.row.delete	t	Models Model Delete Permission	\N	t	t	262fdef8-849b-4786-b93b-59173376bb33
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\CustomField	delete	\N	\N	demo.core::models.customfield.row.delete	t	Custom Field Delete Permission	\N	t	t	c57e0f40-0d9c-4ce4-89c8-0f6828feb3dd
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\FormField	delete	\N	\N	demo.core::models.formfield.row.delete	t	Form Field Delete Permission	\N	t	t	50cdd989-39e1-403e-b5e0-9a16a4b7ebd1
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\EventHandler	delete	\N	\N	demo.core::models.eventhandler.row.delete	t	Event Handler Delete Permission	\N	t	t	8ae1ab85-9858-47c1-8e10-cdd2460058db
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\InboundApi	delete	\N	\N	demo.core::models.inboundapi.row.delete	t	Inbound Api Delete Permission	\N	t	t	d6193b2d-be81-4103-870d-3d235e198a6c
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\Command	delete	\N	\N	demo.core::models.command.row.delete	t	Command Delete Permission	\N	t	t	afc70cfe-440d-4822-abfe-01bbc399c956
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\Iframe	delete	\N	\N	demo.core::models.iframe.row.delete	t	Iframe Delete Permission	\N	t	t	ec0e3c83-798d-45c4-8291-7e8b2d8b7d44
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\JavascriptLibrary	delete	\N	\N	demo.core::models.javascriptlibrary.row.delete	t	Javascript Library Delete Permission	\N	t	t	2d3e9e12-bd92-4e6a-9f9e-edd3aa6d90db
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\Webhook	delete	\N	\N	demo.core::models.webhook.row.delete	t	Webhook Delete Permission	\N	t	t	4269c8ac-aca0-4dba-8de1-e05a1ed6bf08
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\ModelAssociation	delete	\N	\N	demo.core::models.modelassociation.row.delete	t	Model Association Delete Permission	\N	t	t	5a45cb8c-b95d-4aa7-b0e1-377f083ba17f
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\Role	delete	\N	\N	demo.core::models.role.row.delete	t	Role Delete Permission	\N	t	t	8dc79237-60ba-4002-b029-1585c6200d5b
2019-12-20 14:15:39	2019-12-28 14:43:57	1	1	15	Demo\\Notification\\Models\\NotificationChannel	read	\N	\N	demo.notification::models.notificationchannel.row.read	t	Notification Channel Read Permission	\N	t	t	319e224b-c14e-4eb8-a430-d807a01654ad
2019-12-20 14:15:39	2019-12-28 14:43:57	1	1	15	Demo\\Notification\\Models\\NotificationChannel	write	\N	\N	demo.notification::models.notificationchannel.row.write	t	Notification Channel Write Permission	\N	t	t	ccb0bd59-cef8-4d2c-896a-25560715a295
2019-12-20 14:15:39	2019-12-28 14:43:57	1	1	15	Demo\\Notification\\Models\\NotificationChannel	create	\N	\N	demo.notification::models.notificationchannel.row.create	t	Notification Channel Create Permission	\N	t	t	fc03e6b5-fb4b-4376-9222-3e9f8010065d
2019-12-20 14:15:39	2019-12-28 14:43:57	1	1	15	Demo\\Notification\\Models\\NotificationChannel	delete	\N	\N	demo.notification::models.notificationchannel.row.delete	t	Notification Channel Delete Permission	\N	t	t	1b434762-2c04-4414-9f41-aa376df3e91b
2019-12-20 14:15:39	2019-12-28 14:43:57	1	1	15	Demo\\Notification\\Models\\Notification	read	\N	\N	demo.notification::models.notification.row.delete	t	Notification Read Permission	\N	t	t	c6cfdcf0-e7cf-45ea-be86-d803e2cbff53
2019-12-20 14:15:39	2019-12-28 14:43:57	1	1	15	Demo\\Notification\\Models\\Notification	write	\N	\N	demo.notification::models.notification.row.write	t	Notification Write Permission	\N	t	t	a0b5cba9-3a14-4b29-b0dd-112764bea5be
2019-12-20 14:15:39	2019-12-28 14:43:57	1	1	15	Demo\\Notification\\Models\\Notification	create	\N	\N	demo.notification::models.notification.row.create	t	Notification Create Permission	\N	t	t	c5fd60c1-bb42-4019-a2bf-5776c83b7cc9
2019-12-20 14:15:39	2019-12-28 14:43:57	1	1	15	Demo\\Notification\\Models\\Notification	delete	\N	\N	demo.notification::models.notification.row.delete	t	Notification Delete Permission	\N	t	t	4078310d-9e02-40a9-b706-08bdde1509ff
2019-12-20 14:15:39	2019-12-28 14:43:57	1	1	15	Demo\\Notification\\Models\\NotificationSubscriber	read	\N	\N	demo.notification::models.notificationsubscriber.row.delete	t	NotificationSubscriber Read Permission	\N	t	t	2d1cdb7e-4351-4c24-aa53-77f71cf845c1
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\Permission	delete	\N	\N	demo.core::models.permission.row.delete	t	Permission Delete Permission	\N	t	t	d1a85ad2-0c9f-4991-9073-3c17c41722e8
2019-12-20 14:15:39	2019-12-28 14:43:57	1	1	15	Demo\\Notification\\Models\\NotificationSubscriber	write	\N	\N	demo.notification::models.notificationsubscriber.row.write	t	NotificationSubscriber Write Permission	\N	t	t	3262aac3-40b7-4c94-871b-39d1cb509552
2019-12-20 14:15:39	2019-12-28 14:43:57	1	1	15	Demo\\Notification\\Models\\NotificationSubscriber	create	\N	\N	demo.notification::models.notificationsubscriber.row.create	t	NotificationSubscriber Create Permission	\N	t	t	91ed4eca-54bc-4b17-b992-444bd1dc359d
2019-12-20 14:15:39	2019-12-28 14:43:57	1	1	15	Demo\\Notification\\Models\\NotificationSubscriber	delete	\N	\N	demo.notification::models.notificationsubscriber.row.delete	t	NotificationSubscriber Delete Permission	\N	t	t	58a7e66e-bfc3-49de-b48f-4eeccc765e61
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\SecurityPolicy	delete	\N	\N	demo.core::models.securitypolicy.row.delete	t	Security Policy Delete Permission	\N	t	t	5b21c0be-4cc6-454f-a83c-1317457e9387
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\PermissionPolicyAssociation	delete	\N	\N	demo.core::models.permissionpolicyassociation.row.delete	t	Security Policy Association Delete Permission	\N	t	t	76d77f06-faa5-48ed-be1b-571d289d4658
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\RolePolicyAssociation	delete	\N	\N	demo.core::models.rolepolicyassociation.row.delete	t	Role Policy Association Delete Permission	\N	t	t	d432e0ac-5d4b-4b51-9b7d-dce6e074f408
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\CoreUser	delete	\N	\N	demo.core::models.coreuser.row.delete	t	User Delete Permission	\N	t	t	9d470344-84cf-4cdf-a803-bb12bc29266f
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	Demo\\Core\\Models\\CoreUserGroup	delete	\N	\N	demo.core::models.coreusergroup.row.delete	t	User Delete Permission	\N	t	t	c64bda9b-bb91-4089-8063-999c2edb315b
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\Queue	read	\N	\N	demo.workflow::models.queue.row.read	t	Queue Read Permission	\N	t	t	452cba39-4407-44c0-bece-ce0b9e4b3a4b
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\QueueItem	write	\N	\N	demo.workflow::models.queueitem.row.write	t	Queue Item Write Permission	\N	t	t	fef689c6-714c-4410-bfe7-54733227cb9f
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\QueueItem	create	\N	\N	demo.workflow::models.queueitem.row.create	t	Queue Item Create Permission	\N	t	t	9df3a2eb-6ce2-4632-af67-2cde68e3d74a
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\QueuePopCriteria	create	\N	\N	demo.workflow::models.queuepopcriteria.row.create	t	Queue Pop Criteria Create Permission	\N	t	t	2f4128ce-ab18-4658-93b9-9c1e4a54cb79
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\WorkflowState	read	\N	\N	demo.workflow::models.workflowstate.row.read	t	Workflow State Read Permission	\N	t	t	d111b49b-eb12-4899-8998-16ac09738ebc
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\Workflow	create	\N	\N	demo.workflow::models.workflow.row.create	t	Workflow Create Permission	\N	t	t	2881207e-0451-4c89-a2a5-86245cfccadc
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\WorkflowItem	create	\N	\N	demo.workflow::models.workflowitem.row.create	t	Workflow Item Create Permission	\N	t	t	49836cad-f197-4e87-94f9-3cbfd27232f1
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\WorkflowTransition	delete	\N	\N	demo.workflow::models.workflowtransition.row.delete	t	Workflow Transition Delete Permission	\N	t	t	5f19ba46-e496-4d19-82ac-46dad3182d8b
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\QueueRoutingRule	write	\N	\N	demo.workflow::models.queueroutingrule.row.write	t	Queue Routing Rule Write Permission	\N	t	t	3be5c317-d04e-4f03-8459-76b19e3a2ddd
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\QueueRoutingRule	read	\N	\N	demo.workflow::models.queueroutingrule.row.read	t	Queue Routing Rule Read Permission	\N	t	t	fad2b37f-2de6-4eb8-a812-b1bed9df6ff4
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\WorkflowItem	write	\N	\N	demo.workflow::models.workflowitem.row.write	t	Workflow Item Write Permission	\N	t	t	cde32f8a-1898-48e5-89cb-f2947b115d16
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\WorkflowTransition	create	\N	\N	demo.workflow::models.workflowtransition.row.create	t	Workflow Transition Create Permission	\N	t	t	5d476e2d-47e3-48a1-880f-785016d67cdb
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\Queue	delete	\N	\N	demo.workflow::models.queue.row.delete	t	Queue Delete Permission	\N	t	t	5219b163-6e07-4b61-86b7-82834723edea
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\Workflow	read	\N	\N	demo.workflow::models.workflow.row.read	t	Workflow Read Permission	\N	t	t	176b1eed-69ed-451f-80d5-07fd394e3ea0
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\WorkflowState	write	\N	\N	demo.workflow::models.workflowstate.row.write	t	Workflow State Write Permission	\N	t	t	b996fcb5-c7a2-4250-a165-134e566d52a1
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\WorkflowTransition	write	\N	\N	demo.workflow::models.workflowtransition.row.write	t	Workflow Transition Write Permission	\N	t	t	77573897-1af7-40bb-b829-9e68884ee031
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\Workflow	write	\N	\N	demo.workflow::models.workflow.row.write	t	Workflow Write Permission	\N	t	t	e565c9a0-395d-4fb8-801b-d701bd2e3aa4
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\Queue	create	\N	\N	demo.workflow::models.queue.row.create	t	Queue Create Permission	\N	t	t	2ecfe890-4cb3-4b9b-a735-1b62288bfd78
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\Workflow	delete	\N	\N	demo.workflow::models.workflow.row.delete	t	Workflow Delete Permission	\N	t	t	92a3d261-b3ef-45ad-ad91-71a12096d655
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\Queue	write	\N	\N	demo.workflow::models.queue.row.write	t	Queue Write Permission	\N	t	t	9b82540a-c92a-4ecd-baa3-0128ca505405
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\QueueItem	delete	\N	\N	demo.workflow::models.queueitem.row.delete	t	Queue Item Delete Permission	\N	t	t	0407e203-77b1-4c10-b485-705ea9751d73
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\WorkflowItem	read	\N	\N	demo.workflow::models.workflowitem.row.read	t	Workflow Item Read Permission	\N	t	t	3b5d8aac-ebfe-48bf-bb63-907b8316c528
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\WorkflowState	delete	\N	\N	demo.workflow::models.workflowstate.row.delete	t	Workflow State Delete Permission	\N	t	t	c0cde7b7-a54f-42fd-b517-2927ad90a5ad
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\QueuePopCriteria	read	\N	\N	demo.workflow::models.queuepopcriteria.row.read	t	Queue Pop Criteria Read Permission	\N	t	t	c834feef-1af7-40ca-aca6-fa80fa0cc22b
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\QueuePopCriteria	write	\N	\N	demo.workflow::models.queuepopcriteria.row.write	t	Queue Pop Criteria Write Permission	\N	t	t	2a8c8d75-df52-43eb-8a58-a40d4629455a
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\WorkflowTransition	read	\N	\N	demo.workflow::models.workflowtransition.row.read	t	Workflow Transition Read Permission	\N	t	t	30765ba2-36a4-453c-8046-3ae816e2f983
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\WorkflowItem	delete	\N	\N	demo.workflow::models.workflowitem.row.delete	t	Workflow Item Delete Permission	\N	t	t	973c4985-0676-4842-8dcf-097e14d3977a
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\QueuePopCriteria	delete	\N	\N	demo.workflow::models.queuepopcriteria.row.delete	t	Queue Pop Criteria Delete Permission	\N	t	t	7c6d564b-7ee6-4ff7-ac45-8817a64a9b17
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\QueueRoutingRule	create	\N	\N	demo.workflow::models.queueroutingrule.row.create	t	Queue Routing Rule Create Permission	\N	t	t	81cd5035-62f4-477e-99fd-bd3b968b1f2e
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\QueueRoutingRule	delete	\N	\N	demo.workflow::models.queueroutingrule.row.delete	t	Queue Routing Rule Delete Permission	\N	t	t	e7e68978-0cb3-49a4-a950-0d67a0d9065a
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\WorkflowState	create	\N	\N	demo.workflow::models.workflowstate.row.create	t	Workflow State Create Permission	\N	t	t	4fba7c30-422b-4f71-bfd3-1d522cf1a006
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	11	Demo\\Workflow\\Models\\QueueItem	read	\N	\N	demo.workflow::models.queueitem.row.read	t	Queue Item Read Permission	\N	t	t	07815934-fa5e-4508-a31c-db669305bb70
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	14	Demo\\Report\\Models\\Dashboard	delete	\N	\N	demo.report::models.dashboard.row.delete	t	Dashboard Delete Permission	\N	t	t	8a09a529-1512-42bd-b6c4-e57a27f17a2a
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	14	Demo\\Report\\Models\\Dashboard	create	\N	\N	demo.report::models.dashboard.row.create	t	Dashboard Create Permission	\N	t	t	0bf32ab8-1e24-4c0b-a6e4-e8e52373cd53
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	14	Demo\\Report\\Models\\Widget	write	\N	\N	demo.report::models.widget.row.write	t	Widget Write Permission	\N	t	t	a37361fd-a121-4587-bd77-c9c6fd623a97
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	14	Demo\\Report\\Models\\Widget	read	\N	\N	demo.report::models.widget.row.read	t	Widget Read Permission	\N	t	t	6ecec6f1-5c18-4562-ab1f-6001f84ad9d4
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	14	Demo\\Report\\Models\\Dashboard	write	\N	\N	demo.report::models.dashboard.row.write	t	Dashboard Write Permission	\N	t	t	a70dbd44-6388-4c3c-b350-bd5e2985703a
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	14	Demo\\Report\\Models\\Dashboard	read	\N	\N	demo.report::models.dashboard.row.read	t	Dashboard Read Permission	\N	t	t	b332dfde-b251-46fc-9869-c528283dc6ae
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	14	Demo\\Report\\Models\\Widget	delete	\N	\N	demo.report::models.widget.row.delete	t	Widget Delete Permission	\N	t	t	639cde2f-d356-449a-b4df-479b5926857e
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	14	Demo\\Report\\Models\\Widget	create	\N	\N	demo.report::models.widget.row.create	t	Widget Create Permission	\N	t	t	57ced49d-6541-4d24-a332-2540ecb06466
2020-04-27 11:51:21	2020-04-27 11:51:21	1	1	6	Demo\\Casemanager\\Models\\Project	read	\N	\N	demo.casemanager::models.project.row.read	t	Project read Permission	This is the system generated permission for Project read	t	t	b6ccd813-b2c9-4df1-961c-04df2031a3a9
2020-04-27 11:51:21	2020-04-27 11:51:21	1	1	6	Demo\\Casemanager\\Models\\Project	write	\N	\N	demo.casemanager::models.project.row.write	t	Project write Permission	This is the system generated permission for Project write	t	t	9dd592de-c8bf-4c60-ae3f-5b48a49ed314
2020-04-27 11:51:21	2020-04-27 11:51:21	1	1	6	Demo\\Casemanager\\Models\\Project	create	\N	\N	demo.casemanager::models.project.row.create	t	Project create Permission	This is the system generated permission for Project create	t	t	2fe02db1-77fd-43eb-9cb6-e1c84b44bf7b
2020-04-27 11:51:21	2020-04-27 11:51:21	1	1	6	Demo\\Casemanager\\Models\\Project	delete	\N	\N	demo.casemanager::models.project.row.delete	t	Project delete Permission	This is the system generated permission for Project delete	t	t	c17220cd-f6f5-4912-9dfd-5045a93604a9
2020-05-09 11:25:28	2020-05-09 11:25:28	1	1	10	Demo\\Core\\Models\\Navigation	read	\N	\N	demo.core::models.navigation.row.read	t	Navigation read Permission	This is the system generated permission for Navigation read	t	t	f2d034b5-e778-4d64-a894-a7d917952f18
2020-05-09 11:25:28	2020-05-09 11:25:28	1	1	10	Demo\\Core\\Models\\Navigation	write	\N	\N	demo.core::models.navigation.row.write	t	Navigation write Permission	This is the system generated permission for Navigation write	t	t	def47772-d544-4c5d-a1a9-aef9ce5e980e
2020-05-09 11:25:29	2020-05-09 11:25:29	1	1	10	Demo\\Core\\Models\\Navigation	create	\N	\N	demo.core::models.navigation.row.create	t	Navigation create Permission	This is the system generated permission for Navigation create	t	t	3eaa00db-d16e-4f4c-a768-0b046374d69e
2020-05-09 11:25:29	2020-05-09 11:25:29	1	1	10	Demo\\Core\\Models\\Navigation	delete	\N	\N	demo.core::models.navigation.row.delete	t	Navigation delete Permission	This is the system generated permission for Navigation delete	t	t	da37a6b4-291c-444a-95fe-849fa0e0e435
2020-04-26 07:09:39	2020-04-26 07:09:39	1	1	10	Demo\\Core\\Models\\ListAction	read	\N	\N	demo.core::models.listaction.row.read	t	List Action read Permission	This is the system generated permission for List Action read	t	t	8310cc31-dd04-424f-8a54-9a2c92a088e1
2020-04-26 07:09:40	2020-04-26 07:09:40	1	1	10	Demo\\Core\\Models\\ListAction	write	\N	\N	demo.core::models.listaction.row.write	t	List Action write Permission	This is the system generated permission for List Action write	t	t	a48f2b53-19c0-4121-b501-b58a624935bc
2020-04-26 07:09:40	2020-04-26 07:09:40	1	1	10	Demo\\Core\\Models\\ListAction	create	\N	\N	demo.core::models.listaction.row.create	t	List Action create Permission	This is the system generated permission for List Action create	t	t	0450167e-8449-4f5b-a9e3-048391c99e97
2020-04-26 07:09:40	2020-04-26 07:09:40	1	1	10	Demo\\Core\\Models\\ListAction	delete	\N	\N	demo.core::models.listaction.row.delete	t	List Action delete Permission	This is the system generated permission for List Action delete	t	t	33f61906-9d7a-4e08-ac91-eb653fea8270
2020-04-26 07:09:40	2020-04-26 07:09:40	1	1	10	Demo\\Core\\Models\\ListAction	view	\N	\N	demo.core::models.listaction.row.view	t	List Action view Permission	This is the system generated permission for List Action view	t	t	a987b529-da3d-4148-9dd3-606e1227b5a8
2020-05-16 05:56:51	2020-05-16 05:56:51	1	1	10	Demo\\Core\\Models\\UiPage	read	\N	\N	demo.core::models.uipage.row.read	t	UI Page read Permission	This is the system generated permission for UI Page read	t	t	b398875b-39e4-490b-8e5a-a74845e399f4
2020-05-16 05:56:51	2020-05-16 05:56:51	1	1	10	Demo\\Core\\Models\\UiPage	write	\N	\N	demo.core::models.uipage.row.write	t	UI Page write Permission	This is the system generated permission for UI Page write	t	t	77e5b9d0-f2cf-4be6-8aea-936aa3e80c1b
2020-05-16 05:56:51	2020-05-16 05:56:51	1	1	10	Demo\\Core\\Models\\UiPage	create	\N	\N	demo.core::models.uipage.row.create	t	UI Page create Permission	This is the system generated permission for UI Page create	t	t	a6378efa-2b35-4eaa-9dc4-0631907143b9
2020-05-16 05:56:51	2020-05-16 05:56:51	1	1	10	Demo\\Core\\Models\\UiPage	delete	\N	\N	demo.core::models.uipage.row.delete	t	UI Page delete Permission	This is the system generated permission for UI Page delete	t	t	83cd01a7-e56d-4fa3-93cf-3751ff791914
2020-05-17 05:47:52	2020-05-17 05:47:52	1	1	3	Demo\\Notification\\Models\\MailLayout	read	\N	\N	demo.notification::models.maillayout.row.read	t	Mail Layouts read Permission	This is the system generated permission for Mail Layouts read	t	t	36f5d231-9449-4b4a-acf0-cac67b0f440a
2020-05-17 05:47:53	2020-05-17 05:47:53	1	1	3	Demo\\Notification\\Models\\MailLayout	write	\N	\N	demo.notification::models.maillayout.row.write	t	Mail Layouts write Permission	This is the system generated permission for Mail Layouts write	t	t	844b8eb0-86f0-48b8-a8ca-f2aecf138f28
2020-05-17 05:47:53	2020-05-17 05:47:53	1	1	3	Demo\\Notification\\Models\\MailLayout	create	\N	\N	demo.notification::models.maillayout.row.create	t	Mail Layouts create Permission	This is the system generated permission for Mail Layouts create	t	t	4537497b-b519-44d4-9f2a-bb37e102ad31
2020-05-17 05:47:53	2020-05-17 05:47:53	1	1	3	Demo\\Notification\\Models\\MailLayout	delete	\N	\N	demo.notification::models.maillayout.row.delete	t	Mail Layouts delete Permission	This is the system generated permission for Mail Layouts delete	t	t	41152b61-10bd-4e93-baaa-515b7ee8b1d9
2020-05-17 05:53:01	2020-05-17 05:53:01	1	1	3	Demo\\Notification\\Models\\MailTemplate	read	\N	\N	demo.notification::models.mailtemplate.row.read	t	Mail Templates read Permission	This is the system generated permission for Mail Templates read	t	t	8a4f3d17-7b60-4f64-b360-977892c78bcc
2020-05-17 05:53:01	2020-05-17 05:53:01	1	1	3	Demo\\Notification\\Models\\MailTemplate	write	\N	\N	demo.notification::models.mailtemplate.row.write	t	Mail Templates write Permission	This is the system generated permission for Mail Templates write	t	t	ce0238d2-5a0d-487e-b323-665b1d81c7e4
2020-05-17 05:53:01	2020-05-17 05:53:01	1	1	3	Demo\\Notification\\Models\\MailTemplate	create	\N	\N	demo.notification::models.mailtemplate.row.create	t	Mail Templates create Permission	This is the system generated permission for Mail Templates create	t	t	24e2709c-4cb9-481c-b3bf-b08d8a62f427
2020-05-17 05:53:01	2020-05-17 05:53:01	1	1	3	Demo\\Notification\\Models\\MailTemplate	delete	\N	\N	demo.notification::models.mailtemplate.row.delete	t	Mail Templates delete Permission	This is the system generated permission for Mail Templates delete	t	t	134dab70-f285-42d7-b0ff-7167e2acbe35
2020-05-26 14:00:23	2020-05-26 14:00:23	1	1	10	System\\Models\\Parameter	read	\N	\N	system.models::parameter.row.read	t	Setting read Permission	This is the system generated permission for Setting read	t	t	cdd20bc9-83a0-4868-b25b-5cf3a44e422f
2020-05-26 14:00:24	2020-05-26 14:00:24	1	1	10	System\\Models\\Parameter	write	\N	\N	system.models::parameter.row.write	t	Setting write Permission	This is the system generated permission for Setting write	t	t	b4631adf-9c69-4c5d-a938-d002947e940d
2020-05-26 14:00:24	2020-05-26 14:00:24	1	1	10	System\\Models\\Parameter	create	\N	\N	system.models::parameter.row.create	t	Setting create Permission	This is the system generated permission for Setting create	t	t	a553449e-af5f-4e20-a1e8-b18ef4f38e56
2020-04-27 12:16:52	2020-04-27 12:16:52	1	1	10	Demo\\Core\\Models\\Role	read	\N	\N	demo.core::models.role.row.read	t	Role read Permission	This is the system generated permission for Role read	t	t	7525ccf2-f3eb-481f-a4fa-7bfabe6727a8
2020-04-27 12:16:53	2020-04-27 12:16:53	1	1	10	Demo\\Core\\Models\\Role	write	\N	\N	demo.core::models.role.row.write	t	Role write Permission	This is the system generated permission for Role write	t	t	3738376a-c035-435f-9534-7c0058524f79
2020-04-27 12:16:53	2020-04-27 12:16:53	1	1	10	Demo\\Core\\Models\\Role	create	\N	\N	demo.core::models.role.row.create	t	Role create Permission	This is the system generated permission for Role create	t	t	dd05044e-0d55-490c-b8d2-a3e7ae96d33f
2020-04-27 12:16:53	2020-04-27 12:16:53	1	1	10	Demo\\Core\\Models\\Role	delete	\N	\N	demo.core::models.role.row.delete	t	Role delete Permission	This is the system generated permission for Role delete	t	t	d346ba98-9642-4f83-b4cd-5cb2b344d911
2020-05-10 05:15:28	2020-05-10 05:15:28	1	1	10	Demo\\Core\\Models\\NavigationRoleAssociation	read	\N	\N	demo.core::models.navigationroleassociation.row.read	t	Navigation Role Association read Permission	This is the system generated permission for Navigation Role Association read	t	t	d16d1625-4bbd-4f3b-92cd-05499e577f6e
2020-05-10 05:15:28	2020-05-10 05:15:28	1	1	10	Demo\\Core\\Models\\NavigationRoleAssociation	write	\N	\N	demo.core::models.navigationroleassociation.row.write	t	Navigation Role Association write Permission	This is the system generated permission for Navigation Role Association write	t	t	97d9e377-7eca-477e-a816-2c9ccd8b54f3
2020-05-10 05:15:28	2020-05-10 05:15:28	1	1	10	Demo\\Core\\Models\\NavigationRoleAssociation	create	\N	\N	demo.core::models.navigationroleassociation.row.create	t	Navigation Role Association create Permission	This is the system generated permission for Navigation Role Association create	t	t	73142b4b-edbc-423c-af61-5d97e8bd7ca2
2020-05-10 05:15:28	2020-05-10 05:15:28	1	1	10	Demo\\Core\\Models\\NavigationRoleAssociation	delete	\N	\N	demo.core::models.navigationroleassociation.row.delete	t	Navigation Role Association delete Permission	This is the system generated permission for Navigation Role Association delete	t	t	c8be5306-fede-42b9-ad2c-f74feb058af1
2020-04-26 07:16:15	2020-04-26 07:16:15	1	1	10	Demo\\Core\\Models\\FormAction	read	\N	\N	demo.core::models.formaction.row.read	t	Form Action read Permission	This is the system generated permission for Form Action read	t	t	1ffe9bfb-58ff-477b-a656-36cc4e2cce04
2020-04-26 07:16:15	2020-04-26 07:16:15	1	1	10	Demo\\Core\\Models\\FormAction	write	\N	\N	demo.core::models.formaction.row.write	t	Form Action write Permission	This is the system generated permission for Form Action write	t	t	01f62d21-e9dd-4c96-bdf5-ec1543ee0639
2020-04-26 07:16:16	2020-04-26 07:16:16	1	1	10	Demo\\Core\\Models\\FormAction	create	\N	\N	demo.core::models.formaction.row.create	t	Form Action create Permission	This is the system generated permission for Form Action create	t	t	2c27bd90-7a26-4e9d-960c-35742b63cc17
2020-04-26 07:16:16	2020-04-26 07:16:16	1	1	10	Demo\\Core\\Models\\FormAction	delete	\N	\N	demo.core::models.formaction.row.delete	t	Form Action delete Permission	This is the system generated permission for Form Action delete	t	t	772ae40c-ff97-4ede-bda7-6d8cd0441e92
2020-04-26 07:16:16	2020-04-26 07:16:16	1	1	10	Demo\\Core\\Models\\FormAction	view	\N	\N	demo.core::models.formaction.row.view	t	Form Action view Permission	This is the system generated permission for Form Action view	t	t	91e26c0b-ae0c-4411-8821-b9812a4d8b41
2020-05-17 05:46:59	2020-05-17 05:46:59	1	1	3	Demo\\Notification\\Models\\MailBrandSetting	read	\N	\N	demo.notification::models.mailbrandsetting.row.read	t	Mail Brand Setting read Permission	This is the system generated permission for Mail Brand Setting read	t	t	40847dce-06cd-4394-9451-96716753fcfd
2020-05-17 05:46:59	2020-05-17 05:46:59	1	1	3	Demo\\Notification\\Models\\MailBrandSetting	write	\N	\N	demo.notification::models.mailbrandsetting.row.write	t	Mail Brand Setting write Permission	This is the system generated permission for Mail Brand Setting write	t	t	6672677a-c0af-45a2-b96e-e2d300ac59b5
2020-05-17 05:46:59	2020-05-17 05:46:59	1	1	3	Demo\\Notification\\Models\\MailBrandSetting	create	\N	\N	demo.notification::models.mailbrandsetting.row.create	t	Mail Brand Setting create Permission	This is the system generated permission for Mail Brand Setting create	t	t	ca2418d8-46c9-493e-be1e-dcc048b9f74b
2020-05-17 05:46:59	2020-05-17 05:46:59	1	1	3	Demo\\Notification\\Models\\MailBrandSetting	delete	\N	\N	demo.notification::models.mailbrandsetting.row.delete	t	Mail Brand Setting delete Permission	This is the system generated permission for Mail Brand Setting delete	t	t	4562741d-d316-42d1-b0c9-6f78137e8a40
2020-05-17 05:52:10	2020-05-17 05:52:10	1	1	3	Demo\\Notification\\Models\\MailPartial	read	\N	\N	demo.notification::models.mailpartial.row.read	t	Mail Partial read Permission	This is the system generated permission for Mail Partial read	t	t	87e96f3e-0bba-443a-b420-57278b4ed0e7
2020-05-17 05:52:10	2020-05-17 05:52:10	1	1	3	Demo\\Notification\\Models\\MailPartial	write	\N	\N	demo.notification::models.mailpartial.row.write	t	Mail Partial write Permission	This is the system generated permission for Mail Partial write	t	t	56353b9f-78b8-480a-909a-ed0d6641b6c9
2020-05-17 05:52:11	2020-05-17 05:52:11	1	1	3	Demo\\Notification\\Models\\MailPartial	create	\N	\N	demo.notification::models.mailpartial.row.create	t	Mail Partial create Permission	This is the system generated permission for Mail Partial create	t	t	9f7304df-5b8e-4fa1-91a3-96a1d5d00df8
2020-05-17 05:52:11	2020-05-17 05:52:11	1	1	3	Demo\\Notification\\Models\\MailPartial	delete	\N	\N	demo.notification::models.mailpartial.row.delete	t	Mail Partial delete Permission	This is the system generated permission for Mail Partial delete	t	t	6cf18928-ad33-440e-b7b9-61cd43554ed9
2020-05-26 14:00:24	2020-05-26 14:00:24	1	1	10	System\\Models\\Parameter	delete	\N	\N	system.models::parameter.row.delete	t	Setting delete Permission	This is the system generated permission for Setting delete	t	t	50ce192e-6999-4acb-95bb-929058b1dcf4
2020-05-29 08:12:46	2020-05-29 08:12:46	1	1	14	Demo\\Workflow\\Models\\ServiceChannel	read	\N	\N	demo.workflow::models.servicechannel.row.read	t	Service Channel read Permission	This is the system generated permission for Service Channel read	t	t	9f626681-b9be-439a-9b3d-451dbef42196
2020-05-29 08:12:46	2020-05-29 08:12:46	1	1	14	Demo\\Workflow\\Models\\ServiceChannel	write	\N	\N	demo.workflow::models.servicechannel.row.write	t	Service Channel write Permission	This is the system generated permission for Service Channel write	t	t	19e19159-28a0-4fa6-9c6c-d7b3881646c2
2020-05-29 08:12:46	2020-05-29 08:12:46	1	1	14	Demo\\Workflow\\Models\\ServiceChannel	create	\N	\N	demo.workflow::models.servicechannel.row.create	t	Service Channel create Permission	This is the system generated permission for Service Channel create	t	t	c91090cd-d197-4fc0-ad11-ca96eff84cd7
2020-05-29 08:12:46	2020-05-29 08:12:46	1	1	14	Demo\\Workflow\\Models\\ServiceChannel	delete	\N	\N	demo.workflow::models.servicechannel.row.delete	t	Service Channel delete Permission	This is the system generated permission for Service Channel delete	t	t	13647c7a-fb93-42b4-8e72-14abd3efcee2
\.


--
-- Data for Name: demo_core_role_policy_associations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_role_policy_associations (created_at, updated_at, created_by_id, updated_by_id, plugin_id, id, role_id, policy_id) FROM stdin;
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	c589883b-ddd1-42fb-96bd-d01b0551406a	\N	694b6dcf-0017-4013-bc71-c7d71dae6a3a
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	bf7e8285-aace-49d5-992d-85173cd18ec9	\N	694b6dcf-0017-4013-bc71-c7d71dae6a3a
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	57b141c4-24d9-4c1b-97cf-3ce2b8b67ae0	\N	694b6dcf-0017-4013-bc71-c7d71dae6a3a
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	8741b6f3-36ff-4f60-806c-02c386b71212	\N	694b6dcf-0017-4013-bc71-c7d71dae6a3a
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	54000956-8149-40de-ae79-cf72694bc9ed	\N	694b6dcf-0017-4013-bc71-c7d71dae6a3a
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	936a330d-e838-40f7-a24a-b494582a5060	\N	694b6dcf-0017-4013-bc71-c7d71dae6a3a
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	10	59988daf-d35f-4b82-873f-10858ee03e7e	\N	694b6dcf-0017-4013-bc71-c7d71dae6a3a
2020-05-10 06:31:16	2020-05-10 06:31:16	1	1	6	f2fdb718-c407-4cb6-ba87-728135b46da0	f2fdb718-c407-4cb6-ba87-728135b46da0	65971c94-5f2a-4f63-a6a3-9ca1b19a5b9f
2020-05-10 06:31:16	2020-05-10 06:31:16	1	1	6	4a4af35a-8048-4b57-a709-fc90f10a9e6e	4a4af35a-8048-4b57-a709-fc90f10a9e6e	694b6dcf-0017-4013-bc71-c7d71dae6a3a
2020-05-10 06:31:16	2020-05-10 06:31:16	1	1	6	d83e4ade-4e1a-45fa-931c-62d3d868197c	d83e4ade-4e1a-45fa-931c-62d3d868197c	7d48cc5f-ae88-47fa-a29e-5566e08fe187
2020-05-10 06:31:16	2020-05-10 06:31:16	1	1	6	6f6e4767-ac24-49b9-870d-8cc526e3e3f5	6f6e4767-ac24-49b9-870d-8cc526e3e3f5	0dcd7801-d4ae-439d-907d-950b72a9f24d
2020-05-10 06:31:16	2020-05-10 06:31:16	1	1	6	8b88a7e5-de52-4ac9-be78-ac6bdf05ae1a	8b88a7e5-de52-4ac9-be78-ac6bdf05ae1a	22ba842b-7972-4ccd-825b-c9659d4e7465
2020-05-10 06:31:16	2020-05-10 06:31:16	1	1	6	ce4aee41-e636-46f3-9e13-de033bc34636	ce4aee41-e636-46f3-9e13-de033bc34636	f7d2748b-a40e-44cc-bbc3-ef17bbd82077
2020-06-07 13:24:04	2020-06-07 13:24:04	1	1	6	2886d3a0-a8c2-11ea-b798-3f0420e8d7f3	e751a812-4da9-4726-b375-8495ac2d3354	694b6dcf-0017-4013-bc71-c7d71dae6a3a
\.


--
-- Data for Name: demo_core_roles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_roles (created_at, updated_at, created_by_id, updated_by_id, name, code, description, plugin_id, id) FROM stdin;
2020-04-04 14:10:36	2020-04-06 07:16:12	1	1	Agent	agent	test	6	e751a812-4da9-4726-b375-8495ac2d3354
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Administrator	admin	Admin of the platform	10	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Everyone	everyone	Every user of the platform	10	90bafbbe-fbfd-42ed-9e51-5434f2733247
\.


--
-- Data for Name: demo_core_security_policies; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_security_policies (created_at, updated_at, created_by_id, updated_by_id, name, description, plugin_id, id) FROM stdin;
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Queue Item Security Policy-2	Security Policy for all operations on Queue Item	11	e9d3df0c-da53-4ead-93c8-53b08cddec40
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Queue Pop Criteria Security Policy-2	Security Policy for all operations on Queue Pop Criteria	11	b4d18d6e-fb92-4a5a-8223-c5b18b7b3eb6
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Queue Routing Rule Security Policy-2	Security Policy for all operations on Queue Routing Rule	11	37ff64b4-7584-4f8a-ad6b-8d736237738c
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Report Security Policy	Security Policy for all operations on Report	11	f6ff3253-e8ca-4897-9f1b-6bbcaf27b53d
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Report Item Security Policy	Security Policy for all operations on Report Item	11	4cc3ad2e-d9ad-4661-9359-e9bbb2af4bea
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Report State Security Policy	Security Policy for all operations on Report State	11	1e657cff-ed04-4ecd-9a2c-ec8026339c76
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Report Transition Security Policy	Security Policy for all operations on Report Transition	11	e326190a-0c2a-4ee6-a653-44fbd07d7280
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Queue Security Policy-3	Security Policy for all operations on Queue	11	ea90a52a-a1cf-4cb1-9034-812dcb426013
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Queue Item Security Policy-3	Security Policy for all operations on Queue Item	11	5560fa3f-b5fb-44a1-90ce-1389ca9d6fb6
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Queue Pop Criteria Security Policy-3	Security Policy for all operations on Queue Pop Criteria	11	33985503-c882-48d6-b5b0-642cb22534e8
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Queue Routing Rule Security Policy-3	Security Policy for all operations on Queue Routing Rule	11	c2065c15-5a22-440c-8f5d-3cdadf90e134
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Report Security Policy-1	Security Policy for all operations on Report	11	ae9d2447-a2a5-438a-a858-78f87cb268f4
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Report Item Security Policy-1	Security Policy for all operations on Report Item	11	374cfefb-036b-494b-86b6-f07cf9f926d4
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Report State Security Policy-1	Security Policy for all operations on Report State	11	fc324cdd-7389-4822-a225-4e2ef13a3977
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Widget Security Policy-1	Security Policy for all operations on Widget	14	d718666f-f90b-4c8b-8458-373cdc28f7bc
2019-12-20 14:15:39	2019-12-28 14:43:57	1	1	Dashboard Security Policy-1	Security Policy for all operations on Dashboard	14	1fcbb601-df64-4947-b1ca-e277326b5ef0
2020-04-27 12:16:52	2020-04-27 12:16:52	1	1	Role Policy	Autogenerated policy for Role	10	6613e84f-9a84-47e3-b5bf-c63879565291
2020-05-10 05:15:28	2020-05-10 05:15:28	1	1	Navigation Role Association Policy	Autogenerated policy for Navigation Role Association	10	23ce0011-6627-4b93-a9eb-58161f823380
2020-05-17 05:46:59	2020-05-17 05:46:59	1	1	Mail Brand Setting Policy	Autogenerated policy for Mail Brand Setting	3	17d879db-f891-432e-8621-758eaf89593f
2020-05-17 05:52:10	2020-05-17 05:52:10	1	1	Mail Partial Policy	Autogenerated policy for Mail Partial	3	c789ebf5-15b8-47fe-94b3-52a2b78c1397
2020-05-29 08:12:46	2020-05-29 08:12:46	1	1	Service Channel Policy	Autogenerated policy for Service Channel	14	1bb91fca-e15a-4fb7-b176-0be599769c86
2020-04-26 07:09:39	2020-04-26 07:09:39	1	1	List Action Policy	Autogenerated policy for List Action	2	22ba842b-7972-4ccd-825b-c9659d4e7465
2020-04-26 07:16:15	2020-04-26 07:16:15	1	1	Form Action Policy	Autogenerated policy for Form Action	2	f7d2748b-a40e-44cc-bbc3-ef17bbd82077
2020-04-27 11:51:21	2020-04-27 11:51:21	1	1	Project Policy	Autogenerated policy for Project	6	b70d97bf-4ef2-4fa1-bc21-332b0bf6aef9
2020-05-09 11:25:28	2020-05-09 11:25:28	1	1	Navigation Policy	Autogenerated policy for Navigation	10	5f932697-47d8-4908-a374-9154150c2c1e
2020-05-16 05:56:50	2020-05-16 05:56:50	1	1	UI Page Policy	Autogenerated policy for UI Page	10	263d4d8d-d000-4bf1-b341-14be05cf39b2
2020-05-17 05:47:52	2020-05-17 05:47:52	1	1	Mail Layouts Policy	Autogenerated policy for Mail Layouts	3	ccb4059f-d21c-4e9a-9a33-ede9a46b3291
2020-05-17 05:53:00	2020-05-17 05:53:00	1	1	Mail Templates Policy	Autogenerated policy for Mail Templates	3	d1b96d4c-11d9-4450-bf3f-d6a387cecbc9
2020-05-26 14:00:23	2020-05-26 14:00:23	1	1	Setting Policy	Autogenerated policy for Setting	10	dca386f7-4def-4739-8942-52d494d3be01
2020-04-06 14:06:17	2020-04-06 14:06:17	1	1	Agent Case Policy		6	65971c94-5f2a-4f63-a6a3-9ca1b19a5b9f
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Case Model Security Policy	Security Policy for all operations on Case Model	6	694b6dcf-0017-4013-bc71-c7d71dae6a3a
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Case Priority Security Policy	Security Policy for all operations on Case Priority	6	7d48cc5f-ae88-47fa-a29e-5566e08fe187
2020-04-27 10:59:16	2020-04-27 10:59:16	1	1	Case Priority Policy	Autogenerated policy for Case Priority	6	0dcd7801-d4ae-439d-907d-950b72a9f24d
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Models Model Security Policy	Security Policy for all operations on Models Model	10	85c78e51-2354-493e-baee-65311adc956b
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Custom Field Security Policy	Security Policy for all operations on Custom Field	10	03bcb86a-db37-4684-8728-35d7d405f661
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Form Field Security Policy	Security Policy for all operations on Form Field	10	d0bc0fbe-0144-4aa3-8bee-9ae0a3d702c7
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Event Handler Security Policy	Security Policy for all operations on Event Handler	10	b832a312-8a98-4f75-839e-31ec212e5939
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Inbound Api Security Policy	Security Policy for all operations on Inbound Api	10	a4b297c9-4e74-4749-949e-037c4de97786
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Command Security Policy	Security Policy for all operations on Command	10	bb8a8b6d-ea02-4f24-bf86-34b2ff24b966
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Iframe Security Policy	Security Policy for all operations on Iframe	10	965e3124-92d7-42a2-beff-7d81c156d2df
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Javascript Library Security Policy	Security Policy for all operations on Javascript Library	10	6d947a2b-d393-4cac-8034-5d05e2cbb19e
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Webhook Security Policy	Security Policy for all operations on Webhook	10	d2ea3a6e-67d2-40ae-8cec-8eb9fc1d898d
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Model Association Security Policy	Security Policy for all operations on Model Association	10	88241f18-95d9-4d86-b1ed-9ee70c1a1911
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Role Security Policy	Security Policy for all operations on Role	10	065447ca-8376-4db0-ad88-f5ad3a54b997
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Permission Security Policy	Security Policy for all operations on Permission	10	b9241926-67ab-4bd3-92e3-d6dc1f652f76
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Security Policy Security Policy	Security Policy for all operations on Security Policy	10	66e06e62-f496-406c-ac0d-af5959d59098
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Security Policy Association Security Policy	Security Policy for all operations on Security Policy Association	10	51c95602-b4ae-4623-a83f-292cc94ad815
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Role Policy Association Security Policy	Security Policy for all operations on Role Policy Association	10	dbb3b129-a3ea-4f68-a0d4-fc26faa37175
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	User Security Policy	Security Policy for all operations on User	10	325f0d78-cad1-43bb-a09f-37695eeca121
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	User Security Policy -1	Security Policy for all operations on User	10	3d88450a-5bb3-4ee6-b047-a9238a26c862
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Workflow Security Policy	Security Policy for all operations on Workflow	11	edcf6bbd-7608-46cb-a2f3-0009d3c470f8
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Workflow Item Security Policy	Security Policy for all operations on Workflow Item	11	c6c9b4a3-4f41-40cd-bf63-8bea2b7e6c1d
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Workflow State Security Policy	Security Policy for all operations on Workflow State	11	903f9819-1f28-41be-9e17-269de41fb03e
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Workflow Transition Security Policy	Security Policy for all operations on Workflow Transition	11	34dcb7e6-c79e-45d2-8be1-288fe3c93c43
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Webhook Security Policy -1	Security Policy for all operations on Webhook	11	6db49445-ffd8-45e2-9e48-58acdb68cc4a
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Widget Security Policy	Security Policy for all operations on Widget	11	2c123f65-fb4f-45cf-9081-4d9778b9b4f4
2019-12-20 14:15:39	2019-12-28 14:43:57	1	1	Dashboard Security Policy	Security Policy for all operations on Dashboard	11	9c3f08d1-38b4-49aa-8448-ead1e7b94c7b
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Queue Security Policy	Security Policy for all operations on Queue	11	2dbf918f-3a08-4063-8c4c-a2ac91d4a379
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Queue Item Security Policy	Security Policy for all operations on Queue Item	11	7c475e9d-5de0-43f1-baff-8040536271ec
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Queue Pop Criteria Security Policy	Security Policy for all operations on Queue Pop Criteria	11	4ea8aa69-562b-43cd-b120-d4bd4ec3443f
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Queue Routing Rule Security Policy	Security Policy for all operations on Queue Routing Rule	11	b05ab329-e7c8-4f67-8582-9ddb815cebc6
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Queue Security Policy-1	Security Policy for all operations on Queue	11	dec5e22e-148d-4967-95fc-25361b7883f6
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Queue Item Security Policy-1	Security Policy for all operations on Queue Item	11	7bf1dc35-9926-48ca-bef3-130810591a27
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Queue Pop Criteria Security Policy-1	Security Policy for all operations on Queue Pop Criteria	11	72a3cc6b-9ac4-45ae-9e42-1b55234a0a70
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Queue Routing Rule Security Policy-1	Security Policy for all operations on Queue Routing Rule	11	f80c615a-7667-454a-93c5-715810fe3925
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Workflow Security Policy-1	Security Policy for all operations on Workflow	11	5a54e6fa-40bd-47ee-bd49-e503f4513b16
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Workflow Item Security Policy-1	Security Policy for all operations on Workflow Item	11	7c11d2f9-ea6d-4a10-b3b0-f48d0a55cb05
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Workflow State Security Policy-1	Security Policy for all operations on Workflow State	11	2953e60d-78d7-4c96-9521-6811b0a5004d
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Workflow Transition Security Policy-1	Security Policy for all operations on Workflow Transition	11	6dbb7992-fcc6-4420-b83b-6c53893c8511
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Webhook Security Policy -2	Security Policy for all operations on Webhook	11	b183a2c6-c0b8-46a3-8082-f73e8effca45
2019-12-20 14:15:39	2019-12-20 14:15:39	1	1	Queue Security Policy-2	Security Policy for all operations on Queue	11	ab26cd31-0c57-4ec8-adc2-3a00945f2831
\.


--
-- Data for Name: demo_core_ui_pages; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_ui_pages (created_at, updated_at, created_by_id, updated_by_id, version, name, description, code, template, plugin_id, id) FROM stdin;
2020-05-16 06:00:56	2020-05-16 15:13:38	1	1	\N	Hello World		hello-world	<h1>\r\n    Hello World\r\n</h1>	10	3ed2a26a-8fee-48f9-87f6-48cc51bec3eb
\.


--
-- Data for Name: demo_core_user_role_associations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_user_role_associations (created_at, updated_at, user_id, plugin_id, created_by_id, updated_by_id, id, role_id) FROM stdin;
2020-04-06 14:03:21	2020-04-06 14:03:21	6	10	1	1	f314578a-4686-46d0-acb5-2b6c096cc687	f314578a-4686-46d0-acb5-2b6c096cc687
2019-12-20 14:15:39	2019-12-20 14:15:39	1	10	1	1	980dc6d1-033c-4dae-a7ef-4522e6c976a7	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-04-06 08:54:23	2020-04-06 08:54:23	3	10	1	1	d9f9f39e-1a2d-4eb9-9619-0fc673ca4c14	e751a812-4da9-4726-b375-8495ac2d3354
2020-06-13 12:12:52	2020-06-13 12:12:52	2	10	1	1	34d630d0-ad6f-11ea-8a1e-7b7a03481ce4	e751a812-4da9-4726-b375-8495ac2d3354
\.


--
-- Data for Name: demo_core_view_role_associations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_view_role_associations (created_at, updated_at, created_by_id, updated_by_id, version, plugin_id, model, id, record_id, role_id) FROM stdin;
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	015d16e0-a7f9-11ea-b64b-57ce9dae3cd2	ff393331-f802-4f3c-98f9-93a5c070102f	ab9cbba3-c481-4f23-85c7-37b9d8b52357
\N	\N	\N	\N	\N	\N	Demo\\Core\\Models\\Navigation	4177227d-38be-470d-9ca1-3591d8f603b5	016140c0-a7f9-11ea-a09c-77440aa34325	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:27:49	2020-06-06 13:27:49	1	1	\N	10	Demo\\Core\\Models\\Navigation	84113c20-a7f9-11ea-899f-e92a613db19b	fdf384c5-bdb6-4294-81a4-af302b12b332	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	7d1832a7-efbf-4316-88c1-e06fbddb1d5a	05e13a5f-d931-4328-84ed-100acf537174	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	d870ffa2-bb86-433a-a0ea-137e60f428f7	6dfa72ba-9fe1-4d81-aed2-dc945f0ef502	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	935ace2c-7c50-4e6c-854d-54dfe5e45e1d	85546192-4e1a-4dea-95fe-b8ebcc758b0d	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	134d1ab3-4b5b-49e9-b5f4-43183d544111	336cc40e-0020-4959-9dfe-190f6907c80c	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	ee1853c2-f02d-440a-a96e-888fbabf2954	1e73e4d1-f263-4744-a537-ab2d22d90e3c	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	b0028f5f-91a9-4dbc-a840-8f1e6ab903ff	15264ae2-d1b0-43f7-87fe-eda08a884bb0	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	462e5fc3-aa4d-4ab3-84e0-ce65f47e0333	be77fb91-0909-40fe-8e23-7d094adcbd09	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	8de72ff9-0cd6-47f2-83f5-8ec75161c2d1	be560371-c757-49b5-b1e1-8497c9150a3e	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	2e37de27-85b2-4c03-9148-7f77369bde95	139f4d70-98d4-492d-84ab-99eabb2e2865	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	d099c08b-eb22-4597-b5a4-a201fef47fbe	1b4aebe2-66f2-4984-a3d0-f69c3cfb90fc	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	aaf431a5-f15e-46a4-b883-5e1a809bc97a	0ca975a1-b152-4289-a5aa-2d4b2453a95a	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	1c2b1e6c-b6a1-4ece-8b98-28468283321d	84398af6-6036-43ed-b987-8f11ffb7057e	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	37a22aa8-7ed0-4c30-be15-331d8e5def45	c1021025-5a8e-4344-af1e-178dd1d1d29e	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	0e10cbd5-0b66-489a-9a94-121acdcc0750	2b9c5851-39a1-4c32-9bb9-b51958fdeee8	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	6c9f01fe-6d13-4756-8726-690f71054898	bd770875-29b9-496e-afe0-44d8f777c4ed	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	28119226-af30-4ba9-93c1-699bbf8a31f5	a5c69317-c4fd-4618-a92b-cff6a1f1da2f	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	610a3f5a-ce97-43d1-bc48-f4f1d38398bc	8d1a72d6-e7b4-49d0-a0b0-c1d1be57f044	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	35e9f162-14f1-41df-8265-15fb6645c4ec	1167df07-11a5-467e-af94-28257f1bf241	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	2af9ffb3-fec9-4c93-b48d-a4222199a082	43098bfd-5bf8-4979-a9b4-1fb837f327f3	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	d5c5712b-5597-44d3-a7d0-083cbac682b5	492e6fda-26f4-4115-aff6-b771a7220e46	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	567992ff-7e9a-4a65-a73a-9d18f894a54f	1836974e-0ea8-438a-9054-d4a42692cf94	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	39def6ad-e754-4d63-877f-28092a4e514b	35e67af3-a99d-4be8-bfc9-ee75e912d8b1	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	b98d9d12-20bc-4e07-99a2-fc0e3d2deecc	bae0b847-c210-4b91-89f7-e1f4117b1987	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	b63bbc96-3022-41ef-8c90-3f3a9f2831d6	9ee0e7d0-43e9-4d8a-be8a-9d0606437956	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	245d6dc5-f335-473b-92c6-f68488f90ee4	ed44650b-b008-456c-85de-adc1270cfbed	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	d0aece34-75dd-4f61-95f4-40e509e31567	9ab44ba4-d108-437f-8025-b999fcffa10c	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	e0f00062-a811-43b8-b897-f75985b8e3c7	03b0b444-c20a-4480-8549-67bab2b176f3	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	66f947d2-84d3-4b07-8abc-d1c4021e8fe9	fcfcb7de-516c-415a-8ddd-3b7392c3c37f	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	c37c67dd-d031-431d-aba4-b099338159eb	3004557a-c1b4-41c6-b4e3-3d0a4de1a52a	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	e4adfd7f-8b06-459d-afaa-cfef3616e9b4	47fe334b-d0da-4d4f-b9a7-9b9a6e59b1b2	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	b7b860ee-c51b-449c-8ecd-101565ee4d91	a29b979e-dcf0-4fef-9b58-cbaccecedc92	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	03e8d713-d67b-4e1c-a809-a0f9d04462c0	a541a960-fc25-48a7-b498-8443b2715bf5	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	4cbd6782-1cc5-45e5-ba23-766f8d00b7af	bcd5d88e-e08f-47e0-a377-5761c8cc3754	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	78e3fc14-0899-4b10-9872-dce884aa99b2	530b5272-a8a3-43cd-af15-8ea6a8a7c822	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	55120e92-fb73-4ee6-b123-c616223a5a9c	016140c0-a7f9-11ea-a09c-77440aa34325	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	2d7d5443-4949-487e-a5f7-8c0d043c6f33	fdf384c5-bdb6-4294-81a4-af302b12b332	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	f081035a-583c-4e43-b712-5d8c6c91dafe	6adbdf35-29f5-468f-8d0d-4e3003f298d0	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	4ccfb9bc-a415-4e7f-a780-fd5fd7279742	211608c8-5b81-47bf-8757-8c39889924b7	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	4fe6e4b6-8794-4ed2-9442-57cc8488a218	1f280b8a-9dbd-4b58-a295-59c0740b315d	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	08b118b7-75f0-4e27-b0a8-56e9bba8b93a	93b19b14-276d-4422-b2d4-3d4fb869de0c	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	5c193407-29ac-40da-8a8b-9cc9016a6e8f	06df55ff-f6c2-4b71-8493-c4b74f75b640	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	708a109c-b530-4e24-8ea7-58c96b4427e0	d044112f-9928-4685-b9c5-acb536b15a84	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	3c342b9b-edca-40a0-96cb-b31b71609163	5bec7e75-a7ff-48f0-8c90-03123697af4d	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	076acba6-ca3e-42ea-be98-21eaca1507be	5080c46a-c9d4-45dc-93d0-8835e4731f4d	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	7d9e42d9-4bf9-449c-baa3-3c968bdec7f2	e149e54e-ddcb-4b1b-b80b-2c37755ad953	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	fd3ef5d7-c43d-425b-a972-524261d5fb15	88a02697-074c-4dfc-9e7c-5dd964901e21	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	68ee34e0-1633-4ec0-bae4-fa91e2ba93bd	529c983e-43eb-4c04-b89f-24ac65ab4356	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	7960ed15-c913-4ab5-95c8-2fd4a1e5b92f	dcbc468c-12c8-4f92-b57c-6f05d092b1c1	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	c77efeb8-f4c7-4874-9eb3-e52947a9227c	7b2d4011-b582-457e-8549-637b0a61f93b	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-06 13:24:09	2020-06-06 13:24:09	1	1	\N	10	Demo\\Core\\Models\\Navigation	f6c3eff9-4708-4b6d-9199-72e79f41626e	485ac274-9ef0-45fa-87f7-1e77a8f6b234	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-07 05:31:43	2020-06-07 05:31:43	1	1	\N	6	Demo\\Core\\Models\\FormAction	2c134a90-a880-11ea-9a91-a559200a3700	fa00326d-63d6-4d51-84ee-9567cd8bf986	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-07 05:32:17	2020-06-07 05:32:17	1	1	\N	6	Demo\\Core\\Models\\FormAction	400eff70-a880-11ea-87e8-0992d922c70c	27909423-8ed9-4465-801c-c0f081f286fc	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-07 05:46:42	2020-06-07 05:46:42	1	1	\N	10	Demo\\Core\\Models\\FormAction	43a7c120-a882-11ea-b37f-43811c4770f0	74aa9c40-9618-4fc2-890f-35d98a81b875	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-07 05:46:52	2020-06-07 05:46:52	1	1	\N	10	Demo\\Core\\Models\\FormAction	49eab3e0-a882-11ea-a26e-4b4234bfd17c	60f9be27-c475-462f-a146-40588aa0bc91	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-07 05:47:03	2020-06-07 05:47:03	1	1	\N	14	Demo\\Core\\Models\\FormAction	506c3d70-a882-11ea-a94a-b316dfaafe43	c916ac69-bfd1-4ccc-8b75-2d8160831de6	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-07 05:47:21	2020-06-07 05:47:21	1	1	\N	14	Demo\\Core\\Models\\FormAction	5adf4740-a882-11ea-b2e7-97310c06d0e6	eaa211e4-d899-413b-b6ef-64339b3b3626	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-07 05:47:29	2020-06-07 05:47:29	1	1	\N	10	Demo\\Core\\Models\\FormAction	5ff3aab0-a882-11ea-a240-0d081a2656ed	54e73d14-1a67-4327-91a7-3e5b1aa49a90	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-07 05:47:44	2020-06-07 05:47:44	1	1	\N	10	Demo\\Core\\Models\\FormAction	689aa660-a882-11ea-bcc1-49757e88087e	0625b4f7-ab22-48ba-9eb2-e748cad64eab	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-07 06:06:04	2020-06-07 06:06:04	1	1	\N	10	Demo\\Core\\Models\\Navigation	f87bf680-a884-11ea-8e9f-05c2f8d3edeb	d965a574-969f-40cf-a735-524cdacfe676	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-07 06:06:12	2020-06-07 06:06:12	1	1	\N	6	Demo\\Core\\Models\\Navigation	fcebe540-a884-11ea-b4fd-6bd235501abb	c3984be1-820c-4cc8-a675-742815313468	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-07 06:06:40	2020-06-07 06:06:40	1	1	\N	6	Demo\\Core\\Models\\Navigation	0dcdefa0-a885-11ea-af05-49a1b65feffa	01f868fa-2ac6-42c1-b5e0-030df343dd31	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-07 06:06:48	2020-06-07 06:06:48	1	1	\N	10	Demo\\Core\\Models\\Navigation	1282e410-a885-11ea-a0af-2bbbd51b06d7	3280cd3c-8a95-4683-b661-7846bc9fdf03	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-07 06:06:56	2020-06-07 06:06:56	1	1	\N	10	Demo\\Core\\Models\\Navigation	176e3870-a885-11ea-881d-cb2385427568	7ffd7ee5-deb5-41af-876f-6bac700a35be	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-07 13:24:04	2020-06-07 13:24:04	1	1	\N	6	Demo\\Core\\Models\\Navigation	2891b220-a8c2-11ea-b9aa-95484a1a69c2	d965a574-969f-40cf-a735-524cdacfe676	e751a812-4da9-4726-b375-8495ac2d3354
2020-06-07 13:24:04	2020-06-07 13:24:04	1	1	\N	6	Demo\\Core\\Models\\Navigation	28934c50-a8c2-11ea-bc4e-dfb02a9f9d8b	fdf384c5-bdb6-4294-81a4-af302b12b332	e751a812-4da9-4726-b375-8495ac2d3354
2020-06-07 13:24:04	2020-06-07 13:24:04	1	1	\N	6	Demo\\Core\\Models\\Navigation	289485d0-a8c2-11ea-b2eb-8908a7c2000f	c3984be1-820c-4cc8-a675-742815313468	e751a812-4da9-4726-b375-8495ac2d3354
2020-06-07 13:24:04	2020-06-07 13:24:04	1	1	\N	6	Demo\\Core\\Models\\Navigation	2895f770-a8c2-11ea-a4e9-dda1052b7670	01f868fa-2ac6-42c1-b5e0-030df343dd31	e751a812-4da9-4726-b375-8495ac2d3354
2020-06-07 13:24:04	2020-06-07 13:24:04	1	1	\N	6	Demo\\Core\\Models\\Navigation	28976b30-a8c2-11ea-a065-9fef9822f404	3280cd3c-8a95-4683-b661-7846bc9fdf03	e751a812-4da9-4726-b375-8495ac2d3354
2020-06-07 13:24:04	2020-06-07 13:24:04	1	1	\N	6	Demo\\Core\\Models\\Navigation	2898a5c0-a8c2-11ea-8eec-05d3ddb23398	7ffd7ee5-deb5-41af-876f-6bac700a35be	e751a812-4da9-4726-b375-8495ac2d3354
2020-06-07 13:24:04	2020-06-07 13:24:04	1	1	\N	6	Demo\\Core\\Models\\FormAction	289f7120-a8c2-11ea-b4f8-7bd2972e4bf9	54e73d14-1a67-4327-91a7-3e5b1aa49a90	e751a812-4da9-4726-b375-8495ac2d3354
2020-06-07 13:24:04	2020-06-07 13:24:04	1	1	\N	6	Demo\\Core\\Models\\FormAction	28a0a8b0-a8c2-11ea-a2e3-23f3e5ce7dc6	0625b4f7-ab22-48ba-9eb2-e748cad64eab	e751a812-4da9-4726-b375-8495ac2d3354
2020-06-07 13:24:04	2020-06-07 13:24:04	1	1	\N	6	Demo\\Core\\Models\\FormAction	28a21f10-a8c2-11ea-8e6d-050b8c2db76b	fa00326d-63d6-4d51-84ee-9567cd8bf986	e751a812-4da9-4726-b375-8495ac2d3354
2020-06-07 13:24:04	2020-06-07 13:24:04	1	1	\N	6	Demo\\Core\\Models\\FormAction	28a35720-a8c2-11ea-b027-8f2b7e0eef92	74aa9c40-9618-4fc2-890f-35d98a81b875	e751a812-4da9-4726-b375-8495ac2d3354
2020-06-07 13:24:04	2020-06-07 13:24:04	1	1	\N	6	Demo\\Core\\Models\\FormAction	28a4e7c0-a8c2-11ea-aeee-9785aed28735	60f9be27-c475-462f-a146-40588aa0bc91	e751a812-4da9-4726-b375-8495ac2d3354
2020-06-07 13:24:04	2020-06-07 13:24:04	1	1	\N	6	Demo\\Core\\Models\\FormAction	28a62f10-a8c2-11ea-8840-f5dfc0972067	c916ac69-bfd1-4ccc-8b75-2d8160831de6	e751a812-4da9-4726-b375-8495ac2d3354
2020-06-07 13:24:04	2020-06-07 13:24:04	1	1	\N	6	Demo\\Core\\Models\\FormAction	28a784a0-a8c2-11ea-99a6-6de2ee7c06c6	eaa211e4-d899-413b-b6ef-64339b3b3626	e751a812-4da9-4726-b375-8495ac2d3354
2020-06-07 13:24:04	2020-06-07 13:24:04	1	1	\N	6	Demo\\Core\\Models\\FormAction	28a8b9e0-a8c2-11ea-8b45-4f0352468a84	27909423-8ed9-4465-801c-c0f081f286fc	e751a812-4da9-4726-b375-8495ac2d3354
2020-06-14 06:00:05	2020-06-14 06:00:05	1	1	\N	6	Demo\\Core\\Models\\Navigation	4b959dd0-ae04-11ea-9164-3fe3652dc825	6f85afbb-3858-4387-b4ce-9f70cf19ed20	e751a812-4da9-4726-b375-8495ac2d3354
2020-06-14 06:00:06	2020-06-14 06:00:06	1	1	\N	6	Demo\\Core\\Models\\Navigation	4ba0eda0-ae04-11ea-a21d-ed3a60d00a8e	6f85afbb-3858-4387-b4ce-9f70cf19ed20	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-15 16:49:48	2020-06-15 16:49:48	1	1	\N	10	Demo\\Core\\Models\\Navigation	399d4ac0-af28-11ea-a2f2-d1568cd44fa4	ede0b65d-15ca-43a2-ab83-11643c154327	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-20 06:33:22	2020-06-20 06:33:22	1	1	\N	6	Demo\\Core\\Models\\Navigation	f05e64c0-b2bf-11ea-872f-f77d0bd20adc	81d30c41-fd09-4757-a6f9-e92463faf8bc	ab9cbba3-c481-4f23-85c7-37b9d8b52357
2020-06-21 05:03:28	2020-06-21 05:03:28	1	1	\N	6	Demo\\Core\\Models\\ListAction	8b68e750-b37c-11ea-b6aa-d7c3f5f65064	4f95d22e-7293-4495-81f8-ee194bac2c8b	e751a812-4da9-4726-b375-8495ac2d3354
2020-06-21 05:03:28	2020-06-21 05:03:28	1	1	\N	6	Demo\\Core\\Models\\ListAction	8b6aa960-b37c-11ea-ac23-31835be01a17	4f95d22e-7293-4495-81f8-ee194bac2c8b	ab9cbba3-c481-4f23-85c7-37b9d8b52357
\.


--
-- Data for Name: demo_core_webhooks; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_core_webhooks (created_at, updated_at, created_by_id, updated_by_id, name, description, active, url, method, request_headers, request_body, condition, event, model, async, timeout, id) FROM stdin;
\.


--
-- Data for Name: demo_notification_channels; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_notification_channels (created_at, updated_at, created_by_id, updated_by_id, script, configuration, active, plugin_id, name, description, id) FROM stdin;
2019-12-27 14:30:24	2019-12-28 04:54:07	1	1	$fromUser = $context->self->getConfig('from_user');\r\n$notification = $context->notification;\r\n$subscribers = $notification->getSubscribers();\r\n$template = $notification->template;\r\n$pluginCon = $context->getPluginConnection('demo.notification');\r\n$logger = $pluginCon->getPluginLogger();\r\nforeach($subscribers as $subscriber){\r\n    $logger->debug('Sending notification '.$template->code .' to '.$subscriber->email);\r\n    $context->Mail::send($template->code, $context->toArray() , function($message) use($notification,$template,$subscriber,$context) {\r\n        $message->to( $subscriber->email, $subscriber->first_name.' '.$subscriber->last_name);  \r\n    });    \r\n}	[{"configuration":"from_user","value":"test@test.com"}]	t	15	Simple Email Channel	Email Notification channel	f48a3095-1c79-4590-9174-42fde7a9973e
2019-12-25 14:14:11	2019-12-27 15:16:37	1	1	$fromUser = $context->self->getConfig('from_user');\r\n$notification = $context->notification;\r\n$subscribers = $notification->getSubscribers();\r\n$template = $notification->template;\r\nforeach($subscribers as $subscriber){\r\n    $context->Mail::queue($template->code, $context->toArray() , function($message) use($notification,$template,$subscriber) {\r\n        $message->to( $subscriber->email, $subscriber->first_name.' '.$subscriber->last_name);    \r\n    });    \r\n}	[{"configuration":"from_user","value":"test@test.com"}]	t	10	Queued Email Channel	Email Notification channel	24647a4c-dbcf-44b0-9704-cc4d5760d6b2
\.


--
-- Data for Name: demo_notification_logs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_notification_logs (created_at, updated_at, created_by_id, updated_by_id, delivered, status, id, notification_id) FROM stdin;
2019-12-27 16:40:07	2019-12-27 16:40:07	1	1	t	success	8bfbe7f0-5efb-4771-bc85-ade436886ebd	\N
2019-12-27 16:40:47	2019-12-27 16:40:47	1	1	t	success	402fb32e-a2d5-4e38-a327-46ecd7e2e347	\N
\.


--
-- Data for Name: demo_notification_notifications; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_notification_notifications (created_at, updated_at, created_by_id, updated_by_id, event, model, name, description, condition, plugin_id, active, enable_logging, id, template_id, channel_id) FROM stdin;
\.


--
-- Data for Name: demo_notification_subscribers; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_notification_subscribers (created_at, updated_at, created_by_id, updated_by_id, plugin_id, id, subscriber_id, subscriber_group_id, notification_id) FROM stdin;
\.


--
-- Data for Name: demo_report_dashboards; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_report_dashboards (created_at, updated_at, created_by_id, updated_by_id, name, description, active, widgets_config, public, code, plugin_id, id) FROM stdin;
2020-05-10 09:22:09	2020-06-22 03:46:18	1	1	Default Deshboard	<p>This is a dummy dashboard</p>	1	[{"x": "0", "y": "0", "width": "5", "height": "4", "widget": "84383d11-89c6-4dac-906c-bb2b08923b53"}, {"x": "5", "y": "0", "width": "7", "height": "4", "widget": "8be0d030-b3d3-11ea-90ed-bfdae0c12a09"}]	0	default-dashboard	3	cc326831-e515-44a8-8eb8-b23b8fa8fdaa
\.


--
-- Data for Name: demo_report_widget_library_associations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_report_widget_library_associations (created_at, updated_at, created_by_id, updated_by_id, plugin_id, id, widget_id, library_id) FROM stdin;
2020-06-21 17:10:38	2020-06-21 17:10:38	1	1	6	2108b230-b3e2-11ea-9b64-67a911a6c96c	84383d11-89c6-4dac-906c-bb2b08923b53	a65cda17-3942-4dac-995b-fd66fe412d1a
2020-06-22 03:50:52	2020-06-22 03:50:52	1	1	6	913a09f0-b43b-11ea-8fab-a77943a730cd	8be0d030-b3d3-11ea-90ed-bfdae0c12a09	72d4e2a0-b375-11ea-a676-43d852c02135
2020-06-23 05:21:39	2020-06-23 05:21:39	1	1	3	6a78aaa0-b511-11ea-9e2e-33598cbdd086	44778960-b508-11ea-bbc1-096310b9696e	72d4e2a0-b375-11ea-a676-43d852c02135
\.


--
-- Data for Name: demo_report_widgets; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_report_widgets (created_at, updated_at, created_by_id, updated_by_id, name, code, description, template, data, script, public, plugin_id, active, id, library_id) FROM stdin;
2019-12-01 07:42:56	2020-06-21 17:10:38	1	1	Queue Iteam Bar Chart	queue-iteam-bar-chart			select name, count(*) as value\r\nfrom (select queue.name, item.id as item_id\r\nfrom demo_workflow_queue_items item,\r\ndemo_workflow_queues queue\r\nwhere queue.id = item.queue_id) as queue_data\r\ngroup by name	var dom = this.getBody();\r\nvar myChart = echarts.init(dom);\r\n\r\noption = {\r\n    tooltip: {\r\n        trigger: 'item',\r\n        formatter: "{a} <br/>{b}: {c} ({d}%)"\r\n    },\r\n    legend: {\r\n        orient: 'vertical',\r\n        x: 'left',\r\n        // data:['直接访问','邮件营销','联盟广告','视频广告','搜索引擎']\r\n    },\r\n    series: [{\r\n        name: 'Queue',\r\n        type: 'pie',\r\n        // radius: ['50%', '70%'],\r\n        avoidLabelOverlap: false,\r\n        data: this.store.data\r\n    }]\r\n};\r\nmyChart.setOption(option);\r\nthis.onResize(function () {\r\n    myChart.resize();\r\n});	0	6	t	84383d11-89c6-4dac-906c-bb2b08923b53	a65cda17-3942-4dac-995b-fd66fe412d1a
2020-06-21 15:26:15	2020-06-22 03:50:52	1	1	Agent Productivity Report	agent-productivity-report			select usr.first_name,\r\n       usr.last_name,\r\n       usr.login,\r\n       usr.email,\r\n       sum(case\r\n             when transition.backward_direction\r\n                     then 1\r\n             else 0\r\n               end)        as backward_direction_count,\r\n       count(transition.*) as total_reviewed,\r\n       count(witems.*)     as total_pending\r\nfrom demo_workflow_workflow_transitions transition\r\n       right join backend_users usr on transition.created_by_id = usr.id\r\n       left join demo_workflow_workflow_items witems on witems.assigned_to_id = usr.id\r\ngroup by usr.id offset {{offset}} limit {{limit}}	var body = this.getBody();\r\n$(body).addClass('ag-theme-balham');\r\nvar columnDefs = [{\r\n        headerName: "SNO",\r\n        field: "sno"\r\n    },\r\n    {\r\n        headerName: "Name",\r\n        field: "name",\r\n         resizable: true \r\n    },\r\n    {\r\n        headerName: "Email",\r\n        field: "email",\r\n         resizable: true \r\n    },\r\n    {\r\n        headerName: "Picked",\r\n        field: "picked",\r\n         resizable: true \r\n    },\r\n    {\r\n        headerName: "Pushed",\r\n        field: "pushed",\r\n         resizable: true \r\n    },\r\n    {\r\n        headerName: "Rejected",\r\n        field: "rejected",\r\n         resizable: true \r\n    },\r\n    {\r\n        headerName: "Pending",\r\n        field: "pending",\r\n         resizable: true \r\n    },\r\n];\r\nvar gridOptions = {\r\n    columnDefs: columnDefs,\r\n    rowData: this.store.data.map(function (record) {\r\n        return {\r\n            sno: record.sno,\r\n            email:record.email,\r\n            name: record.first_name + ' ' + record.last_name,\r\n            picked: record.total_reviewed + record.total_pending,\r\n            pushed: record.total_reviewed - record.backward_direction_count,\r\n            rejected: record.backward_direction_count,\r\n            pending: record.total_pending\r\n        };\r\n    })\r\n};\r\nfunction autoSizeAll() {\r\n  var allColumnIds = [];\r\n  gridOptions.columnApi.getAllColumns().forEach(function(column) {\r\n    allColumnIds.push(column.colId);\r\n  });\r\n\r\n  gridOptions.columnApi.autoSizeColumns(allColumnIds, false);\r\n}\r\nnew agGrid.Grid(body, gridOptions);\r\nif(this.isInsideDashboard()){\r\n    autoSizeAll();\r\n}	0	6	t	8be0d030-b3d3-11ea-90ed-bfdae0c12a09	\N
2020-06-23 04:16:10	2020-06-23 05:21:39	1	1	Agent Productivity - {{db.query('backend_user').where('id',request.param.userId).first()}}	agent-productivity-dbquerybackend_userwhereidrequestparamuseridfirst			return [\r\n    'data'=> $context->evalSql('SELECT * from backend_user where id = {{request.param.userId}}'),\r\n    'user'=> Db::table('backend_user')->where('id',$context->request->get('userId')),\r\n];	this.header.setTitle(this.store.user.email);	0	3	t	44778960-b508-11ea-bbc1-096310b9696e	\N
\.


--
-- Data for Name: demo_workflow_queue_assignment_groups; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_workflow_queue_assignment_groups (created_at, updated_at, created_by_id, updated_by_id, group_id, sort_order, plugin_id, id, queue_id) FROM stdin;
2019-12-01 07:42:56	2019-12-08 08:02:10	1	1	3	1	6	52d49b7f-25d9-4b8b-b2a1-9000cf786a75	85cd4fd8-16a9-482a-b47f-ff7bae2b79d3
2019-12-01 07:42:56	2019-12-08 08:02:10	1	1	4	3	6	49b78145-0bc7-4f10-82ff-c3be8b87867d	\N
2020-05-31 12:54:22	2020-05-31 12:54:22	1	1	1	100	6	98ea3b1f-954d-4199-9dc7-74516bad65ee	6d9b966c-96ae-4377-88bb-bd68c64ae5bd
2020-06-07 04:13:30	2020-06-07 04:13:30	1	1	3	100	6	3e9183c0-a875-11ea-9502-05990bea0014	b875f437-6cb0-4fe6-8cdf-a7ab3b92a369
2020-06-07 05:48:38	2020-06-07 05:48:38	1	1	2	100	6	88bf4020-a882-11ea-a4b6-d99aa93534a8	c83b37aa-0fd9-4987-bff7-1a604da1ffde
\.


--
-- Data for Name: demo_workflow_queue_items; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_workflow_queue_items (assigned_to_id, model, created_at, updated_at, poped_at, created_by_id, updated_by_id, plugin_id, id, queue_id, record_id) FROM stdin;
\N	Demo\\Workflow\\Models\\WorkflowItem	2020-07-05 14:12:37	2020-07-05 14:12:37	\N	1	1	1	93f2fb50-bec9-11ea-92c8-37400664eb82	c83b37aa-0fd9-4987-bff7-1a604da1ffde	8dd57680-bec9-11ea-9157-a35faa4a956c
1	Demo\\Workflow\\Models\\WorkflowItem	2020-07-05 14:27:09	2020-07-05 14:27:09	\N	1	1	1	9be4bd90-becb-11ea-a50c-c3d34047a892	b875f437-6cb0-4fe6-8cdf-a7ab3b92a369	9bdae480-becb-11ea-93d8-839f540d3201
1	Demo\\Workflow\\Models\\WorkflowItem	2020-07-05 14:12:26	2020-07-05 14:12:26	2020-07-05 14:27:10	1	1	1	8ddf09b0-bec9-11ea-bd33-1db1effed2e5	b875f437-6cb0-4fe6-8cdf-a7ab3b92a369	8dd57680-bec9-11ea-9157-a35faa4a956c
1	Demo\\Workflow\\Models\\WorkflowItem	2020-07-05 14:27:10	2020-07-05 14:27:10	\N	1	1	1	9cc2e450-becb-11ea-a4ac-6d1525391f98	b875f437-6cb0-4fe6-8cdf-a7ab3b92a369	9cb91bd0-becb-11ea-a623-57a0e0ff0756
\.


--
-- Data for Name: demo_workflow_queue_pop_criterias; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_workflow_queue_pop_criterias (created_at, updated_at, created_by_id, updated_by_id, name, description, script, plugin_id, id) FROM stdin;
2019-11-16 13:07:42	2020-04-06 16:22:31	1	1	Simple Pop Criteria	This will pop any random item from queue	return $context->query->where('demo_workflow_queue_items.model','Demo\\Workflow\\Models\\WorkflowItem');	6	b9aadb51-d325-48d2-a903-c2e12fbbad34
\.


--
-- Data for Name: demo_workflow_queue_routing_rules; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_workflow_queue_routing_rules (created_at, updated_at, created_by_id, updated_by_id, script, name, description, plugin_id, id) FROM stdin;
2019-11-16 14:33:18	2020-04-04 07:28:11	1	1	$model = $context->model; \r\nif(empty($model)){\r\nthrow new $context->exception->ApplicationException('No item left to assign');\r\n}\r\nreturn $context->currentUser;	Route to current User	Route to current User	6	0e0ccad0-13fe-447e-a476-966159910a54
\.


--
-- Data for Name: demo_workflow_queues; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_workflow_queues (name, description, script, queue_order, sort_order, input_condition, model, redundancy_policy, created_at, updated_at, created_by_id, updated_by_id, plugin_id, virtual, active, id, service_channel_id, pop_criteria_id, routing_rule_id) FROM stdin;
Doctor Queue	All case in this queue will be assigned to a doctor		simple_queue	-900	if($context->event==='updating'){\r\nif($context->model->isDirty('current_state_id')){\r\nreturn $context->model->current_state->code === 'doctor';\r\n}\r\n}\r\nreturn false;		override	2019-10-13 03:46:56	2020-04-04 13:26:49	1	1	6	f	t	85cd4fd8-16a9-482a-b47f-ff7bae2b79d3	6aec2f36-3de0-4131-b326-de418cb8549a	b9aadb51-d325-48d2-a903-c2e12fbbad34	0e0ccad0-13fe-447e-a476-966159910a54
Check IN - Case Workflow Assignment Queue1	This queue will assign the case to current user who created the case	$workflowEntity = new Demo\\Casemanager\\Models\\WorkflowEntityl();\r\n$workflowEntity->workflow = Demo\\Casemanager\\Models\\Workflow::where('code','case-workflow')->get()->first();\r\n$workflowEntity->entity_id = $item->id;\r\n$workflowEntity->entity_type = get_class($item);\r\n// throw new \\Error(json_encode($workflowEntity->workflow->definition,true));\r\n$from_state = new Demo\\Casemanager\\Models\\WorkflowState();\r\n$from_state->id  = $workflowEntity->workflow->definition[0]['from_state'];\r\n$workflowEntity->current_state = $from_state;\r\n$workflowEntity->assigned_to = $this->getCurrentUser();\r\n$workflowEntity->save();	stack	-1	return $context->event==='creating';		addNew	2019-10-06 10:07:03	2020-06-07 04:13:30	1	1	6	t	t	b875f437-6cb0-4fe6-8cdf-a7ab3b92a369	6aec2f36-3de0-4131-b326-de418cb8549a	b9aadb51-d325-48d2-a903-c2e12fbbad34	0e0ccad0-13fe-447e-a476-966159910a54
Quality Queue	All case in this queue will be assigned to a Quality		simple_queue	-900	if($context->event==='updating'){\r\n    if($context->model->isDirty('current_state_id')){\r\n        return $context->model->current_state->code === 'quality';\r\n    }\r\n}\r\nreturn false;		override	2019-10-13 03:46:56	2020-06-07 05:48:38	1	1	6	f	t	c83b37aa-0fd9-4987-bff7-1a604da1ffde	6aec2f36-3de0-4131-b326-de418cb8549a	b9aadb51-d325-48d2-a903-c2e12fbbad34	0e0ccad0-13fe-447e-a476-966159910a54
Admin Queue	All case in this queue will be assigned to a Admin		simple_queue	-900	if($context->event==='updating'){\r\nif($context->model->isDirty('current_state_id')){\r\nreturn $context->model->current_state->code === 'admin';\r\n}\r\n}\r\nreturn false;		override	2019-10-13 03:46:56	2020-05-31 12:54:23	1	1	6	f	t	6d9b966c-96ae-4377-88bb-bd68c64ae5bd	6aec2f36-3de0-4131-b326-de418cb8549a	b9aadb51-d325-48d2-a903-c2e12fbbad34	0e0ccad0-13fe-447e-a476-966159910a54
\.


--
-- Data for Name: demo_workflow_service_channels; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_workflow_service_channels (created_at, updated_at, created_by_id, updated_by_id, plugin_id, name, event, description, model, inbox_order, active, assigned_to_field, assignment_capacity, condition, id) FROM stdin;
2020-04-04 06:03:08	2020-04-04 07:22:51	1	1	6	Case Assignment Channel	["creating","updating"]		Demo\\Workflow\\Models\\WorkflowItem	1	t	assigned_to_id	-1	return strtolower($context->model->model) === 'demo\\casemanager\\models\\casemodel';	6aec2f36-3de0-4131-b326-de418cb8549a
\.


--
-- Data for Name: demo_workflow_workflow_items; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_workflow_workflow_items (created_by_id, updated_by_id, model, created_at, updated_at, assigned_at, assigned_to_id, finished_at, plugin_id, id, workflow_id, record_id, current_state_id) FROM stdin;
1	1	Demo\\Casemanager\\Models\\CaseModel	2020-06-14 06:45:44	2020-06-14 09:21:18	\N	\N	\N	10	abab1080-ae0a-11ea-a560-9be5a4bca4e2	dd25a3b6-0e8b-4af7-b50d-d9030068b84a	ab979270-ae0a-11ea-8a21-bd39412de736	16d9ddab-a130-4bbd-8d5c-b3e82fbf00de
1	1	Demo\\Casemanager\\Models\\CaseModel	2020-06-20 09:18:05	2020-06-20 09:18:15	\N	\N	\N	10	f27b8800-b2d6-11ea-896a-4f4de426e27e	dd25a3b6-0e8b-4af7-b50d-d9030068b84a	f2628130-b2d6-11ea-9857-af73e7931f92	16d9ddab-a130-4bbd-8d5c-b3e82fbf00de
1	1	Demo\\Casemanager\\Models\\CaseModel	2020-07-05 14:12:27	2020-07-05 14:12:37	\N	\N	\N	10	8dd57680-bec9-11ea-9157-a35faa4a956c	dd25a3b6-0e8b-4af7-b50d-d9030068b84a	8dc0d800-bec9-11ea-8024-69f5b89267d0	16d9ddab-a130-4bbd-8d5c-b3e82fbf00de
1	1	Demo\\Casemanager\\Models\\CaseModel	2020-07-05 14:27:09	2020-07-05 14:27:09	\N	1	\N	10	9bdae480-becb-11ea-93d8-839f540d3201	dd25a3b6-0e8b-4af7-b50d-d9030068b84a	9bcbd910-becb-11ea-8a82-27160d7ae9f3	09dfd34e-0db5-49f3-96b2-23831d811a0b
1	1	Demo\\Casemanager\\Models\\CaseModel	2020-07-05 14:27:11	2020-07-05 14:27:11	\N	1	\N	10	9cb91bd0-becb-11ea-a623-57a0e0ff0756	dd25a3b6-0e8b-4af7-b50d-d9030068b84a	9caa4610-becb-11ea-9b6a-9df544c173f0	09dfd34e-0db5-49f3-96b2-23831d811a0b
\.


--
-- Data for Name: demo_workflow_workflow_states; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_workflow_workflow_states (created_at, updated_at, created_by_id, updated_by_id, name, description, active, code, plugin_id, id) FROM stdin;
2019-10-12 10:41:21	2019-10-12 10:41:21	1	1	Doctor		1	doctor	6	c5a45023-2d2a-48ca-94b1-3097c0af7d05
2019-10-12 10:41:09	2019-10-12 10:41:09	1	1	Quality		1	quality	6	16d9ddab-a130-4bbd-8d5c-b3e82fbf00de
2019-10-12 10:40:02	2019-10-12 10:40:02	1	1	Start		1	start	10	09dfd34e-0db5-49f3-96b2-23831d811a0b
2019-10-12 10:41:30	2019-10-12 10:41:56	1	1	Finish		1	finish	10	8c7e9158-b65c-437a-a5d9-4b975f7b6f51
2020-05-04 13:36:46	2020-05-04 13:36:46	1	1	Before Finish		1	before-finish	6	bfc699c2-db96-4358-85e3-9956a4c815a4
\.


--
-- Data for Name: demo_workflow_workflow_transitions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_workflow_workflow_transitions (created_at, updated_at, created_by_id, updated_by_id, data, plugin_id, column_12, backward_direction, id, workflow_item_id, from_state_id, to_state_id) FROM stdin;
2020-07-05 14:12:37	2020-07-05 14:12:37	1	1	[]	10	\N	f	94414de0-bec9-11ea-8070-3d0dc703cbb4	8dd57680-bec9-11ea-9157-a35faa4a956c	09dfd34e-0db5-49f3-96b2-23831d811a0b	16d9ddab-a130-4bbd-8d5c-b3e82fbf00de
\.


--
-- Data for Name: demo_workflow_workflows; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY demo_workflow_workflows (created_at, updated_at, active, name, code, description, definition, created_by_id, updated_by_id, plugin_id, sort_order, model, input_condition, event, id, model_state_field) FROM stdin;
2019-10-08 08:17:55	2020-06-07 06:50:20	1	Case Workflow	case-workflow	Case Workflow sdsdsd	[{"from_state":"09dfd34e-0db5-49f3-96b2-23831d811a0b","to_state":"16d9ddab-a130-4bbd-8d5c-b3e82fbf00de"},{"from_state":"16d9ddab-a130-4bbd-8d5c-b3e82fbf00de","to_state":"c5a45023-2d2a-48ca-94b1-3097c0af7d05"},{"from_state":"c5a45023-2d2a-48ca-94b1-3097c0af7d05","to_state":"8c7e9158-b65c-437a-a5d9-4b975f7b6f51"}]	1	1	6	0	Demo\\Casemanager\\Models\\CaseModel	return true;	created	dd25a3b6-0e8b-4af7-b50d-d9030068b84a	workflow_state_id
\.


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
16	5ee5c98de2990003534932.js	5eb7be71099c4460323585.js	749597	text/plain	\N	\N	javascript_files	a65cda17-3942-4dac-995b-fd66fe412d1a	Demo\\Core\\Models\\JavascriptLibrary	t	16	2020-06-14 06:54:06	2020-06-14 06:54:07
17	5eeede355080a092973094.js	ag-grid-community.min.js	1759973	application/octet-stream	Ag Grid Community Edition		javascript_files	72d4e2a0-b375-11ea-a676-43d852c02135	Demo\\Core\\Models\\JavascriptLibrary	t	17	2020-06-21 04:12:37	2020-06-21 04:13:41
19	5eeedf9c07ebc500738193.css	Chart.min.css	521	text/plain	\N	\N	css_files	484b31f0-b376-11ea-a48a-af29a00365d7	Demo\\Core\\Models\\JavascriptLibrary	t	19	2020-06-21 04:18:36	2020-06-21 04:18:39
18	5eeedf97dfd2d947563701.js	Chart.min.js	172812	text/plain	\N	\N	javascript_files	484b31f0-b376-11ea-a48a-af29a00365d7	Demo\\Core\\Models\\JavascriptLibrary	t	18	2020-06-21 04:18:32	2020-06-21 04:18:39
\.


--
-- Name: system_files_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('system_files_id_seq', 20, true);


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

COPY system_parameters (id, namespace, "group", item, value, data_type, description) FROM stdin;
4	system	core	build	465	text	\N
2	system	update	retry	1592755368	text	\N
1	system	update	count	0	text	\N
5	cms	theme	active	"adminlte"	text	\N
3	cyd293.backendskin	skin	active	"nobleui"	text	\N
\.


--
-- Name: system_parameters_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('system_parameters_id_seq', 5, true);


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
186	Demo.Report	script	1.0.4	builder_table_create_demo_report_widget_library_associations.php	2020-06-20 16:05:58
187	Demo.Report	comment	1.0.4	Created table demo_report_widget_library_associations	2020-06-20 16:05:58
\.


--
-- Name: system_plugin_history_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('system_plugin_history_id_seq', 187, true);


--
-- Data for Name: system_plugin_versions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY system_plugin_versions (id, code, version, created_at, is_disabled, is_frozen) FROM stdin;
3	Demo.Notification	1.0.5	2020-04-26 05:34:28	f	f
8	RainLab.Builder	1.0.26	2020-04-26 05:34:29	f	f
11	Demo.Workflow	1.0.11	2020-04-26 05:34:29	f	f
2	Indikator.Backend	1.6.11	2020-04-26 05:34:29	f	f
6	Demo.Casemanager	1.0.4	2020-04-27 11:41:41	f	f
9	Cyd293.BackendSkin	1.1.2	2020-05-05 14:35:38	f	f
10	Demo.Core	1.0.23	2020-05-16 05:03:16	f	f
14	Demo.Report	1.0.4	2020-06-20 16:05:58	f	f
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
-- Name: demo_casemanager_case_priorities demo_casemanager_case_priorities_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_casemanager_case_priorities
    ADD CONSTRAINT demo_casemanager_case_priorities_pk PRIMARY KEY (id);


--
-- Name: demo_casemanager_cases demo_casemanager_cases_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_casemanager_cases
    ADD CONSTRAINT demo_casemanager_cases_pk PRIMARY KEY (id);


--
-- Name: demo_casemanager_projects demo_casemanager_projects_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_casemanager_projects
    ADD CONSTRAINT demo_casemanager_projects_pk PRIMARY KEY (id);


--
-- Name: demo_core_audit_logs demo_core_audit_logs_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_audit_logs
    ADD CONSTRAINT demo_core_audit_logs_pk PRIMARY KEY (id);


--
-- Name: demo_core_commands demo_core_commands_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_commands
    ADD CONSTRAINT demo_core_commands_pk PRIMARY KEY (id);


--
-- Name: demo_core_custom_fields demo_core_custom_fields_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_custom_fields
    ADD CONSTRAINT demo_core_custom_fields_pk PRIMARY KEY (id);


--
-- Name: demo_core_event_handlers demo_core_event_handlers_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_event_handlers
    ADD CONSTRAINT demo_core_event_handlers_pk PRIMARY KEY (id);


--
-- Name: demo_core_form_actions demo_core_form_actions_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_form_actions
    ADD CONSTRAINT demo_core_form_actions_pk PRIMARY KEY (id);


--
-- Name: demo_core_form_fields demo_core_form_fields_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_form_fields
    ADD CONSTRAINT demo_core_form_fields_pk PRIMARY KEY (id);


--
-- Name: demo_core_iframes demo_core_iframes_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_iframes
    ADD CONSTRAINT demo_core_iframes_pk PRIMARY KEY (id);


--
-- Name: demo_core_inbound_api demo_core_inbound_api_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_inbound_api
    ADD CONSTRAINT demo_core_inbound_api_pk PRIMARY KEY (id);


--
-- Name: demo_core_libraries demo_core_libraries_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_libraries
    ADD CONSTRAINT demo_core_libraries_pk PRIMARY KEY (id);


--
-- Name: demo_core_list_actions demo_core_list_actions_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_list_actions
    ADD CONSTRAINT demo_core_list_actions_pk PRIMARY KEY (id);


--
-- Name: demo_core_model_associations demo_core_model_associations_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_model_associations
    ADD CONSTRAINT demo_core_model_associations_pk PRIMARY KEY (id);


--
-- Name: demo_core_models demo_core_models_model_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_models
    ADD CONSTRAINT demo_core_models_model_unique UNIQUE (model);


--
-- Name: demo_core_models demo_core_models_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_models
    ADD CONSTRAINT demo_core_models_pk PRIMARY KEY (id);


--
-- Name: demo_core_navigations demo_core_navigations_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_navigations
    ADD CONSTRAINT demo_core_navigations_pk PRIMARY KEY (id);


--
-- Name: demo_core_permission_policy_associations demo_core_permission_policy_associations_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_permission_policy_associations
    ADD CONSTRAINT demo_core_permission_policy_associations_pk PRIMARY KEY (id);


--
-- Name: demo_core_permissions demo_core_permissions_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_permissions
    ADD CONSTRAINT demo_core_permissions_pk PRIMARY KEY (id);


--
-- Name: demo_core_role_policy_associations demo_core_role_policy_associations_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_role_policy_associations
    ADD CONSTRAINT demo_core_role_policy_associations_pk PRIMARY KEY (id);


--
-- Name: demo_core_roles demo_core_roles_code_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_roles
    ADD CONSTRAINT demo_core_roles_code_unique UNIQUE (code);


--
-- Name: demo_core_roles demo_core_roles_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_roles
    ADD CONSTRAINT demo_core_roles_pk PRIMARY KEY (id);


--
-- Name: demo_core_security_policies demo_core_security_policies_name_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_security_policies
    ADD CONSTRAINT demo_core_security_policies_name_unique UNIQUE (name);


--
-- Name: demo_core_security_policies demo_core_security_policies_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_security_policies
    ADD CONSTRAINT demo_core_security_policies_pk PRIMARY KEY (id);


--
-- Name: demo_core_ui_pages demo_core_ui_pages_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_ui_pages
    ADD CONSTRAINT demo_core_ui_pages_pk PRIMARY KEY (id);


--
-- Name: demo_core_user_role_associations demo_core_user_role_associations_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_user_role_associations
    ADD CONSTRAINT demo_core_user_role_associations_pk PRIMARY KEY (id);


--
-- Name: demo_core_view_role_associations demo_core_view_role_associations_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_view_role_associations
    ADD CONSTRAINT demo_core_view_role_associations_pk PRIMARY KEY (id);


--
-- Name: demo_core_webhooks demo_core_webhooks_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_core_webhooks
    ADD CONSTRAINT demo_core_webhooks_pk PRIMARY KEY (id);


--
-- Name: demo_notification_channels demo_notification_channels_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_notification_channels
    ADD CONSTRAINT demo_notification_channels_pk PRIMARY KEY (id);


--
-- Name: demo_notification_logs demo_notification_logs_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_notification_logs
    ADD CONSTRAINT demo_notification_logs_pk PRIMARY KEY (id);


--
-- Name: demo_notification_notifications demo_notification_notifications_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_notification_notifications
    ADD CONSTRAINT demo_notification_notifications_pk PRIMARY KEY (id);


--
-- Name: demo_notification_subscribers demo_notification_subscribers_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_notification_subscribers
    ADD CONSTRAINT demo_notification_subscribers_pk PRIMARY KEY (id);


--
-- Name: demo_report_dashboards demo_report_dashboards_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_report_dashboards
    ADD CONSTRAINT demo_report_dashboards_pk PRIMARY KEY (id);


--
-- Name: demo_report_widget_library_associations demo_report_widget_library_associations_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_report_widget_library_associations
    ADD CONSTRAINT demo_report_widget_library_associations_pk PRIMARY KEY (id);


--
-- Name: demo_report_widgets demo_report_widgets_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_report_widgets
    ADD CONSTRAINT demo_report_widgets_pk PRIMARY KEY (id);


--
-- Name: demo_workflow_queue_assignment_groups demo_workflow_queue_assignment_groups_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_workflow_queue_assignment_groups
    ADD CONSTRAINT demo_workflow_queue_assignment_groups_pk PRIMARY KEY (id);


--
-- Name: demo_workflow_queue_items demo_workflow_queue_items_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_workflow_queue_items
    ADD CONSTRAINT demo_workflow_queue_items_pk PRIMARY KEY (id);


--
-- Name: demo_workflow_queue_pop_criterias demo_workflow_queue_pop_criterias_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_workflow_queue_pop_criterias
    ADD CONSTRAINT demo_workflow_queue_pop_criterias_pk PRIMARY KEY (id);


--
-- Name: demo_workflow_queue_routing_rules demo_workflow_queue_routing_rules_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_workflow_queue_routing_rules
    ADD CONSTRAINT demo_workflow_queue_routing_rules_pk PRIMARY KEY (id);


--
-- Name: demo_workflow_queues demo_workflow_queues_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_workflow_queues
    ADD CONSTRAINT demo_workflow_queues_pk PRIMARY KEY (id);


--
-- Name: demo_workflow_service_channels demo_workflow_service_channels_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_workflow_service_channels
    ADD CONSTRAINT demo_workflow_service_channels_pk PRIMARY KEY (id);


--
-- Name: demo_workflow_workflow_items demo_workflow_workflow_items_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_workflow_workflow_items
    ADD CONSTRAINT demo_workflow_workflow_items_pk PRIMARY KEY (id);


--
-- Name: demo_workflow_workflow_states demo_workflow_workflow_states_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_workflow_workflow_states
    ADD CONSTRAINT demo_workflow_workflow_states_pk PRIMARY KEY (id);


--
-- Name: demo_workflow_workflow_transitions demo_workflow_workflow_transitions_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_workflow_workflow_transitions
    ADD CONSTRAINT demo_workflow_workflow_transitions_pk PRIMARY KEY (id);


--
-- Name: demo_workflow_workflows demo_workflow_workflows_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY demo_workflow_workflows
    ADD CONSTRAINT demo_workflow_workflows_pk PRIMARY KEY (id);


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

