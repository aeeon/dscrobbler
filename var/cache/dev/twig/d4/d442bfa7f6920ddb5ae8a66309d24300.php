<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* settings/settings.html.twig */
class __TwigTemplate_f0ec736ff9b54a38e543b19e6e372c8a extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'page_contents' => [$this, 'block_page_contents'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "settings/settings.html.twig"));

        $this->parent = $this->loadTemplate("layout.html.twig", "settings/settings.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Settings";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 5
    public function block_page_contents($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "page_contents"));

        // line 6
        echo "    <h1>Settings</h1>

    <div>
                ";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 9, $this->source); })()), "flashes", [], "any", false, false, false, 9));
        foreach ($context['_seq'] as $context["label"] => $context["messages"]) {
            // line 10
            echo "
            ";
            // line 11
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["messages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 12
                echo "
                <div class=\"alert alert-";
                // line 13
                echo twig_escape_filter($this->env, $context["label"], "html", null, true);
                echo " col-md-6 offset-md-3 col-xs-12\" role=\"alert\">
                    ";
                // line 14
                echo twig_escape_filter($this->env, $context["message"], "html", null, true);
                echo "
                </div>

            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 18
            echo "
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['label'], $context['messages'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "    </div>
    <form action=\"";
        // line 21
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("settings_update");
        echo "\" method=\"POST\">
                  <fieldset>
        <legend>General</legend>
        <p>
        <label for=\"baseurl\">Base Url</label><input type=\"text\" name=\"baseurl\" id=\"baseurl\" value=\"";
        // line 25
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 25, $this->source); })()), "baseurl", [], "any", false, false, false, 25), "html", null, true);
        echo "\" />
        </p>
               
                  </fieldset>
          <fieldset>
        <legend>Deezer</legend>
        <p>
        <label for=\"deezer_apikey\">API Key</label><input type=\"text\" name=\"deezer[apikey]\" id=\"deezer_apikey\" value=\"";
        // line 32
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 32, $this->source); })()), "deezer", [], "any", false, false, false, 32), "apikey", [], "any", false, false, false, 32), "html", null, true);
        echo "\" />
        </p>
                  <p>
            <label for=\"deezer_secret\">Secret</label><input type=\"text\" name=\"deezer[secret]\" id=\"lastfm_secret\" value=\"";
        // line 35
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 35, $this->source); })()), "deezer", [], "any", false, false, false, 35), "secret", [], "any", false, false, false, 35), "html", null, true);
        echo "\" />
        </p>
                <p>
            <label for=\"deezer_appid\">AppId</label><input type=\"text\" name=\"deezer[appid]\" id=\"lastfm_appid\" value=\"";
        // line 38
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 38, $this->source); })()), "deezer", [], "any", false, false, false, 38), "appid", [], "any", false, false, false, 38), "html", null, true);
        echo "\" />
        </p>
          
          </fieldset>
           <fieldset>
        <legend>LastFM</legend>
        <p><label for=\"lastfm_username\">Username</label><input type=\"text\" name=\"lastfm[username]\" id=\"lastfm_username\" value=\"";
        // line 44
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 44, $this->source); })()), "lastfm", [], "any", false, false, false, 44), "username", [], "any", false, false, false, 44), "html", null, true);
        echo "\" />
        </p><p>
            <label for=\"lastfm_subscriber\">Subscriber</label><input type=\"text\" name=\"lastfm[subscriber]\" id=\"lastfm_subscriber\" value=\"";
        // line 46
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 46, $this->source); })()), "lastfm", [], "any", false, false, false, 46), "subscriber", [], "any", false, false, false, 46), "html", null, true);
        echo "\" />
        </p>
        <p>
            <label for=\"lastfm_apikey\">ApiKey</label><input type=\"text\" name=\"lastfm[apiKey]\" id=\"lastfm_apikey\" value=\"";
        // line 49
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 49, $this->source); })()), "lastfm", [], "any", false, false, false, 49), "apiKey", [], "any", false, false, false, 49), "html", null, true);
        echo "\" />
        </p>
          <p>
            <label for=\"lastfm_apisecret\">Secret</label><input type=\"text\" name=\"lastfm[apiSecret]\" id=\"lastfm_apisecret\" value=\"";
        // line 52
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 52, $this->source); })()), "lastfm", [], "any", false, false, false, 52), "apiSecret", [], "any", false, false, false, 52), "html", null, true);
        echo "\" />
        </p>
                <p>
            <label for=\"lastfm_sessionkey\">SessionKey</label><input type=\"text\" name=\"lastfm[sessionKey]\" id=\"lastfm_sessionKey\" value=\"";
        // line 55
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 55, $this->source); })()), "lastfm", [], "any", false, false, false, 55), "sessionKey", [], "any", false, false, false, 55), "html", null, true);
        echo "\" />
        </p>
           </fieldset>
           <fieldset>
        <legend>Listenbrainz</legend>
        <p><label for=\"listenbrainz_username\">Username</label><input type=\"text\" name=\"listenbrainz[username]\" id=\"listenbrainz_username\" value=\"";
        // line 60
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 60, $this->source); })()), "listenbrainz", [], "any", false, false, false, 60), "username", [], "any", false, false, false, 60), "html", null, true);
        echo "\" />
        </p><p>
            <label for=\"listenbrainz_token\">Token</label><input type=\"text\" name=\"listenbrainz[token]\" id=\"listenbrainz_token\" value=\"";
        // line 62
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 62, $this->source); })()), "listenbrainz", [], "any", false, false, false, 62), "token", [], "any", false, false, false, 62), "html", null, true);
        echo "\" />
        </p>
           </fieldset>  
        <input type=\"hidden\" name=\"submitted\" value=\"1\" />
        <p><input type=\"submit\" value=\"Zapisz\"/></p>
    </form>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "settings/settings.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  190 => 62,  185 => 60,  177 => 55,  171 => 52,  165 => 49,  159 => 46,  154 => 44,  145 => 38,  139 => 35,  133 => 32,  123 => 25,  116 => 21,  113 => 20,  106 => 18,  96 => 14,  92 => 13,  89 => 12,  85 => 11,  82 => 10,  78 => 9,  73 => 6,  66 => 5,  53 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'layout.html.twig' %}

