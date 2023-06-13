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

/* base.html.twig */
class __TwigTemplate_a748e17c2ed2f621e17b18cc0a2c2b1f extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
            'sidebar' => [$this, 'block_sidebar'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\">
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 14
        echo "    </head>
    <body>
        ";
        // line 16
        $this->displayBlock('body', $context, $blocks);
        // line 52
        echo "        <script src=\"https://bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.bundle.min.js\"></script>
    </body>
</html>";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 5
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Deezer Scrobbler";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 7
        echo "            <link href=\" https://cdn.jsdelivr.net/npm/bootswatch@5.2.3/dist/darkly/bootstrap.min.css \" rel=\"stylesheet\">
            <script
\t\t\t  src=\"https://code.jquery.com/jquery-3.6.4.min.js\"
\t\t\t  integrity=\"sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=\"
\t\t\t  crossorigin=\"anonymous\"></script>
            <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/custom.css"), "html", null, true);
        echo "\"/>
        ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 16
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 17
        echo "               <div class=\"navbar navbar-expand-lg fixed-top navbar-dark bg-primary\">
                    <div class=\"container\">
                ";
        // line 19
        $this->displayBlock('sidebar', $context, $blocks);
        // line 39
        echo "                    </div>
            </div>

   <div class=\"container\">
      <div class=\"page-header\" id=\"banner\">
        <div class=\"row\">
                ";
        // line 45
        $this->displayBlock('content', $context, $blocks);
        // line 48
        echo "            </div>
      </div>
   </div>
        ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 19
    public function block_sidebar($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "sidebar"));

        // line 20
        echo "                       <div class=\"collapse navbar-collapse\" id=\"navbarResponsive\">
                    <ul class=\"navbar-nav\">
                        <li  class=\"nav-link\"><a href=\"";
        // line 22
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("home");
        echo "\">Home</a></li>
                        <li class=\"nav-item dropdown\"><a class=\"nav-link dropdown-toggle\" data-bs-toggle=\"dropdown\" href=\"#\">Deezer</a>
                        <div class=\"dropdown-menu\" aria-labelledby=\"deezer\">
                            <a class=\"dropdown-item\" href=\"";
        // line 25
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("deezer_connect");
        echo "\">Connect</a>
                            <a class=\"dropdown-item\" href=\"";
        // line 26
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("deezer_history");
        echo "\">Listening history</a>
                            <a class=\"dropdown-item\" href=\"";
        // line 27
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("deezer_logout");
        echo "\">Logout</a>                            
                        </div>
                        </li>
                        <li class=\"nav-item dropdown\"><a class=\"nav-link dropdown-toggle\" data-bs-toggle=\"dropdown\" href=\"#\">LastFM</a>
                          <div class=\"dropdown-menu\" aria-labelledby=\"lastfm\">
                            <a class=\"dropdown-item\" href=\"";
        // line 32
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("lastfm_connect");
        echo "\">Scrobble/Connect</a>
                            <a class=\"dropdown-item\" href=\"";
        // line 33
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("lastfm_recent");
        echo "\">Recent scrobbles</a>
                            </div>                      
                        </li>
                    </ul>
                       </div>
                ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 45
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 46
        echo "                
                ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  198 => 46,  191 => 45,  178 => 33,  174 => 32,  166 => 27,  162 => 26,  158 => 25,  152 => 22,  148 => 20,  141 => 19,  131 => 48,  129 => 45,  121 => 39,  119 => 19,  115 => 17,  108 => 16,  99 => 12,  92 => 7,  85 => 6,  72 => 5,  63 => 52,  61 => 16,  57 => 14,  55 => 6,  51 => 5,  45 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\">
        <title>{% block title %}Deezer Scrobbler{% endblock %}</title>
        {% block stylesheets %}
            <link href=\" https://cdn.jsdelivr.net/npm/bootswatch@5.2.3/dist/darkly/bootstrap.min.css \" rel=\"stylesheet\">
            <script
\t\t\t  src=\"https://code.jquery.com/jquery-3.6.4.min.js\"
\t\t\t  integrity=\"sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=\"
\t\t\t  crossorigin=\"anonymous\"></script>
            <link rel=\"stylesheet\" type=\"text/css\" href=\"{{ asset('css/custom.css') }}\"/>
        {% endblock %}
    </head>
    <body>
        {% block body %}
               <div class=\"navbar navbar-expand-lg fixed-top navbar-dark bg-primary\">
                    <div class=\"container\">
                {% block sidebar %}
                       <div class=\"collapse navbar-collapse\" id=\"navbarResponsive\">
                    <ul class=\"navbar-nav\">
                        <li  class=\"nav-link\"><a href=\"{{ url('home') }}\">Home</a></li>
                        <li class=\"nav-item dropdown\"><a class=\"nav-link dropdown-toggle\" data-bs-toggle=\"dropdown\" href=\"#\">Deezer</a>
                        <div class=\"dropdown-menu\" aria-labelledby=\"deezer\">
                            <a class=\"dropdown-item\" href=\"{{ url('deezer_connect') }}\">Connect</a>
                            <a class=\"dropdown-item\" href=\"{{ url('deezer_history') }}\">Listening history</a>
                            <a class=\"dropdown-item\" href=\"{{ url('deezer_logout') }}\">Logout</a>                            
                        </div>
                        </li>
                        <li class=\"nav-item dropdown\"><a class=\"nav-link dropdown-toggle\" data-bs-toggle=\"dropdown\" href=\"#\">LastFM</a>
                          <div class=\"dropdown-menu\" aria-labelledby=\"lastfm\">
                            <a class=\"dropdown-item\" href=\"{{ url('lastfm_connect') }}\">Scrobble/Connect</a>
                            <a class=\"dropdown-item\" href=\"{{ url('lastfm_recent') }}\">Recent scrobbles</a>
                            </div>                      
                        </li>
                    </ul>
                       </div>
                {% endblock %}
                    </div>
            </div>

   <div class=\"container\">
      <div class=\"page-header\" id=\"banner\">
        <div class=\"row\">
                {% block content %}
                
                {% endblock %}
            </div>
      </div>
   </div>
        {% endblock %}
        <script src=\"https://bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.bundle.min.js\"></script>
    </body>
</html>", "base.html.twig", "/home/fb/Backup/Dokumenty/public_html/dscrobbler/templates/base.html.twig");
    }
}
