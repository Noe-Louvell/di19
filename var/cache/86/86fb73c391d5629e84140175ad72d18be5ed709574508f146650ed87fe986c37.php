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

/* index.html.twig */
class __TwigTemplate_000903ecc2feaca68c8457524b5d9ab5fc476bb11a9e22b60cf5c4c4edaa9533 extends Template
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
            'css' => [$this, 'block_css'],
            'body' => [$this, 'block_body'],
            'javascript' => [$this, 'block_javascript'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!doctype html>
<html lang=\"fr\">

<head>
    <meta charset=\"utf-8\">
    <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css\">
    <link rel=\"stylesheet\"
        href=\"https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/pepper-grinder/jquery-ui.css\">
    <link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.8.1/css/all.css\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css\">
    ";
        // line 12
        $this->displayBlock('css', $context, $blocks);
        // line 13
        echo "
<body>

    <nav class=\"navbar sticky-top nav-pills navbar-expand-lg navbar-dark bg-dark\">

        <a class=\"navbar-brand\" href=\"/Article/ListAll\">Blog du CESI</a>
        <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarTogglerDemo02\"
            aria-controls=\"navbarTogglerDemo02\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
            <span class=\"navbar-toggler-icon\"></span>
        </button>
        <div class=\"collapse navbar-collapse\" id=\"navbarTogglerDemo02\">
            <!--<div class=\"row\">-->

            <ul class=\"navbar-nav mr-auto mt-2 mt-lg-0\">
                <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"/Login\">Log In</a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"/Logout\">Log Out</a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"/Article/ListAll\">Liste des articles</a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"/Article/Add\">Ajout d'un article</a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"/Contact\">Contact</a>
                </li>


            </ul>



            <form class=\"form-inline\" method=\"post\" action=\"/Article/Show/";
        // line 48
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["post"] ?? null), "search", [], "any", false, false, false, 48), "html", null, true);
        echo "\">
                <input class=\"form-control mr-sm-2\" type=\"search\" placeholder=\"Rechercher un article\" name=\"search\">
                <input type=\"submit\" class=\"btn btn-outline-success my-2 my-sm-0\" value=\"Rechercher\"
                    name=\"searchSubmit\">
            </form>
        </div>

    </nav>

    <nav class=\"navbar navbar-expand-lg navbar-light bg-light\">
        <a class=\"navbar-brand\" href=\"#\">Menu</a>
        <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarSupportedContent\"
            aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
            <span class=\"navbar-toggler-icon\"></span>
        </button>
        <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
            <ul class=\"navbar-nav mr-auto\">
                <li class=\"nav-item dropdown\">
                    <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\"
                        data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                        Admin
                    </a>
                    <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">
                        <a class=\"dropdown-item\" href=\"/?controller=Article&action=ListAll\">Liste</a>
                        <a class=\"dropdown-item\" href=\"/?controller=Article&action=Add\">Ajout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    ";
        // line 79
        $this->displayBlock('body', $context, $blocks);
        // line 80
        echo "


    <script src=\"https://code.jquery.com/jquery-3.4.0.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js\"></script>
    <script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js\"></script>
    <script src=\"https://code.jquery.com/ui/1.12.1/jquery-ui.js\"></script>
    <script src=\"https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/i18n/jquery-ui-i18n.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js\"></script>
    ";
        // line 89
        $this->displayBlock('javascript', $context, $blocks);
        // line 90
        echo "</body>

</html>";
    }

    // line 6
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "CESI BLOG";
    }

    // line 12
    public function block_css($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 79
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 89
    public function block_javascript($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  170 => 89,  164 => 79,  158 => 12,  151 => 6,  145 => 90,  143 => 89,  132 => 80,  130 => 79,  96 => 48,  59 => 13,  57 => 12,  48 => 6,  41 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!doctype html>
<html lang=\"fr\">

<head>
    <meta charset=\"utf-8\">
    <title>{% block title %}CESI BLOG{% endblock %}</title>
    <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css\">
    <link rel=\"stylesheet\"
        href=\"https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/pepper-grinder/jquery-ui.css\">
    <link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.8.1/css/all.css\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css\">
    {% block css %}{% endblock %}

<body>

    <nav class=\"navbar sticky-top nav-pills navbar-expand-lg navbar-dark bg-dark\">

        <a class=\"navbar-brand\" href=\"/Article/ListAll\">Blog du CESI</a>
        <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarTogglerDemo02\"
            aria-controls=\"navbarTogglerDemo02\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
            <span class=\"navbar-toggler-icon\"></span>
        </button>
        <div class=\"collapse navbar-collapse\" id=\"navbarTogglerDemo02\">
            <!--<div class=\"row\">-->

            <ul class=\"navbar-nav mr-auto mt-2 mt-lg-0\">
                <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"/Login\">Log In</a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"/Logout\">Log Out</a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"/Article/ListAll\">Liste des articles</a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"/Article/Add\">Ajout d'un article</a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"/Contact\">Contact</a>
                </li>


            </ul>



            <form class=\"form-inline\" method=\"post\" action=\"/Article/Show/{{ post.search }}\">
                <input class=\"form-control mr-sm-2\" type=\"search\" placeholder=\"Rechercher un article\" name=\"search\">
                <input type=\"submit\" class=\"btn btn-outline-success my-2 my-sm-0\" value=\"Rechercher\"
                    name=\"searchSubmit\">
            </form>
        </div>

    </nav>

    <nav class=\"navbar navbar-expand-lg navbar-light bg-light\">
        <a class=\"navbar-brand\" href=\"#\">Menu</a>
        <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarSupportedContent\"
            aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
            <span class=\"navbar-toggler-icon\"></span>
        </button>
        <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
            <ul class=\"navbar-nav mr-auto\">
                <li class=\"nav-item dropdown\">
                    <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\"
                        data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                        Admin
                    </a>
                    <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">
                        <a class=\"dropdown-item\" href=\"/?controller=Article&action=ListAll\">Liste</a>
                        <a class=\"dropdown-item\" href=\"/?controller=Article&action=Add\">Ajout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    {% block body %}{% endblock %}



    <script src=\"https://code.jquery.com/jquery-3.4.0.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js\"></script>
    <script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js\"></script>
    <script src=\"https://code.jquery.com/ui/1.12.1/jquery-ui.js\"></script>
    <script src=\"https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/i18n/jquery-ui-i18n.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js\"></script>
    {% block javascript %}{% endblock %}
</body>

</html>", "index.html.twig", "C:\\Repo\\tp\\templates\\index.html.twig");
    }
}