{% block title %}Settings{% endblock %}

{% block page_contents %}
    <h1>Settings</h1>

    <div>
                {% for label, messages in app.flashes %}

            {% for message in messages %}

                <div class=\"alert alert-{{ label }} col-md-6 offset-md-3 col-xs-12\" role=\"alert\">
                    {{ message }}
                </div>

            {% endfor %}

        {% endfor %}
    </div>
    <form action=\"{{  path('settings_update') }}\" method=\"POST\">
                  <fieldset>
        <legend>General</legend>
        <p>
        <label for=\"baseurl\">Base Url</label><input type=\"text\" name=\"baseurl\" id=\"baseurl\" value=\"{{ data.baseurl }}\" />
        </p>
               
                  </fieldset>
          <fieldset>
        <legend>Deezer</legend>
        <p>
        <label for=\"deezer_apikey\">API Key</label><input type=\"text\" name=\"deezer[apikey]\" id=\"deezer_apikey\" value=\"{{ data.deezer.apikey }}\" />
        </p>
                  <p>
            <label for=\"deezer_secret\">Secret</label><input type=\"text\" name=\"deezer[secret]\" id=\"lastfm_secret\" value=\"{{ data.deezer.secret }}\" />
        </p>
                <p>
            <label for=\"deezer_appid\">AppId</label><input type=\"text\" name=\"deezer[appid]\" id=\"lastfm_appid\" value=\"{{ data.deezer.appid }}\" />
        </p>
          
          </fieldset>
           <fieldset>
        <legend>LastFM</legend>
        <p><label for=\"lastfm_username\">Username</label><input type=\"text\" name=\"lastfm[username]\" id=\"lastfm_username\" value=\"{{ data.lastfm.username }}\" />
        </p><p>
            <label for=\"lastfm_subscriber\">Subscriber</label><input type=\"text\" name=\"lastfm[subscriber]\" id=\"lastfm_subscriber\" value=\"{{ data.lastfm.subscriber }}\" />
        </p>
        <p>
            <label for=\"lastfm_apikey\">ApiKey</label><input type=\"text\" name=\"lastfm[apiKey]\" id=\"lastfm_apikey\" value=\"{{ data.lastfm.apiKey }}\" />
        </p>
          <p>
            <label for=\"lastfm_apisecret\">Secret</label><input type=\"text\" name=\"lastfm[apiSecret]\" id=\"lastfm_apisecret\" value=\"{{ data.lastfm.apiSecret }}\" />
        </p>
                <p>
            <label for=\"lastfm_sessionkey\">SessionKey</label><input type=\"text\" name=\"lastfm[sessionKey]\" id=\"lastfm_sessionKey\" value=\"{{ data.lastfm.sessionKey }}\" />
        </p>
           </fieldset>
           <fieldset>
        <legend>Listenbrainz</legend>
        <p><label for=\"listenbrainz_username\">Username</label><input type=\"text\" name=\"listenbrainz[username]\" id=\"listenbrainz_username\" value=\"{{ data.listenbrainz.username }}\" />
        </p><p>
            <label for=\"listenbrainz_token\">Token</label><input type=\"text\" name=\"listenbrainz[token]\" id=\"listenbrainz_token\" value=\"{{ data.listenbrainz.token }}\" />
        </p>
           </fieldset>  
        <input type=\"hidden\" name=\"submitted\" value=\"1\" />
        <p><input type=\"submit\" value=\"Zapisz\"/></p>
    </form>
{% endblock %}
", "settings/settings.html.twig", "/home/fb/Backup/Dokumenty/public_html/dscrobbler/templates/settings/settings.html.twig");
    }
}
