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

/* User/userlist.html.twig */
class __TwigTemplate_303290888ec2755a013be47088bdfb3cb62f2448587a97060981b268cf1945a6 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "index.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("index.html.twig", "User/userlist.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo " Liste des articles - ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 4
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "
    <div class=\"jumbotron\">
        <h1 class=\"display-4\">Liste des Users</h1>
    </div>
    <div class=\"container\">
        <table class=\"table table-striped\">
            <thead>
            <tr>
                <th scope=\"col\">#</th>
                <th scope=\"col\">Mail</th>
                <th scope=\"col\">Nom</th>
                <th scope=\"col\">Prenom</th>
                <th scope=\"col\">Rôle</th>
                <th scope=\"col\">Action</th>
            </tr>
            </thead>

            <tbody>
            ";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["userList"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 24
            echo "                <tr>
                    <th scope=\"row\"><a href=\"/User/Show/";
            // line 25
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "IdUti", [], "any", false, false, false, 25), "html", null, true);
            echo "\">#";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "IdUti", [], "any", false, false, false, 25), "html", null, true);
            echo "</a></th>
                    <td>";
            // line 26
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "utimail", [], "any", false, false, false, 26), "html", null, true);
            echo "</td>
                    <td>";
            // line 27
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "utinom", [], "any", false, false, false, 27), "html", null, true);
            echo "</td>
                    <td>";
            // line 28
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "utiprenom", [], "any", false, false, false, 28), "html", null, true);
            echo "</td>
                    <td>";
            // line 29
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "utirole", [], "any", false, false, false, 29), "html", null, true);
            echo "</td>
                    <td>
                        <div class=\"btn-group\" role=\"group\" aria-label=\"Basic example\">
                            <a class=\"btn btn-success\" href=\"/User/Show/";
            // line 32
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "IdUti", [], "any", false, false, false, 32), "html", null, true);
            echo "\"><i class=\"far fa-eye\"></i></a>
                            <a class=\"btn btn-warning\" href=\"/User/Update/";
            // line 33
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "IdUti", [], "any", false, false, false, 33), "html", null, true);
            echo "\"><i class=\"fas fa-edit\"></i></a>
                            <a class=\"btn btn-danger\" href=\"/User/Delete/";
            // line 34
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "IdUti", [], "any", false, false, false, 34), "html", null, true);
            echo "\"><i class=\"far fa-trash-alt\"></i></a>
                        </div>


                    </td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "
            </tbody>
        </table>
    </div>


";
    }

    public function getTemplateName()
    {
        return "User/userlist.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 41,  118 => 34,  114 => 33,  110 => 32,  104 => 29,  100 => 28,  96 => 27,  92 => 26,  86 => 25,  83 => 24,  79 => 23,  59 => 5,  55 => 4,  47 => 2,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"index.html.twig\" %}
{% block title %} Liste des articles - {{ parent() }}{% endblock %}

{% block body %}

    <div class=\"jumbotron\">
        <h1 class=\"display-4\">Liste des Users</h1>
    </div>
    <div class=\"container\">
        <table class=\"table table-striped\">
            <thead>
            <tr>
                <th scope=\"col\">#</th>
                <th scope=\"col\">Mail</th>
                <th scope=\"col\">Nom</th>
                <th scope=\"col\">Prenom</th>
                <th scope=\"col\">Rôle</th>
                <th scope=\"col\">Action</th>
            </tr>
            </thead>

            <tbody>
            {% for user in userList %}
                <tr>
                    <th scope=\"row\"><a href=\"/User/Show/{{ user.IdUti }}\">#{{ user.IdUti }}</a></th>
                    <td>{{ user.utimail }}</td>
                    <td>{{ user.utinom }}</td>
                    <td>{{ user.utiprenom }}</td>
                    <td>{{ user.utirole }}</td>
                    <td>
                        <div class=\"btn-group\" role=\"group\" aria-label=\"Basic example\">
                            <a class=\"btn btn-success\" href=\"/User/Show/{{ user.IdUti }}\"><i class=\"far fa-eye\"></i></a>
                            <a class=\"btn btn-warning\" href=\"/User/Update/{{ user.IdUti }}\"><i class=\"fas fa-edit\"></i></a>
                            <a class=\"btn btn-danger\" href=\"/User/Delete/{{ user.IdUti }}\"><i class=\"far fa-trash-alt\"></i></a>
                        </div>


                    </td>
                </tr>
            {% endfor %}

            </tbody>
        </table>
    </div>


{% endblock %}", "User/userlist.html.twig", "C:\\projets\\tp_php\\templates\\User\\userlist.html.twig");
    }
}
