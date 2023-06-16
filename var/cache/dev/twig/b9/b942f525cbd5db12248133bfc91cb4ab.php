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

/* lastfm/getsession.html.twig */
class __TwigTemplate_5ed25242e64248716e015bbbf473add5 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "lastfm/getsession.html.twig"));

        $this->parent = $this->loadTemplate("layout.html.twig", "lastfm/getsession.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Getsession";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 5
    public function block_page_contents($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "page_contents"));

        // line 6
        echo "    ";
        if ((isset($context["getsession"]) || array_key_exists("getsession", $context) ? $context["getsession"] : (function () { throw new RuntimeError('Variable "getsession" does not exist.', 6, $this->source); })())) {
            // line 7
            echo "        <p><a href=\"";
            echo twig_escape_filter($this->env, (isset($context["getsession"]) || array_key_exists("getsession", $context) ? $context["getsession"] : (function () { throw new RuntimeError('Variable "getsession" does not exist.', 7, $this->source); })()), "html", null, true);
            echo "\">Save session</a></p>
      ";
        }
        // line 8
        echo "    
    ";
        // line 9
        if ((isset($context["sessionkey"]) || array_key_exists("sessionkey", $context) ? $context["sessionkey"] : (function () { throw new RuntimeError('Variable "sessionkey" does not exist.', 9, $this->source); })())) {
            // line 10
            echo "        <p>Session key: ";
            echo twig_escape_filter($this->env, (isset($context["sessionkey"]) || array_key_exists("sessionkey", $context) ? $context["sessionkey"] : (function () { throw new RuntimeError('Variable "sessionkey" does not exist.', 10, $this->source); })()), "html", null, true);
            echo "</p>
        <p>New configuration was saved to the file</p>
     ";
        }
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "lastfm/getsession.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 10,  85 => 9,  82 => 8,  76 => 7,  73 => 6,  66 => 5,  53 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'layout.html.twig' %}

{% block title %}Getsession{% endblock %}

{% block page_contents %}
    {% if getsession %}
        <p><a href=\"{{ getsession  }}\">Save session</a></p>
      {% endif %}    
    {% if sessionkey %}
        <p>Session key: {{  sessionkey }}</p>
        <p>New configuration was saved to the file</p>
     {% endif %}
{% endblock %}
", "lastfm/getsession.html.twig", "/home/fb/Backup/Dokumenty/public_html/dscrobbler/templates/lastfm/getsession.html.twig");
    }
}
