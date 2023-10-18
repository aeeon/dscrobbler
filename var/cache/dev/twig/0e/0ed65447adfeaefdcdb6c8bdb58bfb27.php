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

/* lastfm/connect.html.twig */
class __TwigTemplate_176d1f4891ddb7f5d68cff443a39db76 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "lastfm/connect.html.twig"));

        $this->parent = $this->loadTemplate("layout.html.twig", "lastfm/connect.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Lastfm connection";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 5
    public function block_page_contents($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "page_contents"));

        // line 6
        echo "    <h1>Connected</h1>

    <script>
\$(document).ready( function() {

        // for example your fieldname id is \"field\"
        \$( \"button#form_saveAndAdd\").click( function(event){
                    var inputVal = \$('#form_id').val();
                    \$.ajax
                    ({
                        type: \"POST\",
                        url: '";
        // line 17
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("deezer_load");
        echo "',
                        data: \"id=\"+inputVal,
                    })
                    .done(function(data) {
                          \$(\"#form_title\").val(data.title);
                         \$(\"#form_artist\").val(data.artist);
                        console.log(data);
                    });

        });
   });
\$(document).on(\"submit\", \"form\", function(event)
{
    event.preventDefault();

    \$.ajax({
        url: '";
        // line 33
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("lastfm_scrobble");
        echo "',
        type: 'POST',
        dataType: \"JSON\",
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function (data, status)
        {
            console.log(data);
        },
        error: function (xhr, desc, err)
        {
            console.log(\"error\");
        }
    });
});
    </script>

    ";
        // line 51
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 51, $this->source); })()), 'form_start');
        echo "
    <div class=\"my-custom-class-for-errors\">
        ";
        // line 53
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 53, $this->source); })()), 'errors');
        echo "
    </div>

    <div class=\"row\">
        <div class=\"col\">
            ";
        // line 58
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 58, $this->source); })()), "id", [], "any", false, false, false, 58), 'row');
        echo "
        </div>
        <div class=\"col\">
     
        </div>
    </div>

    <div class=\"row\">
        <div class=\"col\">
            ";
        // line 67
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 67, $this->source); })()), "title", [], "any", false, false, false, 67), 'row');
        echo "
        </div>

    </div>
    <div class=\"row\">
        <div class=\"col\">
            ";
        // line 73
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 73, $this->source); })()), "artist", [], "any", false, false, false, 73), 'row');
        echo "
        </div>

    </div>

    <div class=\"row\">
        <div class=\"col\">
            ";
        // line 80
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 80, $this->source); })()), "range", [], "any", false, false, false, 80), 'row');
        echo "
        </div>

    </div>        
    ";
        // line 84
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 84, $this->source); })()), 'form_end');
        echo "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "lastfm/connect.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  177 => 84,  170 => 80,  160 => 73,  151 => 67,  139 => 58,  131 => 53,  126 => 51,  105 => 33,  86 => 17,  73 => 6,  66 => 5,  53 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'layout.html.twig' %}

{% block title %}Lastfm connection{% endblock %}

{% block page_contents %}
    <h1>Connected</h1>

    <script>
\$(document).ready( function() {

        // for example your fieldname id is \"field\"
        \$( \"button#form_saveAndAdd\").click( function(event){
                    var inputVal = \$('#form_id').val();
                    \$.ajax
                    ({
                        type: \"POST\",
                        url: '{{ (path('deezer_load')) }}',
                        data: \"id=\"+inputVal,
                    })
                    .done(function(data) {
                          \$(\"#form_title\").val(data.title);
                         \$(\"#form_artist\").val(data.artist);
                        console.log(data);
                    });

        });
   });
\$(document).on(\"submit\", \"form\", function(event)
{
    event.preventDefault();

    \$.ajax({
        url: '{{ (path('lastfm_scrobble')) }}',
        type: 'POST',
        dataType: \"JSON\",
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function (data, status)
        {
            console.log(data);
        },
        error: function (xhr, desc, err)
        {
            console.log(\"error\");
        }
    });
});
    </script>

    {{ form_start(form) }}
    <div class=\"my-custom-class-for-errors\">
        {{ form_errors(form) }}
    </div>

    <div class=\"row\">
        <div class=\"col\">
            {{ form_row(form.id) }}
        </div>
        <div class=\"col\">
     
        </div>
    </div>

    <div class=\"row\">
        <div class=\"col\">
            {{ form_row(form.title) }}
        </div>

    </div>
    <div class=\"row\">
        <div class=\"col\">
            {{ form_row(form.artist) }}
        </div>

    </div>

    <div class=\"row\">
        <div class=\"col\">
            {{ form_row(form.range) }}
        </div>

    </div>        
    {{ form_end(form) }}
{% endblock %}
", "lastfm/connect.html.twig", "/home/fb/Backup/Dokumenty/public_html/dscrobbler/templates/lastfm/connect.html.twig");
    }
}
