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

/* listenbrainz/scrobble.html.twig */
class __TwigTemplate_24faf610f3811e3eea8e4dacff81658f extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "listenbrainz/scrobble.html.twig"));

        $this->parent = $this->loadTemplate("layout.html.twig", "listenbrainz/scrobble.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Listenbrainz connection";
        
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
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("listenbrainz_scrobble");
        echo "',
        type: 'POST',
        dataType: \"JSON\",
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function (data, status)
        {
            if(data.success === 1) {
               console.log(data.data);
                \$('.flash_message').html('<div class=\"alert alert-info\" role=\"alert\">Scrobbling finished!</div>').show();
             }
            else {
                 \$('.flash_message').html('<div class=\"alert alert-danger\" role=\"alert\">'+data.error +'</div>').show();
            }
            \$(\".flash_message\").delay(5000).slideUp(300);
        },
    });
});
    </script>
    <div class=\"flash_message\">

    </div>
    ";
        // line 56
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 56, $this->source); })()), 'form_start');
        echo "
    <div class=\"my-custom-class-for-errors\">
        ";
        // line 58
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 58, $this->source); })()), 'errors');
        echo "
    </div>

    <div class=\"row\">
        <div class=\"col\">
            ";
        // line 63
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 63, $this->source); })()), "id", [], "any", false, false, false, 63), 'row');
        echo "
        </div>
        <div class=\"col\">
     
        </div>
    </div>

    <div class=\"row\">
        <div class=\"col\">
            ";
        // line 72
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 72, $this->source); })()), "title", [], "any", false, false, false, 72), 'row');
        echo "
        </div>

    </div>
    <div class=\"row\">
        <div class=\"col\">
            ";
        // line 78
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 78, $this->source); })()), "artist", [], "any", false, false, false, 78), 'row');
        echo "
        </div>

    </div>

    <div class=\"row\">
        <div class=\"col\">
            ";
        // line 85
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 85, $this->source); })()), "range", [], "any", false, false, false, 85), 'row');
        echo "
        </div>

    </div>        
    ";
        // line 89
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 89, $this->source); })()), 'form_end');
        echo "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "listenbrainz/scrobble.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  182 => 89,  175 => 85,  165 => 78,  156 => 72,  144 => 63,  136 => 58,  131 => 56,  105 => 33,  86 => 17,  73 => 6,  66 => 5,  53 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'layout.html.twig' %}

{% block title %}Listenbrainz connection{% endblock %}

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
        url: '{{ (path('listenbrainz_scrobble')) }}',
        type: 'POST',
        dataType: \"JSON\",
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function (data, status)
        {
            if(data.success === 1) {
               console.log(data.data);
                \$('.flash_message').html('<div class=\"alert alert-info\" role=\"alert\">Scrobbling finished!</div>').show();
             }
            else {
                 \$('.flash_message').html('<div class=\"alert alert-danger\" role=\"alert\">'+data.error +'</div>').show();
            }
            \$(\".flash_message\").delay(5000).slideUp(300);
        },
    });
});
    </script>
    <div class=\"flash_message\">

    </div>
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
", "listenbrainz/scrobble.html.twig", "/home/fb/Backup/Dokumenty/public_html/dscrobbler/templates/listenbrainz/scrobble.html.twig");
    }
}
